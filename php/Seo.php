<?php
/**
 * WMARKA — SEO-движок: canonical, title, description, OpenGraph, Twitter,
 * единый JSON-LD @graph.
 *
 * Оверрайды компонентов работают раньше шаблона и передают данные через
 * статический мост: Seo::page([...]), Seo::addListItem(), Seo::addNode().
 * Данные организации берутся из настроек шаблона (вкладка «SEO»), при пустых
 * полях — из языковых констант 3.0.x (мягкая миграция).
 * Выключается одним переключателем, если на сайте стоит SEO-расширение.
 */

declare(strict_types=1);

namespace Wmarka\Template;

\defined('_JEXEC') or die;

use Joomla\CMS\Document\HtmlDocument;
use Joomla\CMS\Factory;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;

final class Seo
{
    /** @var array<string, mixed> данные страницы от оверрайдов */
    private static array $page = [];

    /** @var array<int, array{name:string,url:string}> */
    private static array $list = [];

    /** @var array<int, array> дополнительные узлы @graph */
    private static array $nodes = [];

    private HtmlDocument $doc;

    private string $option;

    private string $view;

    private string $canonical = '';

    /** Мост для оверрайдов: title, description, image, type, published, modified, author, section */
    public static function page(array $data): void
    {
        foreach ($data as $key => $value) {
            if ($value !== null && $value !== '') {
                self::$page[$key] = $value;
            }
        }
    }

    /** Совместимость с 3.0.x/4.0.x */
    public static function setPageMeta(string $title = '', string $description = '', string $image = ''): void
    {
        self::page(['title' => $title, 'description' => $description, 'image' => $image]);
    }

    public static function addListItem(string $name, string $url): void
    {
        if ($name !== '' && $url !== '' && \count(self::$list) < 50) {
            self::$list[] = ['name' => strip_tags($name), 'url' => $url];
        }
    }

    public static function addNode(array $node): void
    {
        if ($node) {
            self::$nodes[] = $node;
        }
    }

    public function __construct(HtmlDocument $doc)
    {
        $this->doc    = $doc;
        $input        = Factory::getApplication()->getInput();
        $this->option = (string) $input->getCmd('option', '');
        $this->view   = (string) $input->getCmd('view', '');
    }

    public function render(): void
    {
        if (Config::bool('seo_canonical', true)) {
            $this->canonical();
        }

        $this->meta();

        if (Config::bool('seo_og', true)) {
            $this->openGraph();
        }

        if (Config::bool('seo_jsonld', true)) {
            $this->jsonLd();
        }
    }

    private static function origin(): string
    {
        return Uri::getInstance()->toString(['scheme', 'host', 'port']);
    }

    private static function absolute(string $path): string
    {
        if ($path === '' || preg_match('#^(https?:)?//#i', $path)) {
            return $path;
        }

        return str_starts_with($path, '/') ? self::origin() . $path : Uri::root() . ltrim($path, '/');
    }

    private function isHome(): bool
    {
        $app    = Factory::getApplication();
        $menu   = $app->getMenu();
        $active = $menu->getActive();

        return $active !== null
            && ($active === $menu->getDefault($app->getLanguage()->getTag()) || $active === $menu->getDefault('*'))
            && Helper::ownPage($active);
    }

    /**
     * Canonical по образцу Aimy Canonical и плагина «Система — SEF» ядра: адрес самой
     * запрошенной страницы, приведённый к одному виду, а не адрес, который роутер строит
     * заново по option/view/id. Роутер, отвечая на вопрос «где живёт эта сущность»,
     * выбирает пункт меню по своим правилам и может назвать соседний пункт (пункты-близнецы)
     * или корень сайта — тогда страница сама просит поисковик себя не индексировать.
     * Адрес запроса этой ошибки не допускает: страница указывает на себя.
     *
     * Порядок:
     *  1. Чужой canonical (компонент, плагин SEF ядра с «Доменом сайта») берётся за основу
     *     и снимается — на странице остаётся один тег.
     *  2. Страница с robots noindex canonical не получает (так же поступает Aimy Canonical).
     *  3. Главная — корень сайта.
     *  4. Неразобранный адрес вида index.php?option=… при включённых ЧПУ переводится в ЧПУ
     *     по тем же параметрам запроса.
     *  5. Режим «Склеивать адреса материала» (seo_canonical_mode = entity) для одной статьи,
     *     открытой по нескольким адресам, выбирает адрес, который строит роутер, — только
     *     если он заканчивается алиасом этой статьи и не ведёт на корень.
     *  6. Приведение: домен и протокол (seo_canonical_domain), без /index.php при
     *     перезаписи URL, из параметров остаются только разрешённые (seo_canonical_keep,
     *     по умолчанию start), без фрагмента, не-ASCII в пути — в процентной записи.
     */
    private function canonical(): void
    {
        $app  = Factory::getApplication();
        $head = $this->doc->getHeadData();
        $base = '';

        foreach ($head['links'] as $url => $info) {
            if (($info['relation'] ?? '') === 'canonical') {
                $base = $base !== '' ? $base : html_entity_decode((string) $url, ENT_QUOTES, 'UTF-8');
                unset($head['links'][$url]);
            }
        }

        $this->doc->setHeadData($head);

        if (stripos((string) $this->doc->getMetaData('robots'), 'noindex') !== false) {
            $this->canonical = '';

            return;
        }

        $request = clone Uri::getInstance();

        if ($this->isHome()) {
            $uri = new Uri(Uri::root());
            $uri->setQuery($request->getQuery());
        } elseif ($base !== '') {
            $uri = new Uri(self::absolute($base));
        } else {
            $uri = $request;

            if ($app->get('sef') && $uri->getVar('option')) {
                $sef = new Uri(self::absolute(Route::_($this->requestLink(), false)));
                $sef->setQuery(array_merge($sef->getQuery(true), array_intersect_key($uri->getQuery(true), ['start' => 1, 'limitstart' => 1])));
                $uri = $sef;
            }

            if (Config::canonicalMode() === 'entity' && ($entity = $this->entityUrl()) !== '') {
                $merged = new Uri($entity);
                $merged->setQuery($uri->getQuery(true));
                $uri = $merged;
            }
        }

        $this->canonical = $this->normalize($uri);
        $this->doc->addHeadLink(htmlspecialchars($this->canonical, ENT_QUOTES, 'UTF-8'), 'canonical');
    }

    /** Запрос текущей страницы в виде index.php?… — для перевода неразобранного адреса в ЧПУ */
    private function requestLink(): string
    {
        $input = Factory::getApplication()->getInput();
        $vars  = ['option' => $this->option, 'view' => $this->view];

        foreach (['layout', 'catid', 'Itemid'] as $key) {
            if (($value = $input->getCmd($key, '')) !== '') {
                $vars[$key] = $value;
            }
        }

        $link = 'index.php?' . http_build_query($vars);
        $ids  = $input->get('id', null, 'raw');

        if (\is_array($ids)) {
            foreach (array_values(array_map('intval', $ids)) as $i => $id) {
                $link .= '&id[' . $i . ']=' . $id;
            }
        } elseif ($ids !== null && $ids !== '') {
            $link .= '&id=' . rawurlencode((string) $ids);
        }

        return $link;
    }

    /**
     * Адрес статьи, который строит роутер (режим «Склеивать адреса материала»). Принимается,
     * только если путь кончается алиасом этой статьи и не равен корню: иначе — пусто, и
     * canonical остаётся адресом запроса.
     */
    private function entityUrl(): string
    {
        if ($this->option !== 'com_content' || $this->view !== 'article') {
            return '';
        }

        $id = Factory::getApplication()->getInput()->getInt('id');

        if ($id <= 0) {
            return '';
        }

        $db  = Factory::getContainer()->get(\Joomla\Database\DatabaseInterface::class);
        $row = $db->setQuery(
            $db->getQuery(true)
                ->select($db->quoteName(['alias', 'catid', 'language']))
                ->from($db->quoteName('#__content'))
                ->where($db->quoteName('id') . ' = ' . $id)
        )->loadObject();

        if (!$row || $row->alias === '') {
            return '';
        }

        $url  = self::absolute(Route::_(\Joomla\Component\Content\Site\Helper\RouteHelper::getArticleRoute($id . ':' . $row->alias, (int) $row->catid, $row->language), false));
        $path = rtrim((string) (new Uri($url))->getPath(), '/');
        $root = rtrim((string) (new Uri(Uri::root()))->getPath(), '/');

        if ($path === $root || !preg_match('#(^|/)(' . $id . '-)?' . preg_quote($row->alias, '#') . '(\.[a-z0-9]+)?$#i', $path)) {
            return '';
        }

        return $url;
    }

    /** Один вид адреса: домен и протокол, без index.php, только разрешённые параметры, путь в процентной записи */
    private function normalize(Uri $uri): string
    {
        $domain = trim(Config::str('seo_canonical_domain', ''));

        if ($domain !== '') {
            $site = new Uri(preg_match('#^https?://#i', $domain) ? $domain : 'https://' . $domain);
            $uri->setScheme($site->getScheme());
            $uri->setHost($site->getHost());
            $uri->setPort($site->getPort() ?: null);
        } elseif ($uri->getHost() === null || $uri->getHost() === '') {
            $current = Uri::getInstance();
            $uri->setScheme($current->getScheme());
            $uri->setHost($current->getHost());
            $uri->setPort($current->getPort() ?: null);
        }

        $path = (string) $uri->getPath();

        if (Factory::getApplication()->get('sef_rewrite')) {
            $path = (string) preg_replace('#/index\.php(?=/|$)#', '', $path);
        }

        $path = '/' . ltrim($path, '/');

        // Только разрешённые параметры; limitstart → start; нулевая страница не пишется
        $vars = $uri->getQuery(true);

        if (isset($vars['limitstart']) && !isset($vars['start'])) {
            $vars['start'] = $vars['limitstart'];
        }

        $keep  = array_filter(array_map('trim', explode(',', Config::str('seo_canonical_keep', 'start'))));
        $query = [];

        foreach ($keep as $key) {
            if (isset($vars[$key]) && $vars[$key] !== '' && !($key === 'start' && (int) $vars[$key] <= 0)) {
                $query[$key] = $vars[$key];
            }
        }

        $encoded = (string) preg_replace_callback('/[^\x21-\x7E]/', static fn (array $m): string => rawurlencode($m[0]), $path);
        $port    = $uri->getPort();

        return $uri->getScheme() . '://' . $uri->getHost() . ($port ? ':' . $port : '') . $encoded . ($query ? '?' . http_build_query($query) : '');
    }

    /** Title (без дублей), description (автогенерация из текста) */
    private function meta(): void
    {
        $title = trim(strip_tags((string) (self::$page['title'] ?? $this->doc->getTitle())));
        $site  = Config::sitename();

        if (Config::str('seo_title', 'joomla') === 'suffix' && $site !== '' && !str_contains($title, $site)) {
            $title .= ' ' . (Config::str('seo_title_sep', '—') ?: '—') . ' ' . $site;
        }

        $this->doc->setTitle(Ui::quotes(html_entity_decode($title, ENT_QUOTES, 'UTF-8')));

        if (trim((string) $this->doc->getDescription()) === '' && !empty(self::$page['description'])) {
            $text = strip_tags((string) self::$page['description']);
            $text = preg_replace('/\{[^}]+\}/', '', $text) ?? $text;
            $text = trim(preg_replace('/\s+/u', ' ', html_entity_decode($text, ENT_QUOTES, 'UTF-8')) ?? '');

            if ($text !== '') {
                $this->doc->setDescription(mb_strlen($text) > 160 ? rtrim(mb_substr($text, 0, 157)) . '…' : $text);
            }
        }
    }

    private function ogImage(): string
    {
        $image = (string) (self::$page['image'] ?? '');

        if ($image !== '' && !preg_match('#^(https?:)?//#i', $image)) {
            $image = Image::og($image);
        }

        if ($image === '') {
            $default = Config::text('seo_og_image', ['TPL_WMARKA_SEO_OG_IMAGE_DEFAULT']);
            $clean   = Image::clean($default);
            $image   = $clean !== '' ? (Image::og($clean) ?: self::absolute($clean)) : '';
        }

        return $image;
    }

    private function openGraph(): void
    {
        $title = $this->doc->getTitle();
        $desc  = (string) $this->doc->getDescription();
        $url   = $this->canonical ?: Uri::getInstance()->toString(['scheme', 'host', 'port', 'path']);
        $type  = (self::$page['type'] ?? '') === 'article' ? 'article' : 'website';
        $parts = explode('-', (string) $this->doc->language);

        $this->doc->setMetaData('og:type', $type, 'property');
        $this->doc->setMetaData('og:title', $title, 'property');
        $this->doc->setMetaData('og:url', $url, 'property');
        $this->doc->setMetaData('og:site_name', Config::text('seo_og_site_name', ['TPL_WMARKA_SEO_OG_SITE_NAME'], Config::siteTitle()), 'property');
        $this->doc->setMetaData('og:locale', strtolower($parts[0]) . (isset($parts[1]) ? '_' . strtoupper($parts[1]) : ''), 'property');

        if ($desc !== '') {
            $this->doc->setMetaData('og:description', $desc, 'property');
            $this->doc->setMetaData('twitter:description', $desc);
        }

        if ($image = $this->ogImage()) {
            $this->doc->setMetaData('og:image', $image, 'property');
            $this->doc->setMetaData('twitter:image', $image);
        }

        if ($type === 'article' && !empty(self::$page['published'])) {
            $this->doc->setMetaData('article:published_time', (string) self::$page['published'], 'property');
        }

        $this->doc->setMetaData('twitter:card', 'summary_large_image');
        $this->doc->setMetaData('twitter:title', $title);

        if ($twitter = Config::text('seo_twitter', ['TPL_WMARKA_SEO_TWITTER_SITE'])) {
            $this->doc->setMetaData('twitter:site', $twitter);
        }
    }

    private function organization(): array
    {
        $root = Uri::root();
        $type = Config::text('seo_org_type', ['TPL_WMARKA_SEO_ORG_TYPE'], 'Organization');
        $node = [
            '@type' => preg_match('/^[A-Za-z]+$/', $type) ? $type : 'Organization',
            '@id'   => $root . '#organization',
            'name'  => Config::text('seo_org_name', ['TPL_WMARKA_SEO_ORG_NAME'], Config::siteTitle()),
            'url'   => $root,
        ];

        $logo = Image::clean(Config::text('seo_org_logo', ['TPL_WMARKA_SEO_ORG_LOGO'], Config::str('logo_image')));

        if ($logo !== '') {
            $node['logo'] = self::absolute($logo);
        }

        $contacts = Helper::contacts();

        if (!empty($contacts['phone'])) {
            $node['telephone'] = $contacts['phone']['value'];
        }

        if (!empty($contacts['email'])) {
            $node['email'] = $contacts['email']['value'];
        }

        $street = Config::text('seo_street', ['TPL_WMARKA_SEO_STREET']);
        $city   = Config::text('seo_city', ['TPL_WMARKA_SEO_CITY']);

        if ($street !== '' || $city !== '') {
            $node['address'] = array_filter([
                '@type'           => 'PostalAddress',
                'streetAddress'   => $street,
                'addressLocality' => $city,
                'postalCode'      => Config::text('seo_postal', ['TPL_WMARKA_SEO_POSTAL']),
                'addressCountry'  => Config::text('seo_country', ['TPL_WMARKA_SEO_COUNTRY']),
            ]);
        }

        $lat = Config::text('seo_lat', ['TPL_WMARKA_SEO_LAT']);
        $lng = Config::text('seo_lng', ['TPL_WMARKA_SEO_LONG']);

        if (is_numeric($lat) && is_numeric($lng)) {
            $node['geo'] = ['@type' => 'GeoCoordinates', 'latitude' => (float) $lat, 'longitude' => (float) $lng];
        }

        $same = preg_split('/[\r\n]+/', Config::str('seo_social')) ?: [];

        foreach (['TPL_WMARKA_SEO_SOCIAL_INST', 'TPL_WMARKA_SEO_SOCIAL_FB'] as $legacy) {
            $same[] = Config::text('', [$legacy]);
        }

        $same = array_values(array_unique(array_filter(array_map('trim', $same), static fn ($v) => preg_match('#^https?://#', $v))));

        if ($same) {
            $node['sameAs'] = $same;
        }

        return $node;
    }

    private function jsonLd(): void
    {
        $app   = Factory::getApplication();
        $root  = Uri::root();
        $graph = [$this->organization()];

        $graph[] = [
            '@type'     => 'WebSite',
            '@id'       => $root . '#website',
            'url'       => $root,
            'name'      => Config::siteTitle(),
            'publisher' => ['@id' => $root . '#organization'],
            'potentialAction' => [
                '@type'       => 'SearchAction',
                'target'      => ['@type' => 'EntryPoint', 'urlTemplate' => self::origin() . Route::_('index.php?option=com_finder&view=search') . (str_contains(Route::_('index.php?option=com_finder&view=search'), '?') ? '&' : '?') . 'q={search_term_string}'],
                'query-input' => 'required name=search_term_string',
            ],
        ];

        // Крошки: единственный источник BreadcrumbList на странице
        $pathway = $app->getPathway()->getPathway();

        if ($pathway && !$this->isHome()) {
            $items = [['@type' => 'ListItem', 'position' => 1, 'name' => $app->getLanguage()->_('TPL_WMARKA_HOME'), 'item' => $root]];

            foreach (array_values($pathway) as $i => $node) {
                $entry = ['@type' => 'ListItem', 'position' => $i + 2, 'name' => trim(strip_tags((string) $node->name))];

                if (!empty($node->link)) {
                    $entry['item'] = self::absolute(Route::_($node->link));
                }

                $items[] = $entry;
            }

            $graph[] = ['@type' => 'BreadcrumbList', 'itemListElement' => $items];
        }

        if ((self::$page['type'] ?? '') === 'article') {
            $article = [
                '@type'            => Config::str('seo_article_type', 'Article'),
                'headline'         => mb_substr(strip_tags((string) (self::$page['headline'] ?? $this->doc->getTitle())), 0, 110),
                'mainEntityOfPage' => $this->canonical ?: Uri::current(),
                'publisher'        => ['@id' => $root . '#organization'],
            ];

            if ($image = $this->ogImage()) {
                $article['image'] = [$image];
            }

            foreach (['published' => 'datePublished', 'modified' => 'dateModified', 'section' => 'articleSection'] as $key => $prop) {
                if (!empty(self::$page[$key])) {
                    $article[$prop] = (string) self::$page[$key];
                }
            }

            $article['author'] = !empty(self::$page['author'])
                ? ['@type' => 'Person', 'name' => (string) self::$page['author']]
                : ['@id' => $root . '#organization'];

            if ($desc = (string) $this->doc->getDescription()) {
                $article['description'] = $desc;
            }

            $graph[] = $article;
        } elseif (\in_array($this->option, ['com_tags', 'com_content'], true) && \in_array($this->view, ['tag', 'tags', 'category', 'categories', 'featured'], true)) {
            $graph[] = array_filter([
                '@type'       => 'CollectionPage',
                'name'        => $this->doc->getTitle(),
                'url'         => $this->canonical ?: Uri::current(),
                'description' => (string) $this->doc->getDescription(),
            ]);
        }

        if (self::$list) {
            $elements = [];

            foreach (self::$list as $i => $item) {
                $elements[] = ['@type' => 'ListItem', 'position' => $i + 1, 'name' => $item['name'], 'url' => self::absolute($item['url'])];
            }

            $graph[] = ['@type' => 'ItemList', 'numberOfItems' => \count($elements), 'itemListElement' => $elements];
        }

        foreach (self::$nodes as $node) {
            $graph[] = $node;
        }

        $json = json_encode(['@context' => 'https://schema.org', '@graph' => array_values(array_filter($graph))], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG);

        if ($json) {
            $this->doc->getWebAssetManager()->addInlineScript($json, ['name' => 'inline.wmarka.jsonld'], ['type' => 'application/ld+json']);
        }
    }
}

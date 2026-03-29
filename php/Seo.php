<?php
declare(strict_types=1);

namespace Wmarka\Template;

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Document\HtmlDocument;

class Seo
{
    private HtmlDocument $doc;
    private \Joomla\CMS\Application\SiteApplication $app;
    private string $option;
    private string $view;

    public function __construct(HtmlDocument $doc)
    {
        $this->doc    = $doc;
        $this->app    = Factory::getApplication();
        $this->option = (string) $this->app->input->get('option', '');
        $this->view   = (string) $this->app->input->get('view', '');
    }

    public function render(): void
    {
        $this->setCanonical();
        $this->processMeta();
        $this->setOpenGraph();
        $this->setTwitterCard();
        $this->setJsonLd();
    }

    /**
     * Продвинутый Canonical: Защита от дублей URL
     */
    private function setCanonical(): void
    {
        $id     = $this->app->input->getInt('id');
        $itemid = $this->app->input->getInt('Itemid');
        $start  = $this->app->input->getInt('start');

        // Строим чистую ссылку на основе сущности
        $link = 'index.php?option=' . $this->option . '&view=' . $this->view;
        if ($id) $link .= '&id=' . $id;
        if ($itemid) $link .= '&Itemid=' . $itemid;

        $canonicalRelative = Route::_($link);
        $canonical = Uri::root() . ltrim($canonicalRelative, '/');

        // Убираем возможный index.php (если SEF барахлит)
        $canonical = str_replace('/index.php', '', $canonical);

        // Учет пагинации (Google рекомендует отдельные Canonical для страниц списка)
        if ($start > 0) {
            $canonical .= (str_contains($canonical, '?') ? '&' : '?') . 'start=' . $start;
        }

        $this->doc->addHeadLink($canonical, 'canonical');
    }

    /**
     * Обработка Title и автогенерация Description
     */
    private function processMeta(): void
    {
        // 1. Формирование многосоставного Title
        $title    = $this->doc->getTitle();
        $siteName = $this->app->get('sitename');
        $catTitle = $this->app->get('seo_category_title', '');

        $cleanTitle = htmlspecialchars(strip_tags($title), ENT_QUOTES, 'UTF-8');
        $fullTitle  = $cleanTitle;

        if ($catTitle !== '') {
            $fullTitle .= ' | ' . $catTitle;
        }
        if (!str_contains($fullTitle, $siteName)) {
            $fullTitle .= ' | ' . $siteName;
        }
        
        // Замена компьютерных кавычек на елочки
        $fullTitle = preg_replace('/"([^"]+)"/u', '«$1»', $fullTitle) ?? $fullTitle;
        $this->doc->setTitle($fullTitle);

        // 2. Автогенерация Description (если пустой)
        $metaDesc = $this->doc->getDescription();
        if (empty($metaDesc)) {
            $fallbackText = (string) $this->app->get('seo_fallback_text', '');
            if ($fallbackText !== '') {
                $cleanText = strip_tags($fallbackText);
                $cleanText = preg_replace('/{.+?}/', '', $cleanText) ?? $cleanText; // Удаляем шорткоды Joomla
                $cleanText = trim(preg_replace('/\s+/', ' ', $cleanText) ?? '');
                
                $metaDesc = mb_strlen($cleanText) > 160 ? mb_substr($cleanText, 0, 157) . '...' : $cleanText;
            }
        }
        
        if (!empty($metaDesc)) {
            $metaDesc = preg_replace('/"([^"]+)"/u', '«$1»', $metaDesc) ?? $metaDesc;
            $this->doc->setDescription($metaDesc);
        }
    }

    private function setOpenGraph(): void
    {
        $this->doc->setMetaData('og:title', $this->doc->getTitle(), 'property');
        $type = ($this->option === 'com_content' && $this->view === 'article') ? 'article' : 'website';
        $this->doc->setMetaData('og:type', $type, 'property');
        $this->doc->setMetaData('og:url', Uri::getInstance()->toString(), 'property');
        $this->doc->setMetaData('og:site_name', Text::_('TPL_WMARKA_SEO_OG_SITE_NAME'), 'property');
        
        $img = $this->app->get('current_item_image') ?: Text::_('TPL_WMARKA_SEO_OG_IMAGE_DEFAULT');
        $this->doc->setMetaData('og:image', Uri::root() . ltrim((string)$img, '/'), 'property');
    }

    private function setTwitterCard(): void
    {
        $this->doc->setMetaData('twitter:card', 'summary_large_image');
        $this->doc->setMetaData('twitter:site', Text::_('TPL_WMARKA_SEO_TWITTER_SITE'));
        $this->doc->setMetaData('twitter:title', $this->doc->getTitle());
    }

    private function setJsonLd(): void
    {
        $scripts = [];
        $scripts[] = $this->getOrgData();
        $scripts[] = $this->getBreadcrumbData();

        if ($this->option === 'com_content' && $this->view === 'article') {
            $scripts[] = $this->getArticleData();
        } elseif ($this->option === 'com_contact' && $this->view === 'contact') {
            $scripts[] = $this->getContactData();
        }

        foreach ($scripts as $data) {
            if (!empty($data)) {
                $this->doc->addScriptDeclaration(
                    json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
                    'application/ld+json'
                );
            }
        }
    }

    private function getOrgData(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type'    => Text::_('TPL_WMARKA_SEO_ORG_TYPE'),
            'name'     => Text::_('TPL_WMARKA_SEO_ORG_NAME'),
            'url'      => Uri::root(),
            'logo'     => Uri::root() . Text::_('TPL_WMARKA_SEO_ORG_LOGO'),
            'sameAs'   => array_values(array_filter([
                Text::_('TPL_WMARKA_SEO_SOCIAL_INST'),
                Text::_('TPL_WMARKA_SEO_SOCIAL_FB')
            ]))
        ];
    }

    private function getBreadcrumbData(): array
    {
        $pathway = $this->app->getPathway()->getPathway();
        if (empty($pathway)) return [];

        $items = [
            [
                '@type'    => 'ListItem',
                'position' => 1,
                'name'     => 'Главная',
                'item'     => Uri::root()
            ]
        ];

        foreach ($pathway as $idx => $node) {
            $items[] = [
                '@type'    => 'ListItem',
                'position' => $idx + 2,
                'name'     => $node->name,
                'item'     => Uri::root() . ltrim(Route::_($node->link), '/')
            ];
        }

        return [
            '@context'        => 'https://schema.org',
            '@type'           => 'BreadcrumbList',
            'itemListElement' => $items
        ];
    }

    private function getArticleData(): array
    {
        $img = $this->app->get('current_item_image') ?: Text::_('TPL_WMARKA_SEO_OG_IMAGE_DEFAULT');
        return [
            '@context'      => 'https://schema.org',
            '@type'         => 'NewsArticle',
            'headline'      => $this->doc->getTitle(),
            'image'         => [Uri::root() . ltrim((string)$img, '/')],
            'datePublished' => $this->app->get('current_item_publish_date', date('c')),
            'author'        => [
                '@type' => 'Organization',
                'name'  => Text::_('TPL_WMARKA_SEO_ORG_NAME')
            ]
        ];
    }

    private function getContactData(): array
    {
        return [
            '@context'  => 'https://schema.org',
            '@type'     => 'Place',
            'address'   => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => Text::_('TPL_WMARKA_SEO_STREET'),
                'addressLocality' => Text::_('TPL_WMARKA_SEO_CITY'),
                'addressCountry'  => Text::_('TPL_WMARKA_SEO_COUNTRY')
            ],
            'geo'       => [
                '@type'     => 'GeoCoordinates',
                'latitude'  => Text::_('TPL_WMARKA_SEO_LAT'),
                'longitude' => Text::_('TPL_WMARKA_SEO_LONG')
            ],
            'telephone' => Text::_('TPL_WMARKA_SEO_TEL')
        ];
    }
}
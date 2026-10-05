<?php
/**
 * WMARKA — хелпер каркаса страницы (index.php и партиалы).
 */

declare(strict_types=1);

namespace Wmarka\Template;

\defined('_JEXEC') or die;

use Joomla\CMS\Document\HtmlDocument;
use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

final class Helper
{
    public HtmlDocument $doc;

    private ?bool $home = null;

    /** @var array<string, string>|null */
    private static ?array $contactsCache = null;

    public function __construct(HtmlDocument $doc)
    {
        $this->doc = $doc;
    }

    /** Главная — по пункту меню по умолчанию (надёжно при SEF и мультиязычности) */
    public function isHome(): bool
    {
        if ($this->home === null) {
            $app    = Factory::getApplication();
            $menu   = $app->getMenu();
            $active = $menu->getActive();

            $this->home = $active !== null
                && ($active === $menu->getDefault($app->getLanguage()->getTag()) || $active === $menu->getDefault('*'));
        }

        return $this->home;
    }

    /** CSS-класс страницы из пункта меню (токены wm-wide, wm-blank и т. п.) */
    public function pageClass(): string
    {
        $active = Factory::getApplication()->getMenu()->getActive();

        return $active ? trim((string) $active->getParams()->get('pageclass_sfx', '')) : '';
    }

    public function hasToken(string $token): bool
    {
        return \in_array($token, preg_split('/\s+/', $this->pageClass()) ?: [], true);
    }

    public function bodyClass(): string
    {
        $app    = Factory::getApplication();
        $input  = $app->getInput();
        $active = $app->getMenu()->getActive();

        $classes = [
            'site-' . Config::NAME,
            'option-' . str_replace('com_', '', $input->getCmd('option', '')),
            'view-' . $input->getCmd('view', 'none'),
            'layout-' . $input->getCmd('layout', 'default'),
            'itemid-' . ($active ? (int) $active->id : 0),
        ];

        if ($this->isHome()) {
            $classes[] = 'is-home';
        }

        foreach (preg_split('/\s+/', $this->pageClass()) ?: [] as $token) {
            if ($token !== '' && preg_match('/^[a-z0-9_-]+$/i', $token)) {
                $classes[] = $token;
            }
        }

        return implode(' ', $classes);
    }

    /** Подключение партиала: partial/{name}.php, $this внутри — Helper */
    public function partial(string $name, array $data = []): string
    {
        $file = JPATH_THEMES . '/' . Config::NAME . '/partial/' . basename($name, '.php') . '.php';

        // Дочерний шаблон может переопределить партиал
        $child = JPATH_THEMES . '/' . $this->doc->template . '/partial/' . basename($name, '.php') . '.php';

        if ($this->doc->template !== Config::NAME && is_file($child)) {
            $file = $child;
        }

        if (!is_file($file)) {
            return '';
        }

        extract($data, EXTR_SKIP);
        ob_start();
        include $file;

        return (string) ob_get_clean();
    }

    public function count(string $position): int
    {
        return (int) $this->doc->countModules($position);
    }

    public function modules(string $position, string $style = 'wmarka'): string
    {
        return '<jdoc:include type="modules" name="' . Ui::esc($position) . '" style="' . Ui::esc($style) . '" />';
    }

    /** Все модули позиции со стилем blank/none → лендинговая позиция без обёртки */
    public function isBare(string $position): bool
    {
        $modules = ModuleHelper::getModules($position);

        if (!$modules) {
            return false;
        }

        foreach ($modules as $module) {
            $style = (string) (json_decode((string) $module->params)->style ?? '');
            $style = str_contains($style, '-') ? substr($style, strrpos($style, '-') + 1) : $style;

            if (!\in_array($style, ['blank', 'none'], true)) {
                return false;
            }
        }

        return true;
    }

    /** Блочная позиция: секция + контейнер + сетка (или без обёртки для лендинговых модулей) */
    public function block(string $position, string $sectionClass = ''): string
    {
        $count = $this->count($position);

        if (!$count) {
            return '';
        }

        if ($this->isBare($position)) {
            return $this->modules($position, 'none');
        }

        // Чередование фона: каждая вторая обёрнутая блочная позиция — приглушённая,
        // чтобы секции не сливались в одну ленту
        static $wrapped = 0;
        $wrapped++;

        $style   = Config::str('blocks_style', 'default');
        $style   = (Config::bool('blocks_alternate', true) && $wrapped % 2 === 0) ? ($style === 'muted' ? 'default' : 'muted') : $style;
        $padding = Config::str('blocks_padding', '');
        $cols    = Config::str('blocks_cols', 'auto');
        $n       = $cols === 'auto' ? min($count, 4) : max(1, (int) $cols);
        $class   = trim('uk-section uk-section-' . $style . ($padding !== '' ? ' uk-section-' . $padding : '') . ' ' . $sectionClass);

        return '<section id="' . Ui::esc($position) . '" class="' . Ui::esc($class) . '">'
            . '<div class="' . Config::container() . '">'
            . '<div class="' . Ui::gutter(Config::str('blocks_gutter', 'medium')) . ' ' . Ui::columns($n) . ' uk-grid-match" uk-grid>'
            . $this->modules($position, 'wmarka')
            . '</div></div></section>';
    }

    /** Логотип: картинка из настроек и/или название со слоганом */
    public function logo(string $context = 'navbar'): string
    {
        $mode   = Config::str('logo_mode', 'auto');
        $image  = Image::clean(Config::str($context === 'footer' && Config::str('logo_footer') !== '' ? 'logo_footer' : 'logo_image'));
        $title  = Config::siteTitle();
        $slogan = Config::str('site_slogan');
        $html   = '';

        $showImage = $image !== '' && $mode !== 'text';
        $showText  = $mode === 'text' || $mode === 'both' || !$showImage;

        if ($showImage) {
            $width  = max(0, Config::int('logo_width', 160));
            $src    = Image::isRemote($image) ? $image : Uri::root(true) . '/' . $image;
            [$w, $h] = Image::isRemote($image) ? [0, 0] : Image::size($image);
            $height = ($w && $h && $width) ? (int) round($width * $h / $w) : 0;
            $html  .= '<img src="' . Ui::esc($src) . '"' . ($width ? ' width="' . $width . '"' : '') . ($height ? ' height="' . $height . '"' : '')
                . ' alt="' . Ui::esc(Config::str('logo_alt') ?: $title) . '">';
        }

        if ($showText) {
            $text = '<span class="uk-display-block">' . Ui::esc($title) . '</span>';

            if ($slogan !== '' && $context !== 'offcanvas' && Config::bool('logo_slogan', true)) {
                $text .= '<span class="uk-display-block uk-text-meta uk-text-small uk-margin-remove uk-visible@m">' . Ui::esc($slogan) . '</span>';
            }

            $html .= $showImage ? '<span class="uk-margin-small-left">' . $text . '</span>' : $text;
        }

        $class = 'uk-logo' . ($context === 'navbar' ? ' uk-navbar-item' : '') . ($showImage && $showText ? ' uk-flex uk-flex-middle' : '');

        // На главной логотип не ссылается сам на себя
        return $this->isHome()
            ? '<div class="' . $class . '">' . $html . '</div>'
            : '<a href="' . Ui::esc(Uri::base(true) . '/') . '" class="' . $class . '" aria-label="' . Ui::esc($title . ' — ' . Text::_('TPL_WMARKA_HOME')) . '">' . $html . '</a>';
    }

    /**
     * Контакты из настроек шаблона (с фолбэком на константы 3.0.x).
     *
     * @return array<string, array{value:string,href:string,label:string}>
     */
    public static function contacts(): array
    {
        if (self::$contactsCache !== null) {
            return self::$contactsCache;
        }

        $out   = [];
        $phone = Config::text('contact_phone', ['TPL_WMARKA_SEO_TEL']);

        if ($phone !== '') {
            $digits       = preg_replace('/[^\d+]/', '', $phone) ?? '';
            $out['phone'] = ['value' => $digits, 'href' => 'tel:' . $digits, 'label' => Config::text('contact_phone_label', ['TPL_WMARKA_SEO_TEL_DISPLAY'], $phone)];
        }

        $phone2 = Config::str('contact_phone2');

        if ($phone2 !== '') {
            $digits        = preg_replace('/[^\d+]/', '', $phone2) ?? '';
            $out['phone2'] = ['value' => $digits, 'href' => 'tel:' . $digits, 'label' => $phone2];
        }

        $email = Config::text('contact_email', ['TPL_WMARKA_TOPBAR_EMAIL']);

        if ($email !== '' && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $out['email'] = ['value' => $email, 'href' => 'mailto:' . $email, 'label' => $email];
        }

        $wa = Config::text('contact_whatsapp', ['TPL_WMARKA_SEO_TEL_WHATSAPP', 'TPL_WMARKA_TOPBAR_WHATSAPP']);

        if ($wa !== '') {
            $href = preg_match('#^https?://#', $wa) ? $wa : 'https://wa.me/' . preg_replace('/\D/', '', $wa);
            $msg  = Config::text('contact_whatsapp_text', ['TPL_WMARKA_SEO_TEL_WHATSAPP_MESSAGE']);

            if ($msg !== '' && !str_contains($href, 'text=')) {
                $href .= (str_contains($href, '?') ? '&' : '?') . 'text=' . rawurlencode($msg);
            }

            $out['whatsapp'] = ['value' => $wa, 'href' => $href, 'label' => 'WhatsApp'];
        }

        $tg = Config::text('contact_telegram', ['TPL_WMARKA_TOPBAR_TELEGRAM']);

        if ($tg !== '') {
            $href            = preg_match('#^https?://#', $tg) ? $tg : 'https://t.me/' . ltrim($tg, '@');
            $out['telegram'] = ['value' => $tg, 'href' => $href, 'label' => 'Telegram'];
        }

        $address = Config::str('contact_address');

        if ($address !== '') {
            $map            = Config::str('contact_map');
            $out['address'] = ['value' => $address, 'href' => preg_match('#^https?://#', $map) ? $map : '', 'label' => $address];
        }

        $hours = Config::str('contact_hours');

        if ($hours !== '') {
            $out['hours'] = ['value' => $hours, 'href' => '', 'label' => $hours];
        }

        return self::$contactsCache = $out;
    }

    /** Иконки контактов по ключам */
    /**
     * Контакт автора материала (com_contact, связанный с пользователем Joomla): имя, должность,
     * аватар и ссылка на страницу автора, где ядро выводит список его материалов.
     */
    public static function authorContact(int $userId): ?array
    {
        static $cache = [];

        if ($userId <= 0) {
            return null;
        }

        if (!\array_key_exists($userId, $cache)) {
            $db  = \Joomla\CMS\Factory::getContainer()->get(\Joomla\Database\DatabaseInterface::class);
            $row = $db->setQuery(
                $db->getQuery(true)
                    ->select($db->quoteName(['c.id', 'c.alias', 'c.catid', 'c.name', 'c.con_position', 'c.image', 'c.language']))
                    ->from($db->quoteName('#__contact_details', 'c'))
                    ->where($db->quoteName('c.user_id') . ' = ' . $userId)
                    ->where($db->quoteName('c.published') . ' = 1')
                    ->order($db->quoteName('c.id') . ' ASC'),
                0,
                1
            )->loadObject();

            $cache[$userId] = $row ? [
                'name'     => (string) $row->name,
                'position' => (string) $row->con_position,
                'image'    => Image::thumb(Image::clean((string) $row->image), 'avatar', false),
                'link'     => \Joomla\CMS\Router\Route::_(\Joomla\Component\Contact\Site\Helper\RouteHelper::getContactRoute($row->id . ':' . $row->alias, $row->catid, $row->language)),
            ] : null;
        }

        return $cache[$userId];
    }

    public static function contactIcon(string $key): string
    {
        return [
            'phone' => 'receiver', 'phone2' => 'receiver', 'email' => 'mail', 'whatsapp' => 'whatsapp',
            'telegram' => 'telegram', 'address' => 'location', 'hours' => 'clock',
        ][$key] ?? 'info';
    }

    /** Модули меню навбара, перерисованные вертикально для оффканваса */
    public function offcanvasMenus(): string
    {
        if ($this->count('offcanvas-menu')) {
            return $this->modules('offcanvas-menu', 'none');
        }

        if (!Config::bool('offcanvas_auto', true)) {
            return '';
        }

        $html = '';

        foreach (['navbar-left', 'navbar-center', 'navbar-right'] as $position) {
            foreach (ModuleHelper::getModules($position) as $module) {
                if ($module->module !== 'mod_menu') {
                    continue;
                }

                $clone           = clone $module;
                $clone->position = 'offcanvas';
                $html .= ModuleHelper::renderModule($clone, ['style' => 'none']);
            }
        }

        return $html;
    }

    public function hasOffcanvas(): bool
    {
        if ($this->count('offcanvas-menu') || $this->count('offcanvas')) {
            return true;
        }

        if (Config::bool('offcanvas_auto', true)) {
            foreach (['navbar-left', 'navbar-center', 'navbar-right'] as $position) {
                foreach (ModuleHelper::getModules($position) as $module) {
                    if ($module->module === 'mod_menu') {
                        return true;
                    }
                }
            }
        }

        return Config::bool('offcanvas_contacts', true) && self::contacts() !== [];
    }

    /** Произвольный код из настроек (head / начало body / конец body) */
    public function code(string $where): string
    {
        $code = (string) Config::get('code_' . $where, '');

        return $code !== '' ? $code . "\n" : '';
    }

    /** Подключение ассетов через WebAssetManager (joomla.asset.json в папке шаблона) */
    public function assets(): void
    {
        $wa       = $this->doc->getWebAssetManager();
        $registry = $wa->getRegistry();

        if (!$registry->exists('style', 'template.wmarka.uikit')) {
            $registry->addRegistryFile('templates/' . Config::NAME . '/joomla.asset.json');
        }

        $direct = !$registry->exists('style', 'template.wmarka.uikit');
        $media  = Config::mediaPath();

        $style = static function (string $name, string $file, array $deps = []) use ($wa, $direct, $media): void {
            $direct ? $wa->registerAndUseStyle($name, $media . '/css/' . $file, ['version' => 'auto'], [], $deps) : $wa->useStyle($name);
        };
        $script = static function (string $name, string $file, array $deps = []) use ($wa, $direct, $media): void {
            $direct ? $wa->registerAndUseScript($name, $media . '/js/' . $file, ['version' => 'auto'], ['defer' => true], $deps) : $wa->useScript($name);
        };

        if (Config::str('font', 'system') === 'noto') {
            $style('template.wmarka.fonts', 'fonts.css');

            foreach (['Regular', 'Bold'] as $weight) {
                $this->doc->addHeadLink(Config::mediaUrl('fonts/subset-NotoSansSemiCondensed-' . $weight . '.woff2'), 'preload', 'rel', ['as' => 'font', 'type' => 'font/woff2', 'crossorigin' => 'anonymous']);
            }
        }

        $style('template.wmarka.uikit', 'uikit.min.css');

        if (Config::bool('core_bridge', true)) {
            $style('template.wmarka.core', 'wmarka.css', ['template.wmarka.uikit']);
        }

        if (Config::bool('nocaps', true)) {
            $style('template.wmarka.nocaps', 'nocaps.css', ['template.wmarka.uikit']);
        }

        $script('template.wmarka.uikit', 'uikit.min.js');

        if (Config::bool('uikit_icons', true)) {
            $script('template.wmarka.icons', 'uikit-icons.min.js', ['template.wmarka.uikit']);
        }

        $script('template.wmarka', 'wmarka.js', ['template.wmarka.uikit']);

        // Пользовательские файлы: отсутствующий файл Joomla молча пропускает
        if (!$direct) {
            $wa->useStyle('template.user')->useScript('template.user');
        } elseif (is_file(JPATH_ROOT . '/' . $media . '/css/user.css')) {
            $wa->registerAndUseStyle('template.user', $media . '/css/user.css', ['version' => 'auto'], [], ['template.wmarka.uikit']);
        }

        if (Config::bool('disable_bootstrap', true)) {
            foreach (['bootstrap.css', 'fontawesome'] as $name) {
                if ($registry->exists('style', $name)) {
                    $wa->disableStyle($name);
                }
            }
        }
    }

    /** Мета-теги, фавиконки, цвет темы */
    public function meta(): void
    {
        $this->doc->setMetaData('viewport', 'width=device-width, initial-scale=1');
        $this->doc->setGenerator(Config::str('generator', ''));

        $color = Config::str('theme_color', '#ffffff');

        if (preg_match('/^#[0-9a-f]{3,8}$/i', $color)) {
            $this->doc->setMetaData('theme-color', $color);
        }

        if (!Config::bool('favicons', true)) {
            return;
        }

        $folder = trim(Image::clean(Config::str('favicon_folder')), '/') ?: \dirname(Config::mediaFile('images/favicon/favicon-32x32.png'));
        $base   = JPATH_ROOT . '/' . $folder . '/';
        $url    = Uri::root(true) . '/' . $folder . '/';

        $links = [
            ['favicon.svg', 'icon', ['type' => 'image/svg+xml']],
            ['favicon-32x32.png', 'icon', ['type' => 'image/png', 'sizes' => '32x32']],
            ['favicon-16x16.png', 'icon', ['type' => 'image/png', 'sizes' => '16x16']],
            ['apple-touch-icon.png', 'apple-touch-icon', ['sizes' => '180x180']],
            ['site.webmanifest', 'manifest', []],
        ];

        foreach ($links as [$file, $rel, $attribs]) {
            if (is_file($base . $file)) {
                $this->doc->addHeadLink($url . $file, $rel, 'rel', $attribs);
            }
        }

        if (is_file($base . 'favicon.ico')) {
            $this->doc->addFavicon($url . 'favicon.ico');
        }
    }
}

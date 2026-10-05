<?php
/**
 * WMARKA — единый сервис изображений.
 *
 * Зачем он нужен. JUImage называет миниатюру по имени исходника плюс crc32
 * от адреса и набора опций: одинаковый набор опций даёт ровно один файл.
 * Раньше каждый макет просил свой размер (блог, метки, поиск, модули,
 * мобильные варианты), и одно фото плодило до восьми превью. Здесь три
 * профиля, и все места сайта берут их отсюда:
 *
 *  intro — карточки блога, избранное, метки, поиск, ВСЕ модули с картинками,
 *          а также мобильный источник полного изображения;
 *  full  — изображение в полной статье;
 *  og    — JPG 1200×630 для соцсетей (только на странице материала).
 *
 * Итог: не больше двух превью на фото плюс OG. Размеры — в настройках
 * шаблона (вкладка «Изображения»). Без JUImage выводится оригинал.
 */

declare(strict_types=1);

namespace Wmarka\Template;

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Uri\Uri;
use Joomla\Database\DatabaseInterface;
use Joomla\Registry\Registry;

final class Image
{
    private static ?object $engine = null;

    private static ?bool $ready = null;

    /** @var array<string, array> */
    private static array $memo = [];

    /** @var array<string, array{0:int,1:int}> */
    private static array $sizes = [];

    /** @var array<int, object> */
    private static array $articleRows = [];

    /** JUImage, если установлена и не выключена в настройках */
    public static function engine(): ?object
    {
        if (self::$ready === null) {
            self::$ready = false;

            if (Config::bool('img_juimage', true)) {
                $autoload = JPATH_LIBRARIES . '/juimage/vendor/autoload.php';

                if (is_file($autoload)) {
                    require_once $autoload;

                    if (class_exists('\\JUImage\\Image')) {
                        self::$engine = new \JUImage\Image(['root_path' => JPATH_ROOT]);
                        self::$ready  = true;
                    }
                }
            }
        }

        return self::$ready ? self::$engine : null;
    }

    public static function hasEngine(): bool
    {
        return self::engine() !== null;
    }

    /** Нормализует путь: срезает хвост #joomlaImage://, домен и подкаталог сайта */
    public static function clean(?string $src): string
    {
        $src = trim(html_entity_decode((string) $src, ENT_QUOTES, 'UTF-8'));

        if ($src === '') {
            return '';
        }

        $src  = preg_replace('/#joomlaImage:\/\/.*$/', '', $src) ?? $src;
        $root = Uri::root();

        if (str_starts_with($src, $root)) {
            $src = substr($src, \strlen($root));
        }

        $base = Uri::root(true);

        if ($base !== '' && str_starts_with($src, $base . '/')) {
            $src = substr($src, \strlen($base) + 1);
        }

        return self::isRemote($src) ? $src : ltrim($src, '/');
    }

    public static function isRemote(string $src): bool
    {
        return (bool) preg_match('#^(https?:)?//#i', $src);
    }

    public static function isLocal(string $src): bool
    {
        return $src !== '' && !self::isRemote($src) && is_file(JPATH_ROOT . '/' . rawurldecode($src));
    }

    /** Параметры профиля миниатюры */
    public static function profile(string $name): array
    {
        $quality = max(30, min(100, Config::int('img_quality', 75)));
        $format  = Config::str('img_format', 'webp') === 'jpg' ? 'jpg' : 'webp';

        return match ($name) {
            'full' => [
                'w' => max(320, Config::int('img_full_w', 1200)),
                'h' => max(0, Config::int('img_full_h', 800)),
                'q' => $quality,
                'f' => $format,
            ],
            'og' => ['w' => 1200, 'h' => 630, 'q' => 80, 'f' => 'jpg'],
            'avatar' => ['w' => 400, 'h' => 400, 'q' => $quality, 'f' => $format],
            default => [
                'w' => max(120, Config::int('img_intro_w', 720)),
                'h' => max(0, Config::int('img_intro_h', 480)),
                'q' => $quality,
                'f' => $format,
            ],
        };
    }

    /** Заглушка: файл из настроек или штатный placeholder.jpg шаблона */
    public static function placeholder(): string
    {
        if (!Config::bool('img_placeholder', true)) {
            return '';
        }

        $custom = self::clean(Config::str('img_placeholder_file'));

        if ($custom !== '' && self::isLocal($custom)) {
            return $custom;
        }

        $default = Config::mediaFile('images/placeholder.jpg');

        return is_file(JPATH_ROOT . '/' . $default) ? $default : '';
    }

    /**
     * Миниатюра по профилю.
     *
     * @return array{src:string,width:int,height:int,placeholder:bool,source:string}|array{}
     */
    public static function thumb(?string $src, string $profile = 'intro', bool $usePlaceholder = true): array
    {
        $src = self::clean($src);
        $isPlaceholder = false;

        if ($src === '' || (!self::isRemote($src) && !self::isLocal($src))) {
            $src = $usePlaceholder ? self::placeholder() : '';
            $isPlaceholder = true;

            if ($src === '') {
                return [];
            }
        }

        $key = $profile . '|' . $src;

        if (isset(self::$memo[$key])) {
            return self::$memo[$key];
        }

        $p   = self::profile($profile);
        $out = ['src' => '', 'width' => 0, 'height' => 0, 'placeholder' => $isPlaceholder, 'source' => $src];
        $ju  = self::isRemote($src) ? null : self::engine();

        if ($ju !== null) {
            // Порядок ключей — часть имени файла в кэше JUImage: не менять
            $opts = ['w' => (string) $p['w']];

            if ($p['h'] > 0) {
                $opts['h']  = (string) $p['h'];
                $opts['zc'] = '1';
            }

            $opts['q']     = (string) $p['q'];
            $opts['f']     = $p['f'];
            $opts['cache'] = Config::str('img_cache', 'img') ?: 'img';

            try {
                $rel = (string) $ju->render($src, $opts);
            } catch (\Throwable) {
                $rel = '';
            }

            if ($rel !== '' && is_file(JPATH_ROOT . '/' . $rel)) {
                [$w, $h] = self::size($rel);
                $out['src']    = Uri::root(true) . '/' . $rel;
                $out['width']  = $w ?: $p['w'];
                $out['height'] = $h ?: $p['h'];

                return self::$memo[$key] = $out;
            }
        }

        $out['src'] = self::isRemote($src) ? $src : Uri::root(true) . '/' . $src;

        if (!self::isRemote($src)) {
            [$out['width'], $out['height']] = self::size($src);
        }

        return self::$memo[$key] = $out;
    }

    /** Реальные размеры файла (кэшируются на запрос) */
    public static function size(string $rel): array
    {
        if (!isset(self::$sizes[$rel])) {
            $info = @getimagesize(JPATH_ROOT . '/' . rawurldecode($rel));
            self::$sizes[$rel] = $info ? [(int) $info[0], (int) $info[1]] : [0, 0];
        }

        return self::$sizes[$rel];
    }

    /**
     * Источник картинки материала.
     * intro: image_intro → image_fulltext → первая <img> текста;
     * full:  image_fulltext → image_intro (если разрешено) → первая <img>.
     */
    public static function source(object $item, string $prefer = 'intro'): array
    {
        $raw = $item->images ?? ($item->core_images ?? '');

        if ($raw instanceof Registry) {
            $images = $raw->toArray();
        } elseif (\is_string($raw)) {
            $images = json_decode($raw, true) ?: [];
        } else {
            $images = (array) $raw;
        }

        $title = trim(strip_tags((string) ($item->title ?? ($item->core_title ?? ($item->name ?? '')))));
        $order = $prefer === 'full'
            ? (Config::bool('img_full_fallback', true) ? ['fulltext', 'intro'] : ['fulltext'])
            : ['intro', 'fulltext'];

        foreach ($order as $kind) {
            $src = self::clean((string) ($images['image_' . $kind] ?? ''));

            if ($src !== '') {
                return [
                    'src'     => $src,
                    'alt'     => !empty($images['image_' . $kind . '_alt_empty']) ? '' : (trim((string) ($images['image_' . $kind . '_alt'] ?? '')) ?: $title),
                    'caption' => trim((string) ($images['image_' . $kind . '_caption'] ?? '')),
                    'kind'    => $kind,
                ];
            }
        }

        if (Config::bool('img_from_text', true)) {
            $text = (string) ($item->introtext ?? ($item->core_body ?? ($item->text ?? '')));

            if ($text !== '' && preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $text, $m)) {
                $src = self::clean($m[1]);

                if ($src !== '' && !self::isRemote($src)) {
                    return ['src' => $src, 'alt' => $title, 'caption' => '', 'kind' => 'text'];
                }
            }
        }

        return ['src' => '', 'alt' => $title, 'caption' => '', 'kind' => ''];
    }

    /** Интро-миниатюра материала одним вызовом (со srcset, если он возможен) */
    public static function intro(object $item, bool $usePlaceholder = true): array
    {
        $source = self::source($item, 'intro');
        $thumb  = self::responsive($source['src'], $usePlaceholder);

        return $thumb ? $thumb + ['alt' => $source['alt'], 'caption' => $source['caption']] : [];
    }

    /**
     * Интро-миниатюра + srcset из ДВУХ профилей шаблона: intro (720w) и full (1200w).
     *
     * Новых размеров не появляется: full — тот же файл, что показывает полная статья,
     * поэтому на фото по-прежнему не больше двух превью. Кандидаты объединяются,
     * только когда пропорции профилей совпадают (по умолчанию оба 3:2) — иначе браузер
     * подставил бы кадр другой формы. Без JUImage srcset не выводится: оба профиля
     * указывали бы на один оригинал.
     */
    public static function responsive(?string $src, bool $usePlaceholder = true): array
    {
        $intro = self::thumb($src, 'intro', $usePlaceholder);

        if (!$intro || !Config::bool('img_srcset', true) || self::engine() === null) {
            return $intro;
        }

        $full = self::thumb($intro['source'], 'full', false);

        if (!$full || $full['src'] === $intro['src'] || !$intro['height'] || !$full['height'] || $full['width'] <= $intro['width']) {
            return $intro;
        }

        if (abs($intro['width'] / $intro['height'] - $full['width'] / $full['height']) > 0.02) {
            return $intro;
        }

        $intro['srcset'] = $intro['src'] . ' ' . $intro['width'] . 'w, ' . $full['src'] . ' ' . $full['width'] . 'w';

        return $intro;
    }

    /**
     * Атрибут sizes — ширина картинки в раскладке, с учётом ширины контейнера
     * и сайдбаров страницы. $cols > 0 — карточка в сетке из $cols колонок;
     * 0 — карточка-список (картинка в треть карточки); строка — готовое значение;
     * $main = false — позиция во всю ширину контейнера (блочные позиции).
     */
    public static function sizes(int|string $cols = 3, bool $main = true): string
    {
        if (\is_string($cols)) {
            return $cols;
        }

        $container = ['xsmall' => 750, 'small' => 900, 'default' => 1200, 'large' => 1400, 'xlarge' => 1600][Config::str('container', 'default')] ?? 0;
        $fraction  = 1.0;

        if ($main) {
            $side = ['1-5' => 0.2, '1-4' => 0.25, '1-3' => 1 / 3, '2-5' => 0.4][Config::str('sidebar_width', '1-4')] ?? 0.25;

            foreach (['sidebar-a', 'sidebar-b'] as $position) {
                if (ModuleHelper::getModules($position)) {
                    $fraction -= $side;
                }
            }
        }

        $per = $cols <= 0 ? $fraction / 3 : $fraction / $cols;
        $out = [];

        if ($container > 0) {
            $out[] = '(min-width: ' . $container . 'px) ' . (int) round($container * $per) . 'px';
        }

        $out[] = '(min-width: 960px) ' . max(10, (int) round($per * 100)) . 'vw';

        if ($cols > 1) {
            $out[] = '(min-width: 640px) 50vw';
        } elseif ($cols <= 0) {
            $out[] = '(min-width: 640px) 33vw';
        }

        $out[] = '100vw';

        return implode(', ', $out);
    }

    /** Абсолютный URL OG-картинки (JPG 1200×630) или пустая строка */
    public static function og(?string $src): string
    {
        $thumb = self::thumb($src, 'og', false);

        if (!$thumb) {
            return '';
        }

        return self::isRemote($thumb['src']) ? $thumb['src'] : Uri::getInstance()->toString(['scheme', 'host', 'port']) . $thumb['src'];
    }

    /** Тег <img> по готовой миниатюре */
    public static function img(array $thumb, string $alt = '', array $attrs = []): string
    {
        if (!$thumb || ($thumb['src'] ?? '') === '') {
            return '';
        }

        $a = ['src' => $thumb['src']];

        if (!empty($thumb['width']) && !empty($thumb['height'])) {
            $a['width']  = (int) $thumb['width'];
            $a['height'] = (int) $thumb['height'];
        }

        if (!empty($thumb['srcset'])) {
            $a['srcset'] = $thumb['srcset'];
            $a['sizes']  = $attrs['sizes'] ?? self::sizes(3);
        }

        unset($attrs['sizes']);

        $a['alt']      = $alt;
        $a['loading']  = Config::bool('img_lazy', true) ? 'lazy' : null;
        $a['decoding'] = 'async';

        foreach ($attrs as $name => $value) {
            $a[$name] = $value;
        }

        $html = '<img';

        foreach ($a as $name => $value) {
            if ($value === null || $value === false) {
                continue;
            }

            $html .= ' ' . $name . ($value === true ? '' : '="' . htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8') . '"');
        }

        return $html . '>';
    }

    /**
     * Строки материалов по id — для модулей, чьи хелперы картинку не выбирают
     * (mod_related_items, mod_tags_similar). Один запрос на модуль.
     *
     * @param  int[]  $ids
     * @return array<int, object> id → объект (id, title, images, introtext)
     */
    public static function articles(array $ids): array
    {
        $ids  = array_values(array_unique(array_filter(array_map('intval', $ids))));
        $need = array_values(array_diff($ids, array_keys(self::$articleRows)));

        if ($need) {
            try {
                $db    = Factory::getContainer()->get(DatabaseInterface::class);
                $query = $db->createQuery()
                    ->select($db->quoteName(['id', 'title', 'images', 'introtext']))
                    ->from($db->quoteName('#__content'))
                    ->whereIn($db->quoteName('id'), $need);

                foreach ($db->setQuery($query)->loadObjectList() as $row) {
                    self::$articleRows[(int) $row->id] = $row;
                }
            } catch (\Throwable) {
                // без картинок модуль всё равно выведется
            }
        }

        $out = [];

        foreach ($ids as $id) {
            if (isset(self::$articleRows[$id])) {
                $out[$id] = self::$articleRows[$id];
            }
        }

        return $out;
    }
}

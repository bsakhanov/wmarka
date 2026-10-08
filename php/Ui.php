<?php
/**
 * WMARKA — общие помощники вывода для партиалов, оверрайдов и макетов.
 * Всё оформление — классами UIkit 3; здесь только логика.
 */

declare(strict_types=1);

namespace Wmarka\Template;

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

final class Ui
{
    /** Классы Bootstrap из разметки ядра → классы UIkit (мост для неподконтрольного HTML) */
    private const MAP = [
        'form-control' => 'uk-input', 'form-select' => 'uk-select', 'form-check-input' => 'uk-checkbox',
        'form-check' => 'uk-margin-small', 'form-text' => 'uk-text-meta', 'form-label' => 'uk-form-label',
        'btn' => 'uk-button', 'btn-primary' => 'uk-button-primary', 'btn-secondary' => 'uk-button-default',
        'btn-outline-secondary' => 'uk-button-default', 'btn-outline-primary' => 'uk-button-default',
        'btn-success' => 'uk-button-primary', 'btn-danger' => 'uk-button-danger', 'btn-info' => 'uk-button-default',
        'btn-light' => 'uk-button-default', 'btn-link' => 'uk-button-link', 'btn-sm' => 'uk-button-small',
        'btn-lg' => 'uk-button-large', 'visually-hidden' => 'uk-hidden-visually', 'control-group' => 'uk-margin',
        'control-label' => 'uk-form-label', 'controls' => 'uk-form-controls', 'input-group' => 'uk-flex uk-flex-middle',
        'w-100' => 'uk-width-1-1', 'w-auto' => 'uk-width-auto', 'float-start' => 'uk-float-left', 'float-end' => 'uk-float-right',
        'mb-2' => 'uk-margin-small-bottom', 'mb-3' => 'uk-margin-bottom', 'mt-3' => 'uk-margin-top', 'me-2' => 'uk-margin-small-right',
        'alert' => 'uk-alert', 'alert-info' => 'uk-alert-primary', 'alert-success' => 'uk-alert-success',
        'alert-warning' => 'uk-alert-warning', 'alert-danger' => 'uk-alert-danger', 'badge' => 'uk-label',
        'bg-warning' => 'uk-label-warning', 'bg-danger' => 'uk-label-danger', 'bg-success' => 'uk-label-success',
        'bg-secondary' => '', 'bg-info' => '', 'rounded-pill' => '', 'text-light' => '',
        'table' => 'uk-table uk-table-divider', 'table-striped' => 'uk-table-striped', 'table-hover' => 'uk-table-hover',
        'table-bordered' => '', 'table-sm' => 'uk-table-small', 'list-unstyled' => 'uk-list', 'list-group' => 'uk-list uk-list-divider',
        'list-group-item' => '', 'nav-tabs' => 'uk-tab', 'card' => 'uk-card uk-card-default', 'card-body' => 'uk-card-body',
        'card-header' => 'uk-card-header', 'card-footer' => 'uk-card-footer', 'text-muted' => 'uk-text-muted',
        'text-center' => 'uk-text-center', 'fw-bold' => 'uk-text-bold', 'clearfix' => 'uk-clearfix',
        'invalid-feedback' => 'uk-text-danger uk-text-small', 'hasTooltip' => '', 'inputbox' => '',
    ];

    public static function esc(?string $value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }

    /** Типограф: прямые кавычки → «ёлочки» (только текст вне тегов; выключается в настройках) */
    public static function quotes(?string $text): string
    {
        $text = (string) $text;

        if ($text === '' || !str_contains($text, '"') || !Config::bool('typo_quotes', true)) {
            return $text;
        }

        $parts = preg_split('/(<[^>]*>)/u', $text, -1, PREG_SPLIT_DELIM_CAPTURE) ?: [$text];

        foreach ($parts as $i => $part) {
            if ($part === '' || $part[0] === '<') {
                continue;
            }

            $part      = preg_replace('/(^|[\s(\[{«—–\-\/])"(?=\S)/u', '$1«', $part) ?? $part;
            $parts[$i] = str_replace('"', '»', $part);
        }

        return implode('', $parts);
    }

    /** Заголовок: типограф + экранирование */
    public static function title(?string $raw): string
    {
        return self::esc(self::quotes(html_entity_decode((string) $raw, ENT_QUOTES, 'UTF-8')));
    }

    public static function validDate(?string $date): bool
    {
        return $date !== null && $date !== '' && !str_starts_with($date, '0000');
    }

    public static function date(?string $date, string $format = 'DATE_FORMAT_LC3'): string
    {
        return self::validDate($date) ? HTMLHelper::_('date', $date, Text::_($format)) : '';
    }

    /**
     * Дата в подаче новостных сайтов: «Сегодня, 14:32», «Вчера, 18:50», «2 октября, 17:14»,
     * «2 октября 2025». $mode: card — для карточек; full — для статьи («18:11, 2 октября 2026»);
     * short — для ленты («14:32» сегодня, иначе «02.10»). Настройка «Подача даты»: relative
     * включает эту подачу, joomla — формат ядра.
     */
    public static function newsDate(?string $date, string $mode = 'card'): string
    {
        if (!self::validDate($date)) {
            return '';
        }

        if (Config::str('date_style', 'relative') !== 'relative') {
            return $mode === 'short' ? HTMLHelper::_('date', $date, 'd.m') : self::date($date);
        }

        $local = HTMLHelper::_('date', $date, 'Y-m-d H:i');
        $today = HTMLHelper::_('date', 'now', 'Y-m-d');
        $yest  = HTMLHelper::_('date', '-1 day', 'Y-m-d');
        [$day, $time] = explode(' ', $local);
        [$y, $m, $d]  = array_map('intval', explode('-', $day));
        $month = Text::_('TPL_WMARKA_MONTH_' . $m);

        if ($mode === 'short') {
            return $day === $today ? $time : \sprintf('%02d.%02d', $d, $m);
        }

        if ($day === $today || $day === $yest) {
            $word = Text::_($day === $today ? 'TPL_WMARKA_TODAY' : 'TPL_WMARKA_YESTERDAY');

            return $mode === 'full' ? $time . ', ' . mb_strtolower($word) : $word . ', ' . $time;
        }

        if ($mode === 'full') {
            return $time . ', ' . $d . ' ' . $month . ' ' . $y;
        }

        return $y === (int) HTMLHelper::_('date', 'now', 'Y') ? $d . ' ' . $month . ', ' . $time : $d . ' ' . $month . ' ' . $y;
    }

    /** Метки материала как хэштеги «#Город» (до $max штук) */
    public static function hashtags(array $tags, int $max = 2): string
    {
        $out = [];

        foreach (\array_slice($tags, 0, $max) as $tag) {
            $link  = \Joomla\CMS\Router\Route::_(\Joomla\Component\Tags\Site\Helper\RouteHelper::getComponentTagRoute($tag->tag_id . ':' . $tag->alias, $tag->language ?? '*'));
            $out[] = '<a class="uk-link-muted" href="' . $link . '">#' . self::esc($tag->title) . '</a>';
        }

        return implode(' ', $out);
    }

    /** Значок видео- или фотоновости по метке (настройки «Метка видеоновостей», «Метка фотоновостей») */
    public static function mediaKind(array $tags): string
    {
        $aliases = array_map(static fn ($t) => (string) ($t->alias ?? ''), $tags);

        foreach (['video' => Config::str('video_tag', 'video'), 'photo' => Config::str('photo_tag', 'foto')] as $kind => $alias) {
            if ($alias !== '' && \in_array($alias, $aliases, true)) {
                return $kind;
            }
        }

        return '';
    }

    public static function iso(?string $date): string
    {
        return self::validDate($date) ? HTMLHelper::_('date', $date, 'c') : '';
    }

    /**
     * Дозированный анонс: HTML → чистый текст, обрезка по границе слова до $limit символов, «…».
     * $limit = 0 — вводный текст как есть, с разметкой (поведение ядра Joomla).
     */
    public static function excerpt(?string $html, int $limit): string
    {
        $html = (string) $html;

        if ($limit <= 0 || trim($html) === '') {
            return $html;
        }

        $text = preg_replace('#<(script|style|figure|iframe|table)[^>]*>.*?</\1>#is', ' ', $html) ?? $html;
        $text = preg_replace('/\{[a-z][^}]*\}/i', ' ', $text) ?? $text;
        $text = preg_replace('#</(p|div|li|h[1-6]|blockquote|tr)>|<br\s*/?>#i', ' ', $text) ?? $text;
        $text = html_entity_decode(strip_tags($text), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $text = trim(preg_replace('/\s+/u', ' ', $text) ?? $text);

        if ($text === '') {
            return '';
        }

        $text = self::cut($text, $limit);

        return '<p>' . self::esc(self::quotes($text)) . '</p>';
    }

    /** Обрезка строки по границе слова с «…» (заголовки в навигации, подсказки) */
    public static function cut(string $text, int $limit): string
    {
        $text = trim(preg_replace('/\s+/u', ' ', strip_tags($text)) ?? $text);

        if ($limit <= 0 || mb_strlen($text) <= $limit) {
            return $text;
        }

        $cut   = mb_substr($text, 0, $limit + 1);
        $space = mb_strrpos($cut, ' ');

        return rtrim(mb_substr($cut, 0, ($space !== false && $space > $limit * 0.6) ? $space : $limit), " ,.;:—–-") . '…';
    }

    /** Лимит анонса: значение пункта меню (wm_intro_limit) → настройка шаблона */
    public static function introLimit(?\Joomla\Registry\Registry $params = null): int
    {
        $menu = $params ? $params->get('wm_intro_limit', '') : '';

        return ($menu !== '' && $menu !== null) ? max(0, (int) $menu) : max(0, Config::int('intro_limit', 200));
    }

    /** Время чтения в минутах (200 слов в минуту) */
    public static function readMinutes(?string $html): int
    {
        $words = \count(preg_split('/\s+/u', trim(strip_tags((string) $html))) ?: []);

        return max(1, (int) round($words / 200));
    }

    /** «5 минут» с правильным склонением для ru/uk/be и формами one/many для прочих языков */
    public static function minutes(int $n): string
    {
        return $n . ' ' . self::plural($n, 'TPL_WMARKA_MINUTE_ONE', 'TPL_WMARKA_MINUTE_FEW', 'TPL_WMARKA_MINUTE_MANY');
    }

    public static function plural(int $n, string $one, string $few, string $many): string
    {
        $tag = substr(Factory::getApplication()->getLanguage()->getTag(), 0, 2);

        if (\in_array($tag, ['ru', 'uk', 'be'], true)) {
            $mod10  = $n % 10;
            $mod100 = $n % 100;
            $key    = ($mod10 === 1 && $mod100 !== 11) ? $one : (($mod10 >= 2 && $mod10 <= 4 && ($mod100 < 12 || $mod100 > 14)) ? $few : $many);
        } else {
            $key = $n === 1 ? $one : $many;
        }

        return Text::_($key);
    }

    public static function icon(string $name, float $ratio = 1.0, string $class = ''): string
    {
        return '<span' . ($class !== '' ? ' class="' . self::esc($class) . '"' : '') . ' uk-icon="icon: ' . self::esc($name)
            . ($ratio !== 1.0 ? '; ratio: ' . $ratio : '') . '" aria-hidden="true"></span>';
    }

    /** Иконочные шрифты ядра (icon-*) → иконки UIkit */
    private const ICONS = [
        'eye' => 'eye', 'eye-slash' => 'eye-slash', 'calendar' => 'calendar', 'search' => 'search', 'times' => 'close', 'cancel' => 'close',
        'check' => 'check', 'plus' => 'plus', 'minus' => 'minus', 'edit' => 'pencil', 'pencil' => 'pencil', 'copy' => 'copy', 'lock' => 'lock',
        'user' => 'user', 'envelope' => 'mail', 'mail' => 'mail', 'info-circle' => 'info', 'question-circle' => 'question', 'trash' => 'trash',
        'upload' => 'upload', 'download' => 'download', 'refresh' => 'refresh', 'folder' => 'folder', 'image' => 'image', 'images' => 'image',
    ];

    /** Мост разметки ядра: переписывает class="…" токенами UIkit, иконки ядра — иконками UIkit */
    public static function bridge(string $html): string
    {
        $html = preg_replace_callback('/<span class="icon-([a-z-]+)[^"]*"([^>]*)><\/span>/', static function (array $m): string {
            return isset(self::ICONS[$m[1]]) ? '<span uk-icon="icon: ' . self::ICONS[$m[1]] . '; ratio: 0.9"' . $m[2] . '></span>' : $m[0];
        }, $html) ?? $html;

        $html = preg_replace_callback('/<textarea\b([^>]*)class="([^"]*)"/i', static function (array $m): string {
            return '<textarea' . $m[1] . 'class="' . str_replace('form-control', 'uk-textarea', $m[2]) . '"';
        }, $html) ?? $html;

        return preg_replace_callback('/\bclass="([^"]*)"/', static function (array $m): string {
            $out = [];

            foreach (preg_split('/\s+/', trim($m[1])) ?: [] as $token) {
                if ($token === '') {
                    continue;
                }

                $mapped = self::MAP[$token] ?? $token;

                if ($mapped !== '') {
                    array_push($out, ...explode(' ', $mapped));
                }
            }

            return 'class="' . implode(' ', array_unique($out)) . '"';
        }, $html) ?? $html;
    }

    /**
     * Переключатель «сетка / список».
     * Работает через data-атрибуты: элементы с data-wm-grid / data-wm-list внутри
     * [data-wm-switch] получают соответствующие наборы классов UIkit (js/wmarka.js).
     */
    public static function viewSwitch(string $default = 'grid'): string
    {
        $grid = Text::_('TPL_WMARKA_VIEW_GRID');
        $list = Text::_('TPL_WMARKA_VIEW_LIST');

        // Иконки — встроенный SVG: кнопки видны даже без набора uikit-icons и при любом оптимизаторе
        // Иконки «сетка» и «список» — геометрия из набора UIkit (grid, list), вписанная прямо
        // в разметку: вид тот же, что у uk-icon, но кнопки не зависят от загрузки uikit-icons.js
        $svgGrid = '<span class="uk-icon"><svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><rect width="3" height="3" x="2" y="2"/><rect width="3" height="3" x="8" y="2"/><rect width="3" height="3" x="14" y="2"/><rect width="3" height="3" x="2" y="8"/><rect width="3" height="3" x="8" y="8"/><rect width="3" height="3" x="14" y="8"/><rect width="3" height="3" x="2" y="14"/><rect width="3" height="3" x="8" y="14"/><rect width="3" height="3" x="14" y="14"/></svg></span>';
        $svgList = '<span class="uk-icon"><svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><rect width="12" height="1" x="6" y="4"/><rect width="12" height="1" x="6" y="9"/><rect width="12" height="1" x="6" y="14"/><rect width="2" height="1" x="2" y="4"/><rect width="2" height="1" x="2" y="9"/><rect width="2" height="1" x="2" y="14"/></svg></span>';

        return '<div class="uk-button-group" role="group" aria-label="' . self::esc(Text::_('TPL_WMARKA_VIEW_SWITCH')) . '">'
            . '<button type="button" class="uk-button uk-button-default uk-button-small' . ($default === 'grid' ? ' uk-active' : '') . '" data-wm-set-view="grid" aria-label="' . self::esc($grid) . '" title="' . self::esc($grid) . '">' . $svgGrid . '</button>'
            . '<button type="button" class="uk-button uk-button-default uk-button-small' . ($default === 'list' ? ' uk-active' : '') . '" data-wm-set-view="list" aria-label="' . self::esc($list) . '" title="' . self::esc($list) . '">' . $svgList . '</button>'
            . '</div>';
    }

    /** Атрибуты переключаемого элемента: текущие классы + оба набора */
    public static function switchAttr(string $view, string $gridClass, string $listClass, string $always = ''): string
    {
        $current = trim($always . ' ' . ($view === 'list' ? $listClass : $gridClass));

        return 'class="' . self::esc($current) . '" data-wm-grid="' . self::esc($gridClass) . '" data-wm-list="' . self::esc($listClass) . '"';
    }

    /** Сетка UIkit: класс зазора по ключу настроек */
    public static function gutter(string $key): string
    {
        return match ($key) {
            'collapse' => 'uk-grid-collapse',
            'small'    => 'uk-grid-small',
            'large'    => 'uk-grid-large',
            default    => 'uk-grid-medium',
        };
    }

    /** Колонки сетки: 1 на мобильном, 2 от @s, N от @m */
    public static function columns(int $n): string
    {
        $n = max(1, min(6, $n));

        return $n === 1 ? 'uk-child-width-1-1' : 'uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-' . $n . '@m';
    }

    /** Выбор «Кол-во на странице» ядра в компактном виде UIkit */
    public static function limitBox(string $html): string
    {
        return str_replace('class="uk-select"', 'class="uk-select uk-form-small uk-form-width-xsmall"', self::bridge($html));
    }

    /** Безопасный тег заголовка */
    public static function htag(?string $tag, string $default = 'h3'): string
    {
        return \in_array($tag, ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'div'], true) ? $tag : $default;
    }

    /**
     * Таблицы в тексте материала — на сервере, до первого кадра и без JavaScript
     * (по разбору VRK News: широкая таблица раздвигала страницу на телефоне).
     * Для каждой таблицы верхнего уровня:
     *  - классы uk-table uk-table-divider uk-table-small, если своих uk-table нет;
     *  - <td> в <thead> → <th scope="col">; шапка из одних <th> в начале <tbody> переносится в <thead>;
     *  - uk-table-responsive (до 959 px ячейки идут столбиком) и подписи столбцов в data-label
     *    каждой ячейки — UIkit прячет <thead> в такой раскладке; если подписи разложить
     *    нельзя (слияние ячеек, строки разной длины), таблица остаётся таблицей с прокруткой;
     *  - обёртка <div class="uk-overflow-auto">, снятые устаревшие width и height.
     * Разбирается только сама таблица, остальной текст не трогается. Повторный вызов
     * ничего не меняет (data-wm-table). Скрипт шаблона остаётся запасным путём.
     */
    public static function tables(string $html): string
    {
        if (stripos($html, '<table') === false || !class_exists(\DOMDocument::class)) {
            return $html;
        }

        $out = '';
        $pos = 0;

        while (($start = stripos($html, '<table', $pos)) !== false) {
            $depth = 0;
            $end   = null;
            $i     = $start;

            while (preg_match('~<(/?)table\b[^>]*>~i', $html, $m, PREG_OFFSET_CAPTURE, $i)) {
                $depth += $m[1][0] === '/' ? -1 : 1;
                $i      = $m[0][1] + \strlen($m[0][0]);

                if ($depth === 0) {
                    $end = $i;
                    break;
                }
            }

            if ($end === null) {
                break;
            }

            $before  = substr($html, $pos, $start - $pos);
            $wrapped = (bool) preg_match('~<div\b[^>]*\bclass="[^"]*\buk-overflow-auto\b[^"]*"[^>]*>\s*$~i', $before);
            $out    .= $before . self::table(substr($html, $start, $end - $start), $wrapped);
            $pos     = $end;
        }

        return $out . substr($html, $pos);
    }

    /** Одна таблица верхнего уровня (см. tables()) */
    private static function table(string $source, bool $wrapped): string
    {
        if (preg_match('~^<table\b[^>]*\bdata-wm-table\b~i', $source)) {
            return $source;
        }

        $doc      = new \DOMDocument('1.0', 'UTF-8');
        $previous = libxml_use_internal_errors(true);
        $loaded   = $doc->loadHTML('<?xml encoding="UTF-8"?><html><body>' . $source . '</body></html>', LIBXML_NONET);
        libxml_clear_errors();
        libxml_use_internal_errors($previous);

        $table = $loaded ? $doc->getElementsByTagName('table')->item(0) : null;

        if (!$table instanceof \DOMElement) {
            return $source;
        }

        $xp = new \DOMXPath($doc);

        // Устаревшие размеры — у самой таблицы и её строк и ячеек (вложенные таблицы не трогаем)
        foreach (array_merge([$table], iterator_to_array($xp->query('./thead/tr | ./tbody/tr | ./tfoot/tr | ./tr | ./*/tr/* | ./tr/* | ./colgroup/col | ./col', $table)))  as $el) {
            if ($el instanceof \DOMElement) {
                $el->removeAttribute('width');
                $el->removeAttribute('height');
            }
        }

        $rename = static function (\DOMElement $cell) use ($doc): \DOMElement {
            $th = $doc->createElement('th');

            foreach (iterator_to_array($cell->attributes) as $attr) {
                $th->setAttribute($attr->nodeName, $attr->nodeValue);
            }

            while ($cell->firstChild) {
                $th->appendChild($cell->firstChild);
            }

            $th->setAttribute('scope', 'col');
            $cell->parentNode->replaceChild($th, $cell);

            return $th;
        };

        $thead = $xp->query('./thead', $table)->item(0);

        if ($thead instanceof \DOMElement) {
            foreach (iterator_to_array($xp->query('./tr/td', $thead)) as $td) {
                $rename($td);
            }
        } else {
            // Шапка из одних <th> первой строкой — в <thead>
            $first = $xp->query('./tbody/tr[1] | ./tr[1]', $table)->item(0);

            if ($first instanceof \DOMElement) {
                $cells = $xp->query('./td | ./th', $first);
                $ths   = $xp->query('./th', $first);

                if ($cells->length > 1 && $cells->length === $ths->length) {
                    $thead = $doc->createElement('thead');
                    $table->insertBefore($thead, $table->firstChild);
                    $thead->appendChild($first);

                    foreach (iterator_to_array($ths) as $th) {
                        if ($th instanceof \DOMElement && !$th->hasAttribute('scope')) {
                            $th->setAttribute('scope', 'col');
                        }
                    }
                }
            }
        }

        // Подписи столбцов: шапка в одну строку без слияния, строки тела той же длины
        $headRows = $thead instanceof \DOMElement ? $xp->query('./tr', $thead) : null;
        $bodyRows = $xp->query('./tbody/tr | ./tr | ./tfoot/tr', $table);
        $merged   = $xp->query('./*/tr/*[@colspan > 1 or @rowspan > 1] | ./tr/*[@colspan > 1 or @rowspan > 1]', $table)->length > 0;
        $labels   = [];

        if ($headRows && $headRows->length === 1) {
            foreach ($xp->query('./th | ./td', $headRows->item(0)) as $cell) {
                $labels[] = trim(preg_replace('/\s+/u', ' ', $cell->textContent) ?? '');
            }
        }

        $consistent = !$merged;

        foreach ($bodyRows as $row) {
            if ($labels && $xp->query('./td | ./th', $row)->length !== \count($labels)) {
                $consistent = false;
            }
        }

        $responsive = $consistent && ($labels === [] ? !$headRows : \count($labels) > 1);

        if ($responsive && $labels) {
            foreach ($bodyRows as $row) {
                foreach ($xp->query('./td | ./th', $row) as $j => $cell) {
                    if ($cell instanceof \DOMElement && ($labels[$j] ?? '') !== '' && !$cell->hasAttribute('data-label')) {
                        $cell->setAttribute('data-label', $labels[$j]);
                    }
                }
            }
        }

        $class = trim($table->getAttribute('class'));

        if (!preg_match('/\buk-table\b/', $class)) {
            $class = trim($class . ' uk-table uk-table-divider uk-table-small');
        }

        if ($responsive && !preg_match('/\buk-table-responsive\b/', $class)) {
            $class .= ' uk-table-responsive';
        }

        $table->setAttribute('class', $class);
        $table->setAttribute('data-wm-table', $responsive ? 'responsive' : 'scroll');

        $html = (string) $doc->saveHTML($table);

        return $wrapped ? $html : '<div class="uk-overflow-auto">' . $html . '</div>';
    }
}

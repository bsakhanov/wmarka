<?php
/**
 * WMARKA — нормализация записей в единую карточку.
 *
 * Блог, избранное, страницы меток, результаты поиска и модули отдают одну
 * и ту же структуру данных, а рисует её один макет html/layouts/wmarka/card.php.
 * Поправка вида карточки в одном месте применяется ко всему сайту.
 */

declare(strict_types=1);

namespace Wmarka\Template;

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Content\Site\Helper\RouteHelper as ContentRoute;
use Joomla\Registry\Registry;

final class Card
{
    /** Материал com_content (блог, избранное, архив, модули статей) */
    public static function article(object $item, ?Registry $params = null, array $opts = []): array
    {
        $params ??= ($item->params instanceof Registry ? $item->params : new Registry());
        $canView  = (bool) $params->get('access-view', true);
        $link     = (string) ($opts['link'] ?? '');

        if ($link === '' && isset($item->slug, $item->catid)) {
            if ($canView) {
                $link = Route::_(ContentRoute::getArticleRoute($item->slug, $item->catid, $item->language ?? '*'));
            } else {
                $active = Factory::getApplication()->getMenu()->getActive();
                $login  = new Uri(Route::_('index.php?option=com_users&view=login' . ($active ? '&Itemid=' . (int) $active->id : ''), false));
                $login->setVar('return', base64_encode(ContentRoute::getArticleRoute($item->slug, $item->catid, $item->language ?? '*')));
                $link = (string) $login;
            }
        }

        $meta   = [];
        $kicker = '';
        $time   = '';

        // Рубрика — строкой над заголовком, как на новостных сайтах
        if ($params->get('show_category') && !empty($item->category_title)) {
            $cat    = Ui::esc($item->category_title);
            $kicker = ($params->get('link_category') && !empty($item->catslug))
                ? '<a class="uk-text-primary" href="' . Route::_(ContentRoute::getCategoryRoute($item->catslug, $item->category_language ?? '*')) . '">' . $cat . '</a>'
                : '<span class="uk-text-primary">' . $cat . '</span>';
        }

        foreach (['show_publish_date' => 'publish_up', 'show_create_date' => 'created', 'show_modify_date' => 'modified'] as $flag => $field) {
            if ($params->get($flag) && Ui::validDate($item->$field ?? null)) {
                $meta[] = '<time datetime="' . Ui::iso($item->$field) . '"' . ($field === 'publish_up' ? ' itemprop="datePublished"' : '') . '>' . Ui::newsDate($item->$field) . '</time>';
                $time   = Ui::newsDate($item->$field, 'short');
                break;
            }
        }

        if ($params->get('show_author') && !empty($item->author)) {
            $meta[] = Ui::esc($item->created_by_alias ?: $item->author);
        }

        if ($params->get('show_hits') && isset($item->hits)) {
            $meta[] = Ui::icon('eye', 0.7) . ' ' . (int) $item->hits;
        }

        $itemTags = (array) ($item->tags->itemTags ?? []);
        $tagMode  = Config::str('card_tags', 'hash');
        $hashtags = ($params->get('show_tags', 1) && $tagMode === 'hash') ? Ui::hashtags($itemTags) : '';

        $badges = '';
        $now    = Factory::getDate()->toSql();

        if ((int) ($item->state ?? 1) === 0) {
            $badges .= '<span class="uk-label uk-label-warning">' . Text::_('JUNPUBLISHED') . '</span>';
        }

        if (!empty($item->publish_up) && $item->publish_up > $now) {
            $badges .= '<span class="uk-label uk-label-warning">' . Text::_('JNOTPUBLISHEDYET') . '</span>';
        }

        if (!empty($item->publish_down) && $item->publish_down < $now) {
            $badges .= '<span class="uk-label uk-label-danger">' . Text::_('JEXPIRED') . '</span>';
        }

        $showImage = $opts['image'] ?? true;
        $limit     = (int) ($opts['limit'] ?? Ui::introLimit());
        $text      = $opts['text'] ?? ($params->get('show_intro', 1) ? Ui::excerpt((string) ($item->introtext ?? ''), $limit) : '');

        $readmore = '';

        if (($opts['readmore'] ?? true) && $params->get('show_readmore', 1) && !empty($item->readmore)) {
            $readmore = LayoutHelper::render('joomla.content.readmore', ['item' => $item, 'params' => $params, 'link' => $link]);
        }

        return [
            'title'    => (string) $item->title,
            'link'     => $params->get('link_titles', 1) ? $link : '',
            'imageLink'=> $link,
            'thumb'    => $showImage ? Image::intro($item, (bool) ($opts['placeholder'] ?? true)) : [],
            'meta'     => $meta,
            'badges'   => $badges,
            'text'     => $text,
            'tags'     => ($params->get('show_tags', 1) && $tagMode === 'footer' && $itemTags) ? LayoutHelper::render('joomla.content.tags', $itemTags) : '',
            'hashtags' => $hashtags,
            'kicker'   => $kicker,
            'time'     => $time,
            'kind'     => Ui::mediaKind($itemTags),
            'readmore' => $readmore,
            'edit'     => $params->get('access-edit') ? LayoutHelper::render('joomla.content.icons', ['params' => $params, 'item' => $item]) : '',
            'events'   => [
                'afterTitle' => $item->event->afterDisplayTitle ?? '',
                'before'     => $item->event->beforeDisplayContent ?? '',
                'after'      => $item->event->afterDisplayContent ?? '',
            ],
            'tagIds'   => array_map(static fn ($t) => (int) $t->tag_id, (array) ($item->tags->itemTags ?? [])),
            'metaBelow'=> (int) $params->get('info_block_position', 0) === 1,
        ] + $opts;
    }

    /** Элемент страницы метки (поля core_*) */
    public static function tagItem(object $item, string $link, array $opts = []): array
    {
        $meta  = [];
        $field = ['published' => 'core_publish_up', 'created' => 'core_created_time', 'modified' => 'core_modified_time'][(string) ($opts['date'] ?? 'published')] ?? null;

        if ($field && Ui::validDate($item->$field ?? null)) {
            $format = (string) ($opts['dateFormat'] ?? '');
            $meta[] = '<time datetime="' . Ui::iso($item->$field) . '">' . ($format !== '' ? HTMLHelper::_('date', $item->$field, $format) : Ui::date($item->$field)) . '</time>';
        }

        $text = !empty($opts['description']) ? Ui::excerpt((string) ($item->core_body ?? ''), (int) ($opts['limit'] ?? Ui::introLimit())) : '';
        unset($opts['date'], $opts['dateFormat'], $opts['description'], $opts['limit']);

        return [
            'title'     => (string) ($item->core_title ?? ''),
            'link'      => $link,
            'imageLink' => $link,
            'thumb'     => ($opts['image'] ?? true) ? Image::intro($item) : [],
            'meta'      => $meta,
            'text'      => $text,
            'tags'      => (!empty($opts['tags']) && !empty($item->tags->itemTags)) ? LayoutHelper::render('joomla.content.tags', $item->tags->itemTags) : '',
        ] + $opts;
    }

    public static function render(array $card): string
    {
        return LayoutHelper::render('wmarka.card', $card);
    }

    /** Набор карточек/строк модуля: style = list | media | cards | slider */
    public static function items(array $cards, string $style = 'list', array $opts = []): string
    {
        return LayoutHelper::render('wmarka.items', ['items' => $cards, 'style' => $style] + $opts);
    }

    /**
     * Элемент модуля материалов (mod_articles*, mod_related_items, mod_tags_similar).
     * Картинка — ВСЕГДА интро-миниатюра: модули не режут свой размер превью.
     */
    public static function module(object $item, ?Registry $params = null, array $opts = []): array
    {
        $params ??= new Registry();
        $link     = (string) ($opts['link'] ?? ($item->link ?? ($item->route ?? '')));
        $meta     = [];
        $kicker   = '';
        $time     = '';
        $raw      = $item->publish_up ?? ($item->created ?? null);

        if (!empty($item->displayCategoryTitle)) {
            $kicker = !empty($item->displayCategoryLink)
                ? '<a class="uk-text-primary" href="' . $item->displayCategoryLink . '">' . Ui::esc($item->displayCategoryTitle) . '</a>'
                : '<span class="uk-text-primary">' . Ui::esc($item->displayCategoryTitle) . '</span>';
        }

        if (Ui::validDate($raw)) {
            $time = Ui::newsDate($raw, 'short');
        }

        if (!empty($item->displayDate)) {
            $meta[] = (Ui::validDate($raw) && Config::str('date_style', 'relative') === 'relative')
                ? '<time datetime="' . Ui::iso($raw) . '">' . Ui::newsDate($raw) . '</time>'
                : Ui::esc(strip_tags((string) $item->displayDate));
        } elseif (!empty($opts['date']) && Ui::validDate($item->{$opts['date']} ?? null)) {
            $meta[] = '<time datetime="' . Ui::iso($item->{$opts['date']}) . '">' . Ui::date($item->{$opts['date']}) . '</time>';
        }

        if (!empty($item->displayAuthorName)) {
            $meta[] = Ui::esc($item->displayAuthorName);
        }

        if (!empty($item->displayHits)) {
            $meta[] = Ui::icon('eye', 0.7) . ' ' . (int) $item->displayHits;
        }

        $imageRow = $opts['row'] ?? $item;
        $useImage = $opts['image'] ?? true;
        $text     = '';

        if (!empty($opts['text'])) {
            $text = (string) $opts['text'];
        } elseif ($params->get('show_introtext') && !empty($item->displayIntrotext)) {
            $text = (string) $item->displayIntrotext;
        }

        unset($opts['row'], $opts['date'], $opts['text']);

        return [
            'title'     => (string) ($item->title ?? ($item->core_title ?? '')),
            'link'      => $link,
            'imageLink' => $link,
            'thumb'     => $useImage ? Image::intro($imageRow, (bool) ($opts['placeholder'] ?? true)) : [],
            'meta'      => $meta,
            'text'      => $text,
            'tags'      => ($params->get('show_tags') && !empty($item->tags->itemTags)) ? LayoutHelper::render('joomla.content.tags', $item->tags->itemTags) : '',
            'kicker'    => $kicker,
            'time'      => $time,
            'kind'      => Ui::mediaKind((array) ($item->tags->itemTags ?? [])),
            'active'    => !empty($item->active),
        ] + $opts;
    }

    /** Стиль вывода модуля по имени макета: default → $default, wm-media → media и т. д. */
    public static function styleFromLayout(Registry $params, string $default = 'list'): string
    {
        $layout = (string) $params->get('layout', 'default');
        $layout = str_contains($layout, ':') ? substr($layout, strpos($layout, ':') + 1) : $layout;

        return match ($layout) {
            'wm-media'  => 'media',
            'wm-cards'  => 'cards',
            'wm-slider' => 'slider',
            'wm-list'   => 'list',
            'wm-feed'   => 'feed',
            default     => $default,
        };
    }
}

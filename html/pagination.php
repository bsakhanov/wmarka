<?php
/**
 * @package     Joomla.Site
 * @subpackage  Template.wmarka
 * @version     WMARKA ULTRA (UIkit 3 Pagination + Full Microdata)
 */

defined('_JEXEC') or die;

/**
 * Рендерит основной контейнер пагинации
 */
function pagination_list_render($list): string
{
    // Обертка навигации с микроразметкой SiteNavigationElement
    $html = '<nav aria-label="' . Joomla\CMS\Language\Text::_('JLIB_HTML_PAGINATION') . '">';
    $html .= '<ul class="uk-pagination uk-flex-center uk-margin-large-top" uk-margin itemscope itemtype="https://schema.org/SiteNavigationElement">';

    if ($list['start']['active']) {
        $html .= $list['start']['data'];
    }
    if ($list['previous']['active']) {
        $html .= $list['previous']['data'];
    }

    foreach ($list['pages'] as $page) {
        $html .= $page['data'];
    }

    if ($list['next']['active']) {
        $html .= $list['next']['data'];
    }
    if ($list['end']['active']) {
        $html .= $list['end']['data'];
    }

    $html .= '</ul></nav>';

    return $html;
}

/**
 * Рендерит активную ссылку на страницу
 */
function pagination_item_active(&$item): string
{
    $display = $item->text;

    // Заменяем текстовые метки на иконки UIkit
    if ($item->text == Joomla\CMS\Language\Text::_('JLIB_HTML_PAGINATION_START')) {
        $display = '<span uk-pagination-previous></span><span uk-pagination-previous></span>';
    } elseif ($item->text == Joomla\CMS\Language\Text::_('JPREV')) {
        $display = '<span uk-pagination-previous></span>';
    } elseif ($item->text == Joomla\CMS\Language\Text::_('JNEXT')) {
        $display = '<span uk-pagination-next></span>';
    } elseif ($item->text == Joomla\CMS\Language\Text::_('JLIB_HTML_PAGINATION_END')) {
        $display = '<span uk-pagination-next></span><span uk-pagination-next></span>';
    }

    // Внедряем itemprop="url" и itemprop="name" для SEO
    return '<li><a href="' . $item->link . '" itemprop="url"><span itemprop="name">' . $display . '</span></a></li>';
}

/**
 * Рендерит текущую страницу или неактивный элемент
 */
function pagination_item_inactive(&$item): string
{
    // Текущая страница
    if ($item->text == (int) $item->text || $item->active) {
        return '<li class="uk-active"><span>' . $item->text . '</span></li>';
    }

    // Отключенные кнопки (например, "Назад" на первой странице)
    return '<li class="uk-disabled"><span>' . $item->text . '</span></li>';
}

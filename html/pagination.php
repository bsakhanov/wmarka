<?php
/**
 * @package     Joomla.Site
 * @subpackage  Template.wmarka
 * @version     WMARKA ULTRA (Pure UIkit 3 Pagination)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

/** * Рендерит основной контейнер пагинации.
 * Мы используем класс uk-pagination для автоматического построения сетки.
 */
function pagination_list_render($list): string
{
    $html = '<ul class="uk-pagination uk-flex-center uk-margin-large-top" uk-margin>';

    if ($list['start']['active'])    { $html .= $list['start']['data']; }
    if ($list['previous']['active']) { $html .= $list['previous']['data']; }

    foreach ($list['pages'] as $page) {
        $html .= $page['data'];
    }

    if ($list['next']['active']) { $html .= $list['next']['data']; }
    if ($list['end']['active'])  { $html .= $list['end']['data']; }

    $html .= '</ul>';

    return $html;
}

/** * Вспомогательная логика для замены текстовых меток на иконки uikit. */
function getWmarkaPaginationIcon($text): string
{
    if ($text == Text::_('JLIB_HTML_PAGINATION_START')) return '<span uk-pagination-previous></span><span uk-pagination-previous></span>';
    if ($text == Text::_('JPREV')) return '<span uk-pagination-previous></span>';
    if ($text == Text::_('JNEXT')) return '<span uk-pagination-next></span>';
    if ($text == Text::_('JLIB_HTML_PAGINATION_END'))   return '<span uk-pagination-next></span><span uk-pagination-next></span>';
    return $text;
}

/** * Рендерит активную ссылку на страницу. */
function pagination_item_active(&$item): string
{
    $display = getWmarkaPaginationIcon($item->text);
    return '<li><a href="' . $item->link . '">' . $display . '</a></li>';
}

/** * Рендерит текущую страницу или неактивный элемент. */
function pagination_item_inactive(&$item): string
{
    $display = getWmarkaPaginationIcon($item->text);

    // Текущая активная страница помечается классом uk-active.
    if ($item->text == (int) $item->text || $item->active) {
        return '<li class="uk-active"><span>' . $display . '</span></li>';
    }

    // Отключенные кнопки навигации получают класс uk-disabled.
    return '<li class="uk-disabled"><span>' . $display . '</span></li>';
}
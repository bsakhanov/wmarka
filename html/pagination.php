<?php
defined('_JEXEC') or die;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
/**
 * Рендеринг списка страниц (Обертка)
 */
function pagination_list_render($list): string
{
    // Если страниц нет — ничего не выводим
    if (empty($list['pages'])) {
        return '';
    }

    $html = '<ul class="uk-pagination uk-flex-center uk-margin-large-top" uk-margin>';

    // Кнопки "В начало" и "Назад"
    $html .= $list['start']['data'];
    $html .= $list['previous']['data'];

    // Номера страниц
    foreach ($list['pages'] as $page) {
        $html .= $page['data'];
    }

    // Кнопки "Вперед" и "В конец"
    $html .= $list['next']['data'];
    $html .= $list['end']['data'];

    $html .= '</ul>';

    return $html;
}

/**
 * Рендеринг активной ссылки (другие страницы)
 */
function pagination_item_active(&$item): string
{
    // Определяем иконки для навигации
    $title = $item->text;
    
    // Заменяем текст на иконки UIkit для крайних кнопок
    if (str_contains($item->text, 'JLIB_HTML_PAGINATION_NEXT') || $item->text == '>') {
        $title = '<span uk-pagination-next></span>';
    } elseif (str_contains($item->text, 'JLIB_HTML_PAGINATION_PREV') || $item->text == '<') {
        $title = '<span uk-pagination-previous></span>';
    }

    return '<li><a href="' . $item->link . '" aria-label="' . htmlspecialchars($item->text) . '">' . $title . '</a></li>';
}

/**
 * Рендеринг неактивного элемента (текущая страница или заглушка)
 */
function pagination_item_inactive(&$item): string
{
    // Если это текущая страница
    if ($item->active) {
        return '<li class="uk-active"><span>' . $item->text . '</span></li>';
    }

    // Если это отключенные стрелки (например, "Назад" на первой странице)
    return '<li class="uk-disabled"><span>' . $item->text . '</span></li>';
}

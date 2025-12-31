<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;

$item = $displayData;
$class = $item->anchor_css ?: '';
$title = $item->anchor_title ? ' title="' . $item->escape($item->anchor_title) . '"' : '';

// Добавляем иконку стрелки для родительских пунктов
$link_text = $item->menu_text;
if ($item->deeper) {
    $link_text .= ' <span uk-navbar-parent-icon></span>';
}

$attributes = [
    'class' => $class,
    'title' => $item->anchor_title,
];

if ($item->anchor_rel) {
    $attributes['rel'] = $item->anchor_rel;
}

echo HTMLHelper::_('link', Route::_($item->link), $link_text, $attributes);

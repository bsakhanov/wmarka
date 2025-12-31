<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;

$item = $displayData;
$attributes = ['itemprop' => 'url', 'class' => $item->anchor_css ?: ''];
if ($item->anchor_title) $attributes['title'] = $item->anchor_title;

$link_text = '<span itemprop="name">' . $item->menu_text . '</span>';

if ($item->menu_icon) {
    $icon = '<span data-uk-icon="icon: ' . $item->menu_icon . '" aria-hidden="true" class="uk-margin-small-right"></span>';
    $link_text = ($item->params->get('menu_text', 1)) 
        ? $icon . '<span itemprop="name">' . $item->menu_text . '</span>' 
        : $icon . '<span class="uk-hidden" itemprop="name">' . $item->menu_text . '</span>';
}

// Добавляем иконку родителя, если есть вложенные пункты
if ($item->deeper) {
    $link_text .= ' <span uk-navbar-parent-icon></span>';
}

echo HTMLHelper::_('link', Route::_($item->link), $link_text, $attributes);

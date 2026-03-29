<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;

$item = $displayData;
$itemTitle = $item->title ?? '';

// Добавляем uk-text-bold для "жирности"
$attributes = ['itemprop' => 'url', 'class' => ($item->anchor_css ?: '') . ' uk-text-bold'];
if ($item->anchor_title) $attributes['title'] = $item->anchor_title;

$link_text = '<span itemprop="name">' . $itemTitle . '</span>';

if ($item->menu_icon) {
    $icon = '<span data-uk-icon="icon: ' . $item->menu_icon . '" aria-hidden="true" class="uk-margin-small-right"></span>';
    $showText = (bool)($itemParams->get('menu_text', 1) ?? true);
    
    $link_text = $showText 
        ? $icon . '<span itemprop="name">' . $itemTitle . '</span>' 
        : $icon . '<span class="uk-hidden" itemprop="name">' . $itemTitle . '</span>';
}

if ($item->deeper) {
    $link_text .= ' <span uk-navbar-parent-icon></span>';
}

$link = (string)($item->link ?? '');
echo HTMLHelper::_('link', Route::_($link), $link_text, $attributes);
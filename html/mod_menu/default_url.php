<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\Filter\OutputFilter;

$attributes = ['itemprop' => 'url']; // Добавляем микроразметку ссылки
if ($item->anchor_title) $attributes['title'] = $item->anchor_title;
if ($item->anchor_css)   $attributes['class'] = $item->anchor_css;
if ($item->anchor_rel)   $attributes['rel']   = $item->anchor_rel;

$linktype = '<span itemprop="name">' . $item->title . '</span>';

// Логика иконок с твоей микроразметкой
if ($item->menu_icon) {
    $icon = '<span data-uk-icon="icon: ' . $item->menu_icon . '" aria-hidden="true" class="uk-margin-small-right"></span>';
    if ($itemParams->get('menu_text', 1)) {
        $linktype = $icon . '<span itemprop="name">' . $item->title . '</span>';
    } else {
        $linktype = $icon . '<span class="uk-hidden" itemprop="name">' . $item->title . '</span>';
    }
} elseif ($item->menu_image) {
    $linktype = HTMLHelper::_('image', $item->menu_image, '', ['class' => 'uk-margin-small-right']) . '<span itemprop="name">' . $item->title . '</span>';
}

if ($item->browserNav == 1) {
    $attributes['target'] = '_blank';
    $attributes['rel'] = trim(($attributes['rel'] ?? '') . ' noopener noreferrer');
}

$flink = OutputFilter::ampReplace(htmlspecialchars($item->flink, ENT_COMPAT, 'UTF-8', false));
echo HTMLHelper::_('link', $flink, $linktype, $attributes);

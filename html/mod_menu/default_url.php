<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\Filter\OutputFilter;

$item = $displayData;
$itemTitle = $item->title ?? '';

// Добавляем uk-text-bold
$attributes = ['itemprop' => 'url', 'class' => ($item->anchor_css ?: '') . ' uk-text-bold'];
if ($item->anchor_title) $attributes['title'] = $item->anchor_title;
if ($item->anchor_rel)   $attributes['rel']   = $item->anchor_rel;

$linktype = '<span itemprop="name">' . $itemTitle . '</span>';

if ($item->menu_icon) {
    $icon = '<span data-uk-icon="icon: ' . $item->menu_icon . '" aria-hidden="true" class="uk-margin-small-right"></span>';
    $showText = (bool)($itemParams->get('menu_text', 1) ?? true);
    $linktype = $showText ? $icon . $linktype : $icon . '<span class="uk-hidden" itemprop="name">' . $itemTitle . '</span>';
}

if ($item->browserNav == 1) {
    $attributes['target'] = '_blank';
    $attributes['rel'] = trim(($attributes['rel'] ?? '') . ' noopener noreferrer');
}

$flink = OutputFilter::ampReplace(htmlspecialchars($item->flink ?? '', ENT_COMPAT, 'UTF-8', false));
echo HTMLHelper::_('link', $flink, $linktype, $attributes);
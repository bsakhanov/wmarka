<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 * @version     WMARKA ULTRA (UIkit 3 External URL)
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\Filter\OutputFilter;

$attributes = [];
if ($item->anchor_title) $attributes['title'] = $item->anchor_title;
if ($item->anchor_css)   $attributes['class'] = $item->anchor_css;
if ($item->anchor_rel)   $attributes['rel']   = $item->anchor_rel;

$linktype = $item->title;

// Обработка иконок и изображений
if ($item->menu_icon) {
    $iconClass = 'uk-margin-small-right ' . $item->menu_icon;
    if ($itemParams->get('menu_text', 1)) {
        $linktype = '<span class="' . $iconClass . '" aria-hidden="true"></span>' . $item->title;
    } else {
        $linktype = '<span class="' . $iconClass . '" aria-hidden="true"></span><span class="uk-hidden">' . $item->title . '</span>';
    }
} elseif ($item->menu_image) {
    $image_attributes = ['class' => $item->menu_image_css ?: 'uk-margin-small-right'];
    $linktype = HTMLHelper::_('image', $item->menu_image, '', $image_attributes);
    if ($itemParams->get('menu_text', 1)) {
        $linktype .= '<span>' . $item->title . '</span>';
    } else {
        $linktype .= '<span class="uk-hidden">' . $item->title . '</span>';
    }
}

// Логика открытия в новом окне
if ($item->browserNav == 1) {
    $attributes['target'] = '_blank';
    $attributes['rel'] = trim(($attributes['rel'] ?? '') . ' noopener noreferrer');
} elseif ($item->browserNav == 2) {
    $options = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,' . $params->get('window_open');
    $attributes['onclick'] = "window.open(this.href, 'targetWindow', '" . $options . "'); return false;";
}

$flink = OutputFilter::ampReplace(htmlspecialchars($item->flink, ENT_COMPAT, 'UTF-8', false));
echo HTMLHelper::_('link', $flink, $linktype, $attributes);

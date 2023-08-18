<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   (C) 2009 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Filter\OutputFilter;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\Registry\Registry;

$moduleParams = new Registry($module->params);

$attributes = array();

if ($item->anchor_title) {
    $attributes['title'] = $item->anchor_title;
}

if ($item->anchor_css) {
    $attributes['class'] = $item->anchor_css;
}

if ($item->anchor_rel) {
    $attributes['rel'] = $item->anchor_rel;
}

if ($item->id == $active_id) {
    $attributes['aria-current'] = 'location';

    if ($item->current) {
        $attributes['aria-current'] = 'page';
    }
}

$linktype = $item->title;

if ($item->menu_icon) {
    if ($itemParams->get('menu_text', 1)) {
        $linktype = '<span data-uk-icon="icon:' . $item->menu_icon . '" aria-hidden="true"></span><span>' . $item->title . '</span>';
    } else {
        $linktype = '<span data-uk-icon="icon:' . $item->menu_icon . '" aria-hidden="true"></span><span class="uk-hidden">' . $item->title . '</span>';
    }
} elseif ($item->menu_image) {
    $image_attributes = [];

    if ($item->menu_image_css) {
        $image_attributes['class'] = $item->menu_image_css;
    }

    $linktype = HTMLHelper::_('image', $item->menu_image, $item->title, $image_attributes);

    if ($itemParams->get('menu_text', 1)) {
        $linktype .= '<span class="image-title">' . $item->title . '</span>';
    }
}
if ($item->parent && $item->level === 1 && strpos($moduleParams->get('layout'), ':subnav') !== false) {
    $linktype .= '<span data-uk-icon="icon:triangle-down"></span>';
}

switch ($item->browserNav)
{
	default:
	case 0:
?><a itemprop="url" <?php echo $class; ?> href="<?php echo $item->flink; ?>" <?php echo $title; ?>><span itemprop="name"><?php echo $linktype; ?></span></a><?php
		break;
	case 1:
		// _blank
?><a itemprop="url" <?php echo $class; ?> href="<?php echo $item->flink; ?>" target="_blank" <?php echo $title; ?>><span itemprop="name"><?php echo $linktype; ?></span></a><?php
		break;
	case 2:
	// window.open
?><a itemprop="url" <?php echo $class; ?> href="<?php echo $item->flink; ?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes');return false;" <?php echo $title; ?>><span itemprop="name"><?php echo $linktype; ?></span></a>
<?php
		break;
}
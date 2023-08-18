<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$id = '';

if ($tagId = $params->get('tag_id', ''))
{
	$id = ' id="' . $tagId . '"';
}

// The menu class is deprecated. Use nav instead
?>
<ul class="uk-navbar-nav uk-text-bold uk-link-primary uk-width-auto  uk-hidden-small menu<?php echo $class_sfx; ?>"<?php echo $id; ?>>
<?php foreach ($list as $i => &$item)
{
	$class = 'item-' . $item->id;

	if ($item->id == $default_id)
	{
		$class .= ' default';
	}

	if ($item->id == $active_id || ($item->type === 'alias' && $item->params->get('aliasoptions') == $active_id))
	{
		$class .= '  ';
	}
	if (in_array($item->id, $path))
	{
		$class .= ' uk-active uk-link-primary';
	}
	elseif ($item->type === 'alias')
	{
		$aliasToId = $item->params->get('aliasoptions');

		if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
		{
			$class .= ' uk-active uk-button-text';
		}
		elseif (in_array($aliasToId, $path))
		{
			$class .= ' uk-parent uk-active uk-button-text';
		}
	}

	if ($item->type === 'separator')
	{
		$class .= ' divider';
	}

	if ($item->deeper)
	{
		$class .= ' deeper';
	}

	if ($item->parent)
	{
		$class .= '  data-uk-dropdown';
	}

	echo '<li class="' . $class . ' ">';

	switch ($item->type) :
		case 'separator':
		case 'component':
		case 'heading':
		case 'url':
			require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
			break;

		default:
			require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
			break;
	endswitch;

	// The next item is deeper.

	if ($item->deeper) {
		echo '<div class="uk-navbar-dropdown uk-width-auto  uk-box-shadow-xlarge uk-dropdown uk-border-rounded "  >
                        <ul class="uk-nav uk-navbar-dropdown-nav " uk-nav >';
	} elseif ($item->shallower) {
		// The next item is shallower.
		echo '</li>';
		echo str_repeat('</ul></div></li>', $item->level_diff);
	}
	// The next item is on the same level.
	else
	{
		echo '</li>';
	}
}
?></ul>

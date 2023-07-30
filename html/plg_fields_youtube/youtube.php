<?php
/*
 *  package: Custom Fields - Youtube plugin - FREE Version
 *  copyright: Copyright (c) 2021. Jeroen Moolenschot | Joomill
 *  license: GNU General Public License version 3 or later
 *  link: https://www.joomill-extensions.com
 */

// No direct access.
defined('_JEXEC') or die;

$value = $field->value;
$width = $fieldParams->get('video_width');
$height = $fieldParams->get('video_height');

if ($value == '')
{
	return;
}

echo '<iframe src="https://www.youtube.com/embed/' . $value . '?rel=0&amp;controls=0&amp;autoplay=1&amp;mute=1&amp;start=0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>';
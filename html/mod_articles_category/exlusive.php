<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;

if (!$list) {
    return;
}

?>
<section class="uk-section uk-section-xsmall" >
	
	<!-- Section heading -->

		
<h3 class="uk-heading-line uk-h5 uk-flex uk-flex-center"><span><a class="uk-button uk-button-primary uk-border-rounded" href="tolko-na-bestnews-kz">
                <?php echo $module->title; ?>
            </a></span></h3>
			<div uk-slider="autoplay: true; autoplay-interval: 3000; center: true; pause-on-hover: true">
 <div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slider="center: true">
<ul class="uk-slider-items  uk-grid uk-grid-match"
    <?php if ($grouped) : ?>
        <?php foreach ($list as $groupName => $items) : ?>
        <li>
            <div class="mod-articles-category-group"><?php echo Text::_($groupName); ?></div>
            <ul>
                <?php require ModuleHelper::getLayoutPath('mod_articles_category', $params->get('layout', 'default') . '_items'); ?>
            </ul>
        </li>
        <?php endforeach; ?>
    <?php else : ?>
	<li class=" ">
        <?php $items = $list; ?>
        <?php require ModuleHelper::getLayoutPath('mod_articles_category', $params->get('layout', 'default') . '_items'); ?>
    <?php endif; ?>
	</li>
</ul>
        <a class="uk-position-center-left uk-position-small uk-hidden-hover  uk-slidenav-large uk-padding-small uk-light " href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover  uk-slidenav-large  uk-padding-small uk-light" href="#" uk-slidenav-next uk-slider-item="next"></a>
   
   
</div> <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul></div>
</section>
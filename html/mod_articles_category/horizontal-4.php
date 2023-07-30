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
<h3 class="uk-heading-line uk-h5"><span><a class="uk-button uk-button-primary uk-border-rounded" href="<?php echo $list[0]->displayCategoryLink; ?>">
                <?php echo $module->title; ?>
            </a></span></h3>

		
 
<div class="uk-child-width-1-4@m  uk-flex uk-flex-center uk-flex-wrap " uk-grid uk-height-match="target: > div > .uk-card">
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
        <?php $items = $list; ?>
        <?php require ModuleHelper::getLayoutPath('mod_articles_category', $params->get('layout', 'default') . '_items'); ?>
    <?php endif; ?>
</div>
</section>
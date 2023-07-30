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
<section class="uk-section uk-section-xsmall  uk-padding-small uk-padding-remove-vertical">
	
	<!-- Section heading -->

		
<h3 class="uk-heading-line uk-h5"><span><a class="uk-button uk-button-primary uk-border-rounded" href="<?php echo $list[0]->displayCategoryLink; ?>">
                <?php echo $module->title; ?>
            </a></span></h3>

	
<ul class="uk-list uk-list-divider">
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
</ul>
</section>
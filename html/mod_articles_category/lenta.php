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
<h3 class="uk-h5"><span><a class="uk-button uk-button-primary uk-border-rounded  uk-flex uk-flex-center " href="novosti">Лента новостей</a></span></h3>
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
		<div class="uk-padding uk-padding-remove-vertical  ">
		<a href="/novosti" class="bottom_linck">Все новости </a>
    </div>	

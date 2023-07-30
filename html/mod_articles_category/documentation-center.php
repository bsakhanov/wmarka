<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 * @Author		web-eau.net
 * @copyright   (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;


if (!$list) {
    return;
}

?>

<ul class="row row-cols-1 row-cols-md-2 g-5 list-unstyled mx-auto w-75">
    <?php if ($grouped) : ?>
        <?php foreach ($list as $groupName => $items) : ?>
  
  		<div class="col">
        <li>  
               
            <div class="ms-3 mod-articles-category-group fs-3 fw-bold"><?php echo Text::_($groupName); ?>             	 
              	<span class="ps-3 text-muted fw-light fs-5"><?php echo count($items); ?> articles</span>               	 
          	</div>
                 
			<hr class="ms-3 me-5"/>
			
            <ul class="list-unstyled">
			
				<?php foreach ($items as $item) : ?>
				<li class="py-2">
					<?php if ($params->get('link_titles') == 1) : ?>
						<?php $attributes = ['class' => 'mod-articles-category-title ' . $item->active]; ?>
						<?php $link = htmlspecialchars($item->link, ENT_COMPAT, 'UTF-8', false); ?>
						<?php $title = htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8', false); ?>
						<img src="images/svg/caret.svg" alt="" width="13" height="13" class="pe-2"><?php echo HTMLHelper::_('link', $link, $title, $attributes); ?>
					<?php else : ?>
						<?php echo $item->title; ?>
					<?php endif; ?>

				</li>
				<?php endforeach; ?>

            </ul>
			<p class="ms-3 pt-3"><i class="far fa-arrow-alt-circle-right pe-2"></i>See all articles about 
				<span class="mod-articles-category-category">
					<?php echo $item->displayCategoryTitle; ?>
				</span>
			</p>
        </li>
 		 </div>
        <?php endforeach; ?>
    <?php else : ?>
        <?php $items = $list; ?>
        <?php require ModuleHelper::getLayoutPath('mod_articles_category', $params->get('layout', 'default') . '_items'); ?>
    <?php endif; ?>
</ul>

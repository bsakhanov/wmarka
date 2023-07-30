<?php
	/**
		* @package     Joomla.Site
		* @subpackage  mod_articles_category
		* @author	   web-eau.net
		* @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
		* @license     GNU General Public License version 2 or later; see LICENSE.txt
	*/
	
defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;

if (!$list)
{
	return;
}

?>

<div class="row category-module<?php echo $moduleclass_sfx; ?>">
	
	<?php foreach ($list as $item) : ?>
	
	<div class="col-4 p-3"> <!-- Because we want 3 testimonials in a raw -->
		
		<?php if ($params->get('link_titles') == 1) : ?>
		<h3>
			<a class="list-group-item-action mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
		</h3>
		<?php else : ?>
		<h3><?php echo $item->title; ?></h3>
		<?php endif; ?>
		
		<div class="card-body">
          
			<blockquote class="blockquote mod-articles-category-introtext">
				<i class="fas fa-quote-left me-2"></i>  <?php echo $item->displayIntrotext; ?>
				<br />
				<footer class="pt-4 blockquote-footer mod-articles-category-writtenb">
					<?php echo $item->displayAuthorName; ?>					
					<?php if ($item->displayDate) : ?>
					<cite title="Source Title">
						<?php echo $item->displayDate; ?>
					</cite>
					<?php endif; ?>				
				</footer>				
			</blockquote>

          </div>
                      
	</div>
	<?php endforeach; ?>
</div>
<?php
	/**
		* @package     Joomla.Site
		* @subpackage  mod_articles_category
		* @author	   web-eau.net
		* @copyright   (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
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

<div class="services">
	<div class="container">
		<div class="row text-center">
			<?php if ($grouped) : ?>
			<?php foreach ($list as $group_name => $group) : ?>
			<?php foreach ($group as $item) : ?>
			<?php $item->urls = new JRegistry($item->urls); ?>		
			<div class="col-md-4 col-xs-12 col-sm-4 col-lg-4 pb-5">
				<div class="services-main">
					
					<div class="services-box pt-5">
						<p class="services-icon"><i class="<?php echo $item->urls->get('urlatext'); ?>"></i></p>
						<div class="cover"></div>
					</div>
					
					<div class="services-head">
						
						<?php if ($params->get('link_titles') == 1) : ?>
						<h2><a class="mod-articles-category-title <?php echo $item->active; ?>" href='<?php echo $item->link; ?>'>
						<?php echo $item->title; ?></a>
                      	</h2>
						<?php else : ?>
						<h2><?php echo $item->title; ?></h2>
						<?php endif; ?>
						
						<?php if ($params->get('show_introtext')) : ?>
						<p class="mod-articles-category-introtext">
							<?php echo $item->displayIntrotext; ?>
						</p>
						<?php endif; ?>
						
						<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">Read more <i class="fa fa-angle-double-right"></i></a>
						
					</div>
					
				</div>
			</div>	
			<?php endforeach; ?>
			<?php endforeach; ?>
			<?php else : ?>
			<?php foreach ($list as $item) : ?>
			<?php $item->urls = new JRegistry($item->urls); ?>
			<div class="col-md-4 col-xs-12 col-sm-4 col-lg-4  pb-5">
				<div class="services-main">
					<div class="services-box pt-5">
						<p class="services-icon"><i class="<?php echo $item->urls->get('urlatext'); ?>"></i></p>
						<div class="cover"></div>
					</div>
					<div class="services-head">
						
						<?php if ($params->get('link_titles') == 1) : ?>
						<h2><a class="mod-articles-category-title <?php echo $item->active; ?>" href='<?php echo $item->link; ?>'>
						<?php echo $item->title; ?></a>
                      	</h2>						
						<?php else : ?>
						<h2><?php echo $item->title; ?></h2>
						<?php endif; ?>
						
						<?php if ($params->get('show_introtext')) : ?>
						<p class="mod-articles-category-introtext">
							<?php echo $item->displayIntrotext; ?>
						</p>
						<?php endif; ?>
						
						<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">Read more <i class="fa fa-angle-double-right"></i></a>
						
					</div>
				</div>
			</div>
			<?php endforeach; ?>
			<?php endif; ?>
			
		</div>
	</div>
</div>
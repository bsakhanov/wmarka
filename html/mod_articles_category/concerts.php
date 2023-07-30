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
<div class="container">
	<?php foreach ($list as $item) : ?>
      <div class="row pb-4">	
		<?php $item->urls = new JRegistry($item->urls); ?>
        <div class="col-md-12">
          <h3 class="ml-2">
				<?php if ($params->get('link_titles') == 1) : ?>
				<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
				<?php else : ?>
				<?php echo $item->title; ?>
				<?php endif; ?>
			</h3>	
		<p class="ms-2"><i class="fas fa-map-marker"></i> <small><?php echo $item->urls->get('urlctext'); ?> - <i class="fas fa-clock"></i> <?php echo JHtml::_('date', $item->created, "H:i"); ?></small></p>
		</div>
        
        <div class="w-100"></div> 
        
		<div class="col-1">			
			<p class="calendar">
				<?php echo JHtml::_('date', $item->created, "d"); ?><em><?php echo JHtml::_('date', $item->created, "M"); ?></em> 
			</p>
			<br />
			<p class="mt-5">
				<a class="btn btn-success" href="<?php echo $item->urls->get('urlbtext'); ?>" role="button">Tickets</a>
			</p>
		</div>
        
		<div class="col-5">					
			<?php
				$article_images  = json_decode($item->images);
				$article_image   = '';
				$article_image_alt   = '';
				if(isset($article_images->image_intro) && !empty($article_images->image_intro)) {
					$article_image  = $article_images->image_intro;
					$article_image_alt  = $article_images->image_intro_alt;
				}?>  					
				<img class="img-fluid img-thumbnail" src="<?php echo $article_image; ?>" alt="<?php echo $article_image_alt; ?>" >		
           		<?php if ($params->get('show_introtext')) : ?>
					<p class="fw-light pt-4 mod-articles-category-introtext">
					<?php echo $item->displayIntrotext; ?>
					</p>
				<?php endif; ?>      
		</div>
        
		<div class="col ratio ratio-1x1 maps-event embed-responsive">
			<iframe src="<?php echo $item->urls->get('urlatext'); ?>" width="400" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		</div>
	</div>
	<?php endforeach; ?>
</div>
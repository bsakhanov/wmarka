<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 * @author		web-eau.net
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

<div class="row category-module<?php echo $moduleclass_sfx; ?> mod-list updated">
	
	<div class="col-md-8 rectangle_12">
		<?php
			$l_images  = json_decode($list[0]->images); 
      		$l_intro_image = $l_images->image_intro ? 
       		$l_images->image_intro : '/path/to/the/placeholder/image.jpg'; // image placeholder
      	?>
      
		<img class="rectangle_12" src="<?php echo $l_intro_image; ?>" alt=" °-° ">
      
		<h6>
			<span class="mod-articles-category-category date">
				<?php 
					setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
    				echo strftime(" %d %b %Y", strtotime($list[0]->created)) 
                ;?>
			</span>
		</h6>
		
		<h3>
			<a class="mod-articles-category-title <?php echo $list[0]->active; ?>" href="<?php echo $list[0]->link; ?>">
				<?php echo $list[0]->title; ?>
			</a>					
		</h3>
		
		<?php if ($params->get('show_introtext')) : ?>
		<p class="mod-articles-category-introtext">
			<?php echo $list[0]->introtext; ?>
		</p>
		<?php endif; ?>
		<hr>   

	</div>
	
	<div class="col-md-4 actualities-side">
		<div class="row">
			
			<?php $index = 0; foreach ($list as $item) : ?>
			<div class="col-md-12 actualites-title-<?php echo $index; ?>">
				
				
              	<?php if ($item->displayDate) : ?>
				<h6>
					<span class="mod-articles-category-category date">
						<?php 
							setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
							echo strftime(" %d %b %Y", strtotime($item->created)) ; 
						?>
					</span>
				</h6>               			
				<?php endif; ?>
				
				<?php
					$images  = json_decode($item->images);
					$intro_image = $images->image_intro ? $images->image_intro : 'images/assets/no-image.png'; // image placeholder
					$articleLink = JRoute::_(ContentHelperRoute::getArticleRoute($item->id, $item->catid, $item->language));
				?>

				<?php if ($params->get('link_titles') == 1) : ?>
                	<h4 class="actualites-title">
                      	<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>						</h4>
				<?php else : ?>
               		<?php echo $item->title; ?>
				<?php endif; ?>
				
				<?php if ($item->displayHits) : ?>
                <span class="mod-articles-category-hits">
					(<?php echo $item->displayHits; ?>)
				</span>
				<?php endif; ?>
				
				<?php if ($params->get('show_author')) : ?>
                <span class="mod-articles-category-writtenby">
					<?php echo $item->displayAuthorName; ?>
				</span>
				<?php endif; ?>
				
				<?php if ($item->displayDate) : ?>
                <span class="mod-articles-category-date">
					<?php #echo $item->displayDate; ?>
				</span>
				<?php endif; ?>
				
              	<?php if ($params->get('show_tags', 0) && $item->tags->itemTags) : ?>
				<div class="mod-articles-category-tags">
					<?php echo JLayoutHelper::render('joomla.content.tags', $item->tags->itemTags); ?>
				</div>
              	<?php endif; ?>
				
              	<?php if ($params->get('show_introtext')) : ?>
                <p class="mod-articles-category-introtext">
					<?php echo $item->displayIntrotext; ?>
				</p>
            	<?php endif; ?>
				                
                <hr>
              
			</div>
			<?php $index++; endforeach; ?>
			
		</div>
		
		<div class="text-start"><a href="link/to/the/more/news/page" class="btn btn-primary btn-rounded">More news</a>
		</div> 
				
	</div>
	
</div>
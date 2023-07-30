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
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;

if (!$list)
{
	return;
}
JLoader::register('JUImage',  JPATH_LIBRARIES . '/juimage/JUImage.php');
$juImg = new JUImage();	
$regexImageSrc = '/#joomlaImage?([^\'" >]+)/';
?>
	
<section class="uk-section uk-section-xsmall">
	
	<!-- Section heading -->

		
<h3 class="uk-heading-line uk-h5"><span><a class="uk-button uk-button-danger uk-button-danger2 uk-border-rounded" href="<?php echo $list[0]->displayCategoryLink; ?>">
                <?php echo $module->title; ?>
            </a></span></h3>

	
	
	<?php 
		$article_image   = [];
		$article_image_alt   = [];
	?>
	<?php foreach ($list as $item) : ?>
		<?php
			$article_images  = json_decode($item->images);
						
			if(isset($article_images->image_intro) && !empty($article_images->image_intro)) {
				$article_image[$item->id]  = $article_images->image_intro;
				$article_image_alt[$item->id]  = $article_images->image_intro_alt;
			} else {
				$article_image[$item->id]  = 'images/sampledata/grey-bg.png'; // image placeholder
				$article_image_alt[$item->id]  = 'No image'; // alt image placeholder
				}
			?> 
	    <?php
            
$thumb = $juImg->render(preg_replace($regexImageSrc, '', $article_image[$list[0]->id]), [
	'w'     	=> '600',
	'h'     	=> '338', 
	'q'         => '65',
	'zc'        => 'C',
	'far'        => 'C',	
	'webp'      => true,
	'webp_q'    => '60',
	'webp_maxq' => '65',
	'cache'     => 'img' 

	
]); 
 
  ?>			
	<?php endforeach; ?>
	
	<div class="uk-grid-divider uk-grid-small" uk-grid>
		
		<div class="uk-width-2-3@m">
			
			<!-- Latest article -->
		 
				<a href="<?php echo $list[0]->link; ?>">
				<!-- Intro image -->
				<div class="uk-inline uk-margin">
					
						<img src="<?php echo $thumb->webp; ?>" type="image/webp" width="600" height="338" alt="<?php echo $article_image_alt[$list[0]->id]; ?>"  itemprop="thumbnailUrl"/>

					<div class="uk-position-small uk-position-bottom-left  overla overla-women uk-light uk-border-rounded2"><small class="uk-flex uk-flex-middle"> <?php echo $list[0]->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $list[0]->displayHits; ?></small></div>
					<div class="uk-position-center uk-overlay uk-bold uk-big-women uk-border-circle uk-light uk-heading-xlarge ">W</div>
				</div>
				
				<!-- Title and date -->
				<div class="news-data d-flex justify-content-between">					
					<h3 class="uk-h4 uk-margin-remove">
						<a href="<?php echo $list[0]->link; ?>"><?php echo $list[0]->title; ?></a>
					</h3>
					
				</div>
									</a>

			 
			
		</div>
		
		<div class="uk-width-expand@s">
	    <?php
            

$thumb1 = $juImg->render(preg_replace($regexImageSrc, '', $article_image[$list[1]->id]), [
	'w'     	=> '150',
	'h'     	=> '150', 	
	'q'         => '70',
	'zc'        => 'C',
	'far'        => 'C',	
	'webp'      => true,
	'webp_q'    => '70',
	'webp_maxq' => '70',
	'cache'     => 'img' 

	
]); 		 
  ?>			
			<!-- Article 1 -->
  <a  class="uk-link-reset" href="<?php echo $list[1]->link; ?>">
			<div class="uk-flex-middle uk-grid-small margin-mini3" uk-grid>					
					
					<div class="uk-width-1-3 uk-inline ">
						
						<!--Image-->
						<div class="view overlay  shadow mb-md-0 mb-4">
							
								<img src="<?php echo $thumb1->webp; ?>" type="image/webp" width="120" height="80" alt="<?php echo $article_image_alt[$list[1]->id]; ?>"  itemprop="thumbnailUrl"/>
								
							
						</div>
						<div class="uk-position-center uk-overlay uk-bold uk-text-large uk-small-women uk-light uk-border-circle">W</div>
						
					</div>
					<div class="uk-width-2-3 uk-margin-remove-vertical">
						
						<!-- infos -->
						
						
					<h3 class="uk-h6 uk-margin-remove uk-text-break">
						<?php echo JHtml::_('string.truncate', (strip_tags($list[1]->title)), '70'); ?>
					</h3>
						
						<small class="uk-text-muted"><?php echo $list[1]->displayDate; ?></small>
					</div>
 
			</div>
			</a>
			
			
			<!-- Article 2 -->
	    <?php
            

$thumb2 = $juImg->render(preg_replace($regexImageSrc, '', $article_image[$list[2]->id]), [
	'w'     	=> '150',
	'h'     	=> '150', 	
	'q'         => '70',
	'zc'        => 'C',
	'far'        => 'C',	
	'webp'      => true,
	'webp_q'    => '70',
	'webp_maxq' => '70',
	'cache'     => 'img' 

	
]); 		 
  ?>			
  <a  class="uk-link-reset" href="<?php echo $list[2]->link; ?>">
			<div class="uk-flex-middle uk-grid-small margin-mini3" uk-grid>					
					
					<div class="uk-width-1-3 uk-inline ">
						
						<!--Image-->
						<div class="view overlay  shadow mb-md-0 mb-4">
							
								<img src="<?php echo $thumb2->webp; ?>" type="image/webp" width="120" height="80" alt="<?php echo $article_image_alt[$list[2]->id]; ?>"  itemprop="thumbnailUrl"/>
								
							
						</div>
						<div class="uk-position-center uk-overlay uk-bold uk-text-large uk-small-women uk-light uk-border-circle">W</div>
						
					</div>
					<div class="uk-width-2-3 uk-margin-remove-vertical">
						
						<!-- infos -->
						
						
					<h3 class="uk-h6 uk-margin-remove uk-text-break">
						<?php echo JHtml::_('string.truncate', (strip_tags($list[2]->title)), '70'); ?>
					</h3>
						
						<small class="uk-text-muted"><?php echo $list[2]->displayDate; ?></small>
					</div>
 
			</div>
			</a>
			
			<!-- Article 3 -->
	    <?php
            

$thumb3 = $juImg->render(preg_replace($regexImageSrc, '', $article_image[$list[3]->id]), [
	'w'     	=> '150',
	'h'     	=> '150', 	
	'q'         => '70',
	'zc'        => 'C',
	'far'        => 'C',	
	'webp'      => true,
	'webp_q'    => '70',
	'webp_maxq' => '70',
	'cache'     => 'img' 

	
]); 		 
  ?>			
  <a  class="uk-link-reset" href="<?php echo $list[3]->link; ?>">
			<div class="uk-flex-middle uk-grid-small margin-mini3" uk-grid>					
					
					<div class="uk-width-1-3 uk-inline ">
						
						<!--Image-->
						<div class="view overlay  shadow mb-md-0 mb-4">
							
								<img src="<?php echo $thumb3->webp; ?>" type="image/webp" width="120" height="80" alt="<?php echo $article_image_alt[$list[3]->id]; ?>"  itemprop="thumbnailUrl"/>
								
							
						</div>
						<div class="uk-position-center uk-overlay uk-bold uk-text-large uk-small-women uk-light uk-border-circle">W</div>
						
					</div>
					<div class="uk-width-2-3 uk-margin-remove-vertical">
						
						<!-- infos -->
						
						
					<h3 class="uk-h6 uk-margin-remove uk-text-break">
						<?php echo JHtml::_('string.truncate', (strip_tags($list[3]->title)), '70'); ?>
					</h3>
						
						<small class="uk-text-muted"><?php echo $list[3]->displayDate; ?></small>
					</div>
 
			</div>
			</a>
			
			<!-- Article 4 -->
	    <?php
            

$thumb4 = $juImg->render(preg_replace($regexImageSrc, '', $article_image[$list[4]->id]), [
	'w'     	=> '150',
	'h'     	=> '150', 	
	'q'         => '70',
	'zc'        => 'C',
	'far'        => 'C',	
	'webp'      => true,
	'webp_q'    => '70',
	'webp_maxq' => '70',
	'cache'     => 'img' 

	
]); 		 
  ?>
  <a  class="uk-link-reset" href="<?php echo $list[4]->link; ?>">
			<div class="uk-flex-middle uk-grid-small margin-mini3" uk-grid>					
					
					<div class="uk-width-1-3 uk-inline ">
						
						<!--Image-->
						<div class="view overlay  shadow mb-md-0 mb-4">
							
								<img src="<?php echo $thumb4->webp; ?>" type="image/webp" width="120" height="80" alt="<?php echo $article_image_alt[$list[4]->id]; ?>"  itemprop="thumbnailUrl"/>
								
							
						</div>
						<div class="uk-position-center uk-overlay uk-bold uk-text-large uk-small-women uk-light uk-border-circle">W</div>
						
					</div>
					<div class="uk-width-2-3 uk-margin-remove-vertical">
						
						<!-- infos -->
						
						
					<h3 class="uk-h6 uk-margin-remove uk-text-break">
						<?php echo JHtml::_('string.truncate', (strip_tags($list[4]->title)), '70'); ?>
					</h3>
						
						<small class="uk-text-muted"><?php echo $list[4]->displayDate; ?></small>
					</div>
 
			</div>
			</a>
			
		</div>
		
	</div>
	
</section>

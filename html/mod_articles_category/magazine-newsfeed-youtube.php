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
use Joomla\Component\Fields\Administrator\Helper\FieldsHelper;

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

		

        <div class="uk-margin-bottom">
            <a class="uk-button uk-button-danger uk-border-rounded" href="t/video">Bestnews TV</a> <small class="uk-text-muted">Смотри видео Bestnews.kz в </small><a class="uk-button uk-button-text uk-text-danger" href="https://www.tiktok.com/@bestnews.kz1" target="_blank" rel="noopener">TikTok</a> / <a class="uk-button uk-button-text uk-text-danger"  href="https://www.facebook.com/Bestnewskz" target="_blank" rel="noopener">Facebook</a> / <a class="uk-button uk-button-text uk-text-danger" href="https://www.instagram.com/bestnews.kz/" target="_blank" rel="noopener">Instagram</a>
        </div>
	
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
	'h'     	=> '400', 
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
			<div class="single-news">
				
				<!-- Intro image -->
				<div class="uk-margin">
					<?php
$document   = JFactory::getDocument();
$renderer   = $document->loadRenderer('modules');
        $options    = array('style' => 'xhtml');
        $position   = 'youtube';
        echo $renderer->render($position, $options, null);
        ?>
					 
					
				</div>
				
				<!-- Title and date -->
				<div class="news-data d-flex justify-content-between">					
					<h3 class="uk-h4 uk-link-heading">
						<a href="<?php echo $list[0]->link; ?>"><?php echo $list[0]->title; ?></a>
					</h3>
					
				</div>
				
				<!-- Introtext -->
              	<div class="news-data d-flex justify-content-between">
					<div class="text-secondary"><?php echo $list[0]->displayIntrotext; ?></div>		
                	<a href="<?php echo $list[0]->link; ?>"><i class="fas fa-angle-double-right"></i></a>  
              	</div>
			</div>
			
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
						<div class="uk-margin-small-left uk-position-center uk-light"><span uk-icon="icon: play-circle; ratio: 3"></span></div>
						
					</div>
					<div class="uk-width-2-3 uk-margin-remove-vertical">
						
						<!-- infos -->
						
						
					<h3 class="uk-h6 uk-margin-remove uk-text-break">
						<?php echo JHtml::_('string.truncate', (strip_tags($list[1]->title)), '60'); ?>
					</h3>
						
						<small class="uk-text-muted"><?php echo $list[1]->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $list[1]->displayHits; ?></small>
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
						<div class="uk-margin-small-left uk-position-center uk-light"><span uk-icon="icon: play-circle; ratio: 3"></span></div>
						
					</div>
					<div class="uk-width-2-3 uk-margin-remove-vertical">
						
						<!-- infos -->
						
						
					<h3 class="uk-h6 uk-margin-remove uk-text-break">
						<?php echo JHtml::_('string.truncate', (strip_tags($list[2]->title)), '60'); ?>
					</h3>
						
						<small class="uk-text-muted"><?php echo $list[2]->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $list[2]->displayHits; ?></small>
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
						<div class="uk-margin-small-left uk-position-center uk-light"><span uk-icon="icon: play-circle; ratio: 3"></span></div>
						
					</div>
					<div class="uk-width-2-3 uk-margin-remove-vertical">
						
						<!-- infos -->
						
						
					<h3 class="uk-h6 uk-margin-remove uk-text-break">
						<?php echo JHtml::_('string.truncate', (strip_tags($list[3]->title)), '60'); ?>
					</h3>
						
						<small class="uk-text-muted"><?php echo $list[3]->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $list[3]->displayHits; ?></small>
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
						<div class="uk-margin-small-left uk-position-center uk-light"><span uk-icon="icon: play-circle; ratio: 3"></span></div>
						
					</div>
					<div class="uk-width-2-3 uk-margin-remove-vertical">
						
						<!-- infos -->
						
						
					<h3 class="uk-h6 uk-margin-remove uk-text-break">
						<?php echo JHtml::_('string.truncate', (strip_tags($list[4]->title)), '60'); ?>
					</h3>
						
						<small class="uk-text-muted"><?php echo $list[4]->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $list[4]->displayHits; ?></small>
					</div>
 
			</div>
			</a>
			
		</div>
		
	</div>
	
</section>

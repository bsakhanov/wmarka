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

		
<h3 class="uk-heading-line uk-h5"><span><a class="uk-button uk-button-primary " href="<?php echo $list[0]->displayCategoryLink; ?>">
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
	'w'     	=> '900',
	'h'     	=> '600', 
	'q'         => '75',
	'zc'        => 'C',
	'far'        => 'C',	
	'webp'      => true,
	'webp_q'    => '70',
	'webp_maxq' => '75',
	'cache'     => 'img' 

	
]); 
 
  ?>			
	<?php endforeach; ?>
	
	<div class="">
		
		<div class="col-lg-6 col-md-12 mb-4">
			
			<!-- Latest article -->
			<div class="single-news">
				
				<!-- Intro image -->
				<div class="uk-inline uk-margin">
					<a href="<?php echo $list[0]->link; ?>">
						<img src="<?php echo $thumb->webp; ?>" type="image/webp" width="600" height="400" alt="<?php echo $article_image_alt[$list[0]->id]; ?>"  itemprop="thumbnailUrl"/>
					</a>
					<div class="uk-position-bottom-right"><div class="uk-label  uk-label-success"><?php echo $list[0]->displayDate; ?></div>
            </div>
				</div>
				
				<!-- Title and date -->
				<div class="news-data d-flex justify-content-between">					
					<h3 class="uk-h4">
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
		

		
	</div>
	
</section>

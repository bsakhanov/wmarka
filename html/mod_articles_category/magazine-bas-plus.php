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
	

	
	<!-- Section heading -->

		

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
	'w'     	=> '390',
	'h'     	=> '260', 
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
	
			
				<div class="uk-card uk-hidden@m uk-grid-collapse " uk-grid>
				<!-- Intro image -->
				<div class="uk-card-media-left uk-cover-container uk-inline uk-margin uk-link-heading uk-width-2-5">
					<a href="<?php echo $list[0]->link; ?>">
						<img  class="uk-border-rounded" src="<?php echo $thumb->webp; ?>" type="image/webp" width="390" height="260" alt="<?php echo $article_image_alt[$list[0]->id]; ?>"  itemprop="thumbnailUrl"/>
					</a>
				<div class="uk-position-small uk-position-top-right  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"><span><a class="" href="<?php echo $list[0]->displayCategoryLink; ?>"><?php echo $module->title; ?></a></span></small></div>
<div class="uk-position-small uk-position-bottom-left  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"> <?php echo $list[0]->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $list[0]->displayHits; ?></small></div>				
				</div>
				
				<!-- Title and date -->
				<div class="uk-card-body uk-card-small3   uk-width-3-5">					
					<h3 class="uk-h6 uk-link-heading uk-margin-remove-bottom">
						     <?php if ($params->get('show_tags', 0) && $list[0]->tags->itemTags) : ?>
         
		
		  
		   <div hidden><?php 
		   $text = LayoutHelper::render('joomla.content.tags-exlusive', $list[0]->tags->itemTags); ?></div>
<?php 
$main_str = $text;

if (strpos($main_str, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
} elseif (strpos($main_str0, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
}; ?>
		   
			
    
    <?php endif; ?><a href="<?php echo $list[0]->link; ?>"><?php echo $list[0]->title; ?></a>
					</h3>
					
				</div>
				
 
			</div>
			
			
			
			<div class="uk-visible@m">	
				<!-- Intro image -->
				<div class="uk-inline uk-margin uk-link-heading">
					<a href="<?php echo $list[0]->link; ?>">
						<img  class="uk-border-rounded" src="<?php echo $thumb->webp; ?>" type="image/webp" width="390" height="260" alt="<?php echo $article_image_alt[$list[0]->id]; ?>"  itemprop="thumbnailUrl"/>
					</a>
				<div class="uk-position-small uk-position-top-right  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"><span><a class="" href="<?php echo $list[0]->displayCategoryLink; ?>"><?php echo $module->title; ?></a></span></small></div>
<div class="uk-position-small uk-position-bottom-left  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"> <?php echo $list[0]->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $list[0]->displayHits; ?></small></div>				
				</div>
				
				<!-- Title and date -->
				<div class="news-data d-flex justify-content-between">					
					<h3 class="uk-h6 uk-link-heading ">
						     <?php if ($params->get('show_tags', 0) && $list[0]->tags->itemTags) : ?>
         
		
		  
		   <div hidden><?php 
		   $text = LayoutHelper::render('joomla.content.tags-exlusive', $list[0]->tags->itemTags); ?></div>
<?php 
$main_str = $text;

if (strpos($main_str, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
} elseif (strpos($main_str0, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
}; ?>
		   
			
    
    <?php endif; ?><a href="<?php echo $list[0]->link; ?>"><?php echo $list[0]->title; ?></a>
					</h3>
					
				</div>
				
 
			</div>

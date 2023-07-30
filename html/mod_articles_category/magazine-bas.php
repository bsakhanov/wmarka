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
$document = JFactory::getDocument();


if (!$list)
{
	return;
}
JLoader::register('JUImage',  JPATH_LIBRARIES . '/juimage/JUImage.php');
$juImg = new JUImage();	
$regexImageSrc = '/#joomlaImage?([^\'" >]+)/';
?>
	
<section class=" ">
	
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
	'w'     	=> '500',
	'h'     	=> '333', 
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
	
	<div class="uk-grid-divider uk-grid-small uk-flex-uk-flex-center" uk-grid>
		<div class="uk-width-1-4@m ">
		<h3 class="uk-heading-line uk-h5  uk-flex uk-flex-center "><span><a class="uk-button uk-button-primary uk-border-rounded" href="novosti">Лента новостей</a></span></h3>
 

	
 
					<?php
$document   = JFactory::getDocument();
$renderer   = $document->loadRenderer('modules');
        $options    = array('style' => 'xhtml');
        $position   = 'lenta';
        echo $renderer->render($position, $options, null);
        ?>
		<div class="uk-padding uk-padding-remove-top uk-padding-remove-left uk-margin">
		<a href="/novosti" class="bottom_linck">Все новости </a>
    </div>	
		</div>		
		<div class="uk-width-3-4@m ">
<div class="uk-grid-small  uk-flex uk-flex-center" uk-grid>
    
			<div class="uk-width-large@m">
				
				<!-- Intro image -->
				<div class="uk-inline uk-margin">
					<a href="<?php echo $list[0]->link; ?>">
						<img  class="uk-border-rounded" src="<?php echo $thumb->webp; ?>" type="image/webp" width="500" height="333" alt="<?php echo $article_image_alt[$list[0]->id]; ?>"  itemprop="thumbnailUrl"/>
					</a>
<div class="uk-position-small uk-position-top-right  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"><span><a class="" href="<?php echo $list[0]->displayCategoryLink; ?>"><?php echo $list[0]->displayCategoryTitle; ?></a></span></small></div>					
<div class="uk-position-small uk-position-bottom-left  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"> <?php echo $list[0]->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $list[0]->displayHits; ?></small></div>
				</div>
				
				<!-- Title and date -->
 				
					<h2 class="uk-h4 uk-text-bold uk-link-heading uk-margin-small uk-margin-remove-top">
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
					</h2>
					
 
				    <?php if ($params->get('show_introtext')) : ?>
        <div class=" uk-margin-remove uk-text-break">
            <?php echo $list[0]->metadesc; ?>
        </div>
    <?php endif; ?>
				
 
			</div>

    <div class="uk-width-expand@s">
	    <?php
            
$thumb1 = $juImg->render(preg_replace($regexImageSrc, '', $article_image[$list[1]->id]), [
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
	 
	
			
				<div class="uk-card uk-hidden@m uk-grid-collapse " uk-grid>
				<!-- Intro image -->
				<div class="uk-card-media-left uk-cover-container uk-inline uk-margin uk-link-heading uk-width-2-5">
					<a href="<?php echo $list[1]->link; ?>">
						<img  class="uk-border-rounded" src="<?php echo $thumb1->webp; ?>" type="image/webp" width="390" height="260" alt="<?php echo $article_image_alt[$list[1]->id]; ?>"  itemprop="thumbnailUrl"/>
					</a>
				<div class="uk-position-small uk-position-top-right  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"><span><a class="" href="<?php echo $list[1]->displayCategoryLink; ?>"><?php echo $list[1]->displayCategoryTitle; ?></a></span></small></div>
<div class="uk-position-small uk-position-bottom-left  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"> <?php echo $list[1]->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $list[1]->displayHits; ?></small></div>				
				</div>
				
				<!-- Title and date -->
				<div class="uk-card-body uk-card-small3   uk-width-3-5">					
					<h3 class="uk-h6 uk-link-heading uk-margin-remove-bottom">
						     <?php if ($params->get('show_tags', 0) && $list[1]->tags->itemTags) : ?>
         
		
		  
		   <div hidden><?php 
		   $text = LayoutHelper::render('joomla.content.tags-exlusive', $list[1]->tags->itemTags); ?></div>
<?php 
$main_str = $text;

if (strpos($main_str, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
} elseif (strpos($main_str0, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
}; ?>
		   
			
    
    <?php endif; ?><a href="<?php echo $list[1]->link; ?>"><?php echo $list[1]->title; ?></a>
					</h3>
					
				</div>
				
 
			</div>
			
			
			
			<div class="uk-visible@m">	
				<!-- Intro image -->
				<div class="uk-inline uk-margin uk-link-heading">
					<a href="<?php echo $list[1]->link; ?>">
						<img  class="uk-border-rounded" src="<?php echo $thumb1->webp; ?>" type="image/webp" width="390" height="260" alt="<?php echo $article_image_alt[$list[1]->id]; ?>"  itemprop="thumbnailUrl"/>
					</a>
				<div class="uk-position-small uk-position-top-right  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"><span><a class="" href="<?php echo $list[1]->displayCategoryLink; ?>"><?php echo $list[1]->displayCategoryTitle; ?></a></span></small></div>
<div class="uk-position-small uk-position-bottom-left  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"> <?php echo $list[1]->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $list[1]->displayHits; ?></small></div>				
				</div>
				
				<!-- Title and date -->
				<div class="news-data d-flex justify-content-between">					
					<h3 class="uk-h6 uk-link-heading ">
						     <?php if ($params->get('show_tags', 0) && $list[1]->tags->itemTags) : ?>
         
		
		  
		   <div hidden><?php 
		   $text = LayoutHelper::render('joomla.content.tags-exlusive', $list[1]->tags->itemTags); ?></div>
<?php 
$main_str = $text;

if (strpos($main_str, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
} elseif (strpos($main_str0, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
}; ?>
		   
			
    
    <?php endif; ?><a href="<?php echo $list[1]->link; ?>"><?php echo $list[1]->title; ?></a>
					</h3>
					
				</div>
				
 
			</div>
				    <?php
            
$thumb2 = $juImg->render(preg_replace($regexImageSrc, '', $article_image[$list[2]->id]), [
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
	 
	
			
				<div class="uk-card uk-hidden@m uk-grid-collapse " uk-grid>
				<!-- Intro image -->
				<div class="uk-card-media-left uk-cover-container uk-inline uk-margin uk-link-heading uk-width-2-5">
					<a href="<?php echo $list[2]->link; ?>">
						<img  class="uk-border-rounded" src="<?php echo $thumb2->webp; ?>" type="image/webp" width="390" height="260" alt="<?php echo $article_image_alt[$list[2]->id]; ?>"  itemprop="thumbnailUrl"/>
					</a>
				<div class="uk-position-small uk-position-top-right  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"><span><a class="" href="<?php echo $list[2]->displayCategoryLink; ?>"><?php echo $list[2]->displayCategoryTitle; ?></a></span></small></div>
<div class="uk-position-small uk-position-bottom-left  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"> <?php echo $list[2]->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $list[2]->displayHits; ?></small></div>				
				</div>
				
				<!-- Title and date -->
				<div class="uk-card-body uk-card-small3   uk-width-3-5">					
					<h3 class="uk-h6 uk-link-heading uk-margin-remove-bottom">
						     <?php if ($params->get('show_tags', 0) && $list[2]->tags->itemTags) : ?>
         
		
		  
		   <div hidden><?php 
		   $text = LayoutHelper::render('joomla.content.tags-exlusive', $list[2]->tags->itemTags); ?></div>
<?php 
$main_str = $text;

if (strpos($main_str, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
} elseif (strpos($main_str0, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
}; ?>
		   
			
    
    <?php endif; ?><a href="<?php echo $list[2]->link; ?>"><?php echo $list[2]->title; ?></a>
					</h3>
					
				</div>
				
 
			</div>
			
			
			
			<div class="uk-visible@m">	
				<!-- Intro image -->
				<div class="uk-inline uk-margin uk-link-heading">
					<a href="<?php echo $list[2]->link; ?>">
						<img  class="uk-border-rounded" src="<?php echo $thumb2->webp; ?>" type="image/webp" width="390" height="260" alt="<?php echo $article_image_alt[$list[2]->id]; ?>"  itemprop="thumbnailUrl"/>
					</a>
				<div class="uk-position-small uk-position-top-right  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"><span><a class="" href="<?php echo $list[2]->displayCategoryLink; ?>"><?php echo $list[2]->displayCategoryTitle; ?></a></span></small></div>
<div class="uk-position-small uk-position-bottom-left  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"> <?php echo $list[2]->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $list[2]->displayHits; ?></small></div>				
				</div>
				
				<!-- Title and date -->
				<div class="news-data d-flex justify-content-between">					
					<h3 class="uk-h6 uk-link-heading ">
						     <?php if ($params->get('show_tags', 0) && $list[2]->tags->itemTags) : ?>
         
		
		  
		   <div hidden><?php 
		   $text = LayoutHelper::render('joomla.content.tags-exlusive', $list[2]->tags->itemTags); ?></div>
<?php 
$main_str = $text;

if (strpos($main_str, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
} elseif (strpos($main_str0, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
}; ?>
		   
			
    
    <?php endif; ?><a href="<?php echo $list[2]->link; ?>"><?php echo $list[2]->title; ?></a>
					</h3>
					
				</div>
				
 
			</div>
    </div>
</div>	<hr>		
    <div class="uk-child-width-1-4@m uk-grid-small" uk-grid>
	    <?php
            
$thumb3 = $juImg->render(preg_replace($regexImageSrc, '', $article_image[$list[3]->id]), [
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
	 
	
			
				<div class="uk-card uk-hidden@m uk-grid-collapse " uk-grid>
				<!-- Intro image -->
				<div class="uk-card-media-left uk-cover-container uk-inline uk-margin uk-link-heading uk-width-2-5">
					<a href="<?php echo $list[3]->link; ?>">
						<img  class="uk-border-rounded" src="<?php echo $thumb3->webp; ?>" type="image/webp" width="390" height="260" alt="<?php echo $article_image_alt[$list[3]->id]; ?>"  itemprop="thumbnailUrl"/>
					</a>
				<div class="uk-position-small uk-position-top-right  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"><span><a class="" href="<?php echo $list[3]->displayCategoryLink; ?>"><?php echo $list[3]->displayCategoryTitle; ?></a></span></small></div>
<div class="uk-position-small uk-position-bottom-left  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"> <?php echo $list[3]->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $list[3]->displayHits; ?></small></div>				
				</div>
				
				<!-- Title and date -->
				<div class="uk-card-body uk-card-small3   uk-width-3-5">					
					<h3 class="uk-h6 uk-link-heading uk-margin-remove-bottom">
						     <?php if ($params->get('show_tags', 0) && $list[3]->tags->itemTags) : ?>
         
		
		  
		   <div hidden><?php 
		   $text = LayoutHelper::render('joomla.content.tags-exlusive', $list[3]->tags->itemTags); ?></div>
<?php 
$main_str = $text;

if (strpos($main_str, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
} elseif (strpos($main_str0, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
}; ?>
		   
			
    
    <?php endif; ?><a href="<?php echo $list[3]->link; ?>"><?php echo $list[3]->title; ?></a>
					</h3>
					
				</div>
				
 
			</div>
			
			
			
			<div class="uk-visible@m">	
				<!-- Intro image -->
				<div class="uk-inline uk-margin uk-link-heading">
					<a href="<?php echo $list[3]->link; ?>">
						<img  class="uk-border-rounded" src="<?php echo $thumb3->webp; ?>" type="image/webp" width="390" height="260" alt="<?php echo $article_image_alt[$list[3]->id]; ?>"  itemprop="thumbnailUrl"/>
					</a>
				<div class="uk-position-small uk-position-top-right  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"><span><a class="" href="<?php echo $list[3]->displayCategoryLink; ?>"><?php echo $list[3]->displayCategoryTitle; ?></a></span></small></div>
<div class="uk-position-small uk-position-bottom-left  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"> <?php echo $list[3]->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $list[3]->displayHits; ?></small></div>				
				</div>
				
				<!-- Title and date -->
				<div class="news-data d-flex justify-content-between">					
					<h3 class="uk-h6 uk-link-heading ">
						     <?php if ($params->get('show_tags', 0) && $list[3]->tags->itemTags) : ?>
         
		
		  
		   <div hidden><?php 
		   $text = LayoutHelper::render('joomla.content.tags-exlusive', $list[3]->tags->itemTags); ?></div>
<?php 
$main_str = $text;

if (strpos($main_str, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
} elseif (strpos($main_str0, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
}; ?>
		   
			
    
    <?php endif; ?><a href="<?php echo $list[3]->link; ?>"><?php echo $list[3]->title; ?></a>
					</h3>
					
				</div>
				
 
			</div>
				    <?php
            
$thumb4 = $juImg->render(preg_replace($regexImageSrc, '', $article_image[$list[4]->id]), [
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
	 
	
			
				<div class="uk-card uk-hidden@m uk-grid-collapse " uk-grid>
				<!-- Intro image -->
				<div class="uk-card-media-left uk-cover-container uk-inline uk-margin uk-link-heading uk-width-2-5">
					<a href="<?php echo $list[4]->link; ?>">
						<img  class="uk-border-rounded" src="<?php echo $thumb4->webp; ?>" type="image/webp" width="390" height="260" alt="<?php echo $article_image_alt[$list[4]->id]; ?>"  itemprop="thumbnailUrl"/>
					</a>
				<div class="uk-position-small uk-position-top-right  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"><span><a class="" href="<?php echo $list[4]->displayCategoryLink; ?>"><?php echo $list[4]->displayCategoryTitle; ?></a></span></small></div>
<div class="uk-position-small uk-position-bottom-left  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"> <?php echo $list[4]->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $list[4]->displayHits; ?></small></div>				
				</div>
				
				<!-- Title and date -->
				<div class="uk-card-body uk-card-small3   uk-width-3-5">					
					<h3 class="uk-h6 uk-link-heading uk-margin-remove-bottom">
						     <?php if ($params->get('show_tags', 0) && $list[4]->tags->itemTags) : ?>
         
		
		  
		   <div hidden><?php 
		   $text = LayoutHelper::render('joomla.content.tags-exlusive', $list[4]->tags->itemTags); ?></div>
<?php 
$main_str = $text;

if (strpos($main_str, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
} elseif (strpos($main_str0, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
}; ?>
		   
			
    
    <?php endif; ?><a href="<?php echo $list[4]->link; ?>"><?php echo $list[4]->title; ?></a>
					</h3>
					
				</div>
				
 
			</div>
			
			
			
			<div class="uk-visible@m">	
				<!-- Intro image -->
				<div class="uk-inline uk-margin uk-link-heading">
					<a href="<?php echo $list[4]->link; ?>">
						<img  class="uk-border-rounded" src="<?php echo $thumb4->webp; ?>" type="image/webp" width="390" height="260" alt="<?php echo $article_image_alt[$list[4]->id]; ?>"  itemprop="thumbnailUrl"/>
					</a>
				<div class="uk-position-small uk-position-top-right  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"><span><a class="" href="<?php echo $list[4]->displayCategoryLink; ?>"><?php echo $list[4]->displayCategoryTitle; ?></a></span></small></div>
<div class="uk-position-small uk-position-bottom-left  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"> <?php echo $list[4]->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $list[4]->displayHits; ?></small></div>				
				</div>
				
				<!-- Title and date -->
				<div class="news-data d-flex justify-content-between">					
					<h3 class="uk-h6 uk-link-heading ">
						     <?php if ($params->get('show_tags', 0) && $list[4]->tags->itemTags) : ?>
         
		
		  
		   <div hidden><?php 
		   $text = LayoutHelper::render('joomla.content.tags-exlusive', $list[4]->tags->itemTags); ?></div>
<?php 
$main_str = $text;

if (strpos($main_str, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
} elseif (strpos($main_str0, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
}; ?>
		   
			
    
    <?php endif; ?><a href="<?php echo $list[4]->link; ?>"><?php echo $list[4]->title; ?></a>
					</h3>
					
				</div>
				
 
			</div>
	    <?php
            
$thumb5 = $juImg->render(preg_replace($regexImageSrc, '', $article_image[$list[5]->id]), [
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
	 
	
			
				<div class="uk-card uk-hidden@m uk-grid-collapse " uk-grid>
				<!-- Intro image -->
				<div class="uk-card-media-left uk-cover-container uk-inline uk-margin uk-link-heading uk-width-2-5">
					<a href="<?php echo $list[5]->link; ?>">
						<img  class="uk-border-rounded" src="<?php echo $thumb5->webp; ?>" type="image/webp" width="390" height="260" alt="<?php echo $article_image_alt[$list[5]->id]; ?>"  itemprop="thumbnailUrl"/>
					</a>
				<div class="uk-position-small uk-position-top-right  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"><span><a class="" href="<?php echo $list[5]->displayCategoryLink; ?>"><?php echo $list[5]->displayCategoryTitle; ?></a></span></small></div>
<div class="uk-position-small uk-position-bottom-left  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"> <?php echo $list[5]->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $list[5]->displayHits; ?></small></div>				
				</div>
				
				<!-- Title and date -->
				<div class="uk-card-body uk-card-small3   uk-width-3-5">					
					<h3 class="uk-h6 uk-link-heading uk-margin-remove-bottom">
						     <?php if ($params->get('show_tags', 0) && $list[5]->tags->itemTags) : ?>
         
		
		  
		   <div hidden><?php 
		   $text = LayoutHelper::render('joomla.content.tags-exlusive', $list[5]->tags->itemTags); ?></div>
<?php 
$main_str = $text;

if (strpos($main_str, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
} elseif (strpos($main_str0, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
}; ?>
		   
			
    
    <?php endif; ?><a href="<?php echo $list[5]->link; ?>"><?php echo $list[5]->title; ?></a>
					</h3>
					
				</div>
				
 
			</div>
			
			
			
			<div class="uk-visible@m">	
				<!-- Intro image -->
				<div class="uk-inline uk-margin uk-link-heading">
					<a href="<?php echo $list[5]->link; ?>">
						<img  class="uk-border-rounded" src="<?php echo $thumb5->webp; ?>" type="image/webp" width="390" height="260" alt="<?php echo $article_image_alt[$list[5]->id]; ?>"  itemprop="thumbnailUrl"/>
					</a>
				<div class="uk-position-small uk-position-top-right  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"><span><a class="" href="<?php echo $list[5]->displayCategoryLink; ?>"><?php echo $list[5]->displayCategoryTitle; ?></a></span></small></div>
<div class="uk-position-small uk-position-bottom-left  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"> <?php echo $list[5]->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $list[5]->displayHits; ?></small></div>				
				</div>
				
				<!-- Title and date -->
				<div class="news-data d-flex justify-content-between">					
					<h3 class="uk-h6 uk-link-heading ">
						     <?php if ($params->get('show_tags', 0) && $list[5]->tags->itemTags) : ?>
         
		
		  
		   <div hidden><?php 
		   $text = LayoutHelper::render('joomla.content.tags-exlusive', $list[5]->tags->itemTags); ?></div>
<?php 
$main_str = $text;

if (strpos($main_str, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
} elseif (strpos($main_str0, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
}; ?>
		   
			
    
    <?php endif; ?><a href="<?php echo $list[5]->link; ?>"><?php echo $list[5]->title; ?></a>
					</h3>
					
				</div>
				
 
			</div>
	    <?php
            
$thumb6 = $juImg->render(preg_replace($regexImageSrc, '', $article_image[$list[6]->id]), [
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
	 
	
			
				<div class="uk-card uk-hidden@m uk-grid-collapse " uk-grid>
				<!-- Intro image -->
				<div class="uk-card-media-left uk-cover-container uk-inline uk-margin uk-link-heading uk-width-2-5">
					<a href="<?php echo $list[6]->link; ?>">
						<img  class="uk-border-rounded" src="<?php echo $thumb6->webp; ?>" type="image/webp" width="390" height="260" alt="<?php echo $article_image_alt[$list[6]->id]; ?>"  itemprop="thumbnailUrl"/>
					</a>
				<div class="uk-position-small uk-position-top-right  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"><span><a class="" href="<?php echo $list[6]->displayCategoryLink; ?>"><?php echo $list[6]->displayCategoryTitle; ?></a></span></small></div>
<div class="uk-position-small uk-position-bottom-left  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"> <?php echo $list[6]->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $list[6]->displayHits; ?></small></div>				
				</div>
				
				<!-- Title and date -->
				<div class="uk-card-body uk-card-small3   uk-width-3-5">					
					<h3 class="uk-h6 uk-link-heading uk-margin-remove-bottom">
						     <?php if ($params->get('show_tags', 0) && $list[6]->tags->itemTags) : ?>
         
		
		  
		   <div hidden><?php 
		   $text = LayoutHelper::render('joomla.content.tags-exlusive', $list[6]->tags->itemTags); ?></div>
<?php 
$main_str = $text;

if (strpos($main_str, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
} elseif (strpos($main_str0, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
}; ?>
		   
			
    
    <?php endif; ?><a href="<?php echo $list[6]->link; ?>"><?php echo $list[6]->title; ?></a>
					</h3>
					
				</div>
				
 
			</div>
			
			
			
			<div class="uk-visible@m">	
				<!-- Intro image -->
				<div class="uk-inline uk-margin uk-link-heading">
					<a href="<?php echo $list[6]->link; ?>">
						<img  class="uk-border-rounded" src="<?php echo $thumb6->webp; ?>" type="image/webp" width="390" height="260" alt="<?php echo $article_image_alt[$list[6]->id]; ?>"  itemprop="thumbnailUrl"/>
					</a>
				<div class="uk-position-small uk-position-top-right  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"><span><a class="" href="<?php echo $list[6]->displayCategoryLink; ?>"><?php echo $list[6]->displayCategoryTitle; ?></a></span></small></div>
<div class="uk-position-small uk-position-bottom-left  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"> <?php echo $list[6]->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $list[6]->displayHits; ?></small></div>				
				</div>
				
				<!-- Title and date -->
				<div class="news-data d-flex justify-content-between">					
					<h3 class="uk-h6 uk-link-heading ">
						     <?php if ($params->get('show_tags', 0) && $list[6]->tags->itemTags) : ?>
         
		
		  
		   <div hidden><?php 
		   $text = LayoutHelper::render('joomla.content.tags-exlusive', $list[6]->tags->itemTags); ?></div>
<?php 
$main_str = $text;

if (strpos($main_str, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
} elseif (strpos($main_str0, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
}; ?>
		   
			
    
    <?php endif; ?><a href="<?php echo $list[6]->link; ?>"><?php echo $list[6]->title; ?></a>
					</h3>
					
				</div>
				
 
			</div>			
    </div>		

</div>	</div>

 
</section>

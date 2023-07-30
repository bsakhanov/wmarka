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
	
<section class="uk-section uk-section-xsmall" >
	
	<!-- Section heading -->
<h3 class="uk-heading-line uk-h5"><span><a class="uk-button uk-button-primary uk-border-rounded" href="<?php echo $list[0]->displayCategoryLink; ?>">
                <?php echo $module->title; ?>
            </a></span></h3>

	
	
	<?php 
		$article_image   = [];
		$article_image_alt   = [];
		$article_Hits   = [];
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
	
	<div class="">
		
		<div class="uk-card  ">
			<a class="" href="<?php echo $list[0]->link; ?>">
			<!-- Latest article -->
			<div class="uk-card-media-top uk-inline-clip uk-transition-toggle">
				
				<!-- Intro image -->
				<div class="uk-inline-clip uk-transition-toggle">
					 
						<img class="uk-border-rounded" src="<?php echo $thumb->webp; ?>" type="image/webp" width="600" height="400" alt="<?php echo $article_image_alt[$list[0]->id]; ?>"  itemprop="thumbnailUrl"/>
						                    <div  class="uk-transition-slide-bottom uk-position-cover uk-overlay uk-overlay-primary uk-overlay-primary-news uk-light ">
			
<p class="uk-h6 uk-padding-top uk-margin" ><?php echo JHtml::_('string.truncate', (strip_tags($list[0]->displayIntrotext)), '65'); ?></p>

</div>	
					 
					
			<div class="uk-position-small uk-position-bottom-left  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"> <?php echo $list[0]->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $list[0]->displayHits; ?></small></div>
				</div>
				</div>
				 <div class="uk-card-body uk-card-small2">
				<!-- Title and date -->
				<div class="news-data d-flex justify-content-between">					
					<h3 class="uk-h5  uk-margin-remove uk-link-heading">
						<a href="<?php echo $list[0]->link; ?>"><?php echo $list[0]->title; ?></a>
					</h3>
					
				</div>
				

			</div>
			</a>
			<div class="uk-flex ">
     <?php if ($params->get('show_tags', 0) && $list[0]->tags->itemTags) : ?>
        <div class="mod-articles-category-tags">
		
		  
		   <div hidden><?php 
		   $text0 = LayoutHelper::render('joomla.content.tags-exlusive', $list[0]->tags->itemTags); ?></div>
<?php 
$main_str0 = $text0;

if (strpos($main_str0, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
} elseif (strpos($main_str0, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
}; ?>
		   
			
        </div>
    <?php endif; ?>


	</div>
		</div>
		
		
		<ul class="uk-list uk-list-divider uk-hr">
			
			<!-- Article 1 -->
 
			<li class="margin-mini3 ">		
 <a  class="uk-link-reset" href="<?php echo $list[1]->link; ?>">
						
						
					<h3 class="uk-h6 uk-margin-remove uk-text-break">
						<?php echo $list[1]->title; ?>
					</h3>
						
						<div class="uk-flex ">
     <?php if ($params->get('show_tags', 0) && $list[1]->tags->itemTags) : ?>
        <div class="mod-articles-category-tags">
		
		  
		   <div hidden><?php 
		   $text1 = LayoutHelper::render('joomla.content.tags-exlusive', $list[1]->tags->itemTags); ?></div>
<?php 
$main_str1 = $text1;

if (strpos($main_str1, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
} elseif (strpos($main_str0, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
}; ?>
		   
			
        </div>
    <?php endif; ?>
<small class="uk-flex uk-flex-middle"> <?php echo $list[1]->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $list[1]->displayHits; ?></small>

	</div>

 </a>
			</li>
			
			
			
			<!-- Article 2 -->
 		
 
			<li class="margin-mini3">		
 <a  class="uk-link-reset" href="<?php echo $list[2]->link; ?>">
						
						
					<h3 class="uk-h6 uk-margin-remove uk-text-break">
						<?php echo $list[2]->title; ?>
					</h3>
						
						<div class="uk-flex  ">
     <?php if ($params->get('show_tags', 0) && $list[2]->tags->itemTags) : ?>
        <div class="mod-articles-category-tags">
		
		  
		   <div hidden><?php 
		   $text2 = LayoutHelper::render('joomla.content.tags-exlusive', $list[2]->tags->itemTags); ?></div>
<?php 
$main_str2 = $text2;

if (strpos($main_str2, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
} elseif (strpos($main_str0, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
}; ?>
		   
			
        </div>
    <?php endif; ?>
<small class="uk-flex uk-flex-middle"> <?php echo $list[2]->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $list[2]->displayHits; ?></small>

	</div>

 </a>
			</li>

			
			<!-- Article 3 -->
 			
 
			<li class="margin-mini3">		
 <a  class="uk-link-reset" href="<?php echo $list[3]->link; ?>">
						
						
					<h3 class="uk-h6 uk-margin-remove uk-text-break">
						<?php echo $list[3]->title; ?>
					</h3>
						
						<div class="uk-flex ">
     <?php if ($params->get('show_tags', 0) && $list[3]->tags->itemTags) : ?>
        <div class="mod-articles-category-tags">
		
		  
		   <div hidden><?php 
		   $text3 = LayoutHelper::render('joomla.content.tags-exlusive', $list[3]->tags->itemTags); ?></div>
<?php 
$main_str3 = $text3;

if (strpos($main_str3, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
} elseif (strpos($main_str0, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
}; ?>
		   
			
        </div>
    <?php endif; ?>
<small class="uk-flex uk-flex-middle"> <?php echo $list[3]->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $list[3]->displayHits; ?></small>

	</div>

 </a>
			</li>
	
			

			
		</ul>
		
	</div>
	
</section>

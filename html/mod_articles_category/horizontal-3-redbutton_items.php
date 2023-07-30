<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   (C) 2020 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
JLoader::register('JUImage',  JPATH_LIBRARIES . '/juimage/JUImage.php');

$juImg = new JUImage();
?>
<?php
$regexImageSrc = '/#joomlaImage?([^\'" >]+)/';
?>
 <?php foreach ($items as $item) : ?>
 <div class="uk-card uk-hidden@m uk-grid-collapse  " uk-grid>


<div class="uk-card-media-left uk-cover-container uk-inline-clip uk-transition-toggle uk-width-2-5">
<?php
			$article_images  = json_decode($item->images);
						

			
$thumb = $juImg->render(preg_replace($regexImageSrc, '', $article_images->image_intro), [
	'w'     	=> '390',
	'h'     	=> '260',
	'q'         => '55',
	'zc'        => 'C',
	'far'        => 'C',	
	'webp'      => true,
	'webp_q'    => '50',
	'webp_maxq' => '55',
	'cache'     => 'img'
	
]);
?>
<div class="uk-inline-clip uk-transition-toggle">
<a class="" href="<?php echo $item->link; ?>"><img class="uk-border-rounded " src="<?php echo $thumb->webp; ?>" type="image/webp" width="390" height="260" 
	alt="<?php echo $item->title; ?> " class="uk-transition-scale-up uk-transition-opaque" itemprop="thumbnailUrl" loading="lazy"/>
 
<div class="uk-position-small uk-position-bottom-left  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"> <?php echo $item->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $item->displayHits; ?></small></div>

			</a></div>	
 </div>
 <div class="uk-card-body uk-card-small3 uk-width-3-5">
    <?php if ($params->get('link_titles') == 1) : ?>
        <?php $attributes = ['class' => 'mod-articles-category-title ' . $item->active]; ?>
		<h3 class="uk-h5  uk-margin-remove uk-link-heading uk-text-break">
<?php if ($params->get('show_tags', 0) && $item->tags->itemTags) : ?>
      
		
		  
		   <div hidden><?php 
		   $text = LayoutHelper::render('joomla.content.tags-exlusive', $item->tags->itemTags); ?></div>
<?php 
$main_str = $text;

if (strpos($main_str, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
} elseif (strpos($main_str, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
}; ?>
		   
			
 
    <?php endif; ?>          
          
         
        <?php $link = htmlspecialchars($item->link, ENT_COMPAT, 'UTF-8', false); ?>
        <?php $title = htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8', false); ?>
        <?php echo HTMLHelper::_('link', $link, $title, $attributes); ?>
		</h3>
    <?php else : ?>
	<div class="uk-h5  uk-margin-small-bottom uk-link-heading">
        <a class="" href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
		</div>
    <?php endif; ?>


 

    <?php if ($params->get('show_author')) : ?>
        <span class="mod-articles-category-writtenby">
            <?php echo $item->displayAuthorName; ?>
        </span>
    <?php endif; ?>

    <?php if ($item->displayCategoryTitle) : ?>
        <span class="mod-articles-category-category">
            (<?php echo $item->displayCategoryTitle; ?>)
        </span>
    <?php endif; ?>







    <?php if ($params->get('show_readmore')) : ?>
        <p class="mod-articles-category-readmore">
            <a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
                <?php if ($item->params->get('access-view') == false) : ?>
                    <?php echo Text::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
                <?php elseif ($item->alternative_readmore) : ?>
                    <?php echo $item->alternative_readmore; ?>
                    <?php echo HTMLHelper::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
                        <?php if ($params->get('show_readmore_title', 0)) : ?>
                            <?php echo HTMLHelper::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
                        <?php endif; ?>
                <?php elseif ($params->get('show_readmore_title', 0)) : ?>
                    <?php echo Text::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
                    <?php echo HTMLHelper::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
                <?php else : ?>
                    <?php echo Text::_('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE'); ?>
                <?php endif; ?>
            </a>
        </p>
    <?php endif; ?>
</div>
 
<div class="uk-hr uk-flex uk-flex-middle uk-margin-small ">
     
 
 
	<div hidden><?php $text2 = LayoutHelper::render('joomla.content.tags', $item->tags->itemTags); ?></div>

  
<?php
 
$format=str_replace('#Эксклюзив','',$text2);
echo $format;
?>
  
</div>
 
  
</div>
 
 
 
<div class="uk-card  uk-visible@m">


<div class="uk-card-media-top uk-inline-clip uk-transition-toggle">

<div class="uk-inline-clip uk-transition-toggle">
<a class="" href="<?php echo $item->link; ?>"><img class="uk-border-rounded " src="<?php echo $thumb->webp; ?>" type="image/webp" width="390" height="260" 
	alt="<?php echo $item->title; ?> " class="uk-transition-scale-up uk-transition-opaque" itemprop="thumbnailUrl" loading="lazy"/>
 
<div class="uk-position-small uk-position-bottom-left  uk-overlay-primary-news uk-light overla uk-border-rounded2"><small class="uk-flex uk-flex-middle"> <?php echo $item->displayDate; ?> |&nbsp; <?php echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';?><?php echo $item->displayHits; ?></small></div>

			</a></div>	
 </div>
 <div class="uk-card-body uk-card-small2">
    <?php if ($params->get('link_titles') == 1) : ?>
        <?php $attributes = ['class' => 'mod-articles-category-title ' . $item->active]; ?>
		<h3 class="uk-h5  uk-margin-remove uk-link-heading uk-text-break">   <?php if ($params->get('show_tags', 0) && $item->tags->itemTags) : ?>
      
		
		  
		   <div hidden><?php 
		   $text = LayoutHelper::render('joomla.content.tags-exlusive', $item->tags->itemTags); ?></div>
<?php 
$main_str = $text;

if (strpos($main_str, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
} elseif (strpos($main_str0, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
}; ?>
		   
			
 
    <?php endif; ?>
        <?php $link = htmlspecialchars($item->link, ENT_COMPAT, 'UTF-8', false); ?>
        <?php $title = htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8', false); ?>
        <?php echo HTMLHelper::_('link', $link, $title, $attributes); ?>
		</h3>
    <?php else : ?>
	<div class="uk-h5  uk-margin-small-bottom uk-link-heading">
        <a class="" href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
		</div>
    <?php endif; ?>


 

    <?php if ($params->get('show_author')) : ?>
        <span class="mod-articles-category-writtenby">
            <?php echo $item->displayAuthorName; ?>
        </span>
    <?php endif; ?>

    <?php if ($item->displayCategoryTitle) : ?>
        <span class="mod-articles-category-category">
            (<?php echo $item->displayCategoryTitle; ?>)
        </span>
    <?php endif; ?>







    <?php if ($params->get('show_readmore')) : ?>
        <p class="mod-articles-category-readmore">
            <a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
                <?php if ($item->params->get('access-view') == false) : ?>
                    <?php echo Text::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
                <?php elseif ($item->alternative_readmore) : ?>
                    <?php echo $item->alternative_readmore; ?>
                    <?php echo HTMLHelper::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
                        <?php if ($params->get('show_readmore_title', 0)) : ?>
                            <?php echo HTMLHelper::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
                        <?php endif; ?>
                <?php elseif ($params->get('show_readmore_title', 0)) : ?>
                    <?php echo Text::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
                    <?php echo HTMLHelper::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
                <?php else : ?>
                    <?php echo Text::_('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE'); ?>
                <?php endif; ?>
            </a>
        </p>
    <?php endif; ?>
</div>
 
<div class="uk-hr uk-flex uk-flex-middle  uk-margin-remove">
     
 
 
	<div hidden><?php $text2 = LayoutHelper::render('joomla.content.tags', $item->tags->itemTags); ?></div>

  
<?php
 
$format=str_replace('#Эксклюзив','',$text2);
echo $format;
?>
  
</div>
 
  
</div>

<?php endforeach; ?>

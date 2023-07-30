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
<div class="uk-card">
 <div class="uk-card-body uk-card-small ">
<div class="uk-flex uk-flex-between">
     <?php if ($params->get('show_tags', 0) && $item->tags->itemTags) : ?>
        <div class="mod-articles-category-tags">
		
		  
		   <div hidden><?php 
		   $text = LayoutHelper::render('joomla.content.tags-exlusive', $item->tags->itemTags); ?></div>
<?php 
$main_str = $text;

if (strpos($main_str, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-small uk-text-danger uk-text-bolder uk-flex-first margin-mini4 ">Эксклюзив</a>';
} elseif (strpos($main_str, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-small uk-text-danger uk-text-bolder uk-flex-first margin-mini4 ">Эксклюзив</a>';
}; ?>
		   
			
        </div>
    <?php endif; ?>
    <?php if ($item->displayHits) : ?>
        <div class="no-bakgr uk-text-small">
                <?php
 
        echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';
 
    ?><?php echo $item->displayHits; ?>
        </div>
    <?php endif; ?>	
	</div>
    <?php if ($params->get('link_titles') == 1) : ?>
        <?php $attributes = ['class' => 'mod-articles-category-title ' . $item->active]; ?>
		<h3 class="uk-h6 uk-text-bold uk-margin-remove uk-link-heading">   
        <?php $link = htmlspecialchars($item->link, ENT_COMPAT, 'UTF-8', false); ?>
        <?php $title = htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8', false); ?>
        <?php echo HTMLHelper::_('link', $link, $title, $attributes); ?>
		</h3>
    <?php else : ?>
	<div class="uk-h6 uk-text-primary uk-margin-small-bottom">
        <?php echo $item->title; ?>
		</div>
    <?php endif; ?>
	<div hidden><?php $text2 = LayoutHelper::render('joomla.content.tags', $item->tags->itemTags); ?></div>

 <div class="uk-flex uk-flex-between">
<?php
 
$format=str_replace('#Эксклюзив','',$text2);
echo $format;
?>
 <?php if ($item->displayDate) : ?>
        <span class="uk-label label-lenta"><?php echo $item->displayDate; ?></span>
    <?php endif; ?>
</div>

    <?php if ($params->get('show_author')) : ?>
        <span class="uk-h6 uk-text-muted uk-margin-small-bottom">
            <?php echo $item->displayAuthorName; ?>
        </span>
    <?php endif; ?>

    <?php if ($item->displayCategoryTitle) : ?>
        <span class="mod-articles-category-category">
            (<?php echo $item->displayCategoryTitle; ?>)
        </span>
    <?php endif; ?>





    <?php if ($params->get('show_introtext')) : ?>
        <div class="uk-h6 uk-margin-remove uk-text-break">
            <?php echo $item->displayIntrotext; ?>
        </div>
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
<hr>
</div>
<?php endforeach; ?>

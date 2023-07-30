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
<div class="uk-card uk-width-medium ">
<div class="uk-card-media-top ">
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
<img class="uk-border-rounded" src="<?php echo $thumb->webp; ?>" type="image/webp" width="390" height="260" 
	alt="<?php echo $item->title; ?> "  itemprop="thumbnailUrl"/>
 </div>
 <div class="uk-card-body uk-card-small uk-padding-remove-horizontal uk-padding-remove-top uk-flex uk-flex-middle uk-flex-wrap ">
    <?php if ($params->get('link_titles') == 1) : ?>
        <?php $attributes = ['class' => 'mod-articles-category-title ' . $item->active]; ?>
		<h3 class="uk-h5  uk-margin-remove uk-link-heading">   
        <?php $link = htmlspecialchars($item->link, ENT_COMPAT, 'UTF-8', false); ?>
        <?php $title = htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8', false); ?>
        <?php echo HTMLHelper::_('link', $link, $title, $attributes); ?>
		</h3>
    <?php else : ?>
	<div class="uk-h5  uk-margin-remove uk-link-heading">
        <?php echo $item->title; ?>
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



    <?php if ($params->get('show_tags', 0) && $item->tags->itemTags) : ?>
        <div class="mod-articles-category-tags">
            <?php echo LayoutHelper::render('joomla.content.tags', $item->tags->itemTags); ?>
        </div>
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
<div class="uk-card-footer uk-text-small">
<div class="uk-flex uk-flex-between">
 <?php if ($item->displayDate) : ?>
        <span class="uk-label label-exl uk-padding-remove-horizontal"><?php echo $item->displayDate; ?></span>
    <?php endif; ?>
    <?php if ($item->displayHits) : ?>
        <div class="no-bakgr uk-text-small">
                <?php
 
        echo '<span uk-icon="icon: eye; ratio: 0.7"></span>&nbsp;';
 
    ?><?php echo $item->displayHits; ?>
        </div>
    <?php endif; ?>	
	</div>
 </div>	
</div>
<?php endforeach; ?>

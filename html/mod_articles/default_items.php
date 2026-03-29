<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

?>
<div class="uk-grid uk-grid-small uk-child-width-1-1" uk-grid>
    <?php foreach ($items as $item) : ?>
        <?php
        $displayInfo = $item->displayHits || $item->displayAuthorName || $item->displayCategoryTitle || $item->displayDate;
        $images = json_decode($item->images);
        $introImage = $images->image_intro ?? '';
        ?>
        <div>
            <article class="uk-card uk-card-default uk-card-small uk-card-hover uk-display-block uk-link-toggle uk-transition-toggle" itemscope itemtype="https://schema.org/Article">
                
                <?php if ($params->get('image') && !empty($introImage)) : ?>
                    <div class="uk-card-media-top uk-inline-clip">
                        <a href="<?php echo $item->link; ?>" title="<?php echo $typograph($item->title); ?>">
                            <img src="<?php echo $introImage; ?>" 
                                 alt="<?php echo $typograph($item->title); ?>" 
                                 class="uk-transition-scale-up uk-transition-opaque"
                                 loading="lazy">
                        </a>
                    </div>
                <?php endif; ?>

                <div class="uk-card-body">
                    <?php if ($params->get('item_title')) : ?>
                        <h5 class="uk-h5 uk-margin-remove-bottom uk-text-bold" itemprop="headline">
                            <a href="<?php echo $item->link; ?>" class="uk-link-reset">
                                <?php echo $typograph($item->title); ?>
                            </a>
                        </h5>
                    <?php endif; ?>

                    <?php if ($displayInfo) : ?>
                        <div class="uk-article-meta uk-margin-small-top uk-text-meta uk-flex uk-flex-middle uk-flex-wrap">
                            <?php if ($item->displayDate) : ?>
                                <time class="uk-margin-small-right" datetime="<?php echo HTMLHelper::_('date', $item->publish_up, 'c'); ?>" itemprop="datePublished">
                                    <span uk-icon="icon: clock; ratio: 0.7" class="uk-margin-small-right"></span>
                                    <?php echo HTMLHelper::_('date', $item->publish_up, Text::_('DATE_FORMAT_LC3')); ?>
                                </time>
                            <?php endif; ?>
                            
                            <?php if ($item->displayCategoryTitle) : ?>
                                <span class="uk-text-primary uk-text-uppercase" style="font-size: 0.65rem; letter-spacing: 0.5px;">
                                    <?php echo $typograph($item->category_title); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php /* ВЫВОД МЕТОК (ТЕГОВ) */ ?>
                    <?php if ($params->get('show_tags', 1) && !empty($item->tags->itemTags)) : ?>
                        <div class="uk-margin-small-top uk-flex uk-flex-wrap" style="gap: 5px;">
                            <?php foreach ($item->tags->itemTags as $tag) : ?>
                                <span class="uk-text-meta uk-text-muted" style="font-size: 0.7rem;">
                                    <span class="uk-text-primary">#</span><?php echo $typograph($tag->title); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($params->get('show_introtext')) : ?>
                        <div class="uk-margin-small-top uk-text-small uk-text-muted" itemprop="description">
                            <?php 
                                $cleanText = strip_tags($item->displayIntrotext);
                                echo $typograph(\Joomla\CMS\String\StringHelper::truncate($cleanText, 110)); 
                            ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($params->get('show_readmore')) : ?>
                        <div class="uk-margin-small-top">
                            <a class="uk-button uk-button-text uk-text-primary uk-text-capitalize" href="<?php echo $item->link; ?>">
                                <?php echo Text::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
                                <span uk-icon="icon: arrow-right; ratio: 0.8"></span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                <meta itemprop="url" content="<?php echo $item->link; ?>" />
            </article>
        </div>
    <?php endforeach; ?>
</div>
<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_tags
 *
 * @copyright   (C) 2013 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Tags\Site\Helper\RouteHelper;


/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
$wa = $this->document->getWebAssetManager();
$wa->useScript('com_tags.tag-default');
 

// Get the user object.
$user = Factory::getUser();

// Check if user is allowed to add/edit based on tags permissions.
// Do we really have to make it so people can see unpublished tags???
$canEdit      = $user->authorise('core.edit', 'com_tags');
$canCreate    = $user->authorise('core.create', 'com_tags');
$canEditState = $user->authorise('core.edit.state', 'com_tags');
JLoader::register('JUImage',  JPATH_LIBRARIES . '/juimage/JUImage.php');
$juImg = new JUImage();	
$regexImageSrc = '/#joomlaImage?([^\'" >]+)/';
?>
<div class="com-tags__items">
    <form action="<?php echo htmlspecialchars(Uri::getInstance()->toString()); ?>" method="post" name="adminForm" id="adminForm">
        <?php if ($this->params->get('filter_field') || $this->params->get('show_pagination_limit')) : ?>
            <?php if ($this->params->get('filter_field')) : ?>
                 <div class="uk-margin" >

                    <input
                        type="text"
                        name="filter-search"
                        id="filter-search"
                        value="<?php echo $this->escape($this->state->get('list.filter')); ?>"
                        class="uk-input uk-form-width-small uk-form-small" onchange="document.adminForm.submit();"
                        placeholder="<?php echo Text::_('COM_TAGS_TITLE_FILTER_LABEL'); ?>"
                    >
                    <button type="submit" name="filter_submit" class="uk-button-small uk-button-primary"><?php echo Text::_('JGLOBAL_FILTER_BUTTON'); ?></button>
                    <button type="reset" name="filter-clear-button" class="uk-button-small uk-button-secondary"><?php echo Text::_('JSEARCH_FILTER_CLEAR'); ?></button>
                </div>
            <?php endif; ?>
	<?php if ($this->params->get('18')) : ?>

	<?php endif; ?>

            <input type="hidden" name="limitstart" value="">
            <input type="hidden" name="task" value="">
        <?php endif; ?>
    </form>
</div>	
<div class="uk-margin-bottom">
<div class="uk-child-width-1-3@m blog-items uk-grid-small  uk-flex uk-flex-center uk-flex-wrap  uk-grid-match"  uk-grid >

    <?php if (empty($this->items)) : ?>
        <div uk-alert>
            <span class="icon-info-circle" aria-hidden="true"></span><span class="visually-hidden"><?php echo Text::_('INFO'); ?></span>
            <?php echo Text::_('COM_TAGS_NO_ITEMS'); ?>
        </div>
    <?php else : ?>
	
 
            <?php foreach ($this->items as $i => $item) : ?> 
		
                <?php if ($item->core_state == 0) : ?>
                     
                <?php else : ?><div class="">
 <article  class="uk-card uk-card-default uk-padding-remove-horizontal  uk-box-shadow-small uk-box-shadow-hover-large uk-border-rounded" 
					itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">		
                    
                <?php endif; ?>
               <?php $images  = json_decode($item->core_images); ?>
				<?php

$thumb = $juImg->render(preg_replace($regexImageSrc, '', $images->image_intro), [
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
?><div class="uk-card-media-top uk-inline-clip uk-transition-toggle " >
                <?php if ($this->params->get('tag_list_show_item_image', 1) == 1 && !empty($images->image_intro)) : ?>
                    <a href="<?php echo Route::_(RouteHelper::getItemRoute($item->content_item_id, $item->core_alias, $item->core_catid, $item->core_language, $item->type_alias, $item->router)); ?>">
					<div class="uk-inline-clip uk-transition-toggle">
                        <img src="<?php echo $thumb->webp; ?>" type="image/webp" width="390" height="260"   alt="<?php echo $this->escape($item->core_title); ?> " class="uk-transition-scale-up uk-transition-opaque" itemprop="thumbnailUrl" loading="lazy"/>
                    <div  class="uk-transition-slide-bottom uk-position-cover uk-overlay uk-overlay-primary uk-overlay-primary-news uk-light ">
			
<p class="uk-h6 uk-padding-top uk-margin" ><?php echo JHtml::_('string.truncate', (strip_tags($item->core_body)), '120'); ?></p>
</div>	


			</div>
					</a></div>
                <?php endif; ?>	
		<div class="uk-card-body uk-card-small  uk-padding-remove-top" itemprop="articleBody">			
                <?php if (($item->type_alias === 'com_users.category') || ($item->type_alias === 'com_banners.category')) : ?>
                    <h2 class="uk-h6 uk-card-header" itemprop="name" >
                        				<a class="uk-link-heading" href="<?php echo Route::_(RouteHelper::getItemRoute($item->content_item_id, $item->core_alias, $item->core_catid, $item->core_language, $item->type_alias, $item->router)); ?>" itemprop="url">
					<?php echo $this->escape($item->core_title); ?>
				</a>
                    </h2>
                <?php else : ?>
                    <h2 itemprop="name" class="uk-h6 uk-text-bold uk-card-header uk-padding-remove-horizontal">
                  
                            				<a class="uk-link-heading" href="<?php echo Route::_(RouteHelper::getItemRoute($item->content_item_id, $item->core_alias, $item->core_catid, $item->core_language, $item->type_alias, $item->router)); ?>" itemprop="url">
					<?php echo $this->escape($item->core_title); ?>
				</a>
                     
                    </h2>
                <?php endif; ?>
                
		<dl class="uk-flex uk-flex-middle uk-flex-wrap uk-article-meta uk-margin-remove">

				
<dd class="uk-article-meta">
	<time datetime="<?php
                                    echo HTMLHelper::_(
                                        'date',
                                        $item->displayDate,
                                        $this->escape($this->params->get('date_format', Text::_('DATE_FORMAT_LC4')))
                                    ); ?>" itemprop="dateCreated" data-uk-tooltip title="<?= Text::_('COM_TAGS_CREATED_DATE') ?>">
		<span uk-icon="icon:calendar"></span> <span class=""><?php
                                    echo HTMLHelper::_(
                                        'date',
                                        $item->displayDate,
                                        $this->escape($this->params->get('date_format', Text::_('DATE_FORMAT_LC3')))
                                    ); ?></span>
	</time>
	
</dd>			
 
			
	</dl>			
<div class="uk-text-truncate uk-link-reset uk-margin-small-top uk-text-primary">							 
					<p uk-margin>
        <button class="tag-11 tag-list0 uk-button uk-button-default uk-button-small uk-first-column" itemprop="keywords">
        <?php echo HTMLHelper::_('content.prepare', $this->tags_title, '', 'com_tag.tag'); ?> </button>
    </p>	
</div>
		</div>
				 
		</article></div>	
            <?php endforeach; ?>
	
    <?php endif; ?>
	
	</div>
	</div>

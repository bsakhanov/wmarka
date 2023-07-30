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
$wa->useScript('com_tags.tags-default');

// Get the user object.
$user = Factory::getUser();

// Check if user is allowed to add/edit based on tags permissions.
$canEdit      = $user->authorise('core.edit', 'com_tags');
$canCreate    = $user->authorise('core.create', 'com_tags');
$canEditState = $user->authorise('core.edit.state', 'com_tags');

$columns = $this->params->get('tag_columns', 1);

// Avoid division by 0 and negative columns.
if ($columns < 1) {
    $columns = 1;
}

$bsspans = floor(12 / $columns);

if ($bsspans < 1) {
    $bsspans = 1;
}

$bscolumns = min($columns, floor(12 / $bsspans));
$n         = count($this->items);
JLoader::register('JUImage',  JPATH_LIBRARIES . '/juimage/JUImage.php');
$juImg = new JUImage();	
$regexImageSrc = '/#joomlaImage?([^\'" >]+)/';
?>

<div class="com-tags__items">
    <form action="<?php echo htmlspecialchars(Uri::getInstance()->toString()); ?>" method="post" name="adminForm" id="adminForm">
        <?php if ($this->params->get('filter_field') || $this->params->get('show_pagination_limit')) : ?>
            <?php if ($this->params->get('filter_field')) : ?>
                 <div class="uk-margin" >
                    <label class="filter-search-lbl visually-hidden" for="filter-search">
                        <?php echo Text::_('COM_TAGS_TITLE_FILTER_LABEL'); ?>
                    </label>
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
	<?php if ($this->params->get('20')) : ?>

	<?php endif; ?>

            <input type="hidden" name="limitstart" value="">
            <input type="hidden" name="task" value="">
        <?php endif; ?>
    </form>
</div>	
<div class="category-desc clearfix"></div>
<div class="com-content-category-card mb-4" itemscope itemtype="https://schema.org/Blog">
    <?php if ($this->items == false || $n === 0) : ?>
        <div class="alert alert-info">
            <span class="icon-info-circle" aria-hidden="true"></span><span class="visually-hidden"><?php echo Text::_('INFO'); ?></span>
            <?php echo Text::_('COM_TAGS_NO_TAGS'); ?>
        </div>

    <?php else : ?>
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
		
        <?php foreach ($this->items as $i => $item) : ?>
            <?php if ($n === 1 || $i === 0 || $bscolumns === 1 || $i % $bscolumns === 0) : ?>

            <?php endif; ?>
		<div class="col">	            
		<div class="card shadow h-100"> 

                <?php if ($this->params->get('all_tags_show_tag_image') && !empty($item->images)) : ?>
                    <?php $images = json_decode($item->images); ?>			

                        <?php if (!empty($images->image_intro)) : ?>
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
	'error_image' => 'images/none.jpg',		
	'cache'     => 'img' 

	
]); 
?>							
                            <?php $imgfloat = empty($images->float_intro) ? $this->params->get('float_intro') : $images->float_intro; ?>

                                <?php $imageOptions = []; ?>
                                <?php if ($images->image_intro_caption) : ?>
                                        <?php $imageOptions['title'] = $images->image_intro_caption; ?>
                                        <?php $imageOptions['class'] = 'caption'; ?>
                                <?php endif; ?>
                                <img src="<?php echo $thumb->webp; ?>" type="image/webp" width="390" height="260" alt="<?php echo $this->escape($item->core_title); ?> "  itemprop="thumbnailUrl"/>

                        <?php endif; ?>
                <?php endif; ?>
            <div class="card-body text-center">			
                <?php if ((!empty($item->access)) && in_array($item->access, $this->user->getAuthorisedViewLevels())) : ?>
                    <h3 class="card-title mb-5 h5">
                        <a href="<?php echo Route::_(RouteHelper::getComponentTagRoute($item->id . ':' . $item->alias, $item->language)); ?>">
                            <?php echo $this->escape($item->title); ?>
                        </a>
                    </h3>
                <?php endif; ?>

                <?php if (($this->params->get('all_tags_show_tag_description', 1) && !empty($item->description)) || $this->params->get('all_tags_show_tag_hits')) : ?>
                    <div class="caption">
                        <?php if ($this->params->get('all_tags_show_tag_description', 1) && !empty($item->description)) : ?>
                            <span class="tag-body">
                                <?php echo HTMLHelper::_('string.truncate', $item->description, $this->params->get('all_tags_tag_maximum_characters')); ?>
                            </span>
                        <?php endif; ?>
                        <?php if ($this->params->get('all_tags_show_tag_hits')) : ?>
                            <span class="list-hits badge bg-info">
                                <?php echo Text::sprintf('JGLOBAL_HITS_COUNT', $item->hits); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (($i === 0 && $n === 1) || $i === $n - 1 || $bscolumns === 1 || (($i + 1) % $bscolumns === 0)) : ?>
                </div>  </div>          
            <?php endif; ?>

        <?php endforeach; ?>
    <?php endif; ?>
    </div>
</div>	

<div>
    <?php // Add pagination links ?>
    <?php if (!empty($this->items)) : ?>
        <?php if (($this->params->def('show_pagination', 2) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->pagesTotal > 1)) : ?>
            <div class="com-tags__pagination w-100">
                <?php if ($this->params->def('show_pagination_results', 1)) : ?>
                    <p class="counter float-end pt-3 pe-2">
                        <?php echo $this->pagination->getPagesCounter(); ?>
                    </p>
                <?php endif; ?>
                <?php echo $this->pagination->getPagesLinks(); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>

<?php

/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   (C) 2013 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;

$params  = $displayData->params;
$images  = json_decode($displayData->images);

if (empty($images->image_intro)) {
    return;
}

$imgclass   = empty($images->float_intro) ? $params->get('float_intro') : $images->float_intro;
$layoutAttr = [
    'src'   => $images->image_intro,
    'alt'   => empty($images->image_intro_alt) && empty($images->image_intro_alt_empty) ? false : $images->image_intro_alt,
    'width' => '100%'
];
JLoader::register('JUImage',  JPATH_LIBRARIES . '/juimage/JUImage.php');

$juImg = new JUImage();
?>
<?php
$regexImageSrc = '/#joomlaImage?([^\'" >]+)/';
?>
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
?>
<div class="uk-card-media-top">
    <?php if ($params->get('link_titles') && $params->get('access-view')) { ?>
    <a href="<?php echo Route::_(RouteHelper::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language)); ?>">
	<div class="uk-border-rounded uk-inline-clip uk-transition-toggle">
		 
				<img <?php if ($images->image_intro_caption) {
                echo 'class="caption" title="' . htmlspecialchars($images->image_intro_caption) . '"';
            } ?> src="<?php echo $thumb->webp; ?>" type="image/webp" width="390" height="260" class="uk-transition-scale-up uk-transition-opaque uk-border-rounded uk-brightness2"	alt="<?php echo $this->escape($displayData->title); ?> "  itemprop="thumbnailUrl" loading="lazy">
 
			<div  class="uk-transition-slide-bottom uk-position-cover uk-overlay uk-overlay-primary-news uk-light ">
			<p class="uk-h6 uk-padding-top uk-margin" ><?php echo JHtml::_('string.truncate', (strip_tags($displayData->introtext)), '120'); ?></p>
			</div>	
	</div>
	</a>
    <?php } else { ?>
	<div class="uk-border-rounded uk-inline-clip uk-transition-toggle">
 
				<img <?php if ($images->image_intro_caption) {
                echo 'class="caption" title="' . htmlspecialchars($images->image_intro_caption) . '"';
            } ?> src="<?php echo $thumb->webp; ?>" type="image/webp" width="390" height="260" class="uk-transition-scale-up uk-transition-opaque uk-border-rounded uk-brightness2"	alt="<?php echo $this->escape($displayData->title); ?> "  itemprop="thumbnailUrl" loading="lazy"> 
 
			<div  class="uk-transition-slide-bottom uk-position-cover uk-overlay uk-overlay-primary-news uk-light ">
			<p class="uk-h6 uk-padding-top uk-margin" ><?php echo JHtml::_('string.truncate', (strip_tags($displayData->introtext)), '120'); ?></p>
			</div>			
	</div>
    <?php } ?>
</div>


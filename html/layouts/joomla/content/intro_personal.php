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
	'w'     	=> '300',
	'h'     	=> '300',
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
<figure class="<?php echo htmlspecialchars($imgclass, ENT_COMPAT, 'UTF-8'); ?> item-image">
	<?php if ($params->get('link_intro_image') && ($params->get('access-view') || $params->get('show_noauth', '0') == '1')) : ?>
		<a href="<?php echo Route::_(RouteHelper::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language)); ?>"
			itemprop="url" title="<?php echo $this->escape($displayData->title); ?>">
		<picture>
			<source srcset="<?php echo $thumb->webp; ?>" type="image/webp" width="300" height="300">
				<img <?php if ($images->image_intro_caption) {
                echo 'class="caption" title="' . htmlspecialchars($images->image_intro_caption) . '"';
            } ?> src="<?php echo $thumb->img; ?>" width="300" height="300" class="uk-transition-scale-up uk-transition-opaque uk-border-rounded uk-brightness2"	alt="<?php echo $this->escape($displayData->title); ?> "  itemprop="thumbnailUrl" loading="lazy">
		</picture>
		</a>
	<?php else : ?>
		<picture>
			<source srcset="<?php echo $thumb->webp; ?>" type="image/webp" width="300" height="300">
				<img <?php if ($images->image_intro_caption) {
                echo 'class="caption" title="' . htmlspecialchars($images->image_intro_caption) . '"';
            } ?> src="<?php echo $thumb->img; ?>" width="300" height="300" class="uk-transition-scale-up uk-transition-opaque uk-border-rounded uk-brightness2"	alt="<?php echo $this->escape($displayData->title); ?> "  itemprop="thumbnailUrl" loading="lazy">
		</picture>
	<?php endif; ?>
	<?php if (isset($images->image_intro_caption) && $images->image_intro_caption !== '') : ?>
		<figcaption class="caption">
		<div class="uk-card-body uk-card-small uk-padding-remove-vertical  uk-text-center">
		   <h2 class="uk-h5 uk-card-header uk-text-break"><?php echo $this->escape($displayData->title); ?></h2>
		<div class="uk-text-small uk-text-bold"><?php echo htmlspecialchars($images->image_intro_caption); ?></div>
		</div></figcaption>
	<?php endif; ?>
</figure>

<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   (C) 2016 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\Utilities\ArrayHelper;

$params  = $displayData->params;
$images  = json_decode($displayData->images);

if (empty($images->image_intro))
{
	return;
}

$imgclass  = empty($images->float_fulltext) ? $params->get('float_fulltext') : $images->float_fulltext;
$extraAttr = '';
$img       = HTMLHelper::cleanImageURL($images->image_intro);
$alt       = empty($images->image_fulltext_alt) && empty($images->image_fulltext_alt_empty) ? '' : 'alt="' . htmlspecialchars($images->image_fulltext_alt, ENT_COMPAT, 'UTF-8') . '"';

// Set lazyloading only for images which have width and height attributes
if ((isset($img->attributes['width']) && (int) $img->attributes['width'] > 0)
&& (isset($img->attributes['height']) && (int) $img->attributes['height'] > 0))
{
	$extraAttr = ArrayHelper::toString($img->attributes) . ' loading="lazy"';
}
JLoader::register('JUImage',  JPATH_LIBRARIES . '/juimage/JUImage.php');

$juImg = new JUImage();
?>
<?php
$regexImageSrc = '/#joomlaImage?([^\'" >]+)/';
?>
<?php

$thumb = $juImg->render(preg_replace($regexImageSrc, '', $images->image_intro), [
	'w'     	=> '900',
	'h'     	=> '600',
	'q'         => '100',
	'zc'        => 'C',
	'far'        => 'C',	
	'webp'      => true,
	'webp_q'    => '100',
	'webp_maxq' => '100',
	'cache'     => 'img' 

	
]); 

?>
<figure class="uk-hidden@m uk-visibles">


				<img src="<?php echo $thumb->webp; ?>" type="image/webp" width="900" height="600" alt="<?php echo $this->escape($displayData->title); ?> "  loading="lazy" <?php echo $extraAttr; ?> >
					<meta itemprop="url" content="<?php echo JUri::root(); ?><?php echo $thumb->img; ?>">					
				    <meta itemprop="height" content="600" />
				    <meta itemprop="width" content="900" />	
  <div class=" uk-margin-top">
	<?php if ($images->image_intro_caption !== '') : ?>
		<figcaption class="uk-text-meta"><?php echo htmlspecialchars($images->image_intro_caption, ENT_COMPAT, 'UTF-8'); ?></figcaption>
	<?php endif; ?>
  </div>
</figure>
<figure class="uk-flex uk-visible@m uk-flex-center uk-grid-small uk-margin-bottom uk-visibles" uk-grid>
  <div class="uk-width-xlarge">

				<img src="<?php echo $thumb->webp; ?>" type="image/webp" width="900" height="600" alt="<?php echo $this->escape($displayData->title); ?> "  loading="lazy" <?php echo $extraAttr; ?> >
					<meta itemprop="url" content="<?php echo JUri::root(); ?><?php echo $thumb->img; ?>">					
				    <meta itemprop="height" content="600" />
				    <meta itemprop="width" content="900" />	
  </div>
  <div class="uk-width-expand uk-margin-top">
	<?php if ($images->image_intro_caption !== '') : ?>
		<figcaption class="uk-text-meta"><?php echo htmlspecialchars($images->image_intro_caption, ENT_COMPAT, 'UTF-8'); ?></figcaption>
	<?php endif; ?>
  </div>
</figure>

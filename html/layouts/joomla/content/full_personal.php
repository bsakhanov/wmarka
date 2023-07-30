<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

use Joomla\CMS\Router\Route;

$params = $displayData->params;

$images = json_decode($displayData->images);

if (isset($images->image_intro) && !empty($images->image_intro)) {
    $imgfloat = empty($images->float_intro) ? $params->get('float_intro') : $images->float_intro;
JLoader::register('JUImage',  JPATH_LIBRARIES . '/juimage/JUImage.php');

$juImg = new JUImage();
?>
<?php

$thumb = $juImg->render($images->image_fulltext, [
	'w'     	=> '500',
	'h'     	=> '500',
	'q'         => '85',
	'zc'        => 'C',
	'far'        => 'C',	
	'webp'      => true,
	'webp_q'    => '80',
	'webp_maxq' => '85',
	'error_image' => 'images/li.jpg',	
	'cache'     => 'img' 

	
]); 
?>
<div class="uk-text-center ">
<figure>

		<picture>
			<source srcset="<?php echo $thumb->webp; ?>" type="image/webp" width="500" height="500">
				<img  src="<?php echo $thumb->img; ?>" width="500" height="500" class="uk-transition-scale-up uk-transition-opaque"	alt="<?php echo $this->escape($displayData->title); ?> "  itemprop="thumbnailUrl" loading="lazy">
		</picture>	
		<figcaption>
		
	<h5 class="uk-text-normal uk-text-bold uk-padding-small uk-background-muted"><?php echo htmlspecialchars($images->image_fulltext_caption); ?></h5>
		
		</figcaption>
</figure>
</div>
<?php
}
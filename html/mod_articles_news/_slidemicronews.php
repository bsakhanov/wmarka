<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JLoader::register('JUImage',  JPATH_LIBRARIES . '/juimage/JUImage.php');
                    $juImg = new JUImage();	
                    $images = json_decode($item->images);
					$thumb = $juImg->render($images->image_intro, [
	'w'     	=> '300',
	'h'     	=> '400',
	'q'         => '55',
	'zc'        => 'C',
	'far'        => 'C',	
	'webp'      => true,
	'webp_q'    => '50',
	'webp_maxq' => '55',
	'cache'     => 'img'
	
]);
?>

<div class="uk-inline-clip uk-transition-toggle" >
<?php if ($params->get('img_intro_full') !== 'none' && !empty($item->imageSrc)) : ?>	
                        <a href="<?php echo $item->link; ?>" itemprop="url" target="<?php echo $params->get('open_link', '_self'); ?>">
                                        
										 
                                        <img src="<?php echo $thumb->webp; ?>" type="image/webp" width="300" height="400" class="uk-transition-scale-up uk-transition-opaque uk-brightness2" alt="<?php echo $item->title; ?> "  itemprop="thumbnailUrl"/>
 
										
                        </a>
<?php endif; ?>


 <div class="uk-position-top">
<div class="uk-light uk-padding-small" >

 				<span class="uk-text-middle"> 
<span uk-icon="icon: camera; ratio: 2"></span> </span>
  </div>
 </div>

<div class="uk-position-bottom uk-position-bottom-right uk-overlay-primary-news">
<div class="uk-padding uk-padding-small uk-padding-remove-bottom   uk-text-left   uk-width-large" >
<?php if ($params->get('item_title')) : ?>
	<?php $item_heading = $params->get('item_heading', 'h4 uk-link-heading'); ?>
	<<?php echo $item_heading; ?> class="uk-h5<?php echo $params->get('moduleclass_sfx'); ?>  uk-link-heading">
	<?php if ($item->link !== '' && $params->get('link_titles')) : ?>
		<a href="<?php echo $item->link; ?>">
			<?php echo JHtml::_('string.truncate', (strip_tags($item->title)), '100'); ?>
		</a>
	<?php else : ?>
		<?php echo JHtml::_('string.truncate', (strip_tags($item->title)), '100'); ?>
	<?php endif; ?>
	</<?php echo $item_heading; ?>>
<?php endif; ?>
  </div> 
 </div></div>
<?php if (!$params->get('intro_only')) : ?>
	<?php echo $item->afterDisplayTitle; ?>
<?php endif; ?>

<?php echo $item->beforeDisplayContent; ?>

<?php if ($params->get('show_introtext', 1)) : ?>
	<?php echo $item->introtext; ?>
<?php endif; ?>

<?php echo $item->afterDisplayContent; ?>

<?php if (isset($item->link) && $item->readmore != 0 && $params->get('readmore')) : ?>
	<?php echo '<a class="readmore" href="' . $item->link . '">' . $item->linkText . '</a>'; ?>
<?php endif; ?>
 

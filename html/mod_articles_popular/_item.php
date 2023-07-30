<?php

defined('_JEXEC') or die;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Language\Associations;

JLoader::register('JUImage',  JPATH_LIBRARIES . '/juimage/JUImage.php');

$juImg = new JUImage();
?>
<?php
$regexImageSrc = '/#joomlaImage?([^\'" >]+)/';
?>
<?php

$thumb = $juImg->render(preg_replace($regexImageSrc, '', $images->image_intro), [
	'w'     	=> '400',
	'h'     	=> '225',
	'q'         => '55',
	'zc'        => 'C',
	'far'        => 'C',	
	'webp'      => true,
	'webp_q'    => '50',
	'webp_maxq' => '55',
	'cache'     => 'img'
	
]);
?>
<?php if (!$params->get('intro_only')) echo $item->afterDisplayTitle ?>

        <div class="uk-inline">
            <picture>


	<source srcset="<?php echo $thumb->webp; ?>" type="image/webp" width="400" height="225">
	<img src="<?php echo $thumb->img; ?>" width="400" height="225" 
	alt="<?php echo $item->title; ?> "  itemprop="thumbnailUrl"/>
</picture>
            <div class="uk-overlay-primary uk-position-cover"></div>
            <div class="uk-overlay uk-position-bottom uk-light">
                <p><a href="<?php echo $item->link; ?>" itemprop="url"><span itemprop="name"><?php echo JHtml::_('string.truncate', (strip_tags($item->title)), '70'); ?></span></a></p>
				<span class="uk-text-middle">
 <time datetime="<?php echo JHtml::_('date', $item->created, 'c'); ?>" itemprop="dateCreated">				
<?php echo JHtml::_('date', $item->created, JText::_('DATE_FORMAT_LC4')); ?>
</time>
<meta itemprop="interactionCount" content="UserPageVisits:<?php echo $item->hits; ?>" />
<span uk-icon="icon: eye; ratio: 0.9"></span> <?php echo $item->hits; ?></span>
            </div>
        </div>









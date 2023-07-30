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
$images = json_decode($item->images);
?>
<?php
$regexImageSrc = '/#joomlaImage?([^\'" >]+)/';
?>
<?php

$thumb = $juImg->render($images->image_intro, [
	'w'     	=> '80',
	'h'     	=> '80',
	'q'         => '55',
	'zc'        => 'C',
	'far'        => 'C',	
	'webp'      => true,
	'webp_q'    => '50',
	'webp_maxq' => '55',
	'cache'     => 'img'
	
]);
?>
        <div class="uk-grid-small uk-flex-middle" uk-grid>
            <div itemprop="image" itemscope itemtype="http://schema.org/ImageObject" class="uk-width-auto">
               
				<picture>
					<source srcset="<?php echo $thumb->webp; ?>" type="image/webp" width="80" height="80">
					<img class="uk-border-circle" src="<?php echo $thumb->img; ?>" width="80" height="80" 
					alt="<?php echo $item->title; ?> "  itemprop="thumbnailUrl"/>
					<meta itemprop="url" content="<?php echo JUri::root(); ?><?php echo $thumb->img; ?>">					
				    <meta itemprop="height" content="80" />
				    <meta itemprop="width" content="80" />						
				</picture>
            </div>
            <div class="uk-width-expand uk-link-heading"><div itemprop="headline">
                <a  href="<?php echo $item->link; ?>" itemprop="url"><span itemprop="name"  ><h3 class="uk-h6 uk-text-primary uk-margin-small-bottom"><?php echo JHtml::_('string.truncate', (strip_tags($item->title)), '70'); ?></h3></span></a></div>
                <p class="uk-text-meta uk-margin-remove-top"><span class="uk-text-middle uk-text-meta ">
 <time datetime="<?php echo JHtml::_('date', $item->created, 'c'); ?>" itemprop="dateCreated">				
<?php echo JHtml::_('date', $item->created, JText::_('DATE_FORMAT_LC3')); ?>
</time>
<meta itemprop="interactionCount" content="UserPageVisits:<?php echo $item->hits; ?>" />
<span uk-icon="icon: eye; ratio: 0.9"></span> <?php echo $item->hits; ?></span></p>
            </div>
        </div>


       

       









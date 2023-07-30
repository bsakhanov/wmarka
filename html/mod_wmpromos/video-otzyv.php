<?php 
/**
* @file
* @brief    Responsive FavPromote Module
* @author   FavThemes
* @version  1.4
* @remarks  Copyright (C) 2013 FavThemes
* @remarks  Licensed under GNU/GPLv3, see http://www.gnu.org/licenses/gpl-3.0.html
* @see      http://www.favthemes.com/
*/

// no direct access

defined('_JEXEC') or die;

$moduleBgColor            = $params->get('moduleBgColor');
$moduleBorder             = $params->get('moduleBorder');
$moduleBorderRadius       = $params->get('moduleBorderRadius');
$uploadImage              = $params->get('uploadImage');
$imageAlt                 = $params->get('imageAlt');
$moduleLink               = $params->get('moduleLink');
$moduleTarget             = $params->get('moduleTarget');
$contentText              = $params->get('contentText');
$paragraphText            = $params->get('paragraphText');
$paragraphTextColor       = $params->get('paragraphTextColor');
$paragraphTextFontSize    = $params->get('paragraphTextFontSize');
$paragraphTextLineHeight  = $params->get('paragraphTextLineHeight');
$paragraphTextAlign       = $params->get('paragraphTextAlign');
$titleText                = $params->get('titleText');
$titleIcon                = $params->get('titleIcon');
$titleIconFontSize        = $params->get('titleIconFontSize');
$titleIconVerticalAlign   = $params->get('titleIconVerticalAlign');
$titleColor               = $params->get('titleColor');
$titleBgColor             = $params->get('titleBgColor');
$titlePadding             = $params->get('titlePadding');
$titleFontSize            = $params->get('titleFontSize');
$titleLineHeight          = $params->get('titleLineHeight');
$titleTextAlign           = $params->get('titleTextAlign');


$rv = rand(0,1000);

?>


<div class="uk-card uk-width-medium uk-margin-medium-left uk-margin-small-bottom uk-border-rounded  uk-padding-remove uk-background-secondary-2 box-shadow-kvadro" itemscope itemtype="http://schema.org/VideoObject"   >

	<a href="//www.youtube.com/watch?v=<?php echo $moduleLink; ?>" data-caption="<?php echo $titleText; ?>" ><figure class="uk-card-media-top uk-border-rounded uk-inline-clip uk-transition-toggle " ><img data-src="//img.youtube.com/vi/<?php echo $moduleLink; ?>/mqdefault.jpg" alt="<?php echo $titleText; ?>" uk-img="offsetTop:0"   width="auto" height="auto" class="lazy uk-transition-scale-up uk-transition-opaque uk-border-rounded" itemprop="thumbnailUrl"/>
	<div class="uk-position-medium uk-position-center uk-light"><span uk-icon="icon: play-circle; ratio: 4"></span></div>
		<figcaption class="text-muted data-hidden" ><?php echo $titleText; ?></figcaption>
	</figure>
	<!-- Картинки -->

	<div class="uk-card-body uk-border-rounded  uk-background-secondary-2 uk-card-small" >
		<div class="uk-card-title uk-text-center"   >
		<div  class="uk-text-primary uk-button uk-button-text3 uk-text-truncate" title="<?php echo $titleText; ?>" uk-tooltip="pos: bottom"><?php echo $titleText; ?>
		</div>
		<div class="uk-card-footer uk-text-center uk-text-truncate"  title="<?php echo $paragraphText; ?>" uk-tooltip="pos: bottom"><?php echo $paragraphText; ?></div>
	</div>
	</div>
	</a>
	<span class="data-hidden">
		<!-- Основные характеристики -->
		<link itemprop="url" href="//www.youtube.com/watch?v=<?php echo $moduleLink; ?>">
		<meta itemprop="name" content="<?php echo $titleText; ?>">
		<meta itemprop="description" content="<?php echo $paragraphText; ?>">
		<meta itemprop="duration" content="PT0M30S">
		<span itemprop="author" itemscope itemtype="http://schema.org/Person"></span>
		<meta itemprop="isFamilyFriendly" content="true">
		<meta itemprop="license" content="СС">
		<link itemprop="image" href="<?php echo $uploadImage; ?>">
	<!-- Даты -->
		<meta itemprop="uploadDate" content="2017-06-05T00:00:00">
	<!-- Картинки -->
		<span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
		  <link itemprop="contentUrl" href="http://i1.ytimg.com/vi/<?php echo $moduleLink; ?>/maxresdefault.jpg">
		  <meta itemprop="width" content="320">
		  <meta itemprop="height" content="180">
		</span>

	<!-- Плеер -->
		  <link itemprop="embedUrl" href="//www.youtube.com/watch?v=<?php echo $moduleLink; ?>">
		  <meta itemprop="playerType" content="HTML5">
		  <meta itemprop="width" content="1920">
		  <meta itemprop="height" content="1080">
	</span>	
 
</div>
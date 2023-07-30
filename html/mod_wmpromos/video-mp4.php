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


<li>
<div class="uk-card  uk-width-medium uk-margin-small uk-border-rounded  uk-padding-remove uk-background-secondary-2 box-shadow-kvadro" itemscope itemtype="http://schema.org/VideoObject" >
	<figure class="uk-card-media-top uk-border-rounded uk-inline-clip uk-transition-toggle "  uk-lightbox><link href="/<?php echo $moduleLink; ?>"  ><img src="<?php echo $uploadImage; ?>" alt="<?php echo $titleText; ?>" width="320" height="180" class="uk-transition-scale-up uk-transition-opaque uk-border-rounded" itemprop="thumbnailUrl" />
	<div class="uk-position-medium uk-position-center uk-light"><span uk-icon="icon: play-circle; ratio: 4"></span></div>
		<figcaption class="text-muted" style="display: none;" itemprop="name"><?php echo $titleText; ?></figcaption>
	</figure>
	<div class="uk-card-body uk-border-rounded  uk-background-secondary-2 uk-card-small">
		<div class="uk-card-title uk-text-center"  uk-lightbox><a href="/<?php echo $moduleLink; ?>" class="uk-text-primary uk-button uk-button-text3 uk-text-truncate" title="<?php echo $titleText; ?>" uk-tooltip="pos: bottom"><?php echo $titleText; ?></a>
		</div>
		<div class="uk-card-footer uk-text-center uk-text-truncate" title="<?php echo $paragraphText; ?>" uk-tooltip="pos: bottom"><?php echo $paragraphText; ?></div>
	</div>
	<span class="data-hidden">
		<!-- Основные характеристики -->
		<link itemprop="url" href="/<?php echo $moduleLink; ?>">
		<meta itemprop="name" content="<?php echo $titleText; ?>">
		<meta itemprop="description" content="<?php echo $paragraphText; ?>">
		<meta itemprop="duration" content="PT0M50S">
		<span itemprop="author" itemscope itemtype="http://schema.org/Person"></span>
		<meta itemprop="isFamilyFriendly" content="true">
		<meta itemprop="license" content="СС">
		<link itemprop="image" href="<?php echo $uploadImage; ?>">
	<!-- Даты -->
		<meta itemprop="uploadDate" content="2017-06-05T00:00:00">
	<!-- Картинки -->
		<span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
		  <link itemprop="contentUrl" href="<?php echo $uploadImage; ?>">
		  <meta itemprop="width" content="300">
		  <meta itemprop="height" content="169">
		</span>

	<!-- Плеер -->
		  <link itemprop="embedUrl" href="/<?php echo $moduleLink; ?>">
		  <meta itemprop="playerType" content="HTML5">
		  <meta itemprop="width" content="1920">
		  <meta itemprop="height" content="1080">
	</span>
</div> 
</li>
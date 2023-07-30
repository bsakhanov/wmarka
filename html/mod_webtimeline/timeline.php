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

$moduleBgColor2            = $params->get('moduleBgColor2');
$moduleBorder2             = $params->get('moduleBorder2');
$moduleBorderRadius2       = $params->get('moduleBorderRadius2');
$uploadImage2              = $params->get('uploadImage2');
$imageAlt2                 = $params->get('imageAlt2');
$moduleLink2               = $params->get('moduleLink2');
$moduleTarget2             = $params->get('moduleTarget2');
$contentText2              = $params->get('contentText2');
$paragraphText2            = $params->get('paragraphText2');
$paragraphTextColor2       = $params->get('paragraphTextColor2');
$paragraphTextFontSize2    = $params->get('paragraphTextFontSize2');
$paragraphTextLineHeight2  = $params->get('paragraphTextLineHeight2');
$paragraphTextAlign2       = $params->get('paragraphTextAlign2');
$titleText2                = $params->get('titleText2');
$titleIcon2                = $params->get('titleIcon2');
$titleIconFontSize2        = $params->get('titleIconFontSize2');
$titleIconVerticalAlign2   = $params->get('titleIconVerticalAlign2');
$titleColor2               = $params->get('titleColor2');
$titleBgColor2             = $params->get('titleBgColor2');
$titlePadding2             = $params->get('titlePadding2');
$titleFontSize2            = $params->get('titleFontSize2');
$titleLineHeight2          = $params->get('titleLineHeight2');
$titleTextAlign2           = $params->get('titleTextAlign2');

$rv = rand(0,1000);

?>
									<div class="timeline-post blocus-post">	
										<div class="timeline-meta for-large-icons">
											<div class="meta-details uk-text-bold uk-light"><?php echo $paragraphText; ?></div>
										</div>
										<div class="timeline-icon icon-larger uk-background-primary uk-light iconbg-blocus">
											<div class="icon-placeholder uk-padding-small"><span uk-icon="icon: <?php echo $titleIcon; ?>; ratio: 2"></span></div>
											<div class="timeline-bar"></div>
										</div>
										<div class="timeline-content " uk-scrollspy="cls: uk-animation-slide-left; repeat: true">
											<div class="uk-card-header uk-padding-remove">
												<h2 class="uk-title-timeline uk-text-primary uk-text-bold "><?php echo $titleText; ?></h2>
											</div>
											<div class="content-details uk-card-body uk-padding-remove">
												<?php echo $contentText; ?>
											</div>
										</div>
										<!-- timeline content -->
									</div>
									<!-- .timeline-post -->

									<div class="timeline-post blocus-post">
										<div class="timeline-meta for-large-icons">
											<div class="meta-details uk-text-bold uk-light"><?php echo $paragraphText2; ?></div>
										</div>
										<div class="timeline-icon icon-larger uk-background-primary uk-light iconbg-blocus">
											<div class="icon-placeholder uk-padding-small"><span uk-icon="icon: <?php echo $titleIcon2; ?>; ratio: 2"></span></div>
											<div class="timeline-bar"></div>
										</div>
										<div class="timeline-content " uk-scrollspy="cls: uk-animation-slide-right; repeat: true">
											<div class="uk-card-header uk-padding-remove">
												<h2 class="uk-title-timeline uk-text-primary uk-text-bold"><?php echo $titleText2; ?></h2>
											</div>
											<div class="content-details uk-card-body uk-padding-remove">
												<?php echo $contentText2; ?>
											</div>
										</div>
										<!-- timeline content -->
									</div>



									



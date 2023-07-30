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

									<div class="timeline-post blocus-post">
										<div class="timeline-meta for-large-icons">
											<div class="meta-details uk-text-bold"><?php echo $paragraphText; ?></div>
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



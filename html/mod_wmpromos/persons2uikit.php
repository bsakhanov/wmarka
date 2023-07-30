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

					<li class="uk-width-medium-1-4">
						<a href="#<?php echo $moduleLink; ?>" data-uk-modal="">
							<figure class="uk-overlay uk-overlay-hover"><img src="<?php echo $uploadImage; ?>" alt="<?php echo $titleText; ?>" width="300" height="300" class="uk-overlay-scale" />
								<figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom uk-ignore">
									<p><i class="uk-icon-phone-square "></i> <?php echo $paragraphText; ?></p>
								</figcaption>
							</figure>
						</a>
						<div class="uk-alert uk-alert-large"><strong><a href="#persona-3" data-uk-modal=""><?php echo $titleText; ?></a></strong></div>
						<div id="<?php echo $moduleLink; ?>" class="uk-modal">
							<div class="uk-modal-dialog">
								<div class="uk-modal-header uk-alert uk-text-primary uk-text-bold uk-text-center"><?php echo $titleText; ?>
								</div>
								<div class="uk-overflow-container">
									<p><?php echo $contentText; ?></p>
								</div>
								<div class="uk-modal-footer  uk-alert uk-text-primary uk-text-bold uk-text-large uk-text-right"><i class="uk-icon-phone-square "></i> <?php echo $paragraphText; ?></div></div>
							</div>
						</div>
					</li>


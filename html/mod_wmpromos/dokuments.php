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
$moduleLink2              = $params->get('moduleLink2');
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

		<div class="uk-card box-shadow-kvadro uk-margin uk-border-rounded  uk-padding-remove uk-background-secondary-2 uk-width-medium">
			<a href="<?php echo $moduleLink2; ?>">
				<div class="thumbnail uk-card-media-top uk-border-rounded uk-inline-clip uk-transition-toggle" itemtype="https://schema.org/ImageObject" itemprop="image"><img src="<?php echo $uploadImage; ?>" alt="<?php echo $titleText; ?>" width="400" height="400" class="uk-transition-scale-up uk-transition-opaque uk-border-rounded" itemprop="url" />
					<div class="uk-transition-slide-bottom uk-position-bottom uk-overlay uk-overlay-primary uk-light ">
						<p class="uk-h4 uk-margin-remove"><?php echo $paragraphText; ?></p>
					</div>
				</div>
			</a>
			<div class="uk-card-body uk-padding-small">
				<h3 class="uk-card-title uk-heading-line uk-text-center uk-text-uppercase uk-text-primary"><?php echo $titleText; ?></h3>
				<div class="uk-button-group uk-flex uk-flex-center"><a href="#<?php echo $moduleLink; ?>" class="uk-button uk-button-primary uk-button-small button-group-rounded-left" uk-toggle="">Превью</a> <a href="/<?php echo $moduleLink2; ?>" class="uk-button uk-button-small button-group-rounded-right ">Скачать</a>
					<div id="<?php echo $moduleLink; ?>" uk-modal="">
						<div class="uk-modal-dialog">
							<button type="button" class="uk-modal-close-default" uk-close=""></button>
							<div class="uk-modal-header uk-background-primary uk-light uk-text-center">
								<h4 class="uk-modal-title uk-text-lead" itemprop="name"><?php echo $titleText; ?></h4>
								<?php echo $paragraphText; ?></div>
							<div class="uk-modal-body uk-background-body-2 " itemprop="description" uk-overflow-auto="">
								<div>
									<?php echo $contentText; ?>
								</div>
							</div>
							<div class="uk-modal-footer uk-text-right">
								<button type="button" class="uk-button uk-button-primary uk-modal-close"><?= JText::_('MOD_PROMO_CLOSE') ?></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

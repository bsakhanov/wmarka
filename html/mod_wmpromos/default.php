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

<div class="uk-card  uk-margin-small uk-border-rounded  uk-padding-remove uk-background-secondary-2 " >
	<figure class="thumbnail uk-card-media-top uk-border-rounded uk-inline-clip uk-transition-toggle " itemtype="https://schema.org/ImageObject" itemprop="image"><img src="<?php echo $uploadImage; ?>" alt="<?php echo $titleText; ?>" width="400" height="400" class="uk-transition-scale-up uk-transition-opaque uk-border-rounded" itemprop="url" />
		<figcaption class="text-muted" style="display: none;" itemprop="caption"><?php echo $titleText; ?></figcaption>
	</figure>
	<div class="uk-card-body uk-border-rounded  uk-background-secondary-2 uk-card-small">
		<div class="uk-card-title uk-text-center" itemscope="itemscope" itemtype="http://schema.org/Person"><a href="#<?php echo $moduleLink; ?>" class="uk-text-primary uk-button uk-button-text3 " uk-toggle=""><?php echo $titleText; ?></a>
			<div id="<?php echo $moduleLink; ?>" uk-modal="">
				<div class="uk-modal-dialog">
					<button type="button" class="uk-modal-close-default" uk-close=""></button>
					<div class="uk-modal-header uk-background-primary uk-text-center uk-light">
						<h4 class="uk-modal-title uk-text-lead " itemprop="name"><?php echo $titleText; ?></h4>
						<div itemprop="jobTitle"><?php echo $paragraphText; ?></div></div>
					<div class="uk-modal-body uk-background-body-2 " itemprop="description" uk-overflow-auto="">
						<?php echo $contentText; ?>
					</div>
					<div class="uk-modal-footer uk-text-right">
						<button type="button" class="uk-button uk-button-primary uk-modal-close"><?= JText::_('MOD_PROMO_CLOSE') ?></button>
					</div>
				</div>
			</div>
		</div>
		<div class="uk-card-footer uk-text-center" ><?php echo $paragraphText; ?></div>
	</div>
</div> 
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

<li class=" uk-transition-toggle" tabindex="0" >
 	<a href="#<?php echo $moduleLink; ?>" target="_<?php echo $moduleTarget; ?> " class="" uk-toggle=""><div class="thumbnail  uk-inline-clip" itemtype="https://schema.org/ImageObject" itemprop="image" ><img src="<?php echo $uploadImage; ?>" alt="<?php echo $titleText; ?>" width="auto" height="100%" class="uk-inline uk-transition-scale-up uk-transition-opaque "  itemprop="url" >            

				</div>
            </a>
			<div class="uk-position-center" itemscope itemtype="http://schema.org/Service">
                <div class=" <?php echo $titleColor; ?> uk-text-center"><h4 class="uk-margin-remove-right uk-margin-remove-left uk-margin-medium-bottom"><a href="#<?php echo $moduleLink; ?>"><span uk-icon="icon: <?php echo $titleIcon; ?>; ratio: 4"></span></a></h4></div>
                <div class="uk-transition-slide-bottom-large uk-text-center <?php echo $titleColor; ?>"><h4 class="uk-margin-remove uk-padding-top"><a href="#<?php echo $moduleLink; ?>" class=" uk-text-center " itemprop="name" uk-toggle=""><?php echo $titleText; ?></a></h4></div>
							<div id="<?php echo $moduleLink; ?>" uk-modal="">
				<div class="uk-modal-dialog">
					<button type="button" class="uk-modal-close-default" uk-close=""></button>
					<div class="uk-modal-header uk-background-primary uk-text-center uk-light">
						<h4 class="uk-modal-title uk-text-lead " itemprop="category"><?php echo $titleText; ?></h4>
						<div itemprop="disambiguatingDescription"><?php echo $paragraphText; ?></div></div>
					<div class="uk-modal-body uk-background-body-2 " itemprop="description" uk-overflow-auto="">
						<?php echo $contentText; ?>
					</div>
					<div class="uk-modal-footer uk-text-right">
						<button type="button" class="uk-button uk-button-primary uk-modal-close"><?= JText::_('MOD_PROMO_CLOSE') ?></button>
					</div>
				</div>
			</div>
            </div>
            </li>
 
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

<div class="uk-card  uk-margin-medium uk-border-rounded  uk-padding-remove uk-background-secondary-2 uk-grid-collapse uk-child-width-1-2@s box-shadow-kvadro" itemscope="itemscope" itemtype="https://schema.org/ImageObject" uk-grid>
	<a  class="uk-tablet-width-100" href="#<?php echo $moduleLink; ?>"  uk-toggle=""><figure class="uk-tablet-width-100 thumbnail uk-card-media-left uk-border-rounded uk-inline-clip uk-transition-toggle " itemprop="image" uk-cover-container>
	<img src="<?php echo $uploadImage; ?>" alt="<?php echo $titleText; ?>" title="<?php echo $titleText; ?>" class="uk-transition-scale-up uk-transition-opaque uk-border-rounded uk-brightness2" itemprop="url" width="600" height="400">
	
	        <div class="uk-position-center uk-light"> 
                <span class="uk-transition-fade " uk-icon="icon: plus; ratio: 3"  ></span>
            </div>
		<figcaption class="text-muted" style="display: none;" ><?php echo $titleText; ?></figcaption>
	</figure></a>
	<div class="uk-tablet-width-100 uk-card-body uk-border-rounded  uk-background-secondary-2 uk-card-small "  >

		<div class="uk-card-title uk-text-center"  ><h3><a href="#<?php echo $moduleLink; ?>" class="uk-button uk-button-text5 " uk-toggle=""><?php echo $titleText; ?></a></h3>	

		<hr  class="">
			<div id="<?php echo $moduleLink; ?>" uk-modal="">
				<div class="uk-modal-dialog" itemscope="itemscope"  itemtype="http://schema.org/Product">
					<button type="button" class="uk-modal-close-default" uk-close=""></button>
					<div class="uk-modal-header uk-background-primary uk-text-center uk-light ">
						<h4 class="uk-modal-title uk-text-lead " itemprop="name"><?php echo $titleText; ?></h4>
						<div ><?php echo $paragraphText; ?></div></div>		
						<div class="data-hidden" itemtype="http://schema.org/AggregateOffer" itemscope="itemscope" itemprop="offers">
						<meta content="60050" itemprop="highPrice"> 
						<meta content="180" itemprop="lowPrice"> 
						<meta content="KZT" itemprop="priceCurrency"> 
</div>
					<div class="uk-modal-body box-shadow-kvadro-inset" itemprop="description" uk-overflow-auto="">
						<?php echo $contentText; ?>
					</div>
					<div class="uk-modal-footer uk-text-right uk-background-body-2 box-shadow-footer">
							
		<p uk-margin>
		
		<a href="<?php echo $moduleLink2; ?>" class="uk-button uk-button-primary" ><?= JText::_('MOD_PROMO_MORE') ?></a>
		<button type="button" class="uk-button uk-button-primary uk-modal-close"><?= JText::_('MOD_PROMO_CLOSE') ?></button>
		</p>
		
						
					</div>
				</div>
			</div>
		</div>

	</div>
</div> 
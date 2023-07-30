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
$uploadImage1              = $params->get('uploadImage1');
$uploadImage2              = $params->get('uploadImage2');
$uploadImage3              = $params->get('uploadImage3');
$uploadImage4              = $params->get('uploadImage4');
$uploadImage5              = $params->get('uploadImage5');
$uploadImage6              = $params->get('uploadImage6');
$uploadImage7              = $params->get('uploadImage7');

$uploadImage1tumb              = $params->get('uploadImage1tumb');
$uploadImage2tumb              = $params->get('uploadImage2tumb');
$uploadImage3tumb              = $params->get('uploadImage3tumb');
$uploadImage4tumb              = $params->get('uploadImage4tumb');
$uploadImage5tumb              = $params->get('uploadImage5tumb');
$uploadImage6tumb              = $params->get('uploadImage6tumb');
$uploadImage7tumb              = $params->get('uploadImage7tumb');

$moduleLink1               = $params->get('moduleLink1');
$moduleLink2               = $params->get('moduleLink2');
$moduleLink3               = $params->get('moduleLink3');
$moduleLink4               = $params->get('moduleLink4');
$moduleLink5               = $params->get('moduleLink5');
$moduleLink6               = $params->get('moduleLink6');
$moduleLink7               = $params->get('moduleLink7');

$moduleLink1doc               = $params->get('moduleLink1doc');
$moduleLink2doc               = $params->get('moduleLink2doc');
$moduleLink3doc               = $params->get('moduleLink3doc');
$moduleLink4doc               = $params->get('moduleLink4doc');
$moduleLink5doc               = $params->get('moduleLink5doc');
$moduleLink6doc               = $params->get('moduleLink6doc');
$moduleLink7doc               = $params->get('moduleLink7doc');

$titleText1                = $params->get('titleText1');
$titleText2                = $params->get('titleText2');
$titleText3                = $params->get('titleText3');
$titleText4                = $params->get('titleText4');
$titleText5                = $params->get('titleText5');
$titleText6                = $params->get('titleText6');
$titleText7                = $params->get('titleText7');

$paragraphText1            = $params->get('paragraphText1');
$paragraphText2            = $params->get('paragraphText2');
$paragraphText3            = $params->get('paragraphText3');
$paragraphText4            = $params->get('paragraphText4');
$paragraphText5            = $params->get('paragraphText5');
$paragraphText6            = $params->get('paragraphText6');
$paragraphText7            = $params->get('paragraphText7');

$contentText1              = $params->get('contentText1');
$contentText2              = $params->get('contentText2');
$contentText3              = $params->get('contentText3');
$contentText4              = $params->get('contentText4');
$contentText5              = $params->get('contentText5');
$contentText6              = $params->get('contentText6');
$contentText7              = $params->get('contentText7');

$slideBgColor1             = $params->get('slideBgColor1');
$slideBgColor2             = $params->get('slideBgColor2');
$slideBgColor3             = $params->get('slideBgColor3');
$slideBgColor4             = $params->get('slideBgColor4');
$slideBgColor5             = $params->get('slideBgColor5');
$slideBgColor6             = $params->get('slideBgColor6');
$slideBgColor7             = $params->get('slideBgColor7');

$slideBgOpacity1           = $params->get('slideBgOpacity1');
$slideBgOpacity2           = $params->get('slideBgOpacity2');
$slideBgOpacity3           = $params->get('slideBgOpacity3');
$slideBgOpacity4           = $params->get('slideBgOpacity4');
$slideBgOpacity5           = $params->get('slideBgOpacity5');
$slideBgOpacity6           = $params->get('slideBgOpacity6');
$slideBgOpacity7           = $params->get('slideBgOpacity7');

$moduleTarget1             = $params->get('moduleTarget1');
$moduleTarget2             = $params->get('moduleTarget2');
$moduleTarget3             = $params->get('moduleTarget3');
$moduleTarget4             = $params->get('moduleTarget4');
$moduleTarget5             = $params->get('moduleTarget5');
$moduleTarget6             = $params->get('moduleTarget6');
$moduleTarget7             = $params->get('moduleTarget7');

$titleIcon1                = $params->get('titleIcon1');
$titleIcon2                = $params->get('titleIcon2');
$titleIcon3                = $params->get('titleIcon3');
$titleIcon4                = $params->get('titleIcon4');
$titleIcon5                = $params->get('titleIcon5');
$titleIcon6                = $params->get('titleIcon6');
$titleIcon7                = $params->get('titleIcon7');

$titleColor1               = $params->get('titleColor1');
$titleColor2               = $params->get('titleColor2');
$titleColor3               = $params->get('titleColor3');
$titleColor4               = $params->get('titleColor4');
$titleColor5               = $params->get('titleColor5');
$titleColor6               = $params->get('titleColor6');
$titleColor7               = $params->get('titleColor7');

$moduleBgColor            = $params->get('moduleBgColor');
$moduleBgColor            = $params->get('moduleBgColor');
$moduleBorder             = $params->get('moduleBorder');
$moduleBorderRadius       = $params->get('moduleBorderRadius');

$imageAlt                 = $params->get('imageAlt');

$moduleTarget             = $params->get('moduleTarget');
$contentText              = $params->get('contentText');
$paragraphText            = $params->get('paragraphText');
$paragraphTextColor       = $params->get('paragraphTextColor');
$paragraphTextFontSize    = $params->get('paragraphTextFontSize');
$paragraphTextLineHeight  = $params->get('paragraphTextLineHeight');
$paragraphTextAlign       = $params->get('paragraphTextAlign');

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
<style>
body {
    background-image: url(/templates/astana/images/bg/025-bg.jpg);
    background-repeat: repeat;
    background-attachment: fixed;
	    background-size: inherit;
}
</style>
<div class="uk-background-secondary"  data-uk-slider="velocity: 5; autoplay: true;  autoplay-interval: 3000;">

    <div class="uk-position-relative ">

        <div class="uk-slider-container uk-flex uk-flex-center uk-flex-middle">
	<ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-3@m uk-child-width-1-5@l " >
<li class=" uk-transition-toggle" tabindex="0" itemscope="itemscope" itemtype="https://schema.org/ImageObject">
 	<a href="#<?php echo $moduleLink1; ?>" target="_<?php echo $moduleTarget; ?> " uk-toggle><div class="uk-inline-clip <?php echo $slideBgColor1; ?>"   ><img src="<?php echo $uploadImage1tumb; ?>" alt="<?php echo $titleText1; ?>" width="auto" height="100%" class="uk-inline uk-transition-scale-up uk-transition-opaque   opacity-<?php echo $slideBgOpacity1; ?>" itemprop="image" contentUrl="url" >            

				</div>  
            </a>
			<div class="uk-position-center" itemscope itemtype="http://schema.org/Service">
                <div class=" <?php echo $titleColor1; ?> uk-text-center"><h4 class="uk-margin-remove-right uk-margin-remove-left uk-margin-medium-bottom">
				<a href="#<?php echo $moduleLink1; ?>"><span class="uk-tt" uk-icon="icon: <?php echo $titleIcon1; ?>; ratio: 6"></span></a></h4></div>
                <div class="uk-transition-slide-bottom-large uk-text-center <?php echo $titleColor1; ?> uk-tt"><h4 class="uk-margin-remove uk-padding-top"><a href="#<?php echo $moduleLink1; ?>" class=" uk-text-center uk-button uk-button-text5 " itemprop="name" uk-toggle=""><?php echo $titleText1; ?></a></h4></div>
							<div id="<?php echo $moduleLink1; ?>" class="uk-modal-full" uk-modal> 
				<div class="uk-modal-dialog">
					<button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
					<div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid>
                
                    <div class="uk-background-cover" style="background-image: url('<?php echo $uploadImage1; ?>');" uk-height-viewport></div>
                    <div class="uk-padding-large">
                        <h2 class="uk-modal-title uk-text-lead " itemprop="category"><?php echo $titleText1; ?></h2>
						<div itemprop="disambiguatingDescription"><?php echo $paragraphText1; ?></div>
                        <div class="uk-modal-body " itemprop="description" >
						<?php echo $contentText1; ?>
						</div>
						<div class="uk-modal-footer uk-text-right">
						<button type="button" class="uk-button uk-button-primary uk-modal-close"><?= JText::_('MOD_PROMO_CLOSE') ?></button>
					</div></div>
                    </div>
                
				</div>
			</div>
            </div>
            </li>
<li class=" uk-transition-toggle" tabindex="0" itemscope="itemscope" itemtype="https://schema.org/ImageObject">
 	<a href="#<?php echo $moduleLink2; ?>" target="_<?php echo $moduleTarget; ?> " uk-toggle><div class="uk-inline-clip <?php echo $slideBgColor2; ?>"   ><img src="<?php echo $uploadImage2tumb; ?>" alt="<?php echo $titleText2; ?>" width="auto" height="100%" class="uk-inline uk-transition-scale-up uk-transition-opaque  opacity-<?php echo $slideBgOpacity2; ?>" itemprop="image" contentUrl="url" >            

				</div>  
            </a>
			<div class="uk-position-center" itemscope itemtype="http://schema.org/Service">
                <div class=" <?php echo $titleColor2; ?> uk-text-center"><h4 class="uk-margin-remove-right uk-margin-remove-left uk-margin-medium-bottom">
				<a href="#<?php echo $moduleLink2; ?>"><span uk-icon="icon: <?php echo $titleIcon2; ?>; ratio: 6"></span></a></h4></div>
                <div class="uk-transition-slide-bottom-large uk-text-center <?php echo $titleColor2; ?>"><h4 class="uk-margin-remove uk-padding-top"><a href="#<?php echo $moduleLink2; ?>" class=" uk-text-center uk-button uk-button-text5 " itemprop="name" uk-toggle=""><?php echo $titleText2; ?></a></h4></div>
							<div id="<?php echo $moduleLink2; ?>" class="uk-modal-full" uk-modal> 
				<div class="uk-modal-dialog">
					<button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
					<div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid>
                
                    <div class="uk-background-cover" style="background-image: url('<?php echo $uploadImage2; ?>');" uk-height-viewport></div>
                    <div class="uk-padding-large">
                        <h2 class="uk-modal-title uk-text-lead " itemprop="category"><?php echo $titleText2; ?></h2>
						<div itemprop="disambiguatingDescription"><?php echo $paragraphText2; ?></div>
                        <div class="uk-modal-body " itemprop="description" >
						<?php echo $contentText2; ?>
						</div>
						<div class="uk-modal-footer uk-text-right">
						<button type="button" class="uk-button uk-button-primary uk-modal-close"><?= JText::_('MOD_PROMO_CLOSE') ?></button>
					</div></div>
                    </div>
                

				</div>
			</div>
            </div>
            </li>
<li class=" uk-transition-toggle" tabindex="0" itemscope="itemscope" itemtype="https://schema.org/ImageObject">
 	<a href="#<?php echo $moduleLink3; ?>" target="_<?php echo $moduleTarget; ?> " uk-toggle><div class="uk-inline-clip <?php echo $slideBgColor3; ?>"   ><img src="<?php echo $uploadImage3tumb; ?>" alt="<?php echo $titleText3; ?>" width="auto" height="100%" class="uk-inline uk-transition-scale-up uk-transition-opaque  opacity-<?php echo $slideBgOpacity3; ?>" itemprop="image" contentUrl="url" >            

				</div>  
            </a>
			<div class="uk-position-center" itemscope itemtype="http://schema.org/Service">
                <div class=" <?php echo $titleColor3; ?> uk-text-center"><h4 class="uk-margin-remove-right uk-margin-remove-left uk-margin-medium-bottom">
				<a href="#<?php echo $moduleLink3; ?>"><span uk-icon="icon: <?php echo $titleIcon3; ?>; ratio: 6"></span></a></h4></div>
                <div class="uk-transition-slide-bottom-large uk-text-center <?php echo $titleColor3; ?>"><h4 class="uk-margin-remove uk-padding-top"><a href="#<?php echo $moduleLink3; ?>" class=" uk-text-center uk-button uk-button-text5 " itemprop="name" uk-toggle=""><?php echo $titleText3; ?></a></h4></div>
							<div id="<?php echo $moduleLink3; ?>" class="uk-modal-full" uk-modal> 
				<div class="uk-modal-dialog">
					<button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
					<div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid>
                
                    <div class="uk-background-cover" style="background-image: url('<?php echo $uploadImage3; ?>');" uk-height-viewport></div>
                    <div class="uk-padding-large">
                        <h2 class="uk-modal-title uk-text-lead " itemprop="category"><?php echo $titleText3; ?></h2>
						<div itemprop="disambiguatingDescription"><?php echo $paragraphText3; ?></div>
                        <div class="uk-modal-body " itemprop="description" >
						<?php echo $contentText3; ?>
						</div>
						<div class="uk-modal-footer uk-text-right">
						<button type="button" class="uk-button uk-button-primary uk-modal-close"><?= JText::_('MOD_PROMO_CLOSE') ?></button>
					</div></div>
                    </div>
                

				</div>
			</div>
            </div>
            </li>
<li class=" uk-transition-toggle" tabindex="0" itemscope="itemscope" itemtype="https://schema.org/ImageObject">
 	<a href="#<?php echo $moduleLink4; ?>" target="_<?php echo $moduleTarget; ?> " uk-toggle><div class="uk-inline-clip <?php echo $slideBgColor4; ?>"   ><img src="<?php echo $uploadImage4tumb; ?>" alt="<?php echo $titleText4; ?>" width="auto" height="100%" class="uk-inline uk-transition-scale-up uk-transition-opaque  opacity-<?php echo $slideBgOpacity4; ?>" itemprop="image" contentUrl="url" >            

				</div>  
            </a>
			<div class="uk-position-center" itemscope itemtype="http://schema.org/Service">
                <div class=" <?php echo $titleColor4; ?> uk-text-center"><h4 class="uk-margin-remove-right uk-margin-remove-left uk-margin-medium-bottom">
				<a href="#<?php echo $moduleLink4; ?>"><span uk-icon="icon: <?php echo $titleIcon4; ?>; ratio: 6"></span></a></h4></div>
                <div class="uk-transition-slide-bottom-large uk-text-center <?php echo $titleColor4; ?>"><h4 class="uk-margin-remove uk-padding-top"><a href="#<?php echo $moduleLink4; ?>" class=" uk-text-center uk-button uk-button-text5 " itemprop="name" uk-toggle=""><?php echo $titleText4; ?></a></h4></div>
							<div id="<?php echo $moduleLink4; ?>" class="uk-modal-full" uk-modal> 
				<div class="uk-modal-dialog">
					<button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
					<div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid>
                
                    <div class="uk-background-cover" style="background-image: url('<?php echo $uploadImage4; ?>');" uk-height-viewport></div>
                    <div class="uk-padding-large">
                        <h2 class="uk-modal-title uk-text-lead " itemprop="category"><?php echo $titleText4; ?></h2>
						<div itemprop="disambiguatingDescription"><?php echo $paragraphText4; ?></div>
                        <div class="uk-modal-body " itemprop="description" >
						<?php echo $contentText4; ?>
						</div>
						<div class="uk-modal-footer uk-text-right">
						<button type="button" class="uk-button uk-button-primary uk-modal-close"><?= JText::_('MOD_PROMO_CLOSE') ?></button>
					</div></div>
                    </div>
                

				</div>
			</div>
            </div>
            </li>
<li class=" uk-transition-toggle" tabindex="0" itemscope="itemscope" itemtype="https://schema.org/ImageObject">
 	<a href="#<?php echo $moduleLink5; ?>" target="_<?php echo $moduleTarget; ?> " uk-toggle><div class="uk-inline-clip <?php echo $slideBgColor5; ?>"   ><img src="<?php echo $uploadImage5tumb; ?>" alt="<?php echo $titleText5; ?>" width="auto" height="100%" class="uk-inline uk-transition-scale-up uk-transition-opaque  opacity-<?php echo $slideBgOpacity5; ?>" itemprop="image" contentUrl="url" >            

				</div>  
            </a>
			<div class="uk-position-center" itemscope itemtype="http://schema.org/Service">
                <div class=" <?php echo $titleColor5; ?> uk-text-center"><h4 class="uk-margin-remove-right uk-margin-remove-left uk-margin-medium-bottom">
				<a href="#<?php echo $moduleLink5; ?>"><span uk-icon="icon: <?php echo $titleIcon5; ?>; ratio: 6"></span></a></h4></div>
                <div class="uk-transition-slide-bottom-large uk-text-center <?php echo $titleColor5; ?>"><h4 class="uk-margin-remove uk-padding-top"><a href="#<?php echo $moduleLink5; ?>" class=" uk-text-center uk-button uk-button-text5 " itemprop="name" uk-toggle=""><?php echo $titleText5; ?></a></h4></div>
							<div id="<?php echo $moduleLink5; ?>" class="uk-modal-full" uk-modal> 
				<div class="uk-modal-dialog">
					<button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
					
                <div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid>
                    <div class="uk-background-cover" style="background-image: url('<?php echo $uploadImage5; ?>');" uk-height-viewport></div>
                    <div class="uk-padding-large">
                        <h2 class="uk-modal-title uk-text-lead " itemprop="category"><?php echo $titleText5; ?></h2>
						<div itemprop="disambiguatingDescription"><?php echo $paragraphText5; ?></div>
                        <div class="uk-modal-body " itemprop="description" >
						<?php echo $contentText5; ?>
						</div>
						<div class="uk-modal-footer uk-text-right">
						<button type="button" class="uk-button uk-button-primary uk-modal-close"><?= JText::_('MOD_PROMO_CLOSE') ?></button>
					</div>
                    </div></div>
                

				</div>
			</div>
            </div>
            </li>
<li class=" uk-transition-toggle" tabindex="0" itemscope="itemscope" itemtype="https://schema.org/ImageObject">
 	<a href="#<?php echo $moduleLink6; ?>" target="_<?php echo $moduleTarget; ?> " uk-toggle><div class="uk-inline-clip <?php echo $slideBgColor6; ?>"   ><img src="<?php echo $uploadImage6tumb; ?>" alt="<?php echo $titleText6; ?>" width="auto" height="100%" class="uk-inline uk-transition-scale-up uk-transition-opaque  opacity-<?php echo $slideBgOpacity6; ?>" itemprop="image" contentUrl="url" >            

				</div>  
            </a>
			<div class="uk-position-center" itemscope itemtype="http://schema.org/Service">
                <div class=" <?php echo $titleColor6; ?> uk-text-center"><h4 class="uk-margin-remove-right uk-margin-remove-left uk-margin-medium-bottom">
				<a href="#<?php echo $moduleLink6; ?>"><span uk-icon="icon: <?php echo $titleIcon6; ?>; ratio: 6"></span></a></h4></div>
                <div class="uk-transition-slide-bottom-large uk-text-center <?php echo $titleColor6; ?>"><h4 class="uk-margin-remove uk-padding-top"><a href="#<?php echo $moduleLink6; ?>" class=" uk-text-center uk-button uk-button-text5 " itemprop="name" uk-toggle=""><?php echo $titleText6; ?></a></h4></div>
							<div id="<?php echo $moduleLink6; ?>" class="uk-modal-full" uk-modal> 
				<div class="uk-modal-dialog">
					<button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
					<div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid>
                
                    <div class="uk-background-cover" style="background-image: url('<?php echo $uploadImage6; ?>');" uk-height-viewport></div>
                    <div class="uk-padding-large">
                        <h2 class="uk-modal-title uk-text-lead " itemprop="category"><?php echo $titleText6; ?></h2>
						<div itemprop="disambiguatingDescription"><?php echo $paragraphText6; ?></div>
                        <div class="uk-modal-body " itemprop="description" >
						<?php echo $contentText6; ?>
						</div>
						<div class="uk-modal-footer uk-text-right">
						<button type="button" class="uk-button uk-button-primary uk-modal-close"><?= JText::_('MOD_PROMO_CLOSE') ?></button>
					</div></div>
                    
                </div>

				</div>
			</div>
            </div>
            </li>			
<li class=" uk-transition-toggle" tabindex="0" itemscope="itemscope" itemtype="https://schema.org/ImageObject">
 	<a href="#<?php echo $moduleLink7; ?>" target="_<?php echo $moduleTarget; ?> " uk-toggle><div class="uk-inline-clip <?php echo $slideBgColor7; ?>"   ><img src="<?php echo $uploadImage7tumb; ?>" alt="<?php echo $titleText7; ?>" width="auto" height="100%" class="uk-inline uk-transition-scale-up uk-transition-opaque  opacity-<?php echo $slideBgOpacity7; ?>" itemprop="image" contentUrl="url" >            

				</div>  
            </a>
			<div class="uk-position-center" itemscope itemtype="http://schema.org/Service">
                <div class=" <?php echo $titleColor7; ?> uk-text-center"><h4 class="uk-margin-remove-right uk-margin-remove-left uk-margin-medium-bottom">
				<a href="#<?php echo $moduleLink7; ?>"><span uk-icon="icon: <?php echo $titleIcon7; ?>; ratio: 6"></span></a></h4></div>
                <div class="uk-transition-slide-bottom-large uk-text-center <?php echo $titleColor7; ?>"><h4 class="uk-margin-remove uk-padding-top"><a href="#<?php echo $moduleLink7; ?>" class=" uk-text-center uk-button uk-button-text5 " itemprop="name" uk-toggle=""><?php echo $titleText7; ?></a></h4></div>
							<div id="<?php echo $moduleLink7; ?>" class="uk-modal-full" uk-modal> 
				<div class="uk-modal-dialog">
					<button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
					<div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid>
                
                    <div class="uk-background-cover" style="background-image: url('<?php echo $uploadImage7; ?>');" uk-height-viewport></div>
                    <div class="uk-padding-large">
                        <h2 class="uk-modal-title uk-text-lead " itemprop="category"><?php echo $titleText7; ?></h2>
						<div itemprop="disambiguatingDescription"><?php echo $paragraphText7; ?></div>
                        <div class="uk-modal-body " itemprop="description" >
						<?php echo $contentText7; ?>
						</div>
						<div class="uk-modal-footer uk-text-right">
						<button type="button" class="uk-button uk-button-primary uk-modal-close"><?= JText::_('MOD_PROMO_CLOSE') ?></button>
					</div>
                    </div></div>
                

				</div>
			</div>
            </div>
            </li>			
	</ul>
			<a class="uk-position-center-left uk-position-small uk-hidden-hover uk-light" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover uk-light" href="#" uk-slidenav-next uk-slider-item="next"></a>
			<div class="uk-position-bottom-center uk-position-small uk-light uk-text-bold">
			    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin "></ul>
			</div>	
			<div class="uk-position-top-center uk-position-small uk-light uk-text-bold">
			    
				<h1 class="uk-heading-line uk-text-center uk-text-uppercase uk-margin-top uk-banner-text-shadow uk-light"><span><?= JText::_('SLIDER_HOME_NEWS') ?>  </span></h1>

			</div>
        </div>



    </div>



</div>	

	
	
	
 
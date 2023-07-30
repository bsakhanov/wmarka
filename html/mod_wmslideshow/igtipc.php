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

$uploadImage1tumb              = $params->get('uploadImage1tumb');
$uploadImage2tumb              = $params->get('uploadImage2tumb');
$uploadImage3tumb              = $params->get('uploadImage3tumb');
$uploadImage4tumb              = $params->get('uploadImage4tumb');
$uploadImage5tumb              = $params->get('uploadImage5tumb');

$moduleLink1               = $params->get('moduleLink1');
$moduleLink2               = $params->get('moduleLink2');
$moduleLink3               = $params->get('moduleLink3');
$moduleLink4               = $params->get('moduleLink4');
$moduleLink5               = $params->get('moduleLink5');

$moduleLink1doc               = $params->get('moduleLink1doc');
$moduleLink2doc               = $params->get('moduleLink2doc');
$moduleLink3doc               = $params->get('moduleLink3doc');
$moduleLink4doc               = $params->get('moduleLink4doc');
$moduleLink5doc               = $params->get('moduleLink5doc');

$titleText1                = $params->get('titleText1');
$titleText2                = $params->get('titleText2');
$titleText3                = $params->get('titleText3');
$titleText4                = $params->get('titleText4');
$titleText5                = $params->get('titleText5');

$paragraphText1            = $params->get('paragraphText1');
$paragraphText2            = $params->get('paragraphText2');
$paragraphText3            = $params->get('paragraphText3');
$paragraphText4            = $params->get('paragraphText4');
$paragraphText5            = $params->get('paragraphText5');

$contentText1              = $params->get('contentText1');
$contentText2              = $params->get('contentText2');
$contentText3              = $params->get('contentText3');
$contentText4              = $params->get('contentText4');
$contentText5              = $params->get('contentText5');

$slideBgColor1             = $params->get('slideBgColor1');
$slideBgColor2             = $params->get('slideBgColor2');
$slideBgColor3             = $params->get('slideBgColor3');
$slideBgColor4             = $params->get('slideBgColor4');
$slideBgColor5             = $params->get('slideBgColor5');

$slideBgOpacity1           = $params->get('slideBgOpacity1');
$slideBgOpacity2           = $params->get('slideBgOpacity2');
$slideBgOpacity3           = $params->get('slideBgOpacity3');
$slideBgOpacity4           = $params->get('slideBgOpacity4');
$slideBgOpacity5           = $params->get('slideBgOpacity5');

$moduleTarget1             = $params->get('moduleTarget1');
$moduleTarget2             = $params->get('moduleTarget2');
$moduleTarget3             = $params->get('moduleTarget3');
$moduleTarget4             = $params->get('moduleTarget4');
$moduleTarget5             = $params->get('moduleTarget5');

$titleIcon1                = $params->get('titleIcon1');
$titleIcon2                = $params->get('titleIcon2');
$titleIcon3                = $params->get('titleIcon3');
$titleIcon4                = $params->get('titleIcon4');
$titleIcon5                = $params->get('titleIcon5');

$titleColor1               = $params->get('titleColor1');
$titleColor2               = $params->get('titleColor2');
$titleColor3               = $params->get('titleColor3');
$titleColor4               = $params->get('titleColor4');
$titleColor5               = $params->get('titleColor5');

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
<div class="uk-section-default uk-section uk-padding-remove-vertical">
	<div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
		<div class="uk-width-1-1@m uk-first-column">
			<div class="uk-margin uk-text-left@s uk-text-center uk-slideshow" uk-slideshow="minHeight: 500; ratio: 16:7; animation: pull; velocity: 1.4; autoplay: 1;finite: true">
				<div class="uk-position-relative">
					<ul class="uk-slideshow-items uk-light">
						<li class="uk-background-primary <?php echo $slideBgColor1; ?> uk-active uk-transition-active"  itemscope="itemscope" itemtype="https://schema.org/ImageObject" style="transform: translateX(0px); z-index: -1;">
							<div class="uk-position-cover uk-brightness" uk-slideshow-parallax="scale: 1,1.2,1.2">
							<img class="opacity-<?php echo $slideBgOpacity1; ?>" itemprop="image"  uk-cover src="<?php echo $uploadImage1; ?>" alt="<?php echo $titleText1; ?>" uk-img="target: !.uk-slideshow-items" /></div>
							<div class="uk-position-cover" uk-slideshow-parallax="opacity: 0.2,0,0; backgroundColor: #000,#000"></div>
							<div class="uk-position-cover uk-flex uk-flex-left uk-flex-middle uk-container uk-section" itemscope="itemscope" itemtype="http://schema.org/Service" >
								<div class="el-overlay uk-panel uk-width-xlarge">
									<div class="uk-text-uppercase uk-text-bold uk-margin uk-h6 uk-margin-remove-adjacent"  itemprop="disambiguatingDescription" uk-slideshow-parallax="y: 70,0,-100;"><?php echo $paragraphText1; ?> </div>
									<h1 class="el-title uk-margin uk-heading-primary uk-heading-line" itemprop="name" uk-slideshow-parallax="x: 320,0,-250;" style="transform: translate3d(0px, 0px, 0px);"><span><?php echo $titleText1; ?></span></h1>
									<p><a class="uk-button uk-button-primary uk-border-rounded  uk-text-bold uk-button-large" href="<?php echo $moduleLink1doc; ?>" target="_<?php echo $moduleTarget; ?> " uk-slideshow-parallax="y: -60,0,190;"><?= JText::_('MOD_PROMO_MORE') ?></a></p>
								</div>
							</div>
								<div  class="uk-position-large uk-position-top-right <?php echo $titleColor3; ?> uk-tablet-hidden uk-mobile-hidden"  >
								<span uk-icon="icon: <?php echo $titleIcon1; ?>; ratio: 5"></span>
							</div>	
						</li>
						<li class="uk-background-primary <?php echo $slideBgColor2; ?>"  itemscope="itemscope" itemtype="https://schema.org/ImageObject">
							<div class="uk-position-cover uk-brightness" uk-slideshow-parallax="scale: 1,1.2,1.2">
							<img class="opacity-<?php echo $slideBgOpacity2; ?>" itemprop="image"  uk-cover src="<?php echo $uploadImage2; ?>" alt="<?php echo $titleText2; ?>"  uk-img="target: !.uk-slideshow-items" /></div>
							<div class="uk-position-cover" uk-slideshow-parallax="opacity: 0.2,0,0; backgroundColor: #000,#000"></div>
							<div class="uk-position-cover uk-flex uk-flex-left uk-flex-middle uk-container uk-section" itemscope="itemscope" itemtype="http://schema.org/Service" >
								<div class="el-overlay uk-panel uk-width-xlarge">
									<div class="uk-text-uppercase uk-text-bold uk-margin uk-h6 uk-margin-remove-adjacent"  itemprop="disambiguatingDescription" uk-slideshow-parallax="y: 70,0,-100;"><?php echo $paragraphText2; ?> </div>
									<h1 class="el-title uk-margin uk-heading-primary uk-heading-line" itemprop="name" uk-slideshow-parallax="x: 320,0,-250;"><span><?php echo $titleText2; ?></span></h1>
									<p><a class="uk-button uk-button-primary uk-border-rounded  uk-text-bold uk-button-large" href="<?php echo $moduleLink2doc; ?>" target="_<?php echo $moduleTarget; ?> " uk-slideshow-parallax="y: -60,0,190;"><?= JText::_('MOD_PROMO_MORE') ?></a></p>
								</div>
							</div>
							<div  class="uk-position-large uk-position-top-right <?php echo $titleColor2; ?> uk-tablet-hidden uk-mobile-hidden"  >
								<span uk-icon="icon: <?php echo $titleIcon2; ?>; ratio: 5"></span>
							</div>	
						</li>	
						<li class="uk-background-primary <?php echo $slideBgColor3; ?>"  itemscope="itemscope" itemtype="https://schema.org/ImageObject">
							<div class="uk-position-cover uk-brightness" uk-slideshow-parallax="scale: 1,1.2,1.2">
							<img class="opacity-<?php echo $slideBgOpacity3; ?>" itemprop="image"  uk-cover src="<?php echo $uploadImage3; ?>" alt="<?php echo $titleText2; ?>" uk-img="target: !.uk-slideshow-items" /></div>
							<div class="uk-position-cover" uk-slideshow-parallax="opacity: 0.2,0,0; backgroundColor: #000,#000"></div>
							<div class="uk-position-cover uk-flex uk-flex-left uk-flex-middle uk-container uk-section" itemscope="itemscope" itemtype="http://schema.org/Service" >
								<div class="el-overlay uk-panel uk-width-xlarge">
									<div class="uk-text-uppercase uk-text-bold uk-margin uk-h6 uk-margin-remove-adjacent"  itemprop="disambiguatingDescription" uk-slideshow-parallax="y: 70,0,-100;"><?php echo $paragraphText3; ?> </div>
									<h1 class="el-title uk-margin uk-heading-primary uk-heading-line" itemprop="name" uk-slideshow-parallax="x: 320,0,-250;"><span><?php echo $titleText3; ?></span></h1>
									<p><a class="uk-button uk-button-primary uk-border-rounded  uk-text-bold uk-button-large" href="<?php echo $moduleLink3doc; ?>" target="_<?php echo $moduleTarget; ?> " uk-slideshow-parallax="y: -60,0,190;"><?= JText::_('MOD_PROMO_MORE') ?></a></p>
								</div>
							</div>
							<div  class="uk-position-large uk-position-top-right <?php echo $titleColor3; ?> uk-tablet-hidden uk-mobile-hidden"  >
								<span uk-icon="icon: <?php echo $titleIcon3; ?>; ratio: 5"></span>
							</div>	
						</li>								
					</ul>
					<div class="uk-position-bottom-center uk-position-large uk-visible@s">
						<ul class="el-nav uk-thumbnav uk-flex-center" uk-margin>
							<li class="uk-active uk-first-column" uk-slideshow-item="0">
								<a class="uk-border-rounded " href="#"><img src="<?php echo $uploadImage1tumb; ?>" alt="" width="200" height="290" /></a>
							</li>
							<li uk-slideshow-item="1">
								<a class=" uk-border-rounded " href="#"><img src="<?php echo $uploadImage2tumb; ?>" alt="" width="200" height="290" /></a>
							</li>
							<li uk-slideshow-item="2">
								<a class="uk-border-rounded " href="#"><img src="<?php echo $uploadImage3tumb; ?>" alt="" width="200" height="290" /></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
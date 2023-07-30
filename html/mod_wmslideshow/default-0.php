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
<div class=" uk-position-relative" uk-slideshow="ratio: 8:3.6; animation: push; autoplay: true">
	<ul class="uk-slideshow-items">
		<li class=" uk-background-primary <?php echo $slideBgColor1; ?>" itemscope="itemscope" itemtype="https://schema.org/ImageObject"><img class="opacity-<?php echo $slideBgOpacity1; ?>" itemprop="image" src="<?php echo $uploadImage1; ?>" alt="<?php echo $titleText1; ?>"  uk-cover  />
			<a  class="uk-position-medium uk-position-top-right uk-text-left" itemscope="itemscope" itemtype="http://schema.org/Service" href="<?php echo $moduleLink1; ?>" target="_<?php echo $moduleTarget; ?> " >
				<h2 class="uk-margin-remove uk-text-bold-900 uk-heading-hero uk-banner-text-shadow2 uk-text-uppercase"  itemprop="name" ><?php echo $titleText1; ?></h2>
				<h3 class="uk-margin uk-text-bold uk-text-large  uk-padding uk-banner-text-shadow3 uk-light uk-mobile-hidden" itemprop="disambiguatingDescription"><?php echo $paragraphText1; ?></h3>
			</a>
			<div  class="uk-position-medium uk-position-top-left uk-text-left <?php echo $titleColor1; ?> uk-tablet-hidden uk-mobile-hidden"  >
				<span uk-icon="icon: <?php echo $titleIcon1; ?>; ratio: 5"></span>
			</div>			
		</li>
		<li class=" uk-background-primary <?php echo $slideBgColor2; ?>" itemscope="itemscope" itemtype="https://schema.org/ImageObject"><img class="opacity-<?php echo $slideBgOpacity2; ?>" itemprop="image" src="<?php echo $uploadImage2; ?>" alt="<?php echo $titleText2; ?>"  uk-cover  />
			<a  class="uk-position-medium uk-position-top-right uk-text-left" itemscope="itemscope" itemtype="http://schema.org/Service" href="<?php echo $moduleLink2; ?>" target="_<?php echo $moduleTarget; ?> " >
				<h2 class="uk-margin-remove uk-text-bold-900 uk-heading-hero uk-banner-text-shadow2 uk-text-uppercase"  itemprop="name" ><?php echo $titleText2; ?></h2>
				<h3 class="uk-margin uk-text-bold uk-text-large uk-padding uk-banner-text-shadow3 uk-light uk-mobile-hidden" itemprop="disambiguatingDescription"><?php echo $paragraphText2; ?></h3>
			</a>
			<div  class="uk-position-medium uk-position-top-left uk-text-left <?php echo $titleColor2; ?> uk-tablet-hidden uk-mobile-hidden"  >
				<span uk-icon="icon: <?php echo $titleIcon2; ?>; ratio: 5"></span>
			</div>				
		</li>
		<li class=" uk-background-primary <?php echo $slideBgColor3; ?>" itemscope="itemscope" itemtype="https://schema.org/ImageObject"><img class="opacity-<?php echo $slideBgOpacity3; ?>" itemprop="image" src="<?php echo $uploadImage3; ?>" alt="<?php echo $titleText3; ?>"  uk-cover  />
			<a  class="uk-position-medium uk-position-top-right uk-text-left" itemscope="itemscope" itemtype="http://schema.org/Service" href="<?php echo $moduleLink3; ?>" target="_<?php echo $moduleTarget; ?> " >
				<h2 class="uk-margin-remove uk-text-bold-900 uk-heading-hero uk-banner-text-shadow2 uk-text-uppercase"  itemprop="name" ><?php echo $titleText3; ?></h2>
				<h3 class="uk-margin uk-text-bold uk-text-large uk-padding uk-banner-text-shadow3 uk-light uk-mobile-hidden" itemprop="disambiguatingDescription"><?php echo $paragraphText3; ?></h3>
			</a>
			<div  class="uk-position-medium uk-position-top-left uk-text-left <?php echo $titleColor3; ?> uk-tablet-hidden uk-mobile-hidden"  >
				<span uk-icon="icon: <?php echo $titleIcon3; ?>; ratio: 5"></span>
			</div>				
		</li>
		<li class=" uk-background-primary <?php echo $slideBgColor4; ?>" itemscope="itemscope" itemtype="https://schema.org/ImageObject"><img class="opacity-<?php echo $slideBgOpacity4; ?>" itemprop="image" src="<?php echo $uploadImage4; ?>" alt="<?php echo $titleText4; ?>"  uk-cover  />
			<a  class="uk-position-medium uk-position-top-right uk-text-left" itemscope="itemscope" itemtype="http://schema.org/Service" href="<?php echo $moduleLink4; ?>" target="_<?php echo $moduleTarget; ?> " >
				<h2 class="uk-margin-remove uk-text-bold-900 uk-heading-hero uk-banner-text-shadow2 uk-text-uppercase"  itemprop="name" ><?php echo $titleText4; ?></h2>
				<h3 class="uk-margin uk-text-bold uk-text-large uk-padding uk-banner-text-shadow3 uk-light uk-mobile-hidden" itemprop="disambiguatingDescription"><?php echo $paragraphText4; ?></h3>
			</a>
			<div  class="uk-position-medium uk-position-top-left uk-text-left <?php echo $titleColor4; ?> uk-tablet-hidden uk-mobile-hidden"  >
				<span uk-icon="icon: <?php echo $titleIcon4; ?>; ratio: 5"></span>
			</div>				
		</li>
		<li class=" uk-background-primary <?php echo $slideBgColor5; ?>" itemscope="itemscope" itemtype="https://schema.org/ImageObject"><img class="opacity-<?php echo $slideBgOpacity5; ?>" itemprop="image" src="<?php echo $uploadImage5; ?>" alt="<?php echo $titleText5; ?>"  uk-cover  />
			<a  class="uk-position-medium uk-position-top-right uk-text-left" itemscope="itemscope" itemtype="http://schema.org/Service" href="<?php echo $moduleLink5; ?>" target="_<?php echo $moduleTarget; ?> " >
				<h2 class="uk-margin-remove uk-text-bold-900 uk-heading-hero uk-banner-text-shadow2 uk-text-uppercase"  itemprop="name" ><?php echo $titleText5; ?></h2>
				<h3 class="uk-margin uk-text-bold uk-text-large uk-padding uk-banner-text-shadow3 uk-light uk-mobile-hidden" itemprop="disambiguatingDescription"><?php echo $paragraphText5; ?></h3>
			</a>
			<div  class="uk-position-medium uk-position-top-left uk-text-left <?php echo $titleColor5; ?> uk-tablet-hidden uk-mobile-hidden"  >
				<span uk-icon="icon: <?php echo $titleIcon5; ?>; ratio: 5"></span>
			</div>				
		</li>		
	</ul>
	<a class="uk-position-center-left uk-position-small uk-hidden-hover uk-light" href="#" uk-slidenav-previous="" uk-slideshow-item="previous"></a>
	<a class="uk-position-center-right uk-position-small uk-hidden-hover  uk-light" href="#" uk-slidenav-next="" uk-slideshow-item="next"></a>
	<div class="uk-position-bottom-center uk-position-small uk-tablet-hidden uk-mobile-hidden">
		<ul class="uk-thumbnav">
			<li uk-slideshow-item="0">
				<a class="uk-border-tumb " href="#"><img src="<?php echo $uploadImage1tumb; ?>" alt="" width="170" />
					<div class="uk-position-small uk-position-top-right uk-text-small uk-text-left uk-banner-text-shadow3"><?php echo $titleText1; ?></div>
				</a>
			</li>
			<li uk-slideshow-item="1">
				<a class="uk-border-tumb " href="#"><img src="<?php echo $uploadImage2tumb; ?>" alt="" width="170" />
					<div class="uk-position-small uk-position-top-right uk-text-small uk-text-left uk-banner-text-shadow3"><?php echo $titleText2; ?></div>
				</a>
			</li>
			<li uk-slideshow-item="2">
				<a class="uk-border-tumb " href="#"><img src="<?php echo $uploadImage3tumb; ?>" alt="" width="170" />
					<div class="uk-position-small uk-position-top-right uk-text-small uk-text-left uk-banner-text-shadow3"><?php echo $titleText3; ?></div>
				</a>
			</li>
			<li uk-slideshow-item="3">
				<a class="uk-border-tumb " href="#"><img src="<?php echo $uploadImage4tumb; ?>" alt="" width="170" />
					<div class="uk-position-small uk-position-top-right uk-text-small uk-text-left uk-banner-text-shadow3"><?php echo $titleText4; ?></div>
				</a>
			</li>
			<li uk-slideshow-item="4">
				<a class="uk-border-tumb " href="#"><img src="<?php echo $uploadImage5tumb; ?>" alt="" width="170" />
					<div class="uk-position-small uk-position-top-right uk-text-small uk-text-left uk-banner-text-shadow3"><?php echo $titleText5; ?></div>
				</a>
			</li>			
		</ul>
	</div>
</div>

	
	
	
 
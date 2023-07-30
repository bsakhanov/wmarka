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

<li class=" " itemscope itemtype="https://schema.org/ImageObject">
 	<a href="<?php echo $moduleLink; ?>" target="_<?php echo $moduleTarget; ?>"><figure class="uk-inline-clip uk-transition-toggle uk-border-rounded box-shadow-kvadro"  itemprop="image"><img src="<?php echo $uploadImage; ?>" alt="<?php echo $titleText; ?>" width="400" height="400" class="uk-transition-scale-up uk-transition-opaque uk-border-rounded" itemprop="url" itemprop="contentUrl" />            
                 <figcaption itemprop="name"><div  class="uk-position-center uk-panel">
                <h4 class="uk-overlay uk-overlay-padding uk-overlay-primary uk-transition-slide-bottom-small uk-banners uk-text-center uk-text-small"><?php echo $titleText; ?></h4></div></figcaption>
				</figure>
            </a>
            </li>
 
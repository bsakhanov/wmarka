<?php

/**
 * @package   FL Amp Plugin
 * @author    Дмитрий Васюков http://fictionlabs.ru
 * @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Vars

$colorContentText       = $this->params->get('css_text_color', '#000000');
$colorContentBg         = $this->params->get('css_content_bg', '#ffffff');
$colorBodyBg            = $this->params->get('css_body_bg', '#fafafa');
$colorHeaderBg          = $this->params->get('css_header_bg', '#ffffff');
$colorHeaderText        = $this->params->get('css_header_color', '#000000');
$colorFooterBg          = $this->params->get('css_footer_bg', '#000000');
$colorFooterText        = $this->params->get('css_footer_color', '#ffffff');
$shadowEnable           = $this->params->get('css_shadow_enable', 1);
$customStyles           = $this->params->get('css_custom_style');

$colorHeaderShadow      = $this->hexInvert($colorHeaderBg);
$colorContentShadow     = $this->hexInvert($colorBodyBg);
$colorFooterShadow      = $this->hexInvert($colorFooterBg);
?>

<!-- Styles -->

<style amp-custom>

    <?php echo $normalizeCss; ?>
    
    <?php echo $flAmpCss; ?>

    <?php if ($customStyles) {
        echo $customStyles;
    } ?>
    
    body {
        color: <?php echo $colorContentText; ?>;
        background: <?php echo $colorBodyBg; ?>;
    }

    .amp-container {
        background: <?php echo $colorContentBg; ?>;
        max-width: 960px;
        margin: 0 auto;
        width: 100%;
        min-height: calc(100vh - 112px - 3rem);
        padding: 1.5rem;
        margin-top: 1.5rem;
        margin-bottom: 1.5rem;

        <?php if ($shadowEnable) :?>
            box-shadow: 0 1px 1px 0 <?php echo $this->hex2rgba($colorContentShadow, '0.14'); ?>, 0 1px 1px -1px <?php echo $this->hex2rgba($colorContentShadow, '0.14'); ?>, 0 1px 5px 0 <?php echo $this->hex2rgba($colorContentShadow, '0.12'); ?>;
        <?php endif ?>
    }

    #amp-sidebar {
        width: 250px;
        padding: 1.5rem;
         background: #121a3d;
    color: rgba(255,255,255,.5);
    }
    #amp-sidebar a {
        color: #fff;
    }

    .amp-header {
        background: <?php echo $colorHeaderBg; ?>;
        color: <?php echo $colorHeaderText; ?>;
        height: 55px;
        width: 100vw;
        z-index: 100;

        <?php if ($shadowEnable) :?>
            box-shadow: 0 0 5px 2px <?php echo $this->hex2rgba($colorHeaderShadow, '0.1'); ?>;
        <?php endif ?>
    }
    .amp-header a {
    	color: <?php echo $colorHeaderText; ?>;
    }    

    .amp-modules {
        padding: 1rem;

        <?php if ($shadowEnable) :?>
            box-shadow: 0 1px 1px 0 <?php echo $this->hex2rgba($colorContentShadow, '0.14'); ?>, 0 1px 1px -1px <?php echo $this->hex2rgba($colorContentShadow, '0.14'); ?>, 0 1px 5px 0 <?php echo $this->hex2rgba($colorContentShadow, '0.12'); ?>;
        <?php endif ?>

    }

    .amp-footer {
		background: <?php echo $colorFooterBg; ?>;
        color: <?php echo $colorFooterText; ?>;
        height: 55px;
        width: 100vw;
        z-index: 100;

        <?php if ($shadowEnable) :?>
            box-shadow: 0 0 5px 2px <?php echo $this->hex2rgba($colorFooterShadow, '0.1'); ?>;
        <?php endif ?>
    }
	.amp-footer a {
		color: <?php echo $colorFooterText; ?>;
	}
    
    .amp-btn {
        font-weight: inherit;
        font-size: 1rem;
        line-height: 1.1rem;
        padding: .3em .8em;
        text-decoration: none;
        white-space: nowrap;
        word-wrap: normal;
        vertical-align: middle;
        cursor: pointer;
        background-color: <?php echo $colorFooterBg; ?>;
        color: <?php echo $colorFooterText; ?>;
        border: 1px solid <?php echo $colorFooterText; ?>;
    }

    .pagination li > *,
    .uk-pagination li > * {
        border: 1px solid <?php echo $this->hex2rgba($colorContentText, '0.25'); ?>;
        border-left-width: 0;
    }
    
</style>

<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
<?php
/**
 * J!Blank Template for Joomla by JBlank.pro (JBZoo.com)
 *
 * @package    JBlank
 * @author     SmetDenis <admin@jbzoo.com>
 * @copyright  Copyright (c) JBlank.pro
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 * @link       http://jblank.pro/ JBlank project page
 */

defined('_JEXEC') or die;


// load libs
require_once dirname(__FILE__) . '/libs/template.php';

/************************* runtime configurations *********************************************************************/
$tpl = JBlankTemplate::getInstance();
$tpl
    // enable or disable debug mode. Default in Joomla configuration.php
    //->debug(true)

    // include CSS files if it's not empty
    // compile less *.file to CSS and cache it
    // compile scss *.file to CSS and cache it (experimental!)
    ->css(array(
         //'/media/uikit3/dist/css/uikit.min.css', // from jblank/css folder
		//'uikit.min.css',
      // 'custom.css', // from jblank/css folder
        //'template.less', // from jblank/less folder
        // 'template.scss',// from jblank/scss folder
        // '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', // any external lib (you can use http:// or https:// urls)
    ))

    // include JavaScript files
    ->js(array(
       //'uikit.min.js',
	   //'uikit-icons.min.js',
	   // 'derma.min.js',
	  // 'logosprite.min.js',
	   // 'asuikit-icons-material-action.min.js',
        // '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', // any external lib (you can use http:// or https:// urls)
        // 'libs/jquery-1.x.min.js', // your own local lib
        //'bootstrap.min.js',
        //'readmore.min.js',
        //'justice.min.js',
        //'jquery.min.js',

    ))

    // exclude css files from system or components (experimental!)
    ->excludeCSS(array(
        // 'regex pattern or filename',
        // 'jbzoo\.css',
		'media\/uikit3\/dist\/css\/uikit.min.css',
		'media\/vendor\/joomla-custom-elements\/css\/joomla-alert.min.css',
    ))

    // exclude JS files from system or components (experimental!)
    ->excludeJS(array(
        // 'regex pattern or filename',
		'media\/uikit3\/dist\/js\/uikit.min.js',
		'media\/uikit3\/dist\/js/uikit-icons.min.js',
		'media\/system\/js\/messages.min.js',
		'media\/system\/js\/messages-es5.min.js',
		'media\/system\/js\/core.min.js',

          'mootools',             // remove Mootools lib
     'media\/jui\/js',       // remove jQuery lib
     'media\/system\/js',    // remove system libs
     'media\/vendor\/joomla-custom-elements\/css\/joomla-alert.min.css',
     //     '\/media\/zoo\/applications\/jbuniversal\/assets\/js\/jquery\.jbzootools\.min\.js',    // remove system libs
     //     '\/components\/com_zoo\/assets\/js\/default\.js',    // remove system libs
    ))

    // set custom generator
    ->generator('Astana CMS')// null for disable

    // set HTML5 mode (for <head> tag)
    ->html5(true)

    // add custom meta tags
    ->meta(array(
        // template customization
        // '<meta http-equiv="X-UA-Compatible" content="IE=edge">',
        '<meta name="viewport" content="width=device-width, initial-scale=1" />',
        // '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">',

        // // site verification examples
        // '<meta name="google-site-verification" content="... google verification hash ..." />',
        // '<meta name="yandex-verification" content="... yandex verification hash ..." />',
	        // icons
'<link rel="apple-touch-icon" sizes="180x180" href="/media/templates/site/wmarka/images/favicon/apple-touch-icon.png">',
'<link rel="icon" type="image/png" sizes="32x32" href="/media/templates/site/wmarka/images/favicon/favicon-32x32.png">',
'<link rel="icon" type="image/png" sizes="16x16" href="/media/templates/site/wmarka/images/favicon/favicon-16x16.png">',
'<link rel="manifest" href="/media/templates/site/wmarka/images/favicon/site.webmanifest">',
'<link rel="mask-icon" href="/media/templates/site/wmarka/images/favicon/safari-pinned-tab.svg" color="#5bbad5">',
'<link rel="shortcut icon" href="/media/templates/site/wmarka/images/favicon/favicon.ico">',
'<meta name="msapplication-TileColor" content="#2d89ef">',
'<meta name="msapplication-config" content="/media/templates/site/wmarka/images/favicon/browserconfig.xml">',
'<meta name="theme-color" content="#ffffff">',

        // site verification examples
       '<meta name="google-site-verification" content="" />',
       '<meta name="yandex-verification" content="" />',
    ));

/************************* your php code below this line **************************************************************/

// USE IT ON YOUR OWN --> RISK <-- THIS IS EXPERIMENTAL FEATURES!
// After that all assets files will be included

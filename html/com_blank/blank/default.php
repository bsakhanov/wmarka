<?php defined('_JEXEC') or die;
/**
 * @package     Joomla.Site
 * @subpackage  com_blank
 * @copyright   Copyright (C) Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */
\defined('_JEXEC') or die;
$document = JFactory::getDocument();
use Joomla\CMS\Factory;
use Joomla\CMS\Version;
use Joomla\CMS\MVC\View\HtmlView;
use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Event\GenericEvent;
$params = $this->item->params;
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');


JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

$app = Factory::getContainer()->get(Joomla\CMS\Application\SiteApplication::class);

$docTitle = $document->title;
$config = JFactory::getConfig();


$document->setTitle(strip_tags(trim($docTitle)));

$docВescription = $document->description;



//OpenGraph start

$timage = $pathToImage = htmlspecialchars(JURI::base(true).'/media/templates/site/'.$app->getTemplate().'/images/logotype.jpg');

$lang = JText::_('OG_LANG');
$countrycity = JText::_('SEO_COUNTRY_CITY');
$postalcode = JText::_('SEO_POSTALCODE');
$country = JText::_('SEO_COUNTRY');
$region = JText::_('SEO_REGION');
$locality = JText::_('SEO_LOCALITY');
$street = JText::_('SEO_STREET_ADDRESS');
$tel = JText::_('SEO_TEL');
$latitude = JText::_('SEO_LATITUDE');
$longitude = JText::_('SEO_LONGITUDE');
$descauthor = JText::_('SEO_DESCRIPTION_AUTHOR');
$descpublisher = JText::_('SEO_DESCRIPTION_PUBLISHER');
$usernamesite = JText::_('SEO_TWITTER_SITE');
$usernameautor = JText::_('SEO_TWITTER_CREATOR');
$facebookid = JText::_('SEO_FACEBOOK_ID');
$yourappid = JText::_('SEO_YOUR_APP_ID'); 
 
$document -> addCustomTag( ' 




<!-- Twitter card --> 
<meta name="twitter:title" content="'.$docTitle.'">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="'.$usernamesite.'">
<meta name="twitter:creator" content="'.$usernameautor.'">
<meta name="twitter:url" content="'.JURI :: current().'">
<meta name="twitter:description" content="'.$docВescription.'">
<meta name="twitter:image" content="'.$timage.'">
<meta name="twitter:image:src" content="'.$timage.'">
<!-- Open Graph data --> 
<meta property="og:title" content="'.$docTitle.'"> 
<meta property="og:description" content="'.$docВescription.'">
<meta property="og:type" content="website"> 
<meta property="og:url" content="'.JURI :: current().'"> 
<meta property="og:url:see_also" content="'.JURI :: current().'"> 
<meta property="og:image" content="'.$timage.'"> 
<meta property="og:image:secure_url" content="'.$timage.'"> 
<meta property="og:locale" content="'.$lang.'">
<meta property="og:site_name" content="'.$config->get( 'sitename' ).'"> 
<meta property="article:author" content="'.$descauthor.'"> 
<meta property="fb:admins" content="'.$facebookid.'">
<meta property="fb:app_id" content="'.$yourappid.'">
<!-- Open Graph data end--> 
<link href="//img.youtube.com" rel="dns-prefetch preconnect" />
<link href="//ajax.googleapis.com" rel="dns-prefetch preconnect" />
<link href="//www.google-analytics.com" rel="dns-prefetch preconnect" />
<link href="//pagead2.googlesyndication.com" rel="dns-prefetch preconnect" />
<link href="//static.doubleclick.net" rel="dns-prefetch preconnect" />
<link href="//www.youtube.com" rel="dns-prefetch preconnect" />
<link href="//graph.facebook.com" rel="dns-prefetch preconnect" />
<link href="//maxcdn.bootstrapcdn.com" rel="dns-prefetch preconnect" />
<link href="//cdnjs.cloudflare.com" rel="dns-prefetch preconnect" />
<link href="//cdn.jsdelivr.net" rel="dns-prefetch preconnect" />
<link href="//oss.maxcdn.com" rel="dns-prefetch preconnect" />
<link href="//metrika.yandex.ru" rel="dns-prefetch preconnect" />
<link href="//informer.yandex.ru" rel="dns-prefetch preconnect" />
'); 
//OpenGraph end

?>
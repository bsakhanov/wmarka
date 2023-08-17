<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

\defined('_JEXEC') or die;
$document = JFactory::getDocument();
use Joomla\CMS\Factory;
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

if($this->category->metakey == "") {$mmk = $str = html_entity_decode(strip_tags(trim($docTitle.',  ' . $config->get( 'sitename' )))); $fixed_str = preg_replace('/[\s]{2,}/', ' ', $str);} else {$mmk = $this->category->metakey;}
$document->setMetadata('keywords', $mmk);

if($this->category->metadesc == "") {$mmd = $str = html_entity_decode(strip_tags (trim((JHtml::_('string.truncate', ($this->category->description), '350'))))); $fixed_str = preg_replace('/[\s]{2,}/', ' ', $str);} else {$mmd = $this->category->metadesc;}
$document->setMetadata('description', $mmd);

$this->category->text = $this->category->description;
$app->getDispatcher()->dispatch('onContentPrepare', new GenericEvent('onContentPrepare', [$this->category->extension . '.categories', &$this->category, &$this->params, 0]));
$this->category->description = $this->category->text;

$results = $app->getDispatcher()->dispatch('onContentAfterTitle', new GenericEvent('onContentAfterTitle', [$this->category->extension . '.categories', &$this->category, &$this->params, 0]));
$afterDisplayTitle = trim(implode("\n", $results->getArgument('result') ?? []));

$results = $app->getDispatcher()->dispatch('onContentBeforeDisplay', new GenericEvent('onContentBeforeDisplay', [$this->category->extension . '.categories', &$this->category, &$this->params, 0]));
$beforeDisplayContent = trim(implode("\n", $results->getArgument('result') ?? []));

$results = $app->getDispatcher()->dispatch('onContentAfterDisplay', new GenericEvent('onContentAfterDisplay', [$this->category->extension . '.categories', &$this->category, &$this->params, 0]));
$afterDisplayContent = trim(implode("\n", $results->getArgument('result') ?? []));

$htag    = $this->params->get('show_page_heading') ? 'h2' : 'h1';

//OpenGraph start
$datepubl = $this->category->created;
if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) {
   $timage = htmlspecialchars(JURI :: root().$this->category->getParams()->get('image')); 
   }
else {
   $timage = $pathToImage = htmlspecialchars(JURI::base(true).'/media/templates/site/'.$app->getTemplate().'/images/logotype.jpg');
   }

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
<meta name="twitter:title" content="'.$this -> escape($this->category->title).'">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="'.$usernamesite.'">
<meta name="twitter:creator" content="'.$usernameautor.'">
<meta name="twitter:url" content="'.JURI :: current().'">
<meta name="twitter:description" content="'.$mmd.'">
<meta name="twitter:image" content="'.$timage.'">
<meta name="twitter:image:src" content="'.$timage.'">
<!-- Open Graph data --> 
<meta property="og:title" content="'.$this -> escape($this->category->title).'"> 
<meta property="og:description" content="'.$mmd.'">
<meta property="og:type" content="website"> 
<meta property="og:url" content="'.JURI :: current().'"> 
<meta property="og:url:see_also" content="'.JURI :: current().'"> 
<meta property="og:image" content="'.$timage.'"> 
<meta property="og:image:secure_url" content="'.$timage.'"> 
<meta property="og:locale" content="'.$lang.'">
<meta property="og:site_name" content="'.$config->get( 'sitename' ).'"> 
<meta property="article:author" content="'.$this->escape($this->category->author).'"> 
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
<div class="com-content-category-blog blog" itemscope itemtype="https://schema.org/Blog">
    <?php if ($this->params->get('show_page_heading')) { ?>
        <div class="page-header">
            <h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
        </div>
    <?php } ?>

    <?php if ($this->params->get('show_category_title', 1)) { ?>
        <<?php echo $htag; ?>><?php echo $this->category->title; ?></<?php echo $htag; ?>>
    <?php } ?>
    <?php echo $afterDisplayTitle; ?>
</div>

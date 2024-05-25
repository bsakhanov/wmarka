<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Layout\LayoutHelper;


$app = Factory::getApplication();
$document = JFactory::getDocument();

$docTitle = $document->title;
$config = JFactory::getConfig();
 
$document->setTitle(strip_tags(trim($docTitle)));

if($this->category->metakey == "") {$mmk = $str = html_entity_decode(strip_tags(trim($docTitle.',  ' . $config->get( 'sitename' )))); $fixed_str = preg_replace('/[\s]{2,}/', ' ', $str);} else {$mmk = $this->category->metakey;}
$document->setMetadata('keywords', $mmk);

if($this->category->metadesc == "") {$mmd = $str = html_entity_decode(strip_tags (trim((JHtml::_('string.truncate', ($this->category->description), '350'))))); $fixed_str = preg_replace('/[\s]{2,}/', ' ', $str);} else {$mmd = $this->category->metadesc;}
$document->setMetadata('description', $mmd);

$this->category->text = $this->category->description;
$app->triggerEvent('onContentPrepare', [$this->category->extension . '.categories', &$this->category, &$this->params, 0]);
$this->category->description = $this->category->text;

$results = $app->triggerEvent('onContentAfterTitle', [$this->category->extension . '.categories', &$this->category, &$this->params, 0]);
$afterDisplayTitle = trim(implode("\n", $results));

$results = $app->triggerEvent('onContentBeforeDisplay', [$this->category->extension . '.categories', &$this->category, &$this->params, 0]);
$beforeDisplayContent = trim(implode("\n", $results));

$results = $app->triggerEvent('onContentAfterDisplay', [$this->category->extension . '.categories', &$this->category, &$this->params, 0]);
$afterDisplayContent = trim(implode("\n", $results));

$htag    = $this->params->get('show_page_heading') ? 'h2' : 'h1';

//OpenGraph start
 
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
<meta name="twitter:title" content="'.$docTitle.'">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="'.$usernamesite.'">
<meta name="twitter:creator" content="'.$usernameautor.'">
<meta name="twitter:url" content="'.JURI :: current().'">
<meta name="twitter:description" content="'.$mmd.'">
<meta name="twitter:image" content="'.$timage.'">
<meta name="twitter:image:src" content="'.$timage.'">
<!-- Open Graph data --> 
<meta property="og:title" content="'.$docTitle.'"> 
<meta property="og:description" content="'.$mmd.'">
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
<div class="com-content-category-blog blog">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <div class="page-header">
            <h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
        </div>
    <?php endif; ?>

    <?php if ($this->params->get('show_category_title', 1)) : ?>
    <<?php echo $htag; ?>>
        <?php echo $this->category->title; ?>
    </<?php echo $htag; ?>>
    <?php endif; ?>
    <?php echo $afterDisplayTitle; ?>

    <?php if ($this->params->get('show_cat_tags', 1) && !empty($this->category->tags->itemTags)) : ?>
        <?php $this->category->tagLayout = new FileLayout('joomla.content.tags'); ?>
        <?php echo $this->category->tagLayout->render($this->category->tags->itemTags); ?>
    <?php endif; ?>

    <?php if ($beforeDisplayContent || $afterDisplayContent || $this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
        <div class="category-desc clearfix">
            <?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
                <?php echo LayoutHelper::render(
                    'joomla.html.image',
                    [
                        'src' => $this->category->getParams()->get('image'),
                        'alt' => empty($this->category->getParams()->get('image_alt')) && empty($this->category->getParams()->get('image_alt_empty')) ? false : $this->category->getParams()->get('image_alt'),
                    ]
                ); ?>
            <?php endif; ?>
            <?php echo $beforeDisplayContent; ?>
            <?php if ($this->params->get('show_description') && $this->category->description) : ?>
                <?php echo HTMLHelper::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
            <?php endif; ?>
            <?php echo $afterDisplayContent; ?>
        </div>
    <?php endif; ?>

    <?php if (empty($this->lead_items) && empty($this->link_items) && empty($this->intro_items)) { ?>
        <?php if ($this->params->get('show_no_articles', 1)) { ?>
            <div class="uk-alert uk-alert-info">
                <?php echo Text::_('COM_CONTENT_NO_ARTICLES'); ?>
            </div>
        <?php } ?>
    <?php } ?>

    <?php $leadingcount = 0; ?>
    <?php if (!empty($this->lead_items)) { ?>
        <div class="uk-child-width-1-1 blog-items items-leading <?php echo $this->params->get('blog_class_leading'); ?>" data-uk-grid>
            <?php foreach ($this->lead_items as &$item) { ?>
                <div class="blog-item" itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
                    <div class="uk-panel">
                        <?php
                        $this->item = &$item;
                        echo $this->loadTemplate('item');
                        ?>
                    </div>
                </div>
                <?php $leadingcount++; ?>
            <?php } ?>
        </div>
    <?php } ?>

    <?php
    $introcount = count($this->intro_items);
    $counter = 0;
    ?>

    <?php if (!empty($this->intro_items)) { ?>
        <?php $blogClass = $this->params->get('blog_class', ''); ?>
        <div class="uk-child-width-1-<?php echo (int)$this->params->get('num_columns', 1); ?>@m blog-items <?php echo $blogClass; ?> uk-grid-small uk-flex uk-flex-center uk-flex-wrap  uk-grid-match" uk-grid>
            <?php foreach ($this->intro_items as $key => &$item) { ?>
                <div class="blog-item" itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
                    <div class=" uk-card uk-card-default uk-padding-remove-horizontal  uk-box-shadow-small uk-box-shadow-hover-large uk-border-rounded">
                        <?php
                        $this->item = &$item;
                        echo $this->loadTemplate('item');
                        ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

    <?php if (!empty($this->link_items)) { ?>
        <div class="items-more">
            <?php echo $this->loadTemplate('links'); ?>
        </div>
    <?php } ?>        <hr class="uk-margin-medium">

    <?php if (($this->params->def('show_pagination', 1) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->pagesTotal > 1)) { ?>
        <div class="uk-flex uk-flex-between@m uk-flex-middle uk-flex-wrap uk-margin-top navigation">
            <div class="com-content-category-blog__pagination">
                <?php echo $this->pagination->getPagesLinks(); ?>
            </div>
            <?php if ($this->params->def('show_pagination_results', 1)) { ?>
                <div class="counter">
                    <?php echo $this->pagination->getPagesCounter(); ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

	<?php if ($this->params->get('show_category_heading_title_text', 1) == 1) { ?>
                
				
				
				<h3><?php echo Text::_('JGLOBAL_SUBCATEGORIES'); ?></h3>
            <?php } ?>
<div class="uk-grid-small uk-child-width-1-3@m uk-text-center uk-hr uk-margin uk-padding-small" uk-grid>
    <?php if ($this->maxLevel != 0 && !empty($this->children[$this->category->id])) { ?>

        

            <?php echo $this->loadTemplate('children'); ?>

    <?php } ?>
        </div>
</div>

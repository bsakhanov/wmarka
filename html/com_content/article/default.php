​<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * @copyright   Copyright (C) Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Content\Administrator\Extension\ContentComponent;
use Joomla\Component\Content\Site\Helper\RouteHelper;

// Create shortcuts to some parameters.
$params  = $this->item->params;
$canEdit = $params->get('access-edit');
$user    = Factory::getUser();
$info    = $params->get('info_block_position', 0);
$htag    = $this->params->get('show_page_heading') ? 'h2' : 'h1';
$images = json_decode($this->item->images);
$urls = json_decode($this->item->urls);
$user = Factory::getUser();

// Check if associations are implemented. If they are, define the parameter.
$assocParam        = (Associations::isEnabled() && $params->get('show_associations'));
$currentDate       = Factory::getDate()->format('Y-m-d H:i:s');
$isNotPublishedYet = $this->item->publish_up > $currentDate;
$isExpired         = !is_null($this->item->publish_down) && $this->item->publish_down < $currentDate;

foreach($this->item->jcfields as $jcfield)
    {
      $this->item->jcFields[$jcfield->name] = $jcfield;
    }
HTMLHelper::addIncludePath(JPATH_COMPONENT . '/helpers');

$input = \Joomla\CMS\Factory::getApplication()->input;

$id     = $input->getInt('id'); // JRequest::getInt
$option = $input->getWord('option'); // JRequest::getWord


$document = JFactory::getDocument();
$view   = $input->getCmd('view', null); // JRequest::getCmd
if ($view == 'article') {
$document->addCustomTag( '<link rel="amphtml" href="'.JURI::current().'?tmpl=amp" />' );
}

if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && $this->item->paginationrelative) {
    echo $this->item->pagination;
}

$this->item->tagLayout = new JLayoutFile('joomla.content.tags-key');

$fixed_str = preg_replace('/[\s]{2,}/', ' ', $this->item->tagLayout->render($this->item->tags->itemTags));

$docTitle2 = $document->title;
$docTitle2=preg_replace_callback(
        '#(([\"]{2,})|(?![^\W])(\"))|([^\s][\"]+(?![\w]))#u',
        function ($matches) {
            if (count($matches)===3) return "«»";
            else if ($matches[1]) return str_replace('"',"«",$matches[1]);
            else return str_replace('"',"»",$matches[4]);
        },
        $docTitle2
    );

$docTitle_new = preg_replace("/^(\s*(\S+\s+){0,7}\S+).*/s", '$1', $docTitle2);

$config = JFactory::getConfig();



$document->setTitle(strip_tags(trim($docTitle_new.'... | '.$this->escape($this->item->metakey).''. $fixed_str.' ' . $config->get( 'sitename' ))));

if($this->item->metakey == "") {$mmk = $str = html_entity_decode(strip_tags(trim($docTitle_new.', '.$this->escape($this->item->metakey).' '.$this->escape($this->item->category_title).', ' . $fixed_str.'' . $config->get( 'sitename' ))));
$fixed_str = preg_replace(array('<br />','<br/>', '<br>'), ' ', $str);}
else {$mmk = $this->item->metakey;}

$document->setMetadata('keywords', $mmk);



if($this->item->metadesc == "") {$mmd = $str = html_entity_decode(strip_tags (trim((JHtml::_('string.truncate', ($this->item->text), '150'))))); $fixed_str = preg_replace('/[\s]{2,}/', ' ', $str);} else {$mmd = $this->item->metadesc;}
$mmd=preg_replace_callback(
        '#(([\"]{2,})|(?![^\W])(\"))|([^\s][\"]+(?![\w]))#u',
        function ($matches) {
            if (count($matches)===3) return "«»";
            else if ($matches[1]) return str_replace('"',"«",$matches[1]);
            else return str_replace('"',"»",$matches[4]);
        },
        $mmd
    );
$document->setMetadata('description', $mmd);






// Create shortcuts to some parameters.

$app    = JFactory::getApplication();
$mailfrom   = $app->getCfg('mailfrom');
 


$datepubl = $this->item->created;
if (isset($images -> image_intro) and !empty($images -> image_intro)) {
   $timage = htmlspecialchars(JUri::root().''.LayoutHelper::render('joomla.content.full_image2', $this->item));
   }
elseif (isset($images -> image_fulltext) and !empty($images -> image_fulltext)) {
   $timage = htmlspecialchars(JUri::root().''.LayoutHelper::render('joomla.content.full_image2', $this->item));
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
<meta name="twitter:title" content="'.$this->escape($this->item->title).'">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="'.$usernamesite.'">
<meta name="twitter:creator" content="'.$usernameautor.'">
<meta name="twitter:url" content="'.str_replace('" ','&quot;',JURI::current()).'">
<meta name="twitter:description" content="'.$mmd.'">
<meta name="twitter:image" content="'.$timage.'">
<meta name="twitter:image:src" content="'.$timage.'">
<!-- Open Graph data -->
<meta property="og:title" content="'.$this->escape($this->item->title).'">
<meta property="og:description" content="'.$mmd.'">
<meta property="og:type" content="article">
<meta property="og:url" content="'.JURI :: current().'">
<meta property="og:image" content="'.$timage.'">
<meta property="og:image:secure_url" content="'.$timage.'">
<meta property = "og:image:type" content = "image/jpg" />
<meta property="og:image:width" content="900" />
<meta property="og:image:height" content="506" />
<meta property="og:locale" content="'.$lang.'">
<meta property="og:site_name" content="'.$config->get( 'sitename' ).'">
<meta property="og:headline" content="'.$this -> escape($this -> item -> title).'">
<meta property="article:published_time" content="'.JLayoutHelper::render('joomla.content.info_block.publish_date_seo', array('item' => $this->item, 'params' => $params, 'position' => 'above')).'" />
<meta property="article:modified_time" content="'.JLayoutHelper::render('joomla.content.info_block.modify_date_seo', array('item' => $this->item, 'params' => $params, 'position' => 'above')).'" />
<meta property="article:expiration_time" content="3000-01-01" />
<meta property="article:section" content="'.$this->escape($this->item->category_title).'" />
<meta property="article:author" content="'.$this->escape($this->item->author).'">
<meta property="news_keywords" content="'.$mmk.'">
<meta property="fb:admins" content="'.$facebookid.'">
<meta property="fb:app_id" content="'.$yourappid.'">
<!-- Open Graph data end-->

<link href="//img.youtube.com" rel="dns-prefetch preconnect" />
<link href="//ajax.googleapis.com" rel="dns-prefetch preconnect" />
<link href="//www.google-analytics.com" rel="dns-prefetch preconnect">
<link href="//pagead2.googlesyndication.com" rel="dns-prefetch preconnect">
<link href="//static.doubleclick.net" rel="dns-prefetch preconnect">
<link href="//www.youtube.com" rel="dns-prefetch preconnect">
<link href="//graph.facebook.com" rel="dns-prefetch preconnect">
<link href="//metrika.yandex.ru" rel="dns-prefetch preconnect" />
<link href="//informer.yandex.ru" rel="dns-prefetch preconnect" />
');

?>
<script type="application/ld+json">
{
"@context": "http://schema.org",
"@type": "NewsArticle",
"headline": "<?php echo $this->escape($this->item->title); ?>",
"dateCreated":"<?php echo JLayoutHelper::render('joomla.content.info_block.publish_date_seo', array('item' => $this->item, 'params' => $params, 'position' => 'above')); ?>",
"datePublished": "<?php echo JLayoutHelper::render('joomla.content.info_block.publish_date_seo', array('item' => $this->item, 'params' => $params, 'position' => 'above')); ?>",
"dateModified": "<?php echo JLayoutHelper::render('joomla.content.info_block.modify_date_seo', array('item' => $this->item, 'params' => $params, 'position' => 'above')); ?>",
"description": "<?php echo $mmd; ?>",
"url":"<?php echo JURI :: current(); ?>",
"author": {
  "@type": "Person",
  "name": "<?php echo $this->escape($this->item->author); ?>"
},
"creator":"<?php echo $this->escape($this->item->author); ?>",
 "mainEntityOfPage":"True",
"publisher": {
  "@type": "Organization",
  "name": "<?php echo $config->get( 'sitename' ); ?>",
  "url":"<?php echo JUri::root(); ?>",
  "logo": {
    "@type": "ImageObject",
    "url": "<?php echo JURI::base(true).'/media/templates/site/'.$app->getTemplate().'/'; ?>images/favicon/apple-touch-icon.png",
    "width": 180,
    "height": 180
  }
},
"image": {
  "@type": "ImageObject",
  "url": "<?php echo $timage; ?>",
  "height": 900,
  "width": 506
}
}
</script>
<?php
$this->item->extrafields = array();
$this->item->extragroups = array();
if (isset($this->item->jcfields) && is_array($this->item->jcfields))
{
    foreach ($this->item->jcfields as $field)
	{
		if (!empty($field->rawvalue))
		{
			$this->item->extrafields[$field->name] = $field;
			if (!empty($field->group_title))
			{
				$field->group_transliterate = str_replace(' ', '_', JLanguage::getInstance(JFactory::getLanguage()->getTag())->transliterate($field->group_title));
				if (!isset($this->item->extragroups[$field->group_transliterate]))
				{
					$group                                          = new stdClass();
					$group->title                                   = $field->group_title;
					$group->transliterate                           = $field->group_transliterate;
					$group->state                                   = $field->group_state;
					$group->access                                  = $field->group_access;
					$group->fields                                  = array();
					$this->item->extragroups[$group->transliterate] = $group;
				}
				$this->item->extragroups[$field->group_transliterate]->fields[$field->name] = $field;
			}
		}
	}
}
$this->item->tagLayout = new JLayoutFile('joomla.content.tags');
?>

<article class="uk-article  <?php echo $this->pageclass_sfx; ?> uk-container uk-flex uk-flex-right" itemscope itemtype="https://schema.org/Article">
<div class="microdata data-hidden"> 
<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php echo JURI :: current(); ?>" >   
		<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
			<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
				<link itemprop="url" href="<?php echo JURI::base(true).'/media/templates/site/'.$app->getTemplate().'/'; ?>images/favicon/apple-touch-icon.png">
				<meta itemprop="image" content="<?php echo JURI::base(true).'/media/templates/site/'.$app->getTemplate().'/'; ?>images/favicon/apple-touch-icon.png">
				<meta itemprop="width" content="180">
				<meta itemprop="height" content="180">
				<meta itemprop="thumbnail" content="<?php echo JURI::base(true).'/media/templates/site/'.$app->getTemplate().'/'; ?>images/favicon/apple-touch-icon.png">
			</div>
   			<meta itemprop="name" content="<?php echo $config->get( 'sitename' ); ?>" />
   			<meta itemprop="description" content="<?php echo $descpublisher; ?>">			
			<link itemprop="url" href="<?php echo JUri::root(); ?>">
			<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
				<span itemprop="streetAddress"><?php echo JText::_('SEO_STREET_ADDRESS'); ?></span>
				<span itemprop="postalCode"><?php echo JText::_('SEO_POSTALCODE'); ?></span>
				<span itemprop="addressLocality"><?php echo JText::_('SEO_LOCALITY'); ?></span>
				<span itemprop="addressRegion"><?php echo JText::_('SEO_REGION'); ?></span>
				<span itemprop="addressCountry"><?php echo JText::_('SEO_COUNTRY'); ?></span>
			</div>
			<meta itemprop="telephone" content="<?php echo JText::_('SEO_TEL'); ?>">
			<meta itemprop="email" content="<?php echo $mailfrom; ?>">
		</div>	
</div>
    <?php
    // Todo Not that elegant would be nice to group the params
    $useDefList = ($params->get('show_modify_date') ||
        $params->get('show_publish_date') ||
        $params->get('show_create_date') ||
        $params->get('show_hits') ||
        $params->get('show_category') ||
        $params->get('show_parent_category') ||
        $params->get('show_author') ||
        $assocParam);
    ?>
<div class="uk-width-5-6@m "> 
	    <meta itemprop="inLanguage" content="<?php echo ($this->item->language === '*') ? Factory::getConfig()->get('language') : $this->item->language; ?>" />

	<?php $useDefList = $params->get('show_modify_date') || $params->get('show_publish_date') || $params->get('show_create_date')
	|| $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category') || $params->get('show_author') || $assocParam; ?>

<div class="uk-flex uk-flex-middle uk-flex-wrap "> 
  <div hidden><?php 
		   $text0 = LayoutHelper::render('joomla.content.tags-exlusive', $this->item->tags->itemTags); ?></div>
<?php 
$main_str0 = $text0;

if (strpos($main_str0, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
} elseif (strpos($main_str0, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
}; ?>
    
		<?php if ($this->item->state == ContentComponent::CONDITION_UNPUBLISHED) : ?>
			<span class="badge bg-warning text-light"><?php echo Text::_('JUNPUBLISHED'); ?></span>
		<?php endif; ?>
		<?php if ($isNotPublishedYet) : ?>
			<span class="badge bg-warning text-light"><?php echo Text::_('JNOTPUBLISHEDYET'); ?></span>
		<?php endif; ?>
		<?php if ($isExpired) : ?>
			<span class="badge bg-warning text-light"><?php echo Text::_('JEXPIRED'); ?></span>
		<?php endif; ?>

        <?php
        if ($useDefList && ($info == 0 || $info == 2)) {
            // Todo: for Joomla4 joomla.content.info_block.block can be changed to joomla.content.info_block
            echo LayoutHelper::render('joomla.content.info_block', array('item' => $this->item, 'params' => $params, 'position' => 'above'));
        }
        ?></div>
    <?php if ($params->get('show_page_heading') && !$params->get('show_title')) { ?>
    <h1 class="uk-article-title uk-margin-small" itemprop="headline">    		 
      
      <?php echo $this->escape($params->get('page_heading')); ?></h1>
    <?php } elseif ($params->get('show_title') != false) { ?>
    <h1 class="uk-article-title uk-margin-small" itemprop="headline">
      
      <?php echo $this->escape($this->item->title); ?></h1>
    <?php } else { ?>
    <h1 class="uk-hidden" itemprop="headline"><?php echo $this->escape($this->item->title); ?></h1>
    <?php } ?>
		<div class="uk-margin-small-left uk-visibles">
			   <ul class="as-social uk-grid-small uk-grid-small3 uk-flex-middle uk-width-2-3@m" data-uk-grid>
	<li><small>Поделиться:</small></li><li><a href="https://www.facebook.com/sharer.php?u=<?php echo JURI :: current(); ?>&summary=MySummary&title=<?php echo $this -> escape($this -> item -> title); ?>&description=<?php echo $mmd; ?>&picture=<?php echo $timage; ?>', 'ventanacompartir', 'toolbar=0, status=0, width=650, height=450'" onclick="return Share.me(this);" target="_blank" rel="nofollow noopener"  class="as-icon-facebook uk-icon-button uk-icon-button2" title="Facebook" data-uk-icon="icon: facebook; ratio: 0.7" itemprop="url"></a></li>
	<li><a href="https://t.me/share/url?url=<?php echo JURI :: current(); ?>&amp;text=<?php echo $this -> escape($this -> item -> title); ?>&amp;to=<?php echo JText::_('SEO_TEL'); ?>" target="_blank" rel="nofollow noopener" class="as-icon-telegram uk-icon-button uk-icon-button2" title="Telegram" data-uk-icon="icon: telegram; ratio: 0.7" onclick="return Share.me(this);" itemprop="url" ></a></li>
	<li><a href="https://twitter.com/share?url=<?php echo JURI :: current(); ?>" target="_blank" rel="nofollow noopener" class="as-icon-twitter uk-icon-button uk-icon-button2" title="Twitter" data-uk-icon="icon: twitter; ratio: 0.7"onclick="return Share.me(this);" itemprop="url"></a></li>
	<li><a href="https://vk.com/share.php?url=<?php echo JURI :: current(); ?>" target="_blank" rel="nofollow noopener" class="as-icon-vk uk-icon-button uk-icon-button2" title="vk" data-uk-icon="icon: vk; ratio: 0.7" onclick="return Share.me(this);" itemprop="url"></a></li>
	<li><a href="https://api.whatsapp.com/send?text=<?php echo JURI :: current(); ?>%20<?php echo $this -> escape($this -> item -> title); ?>" target="_blank" rel="nofollow noopener" class="as-icon-whatsapp uk-icon-button uk-icon-button2" title="whatsapp" data-uk-icon="icon: whatsapp; ratio: 0.7"></a></li>	
</ul></div>

<div class="uk-width-4-6@m uk-margin-top">
    <?php
    if (!$this->print) {
        if ($canEdit || $params->get('show_print_icon') || $params->get('show_email_icon')) {
            echo LayoutHelper::render('joomla.content.icons', array('params' => $params, 'item' => $this->item, 'print' => false));
        }
    } else {
        if ($useDefList) {
            echo HTMLHelper::_('icon.print_screen', $this->item, $params, ['class' => 'uk-button uk-button-link', 'data-uk-tooltip' => str_replace(['<', '>'], ['«', '»'], Text::sprintf('JGLOBAL_PRINT_TITLE', $this->item->title))]);
        }
    }

    // Content is generated by content plugin event "onContentAfterTitle"
    echo $this->item->event->afterDisplayTitle;
    ?>
    <?php



    if (isset($urls) && ((!empty($urls->urls_position) && ($urls->urls_position == '0')) || ($params->get('urls_position') == '0' && empty($urls->urls_position))) || (empty($urls->urls_position) && (!$params->get('urls_position')))) {
        echo $this->loadTemplate('links');
    }

    if ($params->get('access-view')) {
        echo LayoutHelper::render('joomla.content.full_image', $this->item);
		
    }

    if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && !$this->item->paginationrelative) {
        echo $this->item->pagination;
    }

    if (isset($this->item->toc)) {
        echo $this->item->toc;
    }
    ?></div>
<?php
     if ($params->get('access-view')) {
        echo LayoutHelper::render('joomla.content.full_image1', $this->item);
		
    }

    ?>	
	<h2 class="uk-margin-top  uk-h3">
<?php echo $mmd;?>

</h2>

    <div itemprop="articleBody">
	<div class="uk-text-left uk-margin uk-margin-auto-right uk-margin-auto@m  uk-article-body ">
		<?php echo $this->item->text; ?>
		<div class="uk-hr uk-flex uk-flex-middle ">
     

 
	 <div hidden><?php $text2 = LayoutHelper::render('joomla.content.tags', $this->item->tags->itemTags); ?></div>

  
<?php
 
$format=str_replace('#Эксклюзив','',$text2);
echo $format;
?>
  
</div>	
<?php echo JLayoutHelper::render('joomla.content.info_blockfull', array('item' => $this->item, 'params' => $params, 'position' => 'above'));

?>
 
<div>
    
     <?php // Content is generated by content plugin event "onContentAfterDisplay" ?>
    <?php echo $this->item->event->afterDisplayContent; ?>
</div>
<div class="uk-margin-small-left uk-visibles">
	   <ul class="as-social uk-grid-small uk-grid-small3 uk-flex-middle uk-width-2-3@m" data-uk-grid>
	<li><small>Поделиться:</small></li><li><a href="https://www.facebook.com/sharer.php?u=<?php echo JURI :: current(); ?>&summary=MySummary&title=<?php echo $this -> escape($this -> item -> title); ?>&description=<?php echo $mmd; ?>&picture=<?php echo $timage; ?>', 'ventanacompartir', 'toolbar=0, status=0, width=650, height=450'" onclick="return Share.me(this);" target="_blank" rel="nofollow noopener"  class="as-icon-facebook uk-icon-button uk-icon-button2" title="Facebook" data-uk-icon="icon: facebook; ratio: 0.7" itemprop="url"></a></li>
	<li><a href="https://t.me/share/url?url=<?php echo JURI :: current(); ?>&amp;text=<?php echo $this -> escape($this -> item -> title); ?>&amp;to=<?php echo JText::_('SEO_TEL'); ?>" target="_blank" rel="nofollow noopener" class="as-icon-telegram uk-icon-button uk-icon-button2" title="Telegram" data-uk-icon="icon: telegram; ratio: 0.7" onclick="return Share.me(this);" itemprop="url" ></a></li>
	<li><a href="https://twitter.com/share?url=<?php echo JURI :: current(); ?>" target="_blank" rel="nofollow noopener" class="as-icon-twitter uk-icon-button uk-icon-button2" title="Twitter" data-uk-icon="icon: twitter; ratio: 0.7"onclick="return Share.me(this);" itemprop="url"></a></li>
	<li><a href="https://vk.com/share.php?url=<?php echo JURI :: current(); ?>" target="_blank" rel="nofollow noopener" class="as-icon-vk uk-icon-button uk-icon-button2" title="vk" data-uk-icon="icon: vk; ratio: 0.7" onclick="return Share.me(this);" itemprop="url"></a></li>
	<li><a href="https://api.whatsapp.com/send?text=<?php echo JURI :: current(); ?>%20<?php echo $this -> escape($this -> item -> title); ?>" target="_blank" rel="nofollow noopener" class="as-icon-whatsapp uk-icon-button uk-icon-button2" title="whatsapp" data-uk-icon="icon: whatsapp; ratio: 0.7"></a></li>	
</ul>
</div>
 


 
 
	</div>
	
    </div>


	

	<div class="microdata data-hidden" itemscope itemtype="https://schema.org/Article" >
		<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php echo JURI :: current(); ?>" >
		<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php echo JURI :: current(); ?>" content="<?php echo $this -> escape($this -> item -> title); ?>"/>
		<span itemprop="name" ><?php echo $this -> escape($this -> item -> title); ?></span>
		<span itemprop="headline" ><?php echo $this -> escape($this -> item -> title); ?></span>
		<link itemprop="url" href="<?php echo JURI :: current(); ?>">
		<meta itemprop="description" content="<?php echo $mmd; ?>">
		<meta itemprop="datePublished" content="<?php echo JLayoutHelper::render('joomla.content.info_block.publish_date_seo', array('item' => $this->item, 'params' => $params, 'position' => 'above')); ?>">
		<meta itemprop="dateModified" content="<?php echo JLayoutHelper::render('joomla.content.info_block.modify_date_seo', array('item' => $this->item, 'params' => $params, 'position' => 'above')); ?>">


		<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
			<link itemprop="url" href="<?php echo $timage; ?>">
			<meta itemprop="width" content="900">
			<meta itemprop="height" content="506">
			<meta itemprop="thumbnail" content="<?php echo $timage; ?>">
		</div>
		<div itemprop="author" itemscope itemtype="http://schema.org/Person" >
			<meta itemprop="name" content="<?php echo $config->get( 'sitename' ); ?>">
			<meta itemprop="description" content="<?php echo $descauthor; ?>">
			<meta itemprop="image" content="<?php echo JURI::base(true).'/media/templates/site/'.$app->getTemplate().'/'; ?>images/logotype.jpg">
			<link itemprop="url" href="<?php echo JUri::root(); ?>">
			<meta itemprop="email" content="<?php echo $mailfrom; ?>">
			<meta itemprop="telephone" content="<?php echo JText::_('SEO_TEL'); ?>">
			<meta itemprop="address" content="<?php echo JText::_('SEO_LOCALITY'); ?>, <?php echo JText::_('SEO_COUNTRY'); ?>">

		</div>
		<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
			<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
				<link itemprop="url" href="<?php echo JURI::base(true).'/media/templates/site/'.$app->getTemplate().'/'; ?>images/favicon/apple-touch-icon.png">
				<meta itemprop="image" content="<?php echo JURI::base(true).'/media/templates/site/'.$app->getTemplate().'/'; ?>images/favicon/apple-touch-icon.png">
				<meta itemprop="width" content="180">
				<meta itemprop="height" content="180">
				<meta itemprop="thumbnail" content="<?php echo JURI::base(true).'/media/templates/site/'.$app->getTemplate().'/'; ?>images/favicon/apple-touch-icon.png">
			</div>
   			<meta itemprop="name" content="<?php echo $config->get( 'sitename' ); ?>" />
   			<meta itemprop="description" content="<?php echo $descpublisher; ?>">			
			<link itemprop="url" href="<?php echo JUri::root(); ?>">
			<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
				<span itemprop="streetAddress"><?php echo JText::_('SEO_STREET_ADDRESS'); ?></span>
				<span itemprop="postalCode"><?php echo JText::_('SEO_POSTALCODE'); ?></span>
				<span itemprop="addressLocality"><?php echo JText::_('SEO_LOCALITY'); ?></span>
				<span itemprop="addressRegion"><?php echo JText::_('SEO_REGION'); ?></span>
				<span itemprop="addressCountry"><?php echo JText::_('SEO_COUNTRY'); ?></span>
			</div>
			<meta itemprop="telephone" content="<?php echo JText::_('SEO_TEL'); ?>">
			<meta itemprop="email" content="<?php echo $mailfrom; ?>">
		</div>	
	</div>
	<script>
		Share = {
			me: function(el) {
				console.log(el.href);
				Share.popup(el.href);
				return false;
			},

			popup: function(url) {
				window.open(url, '', 'toolbar=0,status=0,width=626,height=436');
			}
		};
	</script>
	 </div>
</article>
        <?php echo  
		'<div class="uk-width-1-1 uk-margin-top">';
		 echo JHTML::_('content.prepare', '{loadposition related}');		
		echo '</div>';
		?>
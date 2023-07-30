<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Content\Administrator\Extension\ContentComponent;
use Joomla\Component\Content\Site\Helper\RouteHelper;

$app = Factory::getContainer()->get(Joomla\CMS\Application\SiteApplication::class);

// Create a shortcut for params.
$params  = $this->item->params;
$canEdit = $this->item->params->get('access-edit');
$info    = $params->get('info_block_position', 0);

// Check if associations are implemented. If they are, define the parameter.
$assocParam = (Associations::isEnabled() && $params->get('show_associations'));

$currentDate   = Factory::getDate()->format(Text::_('DATE_FORMAT_LC6'));
$isUnpublished = ($this->item->state == ContentComponent::CONDITION_UNPUBLISHED || $this->item->publish_up > $currentDate)
    || ($this->item->publish_down < $currentDate && $this->item->publish_down !== null);

?>

<?php echo LayoutHelper::render('joomla.content.intro_image', $this->item); ?>

<div class="uk-card-body uk-card-small  uk-padding-remove-top">
  
	<div>
        <h2 class="uk-h6 uk-text-bold uk-card-header uk-padding-remove-horizontal">
          <div hidden><?php $text0 = LayoutHelper::render('joomla.content.tags-exlusive', $this->item->tags->itemTags); ?></div>
<?php 
$main_str0 = $text0;

if (strpos($main_str0, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
} elseif (strpos($main_str0, 'Эксклюзив') !== false) {
  echo '<a href="/t/eksklyuziv" class="uk-link-heading uk-text-bolder uk-flex-first excl uk-border-rounded ">Эксклюзив</a>';
}; ?>
		 
	 <a class="uk-link-heading" href="<?php echo Route::_(RouteHelper::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language)); ?>" itemprop="url" ><?php echo $this->item->title; ?></a>
		</h2>
        <?php 
      if ($canEdit) {
        echo LayoutHelper::render('joomla.content.icons', array('params' => $params, 'item' => $this->item));
    }

    // @todo Not that elegant would be nice to group the params
    $useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date')
        || $params->get('show_create_date') || $params->get('show_hits')
      
        || $params->get('show_author') || $assocParam);
		

    if ($useDefList && ($info == 0 || $info == 2)) {
        echo LayoutHelper::render('joomla.content.info_block_news', array('item' => $this->item, 'params' => $params, 'position' => 'above'));
    }


    // Content is generated by content plugin event "onContentBeforeDisplay"



    if ($useDefList && $info == 1) {
        echo LayoutHelper::render('joomla.content.info_block_news', array('item' => $this->item, 'params' => $params, 'position' => 'below'));
    }

    if (($info == 1 || $info == 2) && $params->get('show_tags', 1) && !empty($this->item->tags->itemTags)) {
        echo LayoutHelper::render('joomla.content.tags', $this->item->tags->itemTags);
    }

    if ($params->get('show_readmore') && $this->item->readmore) {
        if ($params->get('access-view')) {
            $link = Route::_(RouteHelper::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language));
        } else {
            $menu = $app->getMenu();
            $active = $menu->getActive();
            $itemId = $active->id;
            $link = new Uri(Route::_('index.php?option=com_users&view=login&Itemid=' . $itemId, false));
            $link->setVar('return', base64_encode(RouteHelper::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language)));
        }

        echo LayoutHelper::render('joomla.content.readmore', array('item' => $this->item, 'params' => $params, 'link' => $link));
    }

    if ($isUnpublished) {
        echo '';
    }

    // Content is generated by content plugin event "onContentAfterDisplay"
 
    ?></div>
<div class=" uk-flex uk-flex-middle">
     

 
	 <div hidden><?php $text2 = LayoutHelper::render('joomla.content.tags', $this->item->tags->itemTags); ?></div>

  
<?php
 
$format=str_replace('#Эксклюзив','',$text2);
echo $format;
?>
  
</div>	
</div>
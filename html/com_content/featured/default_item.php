<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * @version     WMARKA ULTRA (Featured Item + Schema.org)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Content\Administrator\Extension\ContentComponent;
use Joomla\Component\Content\Site\Helper\RouteHelper;

$params  = &$this->item->params;
$canEdit = $params->get('access-edit');
$info    = $params->get('info_block_position', 0);

$currentDate = Factory::getDate()->format('Y-m-d H:i:s');
$isUnpublished = $this->item->state == ContentComponent::CONDITION_UNPUBLISHED 
               || $this->item->publish_up > $currentDate 
               || (!is_null($this->item->publish_down) && $this->item->publish_down < $currentDate);
?>

<article class="uk-article uk-card uk-card-default uk-card-small uk-border-rounded uk-overflow-hidden <?php echo $isUnpublished ? 'uk-background-muted' : ''; ?>" 
         itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">

    <?php /* Оптимизированное изображение (через JUImage) */ ?>
    <?php echo LayoutHelper::render('joomla.content.intro_image', $this->item); ?>

    <div class="uk-card-body">
        <?php if ($params->get('show_title')) : ?>
            <h2 class="uk-article-title uk-margin-small-bottom" itemprop="headline">
                <?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
                    <a href="<?php echo Route::_(RouteHelper::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language)); ?>" class="uk-link-reset" itemprop="url">
                        <?php echo $this->escape($this->item->title); ?>
                    </a>
                <?php else : ?>
                    <?php echo $this->escape($this->item->title); ?>
                <?php endif; ?>
            </h2>
        <?php endif; ?>

        <?php /* Инфо-блок (уже оптимизирован нами под uk-subnav) */ ?>
        <?php if ($info == 0 || $info == 2) : ?>
            <?php echo LayoutHelper::render('joomla.content.info_block', ['item' => $this->item, 'params' => $params, 'position' => 'above']); ?>
        <?php endif; ?>

        <?php if ($this->item->event->afterDisplayTitle) : ?>
            <div class="uk-margin-small"><?php echo $this->item->event->afterDisplayTitle; ?></div>
        <?php endif; ?>

        <div class="uk-margin-top" itemprop="articleBody">
            <?php echo $this->item->introtext; ?>
        </div>

        <?php if ($params->get('show_readmore') && $this->item->readmore) : ?>
            <?php 
                $link = $params->get('access-view') 
                    ? Route::_(RouteHelper::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language))
                    : Route::_('index.php?option=com_users&view=login&return=' . base64_encode(RouteHelper::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language)));
            ?>
            <div class="uk-margin-medium-top">
                <?php echo LayoutHelper::render('joomla.content.readmore', ['item' => $this->item, 'params' => $params, 'link' => $link]); ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if ($canEdit) : ?>
        <div class="uk-position-top-right uk-padding-small">
            <?php echo LayoutHelper::render('joomla.content.icons', ['params' => $params, 'item' => $this->item]); ?>
        </div>
    <?php endif; ?>

</article>

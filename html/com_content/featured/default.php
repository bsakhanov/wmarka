<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * @version     Joomla 6 WMARKA Core Edition (UIkit 3 Featured Blog)
 */

declare(strict_types=1);

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

/** @var \Joomla\Component\Content\Site\View\Featured\HtmlView $this */

$params = $this->params;
?>
<div class="com-content-featured blog uk-margin-bottom" itemscope itemtype="https://schema.org/Blog">
    
    <?php /* --- ЗАГОЛОВОК СТРАНИЦЫ --- */ ?>
    <?php if ($params->get('show_page_heading')) : ?>
        <div class="page-header uk-margin-bottom">
            <h1 class="uk-heading-bullet"> <?php echo $this->escape($params->get('page_heading')); ?> </h1>
        </div>
    <?php endif; ?>

    <?php /* --- ПРОВЕРКА НА ПУСТОТУ --- */ ?>
    <?php if (empty($this->lead_items) && empty($this->link_items) && empty($this->intro_items)) : ?>
        <?php if ($params->get('show_no_articles', 1)) : ?>
            <div class="uk-alert-primary" uk-alert>
                <span uk-icon="info" class="uk-margin-small-right"></span>
                <?php echo Text::_('COM_CONTENT_NO_ARTICLES'); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php /* --- ГЛАВНЫЕ НОВОСТИ (LEADING) --- */ ?>
    <?php if (!empty($this->lead_items)) : ?>
        <div class="uk-grid-large uk-child-width-1-1 blog-items items-leading uk-margin-medium-bottom" uk-grid>
            <?php foreach ($this->lead_items as &$item) : ?>
                <div itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
                    <?php
                    $this->item = &$item;
                    echo $this->loadTemplate('item');
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php /* --- СЕТКА НОВОСТЕЙ (INTRO) --- */ ?>
    <?php if (!empty($this->intro_items)) : ?>
        <?php $numCol = (int) $params->get('num_columns', 1); ?>
        <div class="uk-grid-small uk-child-width-1-<?php echo $numCol; ?>@m uk-grid-match blog-items" uk-grid>
            <?php foreach ($this->intro_items as &$item) : ?>
                <div itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
                    <div class="uk-card uk-card-default uk-card-small uk-border-rounded uk-box-shadow-hover-medium uk-height-1-1 uk-flex uk-flex-column">
                        <?php
                        $this->item = &$item;
                        echo $this->loadTemplate('item');
                        ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php /* --- ССЫЛКИ (LINKS) --- */ ?>
    <?php if (!empty($this->link_items)) : ?>
        <div class="items-more uk-margin-medium-top">
            <?php echo $this->loadTemplate('links'); ?>
        </div>
    <?php endif; ?>

    <?php /* --- ПАГИНАЦИЯ --- */ ?>
    <?php if (($params->def('show_pagination', 1) == 1 || ($params->get('show_pagination') == 2)) && ($this->pagination->pagesTotal > 1)) : ?>
        <div class="uk-margin-large-top uk-flex uk-flex-between uk-flex-middle uk-flex-wrap">
            <div class="wmarka-pagination">
                <?php echo $this->pagination->getPagesLinks(); ?>
            </div>
            <?php if ($params->def('show_pagination_results', 1)) : ?>
                <div class="uk-text-meta">
                    <?php echo $this->pagination->getPagesCounter(); ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</div>
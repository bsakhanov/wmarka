<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * @version     WMARKA ULTRA (Featured Main Wrap + UIkit Grid)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Layout\LayoutHelper;

/** @var \Joomla\Component\Content\Site\View\Featured\HtmlView $this */

$params = $this->params;
$columns = (int) $params->get('num_columns', 2);
$gridClass = 'uk-child-width-1-1';
if ($columns > 1) {
    $gridClass .= " uk-child-width-1-{$columns}@m";
}
?>

<div class="com-content-featured featured-blog uk-section uk-section-xsmall" itemscope itemtype="https://schema.org/Blog">
    
    <?php if ($params->get('show_page_heading')) : ?>
        <h1 class="uk-heading-bullet uk-margin-medium-bottom">
            <?php echo $this->escape($params->get('page_heading')); ?>
        </h1>
    <?php endif; ?>

    <?php /* 1. Вводные (Leading) материалы — на всю ширину */ ?>
    <?php if (!empty($this->lead_items)) : ?>
        <div class="uk-grid-medium uk-child-width-1-1 uk-margin-medium-bottom" uk-grid>
            <?php foreach ($this->lead_items as &$item) : ?>
                <div>
                    <?php
                    $this->item = & $item;
                    echo $this->loadTemplate('item');
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php /* 2. Основные (Intro) материалы в колонках */ ?>
    <?php if (!empty($this->intro_items)) : ?>
        <div class="uk-grid-medium uk-grid-match <?php echo $gridClass; ?>" uk-grid>
            <?php foreach ($this->intro_items as $key => &$item) : ?>
                <div>
                    <?php
                    $this->item = & $item;
                    echo $this->loadTemplate('item');
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php /* 3. Ссылки на другие материалы */ ?>
    <?php if (!empty($this->link_items)) : ?>
        <div class="uk-margin-large-top">
            <?php echo $this->loadTemplate('links'); ?>
        </div>
    <?php endif; ?>

    <?php /* 4. Пагинация */ ?>
    <?php if ($params->def('show_pagination', 2) == 1 || ($params->get('show_pagination') == 2 && $this->pagination->pagesTotal > 1)) : ?>
        <div class="uk-margin-large-top">
            <?php echo $this->pagination->getPagesLinks(); ?>
            <?php if ($params->def('show_pagination_results', 1)) : ?>
                <div class="uk-text-meta uk-text-center uk-margin-small-top">
                    <?php echo $this->pagination->getPagesCounter(); ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</div>

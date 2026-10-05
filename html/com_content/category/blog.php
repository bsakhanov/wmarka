<?php
/**
 * WMARKA — блог категории.
 *
 * Ведущие материалы — широкие карточки (фото слева), вводные — сетка
 * карточек с переключателем «сетка / список» (выбор запоминается),
 * опция масонри, колонки — штатный параметр «Колонок». Опции WMARKA —
 * отдельная вкладка в пункте меню (blog.xml).
 *
 * @var \Joomla\Component\Content\Site\View\Category\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Wmarka\Template\Config;
use Wmarka\Template\Image;
use Wmarka\Template\Seo;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$app = Factory::getApplication();

$this->category->text = $this->category->description;
$app->triggerEvent('onContentPrepare', [$this->category->extension . '.categories', &$this->category, &$this->params, 0]);
$this->category->description = $this->category->text;

$afterDisplayTitle    = trim(implode("\n", $app->triggerEvent('onContentAfterTitle', [$this->category->extension . '.categories', &$this->category, &$this->params, 0])));
$beforeDisplayContent = trim(implode("\n", $app->triggerEvent('onContentBeforeDisplay', [$this->category->extension . '.categories', &$this->category, &$this->params, 0])));
$afterDisplayContent  = trim(implode("\n", $app->triggerEvent('onContentAfterDisplay', [$this->category->extension . '.categories', &$this->category, &$this->params, 0])));

$htag    = $this->params->get('show_page_heading') ? 'h2' : 'h1';
$view    = $this->params->get('wm_view', Config::str('blog_view', 'grid')) === 'list' ? 'list' : 'grid';
$switch  = (bool) $this->params->get('wm_switch', 1);
$cols    = max(1, min(6, (int) $this->params->get('num_columns', 3) ?: 3));
$masonry = (bool) $this->params->get('wm_masonry', 0);
$gutter  = Ui::gutter((string) $this->params->get('wm_gutter', 'medium'));
$gridCls = Ui::columns($cols);
$catImg  = $this->params->get('show_description_image') ? Image::thumb($this->category->getParams()->get('image'), 'intro', false) : [];

Seo::page(['description' => strip_tags((string) $this->category->description), 'image' => (string) $this->category->getParams()->get('image')]);

// Опции карточки для blog_item.php
$this->wmCard = [
    'switch' => $switch,
    'view'   => $view,
    'media'  => $this->params->get('wm_media', 'top') === 'alternate' ? 'left' : $this->params->get('wm_media', 'top'),
    'style'  => $this->params->get('wm_card', 'default'),
    'hover'  => (bool) $this->params->get('wm_hover', 1),
    'heading'=> $htag === 'h1' ? 'h2' : 'h3',
    'limit'  => Ui::introLimit($this->params),
    'sizes'  => Image::sizes($cols),
];
?>
<div class="com-content-category-blog blog" itemscope itemtype="https://schema.org/Blog">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1 class="uk-heading-small"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
    <?php endif; ?>

    <?php if ($this->params->get('show_category_title', 1)) : ?>
        <<?php echo $htag; ?> class="<?php echo $htag === 'h1' ? 'uk-heading-small' : 'uk-h2'; ?>"><?php echo Ui::title($this->category->title); ?></<?php echo $htag; ?>>
    <?php endif; ?>
    <?php echo $afterDisplayTitle; ?>

    <?php if ($this->params->get('show_cat_tags', 1) && !empty($this->category->tags->itemTags)) : ?>
        <?php echo LayoutHelper::render('joomla.content.tags', $this->category->tags->itemTags); ?>
    <?php endif; ?>

    <?php if ($beforeDisplayContent || $afterDisplayContent || ($this->params->get('show_description') && $this->category->description) || $catImg) : ?>
        <div class="uk-grid-medium uk-margin-medium-bottom" uk-grid>
            <?php if ($catImg) : ?>
                <div class="uk-width-1-3@m"><?php echo Image::img($catImg, (string) $this->category->getParams()->get('image_alt', ''), ['class' => 'uk-width-1-1']); ?></div>
            <?php endif; ?>
            <div class="uk-width-expand@m">
                <?php echo $beforeDisplayContent; ?>
                <?php if ($this->params->get('show_description') && $this->category->description) : ?>
                    <div class="uk-text-lead"><?php echo HTMLHelper::_('content.prepare', $this->category->description, '', 'com_content.category'); ?></div>
                <?php endif; ?>
                <?php echo $afterDisplayContent; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (empty($this->lead_items) && empty($this->link_items) && empty($this->intro_items)) : ?>
        <?php if ($this->params->get('show_no_articles', 1)) : ?>
            <div class="uk-alert-primary" uk-alert><p><?php echo Text::_('COM_CONTENT_NO_ARTICLES'); ?></p></div>
        <?php endif; ?>
    <?php endif; ?>

    <?php if (!empty($this->lead_items)) : ?>
        <div class="uk-child-width-1-1 uk-margin-medium-bottom <?php echo $this->params->get('blog_class_leading'); ?>" uk-grid>
            <?php $card = $this->wmCard; ?>
            <?php $this->wmCard = ['switch' => false, 'view' => 'list', 'media' => 'left', 'style' => $card['style'], 'hover' => $card['hover'], 'heading' => $card['heading'], 'limit' => $this->params->get('wm_lead_full', 0) ? 0 : $card['limit'], 'sizes' => Image::sizes(0)]; ?>
            <?php foreach ($this->lead_items as $wmI => &$item) : ?>
                <?php $this->wmCard['media'] = ($this->params->get('wm_media') === 'alternate' && $wmI % 2) || $this->params->get('wm_media') === 'right' ? 'right' : 'left'; ?>
                <div><?php $this->item = &$item; echo $this->loadTemplate('item'); ?></div>
            <?php endforeach; ?>
            <?php $this->wmCard = $card; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($this->intro_items)) : ?>
        <div data-wm-switch="blog-<?php echo (int) $this->category->id; ?>" data-wm-view="<?php echo $view; ?>">
            <?php if ($switch) : ?>
                <div class="uk-flex uk-flex-right uk-margin-small-bottom"><?php echo Ui::viewSwitch($view); ?></div>
            <?php endif; ?>
            <div <?php echo Ui::switchAttr($view, $gridCls, 'uk-child-width-1-1', $gutter . ($masonry ? '' : ' uk-grid-match') . ' ' . $this->params->get('blog_class', '')); ?> uk-grid<?php echo $masonry ? '="masonry: pack"' : ''; ?>>
                <?php foreach (array_values($this->intro_items) as $wmI => &$item) : ?>
                    <?php if ($this->params->get('wm_media') === 'alternate') { $this->wmCard['media'] = $wmI % 2 ? 'right' : 'left'; } ?>
                    <div><?php $this->item = &$item; echo $this->loadTemplate('item'); ?></div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($this->link_items)) : ?>
        <div class="uk-margin-medium-top"><?php echo $this->loadTemplate('links'); ?></div>
    <?php endif; ?>

    <?php if ($this->maxLevel != 0 && !empty($this->children[$this->category->id])) : ?>
        <div class="uk-margin-large-top">
            <?php if ($this->params->get('show_category_heading_title_text', 1) == 1) : ?>
                <h3 class="uk-heading-line"><span><?php echo Text::_('JGLOBAL_SUBCATEGORIES'); ?></span></h3>
            <?php endif; ?>
            <?php echo $this->loadTemplate('children'); ?>
        </div>
    <?php endif; ?>

    <?php if ($this->category->getParams()->get('access-create')) : ?>
        <div class="uk-margin"><?php echo Ui::bridge((string) HTMLHelper::_('contenticon.create', $this->category, $this->category->params)); ?></div>
    <?php endif; ?>

    <?php if (($this->params->def('show_pagination', 1) == 1 || $this->params->get('show_pagination') == 2) && $this->pagination->pagesTotal > 1) : ?>
        <?php echo $this->pagination->getPagesLinks(); ?>
        <?php if ($this->params->def('show_pagination_results', 1)) : ?>
            <p class="uk-text-meta uk-text-center"><?php echo $this->pagination->getPagesCounter(); ?></p>
        <?php endif; ?>
    <?php endif; ?>
</div>

<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * @version     Joomla 6 WMARKA BLOG (SEO + OpenGraph + UIkit 3 + Local Assets)
 */

declare(strict_types=1);

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Uri\Uri;

/** @var \Joomla\Component\Content\Site\View\Category\HtmlView $this */

$app      = Factory::getApplication();
$params   = $this->params;
$root     = Uri::base(true) . '/';

// --- 1. ТИПОГРАФИКА (Кавычки «елочки») ---
$fixQuotes = function (?string $text): string {
    if (empty($text)) return '';
    return preg_replace_callback('#(([\"]{2,})|(?![^\W])(\"))|([^\s][\"]+(?![\w]))#u', function ($m) {
        if (count($m) === 3) return "«»";
        return (!empty($m[1])) ? str_replace('"', "«", $m[1]) : str_replace('"', "»", $m[4] ?? '"');
    }, $text) ?? $text;
};

// --- 2. JUIMAGE И SEO ДАННЫЕ ---
require_once JPATH_SITE . '/libraries/juimage/vendor/autoload.php';
$juImg = new \JUImage\Image();

$catImage   = $this->category->getParams()->get('image') ?: 'media/templates/site/wmarka/images/zamena.jpg';
$ogRendered = $juImg->render($catImage, ['w' => 1200, 'h' => 630, 'q' => 75, 'f' => 'jpg', 'fit' => 'cover']);

// Передаем данные в ядро шаблона (Seo.php)
$app->set('seo_category_title', $fixQuotes($this->category->title));
$app->set('seo_fallback_text', strip_tags((string)$this->category->description));
$app->set('current_item_image', ltrim($ogRendered, '/'));

// --- 3. СОБЫТИЯ ПЛАГИНОВ ---
$this->category->text = $this->category->description;
$app->triggerEvent('onContentPrepare', [$this->category->extension . '.categories', &$this->category, &$params, 0]);
$this->category->description = $this->category->text;

$afterDisplayTitle    = trim(implode("\n", $app->triggerEvent('onContentAfterTitle', [$this->category->extension . '.categories', &$this->category, &$params, 0])));
$beforeDisplayContent = trim(implode("\n", $app->triggerEvent('onContentBeforeDisplay', [$this->category->extension . '.categories', &$this->category, &$params, 0])));
$afterDisplayContent  = trim(implode("\n", $app->triggerEvent('onContentAfterDisplay', [$this->category->extension . '.categories', &$this->category, &$params, 0])));

$htag = $params->get('show_page_heading') ? 'h2' : 'h1';
?>

<div class="com-content-category-blog blog uk-margin-bottom" itemscope itemtype="https://schema.org/Blog">
    
    <?php if ($params->get('show_page_heading')) : ?>
        <div class="page-header uk-margin-bottom">
            <h1 class="uk-heading-bullet"> <?php echo $this->escape($params->get('page_heading')); ?> </h1>
        </div>
    <?php endif; ?>

    <?php if ($params->get('show_category_title', 1)) : ?>
        <<?php echo $htag; ?> class="uk-article-title uk-margin-small-bottom">
            <?php echo $fixQuotes($this->category->title); ?>
        </<?php echo $htag; ?>>
    <?php endif; ?>

    <?php echo $afterDisplayTitle; ?>

    <?php /* Теги категории */ ?>
    <?php if ($params->get('show_cat_tags', 1) && !empty($this->category->tags->itemTags)) : ?>
        <div class="uk-margin-small-bottom">
            <?php $this->category->tagLayout = new FileLayout('joomla.content.tags'); ?>
            <?php echo $this->category->tagLayout->render($this->category->tags->itemTags); ?>
        </div>
    <?php endif; ?>

    <?php /* Описание категории с картинкой WebP */ ?>
    <?php if ($beforeDisplayContent || $afterDisplayContent || $params->get('show_description', 1)) : ?>
        <div class="category-desc uk-panel uk-margin-medium-bottom">
            <?php if ($params->get('show_description_image') && ($img = $this->category->getParams()->get('image'))) : 
                $cI = $juImg->render($img, ['w' => 400, 'h' => 250, 'q' => 60, 'f' => 'webp', 'fit' => 'cover']);
            ?>
                <img src="<?php echo $root . ltrim($cI, '/'); ?>" 
                     alt="<?php echo htmlspecialchars((string) $this->category->title, ENT_QUOTES, 'UTF-8'); ?>" 
                     class="uk-align-right@m uk-border-rounded uk-margin-remove-adjacent"
                     width="400" height="250">
            <?php endif; ?>
            
            <?php echo $beforeDisplayContent; ?>
            <?php if ($params->get('show_description') && $this->category->description) : ?>
                <div class="uk-text-lead@m">
                    <?php echo HTMLHelper::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
                </div>
            <?php endif; ?>
            <?php echo $afterDisplayContent; ?>
        </div>
    <?php endif; ?>

    <?php /* --- ГЛАВНЫЕ НОВОСТИ (LEADING) --- */ ?>
    <?php if (!empty($this->lead_items)) : ?>
        <div class="uk-grid-large uk-child-width-1-1 blog-items items-leading uk-margin-medium-bottom" uk-grid>
            <?php foreach ($this->lead_items as &$item) : ?>
                <div itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
                    <?php $this->item = &$item; echo $this->loadTemplate('item'); ?>
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
                        <?php $this->item = &$item; echo $this->loadTemplate('item'); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php /* --- ССЫЛКИ --- */ ?>
    <?php if (!empty($this->link_items)) : ?>
        <div class="items-more uk-margin-medium-top">
            <?php echo $this->loadTemplate('links'); ?>
        </div>
    <?php endif; ?>

    <?php /* ПАГИНАЦИЯ */ ?>
    <?php if (($params->def('show_pagination', 1) != 0) && ($this->pagination->pagesTotal > 1)) : ?>
        <div class="uk-margin-large-top uk-flex uk-flex-between uk-flex-middle uk-flex-wrap">
            <div class="wmarka-pagination">
                <?php echo $this->pagination->getPagesLinks(); ?>
            </div>
            <?php if ($params->get('show_pagination_results')) : ?>
                <div class="uk-text-meta">
                    <?php echo $this->pagination->getPagesCounter(); ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php /* ПОДКАТЕГОРИИ */ ?>
    <?php if ($this->maxLevel != 0 && !empty($this->children[$this->category->id])) : ?>
        <div class="uk-margin-large-top">
            <hr class="uk-divider-icon">
            <h3 class="uk-heading-line uk-text-center"><span><?php echo Text::_('JGLOBAL_SUBCATEGORIES'); ?></span></h3>
            <div class="uk-grid-small uk-child-width-1-3@m uk-text-center" uk-grid>
                <?php echo $this->loadTemplate('children'); ?>
            </div>
        </div>
    <?php endif; ?>

</div>
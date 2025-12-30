<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * @version     Joomla 6 WMARKA BLOG ULTRA (SEO + OpenGraph + UIkit 3)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Uri\Uri;

/** @var Joomla\Component\Content\Site\View\Category\HtmlView $this */

$app      = Factory::getApplication();
$document = Factory::getDocument();
$config   = Factory::getConfig();
$params   = $this->params;
$sitename = $config->get('sitename');
$tplPath  = Uri::base(true) . '/media/templates/site/wmarka';
$defaultImageFallback = $tplPath . '/images/zamena.jpg'; // Твоя заглушка

// --- 1. SEO ЛОГИКА: Автоматизация заголовков и мета-тегов ---
$docTitle = $document->getTitle();
$document->setTitle(strip_tags(trim($docTitle)));

// Функция исправления кавычек «елочки»
$fixQuotes = function ($text) {
    return preg_replace_callback('#(([\"]{2,})|(?![^\W])(\"))|([^\s][\"]+(?![\w]))#u', function ($m) {
        if (count($m) === 3) return "«»";
        return (isset($m[1]) && $m[1]) ? "«" : "»";
    }, $text);
};

// Keywords: автогенерация если пусто
if (empty($this->category->metakey)) {
    $mk = html_entity_decode(strip_tags(trim($docTitle . ', ' . $sitename)));
    $document->setMetadata('keywords', preg_replace('/[\s]{2,}/', ' ', $mk));
}

// Description: автогенерация если пусто
if (empty($this->category->metadesc)) {
    $md = HTMLHelper::_('string.truncate', strip_tags($this->category->description), 350);
    $document->setMetadata('description', preg_replace('/[\s]{2,}/', ' ', html_entity_decode($md)));
}

// --- 2. OPEN GRAPH & ТЕХНИЧЕСКИЕ ТЕГИ ---
$timage = ($params->get('show_description_image') && $this->category->getParams()->get('image'))
    ? Uri::root() . $this->category->getParams()->get('image')
    : Uri::root() . ltrim($defaultImageFallback, '/');

$document->setMetadata('og:title', $docTitle);
$document->setMetadata('og:description', $document->getMetadata('description'));
$document->setMetadata('og:type', 'website');
$document->setMetadata('og:url', Uri::getInstance()->toString());
$document->setMetadata('og:image', $timage);
$document->setMetadata('og:locale', Text::_('OG_LANG'));
$document->setMetadata('twitter:card', 'summary_large_image');

// DNS Prefetch для ускорения загрузки
$document->addCustomTag('
    <link rel="dns-prefetch preconnect" href="//metrika.yandex.ru" />
    <link rel="dns-prefetch preconnect" href="//www.google-analytics.com" />
    <link rel="dns-prefetch preconnect" href="//static.doubleclick.net" />
');

// --- 3. ПОДГОТОВКА СОБЫТИЙ ПЛАГИНОВ ---
$this->category->text = $this->category->description;
$app->triggerEvent('onContentPrepare', [$this->category->extension . '.categories', &$this->category, &$this->params, 0]);
$this->category->description = $this->category->text;

$afterDisplayTitle    = trim(implode("\n", $app->triggerEvent('onContentAfterTitle', [$this->category->extension . '.categories', &$this->category, &$this->params, 0])));
$beforeDisplayContent = trim(implode("\n", $app->triggerEvent('onContentBeforeDisplay', [$this->category->extension . '.categories', &$this->category, &$this->params, 0])));
$afterDisplayContent  = trim(implode("\n", $app->triggerEvent('onContentAfterDisplay', [$this->category->extension . '.categories', &$this->category, &$this->params, 0])));

$htag = $params->get('show_page_heading') ? 'h2' : 'h1';
?>

<div class="com-content-category-blog blog" itemscope itemtype="https://schema.org/Blog">
    
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

    <?php /* Описание категории с поддержкой JUImage (если добавишь логику) */ ?>
    <?php if ($beforeDisplayContent || $afterDisplayContent || $params->get('show_description', 1)) : ?>
        <div class="category-desc uk-panel uk-margin-medium-bottom">
            <?php if ($params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
                <img src="<?php echo $this->category->getParams()->get('image'); ?>" 
                     alt="<?php echo $this->category->title; ?>" 
                     class="uk-align-right@m uk-border-rounded uk-margin-remove-adjacent">
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

    <?php /* --- ГЛАВНЫЕ МАТЕРИАЛЫ (LEADING) --- */ ?>
    <?php if (!empty($this->lead_items)) : ?>
        <div class="uk-grid-large uk-child-width-1-1 blog-items items-leading" uk-grid>
            <?php foreach ($this->lead_items as &$item) : ?>
                <div itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
                    <?php $this->item = &$item; echo $this->loadTemplate('item'); ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php /* --- СЕТКА МАТЕРИАЛОВ (INTRO) --- */ ?>
    <?php if (!empty($this->intro_items)) : ?>
        <?php $numCol = (int)$params->get('num_columns', 1); ?>
        <div class="uk-grid-small uk-child-width-1-<?php echo $numCol; ?>@m uk-grid-match blog-items" uk-grid>
            <?php foreach ($this->intro_items as &$item) : ?>
                <div itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
                    <div class="uk-card uk-card-default uk-card-small uk-border-rounded uk-box-shadow-hover-medium">
                        <?php $this->item = &$item; echo $this->loadTemplate('item'); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php /* Ссылки на другие материалы */ ?>
    <?php if (!empty($this->link_items)) : ?>
        <div class="uk-margin-medium-top uk-card uk-card-secondary uk-card-body uk-border-rounded">
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

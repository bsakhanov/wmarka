<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * @version     Joomla 6 WMARKA BLOG ITEM (Ultra SEO + JUImage + CLS Fix)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Content\Site\Helper\RouteHelper;

/** @var Joomla\Component\Content\Site\View\Category\HtmlView $this */

$item      = $this->item;
$params    = $item->params;
$images    = json_decode($item->images);
$canEdit   = $params->get('access-edit');
$tplPath   = Uri::base(true) . '/media/templates/site/wmarka';
$defaultImageFallback = 'media/templates/site/wmarka/images/zamena.jpg';

// --- 1. ИНИЦИАЛИЗАЦИЯ JUImage (Миниатюры) ---
require_once(JPATH_SITE . '/libraries/juimage/vendor/autoload.php');
$juImg = new JUImage\Image();
$qValue = '70'; 

// Размеры для карточки в блоге
$sz = [
    'thumb' => ['w' => 600, 'h' => 400],
    'mob'   => ['w' => 360, 'h' => 240]
];

// --- 2. SEO ЛОГИКА (Кавычки) ---
$fixQuotes = function ($text) {
    return preg_replace_callback('#(([\"]{2,})|(?![^\W])(\"))|([^\s][\"]+(?![\w]))#u', function ($m) {
        if (count($m) === 3) return "«»";
        return (isset($m[1]) && $m[1]) ? "«" : "»";
    }, $text);
};

// --- 3. ВРЕМЯ ЧТЕНИЯ ---
$wordCount = preg_match_all('/[\p{L}\p{N}]+/u', strip_tags($item->introtext), $matches);
$minutesToRead = ceil($wordCount / 180) ?: 1;
$minWord = Text::_('COM_CCK_MINUT');
if ($minutesToRead % 10 == 1 && $minutesToRead % 100 != 11) $minWord = Text::_('COM_CCK_MINUTE');
elseif ($minutesToRead % 10 >= 2 && $minutesToRead % 10 <= 4 && ($minutesToRead % 100 < 10 || $minutesToRead % 100 >= 20)) $minWord = Text::_('COM_CCK_MINUTES');

// --- 4. ОБРАБОТКА ТЕГОВ (Эксклюзив) ---
$isExclusive = false;
$displayTags = [];
if (!empty($item->tags->itemTags)) {
    foreach ($item->tags->itemTags as $tag) {
        if (mb_strtolower(trim($tag->title)) === 'эксклюзив') {
            $isExclusive = true;
        } else {
            $displayTags[] = $tag;
        }
    }
}

// Ссылка на статью
$link = Route::_(RouteHelper::getArticleRoute($item->slug, $item->catid, $item->language));

// --- 5. ЛОГИКА ИЗОБРАЖЕНИЯ (Intro -> Full -> Fallback) ---
$imgPath = ($images->image_intro ?: $images->image_fulltext) ?: $defaultImageFallback;
$renderedD = $juImg->render($imgPath, ['w' => $sz['thumb']['w'], 'h' => $sz['thumb']['h'], 'q' => $qValue, 'f' => 'webp', 'fit' => 'cover']);
$renderedM = $juImg->render($imgPath, ['w' => $sz['mob']['w'],   'h' => $sz['mob']['h'],   'q' => $qValue, 'f' => 'webp', 'fit' => 'cover']);
$baseUrl = Uri::base(true) . '/';
?>

<div class="uk-card-media-top uk-inline-clip uk-transition-toggle">
    <?php /* Метка "Эксклюзив" */ ?>
    <?php if ($isExclusive) : ?>
        <div class="uk-transition-fade uk-position-small uk-position-top-left uk-overlay uk-padding-remove uk-z-index">
            <span class="uk-label uk-label-danger uk-border-rounded" style="background: #e02020;">
                Эксклюзив
            </span>
        </div>
    <?php endif; ?>

    <a href="<?php echo $link; ?>" aria-label="<?php echo $this->escape($item->title); ?>">
        <picture>
            <source srcset="<?php echo $baseUrl . $renderedM; ?>" media="(max-width: 640px)">
            <img src="<?php echo $baseUrl . $renderedD; ?>" 
                 width="<?php echo $sz['thumb']['w']; ?>" 
                 height="<?php echo $sz['thumb']['h']; ?>" 
                 alt="<?php echo $this->escape($item->title); ?>" 
                 class="uk-border-rounded-top uk-transition-scale-up uk-transition-opaque"
                 loading="lazy">
        </picture>
    </a>
</div>

<div class="uk-card-body uk-padding-small">
    
    <?php /* Мета-инфо: Дата и Время чтения */ ?>
    <div class="uk-article-meta uk-margin-small-bottom uk-flex uk-flex-middle uk-flex-between">
        <time datetime="<?php echo Factory::getDate($item->publish_up)->format('c'); ?>">
            <?php echo HTMLHelper::_('date', $item->publish_up, Text::_('DATE_FORMAT_LC3')); ?>
        </time>
        <span class="uk-text-bold">
            <span uk-icon="icon: clock; ratio: 0.7"></span> <?php echo $minutesToRead . ' ' . $minWord; ?>
        </span>
    </div>

    <?php /* Заголовок с «елочками» */ ?>
    <h3 class="uk-card-title uk-margin-remove-top uk-text-bold uk-text-break">
        <a class="uk-link-reset" href="<?php echo $link; ?>" itemprop="url">
            <?php echo $fixQuotes($item->title); ?>
        </a>
    </h3>

    <?php /* Вводный текст (если нужно) */ ?>
    <?php if ($params->get('show_intro')) : ?>
        <div class="uk-text-small uk-text-muted uk-margin-small-top">
            <?php echo HTMLHelper::_('string.truncate', strip_tags($item->introtext), 120); ?>
        </div>
    <?php endif; ?>

    <?php /* Хит-парад и Теги */ ?>
    <div class="uk-margin-small-top uk-flex uk-flex-middle uk-flex-wrap">
        <?php if (!empty($displayTags)) : ?>
            <?php foreach (array_slice($displayTags, 0, 2) as $tag) : ?>
                <span class="uk-text-meta uk-margin-small-right">#<?php echo $tag->title; ?></span>
            <?php endforeach; ?>
        <?php endif; ?>
        
        <span class="uk-text-meta uk-margin-auto-left">
            <span uk-icon="icon: bolt; ratio: 0.7"></span> <?php echo $item->hits; ?>
        </span>
    </div>

    <?php if ($canEdit) : ?>
        <div class="uk-margin-small-top">
            <?php echo LayoutHelper::render('joomla.content.icons', ['params' => $params, 'item' => $item]); ?>
        </div>
    <?php endif; ?>
</div>

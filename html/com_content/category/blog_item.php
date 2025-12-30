<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * @version     Joomla 6 WMARKA BLOG ITEM (Clean Version + JLayout Integration)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;

/** @var Joomla\Component\Content\Site\View\Category\HtmlView $this */

$item   = $this->item;
$params = $item->params;
$images = json_decode($item->images);

// --- 1. ТИПОГРАФИКА (Кавычки «елочки») ---
$fixQuotes = function ($text) {
    return preg_replace_callback('#(([\"]{2,})|(?![^\W])(\"))|([^\s][\"]+(?![\w]))#u', function ($m) {
        if (count($m) === 3) return "«»";
        return (isset($m[1]) && $m[1]) ? "«" : "»";
    }, $text);
};

// --- 2. ВРЕМЯ ЧТЕНИЯ (с языковыми константами) ---
$wordCount = preg_match_all('/[\p{L}\p{N}]+/u', strip_tags($item->introtext . $item->fulltext), $matches);
$minutesToRead = ceil($wordCount / 180) ?: 1;
$minWord = Text::_('COM_CCK_MINUT');
if ($minutesToRead % 10 == 1 && $minutesToRead % 100 != 11) {
    $minWord = Text::_('COM_CCK_MINUTE');
} elseif ($minutesToRead % 10 >= 2 && $minutesToRead % 10 <= 4 && ($minutesToRead % 100 < 10 || $minutesToRead % 100 >= 20)) {
    $minWord = Text::_('COM_CCK_MINUTES');
}

// --- 3. ЛОГИКА ТЕГОВ (Эксклюзив) ---
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
?>

<?php /* ВЫВОД КАРТИНКИ ЧЕРЕЗ JLAYOUT (с автоматическим WebP и srcset) */ ?>
<div class="uk-card-media-top uk-inline-clip uk-transition-toggle">
    
    <?php if ($isExclusive) : ?>
        <div class="uk-position-small uk-position-top-left uk-z-index">
            <span class="uk-label uk-label-danger uk-border-rounded">Эксклюзив</span>
        </div>
    <?php endif; ?>

    <?php /* Вызываем наше переопределение intro_image */ ?>
    <?php echo LayoutHelper::render('joomla.content.intro_image', $item); ?>

</div>

<div class="uk-card-body uk-padding-small">
    
    <?php /* МЕТА: Дата и Время чтения */ ?>
    <div class="uk-article-meta uk-margin-small-bottom uk-flex uk-flex-middle uk-flex-between">
        <time class="uk-text-meta" datetime="<?php echo Factory::getDate($item->publish_up)->format('c'); ?>">
            <?php echo HTMLHelper::_('date', $item->publish_up, Text::_('DATE_FORMAT_LC3')); ?>
        </time>
        <span class="uk-text-meta">
            <span uk-icon="icon: clock; ratio: 0.7"></span> 
            <?php echo $minutesToRead . ' ' . $minWord; ?>
        </span>
    </div>

    <?php /* ЗАГОЛОВОК */ ?>
    <h3 class="uk-card-title uk-margin-remove-top uk-text-bold">
        <a class="uk-link-reset" href="<?php echo $link; ?>">
            <?php echo $fixQuotes($item->title); ?>
        </a>
    </h3>

    <?php /* ВВОДНЫЙ ТЕКСТ (Кратко) */ ?>
    <?php if ($params->get('show_intro')) : ?>
        <div class="uk-text-small uk-text-muted uk-margin-small-bottom">
            <?php echo HTMLHelper::_('string.truncate', strip_tags($item->introtext), 110); ?>
        </div>
    <?php endif; ?>

    <hr class="uk-margin-small">

    <?php /* ФУТЕР КАРТОЧКИ: Теги и Просмотры */ ?>
    <div class="uk-flex uk-flex-middle uk-flex-between">
        <div class="uk-flex uk-flex-middle">
            <?php if (!empty($displayTags)) : ?>
                <span uk-icon="icon: tag; ratio: 0.7" class="uk-margin-xsmall-right uk-text-muted"></span>
                <span class="uk-text-meta">#<?php echo $this->escape($displayTags[0]->title); ?></span>
            <?php endif; ?>
        </div>
        
        <div class="uk-text-meta">
            <span uk-icon="icon: bolt; ratio: 0.7"></span> 
            <?php echo $item->hits; ?>
        </div>
    </div>

    <?php /* КНОПКА ПОДРОБНЕЕ */ ?>
    <?php if ($params->get('show_readmore')) : ?>
        <div class="uk-margin-small-top">
            <a href="<?php echo $link; ?>" class="uk-button uk-button-text uk-text-primary uk-text-bold">
                <?php echo Text::_('MOD_PROMO_MORE'); ?> <span uk-icon="arrow-right"></span>
            </a>
        </div>
    <?php endif; ?>

</div>

<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * @version     Joomla 6 WMARKA FEATURED ITEM (Typograph + Read Time)
 */

declare(strict_types=1);

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;

/** @var \Joomla\Component\Content\Site\View\Featured\HtmlView $this */

$item   = $this->item;
$params = $item->params;

// --- 1. ТИПОГРАФИКА (Кавычки «елочки») ---
$fixQuotes = function (?string $text): string {
    if (empty($text)) return '';
    return preg_replace_callback('#(([\"]{2,})|(?![^\W])(\"))|([^\s][\"]+(?![\w]))#u', function ($m) {
        if (count($m) === 3) return "«»";
        return (!empty($m[1])) ? str_replace('"', "«", $m[1]) : str_replace('"', "»", $m[4] ?? '"');
    }, $text) ?? $text;
};

// --- 2. ВРЕМЯ ЧТЕНИЯ ---
$rawText = strip_tags((string)($item->introtext ?? '') . (string)($item->fulltext ?? ''));
$wordCount = preg_match_all('/[\p{L}\p{N}]+/u', $rawText);
$minutesToRead = (int) ceil($wordCount / 180) ?: 1;

$minWord = Text::_('TPL_WMARKA_MINUT');
$m10  = $minutesToRead % 10;
$m100 = $minutesToRead % 100;
if ($m10 === 1 && $m100 !== 11) {
    $minWord = Text::_('TPL_WMARKA_MINUTE');
} elseif ($m10 >= 2 && $m10 <= 4 && ($m100 < 10 || $m100 >= 20)) {
    $minWord = Text::_('TPL_WMARKA_MINUTES');
}

// --- 3. ЛОГИКА ТЕГОВ (Эксклюзив) ---
$isExclusive = false;
$displayTags = [];
if (!empty($item->tags->itemTags)) {
    foreach ($item->tags->itemTags as $tag) {
        if (mb_strtolower(trim((string)$tag->title)) === 'эксклюзив') {
            $isExclusive = true;
        } else {
            $displayTags[] = $tag;
        }
    }
}

// Ссылка на статью
$link = Route::_(RouteHelper::getArticleRoute($item->slug, $item->catid, $item->language));
?>

<?php /* ВЫВОД КАРТИНКИ ЧЕРЕЗ JLAYOUT */ ?>
<div class="uk-card-media-top uk-inline-clip uk-transition-toggle">
    
    <?php if ($isExclusive) : ?>
        <div class="uk-position-small uk-position-top-left uk-z-index">
            <span class="uk-label uk-label-danger uk-border-rounded">Эксклюзив</span>
        </div>
    <?php endif; ?>

    <a href="<?php echo $link; ?>" title="<?php echo htmlspecialchars((string) $item->title, ENT_QUOTES, 'UTF-8'); ?>">
        <?php echo LayoutHelper::render('joomla.content.intro_image', $item); ?>
    </a>

</div>

<div class="uk-card-body uk-padding-small uk-flex-auto uk-flex uk-flex-column">
    
    <?php /* МЕТА: Дата и Время чтения */ ?>
    <div class="uk-article-meta uk-margin-small-bottom uk-flex uk-flex-middle uk-flex-between">
        <time class="uk-text-meta" datetime="<?php echo Factory::getDate($item->publish_up)->format('c'); ?>">
            <?php echo HTMLHelper::_('date', $item->publish_up, Text::_('DATE_FORMAT_LC3')); ?>
        </time>
        <span class="uk-text-meta" title="Время чтения" uk-tooltip>
            <span uk-icon="icon: clock; ratio: 0.7"></span> 
            <?php echo $minutesToRead . ' ' . $minWord; ?>
        </span>
    </div>

    <?php /* СОБЫТИЯ ПЛАГИНОВ (Кастомные поля) */ ?>
    <?php echo $item->event->afterDisplayTitle ?? ''; ?>

    <?php /* ЗАГОЛОВОК */ ?>
    <h3 class="uk-card-title uk-margin-remove-top uk-text-bold">
        <a class="uk-link-reset" href="<?php echo $link; ?>">
            <?php echo $fixQuotes($item->title); ?>
        </a>
    </h3>

    <?php echo $item->event->beforeDisplayContent ?? ''; ?>

    <?php /* ВВОДНЫЙ ТЕКСТ (Кратко) */ ?>
    <?php if ($params->get('show_intro')) : ?>
        <div class="uk-text-small uk-text-muted uk-margin-small-bottom uk-flex-auto">
            <?php echo HTMLHelper::_('string.truncate', strip_tags((string)$item->introtext), 110); ?>
        </div>
    <?php endif; ?>

    <?php echo $item->event->afterDisplayContent ?? ''; ?>

    <hr class="uk-margin-small">

    <?php /* ФУТЕР КАРТОЧКИ: Теги и Просмотры */ ?>
    <div class="uk-flex uk-flex-middle uk-flex-between">
        <div class="uk-flex uk-flex-middle">
            <?php if (!empty($displayTags)) : ?>
                <span uk-icon="icon: tag; ratio: 0.7" class="uk-margin-xsmall-right uk-text-muted"></span>
                <a href="<?php echo Route::_(RouteHelper::getTagRoute($displayTags[0]->tag_id)); ?>" class="uk-text-meta uk-link-reset">
                    #<?php echo htmlspecialchars((string)$displayTags[0]->title, ENT_QUOTES, 'UTF-8'); ?>
                </a>
            <?php endif; ?>
        </div>
        
        <div class="uk-text-meta" title="Просмотры" uk-tooltip>
            <span uk-icon="icon: bolt; ratio: 0.7"></span> 
            <?php echo (int) $item->hits; ?>
        </div>
    </div>

    <?php /* КНОПКА ПОДРОБНЕЕ */ ?>
    <?php if ($params->get('show_readmore')) : ?>
        <div class="uk-margin-small-top">
            <a href="<?php echo $link; ?>" class="uk-button uk-button-text uk-text-primary uk-text-bold" aria-label="<?php echo Text::_('TPL_WMARKA_READ_MORE') . ' ' . htmlspecialchars((string)$item->title, ENT_QUOTES, 'UTF-8'); ?>">
                <?php echo Text::_('TPL_WMARKA_READ_MORE'); ?> <span uk-icon="arrow-right"></span>
            </a>
        </div>
    <?php endif; ?>

</div>
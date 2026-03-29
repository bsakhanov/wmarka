<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * @version     Joomla 6.0 WMARKA ULTIMATE (Core Features + Hardcore Typograph + WebP)
 * @author      Partner Programmer & Beibit Sakhanov
 */

declare(strict_types=1);

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Content\Administrator\Extension\ContentComponent;
use Joomla\Component\Content\Site\Helper\RouteHelper;

/** @var \Joomla\Component\Content\Site\View\Article\HtmlView $this */

// --- 1. ИНИЦИАЛИЗАЦИЯ (Core + Wmarka) ---
$item     = $this->item;
$params   = $item->params;
$app      = Factory::getApplication();
$user     = $this->getCurrentUser();
$images   = json_decode((string) ($item->images ?? ''), true) ?: [];
$root     = Uri::base(true) . '/';

$canEdit  = $params->get('access-edit');
$info     = (int) $params->get('info_block_position', 0);
$htag     = $params->get('show_page_heading') ? 'h2' : 'h1';

// Нативные проверки Joomla
$assocParam        = (Associations::isEnabled() && $params->get('show_associations'));
$currentDate       = Factory::getDate()->format('Y-m-d H:i:s');
$isNotPublishedYet = $item->publish_up > $currentDate;
$isExpired         = !is_null($item->publish_down) && $item->publish_down < $currentDate;
$useDefList        = $params->get('show_modify_date') || $params->get('show_publish_date') || $params->get('show_create_date')
                   || $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category') 
                   || $params->get('show_author') || $assocParam;

// --- 2. УЛЬТРА-ТИПОГРАФ С БАЛАНСИРОВКОЙ ТЕГОВ ---
$typograph = function (?string $text): string {
    if (empty($text)) return '';
    $parts = preg_split('/(<[^>]+>)/u', $text, -1, PREG_SPLIT_DELIM_CAPTURE);
    foreach ($parts as $i => $part) {
        if (!empty($part) && $part[0] !== '<') {
            $parts[$i] = preg_replace_callback(
                '#(([\"]{2,})|(?![^\W])(\"))|([^\s][\"]+(?![\w]))#u',
                function ($matches) {
                    if (count($matches) === 3) return "«»";
                    else if (isset($matches[1]) && $matches[1]) return str_replace('"', "«", $matches[1]);
                    else return str_replace('"', "»", $matches[4] ?? '"');
                }, $part
            );
        }
    }
    $text = implode('', $parts);
    $tagsToBalance = ['em', 'strong', 'span', 'p', 'div', 'b', 'i'];
    foreach ($tagsToBalance as $tag) {
        $openCount  = substr_count(mb_strtolower($text), '<' . $tag);
        $closeCount = substr_count(mb_strtolower($text), '</' . $tag . '>');
        if ($openCount > $closeCount) $text .= str_repeat('</' . $tag . '>', $openCount - $closeCount);
    }
    return $text;
};

// --- 3. JUIMAGE: ПОДГОТОВКА И ОБРАБОТКА ФОТО ---
require_once JPATH_SITE . '/libraries/juimage/vendor/autoload.php';
$juImg = new \JUImage\Image();

$cleanTitle = (string) $typograph($item->title);
$currentUrl = (string) Uri::getInstance()->toString();

$articleBody = preg_replace_callback('/<img[^>]+src="([^">]+)"([^>]*)>/i', function($matches) use ($juImg, $root, $cleanTitle) {
    $src = $matches[1];
    $attrs = $matches[2];
    if (str_contains($src, 'http') && !str_contains($src, Uri::getInstance()->getHost())) return $matches[0];
    
    $thumbD = $juImg->render($src, ['w' => 900, 'h' => 0, 'q' => 85, 'f' => 'webp']);
    $thumbM = $juImg->render($src, ['w' => 390, 'h' => 0, 'q' => 80, 'f' => 'webp']);

    return '<picture class="uk-display-block uk-margin-medium-top uk-margin-medium-bottom">
                <source srcset="' . $root . ltrim($thumbM, '/') . '" media="(max-width: 640px)" type="image/webp">
                <img src="' . $root . ltrim($thumbD, '/') . '" ' . $attrs . ' alt="' . htmlspecialchars($cleanTitle, ENT_QUOTES, 'UTF-8') . '" class="uk-border-rounded uk-box-shadow-medium article-content-img" loading="lazy">
            </picture>';
}, $item->text ?? '');

$articleBody = $typograph($articleBody);

// --- 4. ПЕРЕДАЧА ДАННЫХ В SEO.PHP ---
$app->set('seo_category_title', $item->category_title ?? '');
$app->set('seo_fallback_text', strip_tags((string)$item->introtext . (string)$item->fulltext));
$app->set('current_item_image', !empty($images['image_fulltext']) ? $images['image_fulltext'] : (!empty($images['image_intro']) ? $images['image_intro'] : ''));
$app->set('current_item_publish_date', $item->publish_up ?? '');

// Проверка наличия медиа для главного фото
$hasMedia = false; 
if (!empty($item->jcfields)) {
    foreach ($item->jcfields as $f) {
        if (in_array($f->name, ['gallery', 'video']) && !empty($f->value)) {
            $hasMedia = true; break;
        }
    }
}
?>

<article class="com-content-article item-page<?php echo htmlspecialchars((string) $this->pageclass_sfx, ENT_QUOTES, 'UTF-8'); ?> uk-article" itemscope itemtype="https://schema.org/NewsArticle">
    
    <meta itemprop="inLanguage" content="<?php echo ($item->language === '*') ? $app->getLanguage()->getTag() : $item->language; ?>">
    <meta itemprop="dateModified" content="<?php echo $item->modified ?: $item->publish_up; ?>">
    <link itemprop="mainEntityOfPage" href="<?php echo $currentUrl; ?>">

    <?php /* --- СИСТЕМНЫЙ ЗАГОЛОВОК СТРАНИЦЫ --- */ ?>
    <?php if ($params->get('show_page_heading')) : ?>
        <div class="page-header uk-margin-bottom">
            <h1 class="uk-h2 uk-text-muted"><?php echo htmlspecialchars((string) $params->get('page_heading'), ENT_QUOTES, 'UTF-8'); ?></h1>
        </div>
    <?php endif; ?>

    <?php /* ПАГИНАЦИЯ (Относительная, вверху) */ ?>
    <?php if (!empty($item->pagination) && !$item->paginationposition && $item->paginationrelative) echo $item->pagination; ?>

    <?php /* --- ЗАГОЛОВОК СТАТЬИ И БЕЙДЖИ СОСТОЯНИЙ --- */ ?>
    <?php if ($params->get('show_title')) : ?>
        <<?php echo $htag; ?> itemprop="headline" class="uk-article-title uk-margin-small-bottom">
            <?php echo $cleanTitle; ?>
            
            <?php /* Нативные предупреждения Joomla (Unpublished, Expired) стилизованные под UIkit */ ?>
            <?php if ($item->state == ContentComponent::CONDITION_UNPUBLISHED) : ?>
                <span class="uk-label uk-label-warning uk-margin-small-left"><?php echo Text::_('JUNPUBLISHED'); ?></span>
            <?php endif; ?>
            <?php if ($isNotPublishedYet) : ?>
                <span class="uk-label uk-label-warning uk-margin-small-left"><?php echo Text::_('JNOTPUBLISHEDYET'); ?></span>
            <?php endif; ?>
            <?php if ($isExpired) : ?>
                <span class="uk-label uk-label-danger uk-margin-small-left"><?php echo Text::_('JEXPIRED'); ?></span>
            <?php endif; ?>
        </<?php echo $htag; ?>>
    <?php endif; ?>

    <?php /* --- ИКОНКИ РЕДАКТИРОВАНИЯ --- */ ?>
    <?php if ($canEdit) : ?>
        <div class="uk-margin-small-bottom">
            <?php echo LayoutHelper::render('joomla.content.icons', ['params' => $params, 'item' => $item]); ?>
        </div>
    <?php endif; ?>

    <?php /* --- СОБЫТИЕ: AFTER DISPLAY TITLE (Выводит Кастомные поля) --- */ ?>
    <?php echo $item->event->afterDisplayTitle ?? ''; ?>

    <?php /* --- ИНФО-БЛОК (Сверху) --- */ ?>
    <?php if ($useDefList && ($info == 0 || $info == 2)) : ?>
        <div class="uk-article-meta uk-margin-medium-bottom">
            <?php echo LayoutHelper::render('joomla.content.info_block', ['item' => $item, 'params' => $params, 'position' => 'above']); ?>
        </div>
    <?php endif; ?>

    <?php /* --- ТЕГИ (Сверху) --- */ ?>
    <?php if ($info == 0 && $params->get('show_tags', 1) && !empty($item->tags->itemTags)) : ?>
        <div class="uk-margin-medium-bottom">
            <?php $item->tagLayout = new FileLayout('joomla.content.tags'); ?>
            <?php echo $item->tagLayout->render($item->tags->itemTags); ?>
        </div>
    <?php endif; ?>

    <?php /* --- СОБЫТИЕ: BEFORE DISPLAY CONTENT (Выводит Кастомные поля) --- */ ?>
    <?php echo $item->event->beforeDisplayContent ?? ''; ?>

    <?php /* --- ССЫЛКИ (Сверху) --- */ ?>
    <?php if ((int) $params->get('urls_position', 0) === 0) : ?>
        <?php echo $this->loadTemplate('links'); ?>
    <?php endif; ?>

    <?php /* --- ОСНОВНОЙ КОНТЕНТ (С проверкой прав доступа) --- */ ?>
    <?php if ($params->get('access-view')) : ?>
        
        <?php /* ГЛАВНОЕ ФОТО ВНУТРИ BODY ДЛЯ ОБТЕКАНИЯ */ ?>
        <?php if (!$hasMedia && (!empty($images['image_fulltext']) || !empty($images['image_intro']))) : ?>
            <?php echo LayoutHelper::render('joomla.content.full_image', $item); ?>
        <?php endif; ?>

        <?php /* Оглавление (TOC) - Нативная фича */ ?>
        <?php if (isset($item->toc)) echo $item->toc; ?>

        <?php /* Текст статьи с типографом */ ?>
        <div class="com-content-article__body uk-margin-medium-bottom uk-clearfix" itemprop="articleBody">
            <?php echo $articleBody; ?>
        </div>

        <?php /* --- ИНФО-БЛОК И ТЕГИ (Снизу) --- */ ?>
        <?php if ($info == 1 || $info == 2) : ?>
            <?php if ($useDefList) : ?>
                <div class="uk-article-meta uk-margin-medium-top">
                    <?php echo LayoutHelper::render('joomla.content.info_block', ['item' => $item, 'params' => $params, 'position' => 'below']); ?>
                </div>
            <?php endif; ?>
            <?php if ($params->get('show_tags', 1) && !empty($item->tags->itemTags)) : ?>
                <div class="uk-margin-medium-top">
                    <?php $item->tagLayout = new FileLayout('joomla.content.tags'); ?>
                    <?php echo $item->tagLayout->render($item->tags->itemTags); ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php /* --- ССЫЛКИ И ПАГИНАЦИЯ (Снизу) --- */ ?>
        <?php if (!empty($item->pagination) && $item->paginationposition && !$item->paginationrelative) echo $item->pagination; ?>
        <?php if ((int) $params->get('urls_position', 0) === 1) echo $this->loadTemplate('links'); ?>

    <?php /* --- ЗАКРЫТЫЙ КОНТЕНТ (Для неавторизованных) --- */ ?>
    <?php elseif ($params->get('show_noauth') && $user->guest) : ?>
        
        <?php echo LayoutHelper::render('joomla.content.intro_image', $item); ?>
        
        <div class="uk-article-body uk-margin-medium-bottom">
            <?php echo HTMLHelper::_('content.prepare', $item->introtext); ?>
        </div>
        
        <?php /* Кнопка "Подробнее / Авторизоваться" */ ?>
        <?php if ($params->get('show_readmore') && $item->fulltext != null) : ?>
            <?php 
                $menu   = Factory::getApplication()->getMenu();
                $itemId = $menu->getActive() ? $menu->getActive()->id : 0;
                $link   = new Uri(Route::_('index.php?option=com_users&view=login&Itemid=' . $itemId, false));
                $link->setVar('return', base64_encode(RouteHelper::getArticleRoute($item->slug, $item->catid, $item->language))); 
            ?>
            <div class="uk-margin-medium-top">
                <?php echo LayoutHelper::render('joomla.content.readmore', ['item' => $item, 'params' => $params, 'link' => $link]); ?>
            </div>
        <?php endif; ?>

    <?php endif; ?>

    <?php /* ПАГИНАЦИЯ (Относительная, внизу) */ ?>
    <?php if (!empty($item->pagination) && $item->paginationposition && $item->paginationrelative) echo $item->pagination; ?>

    <?php /* --- СОБЫТИЕ: AFTER DISPLAY CONTENT (Выводит Кастомные поля, Галереи, Плагины комментариев) --- */ ?>
    <?php echo $item->event->afterDisplayContent ?? ''; ?>

    <?php /* --- КНОПКИ ШЕРИНГА WMARKA --- */ ?>
    <?php 
    $shareUrl   = urlencode($currentUrl); 
    $shareTitle = urlencode($cleanTitle); 
    ?>
    <div class="uk-margin-medium-top uk-padding-small uk-section-muted uk-border-rounded">
        <div class="uk-grid-small uk-flex-center uk-flex-middle uk-grid" uk-grid>
            <div><a href="https://t.me/share/url?url=<?php echo $shareUrl; ?>&text=<?php echo $shareTitle; ?>" class="uk-icon-button social-tg" uk-icon="telegram" target="_blank" rel="noopener" aria-label="Telegram"></a></div>
            <div><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $shareUrl; ?>" class="uk-icon-button social-fb" uk-icon="facebook" target="_blank" rel="noopener" aria-label="Facebook"></a></div>
            <div><a href="https://twitter.com/intent/tweet?url=<?php echo $shareUrl; ?>&text=<?php echo $shareTitle; ?>" class="uk-icon-button social-tw" uk-icon="twitter" target="_blank" rel="noopener" aria-label="Twitter"></a></div>
            <div><a href="https://vk.com/share.php?url=<?php echo $shareUrl; ?>&title=<?php echo $shareTitle; ?>" class="uk-icon-button social-vk" uk-icon="vk" target="_blank" rel="noopener" aria-label="VK"></a></div>
            <div><a href="#" class="uk-icon-button" uk-icon="copy" title="Скопировать" onclick="navigator.clipboard.writeText('<?php echo $currentUrl; ?>'); UIkit.notification('Ссылка скопирована', {status:'success', pos:'bottom-center'}); return false;" aria-label="Copy"></a></div>
            <div><a href="#" onclick="window.print(); return false;" class="uk-icon-button" uk-icon="print" aria-label="Print"></a></div>            
        </div>
    </div>

    <?php /* РЕКЛАМНЫЙ БЛОК / ПОДПИСКА WMARKA */ ?>
    <a target="_blank" href="https://t.me/bsakhanov" class="uk-button uk-button-primary uk-width-1-1 uk-border-rounded uk-flex uk-flex-middle uk-flex-center uk-margin-top" style="background-color: #229ED9">
        <span class="uk-text-bold uk-margin-right">Мировоззрение с Бейбитом Сахановым</span> // Подписаться на новости <span uk-icon="telegram" class="uk-margin-small-left"></span>
    </a>

</article>
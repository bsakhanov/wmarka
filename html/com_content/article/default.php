<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * @version     Joomla 6 WMARKA GENTLEMAN SET (Final + Fallback + JUImage + SEO)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

/** @var Joomla\Component\Content\Site\View\Article\HtmlView $this */

$app       = Factory::getApplication();
$document  = Factory::getDocument();
$params    = $this->item->params;
$item      = $this->item;
$images    = json_decode($item->images);
$sitename  = Factory::getConfig()->get('sitename');

// --- 1. ПУТИ И ИНИЦИАЛИЗАЦИЯ ---
$defaultImageFallback = 'media/templates/site/wmarka/images/zamena.jpg'; // Твоя заглушка
require_once(JPATH_SITE . '/libraries/juimage/vendor/autoload.php');
$juImg = new JUImage\Image();
$qValue = '75'; 

// Конфигурация размеров
$sz = [
    'main' => ['w' => 1200, 'h' => 630],
    'text' => ['w' => 800,  'h' => 500],
    'mob'  => ['w' => 480,  'h' => 300]
];

// --- 2. SEO ЛОГИКА (Кавычки и Мета) ---
$fixQuotes = function ($text) {
    return preg_replace_callback('#(([\"]{2,})|(?![^\W])(\"))|([^\s][\"]+(?![\w]))#u', function ($m) {
        if (count($m) === 3) return "«»";
        return (isset($m[1]) && $m[1]) ? "«" : "»";
    }, $text);
};

$document->setTitle(strip_tags(trim($fixQuotes($item->title) . ' | ' . $sitename)));
$metaDesc = $item->metadesc ?: HTMLHelper::_('string.truncate', strip_tags($item->text), 160, true, false);
$document->setMetadata('description', $fixQuotes($metaDesc));

// --- 3. ОБРАБОТКА ИЗОБРАЖЕНИЙ В ТЕКСТЕ ---
$articleBody = preg_replace_callback('/<img [^>]*src=["\']([^"\']+)["\'][^>]*>/i', function($m) use ($juImg, $qValue, $sz) {
    $src = ltrim($m[1], '/');
    if (!file_exists(JPATH_SITE . '/' . $src)) return $m[0];
    
    $dImg = $juImg->render($src, ['w' => $sz['text']['w'], 'h' => $sz['text']['h'], 'q' => $qValue, 'f' => 'webp']);
    $mImg = $juImg->render($src, ['w' => $sz['mob']['w'],  'h' => $sz['mob']['h'],  'q' => $qValue, 'f' => 'webp']);
    $base = Uri::base(true) . '/';

    return '<figure class="uk-margin-medium-bottom"><picture>
                <source srcset="'.$base.$mImg.'" media="(max-width: 640px)">
                <img src="'.$base.$dImg.'" width="'.$sz['text']['w'].'" height="'.$sz['text']['h'].'" class="uk-border-rounded" alt="image" loading="lazy">
            </picture></figure>';
}, $item->text);

// --- 4. ВРЕМЯ ЧТЕНИЯ ---
$wordCount = preg_match_all('/[\p{L}\p{N}]+/u', strip_tags($item->text), $matches);
$minutesToRead = ceil($wordCount / 180) ?: 1;
$minWord = Text::_('COM_CCK_MINUT');
if ($minutesToRead % 10 == 1 && $minutesToRead % 100 != 11) $minWord = Text::_('COM_CCK_MINUTE');
elseif ($minutesToRead % 10 >= 2 && $minutesToRead % 10 <= 4 && ($minutesToRead % 100 < 10 || $minutesToRead % 100 >= 20)) $minWord = Text::_('COM_CCK_MINUTES');

// --- 5. ЛОГИКА ГЛАВНОГО ИЗОБРАЖЕНИЯ (С Fallback) ---
$mainImgPath = ($images->image_fulltext ?: $images->image_intro) ?: $defaultImageFallback;

// --- 6. OPEN GRAPH & JSON-LD ---
$ogR = $juImg->render($mainImgPath, ['w' => 1200, 'h' => 630, 'q' => 80, 'f' => 'jpg', 'fit' => 'cover']);
$ogImg = Uri::root() . ltrim($ogR, '/');
$document->setMetadata('og:image', $ogImg);
$document->setMetadata('og:locale', Text::_('OG_LANG'));

$jsonLd = [
    "@context" => "https://schema.org",
    "@type" => "NewsArticle",
    "headline" => $item->title,
    "image" => [$ogImg],
    "datePublished" => Factory::getDate($item->publish_up)->format('c')
];
$document->addScriptDeclaration(json_encode($jsonLd, JSON_UNESCAPED_UNICODE), 'application/ld+json');
?>

<article class="uk-article" itemscope itemtype="https://schema.org/Article">
    <div class="uk-container uk-container-small">
        
        <div class="uk-flex uk-flex-middle uk-text-meta uk-margin-small-bottom">
            <span uk-icon="icon: calendar; ratio: 0.8"></span>
            <time class="uk-margin-small-left" datetime="<?php echo Factory::getDate($item->publish_up)->format('c'); ?>" itemprop="datePublished">
                <?php echo HTMLHelper::_('date', $item->publish_up, Text::_('DATE_FORMAT_LC3')); ?>
            </time>
            <span class="uk-margin-medium-left" uk-icon="icon: clock; ratio: 0.8"></span>
            <span class="uk-margin-small-left uk-text-bold"><?php echo $minutesToRead . ' ' . $minWord; ?></span>
        </div>

        <h1 class="uk-article-title uk-margin-remove-top" itemprop="headline">
            <?php echo $this->escape($item->title); ?>
        </h1>

        <?php echo $item->event->afterDisplayTitle; ?>
        <?php echo $item->event->beforeDisplayContent; ?>

        <div class="uk-grid-medium" uk-grid>
            <div class="uk-width-expand@m">
                
                <?php /* Главное фото / Fallback со srcset */ ?>
                <?php 
                    $mainD = $juImg->render($mainImgPath, ['w' => $sz['main']['w'], 'h' => $sz['main']['h'], 'q' => 80, 'f' => 'webp']);
                    $mainM = $juImg->render($mainImgPath, ['w' => $sz['mob']['w'],  'h' => $sz['mob']['h'],  'q' => 80, 'f' => 'webp']);
                    $base  = Uri::base(true) . '/';
                ?>
                <figure class="uk-margin-medium-bottom">
                    <picture>
                        <source srcset="<?php echo $base.$mainM; ?>" media="(max-width: 640px)">
                        <img src="<?php echo $base.$mainD; ?>" 
                             width="<?php echo $sz['main']['w']; ?>" height="<?php echo $sz['main']['h']; ?>" 
                             class="uk-border-rounded uk-box-shadow-medium" alt="main image" fetchpriority="high">
                    </picture>
                </figure>

                <div itemprop="articleBody" class="uk-article-body uk-dropcap">
                    <?php echo $articleBody; ?>
                </div>
            </div>
        </div>

        <hr class="uk-divider-icon">
        
        <div class="uk-flex uk-flex-between uk-flex-middle">
            <ul class="uk-iconnav">
                <li><a href="https://wa.me/<?php echo Text::_('SEO_TEL_WHATSAPP'); ?>" uk-icon="whatsapp" title="WhatsApp"></a></li>
                <li><a href="https://t.me/share/url?url=<?php echo urlencode(Uri::getInstance()->toString()); ?>" uk-icon="telegram" title="Telegram"></a></li>
            </ul>
            <div class="uk-text-meta">
                <span uk-icon="bolt"></span> <?php echo Text::sprintf('COM_CONTENT_ARTICLE_HITS', $item->hits); ?>
            </div>
        </div>

        <?php echo $item->event->afterDisplayContent; ?>
    </div>
</article>

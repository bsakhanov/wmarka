<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * @version     Joomla 6 WMARKA ULTRA EDITION (Full SEO + CLS Fix + JUImage)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Router\Route;

/** @var Joomla\Component\Content\Site\View\Article\HtmlView $this */

$app       = Factory::getApplication();
$document  = Factory::getDocument();
$params    = $this->item->params;
$item      = $this->item;
$images    = json_decode($item->images);
$sitename  = Factory::getConfig()->get('sitename');

// --- 1. ИНИЦИАЛИЗАЦИЯ JUImage (Обработка картинок) ---
require_once(JPATH_SITE . '/libraries/juimage/vendor/autoload.php');
$juImg = new JUImage\Image();
$qValue = '75'; // Качество WebP

// Размеры для srcset и CLS
$sz = [
    'main' => ['w' => 1200, 'h' => 630], // Главное фото
    'text' => ['w' => 800,  'h' => 500], // Фото в тексте
    'mob'  => ['w' => 480,  'h' => 300]  // Мобильные
];

// --- 2. SEO ЛОГИКА: Кавычки и Мета-данные ---
$fixQuotes = function ($text) {
    return preg_replace_callback('#(([\"]{2,})|(?![^\W])(\"))|([^\s][\"]+(?![\w]))#u', function ($matches) {
        if (count($matches) === 3) return "«»";
        return (isset($matches[1]) && $matches[1]) ? "«" : "»";
    }, $text);
};

// Установка Title и Description
$document->setTitle(strip_tags(trim($fixQuotes($item->title) . ' | ' . $sitename)));
$metaDesc = $item->metadesc ?: HTMLHelper::_('string.truncate', strip_tags($item->text), 160, true, false);
$document->setMetadata('description', $fixQuotes($metaDesc));

// --- 3. ВРЕМЯ ЧТЕНИЯ (с правильными склонениями) ---
$wordCount = preg_match_all('/[\p{L}\p{N}]+/u', strip_tags($item->text), $matches);
$minutesToRead = ceil($wordCount / 180) ?: 1;
$minWord = Text::_('COM_CCK_MINUT');
if ($minutesToRead % 10 == 1 && $minutesToRead % 100 != 11) $minWord = Text::_('COM_CCK_MINUTE');
elseif ($minutesToRead % 10 >= 2 && $minutesToRead % 10 <= 4 && ($minutesToRead % 100 < 10 || $minutesToRead % 100 >= 20)) $minWord = Text::_('COM_CCK_MINUTES');

// --- 4. ЛОГИКА ВЕРТИКАЛЬНОГО ВИДЕО (TikTok / Shorts) ---
$vVideoHtml = '';
if (!empty($item->jcfields)) {
    foreach ($item->jcfields as $field) {
        $val = trim($field->rawvalue ?? '');
        if (empty($val)) continue;
        if (str_contains($val, 'tiktok.com') && preg_match('/video\/(\d+)/', $val, $mT)) {
            $vVideoHtml = '<div class="uk-cover-container uk-border-rounded uk-margin-bottom" style="height: 540px;">
                <iframe src="https://www.tiktok.com/embed/v2/'.$mT[1].'" class="uk-cover" frameborder="0" allowfullscreen></iframe>
            </div>';
            break;
        }
    }
}

// --- 5. ОБРАБОТКА ТЕКСТА (Srcset для всех фото) ---
$articleBody = preg_replace_callback('/<img [^>]*src=["\']([^"\']+)["\'][^>]*>/i', function($m) use ($juImg, $qValue, $sz) {
    $src = ltrim($m[1], '/');
    if (!file_exists(JPATH_SITE . '/' . $src)) return $m[0];
    
    $dImg = $juImg->render($src, ['w' => $sz['text']['w'], 'h' => $sz['text']['h'], 'q' => $qValue, 'f' => 'webp']);
    $mImg = $juImg->render($src, ['w' => $sz['mob']['w'],  'h' => $sz['mob']['h'],  'q' => $qValue, 'f' => 'webp']);
    $base = Uri::base(true) . '/';

    return '<figure class="uk-margin-medium-bottom"><picture>
                <source srcset="'.$base.$mImg.'" media="(max-width: 640px)">
                <img src="'.$base.$dImg.'" width="'.$sz['text']['w'].'" height="'.$sz['text']['h'].'" class="uk-border-rounded" alt="article image" loading="lazy">
            </picture></figure>';
}, $item->text);

// --- 6. OPEN GRAPH & JSON-LD ---
$ogImg = '';
if ($img = ($images->image_fulltext ?: $images->image_intro)) {
    $ogR = $juImg->render($img, ['w' => 1200, 'h' => 630, 'q' => 80, 'f' => 'jpg', 'fit' => 'cover']);
    $ogImg = Uri::root() . ltrim($ogR, '/');
}
$document->setMetadata('og:title', $fixQuotes($item->title));
$document->setMetadata('og:image', $ogImg);
$document->setMetadata('og:locale', Text::_('OG_LANG'));

$jsonLd = [
    "@context" => "https://schema.org",
    "@type" => "NewsArticle",
    "headline" => $item->title,
    "image" => [$ogImg],
    "datePublished" => Factory::getDate($item->publish_up)->format('c'),
    "author" => [["@type" => "Person", "name" => $item->author_name ?: $sitename]]
];
$document->addScriptDeclaration(json_encode($jsonLd, JSON_UNESCAPED_UNICODE), 'application/ld+json');
?>

<article class="uk-article" itemscope itemtype="https://schema.org/Article">
    <div class="uk-container uk-container-small">
        
        <?php /* Мета-шапка */ ?>
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

        <div class="uk-grid-medium" uk-grid>
            <?php /* Сайдбар для видео */ ?>
            <?php if ($vVideoHtml) : ?>
                <div class="uk-width-1-3@m uk-flex-last@m">
                    <?php echo $vVideoHtml; ?>
                </div>
            <?php endif; ?>

            <div class="uk-width-expand@m">
                <?php /* Главное фото со srcset */ ?>
                <?php if ($img) : 
                    $mainD = $juImg->render($img, ['w' => $sz['main']['w'], 'h' => $sz['main']['h'], 'q' => 80, 'f' => 'webp']);
                    $mainM = $juImg->render($img, ['w' => $sz['mob']['w'],  'h' => $sz['mob']['h'],  'q' => 80, 'f' => 'webp']);
                    $base  = Uri::base(true) . '/';
                ?>
                    <figure class="uk-margin-medium-bottom">
                        <picture>
                            <source srcset="<?php echo $base.$mainM; ?>" media="(max-width: 640px)">
                            <img src="<?php echo $base.$mainD; ?>" width="<?php echo $sz['main']['w']; ?>" height="<?php echo $sz['main']['h']; ?>" 
                                 class="uk-border-rounded uk-box-shadow-medium" alt="main image" fetchpriority="high">
                        </picture>
                    </figure>
                <?php endif; ?>

                <div itemprop="articleBody" class="uk-article-body uk-dropcap">
                    <?php echo $articleBody; ?>
                </div>
            </div>
        </div>

        <?php /* Футер статьи: Теги и Поделиться */ ?>
        <hr class="uk-divider-icon">
        
        <div class="uk-flex uk-flex-between uk-flex-middle uk-flex-wrap">
            <div class="uk-margin-small">
                <ul class="uk-iconnav">
                    <li><a href="https://wa.me/<?php echo Text::_('SEO_TEL_WHATSAPP'); ?>" uk-icon="whatsapp" title="WhatsApp"></a></li>
                    <li><a href="https://t.me/share/url?url=<?php echo urlencode(Uri::getInstance()->toString()); ?>" uk-icon="telegram" title="Telegram"></a></li>
                </ul>
            </div>
            <div class="uk-text-meta">
                <span uk-icon="bolt"></span> <?php echo Text::sprintf('COM_CONTENT_ARTICLE_HITS', $item->hits); ?>
            </div>
        </div>

        <?php echo $item->event->afterDisplayContent; ?>
    </div>
</article>

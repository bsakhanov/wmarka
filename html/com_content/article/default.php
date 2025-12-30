<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * @version     Joomla 6 WMARKA ULTRA (Full SEO + CLS Fix + JUImage + Responsive Text Images)
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

// --- 1. НАСТРОЙКА JUImage ---
require_once(JPATH_SITE . '/libraries/juimage/vendor/autoload.php');
$juImg = new JUImage\Image();
$qValue = '75'; 

// Конфигурация размеров для srcset
$sz = [
    'main' => ['w' => 1200, 'h' => 630], // Главное фото
    'text' => ['w' => 800,  'h' => 500], // Фото в тексте (Десктоп)
    'mob'  => ['w' => 480,  'h' => 300]  // Мобильные версии
];

// --- 2. SEO ЛОГИКА (Кавычки) ---
$fixQuotes = function ($text) {
    return preg_replace_callback('#(([\"]{2,})|(?![^\W])(\"))|([^\s][\"]+(?![\w]))#u', function ($m) {
        if (count($m) === 3) return "«»";
        return (isset($m[1]) && $m[1]) ? "«" : "»";
    }, $text);
};

// Заголовки и Мета
$document->setTitle(strip_tags(trim($fixQuotes($item->title) . ' | ' . $sitename)));
$metaDesc = $item->metadesc ?: HTMLHelper::_('string.truncate', strip_tags($item->text), 160, true, false);
$document->setMetadata('description', $fixQuotes($metaDesc));

// --- 3. ОБРАБОТКА ИЗОБРАЖЕНИЙ ВНУТРИ ТЕКСТА ---
$articleBody = preg_replace_callback('/<img [^>]*src=["\']([^"\']+)["\'][^>]*>/i', function($m) use ($juImg, $qValue, $sz) {
    $src = ltrim($m[1], '/');
    if (!file_exists(JPATH_SITE . '/' . $src)) return $m[0]; // Если файла нет, возвращаем как было
    
    // Генерируем WebP версии для десктопа и мобилок
    $dImg = $juImg->render($src, ['w' => $sz['text']['w'], 'h' => $sz['text']['h'], 'q' => $qValue, 'f' => 'webp']);
    $mImg = $juImg->render($src, ['w' => $sz['mob']['w'],  'h' => $sz['mob']['h'],  'q' => $qValue, 'f' => 'webp']);
    $base = Uri::base(true) . '/';

    // Возвращаем адаптивную разметку с srcset для CLS Fix
    return '<figure class="uk-margin-medium-bottom">
                <picture>
                    <source srcset="'.$base.$mImg.'" media="(max-width: 640px)">
                    <source srcset="'.$base.$dImg.'">
                    <img src="'.$base.$dImg.'" 
                         width="'.$sz['text']['w'].'" 
                         height="'.$sz['text']['h'].'" 
                         class="uk-border-rounded" alt="image" loading="lazy">
                </picture>
            </figure>';
}, $item->text);

// --- 4. ВРЕМЯ ЧТЕНИЯ ---
$wordCount = preg_match_all('/[\p{L}\p{N}]+/u', strip_tags($item->text), $matches);
$minutesToRead = ceil($wordCount / 180) ?: 1;
$minWord = Text::_('COM_CCK_MINUT');
if ($minutesToRead % 10 == 1 && $minutesToRead % 100 != 11) $minWord = Text::_('COM_CCK_MINUTE');
elseif ($minutesToRead % 10 >= 2 && $minutesToRead % 10 <= 4 && ($minutesToRead % 100 < 10 || $minutesToRead % 100 >= 20)) $minWord = Text::_('COM_CCK_MINUTES');

?>

<article class="uk-article" itemscope itemtype="https://schema.org/Article">
    <div class="uk-container uk-container-small">
        
        <?php /* Мета-данные */ ?>
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

        <?php // СИСТЕМНОЕ СОБЫТИЕ: onContentAfterTitle ?>
        <?php echo $item->event->afterDisplayTitle; ?>

        <?php // СИСТЕМНОЕ СОБЫТИЕ: onContentBeforeDisplay ?>
        <?php echo $item->event->beforeDisplayContent; ?>

        <div class="uk-grid-medium" uk-grid>
            <div class="uk-width-expand@m">
                
                <?php /* Главное фото со srcset */ ?>
                <?php if ($img = ($images->image_fulltext ?: $images->image_intro)) : 
                    $mainD = $juImg->render($img, ['w' => $sz['main']['w'], 'h' => $sz['main']['h'], 'q' => 80, 'f' => 'webp']);
                    $mainM = $juImg->render($img, ['w' => $sz['mob']['w'],  'h' => $sz['mob']['h'],  'q' => 80, 'f' => 'webp']);
                    $base  = Uri::base(true) . '/';
                ?>
                    <figure class="uk-margin-medium-bottom">
                        <picture>
                            <source srcset="<?php echo $base.$mainM; ?>" media="(max-width: 640px)">
                            <img src="<?php echo $base.$mainD; ?>" 
                                 width="<?php echo $sz['main']['w']; ?>" 
                                 height="<?php echo $sz['main']['h']; ?>" 
                                 class="uk-border-rounded uk-box-shadow-medium" alt="main" fetchpriority="high">
                        </picture>
                    </figure>
                <?php endif; ?>

                <?php /* ТЕКСТ СТАТЬИ (уже обработанный через JUImage) */ ?>
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

        <?php // СИСТЕМНОЕ СОБЫТИЕ: onContentAfterDisplay ?>
        <?php echo $item->event->afterDisplayContent; ?>
        
    </div>
</article>

<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * @version     WMARKA ULTRA (Local + WebP q=35 + srcset + CLS Fix)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Content\Site\Helper\RouteHelper;

/**
 * $displayData может быть объектом $item или массивом ['item' => $item, 'w' => 390, 'h' => 260]
 */
$item = is_array($displayData) ? ($displayData['item'] ?? null) : $displayData;
if (!$item) return;

$params = $item->params;
$images = json_decode($item->images);

// --- НАСТРОЙКИ ПУТЕЙ ---
$defaultImageFallback = 'media/templates/site/wmarka/images/zamena.jpg';
$baseUrl = Uri::base(true) . '/';

// --- НАСТРОЙКИ ТИПОРАЗМЕРОВ ---
// Стандарт для блога 390x260, если иное не передано в вызове
$w = (isset($displayData['w'])) ? (int)$displayData['w'] : 390;
$h = (isset($displayData['h'])) ? (int)$displayData['h'] : 260;
$mobW = round($w / 1.5); 
$mobH = round($h / 1.5);

// --- ВЫБОР ИСТОЧНИКА ---
$imageToRender = $defaultImageFallback;
$imageAlt = $item->title;

if (!empty($images->image_intro)) {
    $imageToRender = preg_replace('/#joomlaImage?([^\'" >]+)/', '', $images->image_intro);
    $imageAlt = $images->image_intro_caption ?: $item->title;
} elseif (!empty($images->image_fulltext)) {
    $imageToRender = preg_replace('/#joomlaImage?([^\'" >]+)/', '', $images->image_fulltext);
}

// Проверка физического наличия файла
if (!file_exists(JPATH_ROOT . '/' . ltrim($imageToRender, '/'))) {
    $imageToRender = $defaultImageFallback;
}

// --- ИНИЦИАЛИЗАЦИЯ JUImage ---
require_once(JPATH_SITE . '/libraries/juimage/vendor/autoload.php');
$juImg = new JUImage\Image();

// Рендерим локальные WebP версии с качеством q=35
$options = [
    'w'      => $w,
    'h'      => $h,
    'q'      => '35', 
    'f'      => 'webp',
    'cache'  => 'img',
    'fit'    => 'cover'
];

$thumbD = $juImg->render($imageToRender, $options);
$thumbM = $juImg->render($imageToRender, array_merge($options, ['w' => $mobW, 'h' => $mobH]));

// Ссылка на статью
$link = false;
if ($params->get('link_titles', 1) && $params->get('access-view')) {
    $link = Route::_(RouteHelper::getArticleRoute($item->slug, $item->catid, $item->language));
}
?>

<div class="uk-card-media-top uk-inline-clip uk-transition-toggle uk-border-rounded">
    <?php if ($link) : ?>
        <a href="<?php echo $link; ?>" aria-label="<?php echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8'); ?>">
    <?php endif; ?>

        <picture>
            <?php /* Адаптивность: srcset для мобильных (локальный путь) */ ?>
            <source srcset="<?php echo $baseUrl . ltrim($thumbM, '/'); ?>" media="(max-width: 640px)">
            
            <?php /* Основное изображение (локальный путь) */ ?>
            <img src="<?php echo $baseUrl . ltrim($thumbD, '/'); ?>" 
                 width="<?php echo $w; ?>" 
                 height="<?php echo $h; ?>" 
                 class="uk-transition-scale-up uk-transition-opaque uk-border-rounded" 
                 alt="<?php echo htmlspecialchars($imageAlt, ENT_QUOTES, 'UTF-8'); ?>" 
                 itemprop="thumbnailUrl" 
                 loading="lazy">
        </picture>

    <?php if ($link) : ?>
        </a>
    <?php endif; ?>
</div>

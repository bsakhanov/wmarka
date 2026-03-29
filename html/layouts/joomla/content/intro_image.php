<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * @version     WMARKA ULTRA (PHP 8.4 Fixed + WebP + srcset)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;

// Универсальное извлечение объекта статьи (может быть массивом или объектом)
$item = is_array($displayData) ? ($displayData['item'] ?? null) : $displayData;
if (!$item) return;

$params = $item->params;

// ИСПРАВЛЕНИЕ: Декодируем в массив (true), чтобы избежать ошибки stdClass
$images = json_decode($item->images, true) ?: [];

$defaultImageFallback = 'media/templates/site/wmarka/images/zamena.jpg';
$baseUrl = Uri::base(true) . '/';

// ИСПРАВЛЕНИЕ: Безопасное получение размеров (объект или массив)
$w = (int)(is_array($displayData) ? ($displayData['w'] ?? 390) : ($displayData->w ?? 390));
$h = (int)(is_array($displayData) ? ($displayData['h'] ?? 260) : ($displayData->h ?? 260));
$mobW = round($w / 1.5); 
$mobH = round($h / 1.5);

$imageToRender = $defaultImageFallback;
$imageAlt      = $item->title;

// Работаем с массивом $images['...']
if (!empty($images['image_intro'])) {
    $imageToRender = preg_replace('/#joomlaImage?([^\'" >]+)/', '', $images['image_intro']);
    $imageAlt      = ($images['image_intro_caption'] ?? '') ?: $item->title;
} elseif (!empty($images['image_fulltext'])) {
    $imageToRender = preg_replace('/#joomlaImage?([^\'" >]+)/', '', $images['image_fulltext']);
}

if (!file_exists(JPATH_ROOT . '/' . ltrim($imageToRender, '/'))) {
    $imageToRender = $defaultImageFallback;
}

require_once(JPATH_SITE . '/libraries/juimage/vendor/autoload.php');
$juImg = new JUImage\Image();

$options = ['w' => $w, 'h' => $h, 'q' => '35', 'f' => 'webp', 'cache' => 'img', 'fit' => 'cover'];
$thumbD = $juImg->render($imageToRender, $options);
$thumbM = $juImg->render($imageToRender, array_merge($options, ['w' => $mobW, 'h' => $mobH]));

$link = ($params->get('link_titles', 1) && $params->get('access-view')) 
    ? Route::_(RouteHelper::getArticleRoute($item->slug, $item->catid, $item->language)) : false;
?>

<div class="uk-card-media-top uk-inline-clip uk-transition-toggle uk-border-rounded">
    <?php if ($link) : ?><a href="<?php echo $link; ?>" aria-label="<?php echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8'); ?>"><?php endif; ?>
        <picture>
            <source srcset="<?php echo $baseUrl . ltrim($thumbM, '/'); ?>" media="(max-width: 640px)">
            <img src="<?php echo $baseUrl . ltrim($thumbD, '/'); ?>" 
                 width="<?php echo $w; ?>" height="<?php echo $h; ?>" 
                 class="uk-transition-scale-up uk-transition-opaque uk-border-rounded" 
                 alt="<?php echo htmlspecialchars($imageAlt, ENT_QUOTES, 'UTF-8'); ?>" 
                 itemprop="thumbnailUrl" loading="lazy">
        </picture>
    <?php if ($link) : ?></a><?php endif; ?>
</div>
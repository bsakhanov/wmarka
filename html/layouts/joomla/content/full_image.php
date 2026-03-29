<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * @version     WMARKA FULL IMAGE (PHP 8.4 Fixed + Ultra Logic)
 * @author      Partner Programmer & Beibit Sakhanov
 */

defined('_JEXEC') or die;

use Joomla\CMS\Uri\Uri;

// Универсальное извлечение объекта (как в твоем intro_image)
$item = is_array($displayData) ? ($displayData['item'] ?? null) : $displayData;
if (!$item) return;

// Декодируем изображения в массив (true)
$images = json_decode($item->images, true) ?: [];

$defaultImageFallback = 'media/templates/site/wmarka/images/zamena.jpg';
$baseUrl = Uri::base(true) . '/';

// Размеры для полного изображения
$w = 900; 
$h = 600;
$mobW = 390;
$mobH = 260;

$imageToRender = $defaultImageFallback;
$imageAlt      = $item->title;

/**
 * Логика выбора изображения: 
 * Для полнотекстового макета сначала ищем image_fulltext, 
 * если нет - берем image_intro (как в твоем рабочем примере).
 */
if (!empty($images['image_fulltext'])) {
    $imageToRender = preg_replace('/#joomlaImage?([^\'" >]+)/', '', $images['image_fulltext']);
    $imageAlt      = ($images['image_fulltext_caption'] ?? '') ?: $item->title;
} elseif (!empty($images['image_intro'])) {
    $imageToRender = preg_replace('/#joomlaImage?([^\'" >]+)/', '', $images['image_intro']);
    $imageAlt      = ($images['image_intro_caption'] ?? '') ?: $item->title;
}

// Проверка физического наличия
if (!file_exists(JPATH_ROOT . '/' . ltrim($imageToRender, '/'))) {
    $imageToRender = $defaultImageFallback;
}

// Подключаем JUImage
require_once(JPATH_SITE . '/libraries/juimage/vendor/autoload.php');
$juImg = new JUImage\Image();

/** * ПАРАМЕТРЫ КАК В ТВОЕМ INTRO_IMAGE:
 * Используем раздельный вызов: render($path, $options)
 */
$options = [
    'w'     => $w, 
    'h'     => $h, 
    'q'     => '65', 
    'f'     => 'webp', 
    'cache' => 'img',   // Кропы в /img/
    'fit'   => 'cover'  // Метод обрезки
];

// Генерация кропов (передаем ПУТЬ СТРОКОЙ первым аргументом)
$thumbD = $juImg->render((string)$imageToRender, $options);
$thumbM = $juImg->render((string)$imageToRender, array_merge($options, ['w' => $mobW, 'h' => $mobH]));
?>

<figure class="article-full-image uk-margin-remove" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
    <picture>
        <?php /* Мобильная версия */ ?>
        <source srcset="<?php echo $baseUrl . ltrim((string)$thumbM, '/'); ?>" media="(max-width: 640px)">
        
        <?php /* Основное изображение */ ?>
        <img src="<?php echo $baseUrl . ltrim((string)$thumbD, '/'); ?>" 
             width="<?php echo $w; ?>" 
             height="<?php echo $h; ?>" 
             alt="<?php echo htmlspecialchars((string)$imageAlt, ENT_QUOTES, 'UTF-8'); ?>" 
             class="uk-border-rounded uk-box-shadow-medium"
             fetchpriority="high" 
             loading="eager"
             itemprop="url">
    </picture>

    <?php if (!empty($images['image_fulltext_caption']) || !empty($images['image_intro_caption'])) : ?>
        <figcaption class="uk-text-meta uk-margin-small uk-text-center">
            <span uk-icon="icon: camera; ratio: 0.7" class="uk-margin-xsmall-right"></span> 
            <?php echo htmlspecialchars((string)($images['image_fulltext_caption'] ?: $images['image_intro_caption']), ENT_COMPAT, 'UTF-8'); ?>
        </figcaption>
    <?php endif; ?>
</figure>
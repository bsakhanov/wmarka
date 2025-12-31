<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * @version     WMARKA FULL IMAGE (Intro Source + WebP q=35 + CLS Fix)
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;

/** @var object $displayData Обьект статьи */
$params = $displayData->params;
$images = json_decode($displayData->images);

// Используем Intro Image в качестве основного источника для Full Image
if (empty($images->image_intro)) {
    return;
}

// Настройка путей и JUImage
require_once(JPATH_SITE . '/libraries/juimage/vendor/autoload.php');
$juImg = new JUImage\Image();
$baseUrl = Uri::base(true) . '/';

// Очистка пути от системных хешей Joomla
$cleanSrc = preg_replace('/#joomlaImage?([^\'" >]+)/', '', $images->image_intro);

// Проверка физического наличия файла
if (!file_exists(JPATH_ROOT . '/' . ltrim($cleanSrc, '/'))) {
    return;
}

// --- ПАРАМЕТРЫ ОБРАБОТКИ ---
$qValue = '35'; // Ваша установка агрессивного сжатия
$deskSize = ['w' => '750', 'h' => '500'];
$mobSize  = ['w' => '360', 'h' => '240'];

// Рендерим локальные WebP версии
$thumbDesktop = $juImg->render($cleanSrc, [
    'w' => $deskSize['w'], 'h' => $deskSize['h'], 'q' => $qValue, 'f' => 'webp', 'cache' => 'img', 'fit' => 'cover'
]);

$thumbMobile = $juImg->render($cleanSrc, [
    'w' => $mobSize['w'],  'h' => $mobSize['h'],  'q' => $qValue, 'f' => 'webp', 'cache' => 'img', 'fit' => 'cover'
]);
?>

<figure class="article-full-image uk-margin-medium-bottom" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
    <picture>
        <?php /* Мобильная версия (srcset) до 640px */ ?>
        <source srcset="<?php echo $baseUrl . ltrim($thumbMobile, '/'); ?>" 
                media="(max-width: 640px)" 
                type="image/webp"
                width="<?php echo $mobSize['w']; ?>" 
                height="<?php echo $mobSize['h']; ?>">

        <?php /* Основное изображение (Desktop) */ ?>
        <img src="<?php echo $baseUrl . ltrim($thumbDesktop, '/'); ?>" 
             width="<?php echo $deskSize['w']; ?>" 
             height="<?php echo $deskSize['h']; ?>" 
             alt="<?php echo htmlspecialchars($displayData->title, ENT_QUOTES, 'UTF-8'); ?>" 
             class="uk-border-rounded uk-box-shadow-medium"
             fetchpriority="high" 
             loading="eager"
             itemprop="url">
    </picture>

    <?php /* Подпись к изображению */ ?>
    <?php if (!empty($images->image_intro_caption)) : ?>
        <figcaption class="uk-text-meta uk-margin-small-top uk-text-center">
            <span uk-icon="icon: camera; ratio: 0.7"></span> 
            <?php echo htmlspecialchars($images->image_intro_caption, ENT_COMPAT, 'UTF-8'); ?>
        </figcaption>
    <?php endif; ?>

    <meta itemprop="width" content="<?php echo $deskSize['w']; ?>">
    <meta itemprop="height" content="<?php echo $deskSize['h']; ?>">
</figure>

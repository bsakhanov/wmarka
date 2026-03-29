<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_tags
 * @view        tags (Корневой список всех тегов)
 * @version     Joomla 6.x
 * @PHP         8.3 / 8.4
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

// Подключаем наши мощные инструменты
JLoader::register('JUImage', JPATH_LIBRARIES . '/juimage/JUImage.php');
require_once JPATH_THEMES . '/wmarka/php/Seo.php';

$showPageHeading = $this->params->get('show_page_heading', 1);
$pageHeading     = $this->params->get('page_heading', Text::_('JGLOBAL_TAGS'));
$showBaseDesc    = $this->params->get('show_base_description', 1);

// --- РЕЖИМ ПРОТОТИПИРОВАНИЯ ---
$isPrototyping  = true; 
$placeholderUrl = $this->params->get('tag_placeholder_service', 'https://placehold.co/{width}x{height}/EFEFEF/AAAAAA.png?text={text}');

// === 1. ПОДГОТОВКА ДАННЫХ И SEO ===
$seoTitle       = $pageHeading;
$seoDescription = $this->params->get('categories_description', '');
$seoImage       = '';
$catImageSrc    = $this->params->get('categories_image', '');
$finalImageSrc  = ''; // Картинка для вывода на странице (баннер)

if (!empty($catImageSrc)) {
    // 1. Картинка для страницы (широкий баннер в WebP)
    $finalImageSrc = JUImage::renderThumb($catImageSrc, 1200, 400);
    
    // 2. Картинка строго для соцсетей (1200x630, отключаем WebP для совместимости с парсерами VK/TG)
    $juImg = new JUImage();
    $ogThumb = $juImg->render($catImageSrc, ['w' => 1200, 'h' => 630, 'webp' => false, 'zc' => 'C']);
    if ($ogThumb && !empty($ogThumb->src)) {
        $seoImage = $ogThumb->src;
    }
} elseif ($isPrototyping && $showBaseDesc) {
    // Генерируем плейсхолдер, если картинки нет, но включен режим прототипа
    $finalImageSrc = str_replace(
        ['{width}', '{height}', '{text}'],
        [1200, 400, urlencode('Обложка раздела: ' . $pageHeading)],
        $placeholderUrl
    );
    $seoImage = $finalImageSrc; // Для прототипа отдаем плейсхолдер и в соцсети
}

// Запускаем SEO-магию!
WmarkaSeo::setPageMeta($seoTitle, $seoDescription, $seoImage);

// === 2. ПОДГОТОВКА ОПИСАНИЯ ===
$finalDescText = HTMLHelper::_('content.prepare', $seoDescription, '', 'com_tags.tags');
if (empty($finalDescText) && $isPrototyping && $showBaseDesc) {
    // UIkit заглушка для верстки
    $finalDescText = '
        <div class="uk-alert-primary uk-margin-bottom" uk-alert>
            <p class="uk-text-bold uk-margin-remove-bottom">
                <span uk-icon="info" class="uk-margin-small-right"></span>Режим прототипа
            </p>
            <p class="uk-margin-small-top">Здесь будет размещено SEO-оптимизированное описание корневой директории тегов. Этот текст необходим для правильной индексации раздела поисковыми системами.</p>
            <ul class="uk-list uk-list-bullet">
                <li>Ключевые слова раздела.</li>
                <li>Внутренняя перелинковка на важные материалы.</li>
                <li>Объяснение навигации для пользователя.</li>
            </ul>
        </div>';
}
?>

<div class="com-tags-tags tags-list uk-margin-large-bottom">

    <?php // Главный заголовок ?>
    <?php if ($showPageHeading) : ?>
        <h1 class="uk-heading-small uk-margin-medium-bottom uk-text-center">
            <?php echo $this->escape($pageHeading); ?>
        </h1>
    <?php endif; ?>

    <?php // Блок описания (выводится, если есть реальные данные или включен прототип) ?>
    <?php if ($showBaseDesc && (!empty($finalImageSrc) || !empty($finalDescText))) : ?>
        <div class="uk-panel uk-margin-medium-bottom uk-text-break">
            
            <?php if (!empty($finalImageSrc)) : ?>
                <img src="<?php echo $this->escape($finalImageSrc); ?>" 
                     class="uk-align-left@m uk-margin-remove-adjacent uk-border-rounded uk-box-shadow-small" 
                     loading="lazy" 
                     alt="<?php echo $this->escape($pageHeading); ?>">
            <?php endif; ?>

            <?php echo $finalDescText; ?>
            
        </div>
        <hr class="uk-divider-icon uk-margin-medium-top uk-margin-medium-bottom">
    <?php endif; ?>

    <?php // Сетка тегов (загружает default_items.php) ?>
    <?php echo $this->loadTemplate('items'); ?>

</div>
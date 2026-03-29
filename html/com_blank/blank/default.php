<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_blank
 * @view        default (Базовая страница)
 * @version     Joomla 6.x
 * @PHP         8.3 / 8.4
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;

// Подключаем наш арсенал
JLoader::register('JUImage', JPATH_LIBRARIES . '/juimage/JUImage.php');
require_once JPATH_THEMES . '/wmarka/php/Seo.php';

// Базовые параметры
$showPageHeading = $this->params->get('show_page_heading', 1);
$pageHeading     = $this->params->get('page_heading', 'Новая страница');

// --- РЕЖИМ ПРОТОТИПИРОВАНИЯ ---
$isPrototyping  = true; 
$placeholderUrl = $this->params->get('placeholder_service', 'https://placehold.co/{width}x{height}/EFEFEF/AAAAAA.png?text={text}');

// === 1. ПОДГОТОВКА ДАННЫХ И SEO ===
// В com_blank данные обычно берутся из параметров пункта меню или кастомных полей
$seoTitle       = $pageHeading;
$seoDescription = $this->params->get('page_description', '');
$pageImageSrc   = $this->params->get('page_image', '');

$finalImageSrc  = ''; // Картинка для страницы
$seoImage       = ''; // Картинка для Open Graph

if (!empty($pageImageSrc)) {
    // Картинка для контента (баннер)
    $finalImageSrc = JUImage::renderThumb($pageImageSrc, 1200, 500);
    
    // Картинка для соцсетей
    $juImg = new JUImage();
    $ogThumb = $juImg->render($pageImageSrc, ['w' => 1200, 'h' => 630, 'webp' => false, 'zc' => 'C']);
    if ($ogThumb && !empty($ogThumb->src)) {
        $seoImage = $ogThumb->src;
    }
} elseif ($isPrototyping) {
    // Плейсхолдер для верстки
    $finalImageSrc = str_replace(
        ['{width}', '{height}', '{text}'],
        [1200, 500, urlencode('Обложка: ' . $pageHeading)],
        $placeholderUrl
    );
    $seoImage = $finalImageSrc;
}

// Запускаем SEO
WmarkaSeo::setPageMeta($seoTitle, $seoDescription, $seoImage);

// === 2. ПОДГОТОВКА КОНТЕНТА ===
// Текст страницы (если он задан в параметрах пункта меню)
$pageContent = HTMLHelper::_('content.prepare', $this->params->get('page_content', ''), '', 'com_blank.default');

if (empty($pageContent) && $isPrototyping) {
    $pageContent = '
        <p class="uk-text-lead">Это вводный абзац (lead). Он автоматически получает больший размер шрифта для привлечения внимания пользователя.</p>
        <p>Здесь будет располагаться основной контент страницы, выводимый компонентом com_blank. Вы можете сверстать здесь лендинг, сложную форму или кастомный калькулятор, используя сетку UIkit 3.</p>
        <div class="uk-child-width-1-2@m uk-margin-medium-top" uk-grid>
            <div>
                <ul class="uk-list uk-list-check uk-margin-remove-bottom">
                    <li>Интеграция с JUImage</li>
                    <li>SEO оптимизация из коробки</li>
                </ul>
            </div>
            <div>
                <ul class="uk-list uk-list-check uk-margin-remove-bottom">
                    <li>Адаптивная сетка UIkit</li>
                    <li>Строгий PHP 8.4</li>
                </ul>
            </div>
        </div>';
}
?>

<div class="com-blank-default uk-container uk-container-small uk-margin-large-bottom uk-margin-large-top">

    <article class="uk-article">

        <?php // Главный заголовок ?>
        <?php if ($showPageHeading) : ?>
            <h1 class="uk-article-title uk-margin-medium-bottom">
                <?php echo $this->escape($pageHeading); ?>
            </h1>
        <?php endif; ?>

        <?php // Обложка страницы (Hero Image) ?>
        <?php if (!empty($finalImageSrc)) : ?>
            <div class="uk-margin-medium-bottom">
                <img src="<?php echo $this->escape($finalImageSrc); ?>" 
                     class="uk-border-rounded uk-box-shadow-small uk-width-1-1" 
                     loading="lazy" 
                     alt="<?php echo $this->escape($pageHeading); ?>">
            </div>
        <?php endif; ?>

        <?php // Мета-данные (Опционально: дата, автор) ?>
        <?php if ($isPrototyping) : ?>
            <p class="uk-article-meta">
                Опубликовано <time datetime="<?php echo date('c'); ?>"><?php echo date('d.m.Y'); ?></time> 
                в категории <a href="#">Кастомные страницы</a>.
            </p>
        <?php endif; ?>

        <?php // Основной контент страницы ?>
        <div class="uk-panel uk-text-break uk-margin-medium-top">
            <?php echo $pageContent; ?>
        </div>

    </article>

</div>
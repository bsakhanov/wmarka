<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_tags (Страница одного тега)
 * @version     Joomla 6.x
 * @PHP         8.3 / 8.4
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\Registry\Registry;

// Подключаем JUImage и наш SEO-хелпер
JLoader::register('JUImage', JPATH_LIBRARIES . '/juimage/JUImage.php');
require_once JPATH_THEMES . '/wmarka/php/Seo.php';

$app      = Factory::getApplication();
$document = $app->getDocument();
$juImg    = new JUImage();

HTMLHelper::addIncludePath(JPATH_COMPONENT . '/helpers');

$regexImageSrc = '/#joomlaImage?([^\" >]+)/';

// --- 1. Базовый Title ---
$pageTitle = '';
if (!empty($this->tags_title)) {
    $shortenedTagTitle = preg_replace("/^(\s*(\S+\s+){0,7}\S+).*/s", '$1', $this->tags_title);
    $pageTitle = strip_tags($shortenedTagTitle);
}

$showPageHeading = $this->params->get('show_page_heading', 0);
$pageHeading     = $this->params->get('page_heading', '');
$showTagTitle    = $this->params->get('show_tag_title', 1);

$tagHeadingTag   = ($showPageHeading && !empty($pageHeading)) ? 'h2' : 'h1';
$tagHeadingClass = ($tagHeadingTag === 'h1') ? 'uk-heading-small' : 'uk-h2';

$isSingleTag = (count($this->item) === 1);

// === 2. ИНТЕГРАЦИЯ SEO (Сбор данных для Seo.php) ===
$seoTitle       = $pageTitle ?: ($pageHeading ?: 'Теги');
$seoDescription = '';
$seoImage       = '';

if ($isSingleTag && !empty($this->item[0])) {
    $tagItem = $this->item[0];
    
    // Получаем описание тега (чистим от HTML для мета-тегов в Seo.php)
    $seoDescription = $tagItem->description ?? '';
    
    // Получаем картинку
    $images = new Registry($tagItem->images ?? '');
    $introImage = $images->get('image_intro');
    
    if (!empty($introImage)) {
        $cleanImagePath = preg_replace($regexImageSrc, '', $introImage);
        
        // Генерируем специальный размер для Open Graph (1200x630)
        // OG-картинки лучше делать в JPG, так как не все мессенджеры понимают WebP
        $ogThumb = $juImg->render($cleanImagePath, [
            'w'     => 1200, 
            'h'     => 630,
            'zc'    => 'C',
            'webp'  => false // Для соцсетей надежнее отдавать обычный формат
        ]);
        
        if ($ogThumb && !empty($ogThumb->src)) {
            $seoImage = $ogThumb->src; // Передаем путь к сгенерированной OG-картинке
        }
    }
}

// Вызываем наш хелпер!
WmarkaSeo::setPageMeta($seoTitle, $seoDescription, $seoImage);
?>

<div class="com-tags-tag category-list uk-margin-bottom">

    <?php // 1. Вывод главного заголовка страницы ?>
    <?php if ($showPageHeading && !empty($pageHeading)) : ?>
        <h1 class="uk-heading-small uk-margin-bottom">
            <?php echo $this->escape($pageHeading); ?>
        </h1>
    <?php endif; ?>

    <?php // 2. Вывод названия самого тега ?>
    <?php if ($showTagTitle) : ?>
        <<?php echo $tagHeadingTag; ?> class="<?php echo $tagHeadingClass; ?> uk-margin-bottom">
            <?php echo HTMLHelper::_('content.prepare', $this->tags_title, '', 'com_tags.tag'); ?>
        </<?php echo $tagHeadingTag; ?>>
    <?php endif; ?>

    <?php 
    // 3. БЛОК ОПИСАНИЯ И ИЗОБРАЖЕНИЯ КОНКРЕТНОГО ТЕГА (Твоя логика)
    if ($isSingleTag && !empty($this->item[0]) && ($this->params->get('tag_list_show_tag_image', 1) || $this->params->get('tag_list_show_tag_description', 1))) : 
        $tagItem = $this->item[0];
        // Безопасный парсинг JSON вместо json_decode
        $images  = new Registry($tagItem->images ?? ''); 
        $introImage = $images->get('image_intro');
    ?>
        <div class="tag-description uk-margin-medium-bottom">
            
            <?php // Изображение тега (Hero Banner) с адаптивным srcset ?>
            <?php if ($this->params->get('tag_list_show_tag_image', 1) && !empty($introImage)) : ?>
                <?php
                // Очищаем путь к картинке
                $cleanImagePath = preg_replace($regexImageSrc, '', $introImage);
                
                // Выносим общие параметры JUImage в массив, чтобы не дублировать код
                $juParams = [
                    'q'         => 65,
                    'zc'        => 'C',
                    'far'       => 'C',
                    'webp'      => true,
                    'webp_q'    => 60,
                    'webp_maxq' => 65,
                    'cache'     => 'img'
                ];

                // 1. Генерируем мобильную версию (до 767px)
                $thumbMobile = $juImg->render($cleanImagePath, array_merge($juParams, [
                    'w' => 768, 
                    'h' => 500
                ]));

                // 2. Генерируем десктопную версию (от 768px)
                $thumbDesktop = $juImg->render($cleanImagePath, array_merge($juParams, [
                    'w' => 1920, 
                    'h' => 720
                ]));
                ?>
                
                <?php if ($thumbDesktop && !empty($thumbDesktop->webp)) : ?>
                    <div class="uk-cover-container uk-height-medium uk-border-rounded uk-margin-bottom uk-overflow-hidden">
                        <picture>
                            <?php if ($thumbMobile) : ?>
                                <source media="(max-width: 767px)" type="image/webp" srcset="<?php echo $this->escape($thumbMobile->webp); ?>">
                                <?php if (!empty($thumbMobile->src)) : ?>
                                    <source media="(max-width: 767px)" srcset="<?php echo $this->escape($thumbMobile->src); ?>">
                                <?php endif; ?>
                            <?php endif; ?>
                            
                            <source media="(min-width: 768px)" type="image/webp" srcset="<?php echo $this->escape($thumbDesktop->webp); ?>">
                            
                            <img src="<?php echo $this->escape($thumbDesktop->src ?? $thumbDesktop->webp); ?>" 
                                 alt="<?php echo $this->escape($images->get('image_intro_alt', $tagItem->title)); ?>"
                                 loading="lazy" 
                                 itemprop="thumbnailUrl"
                                 uk-cover>
                        </picture>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php // Описание тега ?>
            <?php if ($this->params->get('tag_list_show_tag_description', 1) && !empty($tagItem->description)) : ?>
                <div class="uk-text-break" itemprop="description">
                    <?php echo HTMLHelper::_('content.prepare', $tagItem->description, '', 'com_tags.tag'); ?>
                </div>
            <?php endif; ?>

        </div>
    <?php endif; ?>

    <?php // 4. Загрузка шаблона для списка элементов ?>
    <?php echo $this->loadTemplate('items'); ?>

    <?php // 5. Пагинация ?>
    <?php if ($this->params->get('show_pagination') && $this->pagination->pagesTotal > 1) : ?>
        <div class="uk-margin-medium-top uk-flex uk-flex-between uk-flex-middle uk-flex-wrap">
            <div class="uk-pagination-container">
                <?php echo $this->pagination->getPagesLinks(['pagination' => 'uk-pagination']); ?>
            </div>
            <?php if ($this->params->get('show_pagination_results', 1)) : ?>
                <div class="uk-text-meta uk-margin-small-top uk-margin-remove-top@s">
                    <?php echo $this->pagination->getPagesCounter(); ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</div>
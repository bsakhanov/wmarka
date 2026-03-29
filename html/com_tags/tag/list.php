<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_tags (Список тегов)
 * @version     Joomla 6.x
 * @PHP         8.3 / 8.4
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\Registry\Registry;

JLoader::register('JUImage', JPATH_LIBRARIES . '/juimage/JUImage.php');
require_once JPATH_THEMES . '/wmarka/php/Seo.php'; // Подключаем класс

$isSingleTag = isset($this->item) && is_array($this->item) && count($this->item) === 1;
$htag = $this->params->get('show_page_heading') ? 'h2' : 'h1';

// === ИНТЕГРАЦИЯ SEO ===
$seoTitle       = $this->params->get('page_heading', $this->tags_title ?? Text::_('JGLOBAL_TAGS'));
$seoDescription = '';
$seoImage       = '';

// 1. Пытаемся взять данные из одиночного тега (если отфильтровано до одного)
if ($isSingleTag && !empty($this->item[0])) {
    $seoDescription = $this->item[0]->description ?? '';
    $images = new Registry($this->item[0]->images ?? '');
    $rawImage = $images->get('image_fulltext') ?: $images->get('image_intro');
    
    if (!empty($rawImage)) {
        $seoImage = JUImage::renderThumb($rawImage, 1200, 630);
    }
} 
// 2. Иначе берем общее описание списка из настроек меню
else {
    $seoDescription = $this->params->get('tag_list_description', '');
    $listImage = $this->params->get('tag_list_image', '');
    
    if (!empty($listImage)) {
        // Генерируем превью 1200x630 для шаринга
        $seoImage = JUImage::renderThumb($listImage, 1200, 630);
    }
}

// Запускаем установку мета-данных
WmarkaSeo::setPageMeta($seoTitle, $seoDescription, $seoImage);
?>

<div class="com-tags-tag-list tag-list uk-container uk-container-small uk-margin-auto uk-margin-large-bottom">

    <?php // 1. Главный заголовок страницы ?>
    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1 class="uk-heading-small uk-margin-medium-bottom uk-text-center">
            <?php echo $this->escape($this->params->get('page_heading')); ?>
        </h1>
    <?php endif; ?>

    <?php // 2. Заголовок тега/списка ?>
    <?php if ($this->params->get('show_tag_title', 1)) : ?>
        <?php $displayTitle = $isSingleTag ? ($this->item[0]->title ?? '') : ($this->tags_title ?? ''); ?>
        <?php $titleContext = $isSingleTag ? 'com_tags.tag' : 'com_tags.list'; ?>

        <?php if (!empty($displayTitle)) : ?>
            <<?php echo $htag; ?> class="<?php echo $htag === 'h1' ? 'uk-heading-small' : 'uk-h2'; ?> uk-margin-bottom uk-text-center">
                <?php echo HTMLHelper::_('content.prepare', $displayTitle, '', $titleContext); ?>
            </<?php echo $htag; ?>>
        <?php endif; ?>
    <?php endif; ?>

    <?php // 3. Описание и изображение для ОДИНОЧНОГО тега ?>
    <?php if ($isSingleTag && ($this->params->get('tag_list_show_tag_image', 1) || $this->params->get('tag_list_show_tag_description', 1))) : ?>
        <div class="tag-description uk-panel uk-margin-medium-bottom">
            <?php 
            $tagData = $this->item[0];
            $images  = new Registry($tagData->images ?? '');
            $fullImage = $images->get('image_fulltext');
            ?>

            <?php // Адаптивное изображение через JUImage ?>
            <?php if ($this->params->get('tag_list_show_tag_image', 1) && !empty($fullImage)) : ?>
                <?php 
                $altText = $images->get('image_fulltext_alt', $tagData->title);
                $imgThumb = JUImage::renderThumb($fullImage, 600, 0); // Генерируем WebP шириной 600px
                ?>
                <img src="<?php echo $this->escape($imgThumb); ?>" 
                     alt="<?php echo $this->escape($altText); ?>"
                     class="uk-align-left@m uk-margin-remove-adjacent uk-border-rounded"
                     loading="lazy"
                     itemprop="image">
            <?php endif; ?>

            <?php if ($this->params->get('tag_list_show_tag_description', 1) && !empty($tagData->description)) : ?>
                <div class="uk-text-break" itemprop="description">
                     <?php echo HTMLHelper::_('content.prepare', $tagData->description, '', 'com_tags.tag'); ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php // 4. Общее описание и изображение для СПИСКА тегов ?>
    <?php $showListDescriptionBlock = !$isSingleTag || ($isSingleTag && !$this->params->get('tag_list_show_tag_description', 1) && !$this->params->get('tag_list_show_tag_image', 1)); ?>
    <?php if ($showListDescriptionBlock && ($this->params->get('show_list_description', 1) || $this->params->get('show_description_image', 1))) : ?>
         <div class="tag-list-description uk-panel uk-margin-medium-bottom">
            
            <?php $listImage = $this->params->get('tag_list_image'); ?>
            <?php if ($this->params->get('show_description_image', 1) && !empty($listImage)) : ?>
                <?php $imgListThumb = JUImage::renderThumb($listImage, 600, 0); ?>
                <img src="<?php echo $this->escape($imgListThumb); ?>" 
                     alt="<?php echo $this->escape($this->params->get('tag_list_image_alt', '')); ?>"
                     class="uk-align-left@m uk-margin-remove-adjacent uk-border-rounded"
                     loading="lazy"
                     itemprop="image">
            <?php endif; ?>

            <?php if ($this->params->get('show_list_description', 1) && $this->params->get('tag_list_description', '') !== '') : ?>
                 <div class="uk-text-break">
                    <?php echo HTMLHelper::_('content.prepare', $this->params->get('tag_list_description'), '', 'com_tags.list'); ?>
                </div>
            <?php endif; ?>
         </div>
    <?php endif; ?>

    <?php // 5. Подключение шаблона элементов (list_items.php) ?>
    <?php echo $this->loadTemplate('items'); ?>

    </div>
<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_tags
 *
 * @copyright   (C) 2013 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Добавляем необходимые use операторы
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

// Get the application object if needed, e.g., for Identity
// $app = Factory::getApplication();
// $user = $app->getIdentity();
// $authorisedViewLevels = $user->getAuthorisedViewLevels();

// Проверка, отображается ли страница для одного конкретного тега (в режиме списка)
// Модель com_tags/list загружает данные в $this->item, если список отфильтрован до одного тега
$isSingleTag = isset($this->item) && is_array($this->item) && count($this->item) === 1;

// Определяем уровень заголовка для названия списка/тега
$htag = $this->params->get('show_page_heading') ? 'h2' : 'h1';

?>

<?php // Основной контейнер страницы списка тегов ?>
<div class="com-tags-tag-list tag-list uk-container uk-container-small uk-margin-auto uk-margin-large-bottom"> <?php // Ограничиваем ширину и добавляем отступы ?>

    <?php // 1. Заголовок страницы (из настроек меню) ?>
    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1 class="uk-h1 uk-margin-medium-bottom uk-text-center">
            <?php echo $this->escape($this->params->get('page_heading')); ?>
        </h1>
    <?php endif; ?>

    <?php // 2. Заголовок ТЕГА (если отображается один тег) или СПИСКА ТЕГОВ ?>
    <?php if ($this->params->get('show_tag_title', 1)) : ?>
        <?php // Определяем, какой заголовок выводить ?>
        <?php $displayTitle = $isSingleTag ? ($this->item[0]->title ?? '') : ($this->tags_title ?? ''); ?>
        <?php $titleContext = $isSingleTag ? 'com_tags.tag' : 'com_tags.list'; ?>

        <?php if (!empty($displayTitle)) : ?>
            <<?php echo $htag; ?> class="<?php echo $htag === 'h1' ? 'uk-h1' : 'uk-h2'; ?> uk-margin-bottom">
                <?php echo HTMLHelper::_('content.prepare', $displayTitle, '', $titleContext); ?>
            </<?php echo $htag; ?>>
        <?php endif; ?>
    <?php endif; ?>

    <?php // 3. Описание и изображение для ОДИНОЧНОГО тега ?>
    <?php if ($isSingleTag && ($this->params->get('tag_list_show_tag_image', 1) || $this->params->get('tag_list_show_tag_description', 1))) : ?>
        <div class="tag-description uk-margin uk-clearfix"> <?php // Отступ и очистка потока ?>
             <?php $tagData = $this->item[0]; // Данные одиночного тега ?>
            <?php $images = json_decode($tagData->images); ?>

            <?php // Изображение тега ?>
            <?php if ($this->params->get('tag_list_show_tag_image', 1) && !empty($images->image_fulltext)) : ?>
                <?php
                $imgAttr = [
                    'class' => 'uk-align-left uk-margin-remove-adjacent uk-margin-right uk-border-rounded', // Выравнивание слева, отступы, скругление
                    'alt'   => $this->escape(empty($images->image_fulltext_alt) ? $tagData->title : $images->image_fulltext_alt),
                    'itemprop' => 'image' // Schema.org
                ];
                echo HTMLHelper::_('image', $images->image_fulltext, $imgAttr['alt'], $imgAttr);
                ?>
            <?php endif; ?>

            <?php // Описание тега ?>
            <?php if ($this->params->get('tag_list_show_tag_description', 1) && !empty($tagData->description)) : ?>
                <div class="tag-description-text" itemprop="description"> <?php // Обертка для текста описания ?>
                     <?php echo HTMLHelper::_('content.prepare', $tagData->description, '', 'com_tags.tag'); ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php // 4. Общее описание и изображение для СПИСКА тегов ?>
    <?php // Показываем, только если это не страница одного тега, ИЛИ если описание для одного тега не было показано выше ?>
    <?php $showListDescriptionBlock = !$isSingleTag || ($isSingleTag && !$this->params->get('tag_list_show_tag_description', 1) && !$this->params->get('tag_list_show_tag_image', 1)); ?>
    <?php if ($showListDescriptionBlock && ($this->params->get('show_list_description', 1) || $this->params->get('show_description_image', 1))) : ?>
         <div class="tag-list-description uk-margin uk-clearfix">
            <?php // Изображение списка ?>
            <?php if ($this->params->get('show_description_image', 1) && $this->params->get('tag_list_image')) : ?>
                <?php
                 $listImgAttr = [
                    'class' => 'uk-align-left uk-margin-remove-adjacent uk-margin-right uk-border-rounded',
                    'alt'   => $this->escape($this->params->get('tag_list_image_alt', '')),
                    'itemprop' => 'image'
                ];
                 echo HTMLHelper::_('image', $this->params->get('tag_list_image'), $listImgAttr['alt'], $listImgAttr);
                ?>
            <?php endif; ?>

            <?php // Описание списка ?>
            <?php if ($this->params->get('show_list_description', 1) && $this->params->get('tag_list_description', '') !== '') : ?>
                 <div class="list-description-text">
                    <?php echo HTMLHelper::_('content.prepare', $this->params->get('tag_list_description'), '', 'com_tags.list'); ?>
                </div>
            <?php endif; ?>
         </div>
    <?php endif; ?>

    <?php // 5. Подключение шаблона для вывода самих элементов списка (тегов) ?>
    <?php // УБЕДИТЕСЬ, ЧТО ФАЙЛ list_items.php (или items.php в вашем случае) ТОЖЕ СТИЛИЗОВАН ПОД UIKIT! ?>
    <?php echo $this->loadTemplate('items'); ?>

    <?php // 6. Пагинация (если есть для списка тегов) ?>
    <?php if (!empty($this->pagination) && ($this->pagination->pagesTotal > 1)) : ?>
         <div class="pagination-wrapper uk-margin-medium-top uk-clearfix">
             <?php if ($this->params->get('show_pagination_results', 1)) : ?>
                <div class="counter uk-float-right">
                    <p class="uk-text-meta">
                        <?php echo $this->pagination->getPagesCounter(); ?>
                    </p>
                </div>
            <?php endif; ?>
             <div class="uk-pagination-container">
                <?php echo $this->pagination->getPagesLinks(['pagination' => 'uk-pagination']); ?>
             </div>
        </div>
    <?php endif; ?>

</div>
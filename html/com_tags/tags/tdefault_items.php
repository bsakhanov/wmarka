<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_tags
 *
 * @copyright   (C) 2013 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Tags\Site\Helper\RouteHelper;

/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
$wa = $this->document->getWebAssetManager();
$wa->useScript('com_tags.tags-default'); // Убедитесь, что этот скрипт нужен или совместим

// Get the user object.
$user = Factory::getUser();

// Check if user is allowed to add/edit based on tags permissions.
// Эти переменные не используются в текущем коде вывода, но могут быть нужны для кастомизации
// $canEdit      = $user->authorise('core.edit', 'com_tags');
// $canCreate    = $user->authorise('core.create', 'com_tags');
// $canEditState = $user->authorise('core.edit.state', 'com_tags');

$n = count($this->items);

// Настройки изображений (JUImage)
JLoader::register('JUImage', JPATH_LIBRARIES . '/juimage/JUImage.php'); // Проверьте путь
$juImg = new JUImage();
$regexImageSrc = '/#joomlaImage?([^\'" >]+)/';

// Параметры из меню/компонента
$showFilter             = $this->params->get('filter_field');
$showPaginationLimit    = $this->params->get('show_pagination_limit'); // Не используется в текущем коде, но может понадобиться
$showImage              = $this->params->get('all_tags_show_tag_image');
$showDescription        = $this->params->get('all_tags_show_tag_description', 1);
$showHits               = $this->params->get('all_tags_show_tag_hits');
$maxChars               = $this->params->get('all_tags_tag_maximum_characters');
$columnsMedium          = $this->params->get('tag_columns_medium', 2); // Пример: Добавьте параметры для управления колонками в UIkit
$columnsLarge           = $this->params->get('tag_columns_large', 3); // Пример: Добавьте параметры для управления колонками в UIkit

// Формируем классы для сетки UIkit на основе параметров
$gridChildWidths = 'uk-child-width-1-1';
if ((int) $columnsMedium > 1) {
    $gridChildWidths .= ' uk-child-width-1-' . (int) $columnsMedium . '@m';
}
if ((int) $columnsLarge > 1) {
     $gridChildWidths .= ' uk-child-width-1-' . (int) $columnsLarge . '@l';
}

?>
<div class="com-tags__items tags-items">

    <?php // Форма фильтрации ?>
    <?php if ($showFilter) : ?>
    <form action="<?php echo htmlspecialchars(Uri::getInstance()->toString()); ?>" method="post" name="adminForm" id="adminForm" class="uk-margin">
        <fieldset class="uk-fieldset">
            <legend class="uk-legend uk-hidden"><?php echo Text::_('JGLOBAL_FILTER_LABEL'); ?></legend>
            <div class="uk-margin"> <?php // Обертка для группы элементов фильтра ?>
                <div class="uk-form-controls uk-display-inline-block"> <?php // Используем inline-block для размещения в строку ?>
                     <label class="uk-form-label uk-hidden" for="filter-search">
                        <?php echo Text::_('COM_TAGS_TITLE_FILTER_LABEL'); ?>:
                    </label>
                    <input
                        type="text"
                        name="filter-search"
                        id="filter-search"
                        value="<?php echo $this->escape($this->state->get('list.filter')); ?>"
                        class="uk-input uk-form-width-medium uk-form-small" <?php // uk-form-width-medium может быть лучше small ?>
                        onchange="document.adminForm.submit();"
                        placeholder="<?php echo Text::_('COM_TAGS_TITLE_FILTER_LABEL'); ?>"
                        aria-label="<?php echo Text::_('COM_TAGS_TITLE_FILTER_LABEL'); ?>"
                    >
                </div>
                <div class="uk-display-inline-block uk-margin-small-left"> <?php // Кнопки рядом ?>
                    <button type="submit" name="filter_submit" class="uk-button uk-button-primary uk-button-small">
                        <?php echo Text::_('JGLOBAL_FILTER_BUTTON'); ?>
                    </button>
                    <button type="button" name="filter-clear-button" class="uk-button uk-button-secondary uk-button-small" onclick="document.getElementById('filter-search').value='';this.form.submit();">
                        <?php echo Text::_('JSEARCH_FILTER_CLEAR'); ?>
                    </button>
                </div>
            </div>
        </fieldset>
        <?php // Скрытые поля для формы ?>
        <input type="hidden" name="limitstart" value="">
        <input type="hidden" name="task" value="">
    </form>
    <?php endif; ?>

    <?php // Контейнер для элементов (карточек) ?>
    <div class="uk-margin-top" itemscope itemtype="https://schema.org/Blog">

        <?php if ($this->items === false || $n === 0) : ?>
            <?php // Сообщение об отсутствии элементов ?>
            <div class="uk-alert uk-alert-primary" uk-alert>
                <p><?php echo Text::_('COM_TAGS_NO_TAGS'); ?></p>
            </div>

        <?php else : ?>
            <?php // Сетка UIkit для карточек ?>
            <div class="uk-grid <?php echo $gridChildWidths; ?> uk-grid-match" uk-grid>

                <?php foreach ($this->items as $i => $item) : ?>
                    <?php // Каждый элемент - это дочерний элемент сетки ?>
                    <div>
                        <?php // Карточка UIkit ?>
                        <div class="uk-card uk-card-default uk-card-hover uk-height-1-1">

                            <?php // Изображение тега (если включено и существует) ?>
                            <?php if ($showImage && !empty($item->images)) : ?>
                                <?php $images = json_decode($item->images); ?>
                                <?php if (!empty($images->image_intro)) : ?>
                                    <?php
                                    // Генерируем изображение с помощью JUImage
                                    $thumb = $juImg->render(preg_replace($regexImageSrc, '', $images->image_intro), [
                                        'w'           => 390, // Размеры можно сделать параметрами
                                        'h'           => 260,
                                        'q'           => 65,
                                        'zc'          => 'C',
                                        'far'         => 'C',
                                        'webp'        => true,
                                        'webp_q'      => 60,
                                        'webp_maxq'   => 65,
                                        'error_image' => 'images/none.jpg', // Убедитесь, что путь к заглушке верный
                                        'cache'       => 'img'
                                    ]);
                                    ?>
                                    <?php if ($thumb && isset($thumb->webp)) : ?>
                                        <div class="uk-card-media-top">
                                            <a href="<?php echo Route::_(RouteHelper::getComponentTagRoute($item->id . ':' . $item->alias, $item->language)); ?>"
                                               aria-label="<?php echo $this->escape(Text::sprintf('COM_TAGS_GO_TO_TAG_PAGE', $item->title)); ?>">
                                                <img src="<?php echo $thumb->webp; ?>"
                                                     width="390" <?php // Укажите реальную ширину ?>
                                                     height="260" <?php // Укажите реальную высоту ?>
                                                     alt="<?php echo $this->escape(empty($images->image_intro_alt) ? $item->title : $images->image_intro_alt); ?>"
                                                     loading="lazy"
                                                     itemprop="thumbnailUrl">
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>

                             <?php // Тело карточки ?>
                            <div class="uk-card-body uk-text-center">

                                <?php // Заголовок (ссылка на тег) ?>
                                <?php if (!empty($item->access) && in_array($item->access, $user->getAuthorisedViewLevels())) : ?>
                                    <h3 class="uk-card-title uk-margin-bottom">
                                        <a href="<?php echo Route::_(RouteHelper::getComponentTagRoute($item->id . ':' . $item->alias, $item->language)); ?>">
                                            <?php echo $this->escape($item->title); ?>
                                        </a>
                                    </h3>
                                <?php endif; ?>

                                <?php // Описание и/или хиты ?>
                                <?php if (($showDescription && !empty($item->description)) || $showHits) : ?>
                                    <div class="tag-details uk-text-small"> <?php // Используем uk-text-small для меньшего текста ?>
                                        <?php // Описание тега ?>
                                        <?php if ($showDescription && !empty($item->description)) : ?>
                                            <div class="tag-body uk-margin-small-bottom"> <?php // Добавляем отступ снизу ?>
                                                <?php echo HTMLHelper::_('string.truncate', strip_tags($item->description), $maxChars); // strip_tags на случай если в описании HTML ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php // Количество просмотров (Хиты) ?>
                                        <?php if ($showHits) : ?>
                                            <span class="uk-badge">
                                                <?php echo Text::sprintf('JGLOBAL_HITS_COUNT', $item->hits); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div> <?php // end uk-card-body ?>

                        </div> <?php // end uk-card ?>
                    </div> <?php // end grid child ?>
                <?php endforeach; ?>

            </div> <?php // end uk-grid ?>
        <?php endif; ?>

    </div> <?php // end item container ?>

    <?php // Пагинация ?>
    <?php if (!empty($this->items) && $this->pagination->pagesTotal > 1) : ?>
        <?php if ($this->params->get('show_pagination')) : ?>
            <div class="pagination-wrapper uk-margin-medium-top uk-clearfix"> <?php // uk-clearfix на всякий случай ?>
                <?php // Счетчик страниц (если включен) ?>
                 <?php if ($this->params->get('show_pagination_results', 1)) : ?>
                    <div class="counter uk-float-right"> <?php // Помещаем счетчик справа ?>
                        <p class="uk-text-meta"> <?php // Используем uk-text-meta для стиля ?>
                            <?php echo $this->pagination->getPagesCounter(); ?>
                        </p>
                    </div>
                <?php endif; ?>

                <?php // Ссылки пагинации (основной вывод Joomla) ?>
                 <div class="uk-pagination-container"> <?php // Обертка для основного блока пагинации ?>
                    <?php echo $this->pagination->getPagesLinks(['pagination' => 'uk-pagination']); // Пытаемся передать класс UIkit, но может потребоваться оверрайд макета ?>
                 </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

</div> <?php // end com-tags__items ?>
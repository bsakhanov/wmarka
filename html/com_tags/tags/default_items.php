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
// use Joomla\Component\Tags\Site\Helper\RouteHelper; // Не используется для ссылок на материалы

/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
$wa = $this->document->getWebAssetManager();
// $wa->useScript('com_tags.tags-default'); // Убедитесь, что этот скрипт нужен для списка МАТЕРИАЛОВ

// Get the user object.
$user = Factory::getUser();

// Переменные разрешений (если нужны для кнопок редактирования и т.п.)
// $canEdit      = $user->authorise('core.edit', $item->core_content_item_id); // Проверка для конкретного элемента
// $canCreate    = $user->authorise('core.create', 'com_content'); // Пример для com_content
// $canEditState = $user->authorise('core.edit.state', $item->core_content_item_id);

$n = count($this->items);

// --- Параметры отображения (из настроек меню/компонента) ---
// Важно: Имена параметров могут отличаться в зависимости от того,
// как настроен вид "Tagged Items" в Joomla. Проверьте XML вашего меню/компонента.
// Используем префикс 'item_' чтобы отличать от параметров списка тегов
$showFilter          = $this->params->get('filter_field'); // Стандартный параметр Joomla
$itemColumns         = $this->params->get('num_columns', 1); // Стандартный параметр для "Blog" или "Featured" view
$itemColumnsMedium   = $this->params->get('num_columns_medium', $itemColumns); // Пользовательский параметр (добавить в XML)
$itemColumnsLarge    = $this->params->get('num_columns_large', $itemColumnsMedium); // Пользовательский параметр (добавить в XML)
$showItemDescription = $this->params->get('show_intro', '1'); // Стандартный параметр 'show_intro' или 'item_show_description'
$showItemHits        = $this->params->get('item_show_hits', '1'); // Пользовательский параметр (добавить в XML) или стандартный если есть

// Формируем классы для сетки UIkit
$gridChildWidths = 'uk-child-width-1-1';
if ((int) $itemColumnsMedium > 1) {
    $gridChildWidths .= ' uk-child-width-1-' . (int) $itemColumnsMedium . '@m';
}
if ((int) $itemColumnsLarge > 1) {
     $gridChildWidths .= ' uk-child-width-1-' . (int) $itemColumnsLarge . '@l';
}

?>
<div class="tag-items tag-items__list"> <?php // Изменен класс для ясности ?>

    <?php // Форма фильтрации (если нужна для списка материалов) ?>
    <?php if ($showFilter) : ?>
    <form action="<?php echo htmlspecialchars(Uri::getInstance()->toString()); ?>" method="post" name="adminForm" id="adminForm" class="uk-margin">
        <fieldset class="uk-fieldset">
            <legend class="uk-legend uk-hidden"><?php echo Text::_('JGLOBAL_FILTER_LABEL'); ?></legend>
            <div class="uk-margin">
                <div class="uk-form-controls uk-display-inline-block">
                     <label class="uk-form-label uk-hidden" for="filter-search">
                        <?php echo Text::_('COM_TAGS_FILTER_LABEL'); // Может быть другой текст фильтра ?>:
                    </label>
                    <input
                        type="text"
                        name="filter-search"
                        id="filter-search"
                        value="<?php echo $this->escape($this->state->get('list.filter')); ?>"
                        class="uk-input uk-form-width-medium uk-form-small"
                        onchange="document.adminForm.submit();"
                        placeholder="<?php echo Text::_('COM_TAGS_FILTER_PLACEHOLDER'); // Может быть другой текст ?>"
                        aria-label="<?php echo Text::_('COM_TAGS_FILTER_LABEL'); ?>"
                    >
                </div>
                <div class="uk-display-inline-block uk-margin-small-left">
                    <button type="submit" name="filter_submit" class="uk-button uk-button-primary uk-button-small">
                        <?php echo Text::_('JGLOBAL_FILTER_BUTTON'); ?>
                    </button>
                    <button type="button" name="filter-clear-button" class="uk-button uk-button-secondary uk-button-small" onclick="document.getElementById('filter-search').value='';this.form.submit();">
                        <?php echo Text::_('JSEARCH_FILTER_CLEAR'); ?>
                    </button>
                </div>
            </div>
        </fieldset>
        <input type="hidden" name="limitstart" value="">
        <input type="hidden" name="task" value="">
    </form>
    <?php endif; ?>

    <?php // Контейнер для элементов ?>
    <div class="uk-margin-top">

        <?php if ($this->items === false || $n === 0) : ?>
            <?php // Сообщение об отсутствии элементов ?>
            <div class="uk-alert uk-alert-primary" uk-alert>
                 <a class="uk-alert-close" uk-close></a> <?php // Кнопка закрытия ?>
                <p><?php echo Text::_('COM_TAGS_NO_ITEMS_FOUND'); // Используем текст для отсутствия МАТЕРИАЛОВ ?></p>
            </div>

        <?php else : ?>
            <?php // Сетка UIkit для карточек материалов ?>
            <div class="uk-grid <?php echo $gridChildWidths; ?> uk-grid-match" uk-grid>

                <?php foreach ($this->items as $i => $item) : ?>
                    <?php // Проверка доступа к элементу ?>
                    <?php if (!empty($item->access) && in_array($item->access, $user->getAuthorisedViewLevels())) : ?>
                        <?php // Каждый элемент - это дочерний элемент сетки ?>
                        <div>
                            <?php // Карточка UIkit для материала ?>
                            <article class="uk-card uk-card-default uk-card-hover uk-height-1-1"
                                     itemscope itemtype="https://schema.org/Article"> <?php // Schema для статьи ?>

                                <?php // --- Изображение материала (если нужно и доступно) --- ?>
                                <?php /* Пример добавления изображения (если есть в $item)
                                <?php if (!empty($item->image_intro)) : // Или другое поле с изображением ?>
                                <div class="uk-card-media-top">
                                    <a href="<?php echo Route::_($item->readmore_link); ?>" itemprop="url">
                                        <img src="<?php echo $item->image_intro; ?>"
                                             alt="<?php echo $this->escape($item->image_intro_alt ?: $item->core_title); ?>"
                                             loading="lazy" itemprop="image">
                                    </a>
                                </div>
                                <?php endif; ?>
                                */ ?>

                                <?php // Тело карточки ?>
                                <div class="uk-card-body">

                                    <?php // Заголовок материала ?>
                                    <h3 class="uk-card-title uk-margin-remove-bottom">
                                        <a href="<?php echo Route::_($item->readmore_link); ?>" itemprop="url">
                                            <span itemprop="headline"><?php echo $this->escape($item->core_title); ?></span>
                                        </a>
                                    </h3>

                                    <?php // Дата публикации / Автор (Пример метаданных) ?>
                                    <?php /* Пример добавления даты
                                    <?php if ($this->params->get('item_show_date', 1)) : ?>
                                    <p class="uk-text-meta uk-margin-remove-top uk-margin-small-bottom">
                                        <time datetime="<?php echo HTMLHelper::_('date', $item->core_created_time, 'c'); ?>" itemprop="datePublished">
                                            <?php echo HTMLHelper::_('date', $item->core_created_time, Text::_('DATE_FORMAT_LC3')); ?>
                                        </time>
                                    </p>
                                    <?php endif; ?>
                                    */ ?>

                                    <?php // Вводный текст / Описание ?>
                                    <?php if ($showItemDescription && !empty($item->core_introtext)) : ?>
                                        <div class="item-introtext uk-margin-top uk-text-small" itemprop="description">
                                            <?php echo HTMLHelper::_('content.prepare', $item->core_introtext, '', 'com_tags.item'); ?>
                                        </div>
                                    <?php endif; ?>

                                </div> <?php // end uk-card-body ?>

                                <?php // Футер карточки с метаданными (Хиты) ?>
                                <?php if ($showItemHits) : ?>
                                <div class="uk-card-footer uk-text-meta">
                                     <span title="<?php echo Text::_('JGLOBAL_HITS'); ?>">
                                         <span uk-icon="icon: eye; ratio: 0.9" class="uk-margin-small-right uk-text-middle"></span>
                                         <span class="uk-text-middle"><?php echo $item->core_hits; ?></span>
                                     </span>
                                     <?php // Сюда можно добавить другие метаданные (категория, автор и т.д.) ?>
                                </div>
                                <?php endif; ?>

                            </article> <?php // end uk-card ?>
                        </div> <?php // end grid child ?>
                    <?php endif; // end access check ?>
                <?php endforeach; ?>

            </div> <?php // end uk-grid ?>
        <?php endif; ?>

    </div> <?php // end item container ?>

    <?php // Пагинация ?>
    <?php if (!empty($this->items) && $this->pagination->pagesTotal > 1) : ?>
        <?php if ($this->params->get('show_pagination')) : // Стандартный параметр пагинации ?>
            <div class="pagination-wrapper uk-margin-medium-top uk-clearfix">
                 <?php if ($this->params->get('show_pagination_results', 1)) : // Стандартный параметр ?>
                    <div class="counter uk-float-right">
                        <p class="uk-text-meta">
                            <?php echo $this->pagination->getPagesCounter(); ?>
                        </p>
                    </div>
                <?php endif; ?>
                 <div class="uk-pagination-container">
                    <?php echo $this->pagination->getPagesLinks(['pagination' => 'uk-pagination']); // Пытаемся применить стиль UIkit ?>
                 </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

</div> <?php // end tag-items__list ?>
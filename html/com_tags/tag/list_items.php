<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_tags
 *
 * @copyright   (C) 2013 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Необходимые классы Joomla
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Tags\Site\Helper\RouteHelper; // Для генерации ссылок на теги

/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
$wa = $this->document->getWebAssetManager();
// $wa->useScript('com_tags.tag-list');

// Получаем параметры сортировки
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));

// Получаем параметры отображения
$showFilter          = $this->params->get('filter_field');
$showPaginationLimit = $this->params->get('show_pagination_limit');
$showHeadings        = $this->params->get('show_headings', 1);
$showDate            = $this->params->get('tag_list_show_date');
$dateFormat          = $this->params->get('date_format', Text::_('DATE_FORMAT_LC3'));

?>
<form action="<?php echo htmlspecialchars(Uri::getInstance()->toString()); ?>" method="post" name="adminForm" id="adminForm" class="com-tags-tag-list__form uk-margin">

    <?php // Блок фильтра и выбора лимита ?>
    <?php if ($showFilter || $showPaginationLimit) : ?>
        <fieldset class="uk-fieldset uk-margin-bottom">
            <legend class="uk-legend uk-hidden"><?php echo Text::_('JGLOBAL_FILTER_LABEL'); ?></legend>
            <div class="uk-grid-small uk-flex-middle" uk-grid> <?php // Используем uk-grid для выравнивания ?>

                <?php // Поле поиска ?>
                <?php if ($showFilter) : ?>
                    <div class="uk-width-auto@s">
                        <div class="uk-form-controls">
                            <label class="uk-form-label uk-hidden" for="filter-search">
                                <?php echo Text::_('COM_TAGS_TITLE_FILTER_LABEL'); ?>:
                            </label>
                            <input
                                type="text"
                                name="filter-search"
                                id="filter-search"
                                value="<?php echo $this->escape($this->state->get('list.filter')); ?>"
                                class="uk-input uk-form-width-medium uk-form-small"
                                onchange="this.form.submit();"
                                placeholder="<?php echo Text::_('COM_TAGS_TITLE_FILTER_LABEL'); ?>"
                                aria-label="<?php echo Text::_('COM_TAGS_TITLE_FILTER_LABEL'); ?>"
                            >
                        </div>
                    </div>
                    <div class="uk-width-auto@s">
                         <div class="uk-form-controls">
                            <button type="submit" name="filter_submit" class="uk-button uk-button-primary uk-button-small">
                                <?php echo Text::_('JGLOBAL_FILTER_BUTTON'); ?>
                            </button>
                            <button type="button" name="filter-clear-button" class="uk-button uk-button-secondary uk-button-small" onclick="document.getElementById('filter-search').value='';this.form.submit();">
                                <?php echo Text::_('JSEARCH_FILTER_CLEAR'); ?>
                            </button>
                        </div>
                    </div>
                <?php endif; ?>

                <?php // Выпадающий список лимита - ИСПОЛЬЗУЕМ СТАНДАРТНЫЙ getLimitBox() ?>
                <?php // Стилизация применяется вашим CSS к select#limit ?>
                <?php if ($showPaginationLimit && !empty($this->pagination) && $this->pagination->pagesTotal > 0) : ?>
                    <div class="uk-width-auto@s uk-text-nowrap">
                         <div class="uk-form-controls uk-flex uk-flex-middle"> <?php // Обертка для выравнивания метки и селекта ?>
                             <label for="limit" class="uk-form-label uk-margin-small-right"><?php echo Text::_('JGLOBAL_DISPLAY_NUM'); ?></label>
                             <?php // Вывод стандартного лимитбокса. ?>
                            <?php echo $this->pagination->getLimitBox(); ?>
                         </div>
                    </div>
                <?php endif; ?>

            </div> <?php // end uk-grid ?>
        </fieldset>
    <?php endif; ?>

    <?php // Сообщение об отсутствии тегов ?>
    <?php if (empty($this->items)) : ?>
        <div class="uk-alert uk-alert-primary" uk-alert>
             <a class="uk-alert-close" uk-close></a>
            <p><?php echo Text::_('COM_TAGS_NO_ITEMS'); ?></p>
        </div>
    <?php else : ?>
        <?php // Таблица со списком тегов ?>
        <table class="uk-table uk-table-striped uk-table-hover uk-table-middle uk-table-divider uk-margin-remove-top">
            <?php // Заголовки таблицы ?>
            <?php if ($showHeadings) : ?>
                <thead>
                    <tr>
                        <th scope="col" id="tagslist_header_title" class="uk-text-nowrap">
                            <?php // ПРИМЕЧАНИЕ: Проверьте поле для сортировки ('tag.core_title' или 'tag.title') ?>
                            <?php echo HTMLHelper::_('grid.sort', 'JGLOBAL_TITLE', 'tag.core_title', $listDirn, $listOrder); ?>
                        </th>
                        <?php if ($showDate) : ?>
                            <th scope="col" id="tagslist_header_date" class="uk-table-shrink uk-text-nowrap">
                                <?php
                                // ПРИМЕЧАНИЕ: Проверьте поля даты для сортировки
                                $dateSortKey = 'tag.publish_up';
                                if ($showDate === 'created') {
                                    $dateSortKey = 'tag.created_time';
                                } elseif ($showDate === 'modified') {
                                    $dateSortKey = 'tag.modified_time';
                                }
                                echo HTMLHelper::_('grid.sort', 'COM_TAGS_' . $showDate . '_DATE', $dateSortKey, $listDirn, $listOrder);
                                ?>
                            </th>
                        <?php endif; ?>
                    </tr>
                </thead>
            <?php endif; ?>

            <?php // Тело таблицы ?>
            <tbody>
                <?php foreach ($this->items as $i => $item) : ?>
                    <?php // ПРИМЕЧАНИЕ: Проверьте свойство публикации ('published' или 'core_state') ?>
                    <?php $isUnpublished = isset($item->published) ? ($item->published == 0) : (isset($item->core_state) && $item->core_state == 0); ?>
                    <tr class="<?php echo $isUnpublished ? 'uk-text-muted' : ''; ?>">
                        <?php // Ячейка с названием тега ?>
                        <td class="list-title" <?php echo $showHeadings ? '' : 'scope="row"'; ?>>
                             <?php // ПРИМЕЧАНИЕ: Проверьте свойства для ссылки ('link', 'id'/'tag_id', 'alias') ?>
                            <?php $tagLink = $item->link ?? RouteHelper::getTagRoute(($item->id ?? $item->tag_id) . ':' . $item->alias); ?>
                            <a href="<?php echo Route::_($tagLink); ?>">
                                <?php echo $this->escape($item->core_title); // Используем core_title ?>
                            </a>
                            <?php // Значок "Не опубликовано" ?>
                            <?php if ($isUnpublished) : ?>
                                <span class="uk-label uk-label-warning uk-margin-small-left">
                                    <?php echo Text::_('JUNPUBLISHED'); ?>
                                </span>
                            <?php endif; ?>
                        </td>

                        <?php // Ячейка с датой ?>
                        <?php if ($showDate) : ?>
                            <td class="list-date uk-text-nowrap uk-text-small">
                                <?php
                                // ПРИМЕЧАНИЕ: Проверьте свойства даты
                                $dateToShow = '';
                                if ($showDate === 'created') {
                                    $dateToShow = $item->created_time ?? ($item->core_created_time ?? '');
                                } elseif ($showDate === 'modified') {
                                    $dateToShow = $item->modified_time ?? ($item->core_modified_time ?? '');
                                } elseif ($showDate === 'published') {
                                    $dateToShow = $item->publish_up ?? ($item->core_publish_up ?? '');
                                }
                                echo $dateToShow ? HTMLHelper::_('date', $dateToShow, $dateFormat) : '';
                                ?>
                            </td>
                        <?php endif; ?>
                    </tr> <?php // Закрытие строки таблицы ?>
                <?php endforeach; ?>
            </tbody> <?php // Закрытие тела таблицы ?>
        </table> <?php // Закрытие таблицы ?>
    <?php endif; ?>

    <?php // Пагинация ?>
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

    <?php // Скрытые поля ?>
    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>">
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>">
    <input type="hidden" name="limitstart" value="">
    <input type="hidden" name="task" value="">
</form>
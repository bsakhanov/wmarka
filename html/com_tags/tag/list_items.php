<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_tags
 * @version     Joomla 6.x
 * @PHP         8.3 / 8.4
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Tags\Site\Helper\RouteHelper;

/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
$wa = $this->document->getWebAssetManager();

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));

$showFilter          = $this->params->get('filter_field');
$showPaginationLimit = $this->params->get('show_pagination_limit');
$showHeadings        = $this->params->get('show_headings', 1);
$showDate            = $this->params->get('tag_list_show_date');
$dateFormat          = $this->params->get('date_format', Text::_('DATE_FORMAT_LC3'));
?>

<form action="<?php echo htmlspecialchars(Uri::getInstance()->toString()); ?>" method="post" name="adminForm" id="adminForm" class="com-tags-tag-list__form uk-margin-top">

    <?php // Блок фильтра и выбора лимита ?>
    <?php if ($showFilter || $showPaginationLimit) : ?>
        <fieldset class="uk-fieldset uk-margin-bottom">
            <legend class="uk-legend uk-hidden"><?php echo Text::_('JGLOBAL_FILTER_LABEL'); ?></legend>
            <div class="uk-grid-small uk-flex-middle uk-flex-between" uk-grid>
                
                <?php // Поле поиска и кнопки ?>
                <?php if ($showFilter) : ?>
                    <div class="uk-width-1-1 uk-width-auto@s">
                        <div class="uk-flex uk-flex-middle">
                            <input type="text"
                                   name="filter-search"
                                   id="filter-search"
                                   value="<?php echo $this->escape($this->state->get('list.filter')); ?>"
                                   class="uk-input uk-form-width-medium uk-margin-small-right"
                                   placeholder="<?php echo Text::_('COM_TAGS_TITLE_FILTER_LABEL'); ?>"
                                   aria-label="<?php echo Text::_('COM_TAGS_TITLE_FILTER_LABEL'); ?>">
                            
                            <button type="submit" name="filter_submit" class="uk-button uk-button-primary uk-margin-small-right">
                                <span uk-icon="search"></span>
                            </button>
                            <button type="button" name="filter-clear-button" class="uk-button uk-button-default" onclick="document.getElementById('filter-search').value='';this.form.submit();">
                                <span uk-icon="close"></span>
                            </button>
                        </div>
                    </div>
                <?php endif; ?>

                <?php // Лимитбокс ?>
                <?php if ($showPaginationLimit && !empty($this->pagination) && $this->pagination->pagesTotal > 0) : ?>
                    <div class="uk-width-1-1 uk-width-auto@s">
                         <div class="uk-flex uk-flex-middle">
                             <label for="limit" class="uk-form-label uk-margin-small-right uk-text-nowrap"><?php echo Text::_('JGLOBAL_DISPLAY_NUM'); ?></label>
                             <?php echo $this->pagination->getLimitBox(); ?>
                         </div>
                    </div>
                <?php endif; ?>

            </div>
        </fieldset>
    <?php endif; ?>

    <?php // Таблица тегов ?>
    <?php if (empty($this->items)) : ?>
        <div class="uk-alert uk-alert-primary" uk-alert>
             <a class="uk-alert-close" uk-close></a>
            <p><?php echo Text::_('COM_TAGS_NO_ITEMS'); ?></p>
        </div>
    <?php else : ?>
        <div class="uk-overflow-auto">
            <table class="uk-table uk-table-striped uk-table-hover uk-table-middle uk-table-divider uk-margin-remove-top">
                <?php if ($showHeadings) : ?>
                    <thead>
                        <tr>
                            <th scope="col" class="uk-text-nowrap">
                                <?php echo HTMLHelper::_('grid.sort', 'JGLOBAL_TITLE', 'tag.core_title', $listDirn, $listOrder); ?>
                            </th>
                            <?php if ($showDate) : ?>
                                <th scope="col" class="uk-table-shrink uk-text-nowrap">
                                    <?php
                                    $dateSortKey = match($showDate) {
                                        'created' => 'tag.created_time',
                                        'modified' => 'tag.modified_time',
                                        default => 'tag.publish_up'
                                    };
                                    echo HTMLHelper::_('grid.sort', 'COM_TAGS_' . $showDate . '_DATE', $dateSortKey, $listDirn, $listOrder);
                                    ?>
                                </th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                <?php endif; ?>

                <tbody>
                    <?php foreach ($this->items as $item) : ?>
                        <?php $isUnpublished = isset($item->published) ? ($item->published == 0) : (isset($item->core_state) && $item->core_state == 0); ?>
                        <tr class="<?php echo $isUnpublished ? 'uk-text-muted' : ''; ?>">
                            <td class="uk-text-bold">
                                <?php $tagLink = $item->link ?? RouteHelper::getTagRoute(($item->id ?? $item->tag_id) . ':' . $item->alias); ?>
                                <a href="<?php echo Route::_($tagLink); ?>" class="uk-link-heading">
                                    <?php echo $this->escape($item->core_title); ?>
                                </a>
                                <?php if ($isUnpublished) : ?>
                                    <span class="uk-label uk-label-warning uk-margin-small-left"><?php echo Text::_('JUNPUBLISHED'); ?></span>
                                <?php endif; ?>
                            </td>

                            <?php if ($showDate) : ?>
                                <td class="uk-text-nowrap uk-text-small uk-text-muted">
                                    <?php
                                    $dateToShow = match($showDate) {
                                        'created' => $item->created_time ?? ($item->core_created_time ?? ''),
                                        'modified' => $item->modified_time ?? ($item->core_modified_time ?? ''),
                                        default => $item->publish_up ?? ($item->core_publish_up ?? '')
                                    };
                                    echo $dateToShow ? HTMLHelper::_('date', $dateToShow, $dateFormat) : '';
                                    ?>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

    <?php // Пагинация (Flexbox) ?>
    <?php if (!empty($this->pagination) && ($this->pagination->pagesTotal > 1)) : ?>
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

    <?php // Скрытые поля для сортировки и страниц ?>
    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>">
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>">
    <input type="hidden" name="limitstart" value="">
    <input type="hidden" name="task" value="">
</form>
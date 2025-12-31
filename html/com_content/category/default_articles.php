<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Content\Administrator\Extension\ContentComponent;
use Joomla\Component\Content\Site\Helper\RouteHelper;

/** @var \Joomla\Component\Content\Site\View\Category\HtmlView $this */
$wa = $this->getDocument()->getWebAssetManager();
$wa->useScript('com_content.articles-list');

$listOrder  = $this->escape($this->state->get('list.ordering'));
$listDirn   = $this->escape($this->state->get('list.direction'));
$currentDate = Factory::getDate()->format('Y-m-d H:i:s');

// Проверка прав на редактирование
$isEditable = false;
if (!empty($this->items)) {
    foreach ($this->items as $article) {
        if ($article->params->get('access-edit')) { $isEditable = true; break; }
    }
}
?>

<form action="<?php echo htmlspecialchars(Uri::getInstance()->toString()); ?>" method="post" name="adminForm" id="adminForm">
    
    <?php /* Блок фильтрации и лимитов */ ?>
    <div class="uk-grid-small uk-flex-middle uk-margin-bottom" uk-grid>
        <?php if ($this->params->get('filter_field') !== 'hide') : ?>
            <div class="uk-width-expand@m">
                <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: search"></span>
                    <input type="text" name="filter-search" id="filter-search" 
                           value="<?php echo $this->escape($this->state->get('list.filter')); ?>" 
                           class="uk-input uk-form-small uk-border-rounded" 
                           onchange="document.adminForm.submit();" 
                           placeholder="<?php echo Text::_('JGLOBAL_FILTER_LABEL'); ?>">
                </div>
            </div>
        <?php endif; ?>

        <?php if ($this->params->get('show_pagination_limit')) : ?>
            <div class="uk-width-auto@m">
                <?php echo $this->pagination->getLimitBox(); ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if (empty($this->items)) : ?>
        <div class="uk-alert-primary" uk-alert><?php echo Text::_('COM_CONTENT_NO_ARTICLES'); ?></div>
    <?php else : ?>
        <div class="uk-overflow-auto">
            <table class="uk-table uk-table-divider uk-table-hover uk-table-middle uk-table-striped uk-background-default uk-border-rounded">
                <thead>
                    <tr>
                        <th class="uk-table-expand"><?php echo HTMLHelper::_('grid.sort', 'JGLOBAL_TITLE', 'a.title', $listDirn, $listOrder, null, 'asc', '', 'adminForm'); ?></th>
                        <?php if ($this->params->get('list_show_date')) : ?>
                            <th class="uk-table-shrink uk-text-nowrap"><?php echo Text::_('JDATE'); ?></th>
                        <?php endif; ?>
                        <?php if ($this->params->get('list_show_hits')) : ?>
                            <th class="uk-table-shrink"><?php echo Text::_('JGLOBAL_HITS'); ?></th>
                        <?php endif; ?>
                        <?php if ($isEditable) : ?>
                            <th class="uk-table-shrink"></th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody itemscope itemtype="https://schema.org/ItemList">
                    <?php foreach ($this->items as $i => $article) : ?>
                        <tr class="<?php echo ($article->state == ContentComponent::CONDITION_UNPUBLISHED) ? 'uk-text-muted' : ''; ?>" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <td itemprop="name">
                                <a href="<?php echo Route::_(RouteHelper::getArticleRoute($article->slug, $article->catid, $article->language)); ?>" itemprop="url">
                                    <?php echo $this->escape($article->title); ?>
                                </a>
                                <?php if ($article->state == ContentComponent::CONDITION_UNPUBLISHED) : ?>
                                    <span class="uk-label uk-label-warning uk-margin-small-left"><?php echo Text::_('JUNPUBLISHED'); ?></span>
                                <?php endif; ?>
                            </td>
                            <?php if ($this->params->get('list_show_date')) : ?>
                                <td class="uk-text-nowrap uk-text-meta">
                                    <?php echo HTMLHelper::_('date', $article->displayDate, Text::_('DATE_FORMAT_LC3')); ?>
                                </td>
                            <?php endif; ?>
                            <?php if ($this->params->get('list_show_hits')) : ?>
                                <td><span class="uk-text-meta"><?php echo $article->hits; ?></span></td>
                            <?php endif; ?>
                            <?php if ($isEditable) : ?>
                                <td class="uk-text-right">
                                    <?php if ($article->params->get('access-edit')) : ?>
                                        <?php echo HTMLHelper::_('contenticon.edit', $article, $article->params); ?>
                                    <?php endif; ?>
                                </td>
                            <?php endif; ?>
                            <meta itemprop="position" content="<?php echo $i + 1; ?>">
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

    <?php if (!empty($this->items) && $this->pagination->pagesTotal > 1) : ?>
        <div class="uk-margin-large-top">
            <?php echo $this->pagination->getPagesLinks(); ?>
            <?php if ($this->params->get('show_pagination_results')) : ?>
                <div class="uk-text-meta uk-text-center uk-margin-small-top">
                    <?php echo $this->pagination->getPagesCounter(); ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <input type="hidden" name="filter_order" value="">
    <input type="hidden" name="filter_order_Dir" value="">
    <input type="hidden" name="limitstart" value="">
    <input type="hidden" name="task" value="">
</form>

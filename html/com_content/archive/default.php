<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * @version     Joomla 6 WMARKA Core Edition (UIkit 3 Archive)
 */

declare(strict_types=1);

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

/** @var \Joomla\Component\Content\Site\View\Archive\HtmlView $this */
?>
<div class="com-content-archive archive uk-margin-bottom">

    <?php /* --- ЗАГОЛОВОК СТРАНИЦЫ --- */ ?>
    <?php if ($this->params->get('show_page_heading')) : ?>
        <div class="page-header uk-margin-bottom">
            <h1 class="uk-heading-bullet">
                <?php echo $this->escape($this->params->get('page_heading')); ?>
            </h1>
        </div>
    <?php endif; ?>

    <?php /* --- ФОРМА ФИЛЬТРАЦИИ (UIkit 3) --- */ ?>
    <form id="adminForm" action="<?php echo Route::_('index.php'); ?>" method="post" class="uk-margin-medium-bottom">
        <div class="uk-flex uk-flex-middle uk-flex-wrap" uk-margin>
            
            <?php /* Поиск по тексту */ ?>
            <div class="uk-margin-small-right">
                <label class="visually-hidden" for="filter-search"><?php echo Text::_('COM_CONTENT_TITLE_FILTER_LABEL'); ?></label>
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: search"></span>
                    <input type="text" name="filter-search" id="filter-search" value="<?php echo $this->escape($this->filter); ?>" class="uk-input" onchange="document.adminForm.submit();" placeholder="<?php echo Text::_('COM_CONTENT_TITLE_FILTER_LABEL'); ?>">
                </div>
            </div>
            
            <?php /* Фильтр по месяцу */ ?>
            <div class="uk-margin-small-right">
                <label class="visually-hidden" for="month"><?php echo Text::_('JOPTION_SELECT_MONTH'); ?></label>
                <?php echo $this->form->getInput('month'); ?>
            </div>
            
            <?php /* Фильтр по году */ ?>
            <div class="uk-margin-small-right">
                <label class="visually-hidden" for="year"><?php echo Text::_('JOPTION_SELECT_YEAR'); ?></label>
                <?php echo $this->form->getInput('year'); ?>
            </div>
            
            <?php /* Лимит на страницу */ ?>
            <?php if ($this->params->get('show_pagination_limit')) : ?>
                <div class="uk-margin-small-right uk-flex uk-flex-middle">
                    <span class="uk-text-meta uk-margin-small-right"><?php echo Text::_('JGLOBAL_DISPLAY_NUM'); ?></span>
                    <?php echo $this->form->getInput('limit'); ?>
                </div>
            <?php endif; ?>

            <?php /* Кнопка отправки */ ?>
            <div>
                <button type="submit" class="uk-button uk-button-primary">
                    <?php echo Text::_('JGLOBAL_FILTER_BUTTON'); ?>
                </button>
            </div>
            
        </div>

        <input type="hidden" name="view" value="archive">
        <input type="hidden" name="option" value="com_content">
        <input type="hidden" name="limitstart" value="0">
    </form>

    <?php /* --- СПИСОК СТАТЕЙ --- */ ?>
    <?php echo $this->loadTemplate('items'); ?>

</div>
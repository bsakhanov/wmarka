<?php
/**
 * WMARKA — архив материалов: фильтр (заголовок, месяц, год, лимит) + список.
 *
 * @var \Joomla\Component\Content\Site\View\Archive\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';
?>
<div class="com-content-archive archive">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1 class="uk-heading-small"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
    <?php endif; ?>

    <form id="adminForm" action="<?php echo Route::_('index.php'); ?>" method="post" class="uk-margin-medium-bottom">
        <fieldset class="uk-fieldset">
            <legend class="uk-hidden-visually"><?php echo Text::_('COM_CONTENT_FORM_FILTER_LEGEND'); ?></legend>
            <div class="uk-grid-small uk-flex-middle" uk-grid>
                <?php if ($this->params->get('filter_field') !== 'hide') : ?>
                    <label class="uk-hidden-visually" for="filter-search"><?php echo Text::_('COM_CONTENT_TITLE_FILTER_LABEL'); ?></label>
                    <input type="text" name="filter-search" id="filter-search" value="<?php echo $this->escape($this->filter); ?>" class="uk-input uk-form-small uk-form-width-medium" placeholder="<?php echo Text::_('COM_CONTENT_TITLE_FILTER_LABEL'); ?>">
                <?php endif; ?>
                <label class="uk-hidden-visually" for="month"><?php echo Text::_('JMONTH'); ?></label>
                <?php echo str_replace('uk-select', 'uk-select uk-form-small uk-form-width-small', Ui::bridge((string) $this->form->monthField)); ?>
                <label class="uk-hidden-visually" for="year"><?php echo Text::_('JYEAR'); ?></label>
                <?php echo str_replace('uk-select', 'uk-select uk-form-small uk-form-width-small', Ui::bridge((string) $this->form->yearField)); ?>
                <label class="uk-hidden-visually" for="limit"><?php echo Text::_('JGLOBAL_DISPLAY_NUM'); ?></label>
                <?php echo str_replace('uk-select', 'uk-select uk-form-small uk-form-width-xsmall', Ui::bridge((string) $this->form->limitField)); ?>
                <button type="submit" class="uk-button uk-button-primary uk-button-small"><?php echo Text::_('JGLOBAL_FILTER_BUTTON'); ?></button>
            </div>
            <input type="hidden" name="view" value="archive">
            <input type="hidden" name="option" value="com_content">
            <input type="hidden" name="limitstart" value="0">
        </fieldset>
    </form>

    <?php echo $this->loadTemplate('items'); ?>
</div>

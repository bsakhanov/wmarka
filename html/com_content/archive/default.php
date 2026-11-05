<?php
/**
 * WMARKA — архив материалов: фильтр (заголовок, месяц, год, лимит) + список.
 *
 * @var \Joomla\Component\Content\Site\View\Archive\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
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
            <?php
            // Месяц и год — один «выбор» общей панели wmarka.filterbar: та же высота и раскладка, что у меток и списков
            $wmMonth = '<label class="uk-hidden-visually" for="month">' . Text::_('JMONTH') . '</label>' . Ui::bridge((string) $this->form->monthField);
            $wmYear  = '<label class="uk-hidden-visually" for="year">' . Text::_('JYEAR') . '</label>' . Ui::bridge((string) $this->form->yearField);

            echo LayoutHelper::render('wmarka.filterbar', [
                'search'  => $this->params->get('filter_field') !== 'hide' ? ['name' => 'filter-search', 'value' => (string) $this->filter, 'label' => Text::_('COM_CONTENT_TITLE_FILTER_LABEL')] : null,
                'select'  => $wmMonth . $wmYear,
                'buttons' => true,
                'limit'   => (string) $this->form->limitField,
            ]);
            ?>
            <input type="hidden" name="view" value="archive">
            <input type="hidden" name="option" value="com_content">
            <input type="hidden" name="limitstart" value="0">
        </fieldset>
    </form>

    <?php echo $this->loadTemplate('items'); ?>
</div>

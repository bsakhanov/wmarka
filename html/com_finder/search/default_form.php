<?php
/**
 * WMARKA — форма умного поиска.
 *
 * Расширенный поиск без переноса узлов скриптом и без встроенных стилей:
 *  - даты — родные поля type="date": их формат (ГГГГ-ММ-ДД) совпадает с тем,
 *    что ждёт ядро (d1/d2), календарь Joomla не нужен;
 *  - ветки таксономии (Категория, Метка, Автор…) — разметка ядра filter.select,
 *    классы Bootstrap переписаны на UIkit на сервере (Ui::bridge);
 *  - классы js-finder-searchform / js-finder-advanced сохранены: скрипт ядра
 *    даёт автоподсказку и отключает пустые селекты при отправке (чистый URL).
 *
 * @var \Joomla\Component\Finder\Site\View\Search\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

if ($this->params->get('show_autosuggest', 1)) {
    $this->getDocument()->getWebAssetManager()->usePreset('awesomplete');
    $this->getDocument()->addScriptOptions('finder-search', ['url' => Route::_('index.php?option=com_finder&task=suggestions.suggest&format=json&tmpl=component', false)]);
    Text::script('COM_FINDER_SEARCH_FORM_LIST_LABEL');
    Text::script('JLIB_JS_AJAX_ERROR_OTHER');
    Text::script('JLIB_JS_AJAX_ERROR_PARSE');
}

$advanced = (bool) $this->params->get('show_advanced', 1);
$expanded = (bool) $this->params->get('expand_advanced', 0) || $this->query->date1 || $this->query->date2 || !empty($this->query->filters);
$dates    = (bool) $this->params->get('show_date_filters', 0);

// Ветки таксономии без календарей ядра: даты рисуем сами
$branchParams = clone $this->params;
$branchParams->set('show_date_filters', 0);
$branches = $advanced ? (string) HTMLHelper::_('filter.select', $this->query, $branchParams) : '';
$branches = preg_replace('#<div class="control-group">#', '<div class="uk-width-1-1 uk-width-1-3@m">', $branches) ?? $branches;
$branches = str_replace(['<div class="filter-branch">', 'class="form-select advancedSelect"'], ['<div class="uk-grid-small uk-child-width-expand@m" uk-grid>', 'class="uk-select"'], $branches);
$branches = Ui::bridge($branches);

$operators = ['before' => 'COM_FINDER_FILTER_DATE_BEFORE', 'exact' => 'COM_FINDER_FILTER_DATE_EXACTLY', 'after' => 'COM_FINDER_FILTER_DATE_AFTER'];
?>
<form action="<?php echo Route::_($this->query->toUri()); ?>" method="get" class="js-finder-searchform uk-form-stacked" role="search">
    <?php echo $this->getFields(); ?>

    <fieldset class="uk-fieldset">
        <legend class="uk-hidden-visually"><?php echo Text::_('COM_FINDER_SEARCH_FORM_LEGEND'); ?></legend>
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-expand">
                <label for="q" class="uk-hidden-visually"><?php echo Text::_('COM_FINDER_SEARCH_TERMS'); ?></label>
                <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: search"></span>
                    <input type="search" name="q" id="q" class="js-finder-search-query uk-input" value="<?php echo $this->escape($this->query->input); ?>" placeholder="<?php echo Ui::esc(Text::_('TPL_WMARKA_SEARCH_PLACEHOLDER')); ?>" autocomplete="off">
                </div>
            </div>
            <div class="uk-width-auto">
                <button type="submit" class="uk-button uk-button-primary"><?php echo Text::_('JSEARCH_FILTER_SUBMIT'); ?></button>
                <?php if ($advanced) : ?>
                    <button class="uk-button uk-button-default" type="button" uk-toggle="target: #advancedSearch; animation: uk-animation-fade" aria-expanded="<?php echo $expanded ? 'true' : 'false'; ?>" aria-controls="advancedSearch" title="<?php echo Ui::esc(Text::_('COM_FINDER_ADVANCED_SEARCH_TOGGLE')); ?>"><span uk-icon="icon: settings"></span><span class="uk-hidden-visually"><?php echo Text::_('COM_FINDER_ADVANCED_SEARCH_TOGGLE'); ?></span></button>
                <?php endif; ?>
            </div>
        </div>
    </fieldset>

    <?php if ($advanced) : ?>
        <fieldset id="advancedSearch" class="uk-fieldset js-finder-advanced uk-margin-top"<?php echo $expanded ? '' : ' hidden'; ?>>
            <legend class="uk-hidden-visually"><?php echo Text::_('COM_FINDER_SEARCH_ADVANCED_LEGEND'); ?></legend>
            <div class="uk-card uk-card-default uk-card-small uk-card-body">
                <?php if ($this->params->get('show_advanced_tips', 1)) : ?>
                    <ul uk-accordion class="uk-margin-small-bottom">
                        <li>
                            <a class="uk-accordion-title uk-text-small" href="#"><?php echo Text::_('TPL_WMARKA_SEARCH_TIPS'); ?></a>
                            <div class="uk-accordion-content uk-text-small uk-text-muted">
                                <?php echo Text::_('COM_FINDER_ADVANCED_TIPS_INTRO') . Text::_('COM_FINDER_ADVANCED_TIPS_AND') . Text::_('COM_FINDER_ADVANCED_TIPS_NOT') . Text::_('COM_FINDER_ADVANCED_TIPS_OR'); ?>
                                <?php if ($this->params->get('tuplecount', 1) > 1) : ?><?php echo Text::_('COM_FINDER_ADVANCED_TIPS_PHRASE'); ?><?php endif; ?>
                                <?php echo Text::_('COM_FINDER_ADVANCED_TIPS_OUTRO'); ?>
                            </div>
                        </li>
                    </ul>
                <?php endif; ?>

                <?php if ($dates) : ?>
                    <div class="uk-grid-small uk-child-width-1-2@m uk-margin-bottom" uk-grid>
                        <?php foreach ([1, 2] as $n) : ?>
                            <div>
                                <label class="uk-form-label" for="filter_date<?php echo $n; ?>"><?php echo Text::_('COM_FINDER_FILTER_DATE' . $n); ?></label>
                                <div class="uk-form-controls uk-grid-small uk-child-width-1-2" uk-grid>
                                    <label class="uk-hidden-visually" for="finder-filter-w<?php echo $n; ?>"><?php echo Text::_('COM_FINDER_FILTER_DATE' . $n . '_OPERATOR'); ?></label>
                                    <div><select name="w<?php echo $n; ?>" id="finder-filter-w<?php echo $n; ?>" class="uk-select">
                                        <?php foreach ($operators as $value => $label) : ?>
                                            <option value="<?php echo $value; ?>"<?php echo $this->query->{'when' . $n} === $value ? ' selected' : ''; ?>><?php echo Text::_($label); ?></option>
                                        <?php endforeach; ?>
                                    </select></div>
                                    <div><input type="date" name="d<?php echo $n; ?>" id="filter_date<?php echo $n; ?>" class="uk-input" value="<?php echo $this->escape((string) $this->query->{'date' . $n}); ?>"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php echo $branches; ?>
            </div>
        </fieldset>
    <?php endif; ?>
</form>

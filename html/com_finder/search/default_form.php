<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_finder
 *
 * @copyright   (C) 2011 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

/** @var \Joomla\Component\Finder\Site\View\Search\HtmlView $this */

/* Настройка автозаполнения */
if ($this->params->get('show_autosuggest', 1)) {
    $this->getDocument()->getWebAssetManager()->usePreset('awesomplete');
    $this->getDocument()->addScriptOptions('finder-search', ['url' => Route::_('index.php?option=com_finder&task=suggestions.suggest&format=json&tmpl=component', false)]);

    Text::script('COM_FINDER_SEARCH_FORM_LIST_LABEL');
    Text::script('JLIB_JS_AJAX_ERROR_OTHER');
    Text::script('JLIB_JS_AJAX_ERROR_PARSE');
}

$showAdvanced = $this->params->get('expand_advanced', 0);
?>

<form action="<?php echo Route::_($this->query->toUri()); ?>" method="get" class="js-finder-searchform uk-form-stacked">
    
    <?php echo $this->getFields(); ?>

    <style>
        .awesomplete {
            display: block;
            width: 100%;
        }
        /* Desktop: отступ слева для иконки */
        @media (min-width: 640px) {
            .uk-inline .awesomplete .uk-input {
                padding-left: 40px !important; 
            }
        }
        /* Mobile: отступ справа для кнопки-лупы */
        @media (max-width: 639px) {
            .uk-inline .awesomplete .uk-input {
                padding-right: 40px !important;
                padding-left: 10px !important; /* Слева иконки нет */
            }
        }
        /* Стиль для кнопки-иконки внутри инпута */
        .search-icon-btn {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0 10px;
            height: 100%;
        }
        .search-icon-btn:hover {
            color: #1e87f0; /* primary color uikit */
        }
    </style>

    <fieldset class="com-finder__search uk-fieldset uk-margin-medium-bottom">
        <legend class="uk-legend uk-hidden-visually">
            <?php echo Text::_('COM_FINDER_SEARCH_FORM_LEGEND'); ?>
        </legend>

        <div class="uk-margin">

            
            <div class="uk-grid-small" uk-grid>
                
                <div class="uk-width-1-1 uk-width-expand@s">
                    <div class="uk-inline uk-width-1-1">
                        
                        <span class="uk-form-icon uk-visible@s" uk-icon="icon: search"></span>
                        
                        <input type="text" name="q" id="q" 
                               class="js-finder-search-query uk-input uk-width-1-1" 
                               value="<?php echo $this->escape($this->query->input); ?>"
                               placeholder="<?php echo Text::_('COM_FINDER_SEARCH_TERMS'); ?>">
                               
                        <button type="submit" 
                                class="uk-form-icon uk-form-icon-flip search-icon-btn uk-hidden@s" 
                                uk-icon="icon: search; ratio: 1.1"
                                aria-label="<?php echo Text::_('JSEARCH_FILTER_SUBMIT'); ?>">
                        </button>
                    </div>
                </div>
                
                <div class="uk-width-auto uk-visible@s">
                    <button type="submit" class="uk-button uk-button-primary">
                        <?php echo Text::_('JSEARCH_FILTER_SUBMIT'); ?>
                    </button>
                </div>

                <?php if ($this->params->get('show_advanced', 1)) : ?>
                    <div class="uk-width-1-1 uk-width-auto@s">
                        <button class="uk-button uk-button-default uk-width-1-1" type="button" 
                                uk-toggle="target: #advancedSearch; animation: uk-animation-fade"
                                aria-expanded="<?php echo $showAdvanced ? 'true' : 'false'; ?>">
                            <span uk-icon="icon: settings" class="uk-margin-small-right"></span>
                            <span><?php echo Text::_('COM_FINDER_ADVANCED_SEARCH_TOGGLE'); ?></span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </fieldset>

    <?php if ($this->params->get('show_advanced', 1)) : ?>
        <div id="advancedSearch" class="com-finder__advanced js-finder-advanced uk-margin-top" <?php echo $showAdvanced ? '' : 'hidden'; ?>>
            
            <div class="uk-card uk-card-default uk-card-body uk-background-muted uk-border-rounded">
                
                <?php if ($this->params->get('show_advanced_tips', 1)) : ?>

                <?php endif; ?>

                <div id="finder-filter-window" class="com-finder__filter">
                    <?php echo HTMLHelper::_('filter.select', $this->query, $this->params); ?>
                </div>
            </div>
        </div>
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const wrapper = document.getElementById('finder-filter-window');
                if (!wrapper) return;

                // --- 1. ДАТЫ ---
                const oldDateList = wrapper.querySelector('ul#finder-filter-select-dates');
                if (oldDateList) {
                    const newDateGrid = document.createElement('div');
                    newDateGrid.className = 'uk-grid-small uk-text-bold uk-child-width-1-1 uk-child-width-1-2@s uk-margin-bottom';
                    newDateGrid.setAttribute('uk-grid', '');

                    const listItems = oldDateList.querySelectorAll('li');
                    listItems.forEach(li => {
                        const col = document.createElement('div');
                        while (li.firstChild) { col.appendChild(li.firstChild); }
                        
                        const opSelect = col.querySelector('select');
                        if (opSelect) opSelect.className = 'uk-select uk-form-small uk-width-auto uk-margin-small-bottom';

                        const inputGroup = col.querySelector('.input-group') || col.querySelector('.field-calendar > div');
                        if (inputGroup) {
                            inputGroup.className = 'uk-flex uk-flex-middle';
                            const input = inputGroup.querySelector('input');
                            const btn = inputGroup.querySelector('button');
                            if (input) input.className = 'uk-input uk-width-expand'; 
                            if (btn) btn.className = 'uk-button uk-button-default uk-icon';
                        }
                        newDateGrid.appendChild(col);
                    });
                    oldDateList.replaceWith(newDateGrid);
                }

                // --- 2. ОСТАЛЬНЫЕ ФИЛЬТРЫ ---
                const branch = wrapper.querySelector('.filter-branch');
                if (branch) {
                    const gridContainer = document.createElement('div');
                    gridContainer.className = 'uk-grid-small uk-child-width-1-2@s uk-child-width-1-4@l';
                    gridContainer.setAttribute('uk-grid', '');

                    const groups = branch.querySelectorAll('.control-group');
                    groups.forEach(group => {
                        const cell = document.createElement('div');
                        const label = group.querySelector('label');
                        if (label) {
                            label.className = 'uk-form-label uk-text-bold uk-text-small';
                            cell.appendChild(label);
                        }
                        const select = group.querySelector('select');
                        if (select) {
                            select.className = 'uk-select';
                            cell.appendChild(select);
                        }
                        gridContainer.appendChild(cell);
                    });
                    branch.replaceWith(gridContainer);
                }
            });
        </script>
    <?php endif; ?>
</form>
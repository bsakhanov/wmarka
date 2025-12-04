<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_finder
 *
 * @copyright   (C) 2021 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

/** @var \Joomla\Component\Finder\Site\View\Search\HtmlView $this */
?>

<div class="com-finder__sorting uk-flex uk-flex-middle">
    
    <span class="uk-form-label uk-margin-small-right uk-margin-remove-top" id="sorting_label">
        <?php echo Text::_('COM_FINDER_SORT_BY'); ?>
    </span>

    <div class="uk-inline">
        
        <?php foreach ($this->sortOrderFields as $sortOrderField) : ?>
            <?php if ($sortOrderField->active) : ?>
                <button id="sorting_btn" class="uk-button uk-button-default uk-button-small" type="button"
                        aria-haspopup="true"
                        aria-expanded="false" 
                        aria-controls="finder_sorting_list">
                    <?php echo $this->escape($sortOrderField->label); ?>
                    <span uk-icon="icon: chevron-down; ratio: 0.8" class="uk-margin-small-left"></span>
                </button>
                <?php
                // Прерываем цикл после нахождения активного элемента
                break;
                endif; ?>
        <?php endforeach; ?>

        <div uk-dropdown="mode: click; pos: bottom-right; boundary: !.com-finder__sorting; animation: uk-animation-slide-top-small; duration: 200">
            <ul id="finder_sorting_list" class="uk-nav uk-dropdown-nav" role="listbox" aria-labelledby="sorting_label">
                <?php foreach ($this->sortOrderFields as $sortOrderField) : ?>
                    <li class="<?php echo $sortOrderField->active ? 'uk-active' : ''; ?>">
                        <a href="<?php echo Route::_($sortOrderField->url); ?>" 
                           role="option" 
                           <?php echo $sortOrderField->active ? 'aria-current="true"' : ''; ?>>
                            <?php echo $this->escape($sortOrderField->label); ?>
                            
                            <?php // Добавляем галочку для активного пункта для наглядности ?>
                            <?php if ($sortOrderField->active) : ?>
                                <span uk-icon="icon: check; ratio: 0.8" class="uk-float-right"></span>
                            <?php endif; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        
    </div>
</div>
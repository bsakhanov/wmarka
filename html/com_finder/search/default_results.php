<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_finder
 *
 * @copyright   (C) 2011 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;

/** @var \Joomla\Component\Finder\Site\View\Search\HtmlView $this */
?>

<?php // --- БЛОК 1: Подсказки и Пояснения (Suggested/Explained) --- ?>
<?php if (($this->suggested && $this->params->get('show_suggested_query', 1)) || ($this->explained && $this->params->get('show_explained_query', 1))) : ?>
    <div id="search-query-explained" class="com-finder__explained uk-margin-bottom">
        
        <?php // Если есть предложенный запрос (Did you mean...) ?>
        <?php if ($this->suggested && $this->params->get('show_suggested_query', 1)) : ?>
            <?php 
                $uri = Uri::getInstance($this->query->toUri());
                $uri->setVar('q', $this->suggested);
                $linkUrl = Route::_($uri->toString(['path', 'query']));
                $link = '<a href="' . $linkUrl . '" class="uk-link-text uk-text-bold">' . $this->escape($this->suggested) . '</a>'; 
            ?>
            <div class="uk-alert-warning" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p>
                    <span uk-icon="icon: info; ratio: 0.8" class="uk-margin-small-right"></span>
                    <?php echo Text::sprintf('COM_FINDER_SEARCH_SIMILAR', $link); ?>
                </p>
            </div>

        <?php // Если выводится пояснение к результатам ?>
        <?php elseif ($this->explained && $this->params->get('show_explained_query', 1)) : ?>
            <div class="uk-alert-primary" uk-alert>
                 <p role="alert">
                    <?php echo Text::plural('COM_FINDER_QUERY_RESULTS', $this->total, $this->explained); ?>
                </p>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>


<?php // --- БЛОК 2: Ничего не найдено (No Results) --- ?>
<?php if (($this->total === 0) || ($this->total === null)) : ?>
    <div id="search-result-empty" class="com-finder__empty uk-placeholder uk-text-center">
        <span uk-icon="icon: search; ratio: 2" class="uk-text-muted uk-margin-bottom"></span>
        <h2 class="uk-h3"><?php echo Text::_('COM_FINDER_SEARCH_NO_RESULTS_HEADING'); ?></h2>
        <?php $multilang = Factory::getApplication()->getLanguageFilter() ? '_MULTILANG' : ''; ?>
        <p class="uk-text-muted">
            <?php echo Text::sprintf('COM_FINDER_SEARCH_NO_RESULTS_BODY' . $multilang, $this->escape($this->query->input)); ?>
        </p>
    </div>
    <?php // Выход из шаблона, так как результатов нет ?>
    <?php return; ?>
<?php endif; ?>


<?php // --- БЛОК 3: Сортировка (Sorting) --- ?>
<?php if ($this->params->get('show_sort_order', 0) && !empty($this->sortOrderFields) && !empty($this->results)) : ?>
    <div id="search-sorting" class="com-finder__sorting uk-margin-bottom uk-flex uk-flex-right@s">
        <?php // Сортировку мы оставляем на loadTemplate, но обернули в flex для выравнивания ?>
        <?php echo $this->loadTemplate('sorting'); ?>
    </div>
<?php endif; ?>


<?php // --- БЛОК 4: JS Подсветка (Highlighting) --- ?>
<?php if (!empty($this->query->highlight) && $this->params->get('highlight_terms', 1)) : ?>
    <?php
        $this->getDocument()->getWebAssetManager()->useScript('highlight');
        $this->getDocument()->addScriptOptions(
            'highlight',
            [[
                    'class'      => 'js-highlight',
                    'highLight'  => array_slice($this->query->highlight, 0, 10),
            ]]
        );
    ?>
<?php endif; ?>


<?php // --- БЛОК 5: Список результатов (Results List) --- ?>
<ul id="search-result-list" class="js-highlight com-finder__results-list uk-list uk-list-divider uk-list-large" start="<?php echo (int) $this->pagination->limitstart + 1; ?>">
    <?php $this->baseUrl = Uri::getInstance()->toString(['scheme', 'host', 'port']); ?>
    
    <?php foreach ($this->results as $i => $result) : ?>
        <?php $this->result = &$result; ?>
        <?php $this->result->counter = $i + 1; ?>
        
        <?php // Получаем имя макета (обычно 'result', который мы делали на предыдущем шаге) ?>
        <?php $layout = $this->getLayoutFile($this->result->layout); ?>
        
        <?php echo $this->loadTemplate($layout); ?>
    <?php endforeach; ?>
</ul>


<?php // --- БЛОК 6: Пагинация (Pagination) --- ?>
<div class="com-finder__navigation search-pagination uk-margin-large-top">
    
    <?php // Сама пагинация (номера страниц) ?>
    <?php if ($this->params->get('show_pagination', 1) > 0) : ?>
    <div class="com-finder__pagination uk-flex uk-flex-center">
        <?php echo $this->pagination->getPagesLinks(); ?>
    </div>
    <?php endif; ?>

    <?php // Счетчик "Результаты X - Y из Z" ?>
    <?php if ($this->params->get('show_pagination_results', 1) > 0) : ?>
        <div class="com-finder__counter search-pages-counter uk-text-center uk-text-meta uk-margin-small-top">
            <?php 
                $start = (int) $this->pagination->limitstart + 1;
                $total = (int) $this->pagination->total;
                $limit = (int) $this->pagination->limit * $this->pagination->pagesCurrent;
                $limit = (int) min($limit, $total);
            ?>
            <?php echo Text::sprintf('COM_FINDER_SEARCH_RESULTS_OF', $start, $limit, $total); ?>
        </div>
    <?php endif; ?>
</div>
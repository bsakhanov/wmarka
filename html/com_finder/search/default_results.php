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

?>
<?php // Display the suggested search if it is different from the current search. ?>
<?php // Display the 'no results' message and exit the template. ?>
<?php if (($this->total === 0) || ($this->total === null)) : ?>
    <div id="search-result-empty" class="com-finder__empty">
        <h2><?php echo Text::_('COM_FINDER_SEARCH_NO_RESULTS_HEADING'); ?></h2>
        <?php $multilang = Factory::getApplication()->getLanguageFilter() ? '_MULTILANG' : ''; ?>
        <p><?php echo Text::sprintf('COM_FINDER_SEARCH_NO_RESULTS_BODY' . $multilang, $this->escape($this->query->input)); ?></p>
    </div>
    <?php // Exit this template. ?>
    <?php return; ?>
<?php endif; ?>
<?php // Display the 'Sort By' drop-down. ?>
<?php if ($this->params->get('show_sort_order', 0) && !empty($this->sortOrderFields) && !empty($this->results)) : ?>
    <div id="search-sorting" class="com-finder__sorting">
        <?php echo $this->loadTemplate('sorting'); ?>
    </div>
<?php endif; ?>
<?php // Activate the highlighter if enabled. ?>
<?php if (!empty($this->query->highlight) && $this->params->get('highlight_terms', 1)) : ?>
    <?php
        $this->document->getWebAssetManager()->useScript('highlight');
        $this->document->addScriptOptions(
            'highlight',
            [[
                    'class'      => 'js-highlight',
                    'highLight'  => $this->query->highlight,
            ]]
        );
    ?>
<?php endif; ?>
<?php // Display a list of results ?>
 
<ul id="search-result-list" class="uk-list uk-list-decimal" start="<?php echo (int) $this->pagination->limitstart + 1; ?>">
    <?php $this->baseUrl = Uri::getInstance()->toString(['scheme', 'host', 'port']); ?>
    <?php foreach ($this->results as $i => $result) : ?>
        <?php $this->result = &$result; ?>
        <?php $this->result->counter = $i + 1; ?>
        <?php $layout = $this->getLayoutFile($this->result->layout); ?>
        <?php echo $this->loadTemplate($layout); ?>
    <?php endforeach; ?>
</ul>
<?php // Display the pagination ?>
<div class="com-finder__navigation search-pagination">
    <?php if ($this->params->get('show_pagination', 1) > 0) : ?>
    <div class="com-finder__pagination w-100">
        <?php echo $this->pagination->getPagesLinks(); ?>
    </div>
    <?php endif; ?>
    <?php if ($this->params->get('show_pagination_results', 1) > 0) : ?>
        <div class="com-finder__counter search-pages-counter">
            <?php // Prepare the pagination string.  Results X - Y of Z ?>
            <?php $start = (int) $this->pagination->limitstart + 1; ?>
            <?php $total = (int) $this->pagination->total; ?>
            <?php $limit = (int) $this->pagination->limit * $this->pagination->pagesCurrent; ?>
            <?php $limit = (int) ($limit > $total ? $total : $limit); ?>
            <?php echo Text::sprintf('COM_FINDER_SEARCH_RESULTS_OF', $start, $limit, $total); ?>
        </div>
    <?php endif; ?>
</div>

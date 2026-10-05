<?php
/**
 * WMARKA — результаты поиска: подсказка «возможно, вы искали», пояснение
 * запроса, сортировка, список, пагинация и счётчик.
 *
 * @var \Joomla\Component\Finder\Site\View\Search\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;

if (($this->suggested && $this->params->get('show_suggested_query', 1)) || ($this->explained && $this->params->get('show_explained_query', 1))) : ?>
    <div class="uk-margin">
        <?php if ($this->suggested && $this->params->get('show_suggested_query', 1)) : ?>
            <?php
            $uri = Uri::getInstance($this->query->toUri());
            $uri->setVar('q', $this->suggested);
            $link = '<a class="uk-text-bold" href="' . Route::_($uri->toString(['path', 'query'])) . '">' . $this->escape($this->suggested) . '</a>';
            ?>
            <div class="uk-alert-warning" uk-alert><p><?php echo Text::sprintf('COM_FINDER_SEARCH_SIMILAR', $link); ?></p></div>
        <?php elseif ($this->explained && $this->params->get('show_explained_query', 1)) : ?>
            <p class="uk-text-meta" role="status"><?php echo Text::plural('COM_FINDER_QUERY_RESULTS', $this->total, $this->explained); ?></p>
        <?php endif; ?>
    </div>
<?php endif;

if ((int) $this->total === 0) : ?>
    <div class="uk-placeholder uk-text-center">
        <span class="uk-text-muted" uk-icon="icon: search; ratio: 2"></span>
        <h2 class="uk-h3 uk-margin-small-top"><?php echo Text::_('COM_FINDER_SEARCH_NO_RESULTS_HEADING'); ?></h2>
        <p class="uk-text-muted"><?php echo Text::sprintf('COM_FINDER_SEARCH_NO_RESULTS_BODY' . (Factory::getApplication()->getLanguageFilter() ? '_MULTILANG' : ''), $this->escape($this->query->input)); ?></p>
    </div>
<?php return; endif;

if ($this->params->get('show_sort_order', 0) && !empty($this->sortOrderFields) && !empty($this->results)) : ?>
    <div class="uk-flex uk-flex-right uk-margin"><?php echo $this->loadTemplate('sorting'); ?></div>
<?php endif;

if (!empty($this->query->highlight) && $this->params->get('highlight_terms', 1)) {
    $this->getDocument()->getWebAssetManager()->useScript('highlight');
    $this->getDocument()->addScriptOptions('highlight', [['class' => 'js-highlight', 'highLight' => array_slice($this->query->highlight, 0, 10)]]);
}

$this->baseUrl = Uri::getInstance()->toString(['scheme', 'host', 'port']);
?>
<ol id="search-result-list" class="js-highlight uk-list uk-list-divider uk-list-large" start="<?php echo (int) $this->pagination->limitstart + 1; ?>">
    <?php foreach ($this->results as $i => $result) : ?>
        <?php $this->result = &$result; ?>
        <?php $this->result->counter = $i + 1; ?>
        <?php echo $this->loadTemplate($this->getLayoutFile($this->result->layout)); ?>
    <?php endforeach; ?>
</ol>

<?php if ($this->params->get('show_pagination', 1) > 0 && ($this->pagination->pagesTotal ?? 1) > 1) : ?>
    <?php echo $this->pagination->getPagesLinks(); ?>
<?php endif; ?>

<?php if ($this->params->get('show_pagination_results', 1) > 0) : ?>
    <?php
    $start = (int) $this->pagination->limitstart + 1;
    $total = (int) $this->pagination->total;
    $limit = min((int) $this->pagination->limit * (int) $this->pagination->pagesCurrent, $total);
    ?>
    <p class="uk-text-meta uk-text-center"><?php echo Text::sprintf('COM_FINDER_SEARCH_RESULTS_OF', $start, $limit, $total); ?></p>
<?php endif;

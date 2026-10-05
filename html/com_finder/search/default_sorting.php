<?php
/**
 * WMARKA — сортировка результатов: кнопка с выпадающим списком UIkit.
 *
 * @var \Joomla\Component\Finder\Site\View\Search\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

$active = '';

foreach ($this->sortOrderFields as $field) {
    if ($field->active) {
        $active = $field->label;
    }
}
?>
<div class="uk-inline">
    <span class="uk-text-meta uk-margin-small-right" id="sorting_label"><?php echo Text::_('COM_FINDER_SORT_BY'); ?></span>
    <button class="uk-button uk-button-default uk-button-small" type="button" aria-haspopup="listbox"><?php echo $this->escape($active); ?> <span uk-icon="icon: chevron-down; ratio: 0.8"></span></button>
    <div uk-dropdown="mode: click; pos: bottom-right">
        <ul class="uk-nav uk-dropdown-nav" role="listbox" aria-labelledby="sorting_label">
            <?php foreach ($this->sortOrderFields as $field) : ?>
                <li<?php echo $field->active ? ' class="uk-active"' : ''; ?>><a href="<?php echo Route::_($field->url); ?>" role="option"<?php echo $field->active ? ' aria-selected="true"' : ''; ?>><?php echo $this->escape($field->label); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

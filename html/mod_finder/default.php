<?php
/**
 * WMARKA — модуль умного поиска: поле uk-search (в навбаре — компактное),
 * автоподсказка ядра, ссылка или фильтры расширенного поиска.
 *
 * @var \Joomla\Registry\Registry $params
 * @var object $module
 * @var string $route
 * @var \Joomla\CMS\Application\SiteApplication $app
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$app->getLanguage()->load('com_finder', JPATH_SITE);

$wa = $app->getDocument()->getWebAssetManager();
$wa->getRegistry()->addExtensionRegistryFile('com_finder');

if ($params->get('show_autosuggest', 1)) {
    $wa->usePreset('awesomplete');
    $app->getDocument()->addScriptOptions('finder-search', ['url' => Route::_('index.php?option=com_finder&task=suggestions.suggest&format=json&tmpl=component', false)]);
    Text::script('COM_FINDER_SEARCH_FORM_LIST_LABEL');
    Text::script('JLIB_JS_AJAX_ERROR_OTHER');
    Text::script('JLIB_JS_AJAX_ERROR_PARSE');
}

$wa->useScript('com_finder.finder');

$helper   = $app->bootModule('mod_finder', 'site')->getHelper('FinderHelper');
$inNavbar = str_starts_with((string) $module->position, 'navbar');
$id       = 'mod-finder-searchword' . (int) $module->id;
$label    = $params->get('alt_label', Text::_('JSEARCH_FILTER_SUBMIT'));
$advanced = (int) $params->get('show_advanced', 0);
?>
<search<?php echo $inNavbar ? ' class="uk-navbar-item"' : ''; ?>>
    <form class="js-finder-searchform" action="<?php echo Route::_($route); ?>" method="get" aria-label="<?php echo Ui::esc($label); ?>">
        <?php if ($params->get('show_label', 1) && !$inNavbar) : ?>
            <label for="<?php echo $id; ?>" class="uk-form-label"><?php echo Ui::esc($label); ?></label>
        <?php else : ?>
            <label for="<?php echo $id; ?>" class="uk-hidden-visually"><?php echo Ui::esc($label); ?></label>
        <?php endif; ?>
        <div class="uk-grid-small uk-flex-middle" uk-grid>
            <div class="uk-width-expand"><div class="uk-search uk-search-default uk-width-1-1">
                <span uk-search-icon></span>
                <input type="search" name="q" id="<?php echo $id; ?>" class="js-finder-search-query uk-search-input" value="<?php echo htmlspecialchars($app->getInput()->get('q', '', 'string'), ENT_COMPAT, 'UTF-8'); ?>" placeholder="<?php echo Text::_('MOD_FINDER_SEARCH_VALUE'); ?>" autocomplete="off">
            </div></div>
            <?php if ($params->get('show_button', 0)) : ?>
                <div class="uk-width-auto"><button class="uk-button uk-button-primary" type="submit"><?php echo Text::_('JSEARCH_FILTER_SUBMIT'); ?></button></div>
            <?php endif; ?>
        </div>
        <?php if ($advanced === 2) : ?>
            <a class="uk-text-small" href="<?php echo Route::_($route); ?>"><?php echo Text::_('COM_FINDER_ADVANCED_SEARCH'); ?></a>
        <?php elseif ($advanced === 1) : ?>
            <div class="js-finder-advanced uk-margin-small-top"><?php echo Ui::bridge((string) HTMLHelper::_('filter.select', $query, $params)); ?></div>
        <?php endif; ?>
        <?php echo $helper->getHiddenFields($route); ?>
    </form>
</search>

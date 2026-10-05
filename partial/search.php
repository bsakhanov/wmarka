<?php
/**
 * WMARKA — модальное окно поиска (умный поиск com_finder).
 * Адрес — пункт меню из настроек или маршрут компонента.
 *
 * @var \Wmarka\Template\Helper $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Wmarka\Template\Config;
use Wmarka\Template\Ui;

if (!Config::bool('search_show', true)) {
    return;
}

$itemId = Config::int('search_itemid', 0);
$action = Route::_('index.php?option=com_finder&view=search' . ($itemId ? '&Itemid=' . $itemId : ''));
?>
<div id="wm-search" class="uk-modal-full" uk-modal>
    <div class="uk-modal-dialog uk-flex uk-flex-center uk-flex-middle" uk-height-viewport>
        <button class="uk-modal-close-full uk-close-large" type="button" uk-close aria-label="<?php echo Ui::esc(Text::_('JLIB_HTML_BEHAVIOR_CLOSE')); ?>"></button>
        <form class="uk-search uk-search-large uk-width-xlarge@m uk-width-1-1 uk-padding" action="<?php echo $action; ?>" method="get" role="search">
            <input class="uk-search-input uk-text-center" type="search" name="q" placeholder="<?php echo Ui::esc(Text::_('TPL_WMARKA_SEARCH_PLACEHOLDER')); ?>" aria-label="<?php echo Ui::esc(Text::_('TPL_WMARKA_SEARCH')); ?>" data-wm-autofocus>
            <?php if (!$itemId) : ?>
                <input type="hidden" name="option" value="com_finder">
                <input type="hidden" name="view" value="search">
            <?php endif; ?>
            <p class="uk-text-meta uk-text-center uk-margin-small-top"><?php echo Text::_('TPL_WMARKA_SEARCH_HINT'); ?></p>
        </form>
    </div>
</div>

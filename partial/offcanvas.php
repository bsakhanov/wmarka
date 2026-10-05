<?php
/**
 * WMARKA — мобильная панель: меню (offcanvas-menu или копия меню навбара),
 * модули offcanvas, контакты из настроек.
 *
 * @var \Wmarka\Template\Helper $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Wmarka\Template\Config;
use Wmarka\Template\Helper;
use Wmarka\Template\Ui;

if (!$this->hasOffcanvas()) {
    return;
}

$mode     = Config::str('offcanvas_mode', 'slide');
$mode     = \in_array($mode, ['slide', 'push', 'reveal', 'none'], true) ? $mode : 'slide';
$flip     = Config::bool('offcanvas_flip', true) ? 'true' : 'false';
$contacts = Config::bool('offcanvas_contacts', true) ? Helper::contacts() : [];
?>
<div id="wm-offcanvas" uk-offcanvas="mode: <?php echo $mode; ?>; overlay: true; flip: <?php echo $flip; ?>">
    <div class="uk-offcanvas-bar uk-flex uk-flex-column">
        <button class="uk-offcanvas-close" type="button" uk-close aria-label="<?php echo Ui::esc(Text::_('JLIB_HTML_BEHAVIOR_CLOSE')); ?>"></button>

        <div class="uk-margin-medium-bottom"><?php echo $this->logo('offcanvas'); ?></div>

        <?php echo $this->offcanvasMenus(); ?>

        <?php if ($this->count('offcanvas')) : ?>
            <div class="uk-margin-medium-top uk-child-width-1-1" uk-grid><?php echo $this->modules('offcanvas'); ?></div>
        <?php endif; ?>

        <?php if ($contacts) : ?>
            <ul class="uk-list uk-margin-auto-top uk-padding-small uk-padding-remove-horizontal">
                <?php foreach ($contacts as $key => $c) : ?>
                    <li class="uk-flex uk-flex-middle">
                        <?php echo Ui::icon(Helper::contactIcon($key), 0.9, 'uk-margin-small-right'); ?>
                        <?php if ($c['href'] !== '') : ?>
                            <a href="<?php echo Ui::esc($c['href']); ?>"<?php echo str_starts_with($c['href'], 'http') ? ' target="_blank" rel="noopener"' : ''; ?>><?php echo Ui::esc($c['label']); ?></a>
                        <?php else : ?>
                            <span><?php echo Ui::esc($c['label']); ?></span>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>

<?php
/**
 * WMARKA — верхняя полоса: модули toolbar / toolbar-left слева,
 * контакты из настроек, toolbar-right и переключатель языков справа.
 *
 * @var \Wmarka\Template\Helper $this
 */

\defined('_JEXEC') or die;

use Wmarka\Template\Config;
use Wmarka\Template\Helper;
use Wmarka\Template\Ui;

if (!Config::bool('toolbar_show', true)) {
    return;
}

$contacts = Config::bool('toolbar_contacts', true) ? Helper::contacts() : [];
$left     = $this->count('toolbar') || $this->count('toolbar-left');
$right    = $this->count('toolbar-right') || $this->count('lang');

if (!$left && !$right && !$contacts) {
    return;
}

$style   = Config::str('toolbar_style', 'secondary');
$visible = Config::bool('toolbar_mobile', false) ? '' : ' uk-visible@' . Config::bp();
$light   = \in_array($style, ['secondary', 'primary'], true) ? ' uk-light' : '';
$inline  = array_intersect_key($contacts, array_flip(['address', 'hours', 'phone', 'phone2', 'email']));
$icons   = array_intersect_key($contacts, array_flip(['whatsapp', 'telegram']));
?>
<div id="toolbar" class="uk-section uk-section-<?php echo $style; ?> uk-section-xsmall uk-padding-remove-vertical<?php echo $light . $visible; ?>">
    <div class="<?php echo Config::container(); ?>">
        <div class="uk-flex uk-flex-middle uk-flex-between uk-flex-wrap uk-text-small" style="min-height: 40px">
            <div class="uk-flex uk-flex-middle uk-flex-wrap">
                <?php if ($left) : ?>
                    <?php echo $this->modules('toolbar', 'none'); ?>
                    <?php echo $this->modules('toolbar-left', 'none'); ?>
                <?php endif; ?>
                <?php foreach (['address', 'hours'] as $key) : ?>
                    <?php if (isset($inline[$key])) : ?>
                        <span class="uk-margin-right uk-flex uk-flex-middle"><?php echo Ui::icon(Helper::contactIcon($key), 0.8, 'uk-margin-xsmall-right'); ?>
                        <?php if ($inline[$key]['href'] !== '') : ?><a class="uk-link-reset" href="<?php echo Ui::esc($inline[$key]['href']); ?>" target="_blank" rel="noopener"><?php echo Ui::esc($inline[$key]['label']); ?></a><?php else : ?><?php echo Ui::esc($inline[$key]['label']); ?><?php endif; ?></span>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="uk-flex uk-flex-middle uk-flex-wrap">
                <?php foreach (['phone', 'phone2', 'email'] as $key) : ?>
                    <?php if (isset($inline[$key])) : ?>
                        <a class="uk-link-reset uk-margin-right uk-flex uk-flex-middle" href="<?php echo Ui::esc($inline[$key]['href']); ?>"><?php echo Ui::icon(Helper::contactIcon($key), 0.8, 'uk-margin-xsmall-right'); ?><?php echo Ui::esc($inline[$key]['label']); ?></a>
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php if ($icons) : ?>
                    <ul class="uk-iconnav uk-margin-right">
                        <?php foreach ($icons as $key => $c) : ?>
                            <li><a href="<?php echo Ui::esc($c['href']); ?>" target="_blank" rel="noopener" uk-icon="icon: <?php echo Helper::contactIcon($key); ?>; ratio: 0.9" aria-label="<?php echo Ui::esc($c['label']); ?>" title="<?php echo Ui::esc($c['label']); ?>"></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <?php echo $this->modules('toolbar-right', 'none'); ?>
                <?php echo $this->modules('lang', 'none'); ?>
            </div>
        </div>
    </div>
</div>

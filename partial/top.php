<?php
/**
 * WMARKA — позиции над основным контентом: adver-top, slider, block-a, block-b.
 *
 * @var \Wmarka\Template\Helper $this
 */

\defined('_JEXEC') or die;

// Блоки главной — только на главной: страницы, открытые через главный пункт меню, но не являющиеся
// главной (материалы при главном пункте «блог категории»), не получают её слайдер и блоки
if (\Wmarka\Template\Config::homeBlocksOnly() && $this->viaDefault()) {
    return;
}

use Wmarka\Template\Config;

if ($this->count('adver-top')) : ?>
<div id="adver-top" class="uk-section uk-section-muted uk-section-xsmall uk-visible@m">
    <div class="<?php echo Config::container(); ?> uk-text-center"><?php echo $this->modules('adver-top', 'none'); ?></div>
</div>
<?php endif;

if ($this->count('slider')) {
    echo $this->isBare('slider') ? $this->modules('slider', 'none') : '<div id="slider">' . $this->modules('slider', 'none') . '</div>';
}

echo $this->block('block-a');
echo $this->block('block-b');

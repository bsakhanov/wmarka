<?php
/**
 * WMARKA — позиции под основным контентом: block-c … block-k.
 *
 * @var \Wmarka\Template\Helper $this
 */

\defined('_JEXEC') or die;

// Блоки главной — только на главной: страницы, открытые через главный пункт меню, но не являющиеся
// главной (материалы при главном пункте «блог категории»), не получают её слайдер и блоки
if (\Wmarka\Template\Config::bool('home_positions_only', false) && $this->viaDefault()) {
    return;
}

foreach (['block-c', 'block-d', 'block-e', 'block-f', 'block-g', 'block-h', 'block-i', 'block-k'] as $position) {
    echo $this->block($position);
}

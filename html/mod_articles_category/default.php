<?php
/**
 * WMARKA — «Материалы категории» (устаревший модуль ядра, поддерживается).
 * Группировка, служебные данные модуля; макеты default, wm-media, wm-cards, wm-slider.
 *
 * @var \Joomla\Registry\Registry $params
 * @var array $list
 * @var bool  $grouped
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Wmarka\Template\Card;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

if (empty($list)) {
    return;
}

$style  = Card::styleFromLayout($params, 'list');
$render = static function (array $items) use ($params, $style): string {
    $cards = [];

    foreach ($items as $item) {
        $card = Card::module($item, $params, ['image' => $style !== 'list']);

        if ($params->get('show_readmore')) {
            $card['readmore'] = '<a class="uk-button uk-button-text" href="' . $item->link . '">' . Text::_('TPL_WMARKA_READ_MORE') . '</a>';
        }

        $cards[] = $card;
    }

    return Card::items($cards, $style, ['columns' => 3]);
};

if ($grouped) {
    foreach ($list as $group => $items) {
        echo '<h4 class="uk-heading-line uk-text-small"><span>' . Text::_($group) . '</span></h4>' . $render($items);
    }
} else {
    echo $render($list);
}

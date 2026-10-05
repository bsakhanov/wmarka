<?php
/**
 * WMARKA — «Популярные материалы». Макеты: default (список), wm-media, wm-cards, wm-slider.
 * Миниатюры — интро-профиль (тот же файл, что в блоге).
 *
 * @var \Joomla\Registry\Registry $params
 * @var array $list
 */

\defined('_JEXEC') or die;

use Wmarka\Template\Card;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

if (!isset($list) || empty($list)) {
    echo $hitsDisabledMessage ?? '';
    return;
}

$style = Card::styleFromLayout($params, 'list');
$cards = array_map(static fn ($item) => Card::module($item, $params, ['date' => 'publish_up', 'image' => $style !== 'list']), $list);

echo Card::items($cards, $style, ['columns' => 3]);

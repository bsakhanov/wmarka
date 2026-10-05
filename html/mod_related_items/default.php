<?php
/**
 * WMARKA — «Похожие материалы». Хелпер ядра картинку не выбирает —
 * images догружаются одним запросом (Image::articles), миниатюра — интро.
 * Макеты: default (список), wm-media, wm-cards, wm-slider.
 *
 * @var \Joomla\Registry\Registry $params
 * @var array $list
 * @var bool  $showDate
 */

\defined('_JEXEC') or die;

use Wmarka\Template\Card;
use Wmarka\Template\Image;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

if (empty($list)) {
    return;
}

$style = Card::styleFromLayout($params, 'list');
$rows  = $style === 'list' ? [] : Image::articles(array_map(static fn ($i) => (int) $i->id, $list));
$cards = [];

foreach ($list as $item) {
    $cards[] = Card::module($item, $params, [
        'link'  => $item->route,
        'date'  => $showDate ? 'created' : null,
        'image' => $style !== 'list',
        'row'   => $rows[(int) $item->id] ?? $item,
    ]);
}

echo Card::items($cards, $style, ['columns' => 3]);

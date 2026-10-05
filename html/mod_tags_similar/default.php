<?php
/**
 * WMARKA — «Похожие по меткам». Для материалов com_content миниатюра —
 * интро-профиль (images одним запросом). Макеты: default, wm-media, wm-cards, wm-slider.
 *
 * @var \Joomla\Registry\Registry $params
 * @var array $list
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Router\Route;
use Wmarka\Template\Card;
use Wmarka\Template\Image;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

if (empty($list)) {
    return;
}

$style = Card::styleFromLayout($params, 'list');
$ids   = [];

foreach ($list as $item) {
    if ($item->type_alias === 'com_content.article') {
        $ids[] = (int) $item->content_item_id;
    }
}

$rows  = $style === 'list' ? [] : Image::articles($ids);
$cards = [];

foreach ($list as $item) {
    $static = \in_array($item->type_alias, ['com_users.category', 'com_banners.category'], true);
    $cards[] = Card::module($item, $params, [
        'link'  => $static ? '' : Route::_($item->link),
        'image' => $style !== 'list' && isset($rows[(int) $item->content_item_id]),
        'row'   => $rows[(int) $item->content_item_id] ?? $item,
    ]);
}

echo Card::items($cards, $style, ['columns' => 3]);

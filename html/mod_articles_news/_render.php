<?php
/**
 * WMARKA — «Новости» (newsflash): default — стопка карточек, horizontal —
 * карточки в ряд, vertical — список. Картинка — интро-профиль.
 *
 * @var \Joomla\Registry\Registry $params
 * @var array  $list
 * @var string $wmStyle
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Layout\LayoutHelper;
use Wmarka\Template\Card;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

if (empty($list)) {
    return;
}

$image = $params->get('img_intro_full', 'none') !== 'none';
$cards = [];

foreach ($list as $item) {
    $readmore = '';

    if (isset($item->link) && $item->readmore != 0 && $params->get('readmore')) {
        if ($params->get('readmore_title', '') !== '') {
            $item->params->set('show_readmore_title', $params->get('readmore_title'));
        }

        $readmore = LayoutHelper::render('joomla.content.readmore', ['item' => $item, 'params' => $item->params, 'link' => $item->link]);
    }

    $cards[] = [
        'title'     => $params->get('item_title') ? (string) $item->title : '',
        'link'      => ($item->link !== '' && $params->get('link_titles')) ? $item->link : '',
        'imageLink' => $item->link,
        'thumb'     => $image ? \Wmarka\Template\Image::intro($item) : [],
        'meta'      => [],
        'text'      => $params->get('show_introtext', 1) ? \Wmarka\Template\Ui::excerpt($item->introtext, \Wmarka\Template\Ui::introLimit()) : '',
        'readmore'  => $readmore,
        'events'    => ['afterTitle' => $params->get('intro_only') ? '' : $item->afterDisplayTitle, 'before' => $item->beforeDisplayContent, 'after' => $item->afterDisplayContent],
    ];
}

$heading = Ui::htag($params->get('item_heading', 'h4'), 'h4');

echo Card::items($cards, $wmStyle, ['columns' => $wmColumns ?? ($wmStyle === 'cards' ? min(4, max(1, \count($cards))) : 1), 'heading' => $heading]);

<?php
/**
 * WMARKA — «Материалы» (mod_articles, Joomla 5.2+).
 * Сетка/список по настройкам модуля; картинка — всегда интро-миниатюра
 * (опция «Изображение: вступительное/полное» выбирает источник, но не размер).
 * Макеты: default, wm-media (миниатюра слева), wm-cards, wm-slider.
 *
 * @var \Joomla\Registry\Registry $params
 * @var array $list
 * @var bool  $grouped
 * @var object $module
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Wmarka\Template\Card;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

if (empty($list)) {
    return;
}

$image   = $params->get('img_intro_full', 'none') !== 'none';
$style   = $params->get('title_only', 0) ? 'list' : ((int) $params->get('articles_layout', 0) === 1 ? 'cards' : ($image ? 'cards' : 'list'));
$style   = Card::styleFromLayout($params, $style);
$columns = (int) $params->get('articles_layout', 0) === 1 ? (int) $params->get('layout_columns', 3) : 1;
$columns = $style === 'slider' ? max(2, $columns) : $columns;
$heading = Ui::htag($params->get('item_heading', 'h4'), 'h4');

$render = static function (array $items) use ($params, $style, $columns, $heading, $image, $module): string {
    $cards = [];

    foreach ($items as $item) {
        $card = Card::module($item, $params, ['image' => $image || \in_array($style, ['media', 'slider'], true)]);

        if (!$params->get('item_title', 1)) {
            $card['title'] = '';
        }

        if ($params->get('show_readmore') && (!empty($item->fulltext) || !empty($item->introTextTruncated))) {
            $card['readmore'] = '<a class="uk-button uk-button-text" href="' . $item->link . '">' . Text::_('TPL_WMARKA_READ_MORE') . '</a>';
        }

        $card['events'] = [
            'afterTitle' => $item->event->afterDisplayTitle ?? '',
            'before'     => $item->event->beforeDisplayContent ?? '',
            'after'      => $item->event->afterDisplayContent ?? '',
        ];
        $cards[] = $card;
    }

    return Card::items($cards, $style, ['columns' => $columns, 'heading' => $heading, 'compact' => (string) ($module->position ?? '') === 'mega' || str_starts_with((string) ($module->position ?? ''), 'sidebar'), 'bare' => (string) ($module->position ?? '') === 'mega']);
};

if ($grouped) {
    foreach ($list as $group => $items) {
        echo '<h4 class="uk-heading-line uk-text-small"><span>' . Text::_($group) . '</span></h4>' . $render($items);
    }
} else {
    echo $render($list);
}

<?php
/**
 * WMARKA — элемент избранного: единая карточка.
 *
 * @var \Joomla\Component\Content\Site\View\Featured\HtmlView $this
 */

\defined('_JEXEC') or die;

use Wmarka\Template\Card;
use Wmarka\Template\Seo;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$card = Card::article($this->item, $this->item->params, $this->wmCard ?? []);

if ($card['link'] !== '') {
    Seo::addListItem((string) $this->item->title, $card['link']);
}

echo Card::render($card);

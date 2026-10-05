<?php
/**
 * WMARKA — материалы контакта: медиа-список с интро-миниатюрами
 * (тот же файл превью, что в блоге и модулях).
 *
 * @var \Joomla\Component\Contact\Site\View\Contact\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;
use Wmarka\Template\Card;
use Wmarka\Template\Image;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

if (!$this->params->get('show_articles') || empty($this->item->articles)) {
    return;
}

$rows  = Image::articles(array_map(static fn ($a) => (int) $a->id, $this->item->articles));
$cards = [];

foreach ($this->item->articles as $article) {
    $row     = $rows[(int) $article->id] ?? $article;
    $cards[] = [
        'title' => (string) $article->title,
        'link'  => Route::_(RouteHelper::getArticleRoute($article->slug, $article->catid, $article->language)),
        'thumb' => Image::intro($row),
        // Дата публикации — в новостной подаче («Вчера, 18:50»), как в ленте сайта
        'meta'  => \Wmarka\Template\Ui::validDate($article->publish_up ?? null) ? ['<time datetime="' . \Wmarka\Template\Ui::iso($article->publish_up) . '">' . \Wmarka\Template\Ui::newsDate($article->publish_up) . '</time>'] : [],
    ];
}

echo Card::items($cards, $this->item->params->get('wm_articles_style', 'media'), ['columns' => 3]);

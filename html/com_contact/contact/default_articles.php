<?php
/**
 * WMARKA — материалы контакта (страница автора): медиа-список с интро-миниатюрами и листалкой.
 *
 * Ядро (ContactModel::getItem) отдаёт только последние N материалов автора — «Количество
 * материалов» (articles_display_num) — и листать дальше нельзя. Здесь тот же запрос ядра
 * повторён с подсчётом и смещением: N материалов на страницу, остальные — постраничной
 * навигацией (?start=N). Условия выборки как у ядра: автор, уровни доступа, язык на
 * многоязычном сайте, опубликованные и архивные в окне публикации; порядок — от новых
 * к старым, при равной дате — по номеру, чтобы страницы не пересекались.
 *
 * @var \Joomla\Component\Contact\Site\View\Contact\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\Pagination\Pagination;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;
use Joomla\Database\DatabaseInterface;
use Joomla\Database\ParameterType;
use Wmarka\Template\Card;
use Wmarka\Template\Image;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$item = $this->item;

if (!$this->params->get('show_articles') || empty($item->articles) || !(int) $item->user_id) {
    return;
}

$app = Factory::getApplication();
$db  = Factory::getContainer()->get(DatabaseInterface::class);

// «Количество материалов»: пункт меню → сам контакт → общие настройки контактов (как в ядре)
$limit = $this->params->get('articles_display_num', 10);

if ($limit === 'use_contact') {
    $limit = $item->params->get('articles_display_num', 10);

    if ((string) $limit === '') {
        $limit = ComponentHelper::getParams('com_contact')->get('articles_display_num', 10);
    }
}

$limit     = max(1, (int) $limit);
$published = $this->state->get('filter.published');
$now       = Factory::getDate()->toSql();

// Условия выборки ядра; новый запрос на каждый вызов (у запроса свои привязанные значения)
$base = static function () use ($db, $item, $app, $published, $now) {
    $query = $db->createQuery()
        ->from($db->quoteName('#__content', 'a'))
        ->where($db->quoteName('a.created_by') . ' = :author')
        ->whereIn($db->quoteName('a.access'), $app->getIdentity()->getAuthorisedViewLevels())
        ->bind(':author', $item->user_id, ParameterType::INTEGER);

    if (Multilanguage::isEnabled()) {
        $query->whereIn($db->quoteName('a.language'), [$app->getLanguage()->getTag(), '*'], ParameterType::STRING);
    }

    if (is_numeric($published)) {
        $query->where('a.state IN (1,2)')
            ->where('(' . $db->quoteName('a.publish_up') . ' IS NULL OR ' . $db->quoteName('a.publish_up') . ' <= :now1)')
            ->where('(' . $db->quoteName('a.publish_down') . ' IS NULL OR ' . $db->quoteName('a.publish_down') . ' >= :now2)')
            ->bind([':now1', ':now2'], $now);
    }

    return $query;
};

$total = (int) $db->setQuery($base()->select('COUNT(*)'))->loadResult();
$input = $app->getInput();
$start = (int) $input->getUint('limitstart', $input->getUint('start', 0));

// Начало страницы, кратное N; номер за пределами списка — последняя страница
$page = (int) (floor(min($start, max(0, $total - 1)) / $limit) * $limit);

// Неровный или лишний номер (?start=4, ?start=99) — постоянная переадресация на настоящую
// страницу, чтобы у одного списка не было нескольких адресов
if ($page !== $start) {
    $url = \Joomla\Component\Contact\Site\Helper\RouteHelper::getContactRoute($item->slug, $item->catid, $item->language);
    $app->redirect(Route::_($url . ($page ? '&limitstart=' . $page : ''), false), 301);
}

$articles = $db->setQuery(
    $base()
        ->select($db->quoteName(['a.id', 'a.title', 'a.alias', 'a.catid', 'a.language', 'a.publish_up', 'a.introtext', 'a.images']))
        ->order($db->quoteName('a.publish_up') . ' DESC, ' . $db->quoteName('a.id') . ' DESC')
        ->setLimit($limit, $page)
)->loadObjectList();

if (!$articles) {
    return;
}

$rows  = Image::articles(array_map(static fn ($a) => (int) $a->id, $articles));
$cards = [];

foreach ($articles as $article) {
    $row     = $rows[(int) $article->id] ?? $article;
    $slug    = $article->alias !== '' ? $article->id . ':' . $article->alias : (string) $article->id;
    $cards[] = [
        'title' => (string) $article->title,
        'link'  => Route::_(RouteHelper::getArticleRoute($slug, $article->catid, $article->language)),
        'thumb' => Image::intro($row),
        // Дата публикации — в новостной подаче («Вчера, 18:50»), как в ленте сайта
        'meta'  => \Wmarka\Template\Ui::validDate($article->publish_up ?? null) ? ['<time datetime="' . \Wmarka\Template\Ui::iso($article->publish_up) . '">' . \Wmarka\Template\Ui::newsDate($article->publish_up) . '</time>'] : [],
    ];
}

echo Card::items($cards, $item->params->get('wm_articles_style', 'media'), ['columns' => 3]);

// Листалка: штатная постраничная навигация Joomla (макет joomla.pagination.links шаблона)
if ($total > $limit) {
    $pagination = new Pagination($total, $page, $limit);

    echo $pagination->getPagesLinks();
    echo '<p class="uk-text-meta uk-text-center uk-margin-small-top">' . $pagination->getPagesCounter() . '</p>';
}

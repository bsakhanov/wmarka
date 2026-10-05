<?php
/**
 * WMARKA — служебная строка материала: автор · рубрика · дата · просмотры · время чтения.
 * Одна строка uk-article-meta вместо списка ядра.
 *
 * @var array $displayData ['item', 'params', 'position']
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;
use Wmarka\Template\Config;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$item   = $displayData['item'];
$params = $displayData['params'];
$parts  = [];

if ($params->get('show_author') && !empty($item->author)) {
    $author = $item->created_by_alias ?: $item->author;
    $author = '<span itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name">' . Ui::esc($author) . '</span></span>';

    if (!empty($item->contact_link) && $params->get('link_author')) {
        $author = '<a href="' . $item->contact_link . '">' . $author . '</a>';
    }

    $parts[] = $author;
}

if ($params->get('show_parent_category') && !empty($item->parent_id) && !empty($item->parent_title) && (int) $item->parent_id > 1) {
    $title   = Ui::esc($item->parent_title);
    $parts[] = $params->get('link_parent_category') && !empty($item->parent_route)
        ? '<a class="uk-link-muted" href="' . Route::_(RouteHelper::getCategoryRoute($item->parent_route, $item->parent_language ?? '*')) . '">' . $title . '</a>'
        : $title;
}

if ($params->get('show_category') && !empty($item->category_title) && empty($displayData['nocategory'])) {
    $title   = Ui::esc($item->category_title);
    $parts[] = $params->get('link_category') && !empty($item->catslug)
        ? '<a class="uk-link-muted" href="' . Route::_(RouteHelper::getCategoryRoute($item->catslug, $item->category_language ?? '*')) . '" itemprop="genre">' . $title . '</a>'
        : '<span itemprop="genre">' . $title . '</span>';
}

$dates = [
    'show_publish_date' => ['publish_up', 'datePublished'],
    'show_create_date'  => ['created', 'dateCreated'],
    'show_modify_date'  => ['modified', 'dateModified'],
];

foreach ($dates as $flag => [$field, $prop]) {
    if ($params->get($flag) && Ui::validDate($item->$field ?? null)) {
        $label   = $flag === 'show_modify_date' ? Text::_('TPL_WMARKA_UPDATED') . ' ' : '';
        $parts[] = $label . '<time datetime="' . Ui::iso($item->$field) . '" itemprop="' . $prop . '">' . Ui::newsDate($item->$field, 'full') . '</time>';
    }
}

if ($params->get('show_hits') && isset($item->hits)) {
    $parts[] = Ui::icon('eye', 0.75, 'uk-margin-xsmall-right') . (int) $item->hits;
}

if (($displayData['position'] ?? 'above') === 'above' && Config::bool('read_time', true) && !empty($item->text) && ($displayData['readtime'] ?? true)) {
    $parts[] = Ui::icon('clock', 0.75, 'uk-margin-xsmall-right') . Ui::minutes(Ui::readMinutes($item->text));
}

if (!empty($displayData['item']->associations) && !empty($params->get('show_associations'))) {
    // ассоциации выводятся отдельным макетом joomla.content.associations
}

if (!$parts) {
    return;
}
?>
<div class="uk-article-meta uk-margin-small-top uk-margin-small-bottom">
    <?php echo implode(' · ', $parts); ?>
</div>

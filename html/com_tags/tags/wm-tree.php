<?php
/**
 * WMARKA — макет «Карта меток и категорий»: дерево меток по иерархии и
 * дерево категорий материалов (до трёх уровней). Опция «Исключить метки»:
 * ID метки скрывает её, ID родительской — всю ветку.
 *
 * @var \Joomla\Component\Tags\Site\View\Tags\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Categories\Categories;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper as ContentRoute;
use Joomla\Component\Tags\Site\Helper\RouteHelper as TagsRoute;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$exclude  = array_filter(array_map('intval', explode(',', (string) $this->params->get('wm_exclude_tags', ''))));
$byParent = [];

foreach ($this->items as $tag) {
    if (!\in_array((int) $tag->id, $exclude, true)) {
        $byParent[(int) ($tag->parent_id ?? 1)][] = $tag;
    }
}

$tagTree = static function (int $parent) use (&$tagTree, $byParent): string {
    if (empty($byParent[$parent])) {
        return '';
    }

    $html = '<ul class="uk-nav uk-nav-default' . ($parent > 1 ? ' uk-nav-sub' : '') . '">';

    foreach ($byParent[$parent] as $tag) {
        $html .= '<li><a href="' . Route::_(TagsRoute::getComponentTagRoute($tag->id . ':' . $tag->alias, $tag->language)) . '">#' . Ui::esc($tag->title) . '</a>' . $tagTree((int) $tag->id) . '</li>';
    }

    return $html . '</ul>';
};

$catTree = static function ($node, int $depth = 0) use (&$catTree): string {
    $children = $node ? $node->getChildren() : [];

    if (!$children || $depth > 2) {
        return '';
    }

    $html = '<ul class="uk-nav uk-nav-default' . ($depth ? ' uk-nav-sub' : '') . '">';

    foreach ($children as $cat) {
        $html .= '<li><a href="' . Route::_(ContentRoute::getCategoryRoute($cat->id, $cat->language ?? '*')) . '">' . Ui::esc($cat->title) . '</a>' . $catTree($cat, $depth + 1) . '</li>';
    }

    return $html . '</ul>';
};
?>
<div class="com-tags wm-tags-tree">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1 class="uk-heading-small"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
    <?php endif; ?>
    <div class="uk-child-width-1-2@m uk-grid-divider" uk-grid>
        <div>
            <h2 class="uk-h4 uk-heading-line"><span><?php echo Text::_('TPL_WMARKA_TAGS_MAP'); ?></span></h2>
            <?php echo $tagTree(1) ?: '<p class="uk-text-meta">' . Text::_('COM_TAGS_NO_TAGS') . '</p>'; ?>
        </div>
        <?php if ($this->params->get('wm_show_categories', 1)) : ?>
            <div>
                <h2 class="uk-h4 uk-heading-line"><span><?php echo Text::_('TPL_WMARKA_CATS_MAP'); ?></span></h2>
                <?php echo $catTree(Categories::getInstance('Content')->get('root')); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

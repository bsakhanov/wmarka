<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;

/** @var \Joomla\Component\Tags\Site\View\Tags\HtmlView $this */

// 1. ПОЛУЧАЕМ ВСЕ МЕТКИ + ПОДСЧЕТ МАТЕРИАЛОВ (SQL остается прежним)
$db = Factory::getContainer()->get(\Joomla\Database\DatabaseInterface::class);
$query = $db->getQuery(true)
    ->select([
        $db->quoteName('a.id'),
        $db->quoteName('a.title'),
        $db->quoteName('a.alias'),
        $db->quoteName('a.parent_id'),
        $db->quoteName('a.level'),
        $db->quoteName('a.lft'),
        'COUNT(' . $db->quoteName('m.tag_id') . ') AS item_count'
    ])
    ->from($db->quoteName('#__tags', 'a'))
    ->join('LEFT', $db->quoteName('#__contentitem_tag_map', 'm') . ' ON ' . $db->quoteName('m.tag_id') . ' = ' . $db->quoteName('a.id'))
    ->where($db->quoteName('a.published') . ' = 1')
    ->where($db->quoteName('a.id') . ' > 1')
    ->group([$db->quoteName('a.id'), $db->quoteName('a.title'), $db->quoteName('a.alias'), $db->quoteName('a.parent_id'), $db->quoteName('a.level'), $db->quoteName('a.lft')])
    ->order($db->quoteName('a.lft') . ' ASC');

$db->setQuery($query);
$this->items = $db->loadObjectList();

$params = $this->params;
?>

<div class="com-tags-tags tag-tree-layout uk-section uk-section-small">
    
    <div class="uk-flex uk-flex-between uk-flex-middle uk-flex-wrap uk-margin-medium-bottom">
        <div>
            <?php if ($this->params->get('show_page_heading')) : ?>
                <h1 class="uk-heading-bullet uk-margin-remove">
                    <?php echo $this->escape($this->params->get('page_heading')); ?>
                </h1>
            <?php endif; ?>
        </div>

        <?php // ПОЛЕ ПОИСКА ?>
        <div class="uk-margin-small-top uk-width-medium@s">
            <div class="uk-search uk-search-default uk-width-1-1">
                <span uk-search-icon></span>
                <input id="tag-tree-search" class="uk-search-input" type="search" placeholder="Поиск по рубрикам..." aria-label="Поиск">
            </div>
        </div>
    </div>

    <div class="tag-items-tree">
        <?php echo $this->loadTemplate('items'); ?>
    </div>
</div>

<script>
/**
 * Скрипт мгновенной фильтрации дерева
 */
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('tag-tree-search');
    const items = document.querySelectorAll('.tree-item');

    searchInput.addEventListener('input', function() {
        const query = this.value.toLowerCase();

        items.forEach(item => {
            const text = item.querySelector('.tag-title').textContent.toLowerCase();
            if (text.includes(query)) {
                item.style.display = '';
                item.classList.add('uk-animation-fade'); // Легкий эффект появления
            } else {
                item.style.display = 'none';
                item.classList.remove('uk-animation-fade');
            }
        });

        // Если поиск пустой - возвращаем всё
        if (query === '') {
            items.forEach(i => i.style.display = '');
        }
    });
});
</script>
<?php
defined('_JEXEC') or die;

/** @var \Joomla\CMS\Menu\MenuItem $item */
$itemTitle = $item->title ?? '';

$link_rendered = '<span itemprop="name">' . $itemTitle . '</span>';

if (!empty($item->menu_icon)) {
    $icon = '<span data-uk-icon="icon: ' . $item->menu_icon . '" aria-hidden="true" class="uk-margin-small-right"></span>';
    $showText = (bool)($params->get('menu_text', 1) ?? true);
    
    $link_rendered = $showText ? $icon . $link_rendered : $icon . '<span class="uk-hidden" itemprop="name">' . $itemTitle . '</span>';
}

if (!empty($item->deeper)) {
    $link_rendered .= ' <span uk-navbar-parent-icon></span>';
}
?>
<a href="#" onclick="return false;" class="uk-text-bold <?php echo $item->anchor_css ?? ''; ?>" role="menuitem" aria-haspopup="true">
    <?php echo $link_rendered; ?>
</a>
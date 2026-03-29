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
?>
<span class="uk-nav-header <?php echo $item->anchor_css ?? ''; ?>" itemprop="name">
    <?php echo $link_rendered; ?>
</span>
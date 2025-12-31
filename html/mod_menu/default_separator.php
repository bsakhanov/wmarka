<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;

$anchor_css = $item->anchor_css ?: '';
$linktype = '<span itemprop="name">' . $item->title . '</span>';

if ($item->menu_icon) {
    $icon = '<span data-uk-icon="icon: ' . $item->menu_icon . '" aria-hidden="true" class="uk-margin-small-right"></span>';
    $linktype = ($itemParams->get('menu_text', 1)) 
        ? $icon . '<span itemprop="name">' . $item->title . '</span>' 
        : $icon . '<span class="uk-hidden" itemprop="name">' . $item->title . '</span>';
}

?>
<span class="uk-nav-header <?php echo $anchor_css; ?>" itemprop="name">
    <?php echo $linktype; ?>
</span>

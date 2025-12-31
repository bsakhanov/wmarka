<?php
defined('_JEXEC') or die;

$item = $displayData;
?>
<a href="#" onclick="return false;" class="uk-text-bold">
    <?php echo $item->menu_text; ?>
    <?php if ($item->deeper) : ?>
        <span uk-navbar-parent-icon></span>
    <?php endif; ?>
</a>

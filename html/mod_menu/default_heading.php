<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 * @version     WMARKA ULTRA (UIkit 3 Heading + Microdata)
 */

defined('_JEXEC') or die;

$item = $displayData;
$params = $item->params;

// Базовый текст с микроразметкой
$link_text = '<span itemprop="name">' . $item->menu_text . '</span>';

// Логика иконок (твоя фишка с data-uk-icon)
if ($item->menu_icon) {
    $icon = '<span data-uk-icon="icon: ' . $item->menu_icon . '" aria-hidden="true" class="uk-margin-small-right"></span>';
    
    if ($params->get('menu_text', 1)) {
        $link_text = $icon . '<span itemprop="name">' . $item->menu_text . '</span>';
    } else {
        $link_text = $icon . '<span class="uk-hidden" itemprop="name">' . $item->menu_text . '</span>';
    }
}

// Добавляем иконку родителя для выпадающих списков
if ($item->deeper) {
    $link_text .= ' <span uk-navbar-parent-icon></span>';
}
?>

<a href="#" onclick="return false;" class="uk-text-bold" role="menuitem" aria-haspopup="true">
    <?php echo $link_text; ?>
</a>

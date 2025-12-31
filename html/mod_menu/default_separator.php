<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 * @version     WMARKA ULTRA (UIkit 3 Separator)
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;

$anchor_css = $item->anchor_css ?: '';
$linktype   = $item->title;

// Если это пункт-разделитель в выпадающем меню, делаем его заголовком UIkit
$class = "uk-nav-header " . $anchor_css;

if ($item->menu_icon) {
    $linktype = '<span class="uk-margin-small-right ' . $item->menu_icon . '" aria-hidden="true"></span>' . $item->title;
} elseif ($item->menu_image) {
    $linktype = HTMLHelper::_('image', $item->menu_image, '', ['class' => 'uk-margin-small-right']) . $item->title;
}
?>
<span class="<?php echo $class; ?>" <?php echo $item->anchor_title ? 'title="'.$item->anchor_title.'"' : ''; ?>>
    <?php echo $linktype; ?>
</span>

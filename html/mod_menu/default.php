<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 * @version     WMARKA ULTRA (UIkit 3 Navbar)
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;

$attributes = [];
if ($params->get('tag_id')) {
    $attributes['id'] = $params->get('tag_id');
}

$attributes['class'] = 'uk-navbar-nav ' . $params->get('class_sfx');
?>

<ul <?php echo HTMLHelper::_('itags', $attributes); ?>>
<?php foreach ($list as $i => &$item) : ?>
    <?php
    $item_class = ['item-' . $item->id];
    if ($item->id == $active_id) $item_class[] = 'uk-active';
    if ($item->parent) $item_class[] = 'uk-parent';
    
    // Определяем наличие дочерних элементов
    $hasChildren = $item->deeper;
    ?>
    
    <li class="<?php echo implode(' ', $item_class); ?>">
        <?php
        // Выбор макета в зависимости от типа ссылки
        switch ($item->type) :
            case 'separator':
            case 'component':
            case 'heading':
            case 'url':
                echo $this->sublayout($item->type, $item, $params);
                break;
            default:
                echo $this->sublayout('url', $item, $params);
                break;
        endswitch;

        // Если есть вложенные пункты
        if ($hasChildren) : ?>
            <div class="uk-navbar-dropdown" uk-dropdown="offset: 0; pos: bottom-left; boundary: !.uk-navbar; animation: uk-animation-slide-top-small; duration: 200">
                <ul class="uk-nav uk-navbar-dropdown-nav">
        <?php endif; ?>

    <?php if ($item->shallower) : ?>
        <?php echo str_repeat('</ul></div></li>', $item->level_diff); ?>
    <?php elseif (!$hasChildren) : ?>
        </li>
    <?php endif; ?>
    
<?php endforeach; ?>
</ul>

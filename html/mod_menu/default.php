<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 * @version     WMARKA ULTRA (UIkit 3 Navbar + Schema.org)
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;

$attributes = [];
if ($params->get('tag_id')) {
    $attributes['id'] = $params->get('tag_id');
}

$attributes['class'] = 'uk-navbar-nav ' . $params->get('class_sfx');
?>

<ul <?php echo HTMLHelper::_('itags', $attributes); ?> itemscope itemtype="https://schema.org/SiteNavigationElement">
<?php foreach ($list as $i => &$item) : ?>
    <?php
    $item_class = ['item-' . $item->id];
    
    // UIkit классы состояния
    if ($item->id == $active_id) $item_class[] = 'uk-active';
    if ($item->parent) $item_class[] = 'uk-parent';
    
    $hasChildren = $item->deeper;
    ?>
    
    <li class="<?php echo implode(' ', $item_class); ?>">
        <?php
        // Выбор макета. Внутри этих файлов мы уже добавили itemprop="url" и itemprop="name"
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

        // Вложенные пункты (Dropdown)
        if ($hasChildren) : ?>
            <div class="uk-navbar-dropdown" uk-dropdown="offset: 0; pos: bottom-left; boundary: !.uk-navbar; animation: uk-animation-slide-top-small; duration: 200">
                <ul class="uk-nav uk-navbar-dropdown-nav">
        <?php endif; ?>

    <?php /* Закрытие тегов при уменьшении уровня вложенности */ ?>
    <?php if ($item->shallower) : ?>
        <?php echo str_repeat('</ul></div></li>', $item->level_diff); ?>
    <?php elseif (!$hasChildren) : ?>
        </li>
    <?php endif; ?>
    
<?php endforeach; ?>
</ul>

<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 * @version     WMARKA ULTRA (Fixed sublayout & context errors)
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;

// Устраняем ошибку "Method itags() does not exist": формируем атрибуты <ul> вручную, 
// обеспечивая безопасность вывода через htmlspecialchars.
$tagId    = $params->get('tag_id');
$classSfx = $params->get('class_sfx') ?? '';
$ulClass  = 'uk-navbar-nav ' . htmlspecialchars($classSfx, ENT_QUOTES, 'UTF-8');

$attributes = 'class="' . trim($ulClass) . '"';
if ($tagId) {
    $attributes .= ' id="' . htmlspecialchars($tagId, ENT_QUOTES, 'UTF-8') . '"';
}
?>

<ul <?php echo $attributes; ?> itemscope itemtype="https://schema.org/SiteNavigationElement">
<?php foreach ($list as $i => &$item) : ?>
    <?php
    $item_class = ['item-' . $item->id];
    if ($item->id == $active_id) $item_class[] = 'uk-active';
    if (!empty($item->parent))   $item_class[] = 'uk-parent';
    
    $hasChildren = !empty($item->deeper);
    ?>
    
    <li class="<?php echo implode(' ', $item_class); ?>">
        <?php
        /** * Решаем проблему "Using $this when not in object context": в Joomla 6 переопределения 
         * модулей не имеют доступа к методу sublayout(). Мы подключаем файлы напрямую, 
         * имитируя поведение Layout-системы через переменную $displayData.
         */
        
        $displayData = $item; // Передаем объект пункта меню в подмакет
        $itemParams  = $params; // Обеспечиваем доступ к параметрам модуля для default_url.php
        
        $layoutType = $item->type;
        $layoutPath = __DIR__ . '/default_' . $layoutType . '.php';

        // Если файл для конкретного типа (например, separator) не найден, используем стандартный url
        if (!file_exists($layoutPath)) {
            $layoutPath = __DIR__ . '/default_url.php';
        }

        include $layoutPath;

        if ($hasChildren) : ?>
            <div class="uk-navbar-dropdown" uk-dropdown="offset: 0; pos: bottom-left; animation: uk-animation-slide-top-small">
                <ul class="uk-nav uk-navbar-dropdown-nav">
        <?php endif; ?>

    <?php if (!empty($item->shallower)) : ?>
        <?php echo str_repeat('</ul></div></li>', $item->level_diff); ?>
    <?php elseif (!$hasChildren) : ?>
        </li>
    <?php endif; ?>
    
<?php endforeach; ?>
</ul>
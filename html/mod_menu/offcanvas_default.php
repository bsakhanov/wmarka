<?php
defined('_JEXEC') or die;

$tagId = $params->get('tag_id');
$classSfx = $params->get('class_sfx') ?? '';

// Основные классы для вертикального меню с поддержкой вложенности
$ulClass = 'uk-nav uk-nav-default uk-nav-parent-icon ' . htmlspecialchars($classSfx, ENT_QUOTES, 'UTF-8');

$attributes = 'class="' . trim($ulClass) . '" uk-nav="multiple: false; animation: uk-animation-slide-top-small"';
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
        // Подготавливаем данные для стандартных подмакетов (default_url.php и т.д.)
        $displayData = $item;
        $itemParams  = $params;
        
        $layoutType = $item->type;
        $layoutPath = __DIR__ . '/default_' . $layoutType . '.php';

        if (!file_exists($layoutPath)) {
            $layoutPath = __DIR__ . '/default_url.php';
        }

        include $layoutPath;

        // Если есть дети, открываем вложенный список
        if ($hasChildren) : ?>
            <ul class="uk-nav-sub">
        <?php endif; ?>

    <?php if (!empty($item->shallower)) : ?>
        <?php echo str_repeat('</ul></li>', $item->level_diff); ?>
    <?php elseif (!$hasChildren) : ?>
        </li>
    <?php endif; ?>

<?php endforeach; ?>
</ul>
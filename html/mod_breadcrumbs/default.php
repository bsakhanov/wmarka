<?php
/**
 * WMARKA — хлебные крошки uk-breadcrumb. Микроразметку BreadcrumbList
 * модуль НЕ выводит: она одна на странице — в JSON-LD SEO-движка шаблона.
 *
 * @var \Joomla\Registry\Registry $params
 * @var array  $list
 * @var int    $count
 * @var object $module
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

for ($i = 0; $i < $count; $i++) {
    if ($i === 1 && !empty($list[$i]->link) && !empty($list[$i - 1]->link) && $list[$i]->link === $list[$i - 1]->link) {
        unset($list[$i]);
    }
}

$keys = array_keys($list);
$last = end($keys);
?>
<nav aria-label="<?php echo htmlspecialchars($module->title, ENT_QUOTES, 'UTF-8'); ?>">
    <ul class="uk-breadcrumb uk-margin-remove">
        <?php if ($params->get('showHere', 1)) : ?>
            <li><span class="uk-text-meta"><?php echo Text::_('MOD_BREADCRUMBS_HERE'); ?></span></li>
        <?php endif; ?>
        <?php foreach ($list as $key => $item) : ?>
            <?php if ($key !== $last) : ?>
                <li><?php echo !empty($item->link) ? '<a href="' . Route::_($item->link) . '">' . $item->name . '</a>' : '<span>' . $item->name . '</span>'; ?></li>
            <?php elseif ($params->get('showLast', 1)) : ?>
                <li><span aria-current="page"><?php echo $item->name; ?></span></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</nav>

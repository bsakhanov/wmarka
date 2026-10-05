<?php
/**
 * WMARKA — хром «navbar» для позиций навбара: меню выводится как есть
 * (uk-navbar-nav должен быть прямым потомком uk-navbar-left/right),
 * прочие модули — в элементе uk-navbar-item без заголовка.
 */

\defined('_JEXEC') or die;

$module = $displayData['module'];

if ((string) $module->content === '') {
    return;
}

if (\in_array($module->module, ['mod_menu', 'mod_finder', 'mod_languages'], true) || str_contains((string) $displayData['params']->get('moduleclass_sfx', ''), 'wm-raw')) {
    echo $module->content;

    return;
}

echo '<div class="uk-navbar-item ' . htmlspecialchars(trim((string) $displayData['params']->get('moduleclass_sfx', '')), ENT_QUOTES, 'UTF-8') . '">' . $module->content . '</div>';

<?php
/**
 * @package     Joomla.Site
 * @subpackage  Template.wmarka
 * @version     3.0.0
 * * Универсальный стиль (chrome) для вывода модулей: style="wmarka"
 * Joomla 6 + UIkit 3 + PHP 8.4
 */

declare(strict_types=1);

defined('_JEXEC') or die;

use Joomla\Utilities\ArrayHelper;

/**
 * В архитектуре JLayout переменные передаются через массив $displayData
 * @var array $displayData
 */
$module  = $displayData['module'] ?? null;
$params  = $displayData['params'] ?? null;

// Если контента нет, ничего не выводим (экономим DOM-узлы)
if ($module === null || $module->content === null || trim($module->content) === '') {
    return;
}

// 1. Настройки обертки модуля (Wrapper)
$moduleTag      = htmlspecialchars((string) $params->get('module_tag', 'div'), ENT_QUOTES, 'UTF-8');
$moduleClassSfx = htmlspecialchars((string) $params->get('moduleclass_sfx', ''), ENT_QUOTES, 'UTF-8');

$moduleClasses  = ['wmarka-module', 'mod-' . $module->id];
if ($moduleClassSfx !== '') {
    $moduleClasses[] = trim($moduleClassSfx);
}

$moduleAttribs = ['class' => implode(' ', $moduleClasses)];

// 2. Настройки заголовка (Header)
// По умолчанию задаем красивые классы UIkit 3 для заголовка, если менеджер не указал свои
$headerTag   = htmlspecialchars((string) $params->get('header_tag', 'h3'), ENT_QUOTES, 'UTF-8');
$headerClass = htmlspecialchars((string) $params->get('header_class', 'uk-h4 uk-margin-bottom'), ENT_QUOTES, 'UTF-8');

$headerAttribs = [];
if ($headerClass !== '') {
    $headerAttribs['class'] = trim($headerClass);
}

// 3. Доступность (Accessibility / ARIA) для SEO и скринридеров
if ($moduleTag !== 'div') {
    if ($module->showtitle) {
        $moduleAttribs['aria-labelledby'] = 'mod-title-' . $module->id;
        $headerAttribs['id']              = 'mod-title-' . $module->id;
    } else {
        $moduleAttribs['aria-label'] = htmlspecialchars((string) $module->title, ENT_QUOTES, 'UTF-8');
    }
}

// 4. Формирование HTML заголовка
$headerHtml = '';
if ($module->showtitle) {
    $headerHtml = '<' . $headerTag . ' ' . ArrayHelper::toString($headerAttribs) . '>' 
                . htmlspecialchars((string) $module->title, ENT_QUOTES, 'UTF-8') 
                . '</' . $headerTag . '>';
}
?>
<<?php echo $moduleTag; ?> <?php echo ArrayHelper::toString($moduleAttribs); ?>>
    
    <?php /* Вывод заголовка модуля (если включен в админке) */ ?>
    <?php echo $headerHtml; ?>
    
    <?php /* Вывод содержимого модуля */ ?>
    <?php echo $module->content; ?>

</<?php echo $moduleTag; ?>>
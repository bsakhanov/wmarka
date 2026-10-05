<?php
/**
 * WMARKA — общий рендер хромов модулей. Подключается тонкими файлами хромов,
 * которые задают $wmWrap (классы обёртки) и $wmTitle (классы заголовка).
 *
 * Параметры модуля «Дополнительно»: Тег модуля, Суффикс класса модуля,
 * Тег заголовка, Класс заголовка — все учитываются.
 *
 * @var array  $displayData
 * @var string $wmWrap
 * @var string $wmTitle
 */

\defined('_JEXEC') or die;

$module  = $displayData['module'];
$params  = $displayData['params'];
$attribs = $displayData['attribs'] ?? [];

if ((string) $module->content === '') {
    return;
}

$tag    = htmlspecialchars((string) $params->get('module_tag', 'div'), ENT_QUOTES, 'UTF-8');
$htag   = htmlspecialchars((string) $params->get('header_tag', 'h3'), ENT_QUOTES, 'UTF-8');
$hclass = trim((string) $params->get('header_class', ''));
$sfx    = trim((string) $params->get('moduleclass_sfx', ''));
$class  = trim('wm-module wm-' . str_replace('_', '-', $module->module) . ' ' . $wmWrap . ' ' . $sfx);

// Заголовок модуля в блочной позиции — заголовок секции: крупнее и с воздухом снизу
$inBlock = str_starts_with((string) ($attribs['name'] ?? $module->position ?? ''), 'block-');
$title   = trim($hclass !== '' ? $hclass : ($inBlock && ($wmTitle ?? '') === 'uk-h4 uk-margin-small-bottom' ? 'uk-h3 uk-heading-bullet uk-margin-medium-bottom' : $wmTitle));
$label   = str_contains($title, 'uk-heading-line') ? '<span>' . $module->title . '</span>' : $module->title;
?>
<<?php echo $tag; ?> id="module-<?php echo (int) $module->id; ?>" class="<?php echo htmlspecialchars($class, ENT_QUOTES, 'UTF-8'); ?>">
    <?php if ($module->showtitle) : ?>
        <<?php echo $htag; ?> class="<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>"><?php echo $label; ?></<?php echo $htag; ?>>
    <?php endif; ?>
    <?php echo $module->content; ?>
</<?php echo $tag; ?>>

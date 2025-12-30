<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;

/**
 * Стиль Wmarka: Только полезный код, никакого мусора.
 */
function renderModuleWmarka($module, &$params, &$attribs)
{
    if (empty($module->content)) {
        return;
    }

    // Базовые параметры
    $moduleTag      = $params->get('module_tag', 'div');
    $headerTag      = htmlspecialchars($params->get('header_tag', 'h3'));
    $headerClass    = htmlspecialchars($params->get('header_class', ''));
    $moduleClassSfx = htmlspecialchars($params->get('moduleclass_sfx', ''));

    // Авто-замена тега для модулей навигации
    if ($module->module === 'mod_menu' && $moduleTag === 'div') {
        $moduleTag = 'nav';
    }

    // Собираем только нужные классы модуля
    $moduleClasses = ['uk-panel', $moduleClassSfx];

    // Классы заголовка: только эстетика UIkit и то, что ввел юзер
    $titleClasses = ['uk-h4', 'uk-heading-bullet', $headerClass];

    ?>
    <<?php echo $moduleTag; ?> class="<?php echo trim(implode(' ', array_filter($moduleClasses))); ?>">

        <?php if ($module->showtitle) : ?>
            <<?php echo $headerTag; ?> class="<?php echo trim(implode(' ', array_filter($titleClasses))); ?>">
                <?php echo $module->title; ?>
            </<?php echo $headerTag; ?>>
        <?php endif; ?>

        <?php echo $module->content; ?>

    </<?php echo $moduleTag; ?>>
    <?php
}

/**
 * Стиль Empty: Абсолютно голый контент.
 */
function renderModuleEmpty($module, &$params, &$attribs)
{
    echo $module->content ?? '';
}

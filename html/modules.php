<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;

/**
 * Стиль вывода модулей "wmarka"
 * Используется в jdoc:include style="wmarka"
 */
function renderModuleWmarka($module, &$params, &$attribs)
{
    $headerTag = $params->get('header_tag', 'h3');
    $moduleTag = $params->get('module_tag', 'div');
    $badge     = $params->get('badge', 0);
    $moduleClassSfx = htmlspecialchars($params->get('moduleclass_sfx', ''));
    
    // Определяем базовый класс. Если это сайдбар, можно добавить uk-card
    $baseClass = 'uk-panel';
    if (str_contains($moduleClassSfx, 'uk-card')) {
        $baseClass = ''; // Если класс карты уже передан в суффиксе
    }

    if ($module->content) : ?>
        <<?php echo $moduleTag; ?> class="<?php echo $baseClass; ?> <?php echo $moduleClassSfx; ?>">

            <?php if ($module->showtitle) : ?>
                <<?php echo $headerTag; ?> class="uk-h4 uk-heading-bullet uk-margin-small-bottom">
                    <?php echo $module->title; ?>
                </<?php echo $headerTag; ?>>
            <?php endif; ?>

            <div class="uk-panel-content">
                <?php echo $module->content; ?>
            </div>

        </<?php echo $moduleTag; ?>>
    <?php endif;
}

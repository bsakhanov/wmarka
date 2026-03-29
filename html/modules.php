<?php
/**
 * Хромы (стили) модулей для шаблона Wmarka
 * * @package     Joomla.Site
 * @subpackage  Templates.wmarka
 * @version     Joomla 6.x
 * @PHP         8.3 / 8.4
 */

defined('_JEXEC') or die;

/**
 * Продвинутый стиль модулей Wmarka (на базе UIkit 3 Card)
 * Использование: выберите стиль "wmarka" в настройках модуля.
 */
function modChrome_wmarka($module, &$params, &$attribs)
{
    $moduleTag      = $params->get('module_tag', 'div');
    $headerTag      = htmlspecialchars($params->get('header_tag', 'h3'), ENT_QUOTES, 'UTF-8');
    $headerClass    = htmlspecialchars($params->get('header_class', 'uk-card-title'), ENT_QUOTES, 'UTF-8');
    $bootstrapSize  = (int) $params->get('bootstrap_size', 0);
    $moduleClass    = !empty($bootstrapSize) ? ' span' . $bootstrapSize : '';
    $moduleClassSfx = htmlspecialchars($params->get('moduleclass_sfx', ''), ENT_QUOTES, 'UTF-8');
    
    // Получаем фоновое изображение
    $bgimage = $params->get('bgimage');
    $bgStyle = '';
    if (!empty($bgimage)) {
        // Формируем атрибут style, если картинка задана
        $bgStyle = ' style="background-image: url(\'' . htmlspecialchars($bgimage, ENT_QUOTES, 'UTF-8') . '\'); background-size: cover; background-position: center;"';
    }

    // Обработка бейджа (badge), если он задан в суффиксе класса (например: "uk-badge-Новинка")
    $badge = '';
    $classes = explode(' ', $moduleClassSfx);
    foreach ($classes as $key => $class) {
        // Используем современную функцию PHP 8 вместо strpos
        if (str_starts_with($class, 'uk-badge')) {
            $badgeText = preg_replace('/^uk-badge-?/', '', $class);
            $badgeText = str_replace('-', ' ', $badgeText); // Заменяем дефисы на пробелы
            $badge = "<div class=\"uk-card-badge uk-label\">" . htmlspecialchars($badgeText, ENT_QUOTES, 'UTF-8') . "</div>";
            unset($classes[$key]);
        }
    }
    $moduleClassSfx = implode(' ', $classes);

    // Начало вывода модуля (UIkit Card)
    echo '<' . $moduleTag . ' class="uk-card uk-card-default ' . trim($moduleClassSfx . $moduleClass) . '"' . $bgStyle . '>';
    
    // Вывод бейджа, если он есть
    echo $badge;

    // Вывод заголовка
    if ((bool) $module->showtitle) {
        echo '<div class="uk-card-header">';
        echo '<' . $headerTag . ' class="' . $headerClass . '">' . $module->title . '</' . $headerTag . '>';
        echo '</div>';
    }

    // Вывод контента модуля
    echo '<div class="uk-card-body">';
    echo $module->content;
    echo '</div>';

    echo '</' . $moduleTag . '>';
}

/**
 * Базовый "чистый" стиль без оберток.
 * Полезен, когда модуль (например, слайдер или кастомный HTML) 
 * сам генерирует нужную UIkit-разметку и внешние <div> ему только мешают.
 */
function modChrome_blank($module, &$params, &$attribs)
{
    echo $module->content;
}
<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;

if (!$list) {
    return;
}

/**
 * Простой типограф для очистки текста
 */
$typograph = function($text) {
    if (empty($text)) return '';
    
    // Убираем лишние пробелы и невидимые символы
    $text = preg_replace('/[ \t]+/', ' ', $text);
    $text = trim($text);
    
    // Заменяем кавычки на елочки (простая регулярка для русского/казахского)
    $text = preg_replace('/"(.*?)"/u', '«$1»', $text);
    
    // Заменяем дефисы на тире в нужных местах
    $text = str_replace(' - ', ' — ', $text);
    
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
};

$layoutSuffix = $params->get('title_only', 0) ? '_titles' : '_items';
?>

<div class="mod-articles-uikit">
    <?php if ($grouped) : ?>
        <?php foreach ($list as $groupName => $items) : ?>
            <div class="uk-margin-medium-bottom">
                <h5 class="uk-heading-bullet uk-text-uppercase uk-text-bold uk-margin-small-bottom">
                    <?php echo $typograph(Text::_($groupName)); ?>
                </h5>
                <?php require ModuleHelper::getLayoutPath('mod_articles', $params->get('layout', 'default') . $layoutSuffix); ?>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <?php 
            $items = $list; 
            require ModuleHelper::getLayoutPath('mod_articles', $params->get('layout', 'default') . $layoutSuffix); 
        ?>
    <?php endif; ?>
</div>
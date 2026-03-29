<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * @version     WMARKA UIKIT BUTTONS (Exact Syntax Fix)
 * @author      Joomla-6_Uikit-3 Partner
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Router\Route;
use Joomla\Component\Tags\Site\Helper\RouteHelper;

if (empty($displayData)) {
    return;
}

// Получаем права доступа пользователя
$authorised = Factory::getUser()->getAuthorisedViewLevels();
?>

<p uk-margin class="wmarka-tags-container ">
    <?php foreach ($displayData as $i => $tag) : ?>
        <?php 
        // 1. Проверка прав доступа
        if (!in_array($tag->access, $authorised)) continue; 

        // 2. Исключаем технический тег 'эксклюзив' (если нужно)
        if (mb_strtolower(trim($tag->title)) === 'эксклюзив') continue; 
        ?>

        <a class="uk-button uk-button-default uk-button-small uk-border-rounded" 
           href="<?php echo Route::_(RouteHelper::getComponentTagRoute($tag->tag_id . ':' . $tag->alias, $tag->language)); ?>">
            <span uk-icon="icon: tag; ratio: 0.7" class="uk-margin-xsmall-right"></span>
            <?php echo $this->escape($tag->title); ?>
        </a>

    <?php endforeach; ?>
</p>
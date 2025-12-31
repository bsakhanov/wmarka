<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * @version     WMARKA UIKIT ULTRA (Joomla 6 Original Logic + uk-margin)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Router\Route;
use Joomla\Component\Tags\Site\Helper\RouteHelper;
use Joomla\Registry\Registry;

// Проверка уровней доступа — ничего не пропускаем из оригинала
$authorised = Factory::getUser()->getAuthorisedViewLevels();

if (empty($displayData)) {
    return;
}
?>

<div uk-margin class="uk-margin-small-top uk-margin-small-bottom wmarka-tags-container">
    <?php foreach ($displayData as $i => $tag) : ?>
        <?php 
        // 1. Проверка прав доступа (как в оригинале)
        if (!in_array($tag->access, $authorised)) continue; 

        // 2. Логика фильтрации "Эксклюзива" (наша фишка)
        if (mb_strtolower(trim($tag->title)) === 'эксклюзив') continue; 

        // 3. Получение параметров тега (классы из админки)
        $tagParams  = new Registry($tag->params);
        $customClass = $tagParams->get('tag_link_class', 'uk-button-default');
        
        // Маппинг Bootstrap классов в UIkit (если в админке выбраны старые классы)
        $btnClass = str_replace(['btn-info', 'btn-primary', 'btn-success', 'btn-sm'], ['uk-button-primary', 'uk-button-primary', 'uk-button-secondary', 'uk-button-small'], $customClass);
        
        // Гарантируем наличие базового класса кнопки UIkit
        if (strpos($btnClass, 'uk-button') === false) {
            $btnClass .= ' uk-button uk-button-default';
        }
        ?>

        <a href="<?php echo Route::_(RouteHelper::getComponentTagRoute($tag->tag_id . ':' . $tag->alias, $tag->language)); ?>" 
           class="<?php echo trim($btnClass); ?> uk-button-small uk-border-rounded tag-<?php echo $tag->tag_id; ?>">
            <span uk-icon="icon: tag; ratio: 0.7" class="uk-margin-xsmall-right"></span>
            <?php echo $this->escape($tag->title); ?>
        </a>

    <?php endforeach; ?>
</div>

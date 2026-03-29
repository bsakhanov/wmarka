<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * @version     WMARKA ULTRA (Categories List Head)
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;

/** @var object $displayData Данные макета */
$params = $displayData->params;
?>

<?php /* 1. Заголовок страницы */ ?>
<?php if ($params->get('show_page_heading')) : ?>
    <h1 class="uk-heading-bullet uk-margin-medium-bottom">
        <?php echo $displayData->escape($params->get('page_heading')); ?>
    </h1>
<?php endif; ?>

<?php /* 2. Описание базы категорий */ ?>
<?php if ($params->get('show_base_description')) : ?>
    <?php 
    $description = '';
    $context     = '';

    // Если есть описание в параметрах меню, используем его
    if ($params->get('categories_description')) {
        $description = $params->get('categories_description');
        $context     = $displayData->get('extension') . '.categories';
    } 
    // Иначе берем описание родительской категории из БД
    elseif ($displayData->parent->description) {
        $description = $displayData->parent->description;
        $context     = $displayData->parent->extension . '.categories';
    }
    ?>

    <?php if ($description) : ?>
        <div class="category-desc base-desc uk-panel uk-margin-medium-bottom uk-text-lead" itemprop="description">
            <?php echo HTMLHelper::_('content.prepare', $description, '', $context); ?>
        </div>
    <?php endif; ?>
<?php endif; ?>

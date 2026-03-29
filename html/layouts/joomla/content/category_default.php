<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;

$params    = $displayData->params;
$category  = $displayData->get('category');
$extension = $category->extension;
$htag      = $params->get('show_page_heading') ? 'h2' : 'h1';

// Триггеры событий контента сохраняем полностью
$app = Factory::getApplication();
$category->text = $category->description;
$app->triggerEvent('onContentPrepare', [$extension . '.categories', &$category, &$params, 0]);
$category->description = $category->text;

$afterDisplayTitle    = trim(implode("\n", $app->triggerEvent('onContentAfterTitle', [$extension . '.categories', &$category, &$params, 0])));
$beforeDisplayContent = trim(implode("\n", $app->triggerEvent('onContentBeforeDisplay', [$extension . '.categories', &$category, &$params, 0])));
$afterDisplayContent  = trim(implode("\n", $app->triggerEvent('onContentAfterDisplay', [$extension . '.categories', &$category, &$params, 0])));
?>

<div class="category-container">
    <?php if ($params->get('show_page_heading')) : ?>
        <h1 class="uk-heading-bullet uk-margin-bottom">
            <?php echo $displayData->escape($params->get('page_heading')); ?>
        </h1>
    <?php endif; ?>

    <?php if ($params->get('show_category_title', 1)) : ?>
        <<?php echo $htag; ?> class="uk-article-title">
            <?php echo HTMLHelper::_('content.prepare', $category->title, '', $extension . '.category.title'); ?>
        </<?php echo $htag; ?>>
    <?php endif; ?>

    <?php echo $afterDisplayTitle; ?>

    <?php if ($params->get('show_cat_tags', 1)) : ?>
        <?php echo LayoutHelper::render('joomla.content.tags', $category->tags->itemTags); ?>
    <?php endif; ?>

    <?php if ($beforeDisplayContent || $afterDisplayContent || $params->get('show_description', 1) || $params->def('show_description_image', 1)) : ?>
        <div class="uk-panel uk-margin-medium-bottom">
            <?php if ($params->get('show_description_image') && ($img = $category->getParams()->get('image'))) : ?>
                <div class="uk-align-right@m uk-margin-remove-adjacent">
                    <img src="<?php echo $img; ?>" alt="<?php echo $this->escape($category->getParams()->get('image_alt')); ?>" class="uk-border-rounded uk-box-shadow-medium">
                </div>
            <?php endif; ?>

            <?php echo $beforeDisplayContent; ?>
            
            <?php if ($params->get('show_description') && $category->description) : ?>
                <div class="uk-text-lead">
                    <?php echo HTMLHelper::_('content.prepare', $category->description, '', $extension . '.category.description'); ?>
                </div>
            <?php endif; ?>

            <?php echo $afterDisplayContent; ?>
        </div>
    <?php endif; ?>

    <?php /* Загрузка вложенных элементов (статей или подкатегорий) */ ?>
    <div class="category-items">
        <?php echo $displayData->loadTemplate($displayData->subtemplatename); ?>
    </div>

    <?php if ($displayData->maxLevel != 0 && $displayData->get('children')) : ?>
        <div class="uk-margin-large-top cat-children">
            <hr class="uk-divider-icon">
            <h3 class="uk-heading-line uk-text-center">
                <span><?php echo Text::_('JGLOBAL_SUBCATEGORIES'); ?></span>
            </h3>
            <?php echo $displayData->loadTemplate('children'); ?>
        </div>
    <?php endif; ?>
</div>

<?php
/**
 * WMARKA — шапка категории (список материалов, категории контактов) +
 * подшаблон и дочерние категории. События onContent* — как в ядре.
 *
 * @var \Joomla\CMS\MVC\View\CategoryView $displayData
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Wmarka\Template\Image;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$params    = $displayData->params;
$category  = $displayData->get('category');
$extension = $category->extension;
$htag      = $params->get('show_page_heading') ? 'h2' : 'h1';
$app       = Factory::getApplication();

$category->text = $category->description;
$app->triggerEvent('onContentPrepare', [$extension . '.categories', &$category, &$params, 0]);
$category->description = $category->text;

$afterDisplayTitle    = trim(implode("\n", $app->triggerEvent('onContentAfterTitle', [$extension . '.categories', &$category, &$params, 0])));
$beforeDisplayContent = trim(implode("\n", $app->triggerEvent('onContentBeforeDisplay', [$extension . '.categories', &$category, &$params, 0])));
$afterDisplayContent  = trim(implode("\n", $app->triggerEvent('onContentAfterDisplay', [$extension . '.categories', &$category, &$params, 0])));

$className = substr($extension, 4);
$className = rtrim($className, 's');
$image     = $params->get('show_description_image') ? Image::thumb($category->getParams()->get('image'), 'intro', false) : [];
?>
<div class="<?php echo $className; ?>-category<?php echo $displayData->pageclass_sfx; ?>">
    <?php if ($params->get('show_page_heading')) : ?>
        <h1 class="uk-heading-small"><?php echo $displayData->escape($params->get('page_heading')); ?></h1>
    <?php endif; ?>

    <?php if ($params->get('show_category_title', 1)) : ?>
        <<?php echo $htag; ?> class="<?php echo $htag === 'h1' ? 'uk-heading-small' : 'uk-h2'; ?>"><?php echo HTMLHelper::_('content.prepare', $category->title, '', $extension . '.category.title'); ?></<?php echo $htag; ?>>
    <?php endif; ?>
    <?php echo $afterDisplayTitle; ?>

    <?php if ($params->get('show_cat_tags', 1) && !empty($category->tags->itemTags)) : ?>
        <?php echo LayoutHelper::render('joomla.content.tags', $category->tags->itemTags); ?>
    <?php endif; ?>

    <?php if ($beforeDisplayContent || $afterDisplayContent || ($params->get('show_description') && $category->description) || $image) : ?>
        <div class="uk-grid-medium uk-margin-medium-bottom" uk-grid>
            <?php if ($image) : ?>
                <div class="uk-width-1-3@m"><?php echo Image::img($image, (string) $category->getParams()->get('image_alt', ''), ['class' => 'uk-width-1-1']); ?></div>
            <?php endif; ?>
            <div class="uk-width-expand@m">
                <?php echo $beforeDisplayContent; ?>
                <?php if ($params->get('show_description') && $category->description) : ?>
                    <div class="uk-text-lead"><?php echo HTMLHelper::_('content.prepare', $category->description, '', $extension . '.category.description'); ?></div>
                <?php endif; ?>
                <?php echo $afterDisplayContent; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php echo $displayData->loadTemplate($displayData->subtemplatename); ?>

    <?php if ($displayData->maxLevel != 0 && $displayData->get('children')) : ?>
        <div class="uk-margin-large-top">
            <?php if ($params->get('show_category_heading_title_text', 1) == 1) : ?>
                <h3 class="uk-heading-line"><span><?php echo Text::_('JGLOBAL_SUBCATEGORIES'); ?></span></h3>
            <?php endif; ?>
            <?php echo $displayData->loadTemplate('children'); ?>
        </div>
    <?php endif; ?>
</div>

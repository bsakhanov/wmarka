<?php
/**
 * WMARKA — шапка страницы «Все категории» (материалы, контакты).
 *
 * @var \Joomla\CMS\MVC\View\CategoriesView $displayData
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;

$params = $displayData->params;
?>
<?php if ($params->get('show_page_heading')) : ?>
    <h1 class="uk-heading-small"><?php echo $displayData->escape($params->get('page_heading')); ?></h1>
<?php endif; ?>

<?php if ($params->get('show_base_description')) : ?>
    <?php $description = $params->get('categories_description') ?: ($displayData->parent->description ?? ''); ?>
    <?php if ($description) : ?>
        <div class="uk-text-lead uk-margin-medium-bottom">
            <?php echo HTMLHelper::_('content.prepare', $description, '', $displayData->get('extension') . '.categories'); ?>
        </div>
    <?php endif; ?>
<?php endif; ?>

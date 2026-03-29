<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * @version     WMARKA ULTRA CLEAN (No redundant classes + UIkit 3)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

$params        = $displayData['params'];
$item          = $displayData['item'];
$blockPosition = $params->get('info_block_position', 0);

// Логика отображения
$showBlock1 = (
    $displayData['position'] === 'above' && ($blockPosition == 0 || $blockPosition == 2)
    || $displayData['position'] === 'below' && ($blockPosition == 1)
);

$showBlock2 = (
    $displayData['position'] === 'above' && ($blockPosition == 0)
    || $displayData['position'] === 'below' && ($blockPosition == 1 || $blockPosition == 2)
);

if (!$showBlock1 && !$showBlock2) return;
?>

<div class="article-info-container uk-margin-small-bottom">
    <ul class="uk-subnav uk-subnav-divider uk-flex-middle uk-text-meta uk-margin-remove-top">

        <?php /* БЛОК 1 */ ?>
        <?php if ($showBlock1) : ?>
            <?php if ($params->get('show_author') && !empty($item->author)) : ?>
                <li class="uk-flex uk-flex-middle">
                    <span uk-icon="icon: user; ratio: 0.8" class="uk-margin-xsmall-right"></span>
                    <?php echo $this->sublayout('author', $displayData); ?>
                </li>
            <?php endif; ?>

            <?php if ($params->get('show_parent_category') && !empty($item->parent_id)) : ?>
                <li class="uk-flex uk-flex-middle">
                    <span uk-icon="icon: folder; ratio: 0.8" class="uk-margin-xsmall-right"></span>
                    <?php echo $this->sublayout('parent_category', $displayData); ?>
                </li>
            <?php endif; ?>

            <?php if ($params->get('show_category')) : ?>
                <li class="uk-flex uk-flex-middle">
                    <?php if (!$params->get('show_parent_category')) : ?>
                        <span uk-icon="icon: folder; ratio: 0.8" class="uk-margin-xsmall-right"></span>
                    <?php endif; ?>
                    <?php echo $this->sublayout('category', $displayData); ?>
                </li>
            <?php endif; ?>

            <?php if ($params->get('show_associations')) : ?>
                <li class="uk-flex uk-flex-middle">
                    <?php echo $this->sublayout('associations', $displayData); ?>
                </li>
            <?php endif; ?>

            <?php if ($params->get('show_publish_date')) : ?>
                <li class="uk-flex uk-flex-middle">
                    <span uk-icon="icon: calendar; ratio: 0.8" class="uk-margin-xsmall-right"></span>
                    <?php echo $this->sublayout('publish_date', $displayData); ?>
                </li>
            <?php endif; ?>
        <?php endif; ?>

        <?php /* БЛОК 2 */ ?>
        <?php if ($showBlock2) : ?>
            <?php if ($params->get('show_create_date')) : ?>
                <li class="uk-flex uk-flex-middle">
                    <span uk-icon="icon: clock; ratio: 0.8" class="uk-margin-xsmall-right"></span>
                    <?php echo $this->sublayout('create_date', $displayData); ?>
                </li>
            <?php endif; ?>

            <?php if ($params->get('show_modify_date')) : ?>
                <li class="uk-flex uk-flex-middle">
                    <span uk-icon="icon: history; ratio: 0.8" class="uk-margin-xsmall-right"></span>
                    <?php echo $this->sublayout('modify_date', $displayData); ?>
                </li>
            <?php endif; ?>

            <?php if ($params->get('show_hits')) : ?>
                <li class="uk-flex uk-flex-middle">
                    <span uk-icon="icon: bolt; ratio: 0.8" class="uk-margin-xsmall-right"></span>
                    <?php echo $this->sublayout('hits', $displayData); ?>
                </li>
            <?php endif; ?>
        <?php endif; ?>

    </ul>
</div>

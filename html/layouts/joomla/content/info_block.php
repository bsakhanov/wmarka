<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * @version     WMARKA UIKIT INFO BLOCK (Joomla 6 Full Logic)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

$params        = $displayData['params'];
$blockPosition = $params->get('info_block_position', 0);
$item          = $displayData['item'];

// Проверка: нужно ли вообще выводить этот блок в данной позиции?
$showBlock1 = (
    $displayData['position'] === 'above' && ($blockPosition == 0 || $blockPosition == 2)
    || $displayData['position'] === 'below' && ($blockPosition == 1)
);

$showBlock2 = (
    $displayData['position'] === 'above' && ($blockPosition == 0)
    || $displayData['position'] === 'below' && ($blockPosition == 1 || $blockPosition == 2)
);

if (!$showBlock1 && !$showBlock2) {
    return;
}
?>

<div class="article-info-container uk-margin-small-bottom">
    <ul class="uk-subnav uk-subnav-divider uk-margin-remove-top uk-flex-middle uk-text-meta" role="list" aria-label="<?php echo Text::_('COM_CONTENT_ARTICLE_INFO'); ?>">
        
        <?php /* Заголовок блока для скринридеров (visually-hidden) */ ?>
        <?php if (!$params->get('info_block_show_title', 1)) : ?>
            <li class="uk-hidden"><?php echo Text::_('COM_CONTENT_ARTICLE_INFO'); ?></li>
        <?php endif; ?>

        <?php /* БЛОК 1: Автор, Категории, Ассоциации, Дата публикации */ ?>
        <?php if ($showBlock1) : ?>
            
            <?php if ($params->get('show_author') && !empty($item->author)) : ?>
                <li class="article-author">
                    <span uk-icon="icon: user; ratio: 0.8"></span>
                    <?php echo $this->sublayout('author', $displayData); ?>
                </li>
            <?php endif; ?>

            <?php if ($params->get('show_parent_category') && !empty($item->parent_id)) : ?>
                <li class="article-parent-category">
                    <span uk-icon="icon: folder; ratio: 0.8"></span>
                    <?php echo $this->sublayout('parent_category', $displayData); ?>
                </li>
            <?php endif; ?>

            <?php if ($params->get('show_category')) : ?>
                <li class="article-category">
                    <?php if (!$params->get('show_parent_category')) : ?>
                        <span uk-icon="icon: folder; ratio: 0.8"></span>
                    <?php endif; ?>
                    <?php echo $this->sublayout('category', $displayData); ?>
                </li>
            <?php endif; ?>

            <?php if ($params->get('show_associations')) : ?>
                <li class="article-associations">
                    <?php echo $this->sublayout('associations', $displayData); ?>
                </li>
            <?php endif; ?>

            <?php if ($params->get('show_publish_date')) : ?>
                <li class="article-publish-date">
                    <span uk-icon="icon: calendar; ratio: 0.8"></span>
                    <?php echo $this->sublayout('publish_date', $displayData); ?>
                </li>
            <?php endif; ?>

        <?php endif; ?>

        <?php /* БЛОК 2: Даты создания/изменения и Хиты */ ?>
        <?php if ($showBlock2) : ?>
            
            <?php if ($params->get('show_create_date')) : ?>
                <li class="article-create-date">
                    <span uk-icon="icon: clock; ratio: 0.8"></span>
                    <?php echo $this->sublayout('create_date', $displayData); ?>
                </li>
            <?php endif; ?>

            <?php if ($params->get('show_modify_date')) : ?>
                <li class="article-modify-date">
                    <span uk-icon="icon: history; ratio: 0.8"></span>
                    <?php echo $this->sublayout('modify_date', $displayData); ?>
                </li>
            <?php endif; ?>

            <?php if ($params->get('show_hits')) : ?>
                <li class="article-hits">
                    <span uk-icon="icon: bolt; ratio: 0.8"></span>
                    <?php echo $this->sublayout('hits', $displayData); ?>
                </li>
            <?php endif; ?>

        <?php endif; ?>

    </ul>
</div>

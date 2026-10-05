<?php
/**
 * WMARKA — все метки (макет по умолчанию): список меток колонками.
 *
 * @var \Joomla\Component\Tags\Site\View\Tags\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
?>
<div class="com-tags tag-category">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1 class="uk-heading-small"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
    <?php endif; ?>
    <?php if ($this->params->get('all_tags_show_description_image') && $this->params->get('all_tags_description_image')) : ?>
        <?php echo HTMLHelper::_('image', $this->params->get('all_tags_description_image'), $this->params->get('all_tags_description_image_alt_empty') ? '' : (string) $this->params->get('all_tags_description_image_alt'), ['class' => 'uk-margin-bottom']); ?>
    <?php endif; ?>
    <?php if ($this->params->get('all_tags_description')) : ?>
        <div class="uk-text-lead uk-margin-medium-bottom"><?php echo HTMLHelper::_('content.prepare', $this->params->get('all_tags_description'), '', 'com_tags.tags'); ?></div>
    <?php endif; ?>
    <?php echo $this->loadTemplate('items'); ?>
</div>

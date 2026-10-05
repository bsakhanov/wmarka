<?php
/**
 * WMARKA — избранные контакты.
 *
 * @var \Joomla\Component\Contact\Site\View\Featured\HtmlView $this
 */

\defined('_JEXEC') or die;
?>
<div class="com-contact-featured">
    <?php if ($this->params->get('show_page_heading') != 0) : ?>
        <h1 class="uk-heading-small"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
    <?php endif; ?>
    <?php echo $this->loadTemplate('items'); ?>
    <?php if ($this->params->def('show_pagination', 2) == 1 || ($this->params->get('show_pagination') == 2 && $this->pagination->pagesTotal > 1)) : ?>
        <?php echo $this->pagination->getPagesLinks(); ?>
        <?php if ($this->params->def('show_pagination_results', 1)) : ?>
            <p class="uk-text-meta uk-text-center"><?php echo $this->pagination->getPagesCounter(); ?></p>
        <?php endif; ?>
    <?php endif; ?>
</div>

<?php
/**
 * WMARKA — все категории контактов.
 *
 * @var \Joomla\Component\Contact\Site\View\Categories\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Layout\LayoutHelper;
?>
<div class="com-contact-categories categories-list">
    <?php echo LayoutHelper::render('joomla.content.categories_default', $this); ?>
    <?php echo $this->loadTemplate('items'); ?>
</div>

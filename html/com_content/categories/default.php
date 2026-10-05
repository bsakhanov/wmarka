<?php
/**
 * WMARKA — все категории материалов: шапка + сетка карточек категорий.
 *
 * @var \Joomla\Component\Content\Site\View\Categories\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Layout\LayoutHelper;

?>
<div class="com-content-categories categories-list">
    <?php echo LayoutHelper::render('joomla.content.categories_default', $this); ?>
    <?php echo $this->loadTemplate('items'); ?>
</div>

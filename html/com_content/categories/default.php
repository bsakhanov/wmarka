<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * @version     Joomla 6 WMARKA Core Edition (UIkit 3 Categories Grid)
 */

declare(strict_types=1);

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;

/** @var \Joomla\Component\Content\Site\View\Categories\HtmlView $this */
?>
<div class="com-content-categories categories-list uk-margin-bottom">

    <?php /* --- ЗАГОЛОВОК СТРАНИЦЫ --- */ ?>
    <?php if ($this->params->get('show_page_heading')) : ?>
        <div class="page-header uk-margin-bottom">
            <h1 class="uk-heading-bullet">
                <?php echo $this->escape($this->params->get('page_heading')); ?>
            </h1>
        </div>
    <?php endif; ?>

    <?php /* --- ОПИСАНИЕ БАЗОВОЙ КАТЕГОРИИ --- */ ?>
    <?php if ($this->params->get('show_base_description')) : ?>
        <?php if ($this->params->get('categories_description')) : ?>
            <div class="category-desc uk-margin-medium-bottom uk-text-lead uk-text-muted">
                <?php echo HTMLHelper::_('content.prepare', $this->params->get('categories_description'), '', 'com_content.categories'); ?>
            </div>
        <?php elseif ($this->parent->description) : ?>
            <div class="category-desc uk-margin-medium-bottom uk-text-lead uk-text-muted">
                <?php echo HTMLHelper::_('content.prepare', $this->parent->description, '', 'com_content.categories'); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php /* --- ПОДКЛЮЧЕНИЕ СЕТКИ КАТЕГОРИЙ --- */ ?>
    <div class="uk-margin-medium-top">
        <?php echo $this->loadTemplate('items'); ?>
    </div>

</div>
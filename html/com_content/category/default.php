<?php
defined('_JEXEC') or die;

use Joomla\CMS\Layout\LayoutHelper;

/** @var \Joomla\Component\Content\Site\View\Category\HtmlView $this */
?>
<div class="category-list-wrap uk-section uk-section-xsmall" itemscope itemtype="https://schema.org/CollectionPage">
    <div class="uk-container">
        <?php
        $this->subtemplatename = 'articles';
        // Этот вызов рендерит заголовок и описание из layouts/joomla/content/category_default.php
        echo LayoutHelper::render('joomla.content.category_default', $this);
        ?>
    </div>
</div>

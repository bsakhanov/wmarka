<?php
defined('_JEXEC') or die;

use Joomla\CMS\Layout\LayoutHelper;

/** @var \Joomla\Component\Content\Site\View\Category\HtmlView $this */
?>
<div itemscope itemtype="https://schema.org/CollectionPage">

        <?php
        $this->subtemplatename = 'articles';
        // Этот вызов рендерит заголовок и описание из layouts/joomla/content/category_default.php
        echo LayoutHelper::render('joomla.content.category_default', $this);
        ?>

</div>

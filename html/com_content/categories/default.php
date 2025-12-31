<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * @version     WMARKA ULTRA CLEAN (No legacy classes)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Layout\LayoutHelper;

/** @var \Joomla\Component\Content\Site\View\Categories\HtmlView $this */
?>

<div class="uk-section uk-section-xsmall" itemscope itemtype="https://schema.org/CollectionPage">
    <div class="uk-container">
        
        <?php /* Заголовок и описание (Layout) */ ?>
        <header class="uk-margin-medium-bottom">
            <?php echo LayoutHelper::render('joomla.content.categories_default', $this); ?>
        </header>

        <?php /* Список элементов (Template items) */ ?>
        <main itemprop="mainEntity" itemscope itemtype="https://schema.org/ItemList">
            <?php echo $this->loadTemplate('items'); ?>
        </main>

    </div>
</div>

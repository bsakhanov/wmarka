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

<div itemscope itemtype="https://schema.org/CollectionPage">
        
        <?php /* Заголовок и описание (Layout) */ ?>
        <header class="uk-margin-medium-bottom">
            <?php echo LayoutHelper::render('joomla.content.categories_default', $this); ?>
        </header>

        <?php /* Список элементов (Template items) */ ?>
        <div itemprop="mainEntity" itemscope itemtype="https://schema.org/ItemList">
            <?php echo $this->loadTemplate('items'); ?>
        </div>
</div>

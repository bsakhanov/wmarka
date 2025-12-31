<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * @version     WMARKA ULTRA (Blog Links + UIkit 3 + Schema.org)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;

/** @var \Joomla\Component\Content\Site\View\Category\HtmlView $this */

if (empty($this->link_items)) {
    return;
}
?>

<div class="uk-margin-large-top blog-links-container">
    <h3 class="uk-heading-line uk-text-bold">
        <span><?php echo Joomla\CMS\Language\Text::_('COM_CONTENT_MORE_ARTICLES'); ?></span>
    </h3>

    <ul class="uk-list uk-list-divider uk-margin-small-top" itemscope itemtype="https://schema.org/ItemList">
        <?php foreach ($this->link_items as $key => $item) : ?>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="<?php echo Route::_(RouteHelper::getArticleRoute($item->slug, $item->catid, $item->language)); ?>" 
                   class="uk-link-muted uk-flex uk-flex-middle" 
                   itemprop="url">
                    
                    <span uk-icon="icon: chevron-right; ratio: 0.8" class="uk-margin-small-right uk-text-primary"></span>
                    
                    <span itemprop="name" class="uk-text-emphasis">
                        <?php echo $this->escape($item->title); ?>
                    </span>
                </a>
                
                <meta itemprop="position" content="<?php echo $key + 1; ?>">
            </li>
        <?php endforeach; ?>
    </ul>
</div>

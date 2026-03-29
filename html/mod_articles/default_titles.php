<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles
 */

defined('_JEXEC') or die;
?>
<ul class="uk-list uk-list-divider uk-list-large">
    <?php foreach ($items as $item) : ?>
        <li itemscope itemtype="https://schema.org/Article" class="uk-link-toggle">
            <a class="uk-grid-small uk-flex-middle" uk-grid href="<?php echo $item->link; ?>" itemprop="url">
                <div class="uk-width-auto">
                    <span class="uk-icon-button" uk-icon="icon: file-text; ratio: 0.8"></span>
                </div>
                <div class="uk-width-expand">
                    <span itemprop="name" class="uk-text-small uk-text-bold uk-display-block uk-link-heading">
                        <?php echo $item->title; ?>
                    </span>
                    <?php if ($item->displayDate) : ?>
                        <div class="uk-text-meta uk-text-nowrap" style="font-size: 0.7rem;">
                            <span uk-icon="icon: calendar; ratio: 0.6"></span>
                            <?php echo Joomla\CMS\HTML\HTMLHelper::_('date', $item->publish_up, 'd.m.Y'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
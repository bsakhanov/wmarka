<?php
defined('_JEXEC') or die;

use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;
?>
<div class="uk-card uk-card-secondary uk-card-small uk-border-rounded uk-padding-small">
    <h3 class="uk-heading-bullet uk-margin-small-bottom uk-text-small uk-text-uppercase"><?php echo Joomla\CMS\Language\Text::_('COM_CONTENT_MORE_ARTICLES'); ?></h3>
    <ul class="uk-list uk-list-divider uk-margin-remove-bottom">
        <?php foreach ($this->link_items as $item) : ?>
            <li>
                <a href="<?php echo Route::_(RouteHelper::getArticleRoute($item->slug, $item->catid, $item->language)); ?>" class="uk-link-reset uk-flex uk-flex-middle">
                    <span uk-icon="icon: chevron-right; ratio: 0.8" class="uk-margin-small-right"></span>
                    <span class="uk-text-small"><?php echo $this->escape($item->title); ?></span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

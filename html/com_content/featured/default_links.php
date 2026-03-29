<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 */

declare(strict_types=1);

defined('_JEXEC') or die;

use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;
?>

<div class="uk-card uk-card-default uk-card-body uk-card-small uk-border-rounded">
    <h4 class="uk-card-title uk-margin-small-bottom">Ещё статьи</h4>
    <ul class="uk-list uk-list-bullet uk-list-collapse">
        <?php foreach ($this->link_items as $item) : ?>
            <li>
                <a class="uk-link-muted" href="<?php echo Route::_(RouteHelper::getArticleRoute($item->slug, $item->catid, $item->language)); ?>">
                    <?php echo $this->escape($item->title); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
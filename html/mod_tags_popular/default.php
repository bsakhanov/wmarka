<?php
/**
 * WMARKA — популярные метки списком с числом материалов.
 *
 * @var array $list
 * @var bool  $display_count
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Tags\Site\Helper\RouteHelper;

if (!\count($list)) {
    echo '<p class="uk-text-meta">' . Text::_('MOD_TAGS_POPULAR_NO_ITEMS_FOUND') . '</p>';
    return;
}
?>
<ul class="uk-nav uk-nav-default">
    <?php foreach ($list as $item) : ?>
        <li>
            <a class="uk-flex uk-flex-between uk-flex-middle" href="<?php echo Route::_(RouteHelper::getComponentTagRoute($item->tag_id . ':' . $item->alias, $item->language)); ?>">
                <span>#<?php echo htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8'); ?></span>
                <?php if ($display_count) : ?><span class="uk-badge"><?php echo (int) $item->count; ?></span><?php endif; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

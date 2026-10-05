<?php
/**
 * WMARKA — пагинация (устаревший путь getListFooter/list).
 *
 * @var array $displayData ['list']
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

$list = $displayData['list'];
?>
<nav aria-label="<?php echo Text::_('JLIB_HTML_PAGINATION'); ?>">
    <ul class="uk-pagination uk-flex-center">
        <?php echo $list['previous']['data']; ?>
        <?php foreach ($list['pages'] as $page) : ?>
            <?php echo $page['data']; ?>
        <?php endforeach; ?>
        <?php echo $list['next']['data']; ?>
    </ul>
</nav>

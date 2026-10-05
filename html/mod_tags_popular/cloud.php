<?php
/**
 * WMARKA — облако меток: размер шрифта пропорционален числу материалов.
 *
 * @var \Joomla\Registry\Registry $params
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

$min    = (float) $params->get('minsize', 1);
$max    = (float) $params->get('maxsize', 2);
$counts = array_map(static fn ($i) => (int) $i->count, $list);
$lo     = min($counts);
$diff   = max($counts) - $lo;
?>
<div class="uk-text-break">
    <?php foreach ($list as $item) : ?>
        <?php $size = $diff === 0 ? $min : $min + (($max - $min) / $diff) * ((int) $item->count - $lo); ?>
        <a class="uk-link-text uk-margin-small-right" style="font-size: <?php echo round($size, 2); ?>em" href="<?php echo Route::_(RouteHelper::getComponentTagRoute($item->tag_id . ':' . $item->alias, $item->language)); ?>">#<?php echo htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8'); ?><?php if ($display_count) : ?><sup class="uk-text-meta"><?php echo (int) $item->count; ?></sup><?php endif; ?></a>
    <?php endforeach; ?>
</div>

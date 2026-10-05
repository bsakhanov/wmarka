<?php
/**
 * WMARKA — ассоциации материала (версии на других языках).
 *
 * @var array $displayData
 */

\defined('_JEXEC') or die;

if (empty($displayData)) {
    return;
}
?>
<ul class="uk-subnav uk-subnav-divider uk-margin-small">
    <?php foreach ($displayData as $item) : ?>
        <?php $link = \is_array($item) ? ($item['link'] ?? '') : ($item->link ?? ''); ?>
        <?php if ($link) : ?><li><?php echo $link; ?></li><?php endif; ?>
    <?php endforeach; ?>
</ul>

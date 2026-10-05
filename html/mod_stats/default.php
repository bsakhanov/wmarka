<?php
/**
 * WMARKA — статистика сайта.
 *
 * @var array $list
 */

\defined('_JEXEC') or die;
?>
<ul class="uk-list uk-list-divider">
    <?php foreach ($list as $item) : ?>
        <li class="uk-flex uk-flex-between uk-flex-middle"><span><?php echo $item->title; ?></span><span class="uk-badge"><?php echo $item->data; ?></span></li>
    <?php endforeach; ?>
</ul>

<?php
/**
 * WMARKA — архив по месяцам.
 *
 * @var array $list
 */

\defined('_JEXEC') or die;

if (empty($list)) {
    return;
}
?>
<ul class="uk-list uk-list-divider">
    <?php foreach ($list as $item) : ?>
        <li><a class="uk-link-text" href="<?php echo $item->link; ?>"><?php echo $item->text; ?></a></li>
    <?php endforeach; ?>
</ul>

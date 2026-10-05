<?php
/**
 * WMARKA — новые пользователи.
 *
 * @var array $names
 */

\defined('_JEXEC') or die;

if (empty($names)) {
    return;
}
?>
<ul class="uk-list uk-list-divider">
    <?php foreach ($names as $name) : ?>
        <li><span uk-icon="icon: user; ratio: 0.8" class="uk-margin-small-right uk-text-muted"></span><?php echo htmlspecialchars($name->username, ENT_QUOTES, 'UTF-8'); ?></li>
    <?php endforeach; ?>
</ul>

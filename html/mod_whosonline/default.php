<?php
/**
 * WMARKA — кто на сайте.
 *
 * @var \Joomla\Registry\Registry $params
 * @var int   $showmode
 * @var array $count
 * @var array $names
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
?>
<div class="uk-text-small">
    <?php if ($showmode == 0 || $showmode == 2) : ?>
        <p class="uk-margin-small"><?php echo Text::sprintf('MOD_WHOSONLINE_WE_HAVE', Text::plural('MOD_WHOSONLINE_GUESTS', $count['guest']), Text::plural('MOD_WHOSONLINE_MEMBERS', $count['user'])); ?></p>
    <?php endif; ?>
    <?php if ($showmode > 0 && \count($names)) : ?>
        <?php if ($params->get('filter_groups', 0)) : ?><p class="uk-text-meta"><?php echo Text::_('MOD_WHOSONLINE_SAME_GROUP_MESSAGE'); ?></p><?php endif; ?>
        <ul class="uk-list">
            <?php foreach ($names as $name) : ?>
                <li><span uk-icon="icon: user; ratio: 0.8" class="uk-margin-small-right uk-text-success"></span><?php echo htmlspecialchars($name->username, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

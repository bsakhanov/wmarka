<?php
defined('_JEXEC') or die;
use Joomla\CMS\Language\Text;
?>
<div class="uk-card uk-card-default uk-card-body uk-text-center uk-margin-bottom">
    <span uk-icon="icon: info; ratio: 2" class="uk-text-muted uk-margin-small-bottom"></span>
    <p class="uk-text-meta uk-margin-remove">
        <?php echo Text::_($displayData['title'] ?? 'JGLOBAL_NO_MATCHING_RESULTS'); ?>
    </p>
</div>

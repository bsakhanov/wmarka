<?php
defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper;

$params = $displayData['params'];
$item   = $displayData['item'];
$link   = $displayData['link'];
?>

<div uk-margin class="uk-margin-medium-top readmore-container">
    <?php if (!$params->get('access-view')) : ?>
        <a class="uk-button uk-button-default uk-border-rounded" href="<?php echo $link; ?>" aria-label="<?php echo Text::_('JGLOBAL_REGISTER_TO_READ_MORE') . ' ' . $this->escape($item->title); ?>">
            <span uk-icon="icon: lock; ratio: 0.8" class="uk-margin-small-right"></span>
            <?php echo Text::_('JGLOBAL_REGISTER_TO_READ_MORE'); ?>
        </a>
    <?php elseif ($readmore = $item->alternative_readmore) : ?>
        <a class="uk-button uk-button-default uk-border-rounded" href="<?php echo $link; ?>" aria-label="<?php echo $this->escape($readmore . ' ' . $item->title); ?>">
            <?php echo $readmore; ?>
            <?php if ($params->get('show_readmore_title', 0) != 0) : ?>
                : <?php echo HTMLHelper::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
            <?php endif; ?>
            <span uk-icon="icon: arrow-right; ratio: 0.8" class="uk-margin-small-left"></span>
        </a>
    <?php else : ?>
        <a class="uk-button uk-button-default uk-border-rounded" href="<?php echo $link; ?>" aria-label="<?php echo Text::sprintf('JGLOBAL_READ_MORE_TITLE', $this->escape($item->title)); ?>">
            <?php 
            $titleText = ($params->get('show_readmore_title', 0) == 0) 
                ? Text::_('JGLOBAL_READ_MORE') 
                : Text::sprintf('JGLOBAL_READ_MORE_TITLE', HTMLHelper::_('string.truncate', $item->title, $params->get('readmore_limit')));
            echo $titleText;
            ?>
            <span uk-icon="icon: arrow-right; ratio: 0.8" class="uk-margin-small-left"></span>
        </a>
    <?php endif; ?>
</div>

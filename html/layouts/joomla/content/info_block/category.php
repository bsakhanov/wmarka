<?php
defined('_JEXEC') or die;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;

$item   = $displayData['item'];
$params = $displayData['params'];
$title  = $this->escape($item->category_title);
?>
<span itemprop="articleSection">
    <?php if ($params->get('link_category') && !empty($item->catid)) : ?>
        <?php $url = '<a href="' . Route::_(RouteHelper::getCategoryRoute($item->catid, $item->category_language)) . '">' . $title . '</a>'; ?>
        <?php echo Text::sprintf('COM_CONTENT_CATEGORY', $url); ?>
    <?php else : ?>
        <?php echo Text::sprintf('COM_CONTENT_CATEGORY', '<span>' . $title . '</span>'); ?>
    <?php endif; ?>
</span>

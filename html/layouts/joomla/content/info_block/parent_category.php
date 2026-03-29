<?php
defined('_JEXEC') or die;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;

$item   = $displayData['item'];
$params = $displayData['params'];
if (empty($item->parent_id)) return;

$title = $this->escape($item->parent_title);
?>
<span class="parent-category-text">
    <?php
    if ($params->get('link_parent_category')) {
        $url = '<a href="' . Route::_(RouteHelper::getCategoryRoute($item->parent_id, $item->parent_language)) . '" 
                   itemprop="genre" 
                   class="uk-text-italic">' . $title . '</a>&nbsp;&nbsp;|';
        echo Text::sprintf('COM_CONTENT_PARENT', $url);
    } else {
        echo Text::sprintf('COM_CONTENT_PARENT', '<span itemprop="genre" class="uk-text-italic">' . $title . '</span>');
    }
    ?>
</span>

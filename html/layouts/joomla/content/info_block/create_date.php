<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

$item = $displayData['item'];
?>
<time datetime="<?php echo HTMLHelper::_('date', $item->created, 'c'); ?>">
    <?php echo Text::sprintf('COM_CONTENT_CREATED_DATE_ON', HTMLHelper::_('date', $item->created, Text::_('DATE_FORMAT_LC3'))); ?>
</time>

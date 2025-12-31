<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

$item = $displayData['item'];
?>
<time datetime="<?php echo HTMLHelper::_('date', $item->modified, 'c'); ?>">
    <?php echo Text::sprintf('COM_CONTENT_LAST_UPDATED', HTMLHelper::_('date', $item->modified, Text::_('DATE_FORMAT_LC3'))); ?>
</time>

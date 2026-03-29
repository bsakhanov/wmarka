<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

$item = $displayData['item'];
?>
<time datetime="<?php echo Joomla\CMS\HTML\HTMLHelper::_('date', $displayData['item']->created, 'c'); ?>" itemprop="dateCreated">
    <?php echo Joomla\CMS\Language\Text::sprintf('COM_CONTENT_CREATED_DATE_ON', Joomla\CMS\HTML\HTMLHelper::_('date', $displayData['item']->created, Joomla\CMS\Language\Text::_('DATE_FORMAT_LC3'))); ?>
</time>

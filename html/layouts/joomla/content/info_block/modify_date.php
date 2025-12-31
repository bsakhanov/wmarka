<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

$item = $displayData['item'];
?>
<time datetime="<?php echo Joomla\CMS\HTML\HTMLHelper::_('date', $displayData['item']->modified, 'c'); ?>" itemprop="dateModified">
    <?php echo Joomla\CMS\Language\Text::sprintf('COM_CONTENT_LAST_UPDATED', Joomla\CMS\HTML\HTMLHelper::_('date', $displayData['item']->modified, Joomla\CMS\Language\Text::_('DATE_FORMAT_LC3'))); ?>
</time>

<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * @version     WMARKA CLEAN (Publish Date Sublayout)
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Factory;

$item = $displayData['item'];

if (!$item->publish_up) {
    return;
}
?>

<time datetime="<?php echo Factory::getDate($item->publish_up)->format('c'); ?>" itemprop="datePublished">
    <?php echo HTMLHelper::_('date', $item->publish_up, Text::_('DATE_FORMAT_LC3')); ?>
</time>

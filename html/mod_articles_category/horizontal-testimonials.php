<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 * @author		web-eau.net
 * @copyright   (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;

if (!$list)
{
	return;
}

?>

<div class="row category-module<?php echo $moduleclass_sfx; ?>">
	
	<?php foreach ($list as $item) : ?>
	
	<blockquote class="blockquote quote-card blue-card"> <!-- others colors available in CSS : red-card, green-card and yellow-card -->
		<p><?php echo $item->displayIntrotext; ?></p>
		<footer class="blockquote-footer"><?php echo $item->displayAuthorName; ?> <cite title="Source Title"><?php echo $item->displayDate; ?></cite></footer>
	</blockquote>

	<?php endforeach; ?>
	
</div>
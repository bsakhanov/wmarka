<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 * @author		web-eau.net
 * @copyright   (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;

if (!$list)
{
	return;
}

?>

<div class="row row-cols-1 row-cols-md-4 g-4"> <!-- Because we want 4 columns -->
	
	<?php foreach ($list as $groupName => $items) : ?>
		<div>
			<h4 class="mod-articles-category-group fw-bold text-center"><?php echo Text::_($groupName); ?></h4>
			
			<div class="col">
				<div class="h-100 p-3 text-center">
				
					<?php foreach ($items as $item) : ?>
					
						<div class="py-1">
							<?php $attributes = ['class' => 'mod-articles-category-title ' . $item->active]; ?>
							<?php $link = htmlspecialchars($item->link, ENT_COMPAT, 'UTF-8', false); ?>
							<?php $title = htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8', false); ?>
							<?php echo HTMLHelper::_('link', $link, $title, $attributes); ?>

						</div>
						
					<?php endforeach; ?>
					
				</div>
			</div>
				
		</div>
	<?php endforeach; ?>
	
</div>

<hr />   
<!-- Copyright footer -->      
<div class="text-center pb-5">
<?php $config = JFactory::getConfig(); echo 'Copyright <i class="fa fa-copyright"></i> 2012 - '; echo date('Y'); echo (' - '); echo $config->get( 'sitename' ); echo (' - All rights reserved'); ?>
</div>
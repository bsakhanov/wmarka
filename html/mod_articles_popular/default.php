<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_popular
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

\defined('_JEXEC') or die;

if (!$list) {
    return;
}

?>
<ul class="uk-list mostread<?php echo $moduleclass_sfx; ?> uk-list-divider">
    <?php foreach ($list as $item) { ?>
    <li itemscope itemtype="https://schema.org/Article">
	<?php include JModuleHelper::getLayoutPath('mod_articles_popular', '_item') ?>
      

		
	
    </li>
    <?php } ?>
</ul>

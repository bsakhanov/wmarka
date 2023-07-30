<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_popular
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<section class="">

 
<ol class="uk-list mostread<?php echo $moduleclass_sfx; ?> uk-list-divider" >
    <?php foreach ($list as $item) { ?>
    <li itemscope itemtype="https://schema.org/Article">
	<?php include JModuleHelper::getLayoutPath('mod_articles_popular', '_item-home') ?>
      

		
	
    </li>
    <?php } ?>
</ol>
</section>
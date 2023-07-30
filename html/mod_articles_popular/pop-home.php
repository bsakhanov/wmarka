<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_popular
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<a href="/popular-news" target="_blank" ><h3 class="uk-h4 uk-link-reset uk-margin-remove uk-text-primary  uk-text-center "><span uk-icon="icon: eye; ratio: 1.2"></span> <?php echo $module->title; ?></a></h3>
<ol class="uk-list mostread<?php echo $moduleclass_sfx; ?> uk-list-divider" >
    <?php foreach ($list as $item) { ?>
    <li itemscope itemtype="https://schema.org/Article">
	<?php include JModuleHelper::getLayoutPath('mod_articles_popular', '_item-home') ?>
      

		
	
    </li>
    <?php } ?>
</ol>

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
<h3 class="uk-heading-line uk-h5 uk-flex uk-flex-center"><span><a class="uk-button uk-button uk-button-primary uk-border-rounded   " href="/popular-news"><?php echo $module->title; ?></a></span></h3>
 
<ol class="uk-list mostread<?php echo $moduleclass_sfx; ?> uk-list-divider" >
    <?php foreach ($list as $item) { ?>
    <li itemscope itemtype="https://schema.org/Article">
	<?php include JModuleHelper::getLayoutPath('mod_articles_popular', '_item-home') ?>
      

		
	
    </li>
    <?php } ?>
</ol>
</section>
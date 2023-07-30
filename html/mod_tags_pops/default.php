<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_tags_pops
 * @copyright   Copyright (C) Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

JLoader::register('TagsHelperRoute', JPATH_BASE . '/components/com_tags/helpers/route.php');
$moduleLink               = $params->get('moduleLink');
$titleText                = $params->get('titleText');
$moduleTarget             = $params->get('moduleTarget');
$moduleLink2               = $params->get('moduleLink2');
$titleText2                = $params->get('titleText2');
$moduleTarget2             = $params->get('moduleTarget2');
?>

<h3 id="mod-pops-<?php echo $module->id ?>" class="uk-heading-divider uk-heading-bullet uk-h2"><?php echo $module->title; ?> 	<span class="uk-label uk-link-reset"><a href="<?php echo $moduleLink;?>" target="_<?php echo $moduleTarget; ?>"><?php echo $titleText; ?></span></a>
	<span class="uk-label uk-link-reset"><a href="<?php echo $moduleLink2;?>" target="_<?php echo $moduleTarget2; ?>"><?php echo $titleText2; ?></a></span></h3>
<div class="uk-width-1-1">


    <?php if (!count($list)) { ?>
    <div class="uk-text-muted"><?php echo Text::_('MOD_TAGS_POPS_NO_ITEMS_FOUND'); ?></div>
    <?php } else { ?>
    <div class="uk-child-width-1-3@m " uk-grid>
        <?php foreach ($list as $item) { ?>
        <div class="uk-flex  uk-flex-middle uk-margin-top2">
            <a class="uk-link-heading  uk-heading-divider uk-heading-bullet" href="<?php echo Route::_(TagsHelperRoute::getTagRoute($item->tag_id . ':' . $item->alias)); ?>"><?php echo htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8'); ?></a>
            <?php if ($display_count) { ?>
            <span class="tag-count uk-badge uk-background-muted uk-text-emphasis uk-margin-small-left"><?php echo $item->count; ?></span>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
	<footer class="uk-card-footer uk-text-center uk-margin-large-top uk-background-muted uk-flex2">
<p class="uk-grid-divider uk-grid uk-flex uk-flex-center uk-flex3" uk-grid>	
	<a href="<?php echo $moduleLink;?>" target="_<?php echo $moduleTarget; ?>" class="uk-text-large uk-link-heading" ><?php echo $titleText; ?><span class="uk-margin-small-left" uk-icon="list"></a>
	<a href="<?php echo $moduleLink2;?>" target="_<?php echo $moduleTarget2; ?>" class="uk-text-large uk-link-heading" ><?php echo $titleText2; ?><span class="uk-margin-small-left" uk-icon="forward"></a>
</p>
	</footer>
</div>

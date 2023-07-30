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
?>
<div class="uk-width-xlarge">
    <?php if (!count($list)) { ?>
    <div class="uk-text-muted"><?php echo Text::_('MOD_TAGS_POPS_NO_ITEMS_FOUND'); ?></div>
    <?php } else { ?>
    <div class="uk-child-width-1-3 uk-grid-small" uk-grid>
        <?php foreach ($list as $item) { ?>
        <div class="uk-fex uk-flex-center uk-flex-middle">
            <a href="<?php echo Route::_(TagsHelperRoute::getTagRoute($item->tag_id . ':' . $item->alias)); ?>"><?php echo htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8'); ?></a>
            <?php if ($display_count) { ?>
            <span class="tag-count uk-badge"><?php echo $item->count; ?></span>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
	<footer class="uk-card-footer">
	<a href="<?php echo $moduleLink;?>" target="_<?php echo $moduleTarget; ?>" class="uk-text-primary uk-button uk-button-text uk-text-center"><?php echo $titleText; ?></a>
	</footer>
</div>

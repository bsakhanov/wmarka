<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_tags_popular
 * @copyright   Copyright (C) Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

$minsize = $params->get('minsize', 1);
$maxsize = $params->get('maxsize', 2);

JLoader::register('TagsHelperRoute', JPATH_BASE . '/components/com_tags/helpers/route.php');

?>
<div class="<?php echo $moduleclass_sfx; ?> <?php echo $moduleclass_sfx; ?>">
<?php if (!count($list)) { ?>
    <div class="uk-text-muted"><?php echo Text::_('MOD_TAGS_POPS_NO_ITEMS_FOUND'); ?></div>
<?php } else { ?>
    <div class="uk-flex uk-flex-wrap" data-uk-margin>
        <?php
        $mincount = null;
        $maxcount = null;
        foreach ($list as $item) {
            if ($mincount === null || $mincount > $item->count) {
                $mincount = $item->count;
            }
            if ($maxcount === null || $maxcount < $item->count) {
                $maxcount = $item->count;
            }
        }
        $countdiff = $maxcount - $mincount;

        foreach ($list as $item) {
            if ($countdiff === 0) {
                $fontsize = $minsize;
            } else {
                $fontsize = $minsize + (($maxsize - $minsize) / $countdiff) * ($item->count - $mincount);
            }
            ?>
        <span class="uk-margin-small-right uk-button uk-button-default uk-background-muted uk-margin-small-top uk-flex uk-flex-middle">
            <a class="uk-text-primary uk-link-heading uk-margin-small-right uk-text-lowercase" style="font-size: 1.05rem;" href="<?php echo Route::_(TagsHelperRoute::getTagRoute($item->tag_id . ':' . $item->alias)); ?>"><?php echo htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8'); ?></a>
            <?php if ($display_count) { ?>
                <span class="uk-label"><?php echo $item->count; ?></span>
            <?php } ?>
        </span>
        <?php } ?>
    </div>
    <?php } ?>
	<hr class="uk-divider-icon" />
<p><a href="/popular-news" target="_blank" class="uk-text-large uk-text-bold uk-flex uk-flex-middle uk-flex-center uk-link-heading"> <span>Самые популярные новости </span><span class="uk-margin-small-left" uk-icon="icon: forward; ratio: 1.3"></span></a></p>
</div>

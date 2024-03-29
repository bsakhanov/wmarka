<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

use Joomla\Registry\Registry;
use Joomla\CMS\Factory;
use Joomla\CMS\Router\Route;

JLoader::register('TagsHelperRoute', JPATH_BASE . '/components/com_tags/helpers/route.php');

$authorised = Factory::getUser()->getAuthorisedViewLevels();

?>
<?php if (!empty($displayData)) { ?>
<p uk-margin>
    <?php
    foreach ($displayData as $i => $tag) {
        if (in_array($tag->access, $authorised)) {
            $tagParams = new Registry($tag->params);
            $link_class = $tagParams->get('tag_link_class', 'label label-info');
            ?>
    <button class="tag-<?php echo $tag->tag_id; ?> tag-list<?php echo $i; ?> uk-button uk-button-default uk-button-small" itemprop="keywords">
        <a href="<?php echo Route::_(TagsHelperRoute::getTagRoute($tag->tag_id . ':' . $tag->alias)); ?>" class="<?php echo $link_class; ?>   "><?php echo $this->escape($tag->title); ?></a>,
    </button>
    <?php
        }
    }
    ?>
</p>
<?php 
}


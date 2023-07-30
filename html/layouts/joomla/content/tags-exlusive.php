<?php

/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   (C) 2013 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Router\Route;
use Joomla\Component\Tags\Site\Helper\RouteHelper;
use Joomla\Registry\Registry;
JLoader::register('TagsHelperRoute', JPATH_BASE . '/components/com_tags/helpers/route.php');

$app = Factory::getContainer()->get(Joomla\CMS\Application\SiteApplication::class);
$authorised = $app->getIdentity()->getAuthorisedViewLevels();
$jsIcons = $app->getTemplate(true)->params->get('jsIcons', 'none') != 'none';

?>
<?php if (!empty($displayData)) { ?>
<div class="uk-text-truncate  ">
<div class="uk-flex">
    <?php
    foreach ($displayData as $i => $tag) {
        if (in_array($tag->access, $authorised)) {
            $tagParams = new Registry($tag->params);
            $link_class = $tagParams->get('tag_link_class', 'label label-info');
            ?>
    
        [<a href="<?php echo Route::_(TagsHelperRoute::getTagRoute($tag->tag_id . ':' . $tag->alias)); ?>" class="uk-link-heading uk-text-small <?php echo $link_class; ?> margin-mini4 "><?php echo $this->escape($tag->title); ?></a>]
  
    <?php
        }
    }
    ?>
</div>
</div>
<?php
}

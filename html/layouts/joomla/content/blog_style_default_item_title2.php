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
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;
 

 

// Create a shortcut for params.
$params  = $displayData->params;
$canEdit = $displayData->params->get('access-edit');

$currentDate = Factory::getDate()->format('Y-m-d H:i:s');
?>
<?php if ($displayData->state == 0 || $params->get('show_title') || ($params->get('show_author') && !empty($displayData->author))) { ?>
    <div class="page-header">
        <?php if ($params->get('show_title')) { ?>
           <h2 class="uk-h6 uk-text-bold uk-card-header uk-padding-remove-horizontal">
                <?php if ($params->get('link_titles') && ($params->get('access-view') || $params->get('show_noauth', '0') == '1')) { ?>
                    <a href="<?php echo Route::_(
                                    RouteHelper::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language)
                                ); ?>" itemprop="url" class="uk-link-heading">
                        <?php echo $this->escape($displayData->title); ?>
                    </a>
                <?php } else { ?>
                    <?php echo $this->escape($displayData->title); ?>
                <?php } ?>
            </h2> <?php } ?>
      
		<?php         if ($displayData->state == 0) : ?>
			<span class="uk-label uk-label-warning uk-margin-small-right uk-text-uppercase"><?php echo Text::_('JUNPUBLISHED'); ?></span>
		<?php endif; ?>

		<?php if ($displayData->publish_up > $currentDate) : ?>
			<span class="uk-label uk-label-warning uk-margin-small-right uk-text-uppercase"><?php echo Text::_('JNOTPUBLISHEDYET'); ?></span>
		<?php endif; ?>

		<?php if ($displayData->publish_down !== null && $displayData->publish_down < $currentDate) : ?>
			<span class="uk-label uk-label-warning uk-margin-small-right uk-text-uppercase"><?php echo Text::_('JEXPIRED'); ?></span>
		<?php endif; ?>			
        
    </div>
<?php } ?>

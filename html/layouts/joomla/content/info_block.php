<?php

/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   (C) 2017 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

?>
<dl class="uk-flex uk-flex-middle uk-flex-wrap uk-article-meta uk-margin-remove">

    <?php if ($displayData['params']->get('info_block_show_title', 1)) { ?>
        <dt class="margin-mini article-info-term"><?php echo Text::_('COM_CONTENT_ARTICLE_INFO'); ?> </dt>
    <?php } ?>

    <?php if ($displayData['params']->get('show_author') && !empty($displayData['item']->author)) { ?>
        <div class="margin-mini"> <?php echo $this->sublayout('author', $displayData); ?></div>
    <?php } ?>

    <?php if ($displayData['params']->get('show_parent_category') && !empty($displayData['item']->parent_id)) { ?>
        <div class="margin-mini"><?php echo $this->sublayout('parent_category', $displayData); ?> </div>
    <?php } ?>

    <?php if ($displayData['params']->get('show_category')) { ?>
        <div class="margin-mini"><?php echo $this->sublayout('category', $displayData); ?> </div>
    <?php } ?>

    <?php if ($displayData['params']->get('show_associations')) { ?>
        <div class="margin-mini"><?php echo $this->sublayout('associations', $displayData); ?> </div>
    <?php } ?>

    <?php if ($displayData['params']->get('show_create_date')) { ?>
        <div class="margin-mini"><?php echo $this->sublayout('create_date', $displayData); ?> </div>
    <?php } ?>

    <?php if ($displayData['params']->get('show_publish_date')) { ?>
        <div class="margin-mini"><?php echo $this->sublayout('publish_date', $displayData); ?> </div>
    <?php } ?>

    <?php if ($displayData['params']->get('show_modify_date')) { ?>
        <div class="margin-mini"><?php echo $this->sublayout('modify_date', $displayData); ?> </div>
    <?php } ?>

    <?php if ($displayData['params']->get('show_hits')) { ?>
        <div class="margin-mini"><?php echo $this->sublayout('hits', $displayData); ?></div>
    <?php } ?>
</dl>

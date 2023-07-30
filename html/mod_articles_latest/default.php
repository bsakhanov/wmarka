<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

\defined('_JEXEC') or die;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;

if (!$list) {
    return;
}

?>
<section class="uk-section uk-section-xsmall">
	
	<!-- Section heading -->

		
<h3 class="uk-heading-line uk-h5"><span><a class="uk-button uk-button-primary " href="<?php echo $list[0]->displayCategoryLink; ?>">
                <?php echo $module->title; ?>
            </a></span></h3>
<ul class="uk-list uk-list-divider ">
    <?php foreach ($list as $item) { ?>
        <li itemscope itemtype="https://schema.org/Article"><span class="uk-text-middle uk-text-meta">
 <time datetime="<?php echo JHtml::_('date', $item->created, 'c'); ?>" itemprop="dateCreated">				
<?php echo JHtml::_('date', $item->created, JText::_('DATE_FORMAT_LC3')); ?>
</time>
<meta itemprop="interactionCount" content="UserPageVisits:<?php echo $item->hits; ?>" />
<span uk-icon="icon: eye; ratio: 0.9"></span> <?php echo $item->hits; ?></span>
            <a class="uk-h6 uk-margin-remove uk-text-break" href="<?php echo $item->link; ?>" itemprop="url">
                <span itemprop="name"><?php echo $item->title; ?></span>
            </a>
        </li>
    <?php } ?>
</ul>

	
</section>
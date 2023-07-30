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

$jsIcons = Factory::getContainer()
    ->get(Joomla\CMS\Application\SiteApplication::class)
    ->getTemplate(true)
    ->params
    ->get('jsIcons', 'none') != 'none';

?>
<dd class="uk-flex uk-flex-middle hits">
    <?php
 
        echo '<span uk-icon="icon: eye; ratio: 0.9"></span>&nbsp;';
 
    ?>
    <span><?php echo Text::sprintf('COM_CONTENT_ARTICLE_HITS', $displayData['item']->hits); ?></span>
    <meta itemprop="interactionCount" content="UserPageVisits:<?php echo $displayData['item']->hits; ?>">
</dd>

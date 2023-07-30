<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   (C) 2009 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;

$modId = 'mod-custom' . $module->id;

if ($params->get('backgroundimage')) {
    /** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
    $wa = Factory::getApplication()->getDocument()->getWebAssetManager();
    $wa->addInlineStyle('
#' . $modId . '{background-image: url("' . Uri::root(true) . '/' . HTMLHelper::_('cleanImageURL', $params->get('backgroundimage'))->url . '");}
', ['name' => $modId]);
}

?>

<h3 class="uk-heading-line uk-h5 uk-flex uk-flex-center"><span><a class="uk-button uk-button uk-button-primary uk-border-rounded" href="/popular-news">Самое читаемое</a></span></h3>

<ul class="uk-subnav uk-subnav-pill uk-flex-center" uk-switcher="connect: #switcher-id">
    <li><a class="uk-border-rounded" href="#">Bestселлеры</a></li>
    <li><a class="uk-border-rounded" href="#">Месяц</a></li>
    <li><a class="uk-border-rounded" href="#">Сутки</a></li>
 
</ul>
<div class="uk-margin uk-child-width-expand  " uk-grid>
    <div>
        <ul id="switcher-id" class="uk-switcher uk-margin">
            <li>
								<?php
$document   = JFactory::getDocument();
$renderer   = $document->loadRenderer('modules');
        $options    = array('style' => 'xhtml');
        $position   = 'bestseller';
        echo $renderer->render($position, $options, null);
        ?>
			</li>
            <li>
								<?php
$document   = JFactory::getDocument();
$renderer   = $document->loadRenderer('modules');
        $options    = array('style' => 'xhtml');
        $position   = 'mes';
        echo $renderer->render($position, $options, null);
        ?>
			</li>
            <li>
								<?php
$document   = JFactory::getDocument();
$renderer   = $document->loadRenderer('modules');
        $options    = array('style' => 'xhtml');
        $position   = 'sutki';
        echo $renderer->render($position, $options, null);
        ?>
			</li>
            
        </ul>
    </div>
</div>

<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.master3lite
 * @copyright   Copyright (C) Aleksey A. Morozov. All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */



defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Filesystem\Path;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;
/* === Menu options === */

// menu toggle breakpoint
$omb = $_this->params->get('omb', '@m');

// check offcanvas
$isOffcanvas = $_this->countModules('offcanvas') > 0;

// ckeck menu in 'navbar-left' position
$isNavbarMenu = false;
foreach (ModuleHelper::getModules('navbar-left') as $module) {
    if ($module->module === 'mod_menu') {
        $isNavbarMenu = true;
        break;
    }
}
$isNavbarMenuLeft = $isNavbarMenu && $isOffcanvas;

// ckeck menu in 'navbar-center' position
if (!$isNavbarMenu) {
    foreach (ModuleHelper::getModules('navbar-center') as $module) {
        if ($module->module === 'mod_menu') {
            $isNavbarMenu = true;
            break;
        }
    }
    $isNavbarMenuCenter = $isNavbarMenu && $isOffcanvas;
} else {
    $isNavbarMenuCenter = false;
}

// ckeck menu in 'navbar-right' position
if (!$isNavbarMenu) {
    foreach (ModuleHelper::getModules('navbar-right') as $module) {
        if ($module->module === 'mod_menu') {
            $isNavbarMenu = true;
            break;
        }
    }
    $isNavbarMenuRight = $isNavbarMenu && $isOffcanvas;
} else {
    $isNavbarMenuRight = false;
}

?>

<?php { ?>
<div role="navigation" id="navbar" class="uk-padding  uk-background-primary uk-preserve-color"  itemscope itemtype="http://www.schema.org/SiteNavigationElement" uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent uk-light; top: 200; bottom: #component-options">
        <nav class="uk-navbar-container">
            <div class="uk-container uk-container-expand">
                <div data-uk-navbar="align: center">
            <?php
            if ($_this->countModules('navbar-left')) {
                if ($isNavbarMenuLeft) {
            ?>
            <div class="uk-navbar-left uk-hidden<?php echo $omb; ?>">
                <a href="#offcanvas" class="uk-navbar-toggle" data-uk-navbar-toggle-icon data-uk-toggle aria-label="Menu"></a>
            </div>
            <?php } ?>
            <div class="uk-navbar-left<?php echo ($isNavbarMenuLeft ? ' uk-visible' . $omb : ''); ?>">
                <jdoc:include type="modules" name="navbar-left" style="master3lite" />
            </div>
            <?php } ?>

            <?php
            if ($_this->countModules('navbar-center')) {
                if ($isNavbarMenuCenter) {
            ?>
            <div class="uk-navbar-center uk-hidden<?php echo $omb; ?>">
                <a href="#offcanvas" class="uk-navbar-toggle uk-light" data-uk-navbar-toggle-icon data-uk-toggle aria-label="Menu"></a>
            </div>
            <?php } ?>
            <div class="uk-navbar-center<?php echo ($isNavbarMenuCenter ? ' uk-visible' . $omb : ''); ?>">
                <jdoc:include type="modules" name="navbar-center" style="master3lite" />
            </div>
            <?php } ?>

            <?php
            if ($_this->countModules('navbar-right')) {
                if ($isNavbarMenuRight) {
            ?>
            <div class="uk-navbar-right uk-hidden<?php echo $omb; ?>">
                <a href="#offcanvas" class="uk-navbar-toggle" data-uk-navbar-toggle-icon data-uk-toggle aria-label="Menu"></a>
            </div>
            <?php } ?>
            <div class="uk-navbar-right<?php echo ($isNavbarMenuRight ? ' uk-visible' . $omb : ''); ?>">
                <jdoc:include type="modules" name="navbar-right" style="master3lite" />
            </div>
            <?php } ?>

        </div>
    </div>
	</nav>
</div>
<?php } ?>

<?php if ($isOffcanvas) { ?>
<aside id="offcanvas" data-uk-offcanvas="mode:slide;overlay:true;">
    <div class="uk-offcanvas-bar uk-hidden-hover uk-background-primary">
        <a class="uk-offcanvas-close" data-uk-close aria-label="<?php echo Text::_('JLIB_HTML_BEHAVIOR_CLOSE'); ?>" name="<?php echo Text::_('JLIB_HTML_BEHAVIOR_CLOSE'); ?>"></a>
		<div class="uk-margin-top">
		<?php if ($_this->countModules('search')) : ?><jdoc:include type="modules" name="search" style="no" />
		<?php endif; ?>
        <jdoc:include type="modules" name="offcanvas" style="master3lite" />
		</div>
    </div>
</aside>
<?php } ?>

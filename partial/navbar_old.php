<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.master3lite
 * @copyright   Copyright (C) Aleksey A. Morozov. All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

defined('_JEXEC') or die;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Filesystem\Path;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
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
JLoader::register('JUImage',  JPATH_LIBRARIES . '/juimage/JUImage.php');

$juImg = new JUImage();
?>
<?php

$thumb = $juImg->render('templates/'.  $_this->template . '/images/logo.png', [
	'w'     	=> '100',
	'h'     	=> '100',
	'q'         => '95',
	'zc'        => 'C',
	'far'        => 'C',	
	'webp'      => true,
	'webp_q'    => '90',
	'webp_maxq' => '95',
	'error_image' => 'templates/'.  $_this->template . '/images/logo1.png',	
	'cache'     => 'img' 

	
]); 
?>
<?php if ($_this->countModules('navbar-left + navbar-center + navbar-right + lang')) { ?>
<div role="navigation" id="navbar" class="uk-section uk-padding-remove-vertical uk-navbar-container"  itemscope itemtype="http://www.schema.org/SiteNavigationElement" uk-sticky>
    <div class="uk-container uk-light">
        <div data-uk-navbar>

            <?php
            if ($_this->countModules('navbar-left')) {
                if ($isNavbarMenuLeft) {
            ?>
            <div class="nav-overlay uk-navbar-left uk-hidden<?php echo $omb; ?>">
                <a href="#offcanvas" class="uk-navbar-toggle" data-uk-navbar-toggle-icon data-uk-toggle aria-label="Menu" name="Menu"></a>
            </div>
	
            <?php } ?>			
            <div class="nav-overlay uk-navbar-left<?php echo ($isNavbarMenuLeft ? ' uk-visible' . $omb : ''); ?>">

            <?php if (JURI::current()!= JURI::base()) { echo '<a class="uk-link-heading" href="'.JURI::base(true).'" itemprop="url">'; } ?>
            <div class="uk-navbar-item uk-logo uk-text-large uk-text-bold"><img src="/templates/wmarka/images/polymer.svg" width="50" height="50" uk-svg>	
			</div>
            <?php if (JURI::current()!= JURI::base()) { echo '</a>'; } ?>			
                <jdoc:include type="modules" name="navbar-left" style="master3lite" />				
            </div>		
            <?php } ?>

            <?php
            if ($_this->countModules('navbar-center')) {
                if ($isNavbarMenuCenter) {
            ?>
            <div class="uk-navbar-center uk-hidden<?php echo $omb; ?>">
                <a href="#offcanvas" class="uk-navbar-toggle" data-uk-navbar-toggle-icon data-uk-toggle aria-label="Menu" name="Menu"></a>
            </div>
            <?php } ?>
            <div class="nav-overlay uk-navbar-center<?php echo ($isNavbarMenuCenter ? ' uk-visible' . $omb : ''); ?>">
                <jdoc:include type="modules" name="navbar-center" style="master3lite" />
            </div>
            <?php } ?>
            <div class="uk-navbar-center uk-hidden@m">
            <?php if (JURI::current()!= JURI::base()) { echo '<a class="uk-link-heading" href="'.JURI::base(true).'" itemprop="url">'; } ?>
            <div class="uk-navbar-item uk-logo uk-text-large uk-text-bold"><img src="/templates/wmarka/images/polymer.svg" width="50" height="50" uk-svg>	
			</div>
            <?php if (JURI::current()!= JURI::base()) { echo '</a>'; } ?>
            </div>
            <div class="nav-overlay uk-navbar-right uk-visible@m">
                <span class="uk-search uk-search-large uk-width-expand"><a class="uk-navbar-toggle"  uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#"><span uk-search-icon></span></a></span>
            </div>			
            <div class="nav-overlay uk-navbar-left uk-flex-1" hidden>
                <div class="uk-navbar-item uk-width-expand">
                    <form id="mod-search-96" action="<?php echo Route::_('index.php'); ?>" method="post" class="uk-search uk-search-navbar uk-width-1-1">
                        <?php
                        $output = '<input name="searchword" id="mod-search-searchword-96" class="uk-search-input uk-form-width-large search-query input-large" type="search"  placeholder="Поиск..." autofocus>';
                        $btn_output = '';
                		$btn_output = '<a href="#" data-uk-search-icon></a>';
                        echo $btn_output . $output;
                        ?>
                        <input type="hidden" name="task" value="search">
                        <input type="hidden" name="option" value="com_search">
                        <input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>">
                    </form>
                </div>
                <a class="uk-navbar-toggle" uk-close uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#"></a>
            </div>	
            <?php
            if ($_this->countModules('navbar-right')) {
                if ($isNavbarMenuRight) {
            ?>
			<div class="nav-overlay uk-navbar-right uk-hidden<?php echo $omb; ?>">
                <a href="#offcanvas" class="uk-navbar-toggle" data-uk-navbar-toggle-icon data-uk-toggle aria-label="Menu" name="Menu"></a>
            </div>
            <?php } ?>
            <div class="uk-navbar-right uk-visible@m">
                <jdoc:include type="modules" name="navbar-right" style="master3lite" />
            </div>		

            <?php } ?>
            <div class="nav-overlay uk-navbar-right uk-margin-right">
                <jdoc:include type="modules" name="lang" style="master3lite" />
            </div>
        </div>
    </div>
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

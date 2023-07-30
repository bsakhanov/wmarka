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
$isOffcanvas2 = $_this->countModules('offcanvas2') > 0;

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
    $isNavbarMenuRight = $isNavbarMenu && $isOffcanvas2;
} else {
    $isNavbarMenuRight = false;
}

?>

<?php { ?>
<div role="navigation" id="navbar" class="uk-padding-remove uk-background-secondary  uk-sticky"  itemscope itemtype="http://www.schema.org/SiteNavigationElement" uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent; top: 200; bottom: #component-options">
        <nav class="uk-navbar-container">
            <div class="uk-container uk-container-expand">
                <div data-uk-navbar="align: center">
            <?php
            if ($_this->countModules('navbar-left')) {
                if ($isNavbarMenuLeft) {
            ?>
            <div class="nav-overlay uk-navbar-left uk-light uk-hidden@m">
			<ul class="uk-navbar-nav">
				<li class="item-101 poisk"><?php if (JURI::current()!= JURI::base()) { echo '<a  href="'.JURI::base(true).'" itemprop="url">'; } ?>
          <span uk-icon="icon: home; ratio: 2"></span>
            <?php if (JURI::current()!= JURI::base()) { echo '</a>'; } ?>	</li>
			</ul> 
                <a href="#offcanvas" class="uk-navbar-toggle poisk"   data-uk-toggle aria-label="Menu" uk-icon="icon: menu; ratio: 2"></a>
				     <div class="uk-flex uk-flex-center uk-flex-middle ">			
			<div class="uk-margin-small-right ">
			<a href="#modal-login" uk-tooltip="<?php echo Text::_('JLOGIN'); ?>" class=" uk-margin-small-right " uk-icon="icon: sign-in; ratio: 2" uk-toggle> </a>
			</div>
			<div id="modal-login"  uk-modal>
			    <div class="uk-modal-dialog uk-width-medium">
			        <button class="uk-modal-close-outside" type="button" uk-close></button>
			        <div class="uk-modal-body" uk-overflow-auto>
             
            <jdoc:include type="modules" name="login" style="master3lite" />
            
			            </div>
			    </div>
			</div>
			<div class="uk-margin-small-right">
			<a class="uk-button uk-button uk-button-text uk-text-bold uk-border-rounded" href="/prislat-novost"><span uk-icon="icon: mail; ratio: 2"></span></a>
			</div>
			</div>	
            </div>
            <?php } ?>
            <div class="uk-navbar-left uk-light uk-visible@m">
			<ul class="uk-navbar-nav">
	<li class="item-101"><?php if (JURI::current()!= JURI::base()) { echo '<a href="'.JURI::base(true).'" itemprop="url">'; } ?>
           Главная
            <?php if (JURI::current()!= JURI::base()) { echo '</a>'; } ?>	</li>
</ul>
                <jdoc:include type="modules" name="navbar-left" style="master3lite" />
            </div>
            <?php } ?>

            <?php
            if ($_this->countModules('navbar-center')) {
                if ($isNavbarMenuCenter) {
            ?>
            <div class="nav-overlay uk-navbar-center uk-hidden@m">
              <a href="#offcanvas" class="uk-navbar-toggle  " data-uk-navbar-toggle-icon data-uk-toggle aria-label="Menu"></a>
            </div>
            <?php } ?>
            <div class="uk-navbar-center uk-light uk-visible@m  ">
                <jdoc:include type="modules" name="navbar-center" style="master3lite" />
            </div> 
            <?php } ?>

            <?php
            if ($_this->countModules('navbar-right')) {
                if ($isNavbarMenuRight) {
            ?>
            <div class="uk-navbar-right uk-hidden@m">
                <a href="#offcanvas" class="uk-navbar-toggle" data-uk-navbar-toggle-icon data-uk-toggle aria-label="Menu"></a>
                     
            </div>
            <?php } ?>
            <div class="uk-navbar-right uk-visible@m">
                <jdoc:include type="modules" name="navbar-right" style="master3lite" />
            </div>

            <?php } ?>
            <div class="uk-navbar-right uk-inline uk-visible@m">
                <script async src="https://cse.google.com/cse.js?cx=a2500abf19f364549">
</script>
             
                <div class="gcse-search" data-enableHistory="false" ></div> 
            
            		<div class="uk-position-small uk-position-center block-search" uk-icon="icon: search; ratio: 1">  </div>
                                                                                                                           
                                                                                                                         
	
			</div>
    <div class="nav-overlay uk-navbar-right uk-hidden@m uk-light">
        <a class="uk-navbar-toggle uk-text-bold poisk " uk-search-icon uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#"> Поиск </a>
    </div>
    <div class="nav-overlay uk-navbar-left uk-flex-1 " hidden>
        <div class="uk-navbar-item uk-width-expand">
         
                <script async src="https://cse.google.com/cse.js?cx=a2500abf19f364549">
</script>
<div class="gcse-search" data-enableHistory="false" ></div>  
       
        </div>
         <a class="uk-navbar-toggle uk-text-bold poisk " uk-search-icon uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#"> Поиск </a>
    </div>			
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
		 
        <jdoc:include type="modules" name="offcanvas" style="master3lite" />    

		</div>
    </div>
</aside>
	
<?php } ?>
<div id="offcanvas-nav" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar uk-background-primary">	
		<jdoc:include type="modules" name="offcanvas2" style="master3lite" />
    </div>
</div>
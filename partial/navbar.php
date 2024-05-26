<?php
\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Filesystem\Path;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;
use Joomla\Module\Finder\Site\Helper\FinderHelper;

/*
 * navbar-left
 * navbar-center
 * navbar-right
 */

if (
    $_this->countModules('navbar-left')
    || $_this->countModules('navbar-center')
    || $_this->countModules('navbar-right')
    || $_this->countModules('lang')	
) {
    ?>
<div role="navigation" id="navbar" class="uk-section uk-padding-remove-vertical uk-margin-remove-vertical uk-navbar-container"  itemscope itemtype="http://www.schema.org/SiteNavigationElement" uk-sticky>	
    <div class="uk-container">
        <div data-uk-navbar>
            <?php if ($_this->countModules('navbar-left')) { ?>
            <div class="uk-navbar-left uk-hidden@m">
                <a href="#offcanvas-menu" class="uk-navbar-toggle"
                    data-uk-navbar-toggle-icon data-uk-toggle aria-label="Menu"></a>
            </div>
            <div class="uk-navbar-left uk-visible@m">
                <jdoc:include type="modules" name="navbar-left" style="master3" />
            </div>
            <?php } ?>

            <?php if ($_this->countModules('navbar-center')) { ?>
            <div class="uk-navbar-center uk-hidden@m">
                <a href="#offcanvas-menu" class="uk-navbar-toggle"
                    data-uk-navbar-toggle-icon data-uk-toggle aria-label="Menu"></a>
            </div>
            <div class="uk-navbar-center uk-visible@m">
                <jdoc:include type="modules" name="navbar-center" style="master3" />
            </div>
            <?php } ?>

            <?php if ($_this->countModules('navbar-right')) { ?>
            <div class="uk-navbar-right uk-hidden@m">
                <a href="#offcanvas-menu" class="uk-navbar-toggle"
                    data-uk-navbar-toggle-icon data-uk-toggle aria-label="Menu"></a>
            </div>
            <div class="uk-navbar-right uk-visible@m">
                <jdoc:include type="modules" name="navbar-right" style="master3" />
            </div>		
            <?php } ?>
			<?php if ($_this->countModules('lang')) { ?>
            <div class="uk-navbar-right uk-inline">
                <jdoc:include type="modules" name="lang" style="master3" />
			</div>	
            <?php } ?>	
			<div class="nav-overlay uk-navbar-right">
			        <a class="uk-navbar-toggle" href="#modal-full-search" uk-search-icon uk-toggle></a>
			</div>
			<div class="nav-overlay uk-navbar-left" hidden>
				<div class="uk-navbar-item uk-width-expand">
					<div id="modal-full-search" class="uk-modal-full uk-modal" uk-modal>
						<div class="uk-modal-dialog uk-flex uk-flex-center uk-flex-middle" uk-height-viewport>
							<button class="uk-modal-close-full" type="button" uk-close></button>
                    <form action="/search" method="get" role="search" class="uk-search uk-search-navbar uk-width-1-1">
                        <input type="text" name="q" class="uk-search-input  uk-text-center" value="" placeholder="Поиск..." autofocus>                 
                        
                    </form>
						</div>
					</div>
				</div>						
			</div>				
        </div>
    </div>
</div>
<?php } ?>
<?php
/*
 * offcanvas
 */
if ($_this->countModules('offcanvas')) { ?>
<aside id="offcanvas" data-uk-offcanvas="mode:slide;overlay:true">
    <div class="uk-offcanvas-bar">
        <a class="uk-offcanvas-close" data-uk-close aria-label="<?php echo Text::_('JLIB_HTML_BEHAVIOR_CLOSE'); ?>"></a>
        <jdoc:include type="modules" name="offcanvas" style="master3" />
    </div>
</aside>
<?php } ?>


<?php
/*
 * offcanvas-menu
 */
if ($_this->countModules('offcanvas-menu')) { ?>
<aside id="offcanvas-menu" data-uk-offcanvas="mode:slide;overlay:true">
    <div class="uk-offcanvas-bar">
        <a class="uk-offcanvas-close" data-uk-close aria-label="<?php echo Text::_('JLIB_HTML_BEHAVIOR_CLOSE'); ?>"></a>
        <jdoc:include type="modules" name="offcanvas-menu" style="master3" />
    </div>
</aside>
<?php } ?>
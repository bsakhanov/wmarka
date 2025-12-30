<?php
/**
 * Часть шаблона: Навигация (Navbar & Search)
 * SEO-фишки: отсутствие циклических ссылок, умный Sticky, семантика.
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Router\Route;

/** @var \Wmarka\Template\Helper $this */
$doc = $this->doc;

// Проверка главной страницы
$isHome = Uri::getInstance()->toString() === Uri::base();

// Проверка активных позиций
$navPositions = 'navbar-left | navbar-center | navbar-right | iconnav';

if ($doc->countModules($navPositions)) : ?>

<div class="uk-section-brand uk-preserve-color">
    <nav role="navigation" id="navbar" 
         class="uk-navbar-container uk-background-brand uk-menu" 
         itemscope itemtype="https://schema.org/SiteNavigationElement"
         uk-sticky="cls-active: uk-navbar-sticky; show-on-up: true; animation: uk-animation-slide-top">	
        
        <div class="uk-container">
            <div uk-navbar>
                
                <?php /* --- ЛЕВАЯ ЧАСТЬ --- */ ?>
                <div class="uk-navbar-left">
                    <?php /* SEO: Иконка "Домой" появляется только на внутренних страницах */ ?>
                    <?php if (!$isHome) : ?>
                        <a href="<?php echo Uri::base(); ?>" class="uk-navbar-item uk-logo" aria-label="Home">
                            <span uk-icon="home"></span>
                        </a>
                    <?php endif; ?>

                    <jdoc:include type="modules" name="navbar-left" style="wmarka" />
                </div>

                <?php /* --- ЦЕНТРАЛЬНАЯ ЧАСТЬ --- */ ?>
                <?php if ($doc->countModules('navbar-center')) : ?>
                    <div class="uk-navbar-center">
                        <jdoc:include type="modules" name="navbar-center" style="wmarka" />
                    </div>
                <?php endif; ?>

                <?php /* --- ПРАВАЯ ЧАСТЬ --- */ ?>
                <div class="uk-navbar-right">
                    <jdoc:include type="modules" name="navbar-right" style="wmarka" />
                    <jdoc:include type="modules" name="iconnav" style="wmarka" />

                    <?php /* Поиск и мобильное меню */ ?>
                    <a class="uk-navbar-toggle" href="#modal-full-search" uk-search-icon uk-toggle aria-label="Search"></a>
                    <a href="#offcanvas-menu" class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon uk-toggle aria-label="Menu"></a>
                </div>

            </div>
        </div>
    </nav>
</div>

<?php /* --- ПОЛНОЭКРАННЫЙ ПОИСК (Full Screen) --- */ ?>
<div id="modal-full-search" class="uk-modal-full" uk-modal>
    <div class="uk-modal-dialog uk-flex uk-flex-center uk-flex-middle" uk-height-viewport>
        <button class="uk-modal-close-full" type="button" uk-close></button>
        <div class="uk-modal-body uk-padding-large uk-width-1-2@m">
            
            <form class="uk-search uk-search-navbar uk-width-1-1" 
                  action="<?php echo Route::_('index.php?option=com_finder&view=search'); ?>" 
                  method="get" role="search">
                <input name="q" class="uk-search-input uk-text-center" type="search" 
                       placeholder="<?php echo Text::_('TPL_WMARKA_SEARCH_INPUT'); ?>" 
                       aria-label="Search" autofocus>
            </form>
            
            <p class="uk-text-meta uk-text-center uk-margin-small-top">
                <?php echo Text::_('TPL_WMARKA_SEARCH_HINT'); ?>
            </p>
        </div>
    </div>
</div>
<?php endif; ?>

<?php 
/* --- УНИВЕРСАЛЬНЫЙ OFFCANVAS --- */
foreach (['offcanvas', 'offcanvas-menu'] as $name) :
    if ($doc->countModules($name)) : ?>
    <aside id="<?php echo $name; ?>" uk-offcanvas="mode: slide; overlay: true">
        <div class="uk-offcanvas-bar">
            <button class="uk-offcanvas-close" type="button" uk-close></button>
            <div class="uk-margin-medium-top">
                <jdoc:include type="modules" name="<?php echo $name; ?>" style="wmarka" />
            </div>
        </div>
    </aside>
    <?php endif;
endforeach; ?>

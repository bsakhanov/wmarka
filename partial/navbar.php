<?php
/**
 * Часть шаблона: Навигация (Navbar & Search)
 * SEO-фишки: отсутствие циклических ссылок, умный Sticky, семантика.
 */
declare(strict_types=1);

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Router\Route;

/** @var \Wmarka\Template\Helper $this */
$doc = $this->doc;

$isHome = (Uri::current() === Uri::base());

// Данные для контактов в мобильном меню
$phoneDisplay = Text::_('TPL_WMARKA_SEO_TEL_DISPLAY');
$phoneClean   = Text::_('TPL_WMARKA_SEO_TEL');
$whatsapp     = Text::_('TPL_WMARKA_SEO_TEL_WHATSAPP');
$waMessage    = Text::_('TPL_WMARKA_SEO_TEL_WHATSAPP_MESSAGE');
$hasPhone     = ($phoneDisplay !== 'TPL_WMARKA_SEO_TEL_DISPLAY' && trim($phoneDisplay) !== '');
$hasWhatsapp  = ($whatsapp !== 'TPL_WMARKA_SEO_TEL_WHATSAPP' && trim($whatsapp) !== '');

if ($doc->countModules('navbar-left | navbar-center | navbar-right | iconnav')) : ?>

<div class="uk-section-brand uk-preserve-color">
    <nav role="navigation" id="navbar" 
         class="uk-navbar-container uk-background-brand uk-menu" 
         itemscope itemtype="https://schema.org/SiteNavigationElement"
         uk-sticky="cls-active: uk-navbar-sticky; show-on-up: true; animation: uk-animation-slide-top">	
        
        <div class="uk-container">
            <div uk-navbar>
                
                <?php /* --- ЛЕВАЯ ЧАСТЬ --- */ ?>
                <div class="uk-navbar-left">
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

                    <?php /* Поиск и профиль */ ?>
                    <a class="uk-navbar-toggle" href="#modal-full-search" uk-search-icon uk-toggle aria-label="Search"></a>
                    
                    <div class="uk-inline uk-visible@m">
                        <button class="uk-button uk-button-text" type="button">
                            <span uk-icon="icon: user"></span>
                        </button>
                        <div uk-dropdown="mode: click; pos: bottom-right; boundary: !.uk-navbar">
                            <jdoc:include type="modules" name="login" style="none" />
                        </div>
                    </div>     

                    <?php /* Бургер для мобильных */ ?>
                    <a href="#offcanvas-menu" class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon uk-toggle aria-label="Menu"></a>
                </div>

            </div>
        </div>
    </nav>
</div>

<?php /* --- ПОЛНОЭКРАННЫЙ ПОИСК --- */ ?>
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


<?php /* --- УНИВЕРСАЛЬНЫЙ OFFCANVAS С КОНТАКТАМИ --- */ ?>
<?php foreach (['offcanvas', 'offcanvas-menu'] as $name) : ?>
    <?php if ($doc->countModules($name)) : ?>
    <aside id="<?php echo $name; ?>" uk-offcanvas="mode: slide; overlay: true">
        <div class="uk-offcanvas-bar uk-flex uk-flex-column">
            
            <button class="uk-offcanvas-close" type="button" uk-close></button>
            
            <div class="uk-margin-medium-top uk-flex-auto">
                <jdoc:include type="modules" name="<?php echo $name; ?>" style="wmarka" />
            </div>

            <?php /* Контактный блок внизу мобильного меню */ ?>
            <?php if ($name === 'offcanvas-menu' && ($hasPhone || $hasWhatsapp)) : ?>
                <div class="uk-margin-top uk-padding-small uk-background-muted uk-border-rounded">
                    <?php if ($hasPhone) : ?>
                        <a href="tel:<?php echo htmlspecialchars((string) $phoneClean, ENT_QUOTES, 'UTF-8'); ?>" 
                           class="uk-link-reset uk-text-bold uk-flex uk-flex-middle uk-margin-small-bottom">
                            <span uk-icon="icon: receiver; ratio: 0.8" class="uk-margin-small-right"></span>
                            <?php echo htmlspecialchars((string) $phoneDisplay, ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    <?php endif; ?>

                    <?php if ($hasWhatsapp) : ?>
                        <a href="https://wa.me/<?php echo htmlspecialchars((string) $whatsapp, ENT_QUOTES, 'UTF-8'); ?>?text=<?php echo urlencode((string) $waMessage); ?>" 
                           class="uk-button uk-button-primary uk-button-small uk-width-1-1 uk-border-rounded" target="_blank">
                            <span uk-icon="whatsapp" class="uk-margin-small-right"></span>
                            <?php echo Text::_('TPL_WMARKA_SEO_WHATSAPP_LABEL'); ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>
    </aside>
    <?php endif; ?>
<?php endforeach; ?>
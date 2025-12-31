<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 * @version     WMARKA ULTRA (UIkit 3 Responsive Navbar + Schema.org)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

// Мы НЕ вызываем bootstrap.collapse, так как используем нативный UIkit Toggle
?>

<nav class="uk-navbar-container uk-navbar-transparent" 
     uk-navbar 
     role="navigation"
     aria-label="<?php echo htmlspecialchars($module->title, ENT_QUOTES, 'UTF-8'); ?>"
     itemscope itemtype="https://schema.org/SiteNavigationElement">
    
    <?php /* Кнопка-бургер для мобильных устройств */ ?>
    <a class="uk-navbar-toggle uk-hidden@m" 
       uk-navbar-toggle-icon 
       uk-toggle="target: #mobile-menu-<?php echo $module->id; ?>" 
       aria-label="<?php echo Text::_('MOD_MENU_TOGGLE'); ?>"></a>

    <?php /* Десктопная область меню (Layout default.php) */ ?>
    <div class="uk-navbar-left uk-visible@m">
        <?php require __DIR__ . '/default.php'; ?>
    </div>
</nav>

<?php /* Мобильное меню (Off-canvas) — с отдельной декларацией навигации */ ?>
<div id="mobile-menu-<?php echo $module->id; ?>" uk-offcanvas="overlay: true; flip: true">
    <div class="uk-offcanvas-bar" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
        
        <button class="uk-offcanvas-close" type="button" uk-close aria-label="Close"></button>
        
        <div class="uk-margin-large-top">
             <?php /* Важно: здесь загружается тот же default.php. 
                Поскольку внутри него мы уже прописали itemprop="url" и itemprop="name", 
                мобильное меню также станет валидным для SEO.
             */ ?>
             <?php require __DIR__ . '/default.php'; ?>
        </div>
        
    </div>
</div>

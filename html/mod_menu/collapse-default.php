<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 * @version     WMARKA ULTRA (UIkit 3 Mobile Navbar)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

// Мы НЕ вызываем bootstrap.collapse, так как используем UIkit
?>

<nav class="uk-navbar-container uk-navbar-transparent" uk-navbar aria-label="<?php echo htmlspecialchars($module->title, ENT_QUOTES, 'UTF-8'); ?>">
    
    <?php /* Кнопка открытия мобильного меню (например, Off-canvas) */ ?>
    <a class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon uk-toggle="target: #mobile-menu" aria-label="<?php echo Text::_('MOD_MENU_TOGGLE'); ?>"></a>

    <?php /* Основное меню для десктопов */ ?>
    <div class="uk-navbar-left uk-visible@m">
        <?php require __DIR__ . '/default.php'; ?>
    </div>
</nav>

<?php /* Контейнер мобильного меню (Off-canvas) - должен быть в конце index.php или здесь */ ?>
<div id="mobile-menu" uk-offcanvas="overlay: true; flip: true">
    <div class="uk-offcanvas-bar">
        <button class="uk-offcanvas-close" type="button" uk-close></button>
        <div class="uk-margin-large-top">
             <?php /* Здесь можно вывести то же меню, но со стилем uk-nav */ ?>
             <?php require __DIR__ . '/default.php'; ?>
        </div>
    </div>
</div>

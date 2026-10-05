<?php
/**
 * WMARKA — «Сворачиваемое меню»: бургер + собственная панель uk-offcanvas
 * с этим меню (для мобильного меню в любой позиции).
 *
 * @var object $module
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

$wmMode = 'offcanvas';
$wmId   = 'wm-menu-' . (int) $module->id;
?>
<a class="uk-navbar-toggle" href="#<?php echo $wmId; ?>" uk-toggle aria-label="<?php echo htmlspecialchars(Text::_('TPL_WMARKA_MENU'), ENT_QUOTES, 'UTF-8'); ?>"><span uk-navbar-toggle-icon></span></a>
<div id="<?php echo $wmId; ?>" uk-offcanvas="overlay: true; flip: true">
    <div class="uk-offcanvas-bar">
        <button class="uk-offcanvas-close" type="button" uk-close></button>
        <?php require __DIR__ . '/default.php'; ?>
    </div>
</div>

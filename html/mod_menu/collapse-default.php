<?php
defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
?>
<nav class="uk-navbar-container uk-navbar-transparent" uk-navbar role="navigation">
    <a class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon uk-toggle="target: #mobile-menu-<?php echo $module->id; ?>"></a>

    <div class="uk-navbar-left uk-visible@m">
        <?php require __DIR__ . '/default.php'; ?>
    </div>
</nav>

<div id="mobile-menu-<?php echo $module->id; ?>" uk-offcanvas="overlay: true; flip: true">
    <div class="uk-offcanvas-bar">
        <button class="uk-offcanvas-close" type="button\" uk-close></button>
        <div class="uk-margin-large-top">
             <?php require __DIR__ . '/default.php'; ?>
        </div>
    </div>
</div>
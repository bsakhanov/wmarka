<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 * @version     1.0.0 WMARKA Partner
 * @description Элегантное Offcanvas меню на Uikit 3 для Joomla 6
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;

// Уникальный ID для связи кнопки и панели
$menuId = 'offcanvas-menu-' . $module->id;
?>

<button class="uk-button uk-button-default uk-margin-small-right uk-hidden@m" 
        type="button" 
        uk-toggle="target: #<?php echo $menuId; ?>" 
        aria-label="<?php echo Joomla\CMS\Language\Text::_('TPL_WMARKA_MENU_OPEN'); ?>">
    <span uk-icon="icon: menu"></span>
    <span class="uk-margin-small-left uk-visible@s"><?php echo $module->title; ?></span>
</button>

<div id="<?php echo $menuId; ?>" uk-offcanvas="overlay: true; flip: true; mode: push">
    <div class="uk-offcanvas-bar uk-flex uk-flex-column">

        <button class="uk-offcanvas-close" type="button" uk-close></button>

        <div class="uk-nav-header uk-margin-medium-bottom">
            <span class="uk-text-large uk-text-uppercase uk-text-bold">Навигация</span>
        </div>

        <div class="uk-margin-auto-vertical">
            <?php 
            // Подключаем логику вывода пунктов, передавая параметры
            require __DIR__ . '/offcanvas_default.php'; 
            ?>
        </div>

        <div class="uk-margin-auto-top">
            <hr class="uk-divider-small">
            <div class="uk-grid-small uk-child-width-auto" uk-grid>
                <div>
                    <a href="#" class="uk-icon-button" uk-icon="whatsapp"></a>
                </div>
                <div>
                    <a href="#" class="uk-icon-button" uk-icon="receiver"></a>
                </div>
            </div>
        </div>

    </div>
</div>
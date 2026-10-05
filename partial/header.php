<?php
/**
 * WMARKA — шапка: навбар UIkit (логотип, меню, поиск, вход, кнопка действия,
 * бургер). Вариант «stacked» ставит строку логотипа над навбаром.
 *
 * Позиции: logo (вместо логотипа из настроек), headbar (справа от логотипа
 * в варианте stacked), navbar-left / navbar-center / navbar-right, iconnav,
 * login (выпадающее окно входа), head-banner.
 *
 * @var \Wmarka\Template\Helper $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Wmarka\Template\Config;
use Wmarka\Template\Ui;

$bp       = Config::bp();
$layout   = Config::str('header_layout', 'navbar');
$style    = Config::str('navbar_style', 'default');
$sticky   = Config::bool('navbar_sticky', true);
$dropbar  = Config::bool('navbar_dropbar', false);
$bgClass  = match ($style) {
    'primary'     => 'uk-background-primary uk-light',
    'secondary'   => 'uk-background-secondary uk-light',
    'white'       => 'uk-background-default',
    'transparent' => '',
    default       => '',
};
$navClass = 'uk-navbar-container' . ($style !== 'default' ? ' uk-navbar-transparent' : '');
$logo     = $this->count('logo') ? '<div class="uk-navbar-item">' . $this->modules('logo', 'none') . '</div>' : $this->logo('navbar');
$cta      = Config::str('cta_text');
$ctaLink  = Config::str('cta_link');
$burger   = $this->hasOffcanvas();
$navbarOpts = 'align: ' . (Config::str('dropdown_align', 'left') === 'center' ? 'center' : 'left')
    . ($dropbar ? '; dropbar: true; dropbar-anchor: !.uk-navbar-container' : '');
?>
<header id="header">
    <?php if ($this->count('head-banner')) : ?>
        <div class="uk-visible@<?php echo $bp; ?>"><?php echo $this->modules('head-banner', 'none'); ?></div>
    <?php endif; ?>

    <?php if ($layout === 'stacked') : ?>
        <div class="uk-section uk-section-default uk-section-xsmall">
            <div class="<?php echo Config::container(); ?>">
                <div class="uk-flex uk-flex-middle uk-flex-between">
                    <?php echo $this->count('logo') ? $this->modules('logo', 'none') : $this->logo('stacked'); ?>
                    <?php if ($this->count('headbar')) : ?>
                        <div class="uk-visible@<?php echo $bp; ?>"><?php echo $this->modules('headbar', 'none'); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="<?php echo $bgClass; ?>"<?php if ($sticky) : ?> uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; show-on-up: <?php echo Config::bool('navbar_show_on_up', false) ? 'true' : 'false'; ?>"<?php endif; ?>>
        <nav class="<?php echo $navClass; ?>" aria-label="<?php echo Ui::esc(Text::_('TPL_WMARKA_MAIN_NAVIGATION')); ?>">
            <div class="<?php echo Config::container(); ?>">
                <div uk-navbar="<?php echo $navbarOpts; ?>">

                    <div class="uk-navbar-left">
                        <?php if ($layout !== 'stacked') : ?>
                            <?php echo $logo; ?>
                        <?php endif; ?>
                        <?php echo $this->modules('navbar-left', 'navbar'); ?>
                    </div>

                    <?php if ($this->count('navbar-center')) : ?>
                        <div class="uk-navbar-center">
                            <?php echo $this->modules('navbar-center', 'navbar'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="uk-navbar-right">
                        <?php echo $this->modules('navbar-right', 'navbar'); ?>
                        <?php echo $this->modules('iconnav', 'navbar'); ?>

                        <?php if (Config::bool('search_show', true)) : ?>
                            <a class="uk-navbar-toggle" href="#wm-search" uk-search-icon uk-toggle aria-label="<?php echo Ui::esc(Text::_('TPL_WMARKA_SEARCH')); ?>"></a>
                        <?php endif; ?>

                        <?php if ($this->count('login')) : ?>
                            <a class="uk-navbar-toggle uk-visible@<?php echo $bp; ?>" href="#" uk-icon="user" aria-label="<?php echo Ui::esc(Text::_('TPL_WMARKA_ACCOUNT')); ?>"></a>
                            <div class="uk-navbar-dropdown uk-width-medium" uk-drop="mode: click; pos: bottom-right; offset: 0">
                                <?php echo $this->modules('login', 'none'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($cta !== '' && $ctaLink !== '') : ?>
                            <div class="uk-navbar-item uk-visible@<?php echo $bp; ?>">
                                <a class="uk-button uk-button-primary uk-button-small" href="<?php echo Ui::esc($ctaLink); ?>"<?php echo str_starts_with($ctaLink, '#') ? ' uk-toggle' : ''; ?>><?php echo Ui::esc($cta); ?></a>
                            </div>
                        <?php endif; ?>

                        <?php if ($burger) : ?>
                            <a class="uk-navbar-toggle uk-hidden@<?php echo $bp; ?>" href="#wm-offcanvas" uk-toggle aria-label="<?php echo Ui::esc(Text::_('TPL_WMARKA_MENU')); ?>"><span uk-navbar-toggle-icon></span></a>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </nav>
    </div>
</header>

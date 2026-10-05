<?php
/**
 * WMARKA — основной контент: компонент, сайдбары, main-top / main-bottom.
 *
 * Токены «CSS-класса страницы» пункта меню:
 *   wm-blank — компонент подавляется (страница из модулей), сообщения живут;
 *   wm-wide  — компонент во всю ширину без секции, контейнера и сайдбаров.
 * На главной компонент выводится по настройке «Компонент на главной».
 *
 * @var \Wmarka\Template\Helper $this
 */

\defined('_JEXEC') or die;

use Wmarka\Template\Config;

$suppress = $this->hasToken('wm-blank') || ($this->isHome() && !Config::bool('home_component', true));

// Компонент ничего не вывел (com_blank без полей) и колонок нет — пустую секцию не рисуем
if (!$suppress && !$this->count('main-top') && !$this->count('main-bottom') && !$this->count('sidebar-a') && !$this->count('sidebar-b')) {
    $suppress = trim(strip_tags((string) $this->doc->getBuffer('component'), '<img><iframe><video><svg><form><canvas>')) === '';
}

if ($suppress) : ?>
<main id="content">
    <div class="<?php echo Config::container(); ?>"><jdoc:include type="message" /></div>
</main>
<?php return; endif;

if ($this->hasToken('wm-wide')) : ?>
<main id="content">
    <div class="<?php echo Config::container(); ?>"><jdoc:include type="message" /></div>
    <jdoc:include type="component" />
</main>
<?php return; endif;

$a     = $this->count('sidebar-a');
$b     = $this->count('sidebar-b');
$width = Config::str('sidebar_width', '1-4');
$width = \in_array($width, ['1-5', '1-4', '1-3', '2-5'], true) ? $width : '1-4';
$bp    = Config::str('sidebar_bp', 'm');
$gap   = Config::str('sidebar_gutter', 'large') === 'medium' ? 'uk-grid-medium' : 'uk-grid-large';
$pad   = Config::str('main_padding', '');
?>
<div id="main" class="uk-section uk-section-default<?php echo $pad !== '' ? ' uk-section-' . $pad : ''; ?>">
    <div class="<?php echo Config::container(); ?>">
        <div class="<?php echo $gap; ?>" uk-grid>

            <div class="uk-width-expand@<?php echo $bp; ?>">
                <?php if ($this->count('main-top')) : ?>
                    <div class="uk-margin-medium-bottom uk-child-width-1-1" uk-grid><?php echo $this->modules('main-top'); ?></div>
                <?php endif; ?>

                <main id="content">
                    <jdoc:include type="message" />
                    <jdoc:include type="component" />
                </main>

                <?php if ($this->count('main-bottom')) : ?>
                    <div class="uk-margin-medium-top uk-child-width-1-1" uk-grid><?php echo $this->modules('main-bottom'); ?></div>
                <?php endif; ?>
            </div>

            <?php if ($a) : ?>
                <aside id="sidebar-a" class="uk-width-<?php echo $width; ?>@<?php echo $bp; ?> uk-flex-first@<?php echo $bp; ?>">
                    <div class="uk-child-width-1-1" uk-grid><?php echo $this->modules('sidebar-a'); ?></div>
                </aside>
            <?php endif; ?>

            <?php if ($b) : ?>
                <aside id="sidebar-b" class="uk-width-<?php echo $width; ?>@<?php echo $bp; ?>">
                    <div class="uk-child-width-1-1" uk-grid><?php echo $this->modules('sidebar-b'); ?></div>
                </aside>
            <?php endif; ?>

        </div>
    </div>
</div>

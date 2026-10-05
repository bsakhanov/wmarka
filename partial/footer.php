<?php
/**
 * WMARKA — подвал: колонки footer-left / footer-center / footer-right,
 * контакты из настроек, строка копирайта.
 *
 * @var \Wmarka\Template\Helper $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Wmarka\Template\Config;
use Wmarka\Template\Helper;
use Wmarka\Template\Ui;

$style    = Config::str('footer_style', 'secondary');
$light    = \in_array($style, ['secondary', 'primary'], true) ? ' uk-light' : '';
$columns  = array_values(array_filter(['footer-left', 'footer-center', 'footer-right'], fn ($p) => $this->count($p) > 0));
$contacts = Config::bool('footer_contacts', true) ? Helper::contacts() : [];
$cols     = \count($columns) + ($contacts ? 1 : 0);
$year     = (int) date('Y');
$start    = Config::int('copyright_year', 0);
$years    = ($start > 0 && $start < $year) ? $start . '–' . $year : (string) $year;
$owner    = Config::str('copyright_text') ?: Config::siteTitle();
?>
<footer id="footer" class="uk-section uk-section-<?php echo $style . $light; ?>">
    <div class="<?php echo Config::container(); ?>">

        <?php if ($cols) : ?>
            <div class="uk-grid-large <?php echo Ui::columns(min($cols, 4)); ?>" uk-grid>
                <?php foreach ($columns as $position) : ?>
                    <div><div class="uk-child-width-1-1" uk-grid><?php echo $this->modules($position); ?></div></div>
                <?php endforeach; ?>

                <?php if ($contacts) : ?>
                    <div>
                        <h3 class="uk-h5"><?php echo Text::_('TPL_WMARKA_CONTACTS'); ?></h3>
                        <ul class="uk-list">
                            <?php foreach ($contacts as $key => $c) : ?>
                                <li class="uk-flex uk-flex-top">
                                    <?php echo Ui::icon(Helper::contactIcon($key), 0.9, 'uk-margin-small-right'); ?>
                                    <?php if ($c['href'] !== '') : ?>
                                        <a class="uk-link-text" href="<?php echo Ui::esc($c['href']); ?>"<?php echo str_starts_with($c['href'], 'http') ? ' target="_blank" rel="noopener"' : ''; ?>><?php echo Ui::esc($c['label']); ?></a>
                                    <?php else : ?>
                                        <span><?php echo Ui::esc($c['label']); ?></span>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <hr class="uk-margin-medium">
        <?php endif; ?>

        <div class="uk-flex uk-flex-middle uk-flex-between uk-flex-wrap uk-text-small">
            <p class="uk-margin-remove">© <?php echo $years; ?> <?php echo Ui::esc($owner); ?>. <?php echo Text::_('TPL_WMARKA_ALL_RIGHTS_RESERVED'); ?></p>
            <?php if ($this->count('footer')) : ?>
                <div><?php echo $this->modules('footer', 'none'); ?></div>
            <?php endif; ?>
        </div>

    </div>
</footer>

<?php
/**
 * WMARKA — общий вывод списков модулей.
 *
 * style: list   — список заголовков с датой (uk-list-divider);
 *        media  — миниатюра слева + заголовок (та же интро-миниатюра, ужатая);
 *        cards  — сетка карточек (wmarka.card, размер small);
 *        slider — карусель карточек uk-slider.
 *
 * @var array $displayData ['items' => карточки Card::*, 'style', 'columns', 'gutter', 'heading', 'id']
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Wmarka\Template\Card;
use Wmarka\Template\Image;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$items = $displayData['items'] ?? [];

if (!$items) {
    return;
}

$style   = $displayData['style'] ?? 'list';
$columns = (int) ($displayData['columns'] ?? 3);
$gutter  = Ui::gutter((string) ($displayData['gutter'] ?? 'medium'));
$htag    = Ui::htag($displayData['heading'] ?? 'h4');

if ($style === 'cards' || $style === 'slider') :
    $grid = $style === 'slider'
        ? 'uk-slider-items uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-' . max(1, min(6, $columns)) . '@m ' . $gutter
        : $gutter . ' ' . Ui::columns($columns) . ' uk-grid-match'; ?>
    <?php if ($style === 'slider') : ?><div uk-slider="finite: true"><div class="uk-position-relative"><div class="uk-slider-container"><?php endif; ?>
    <div class="<?php echo $grid; ?>" uk-grid>
        <?php foreach ($items as $card) : ?>
            <?php $compact = $columns > 3 || !empty($displayData['compact']); ?>
            <div><?php echo Card::render(($displayData['bare'] ?? false ? ['style' => 'blank', 'hover' => false] : []) + $card + ['size' => $compact ? 'small' : 'default', 'heading' => $htag, 'titleClass' => $compact ? 'uk-h5 uk-text-bold' : 'uk-h4', 'sizes' => Image::sizes($columns, false)]); ?></div>
        <?php endforeach; ?>
    </div>
    <?php if ($style === 'slider') : ?></div>
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous" aria-label="<?php echo Ui::esc(Text::_('JPREV')); ?>"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next" aria-label="<?php echo Ui::esc(Text::_('JNEXT')); ?>"></a>
        </div><ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul></div>
    <?php endif; ?>
<?php elseif ($style === 'feed') : ?>
    <?php $kindIcon = static fn (string $k): string => $k === 'video' ? ' <span class="uk-text-primary" uk-icon="icon: play-circle; ratio: 0.8"></span>' : ($k === 'photo' ? ' <span class="uk-text-primary" uk-icon="icon: camera; ratio: 0.8"></span>' : ''); ?>
    <ul class="uk-list uk-list-divider">
        <?php foreach ($items as $card) : ?>
            <li>
                <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-auto"><span class="uk-text-meta uk-text-bold"><?php echo $card['time'] ?? ''; ?></span></div>
                    <div class="uk-width-expand">
                        <a class="uk-link-heading" href="<?php echo $card['link']; ?>"><?php echo Ui::title($card['title']); ?></a><?php echo $kindIcon($card['kind'] ?? ''); ?>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php elseif ($style === 'media') : ?>
    <ul class="uk-list uk-list-divider">
        <?php foreach ($items as $card) : ?>
            <li>
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <?php if (!empty($card['thumb'])) : ?>
                        <div class="uk-width-1-3 uk-width-1-4@m">
                            <a class="uk-display-block uk-inline-clip" href="<?php echo $card['link']; ?>" tabindex="-1" aria-hidden="true"><?php echo Image::img($card['thumb'], $card['thumb']['alt'] ?? '', ['class' => 'uk-width-1-1', 'sizes' => '(min-width: 960px) 120px, 33vw']); ?></a>
                        </div>
                    <?php endif; ?>
                    <div class="uk-width-expand">
                        <?php if (!empty($card['kicker'])) : ?><div class="uk-text-small"><?php echo $card['kicker']; ?></div><?php endif; ?>
                        <a class="uk-link-heading uk-text-bold" href="<?php echo $card['link']; ?>"><?php echo Ui::title($card['title']); ?></a>
                        <?php if (!empty($card['meta'])) : ?>
                            <div class="uk-text-meta uk-margin-xsmall-top"><?php echo implode(' · ', $card['meta']); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <ul class="uk-list uk-list-divider">
        <?php foreach ($items as $card) : ?>
            <li>
                <?php if (!empty($card['link'])) : ?>
                    <a class="uk-link-heading" href="<?php echo $card['link']; ?>"<?php echo !empty($card['active']) ? ' aria-current="page"' : ''; ?>><?php echo Ui::title($card['title']); ?></a>
                <?php else : ?>
                    <?php echo Ui::title($card['title']); ?>
                <?php endif; ?>
                <?php if (!empty($card['meta'])) : ?>
                    <div class="uk-text-meta"><?php echo implode(' · ', $card['meta']); ?></div>
                <?php endif; ?>
                <?php if (!empty($card['text'])) : ?>
                    <div class="uk-text-small uk-margin-xsmall-top"><?php echo $card['text']; ?></div>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif;

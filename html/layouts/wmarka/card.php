<?php
/**
 * WMARKA — карточка превью на компоненте Card из UIkit 3 (getuikit.com/docs/card).
 *
 * Разметка повторяет каноничные варианты документации:
 *  - media top    — .uk-card-media-top над .uk-card-body;
 *  - media bottom — .uk-card-media-bottom под телом карточки;
 *  - media left / right — карточка сама есть сетка (.uk-grid-collapse .uk-child-width-1-2@s,
 *    атрибут uk-grid), картинка в .uk-card-media-left|right + .uk-cover-container,
 *    <img uk-cover> и <canvas> с размерами превью, чтобы на телефоне блок сохранял пропорции;
 *  - без картинки — .uk-card с .uk-card-body.
 * Служебные метки (не опубликовано и т. п.) — .uk-card-badge .uk-label, «Подробнее» и метки —
 * в .uk-card-footer.
 *
 * Переключаемая карточка (сетка ↔ список) строится как горизонтальная, но в режиме «сетка»
 * её колонки сложены: .uk-child-width-1-1 + .uk-card-media-top. Переключатель меняет лишь
 * классы (js/wmarka.js), структура и uk-cover остаются прежними.
 *
 * Ключи $displayData (php/Card.php): title, link, imageLink, thumb, meta[], metaBelow, badges, text,
 * tags, readmore, edit, events[], heading, titleClass, view (grid|list), switch, media
 * (top|bottom|left|right), ratio (1-2|1-3), size (default|small), style (default|primary|
 * secondary|blank), hover, schema, sizes, attrs.
 *
 * @var array $displayData
 */

\defined('_JEXEC') or die;

use Wmarka\Template\Config;
use Wmarka\Template\Image;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$d      = $displayData;
$view   = ($d['view'] ?? 'grid') === 'list' ? 'list' : 'grid';
$switch = !empty($d['switch']);
$media  = \in_array($d['media'] ?? 'top', ['top', 'bottom', 'left', 'right'], true) ? ($d['media'] ?? 'top') : 'top';
$thumb  = $d['thumb'] ?? [];
$ratio  = ($d['ratio'] ?? Config::str('card_media_width', '1-2')) === '1-3' ? '1-3' : '1-2';
$style  = $d['style'] ?? 'default';
$card   = trim('uk-card' . ($style !== 'blank' ? ' uk-card-' . $style : '') . (($d['size'] ?? '') === 'small' ? ' uk-card-small' : '') . (!empty($d['hover']) ? ' uk-card-hover' : ''));
$htag   = Ui::htag($d['heading'] ?? 'h3');
$hclass = $d['titleClass'] ?? (($d['size'] ?? '') === 'small' ? 'uk-h4' : 'uk-card-title');
$schema = $d['schema'] ?? 'Article';
$events = $d['events'] ?? [];
$link   = (string) ($d['link'] ?? '');
$title  = Ui::title($d['title'] ?? '');
$alt    = $thumb['alt'] ?? strip_tags((string) ($d['title'] ?? ''));
$attrs  = ($schema ? ' itemscope itemtype="https://schema.org/' . $schema . '"' : '') . (!empty($d['attrs']) ? ' ' . $d['attrs'] : '');

// Режим вывода
$mode = !$thumb ? 'plain' : ($switch ? 'switch' : ((\in_array($media, ['left', 'right'], true) || $view === 'list') ? 'side' : $media));
$side = $media === 'right' ? 'right' : 'left';

// Горизонталь: доля картинки 1/2 (как в документации UIkit) или 1/3
$hCard  = $ratio === '1-2' ? 'uk-child-width-1-2@s' : '';
$hMedia = trim(($side === 'right' ? 'uk-flex-last@s uk-card-media-right' : 'uk-card-media-left') . ' uk-cover-container' . ($ratio === '1-3' ? ' uk-width-1-1 uk-width-1-3@s' : ''));
$hBody  = trim('uk-flex uk-flex-column' . ($ratio === '1-3' ? ' uk-width-1-1 uk-width-expand@s' : ''));
$hSizes = Image::sizes($ratio === '1-3' ? 0 : 2);
$vSizes = $d['sizes'] ?? Image::sizes(3);

// Тело карточки
$hasBody = trim(strip_tags($title . ($d['text'] ?? '') . implode('', $d['meta'] ?? []) . ($d['edit'] ?? '') . implode('', $events), '<img><iframe><svg>')) !== '';

// Видео- и фотоновости: значок поверх картинки (метки из настроек «Метка видеоновостей / фотоновостей»)
$kindBadge = match ($d['kind'] ?? '') {
    'video' => '<span class="uk-position-center uk-light" uk-icon="icon: play-circle; ratio: 3"></span><span class="uk-position-top-left uk-position-small uk-label">' . Ui::esc(\Joomla\CMS\Language\Text::_('TPL_WMARKA_VIDEO')) . '</span>',
    'photo' => '<span class="uk-position-top-left uk-position-small uk-label"><span uk-icon="icon: camera; ratio: 0.8"></span> ' . Ui::esc(\Joomla\CMS\Language\Text::_('TPL_WMARKA_PHOTO')) . '</span>',
    default => '',
};
$footer  = trim(($d['tags'] ?? '') . ($d['readmore'] ?? ''));

ob_start();
?>
<?php if ($hasBody) : ?>
    <div class="uk-card-body">
        <?php if (!empty($d['kicker'])) : ?>
            <p class="uk-text-small uk-margin-remove-top uk-margin-xsmall-bottom"><?php echo $d['kicker']; ?></p>
        <?php endif; ?>
        <?php if (($d['title'] ?? '') !== '') : ?>
            <<?php echo $htag; ?> class="<?php echo $hclass; ?> uk-margin-remove" itemprop="headline">
                <?php if ($link !== '') : ?><a class="uk-link-heading" href="<?php echo $link; ?>" itemprop="url"><?php echo $title; ?></a><?php else : ?><?php echo $title; ?><?php endif; ?>
            </<?php echo $htag; ?>>
        <?php endif; ?>
        <?php echo $events['afterTitle'] ?? ''; ?>
        <?php echo $d['edit'] ?? ''; ?>
        <?php echo $events['before'] ?? ''; ?>
        <?php if (!empty($d['text'])) : ?>
            <div class="uk-margin-small-top<?php echo ($d['size'] ?? '') === 'small' ? ' uk-text-small' : ''; ?>" itemprop="description"><?php echo $d['text']; ?></div>
        <?php endif; ?>
        <?php if (!empty($d['meta']) || !empty($d['hashtags'])) : ?>
            <p class="uk-article-meta uk-margin-small-top uk-margin-remove-bottom"><?php echo implode(' · ', $d['meta'] ?? []); ?><?php echo !empty($d['hashtags']) ? (!empty($d['meta']) ? ' · ' : '') . $d['hashtags'] : ''; ?></p>
        <?php endif; ?>
        <?php echo $events['after'] ?? ''; ?>
    </div>
<?php endif; ?>
<?php if ($footer !== '') : ?>
    <div class="uk-card-footer uk-margin-auto-top">
        <div class="uk-flex uk-flex-middle uk-flex-between uk-flex-wrap">
            <div><?php echo $d['tags'] ?? ''; ?></div>
            <div><?php echo $d['readmore'] ?? ''; ?></div>
        </div>
    </div>
<?php endif; ?>
<?php
$body  = (string) ob_get_clean();
$badge = !empty($d['badges']) ? '<div class="uk-card-badge">' . $d['badges'] . '</div>' : '';

// Ссылка поверх картинки (вся картинка кликабельна, в порядке табуляции не участвует)
$overlay = !empty($d['imageLink']) ? '<a class="uk-position-cover" href="' . $d['imageLink'] . '" tabindex="-1" aria-hidden="true"></a>' : '';
$canvas  = '<canvas width="' . (int) (($thumb['width'] ?? 0) ?: 600) . '" height="' . (int) (($thumb['height'] ?? 0) ?: 400) . '"></canvas>';

if ($mode === 'plain') : ?>
<article class="<?php echo $card; ?> uk-flex uk-flex-column"<?php echo $attrs; ?>>
    <?php echo $badge . $body; ?>
</article>
<?php elseif ($mode === 'top' || $mode === 'bottom') :
    $img      = Image::img($thumb, $alt, ['class' => 'uk-width-1-1 uk-transition-scale-up uk-transition-opaque', 'itemprop' => 'image', 'sizes' => $vSizes]);
    $mediaDiv = '<div class="uk-card-media-' . $mode . ' uk-inline-clip uk-transition-toggle uk-display-block">' . $img . $kindBadge . $overlay . '</div>'; ?>
<article class="<?php echo $card; ?> uk-flex uk-flex-column"<?php echo $attrs; ?>>
    <?php echo $badge; ?>
    <?php echo $mode === 'top' ? $mediaDiv . $body : $body . $mediaDiv; ?>
</article>
<?php elseif ($mode === 'side') :
    $img = Image::img($thumb, $alt, ['uk-cover' => true, 'itemprop' => 'image', 'sizes' => $hSizes]); ?>
<article class="<?php echo trim($card . ' uk-grid-collapse ' . $hCard); ?>" uk-grid<?php echo $attrs; ?>>
    <div class="<?php echo $hMedia; ?>"><?php echo $img . $canvas . $kindBadge . $overlay; ?></div>
    <div class="<?php echo $hBody; ?>"><?php echo $badge . $body; ?></div>
</article>
<?php else :
    // switch: одна структура, классы меняет переключатель «сетка / список»
    $sizes = $view === 'list' ? $hSizes : $vSizes;
    $img   = Image::img($thumb, $alt, ['uk-cover' => true, 'itemprop' => 'image', 'sizes' => $sizes, 'data-wm-sizes-grid' => $vSizes, 'data-wm-sizes-list' => $hSizes]);
    $gCard = 'uk-child-width-1-1 uk-flex-column';
    $gMed  = 'uk-card-media-top uk-cover-container';
    $gBody = 'uk-flex uk-flex-column uk-flex-1'; ?>
<article <?php echo Ui::switchAttr($view, $gCard, $hCard, $card . ' uk-grid-collapse'); ?> uk-grid<?php echo $attrs; ?>>
    <div <?php echo Ui::switchAttr($view, $gMed, $hMedia); ?>><?php echo $img . $canvas . $kindBadge . $overlay; ?></div>
    <div <?php echo Ui::switchAttr($view, $gBody, $hBody); ?>><?php echo $badge . $body; ?></div>
</article>
<?php endif;

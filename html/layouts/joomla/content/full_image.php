<?php
/**
 * WMARKA — изображение полной статьи.
 *
 * Источник: image_fulltext → image_intro (если разрешено в настройках) →
 * первая картинка текста → заглушка. Профиль full; на узких экранах
 * подставляется интро-миниатюра (тот же файл, что в карточках), если
 * у статьи одна и та же картинка — лишний мобильный размер не режется.
 * Подпись — figcaption под фото.
 *
 * @var object $displayData материал
 */

\defined('_JEXEC') or die;

use Wmarka\Template\Config;
use Wmarka\Template\Image;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$item = \is_array($displayData) ? ($displayData['item'] ?? null) : $displayData;

if (!\is_object($item) || !Config::bool('article_image', true)) {
    return;
}

$source = Image::source($item, 'full');
$full   = Image::thumb($source['src'], 'full', Config::bool('article_placeholder', false));

if (!$full) {
    return;
}

$intro    = Image::source($item, 'intro');
$mobile   = ($intro['src'] !== '' && $intro['src'] === $source['src']) ? Image::thumb($intro['src'], 'intro', false) : [];
$caption  = $source['caption'];

// Обтекание (ядро: «Обтекание изображения полного текста» материала или компонента)
$images = json_decode((string) ($item->images ?? ''), true) ?: [];
$float  = (string) (($images['float_fulltext'] ?? '') ?: (\is_object($item->params ?? null) ? $item->params->get('float_fulltext', '') : ''));
$align  = match ($float) {
    'left', 'float-start'  => ' uk-align-left@m uk-width-1-2@m uk-margin-remove-top',
    'right', 'float-end'   => ' uk-align-right@m uk-width-1-2@m uk-margin-remove-top',
    default                => '',
};
?>
<?php
// Одинаковые пропорции профилей → srcset «интро 720w, полное 1200w»: браузер сам берёт
// нужный файл по ширине экрана и плотности пикселей. Разные пропорции → <picture>
// с отдельным источником для телефона (художественная подмена кадра).
$sameRatio = $mobile && $mobile['height'] && $full['height'] && abs($mobile['width'] / $mobile['height'] - $full['width'] / $full['height']) <= 0.02;

if ($sameRatio && Config::bool('img_srcset', true) && $mobile['src'] !== $full['src'] && $mobile['width'] < $full['width']) {
    $full['srcset'] = $mobile['src'] . ' ' . $mobile['width'] . 'w, ' . $full['src'] . ' ' . $full['width'] . 'w';
}

$wide = $align === '' ? '(min-width: 1200px) 1200px, 100vw' : '(min-width: 960px) 50vw, 100vw';
?>
<figure class="uk-margin-medium-bottom<?php echo $align; ?>">
    <?php if (!empty($full['srcset']) || !$mobile || $mobile['src'] === $full['src']) : ?>
        <?php echo Image::img($full, $source['alt'], ['class' => 'uk-width-1-1', 'loading' => 'eager', 'fetchpriority' => 'high', 'sizes' => $wide]); ?>
    <?php else : ?>
        <picture>
            <source media="(max-width: 639px)" srcset="<?php echo Ui::esc($mobile['src']); ?>"<?php echo $mobile['width'] ? ' width="' . (int) $mobile['width'] . '" height="' . (int) $mobile['height'] . '"' : ''; ?>>
            <?php echo Image::img($full, $source['alt'], ['class' => 'uk-width-1-1', 'loading' => 'eager', 'fetchpriority' => 'high']); ?>
        </picture>
    <?php endif; ?>
    <?php if ($caption !== '') : ?>
        <figcaption class="uk-text-meta uk-margin-small-top"><?php echo Ui::esc($caption); ?></figcaption>
    <?php endif; ?>
</figure>

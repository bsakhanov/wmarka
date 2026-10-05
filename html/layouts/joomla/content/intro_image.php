<?php
/**
 * WMARKA — интро-изображение (блог, избранное, модули ядра, сторонние вызовы).
 *
 * Единый профиль intro из php/Image.php: тот же файл миниатюры используют
 * карточки блога, страницы меток, поиск и модули — лишних превью нет.
 * Источник: image_intro → image_fulltext → первая картинка текста → заглушка.
 *
 * @var object|array $displayData материал (или ['item' => материал, 'link' => URL])
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;
use Wmarka\Template\Image;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$item = \is_array($displayData) ? ($displayData['item'] ?? null) : $displayData;

if (!\is_object($item)) {
    return;
}

$thumb = Image::intro($item);

if (!$thumb) {
    return;
}

$link   = \is_array($displayData) ? ($displayData['link'] ?? '') : '';
$params = $item->params ?? null;

if ($link === '' && !empty($item->wmLink)) {
    $link = $item->wmLink;
} elseif ($link === '' && !empty($item->link) && \is_string($item->link)) {
    $link = $item->link;
} elseif ($link === '' && \is_object($params) && isset($item->slug, $item->catid) && $params->get('link_intro_image', $params->get('link_titles', 1)) && $params->get('access-view')) {
    $link = Route::_(RouteHelper::getArticleRoute($item->slug, $item->catid, $item->language));
}

$img = Image::img($thumb, $thumb['alt'], ['class' => 'uk-width-1-1 uk-transition-scale-up uk-transition-opaque', 'sizes' => Image::sizes(3)]);
?>
<div class="uk-inline-clip uk-transition-toggle uk-display-block uk-margin-bottom">
    <?php if ($link) : ?>
        <a href="<?php echo $link; ?>" tabindex="-1" aria-hidden="true"><?php echo $img; ?></a>
    <?php else : ?>
        <?php echo $img; ?>
    <?php endif; ?>
</div>

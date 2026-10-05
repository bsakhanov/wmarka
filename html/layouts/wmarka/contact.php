<?php
/**
 * WMARKA — карточка контакта (категория, «Команда», избранные контакты).
 * Фото — профиль avatar (квадрат 400×400, круг uk-border-circle).
 *
 * @var array $displayData ['item', 'params', 'view' => grid|list, 'switch' => bool]
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Contact\Site\Helper\RouteHelper;
use Wmarka\Template\Config;
use Wmarka\Template\Image;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$item   = $displayData['item'];
$params = $displayData['params'];
$view   = ($displayData['view'] ?? 'grid') === 'list' ? 'list' : 'grid';
$switch = !empty($displayData['switch']);
$link   = Route::_(RouteHelper::getContactRoute($item->slug, $item->catid, $item->language));
$photo  = ($params->get('show_image_heading', 1) || !empty($displayData['photo'])) && $item->image ? Image::thumb($item->image, 'avatar', false) : [];

// Без фото — нейтральный аватар шаблона (SVG, без превью)
if (!$photo && ($params->get('show_image_heading', 1) || !empty($displayData['photo']))) {
    $photo = ['src' => \Joomla\CMS\Uri\Uri::root(true) . '/' . Config::mediaFile('images/avatar.svg'), 'width' => 400, 'height' => 400];
}

$lines = [];

if ($params->get('show_position_headings', 1) && !empty($item->con_position)) {
    $lines[] = '<span itemprop="jobTitle">' . Ui::esc($item->con_position) . '</span>';
}

if ($params->get('show_telephone_headings') && !empty($item->telephone)) {
    $lines[] = '<a class="uk-link-text" href="tel:' . preg_replace('/[^\d+]/', '', $item->telephone) . '" itemprop="telephone">' . Ui::esc($item->telephone) . '</a>';
}

if ($params->get('show_mobile_headings') && !empty($item->mobile)) {
    $lines[] = '<a class="uk-link-text" href="tel:' . preg_replace('/[^\d+]/', '', $item->mobile) . '">' . Ui::esc($item->mobile) . '</a>';
}

if ($params->get('show_fax_headings') && !empty($item->fax)) {
    $lines[] = Text::sprintf('COM_CONTACT_FAX_NUMBER', Ui::esc($item->fax));
}

if ($params->get('show_email_headings') && !empty($item->email_to)) {
    $lines[] = $item->email_to;
}

$location = array_filter([
    $params->get('show_suburb_headings') ? $item->suburb : '',
    $params->get('show_state_headings') ? $item->state : '',
    $params->get('show_country_headings') ? $item->country : '',
]);

if ($location) {
    $lines[] = Ui::esc(implode(', ', $location));
}

$gridMedia = 'uk-width-1-1 uk-text-center';
$listMedia = 'uk-width-auto';
$gridBody  = 'uk-width-1-1 uk-text-center';
$listBody  = 'uk-width-expand';
?>
<article class="uk-card uk-card-default uk-card-small uk-card-body uk-height-1-1" itemscope itemtype="https://schema.org/Person">
    <div class="uk-grid-small uk-flex-middle" uk-grid>
        <?php if ($photo) : ?>
            <div <?php echo $switch ? Ui::switchAttr($view, $gridMedia, $listMedia) : 'class="' . ($view === 'list' ? $listMedia : $gridMedia) . '"'; ?>>
                <a href="<?php echo $link; ?>" tabindex="-1" aria-hidden="true">
                    <?php echo Image::img($photo, '', ['class' => 'uk-border-circle', 'width' => $view === 'list' ? 64 : 120, 'height' => $view === 'list' ? 64 : 120, 'itemprop' => 'image', 'data-wm-grid-size' => '120', 'data-wm-list-size' => '64']); ?>
                </a>
            </div>
        <?php endif; ?>
        <div <?php echo $switch ? Ui::switchAttr($view, $gridBody, $listBody) : 'class="' . ($view === 'list' ? $listBody : $gridBody) . '"'; ?>>
            <h3 class="uk-h4 uk-margin-remove"><a class="uk-link-heading" href="<?php echo $link; ?>" itemprop="url"><span itemprop="name"><?php echo Ui::esc($item->name); ?></span></a></h3>
            <?php if ((int) $item->published === 0) : ?>
                <span class="uk-label uk-label-warning"><?php echo Text::_('JUNPUBLISHED'); ?></span>
            <?php endif; ?>
            <?php echo $item->event->afterDisplayTitle ?? ''; ?>
            <?php echo $item->event->beforeDisplayContent ?? ''; ?>
            <?php if ($lines) : ?>
                <div class="uk-text-meta uk-margin-xsmall-top"><?php echo implode('<br>', $lines); ?></div>
            <?php endif; ?>
            <?php echo $item->event->afterDisplayContent ?? ''; ?>
        </div>
    </div>
</article>

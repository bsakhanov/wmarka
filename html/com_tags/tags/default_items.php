<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_tags - Items layout for TAGS view (displaying tags as cards)
 *
 * @copyright   (C) 2013 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Необходимые классы Joomla
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Tags\Site\Helper\RouteHelper;

/** @var \Joomla\Component\Tags\Site\View\Tags\HtmlView $this */
/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
$wa = $this->getDocument()->getWebAssetManager();
// $wa->useScript('com_tags.tags-default');

// Get the user object and access levels
$user = Factory::getUser();
$authorisedViewLevels = $user->getAuthorisedViewLevels();

// --- НАЧАЛО: Инициализация JUImage ---
if (!class_exists('JUImage')) {
    JLoader::register('JUImage', JPATH_LIBRARIES . '/juimage/JUImage.php');
}
$juImg = new JUImage();
$regexImageSrc = '/#joomlaImage?([^\'" >]+)/';
// --- КОНЕЦ: Инициализация JUImage ---


// --- Параметры отображения ---
$itemColumns        = $this->params->get('list_columns', 1);
$itemColumnsMedium  = $this->params->get('list_columns_medium', 3);
$itemColumnsLarge   = $this->params->get('list_columns_large', $itemColumnsMedium);
$showItemImage      = $this->params->get('show_tag_image', 1);
$showItemHits       = $this->params->get('show_tag_hits', 1);
$showItemDesc       = $this->params->get('show_tag_description', 1);
$imageWidth         = $this->params->get('tag_image_width', 390);
$imageHeight        = $this->params->get('tag_image_height', 260);
$truncateChars      = $this->params->get('tag_description_truncate', 100);
$placeholderServiceUrl = $this->params->get('tag_placeholder_service', 'https://placehold.co/{width}x{height}/EFEFEF/AAAAAA.png?text={text}');


// Формируем классы для сетки UIkit
$gridChildWidths = 'uk-child-width-1-1';
if ((int) $itemColumnsMedium > 1) {
    $gridChildWidths .= ' uk-child-width-1-' . (int) $itemColumnsMedium . '@m';
}
if ((int) $itemColumnsLarge > 1) {
     $gridChildWidths .= ' uk-child-width-1-' . (int) $itemColumnsLarge . '@l';
}

?>

<div class="com-tags-tags__items tags-items-cards"> <?php // Основной контейнер ?>

    <?php // Сообщение об отсутствии тегов ?>
    <?php if (empty($this->items)) : ?>
        <div class="uk-alert uk-alert-primary" uk-alert>
             <a class="uk-alert-close" uk-close></a>
            <p><?php echo Text::_('COM_TAGS_NO_TAGS_FOUND'); ?></p>
        </div>
    <?php else : ?>
        <?php // Сетка UIkit для карточек тегов ?>
        <div class="<?php echo $gridChildWidths; ?> tags-cards-grid uk-grid-small uk-grid-match uk-margin-top" uk-grid>

            <?php foreach ($this->items as $i => $item) : // Теперь $item - это объект ТЕГА ?>
                <?php
                // Пропускаем неопубликованные или если нет доступа
                if (!isset($item->published) || $item->published == 0 || !in_array($item->access, $authorisedViewLevels)) {
                    continue;
                }

                // --- Подготовка изображения (реальное или заглушка) ---
                $images = json_decode($item->images ?? '{}');
                $imageOutput = null;

                if ($showItemImage) {
                    $sourceImagePath = '';
                    if (!empty($images->image_intro)) {
                        $sourceImagePath = preg_replace($regexImageSrc, '', $images->image_intro);
                    }

                    if (!empty($sourceImagePath)) {
                        // Пытаемся обработать реальное изображение
                        $juImageParams = [
                            'w'         => $imageWidth, 'h' => $imageHeight, 'q' => 65,
                            'zc'        => 'C', 'far' => 'C', 'webp' => true,
                            'webp_q'    => 60, 'webp_maxq' => 65, 'cache' => 'img',
                        ];
                        $thumb = $juImg->render($sourceImagePath, $juImageParams);
                        if ($thumb && (isset($thumb->webp) || isset($thumb->url))) {
                            $imageOutput = $thumb;
                        }
                    }

                    // Если не удалось обработать реальное или его не было, генерируем заглушку
                    if (!$imageOutput) {
                        $dynamicPlaceholderText = (int)$imageWidth . 'x' . (int)$imageHeight;
                        $placeholderUrl = str_replace(
                            ['{width}', '{height}', '{text}'],
                            [(int)$imageWidth, (int)$imageHeight, urlencode($dynamicPlaceholderText)],
                            $placeholderServiceUrl
                        );
                         $imageOutput = (object) [
                             'url'    => $placeholderUrl, 'webp' => $placeholderUrl,
                             'width'  => $imageWidth, 'height' => $imageHeight
                         ];
                    }
                }
                // --- Конец подготовки изображения ---


                // --- Готовим HTML для хитов ЗАРАНЕЕ ---
                $hitsHtml = '';
                if ($showItemHits && isset($item->hits)) {
                    $hitsTooltip = Text::sprintf('JGLOBAL_HITS_COUNT', $item->hits);
                    $hitsHtml = '<div class="uk-width-auto@s uk-text-nowrap uk-text-meta" data-uk-tooltip title="' . $hitsTooltip . '">';
                    $hitsHtml .= '<span uk-icon="icon: eye" class="uk-text-middle"></span>';
                    $hitsHtml .= '<span class="uk-text-middle uk-margin-small-left">' . (int) $item->hits . '</span>';
                    $hitsHtml .= '</div>';
                }
                // --- Конец подготовки HTML для хитов ---
                ?>
                <div> <?php // Обертка для элемента сетки ?>
                    <article class="uk-card uk-card-default uk-box-shadow-small uk-box-shadow-hover-large uk-border-rounded uk-height-1-1 uk-flex uk-flex-column"
                             itemscope itemtype="http://schema.org/Thing">

                        <?php // Медиа-секция - Изображение Тега (или заглушка) ?>
                        <?php if ($showItemImage && $imageOutput && isset($imageOutput->webp)) : ?>
                            <div class="uk-card-media-top uk-inline-clip uk-transition-toggle">
                                <a href="<?php echo Route::_(RouteHelper::getTagRoute($item->id . ':' . $item->alias)); ?>"
                                   aria-label="<?php echo $this->escape(Text::sprintf('COM_TAGS_VIEW_TAG_TITLE', $item->title)); ?>">
                                    <img src="<?php echo $this->escape($imageOutput->webp); ?>"
                                         width="<?php echo $this->escape($imageOutput->width); ?>"
                                         height="<?php echo $this->escape($imageOutput->height); ?>"
                                         alt="<?php echo $this->escape(!empty($images->image_intro_alt) ? $images->image_intro_alt : $item->title); ?>"
                                         class="uk-transition-scale-up uk-transition-opaque"
                                         itemprop="image" loading="lazy"/>
                                </a>
                            </div>
                        <?php endif; ?>

                         <?php // Шапка карточки с ЗАГОЛОВКОМ (крупнее) и ХИТАМИ ?>
                        <div class="uk-card-header uk-padding-small">
                            <div class="uk-grid-small uk-flex-middle uk-flex-between" uk-grid>
                                <div class="uk-width-expand@s">
                                    <?php // H3 для семантики, uk-h5 для размера ?>
                                    <h3 class="uk-card-title uk-margin-remove uk-text-bold uk-h5"> <?php // <<< Изменено на uk-h5 >>> ?>
                                        <a class="uk-link-heading" href="<?php echo Route::_(RouteHelper::getTagRoute($item->id . ':' . $item->alias)); ?>" itemprop="url">
                                            <span itemprop="name"><?php echo $this->escape($item->title); ?></span>
                                        </a>
                                    </h3>
                                </div>
                                <?php echo $hitsHtml; // Выводим хиты ?>
                            </div>
                        </div>

                        <?php // Тело карточки (опциональное описание) ?>
                        <?php if ($showItemDesc && !empty($item->description)) : ?>
                        <div class="uk-card-body uk-padding-small uk-padding-remove-top uk-flex-1">
                            <div class="tag-description uk-text-small" itemprop="description">
                                <?php echo HTMLHelper::_('string.truncate', strip_tags($item->description), $truncateChars); ?>
                            </div>
                        </div>
                        <?php else: // Пустой растягивающийся блок, если нет описания ?>
                        <div class="uk-card-body uk-padding-remove uk-flex-1"></div>
                        <?php endif; ?>

                        <?php // Футер теперь не используется ?>

                    </article> <?php // end uk-card ?>
                </div> <?php // end grid child ?>
            <?php endforeach; ?>

        </div> <?php // end uk-grid ?>
    <?php endif; ?>

</div> <?php // end com-tags-tags__items ?>
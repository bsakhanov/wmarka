<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_tags
 *
 * @copyright   (C) 2013 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
// use Joomla\CMS\Layout\LayoutHelper; // Больше не нужен
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Tags\Site\Helper\RouteHelper; // Нужен для RouteHelper::getItemRoute
// use Joomla\Registry\Registry; // Больше не нужен

/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
$wa = $this->document->getWebAssetManager();
// $wa->useScript('com_tags.tag-default');

// Get the user object.
$user = Factory::getUser();
$authorisedViewLevels = $user->getAuthorisedViewLevels();

// Загрузка JUImage
JLoader::register('JUImage', JPATH_LIBRARIES . '/juimage/JUImage.php');
$juImg = new JUImage();
$regexImageSrc = '/#joomlaImage?([^\'" >]+)/';

// --- Параметры отображения ---
$showFilter         = $this->params->get('filter_field');
$itemColumns        = $this->params->get('num_columns', 1);
$itemColumnsMedium  = $this->params->get('num_columns_medium', 3);
$itemColumnsLarge   = $this->params->get('num_columns_large', $itemColumnsMedium);
$showItemImage      = $this->params->get('tag_list_show_item_image', 1);
$showItemDate       = $this->params->get('item_show_date', 1);
// $showItemHits       = $this->params->get('item_show_hits', 1); // Больше не используется
// $showItemTags       = $this->params->get('show_item_tags', 1); // Больше не используется
$dateFormat         = $this->params->get('date_format', Text::_('DATE_FORMAT_LC5'));
$imageWidth         = $this->params->get('item_image_width', 390);
$imageHeight        = $this->params->get('item_image_height', 260);
$truncateChars      = $this->params->get('item_intro_truncate', 120);

// Формируем классы для сетки UIkit
$gridChildWidths = 'uk-child-width-1-1';
if ((int) $itemColumnsMedium > 1) {
    $gridChildWidths .= ' uk-child-width-1-' . (int) $itemColumnsMedium . '@m';
}
if ((int) $itemColumnsLarge > 1) {
     $gridChildWidths .= ' uk-child-width-1-' . (int) $itemColumnsLarge . '@l';
}

?>
<div class="com-tags__items tag-items">

    <?php // Форма фильтрации ?>
    <?php if ($showFilter) : ?>
    <form action="<?php echo htmlspecialchars(Uri::getInstance()->toString()); ?>" method="post" name="adminForm" id="adminForm" class="uk-margin">
        <fieldset class="uk-fieldset">
            <legend class="uk-legend uk-hidden"><?php echo Text::_('JGLOBAL_FILTER_LABEL'); ?></legend>
            <div class="uk-margin">
                <div class="uk-form-controls uk-display-inline-block">
                    <label class="uk-form-label uk-hidden" for="filter-search">
                        <?php echo Text::_('COM_TAGS_TITLE_FILTER_LABEL'); ?>:
                    </label>
                    <input
                        type="text"
                        name="filter-search"
                        id="filter-search"
                        value="<?php echo $this->escape($this->state->get('list.filter')); ?>"
                        class="uk-input uk-form-width-medium uk-form-small"
                        onchange="document.adminForm.submit();"
                        placeholder="<?php echo Text::_('COM_TAGS_TITLE_FILTER_LABEL'); ?>"
                        aria-label="<?php echo Text::_('COM_TAGS_TITLE_FILTER_LABEL'); ?>"
                    >
                </div>
                <div class="uk-display-inline-block uk-margin-small-left">
                    <button type="submit" name="filter_submit" class="uk-button uk-button-primary uk-button-small">
                        <?php echo Text::_('JGLOBAL_FILTER_BUTTON'); ?>
                    </button>
                    <button type="button" name="filter-clear-button" class="uk-button uk-button-secondary uk-button-small" onclick="document.getElementById('filter-search').value='';this.form.submit();">
                        <?php echo Text::_('JSEARCH_FILTER_CLEAR'); ?>
                    </button>
                </div>
            </div>
        </fieldset>
        <input type="hidden" name="limitstart" value="">
        <input type="hidden" name="task" value="">
    </form>
    <?php endif; ?>

    <?php // Контейнер для сетки элементов ?>
    <div class="uk-margin-bottom uk-margin-top">

        <?php if (empty($this->items)) : ?>
            <div class="uk-alert uk-alert-primary" uk-alert>
                 <a class="uk-alert-close" uk-close></a>
                <p><?php echo Text::_('COM_TAGS_NO_ITEMS'); ?></p>
            </div>
        <?php else : ?>
            <div class="<?php echo $gridChildWidths; ?> blog-items uk-grid-small uk-grid-match" uk-grid>

                <?php foreach ($this->items as $i => $item) : ?>
                    <?php
                    // Пропускаем неопубликованные или если нет доступа
                    if ($item->core_state == 0 || !in_array($item->core_access, $authorisedViewLevels)) {
                        continue;
                    }
                    // Получаем изображения
                    $images = json_decode($item->core_images);
                    $thumb = null;
                    if ($showItemImage && !empty($images->image_intro)) {
                         $thumb = $juImg->render(preg_replace($regexImageSrc, '', $images->image_intro), [
                            'w'         => $imageWidth,
                            'h'         => $imageHeight,
                            'q'         => 65,
                            'zc'        => 'C',
                            'far'       => 'C',
                            'webp'      => true,
                            'webp_q'    => 60,
                            'webp_maxq' => 65,
                            'cache'     => 'img'
                        ]);
                    }
                    ?>
                    <div>
                        <article class="uk-card uk-card-default uk-box-shadow-small uk-box-shadow-hover-large uk-border-rounded uk-height-1-1"
                                 itemscope itemtype="http://schema.org/BlogPosting">

                            <?php // Медиа-секция ?>
                            <?php if ($thumb && isset($thumb->webp)) : ?>
                                <div class="uk-card-media-top uk-inline-clip uk-transition-toggle uk-border-rounded">
                                    <a href="<?php echo Route::_(RouteHelper::getItemRoute($item->content_item_id, $item->core_alias, $item->core_catid, $item->core_language, $item->type_alias, $item->router)); ?>"
                                       aria-label="<?php echo $this->escape(Text::sprintf('COM_TAGS_ITEM_READ_MORE_TITLE', $item->core_title)); ?>">
                                        <img src="<?php echo $thumb->webp; ?>"
                                             width="<?php echo $imageWidth; ?>"
                                             height="<?php echo $imageHeight; ?>"
                                             alt="<?php echo $this->escape(!empty($images->image_intro_alt) ? $images->image_intro_alt : $item->core_title); ?>"
                                             class="uk-transition-scale-up uk-transition-opaque"
                                             itemprop="thumbnailUrl" loading="lazy"/>
                                        <?php // Оверлей с увеличенным отступом ?>
                                        <?php if ($truncateChars > 0 && !empty($item->core_body)) : ?>
                                        <div class="uk-transition-slide-bottom uk-position-cover uk-overlay uk-overlay-primary uk-overlay-primary-news uk-padding uk-light"> <?php // <<< uk-padding вместо uk-padding-small >>> ?>
                                            <p class="uk-margin-remove uk-text-small">
                                                <?php echo HTMLHelper::_('string.truncate', strip_tags($item->core_body), $truncateChars); ?>
                                            </p>
                                        </div>
                                        <?php endif; ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                             <?php // Заголовок ?>
                            <div class="uk-card-header uk-padding-small">
                                <h3 class="uk-card-title uk-margin-remove-bottom uk-text-bold uk-h6">
                                    <a class="uk-link-heading" href="<?php echo Route::_(RouteHelper::getItemRoute($item->content_item_id, $item->core_alias, $item->core_catid, $item->core_language, $item->type_alias, $item->router)); ?>" itemprop="url">
                                        <span itemprop="name headline"><?php echo $this->escape($item->core_title); ?></span>
                                    </a>
                                </h3>
                            </div>

                             <?php // Футер карточки - ТОЛЬКО ДАТА ?>
                             <div class="uk-card-footer uk-padding-small"> <?php // <<< Убран uk-padding-remove-top >>> ?>
                                <?php // Метаданные: Дата ?>
                                <?php if ($showItemDate && !empty($item->displayDate)) : ?>
                                <dl class="uk-article-meta uk-text-small uk-flex uk-flex-middle uk-flex-wrap uk-margin-remove"> <?php // <<< Убран uk-margin-small-bottom >>> ?>
                                    <div data-uk-tooltip title="<?php echo Text::_('COM_TAGS_CREATED_DATE'); ?>"> <?php // Убран uk-margin-small-right, т.к. элемент один ?>
                                        <dt class="uk-hidden"><?php echo Text::_('COM_TAGS_CREATED_DATE'); ?></dt>
                                        <dd class="uk-margin-remove">
                                            <time datetime="<?php echo HTMLHelper::_('date', $item->displayDate, 'c'); ?>" itemprop="dateCreated">
                                                <span uk-icon="icon: calendar" class="uk-text-middle"></span> <?php // Иконка без ratio и без правого отступа ?>
                                                <span class="uk-text-middle">
                                                    <?php echo HTMLHelper::_('date', $item->displayDate, $dateFormat); ?>
                                                </span>
                                            </time>
                                        </dd>
                                    </div>
                                </dl>
                                <?php endif; // end date block ?>

                                <?php // Блоки вывода хитов и тегов УДАЛЕНЫ ?>

                             </div> <?php // end uk-card-footer ?>

                        </article> <?php // end uk-card ?>
                    </div> <?php // end grid child ?>
                <?php endforeach; ?>

            </div> <?php // end uk-grid ?>
        <?php endif; ?>

    </div> <?php // end item container ?>

    <?php // Пагинация ?>
    <?php if (!empty($this->items) && $this->pagination->pagesTotal > 1) : ?>
        <?php if ($this->params->get('show_pagination')) : ?>
            <div class="pagination-wrapper uk-margin-medium-top uk-clearfix">
                 <?php if ($this->params->get('show_pagination_results', 1)) : ?>
                    <div class="counter uk-float-right">
                        <p class="uk-text-meta">
                            <?php echo $this->pagination->getPagesCounter(); ?>
                        </p>
                    </div>
                <?php endif; ?>
                 <div class="uk-pagination-container">
                    <?php echo $this->pagination->getPagesLinks(['pagination' => 'uk-pagination']); ?>
                 </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

</div> <?php // end com-tags__items ?>
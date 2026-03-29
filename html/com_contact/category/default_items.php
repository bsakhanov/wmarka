<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact (Category Items Override for wmarka template)
 * @version     1.23 (2025-04-28) - Added online placeholder (placehold.co) fallback for missing/failed images.
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Log\Log;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Contact\Administrator\Helper\ContactHelper;
use Joomla\Component\Contact\Site\Helper\RouteHelper;
use Joomla\CMS\Categories\CategoryNode;
// use Joomla\CMS\Filesystem\File;

 JLoader::register('JUImage', JPATH_LIBRARIES . '/juimage/JUImage.php');

/** @var Joomla\Component\Contact\Site\View\Category\HtmlView $this */
/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */

// --- Initialization ---
$app = Factory::getApplication();
$wa  = $this->getDocument()->getWebAssetManager();
$wa->useScript('core');

// --- Permissions ---
$user    = $app->getIdentity();
$userId  = $user->id;
$canDo   = ContactHelper::getActions('com_contact', 'category', $this->category->id);
$canCreate = $canDo->get('core.create');
$canEdit   = $canDo->get('core.edit');
$canEditOwn= $canDo->get('core.edit.own');

// Determine if Edit column is needed
$showEditColumn = $canEdit;
if (!$showEditColumn && $canEditOwn && !empty($this->items)) {
    foreach ($this->items as $itemLoop) { // Use different variable name
        if ($itemLoop->created_by == $userId) {
            $showEditColumn = true;
            break;
        }
    }
}

// --- List State ---
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));
$filter    = $this->escape($this->state->get('list.filter'));

// --- Parameters ---
$params = $this->params;
$showFilterParam = $params->get('filter_field');
$showPaginationLimitParam = $params->get('show_pagination_limit');
$showImageHeading = $params->get('show_image_heading');

// --- Instantiate JUimage ---
$juImg = null;
if (class_exists('JUImage')) {
    try { $juImg = new JUImage(); } catch (\Throwable $e) { Log::add('Error instantiating JUimage: ' . $e->getMessage(), Log::ERROR, 'juimage-error'); }
}
?>

<div class="com-contact-category__items uk-margin-top">

    <form action="<?php echo htmlspecialchars(Uri::current()); ?>" method="post" name="adminForm" id="adminForm">

        <?php // Filter Section (unchanged) ?>
        <?php if ($showFilterParam || $showPaginationLimitParam) : ?>
            <fieldset class="uk-fieldset uk-margin-bottom"> <legend class="uk-legend uk-hidden"><?php echo Text::_('JGLOBAL_FILTER_LABEL'); ?></legend> <div class="uk-grid-small uk-flex-middle" uk-grid> <?php if ($showFilterParam) : ?> <div class="uk-width-1-1 uk-width-expand@m"> <div class="uk-inline uk-width-1-1"> <span class="uk-form-icon" uk-icon="icon: search"></span> <label class="uk-form-label uk-hidden" for="filter-search"><?php echo Text::_('COM_CONTACT_FILTER_SEARCH_DESC'); ?>:</label> <input type="text" name="filter-search" id="filter-search" value="<?php echo $filter; ?>" class="uk-input uk-form-small" onchange="this.form.submit();" placeholder="<?php echo Text::_('COM_CONTACT_FILTER_SEARCH_DESC'); ?>" aria-label="<?php echo Text::_('COM_CONTACT_FILTER_SEARCH_DESC'); ?>"> </div> </div> <?php endif; ?> <?php if ($showPaginationLimitParam && !empty($this->pagination) && $this->pagination->total > 0) : ?> <div class="uk-width-auto"> <div class="uk-form-controls uk-flex uk-flex-middle"> <label for="limit" class="uk-form-label uk-margin-small-right" uk-tooltip="title: <?php echo Text::_('JGLOBAL_DISPLAY_NUM'); ?>"> <span uk-icon="icon: menu"></span> </label> <?php echo $this->pagination->getLimitBox(['class' => 'uk-select uk-form-small uk-form-width-xsmall']); ?> </div> </div> <?php endif; ?> <?php if ($showFilterParam) : ?> <div class="uk-width-auto"> <div class="uk-form-controls uk-text-nowrap"> <button type="submit" name="filter_submit" class="uk-button uk-button-primary uk-button-small"><?php echo Text::_('JGLOBAL_FILTER_BUTTON'); ?></button> <button type="button" name="filter-clear-button" class="uk-button uk-button-secondary uk-button-small uk-margin-small-left" uk-tooltip="title: <?php echo Text::_('JSEARCH_FILTER_CLEAR'); ?>" onclick="document.getElementById('filter-search').value='';this.form.submit();"><span uk-icon="icon: refresh"></span></button> </div> </div> <?php endif; ?> </div> </fieldset>
        <?php endif; ?>
        <?php // --- End Filter --- ?>


        <?php // Contact List Table ?>
        <?php if (empty($this->items)) : ?>
            <?php if ($params->get('show_no_contacts', 1)) : ?> <div class="uk-alert uk-alert-primary" uk-alert> <p><span uk-icon="icon: info" class="uk-margin-small-right"></span><?php echo Text::_('COM_CONTACT_NO_CONTACTS'); ?></p> </div> <?php endif; ?>
        <?php else : ?>
            <div class="uk-overflow-auto">
                <table class="uk-table uk-table-hover uk-table-striped uk-table-middle" id="contactList">
                     <thead> <tr> <th scope="col" id="categorylist_header_title" class="uk-table-expand"><?php echo HTMLHelper::_('grid.sort', 'COM_CONTACT_FIELD_NAME_LABEL', 'a.name', $listDirn, $listOrder, null, 'asc', '', 'adminForm'); ?></th> <th scope="col" class="uk-width-large"><?php echo Text::_('COM_CONTACT_CONTACT_DETAILS'); ?></th> <?php if ($showEditColumn) : ?><th scope="col" class="uk-table-shrink uk-text-center"><?php echo Text::_('COM_CONTACT_EDIT_CONTACT'); ?></th><?php endif; ?> </tr> </thead>
                    <tbody>
                        <?php foreach ($this->items as $i => $item) : ?>
                            <?php
                            $canEditItem = $canEdit || ($canEditOwn && $item->created_by == $userId);
                            $contactLink = Route::_(RouteHelper::getContactRoute($item->slug, $item->catid, $item->language));
                            $editLink    = $canEditItem ? Route::_(RouteHelper::getContactEditRoute($item->id)) : null;
                            $contactName = $this->escape($item->name);

                            // --- <<< НАЧАЛО: Логика изображения (JUimage WebP -> Онлайн-заглушка) >>> ---
                            $rawImagePath = $item->image ?? '';
                            $contactImagePath = ''; // Cleaned path
                            $imageHtml = ''; // Final HTML output
                            $processedImage = null; // JUimage result
                            $webpSrc = null; // WebP source URL

                            $imgWidth = 50; $imgHeight = 50; $imgClass = 'uk-border-circle';
                            $imageAltText = $contactName; // Use name directly for Alt
                            $placeholderAltText = Text::_('COM_CONTACT_IMAGE_PLACEHOLDER');

                            // 1. Clean the path
                            if (!empty($rawImagePath)) {
                                $pathParts = explode('#', $rawImagePath, 2);
                                $cleanPath = $pathParts[0] ?? '';
                                $contactImagePath = ltrim($cleanPath, '/');
                            }

                            // 2. Try processing with JUimage if path is not empty and library exists
                            if (!empty($contactImagePath) && $juImg instanceof JUImage) {
                                try {
                                    $imageOptions = [
                                        'w' => (string) $imgWidth, 'h' => (string) $imgHeight, 'q' => '75',
                                        'zc' => 'C', 'far' => 'C', 'webp' => true, 'webp_q' => '70', 'cache' => 'img',
                                    ];
                                    $processedImage = $juImg->render($contactImagePath, $imageOptions);
                                    $webpSrc = $processedImage->webp ?? null; // Get only WebP source

                                } catch (\Throwable $e) {
                                    Log::add('Contact ID ' . $item->id . ': JUimage::render FAILED for path "' . $contactImagePath . '". Error: ' . $e->getMessage(), Log::ERROR, 'juimage-error');
                                    $webpSrc = null; // Ensure it's null on error
                                }
                            }

                            // 3. Build <img> tag: Use WebP if available, otherwise use online placeholder
                            if (!empty($webpSrc)) {
                                // Use the processed WebP image
                                $imageHtml = '<img src="' . htmlspecialchars($webpSrc) . '" '
                                            . 'width="' . $imgWidth . '" height="' . $imgHeight . '" '
                                            . 'class="' . $imgClass . '" '
                                            . 'alt="' . $imageAltText . '" '
                                            . 'style="width: ' . $imgWidth . 'px; height: ' . $imgHeight . 'px; object-fit: cover;" '
                                            . 'loading="lazy">';
                            } else {
                                // <<< Используем ОНЛАЙН-заглушку placehold.co >>>
                                $placeholderText = $imgWidth . 'x' . $imgHeight; // Text for placeholder (e.g., "50x50")
                                // Формируем URL на основе вашего примера
                                $placeholderUrl = 'https://placehold.co/' . $imgWidth . 'x' . $imgHeight . '/EFEFEF/AAAAAA.png?text=' . urlencode($placeholderText);

                                $imageHtml = '<img src="' . htmlspecialchars($placeholderUrl) . '" '
                                            . 'width="' . $imgWidth . '" height="' . $imgHeight . '" '
                                            . 'class="' . $imgClass . '" ' // Простой класс для заглушки
                                            . 'alt="' . $placeholderAltText . '" ' // Используем alt заглушки
                                            . 'style="width: ' . $imgWidth . 'px; height: ' . $imgHeight . 'px;" ' // Без object-fit
                                            . 'loading="lazy">';

                                // Log why placeholder is shown if a path existed but failed
                                if (!empty($contactImagePath)) {
                                     Log::add('Contact ID ' . $item->id . ': Showing online placeholder because JUimage did not return webp src for path: ' . $contactImagePath, Log::INFO, 'juimage-placeholder-fallback');
                                }
                            }
                            // --- <<< КОНЕЦ: Логика изображения >>> ---
                            ?>
                            <tr class="row<?php echo $i % 2; ?>" data-pk="<?php echo (int) $item->id; ?>"<?php echo $item->published == 0 ? ' data-unpublished="1"' : ''; ?>>

                                <?php // === Column 1: Name & Image === ?>
                                <th scope="row" class="list-title uk-text-bold">
                                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                                        <?php // Выводим ячейку с картинкой ТОЛЬКО если $showImageHeading=true ?>
                                        <?php // $imageHtml теперь ВСЕГДА содержит либо webp, либо заглушку ?>
                                        <?php if ($showImageHeading) : ?>
                                            <div class="uk-width-auto">
                                                <?php echo $imageHtml; ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="uk-width-expand">
                                            <a href="<?php echo $contactLink; ?>" class="uk-link-reset"><?php echo $contactName; ?></a>
                                            <div class="uk-margin-small-top uk-text-small"> <?php /* ... статусы ... */ ?> </div>
                                        </div>
                                    </div>
                                    <?php try { echo $item->event->afterDisplayTitle ?? ''; } catch (\Exception $e) {} ?>
                                </th>

                                <?php // === Column 2: Contact Details === ?>
                                <td>
                                     <?php try { echo $item->event->beforeDisplayContent ?? ''; } catch (\Exception $e) {} ?>
                                     <dl class="uk-description-list uk-description-list-divider uk-text-small">
                                         <?php // --- Возвращено значение Должности без метки/иконки --- ?>
                                         <?php if ($params->get('show_position_headings') && !empty($item->con_position)) : ?>
                                             <dd><?php echo $this->escape($item->con_position); ?></dd>
                                         <?php endif; ?>
                                         <?php // --- КОНЕЦ ИЗМЕНЕНИЯ --- ?>

                                         <?php // Остальные детали без изменений ?>
                                         <?php if ($params->get('show_telephone_headings') && !empty($item->telephone)) : ?><dt><span uk-icon="icon: receiver; ratio: 0.8" class="uk-margin-small-right uk-text-muted"></span><?php echo Text::_('COM_CONTACT_TELEPHONE'); ?></dt><dd><a href="tel:<?php echo $this->escape(preg_replace('/[^0-9+]/', '', $item->telephone)); ?>" class="uk-link-muted"><?php echo $this->escape($item->telephone); ?></a></dd><?php endif; ?>
                                         <?php if ($params->get('show_mobile_headings') && !empty($item->mobile)) : ?><dt><span uk-icon="icon: phone; ratio: 0.8" class="uk-margin-small-right uk-text-muted"></span><?php echo Text::_('COM_CONTACT_MOBILE'); ?></dt><dd><a href="tel:<?php echo $this->escape(preg_replace('/[^0-9+]/', '', $item->mobile)); ?>" class="uk-link-muted"><?php echo $this->escape($item->mobile); ?></a></dd><?php endif; ?>
                                         <?php if ($params->get('show_fax_headings') && !empty($item->fax)) : ?><dt><span uk-icon="icon: print; ratio: 0.8" class="uk-margin-small-right uk-text-muted"></span><?php echo Text::_('COM_CONTACT_FAX'); ?></dt><dd><?php echo $this->escape($item->fax); ?></dd><?php endif; ?>
                                         <?php if ($params->get('show_email_headings') && !empty($item->email_to)) : ?><dt><span uk-icon="icon: mail; ratio: 0.8" class="uk-margin-small-right uk-text-muted"></span><?php echo Text::_('JGLOBAL_EMAIL'); ?></dt><dd><?php try { echo HTMLHelper::_('email.cloak', $this->escape($item->email_to)); } catch (\Exception $e) { echo $this->escape($item->email_to); } ?></dd><?php endif; ?>
                                         <?php $locationParts = []; if ($params->get('show_suburb_headings') && !empty($item->suburb)) { $locationParts[] = $this->escape($item->suburb); } if ($params->get('show_state_headings') && !empty($item->state)) { $locationParts[] = $this->escape($item->state); } if ($params->get('show_country_headings') && !empty($item->country)) { $locationParts[] = $this->escape($item->country); } $locationString = implode(', ', $locationParts); ?> <?php if (!empty($locationString)) : ?><dt><span uk-icon="icon: location; ratio: 0.8" class="uk-margin-small-right uk-text-muted"></span><?php echo Text::_('COM_CONTACT_LOCATION'); ?></dt><dd><?php echo $locationString; ?></dd><?php endif; ?>
                                     </dl>
                                     <?php try { echo $item->event->afterDisplayContent ?? ''; } catch (\Exception $e) {} ?>
                                </td>

                                <?php // === Column 3: Edit Button === (unchanged) ?>
                                <?php if ($showEditColumn) : ?> <td class="uk-text-center"> <?php if ($canEditItem && $editLink) : ?> <a href="<?php echo $editLink; ?>" class="uk-icon-link" title="<?php echo Text::_('JACTION_EDIT'); ?>" uk-tooltip="<?php echo Text::_('JACTION_EDIT'); ?>"><span uk-icon="icon: file-edit"></span></a> <?php else : ?> <span uk-icon="icon: file-edit" class="uk-text-muted" title="<?php echo Text::_('JLIB_HTML_EDIT_NOT_PERMITTED'); ?>" uk-tooltip="<?php echo Text::_('JLIB_HTML_EDIT_NOT_PERMITTED'); ?>"></span> <?php endif; ?> </td> <?php endif; ?>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div> <?php // end uk-overflow-auto ?>
        <?php endif; ?>


        <?php // Rest of the form (unchanged) ?>
         <?php /* ... create button, pagination, hidden fields ... */ ?>
         <?php if ($canCreate) : ?> <div class="uk-margin-top uk-text-right"> <?php $createLink = Route::_('index.php?option=com_contact&task=contact.add&catid=' . $this->category->id); ?> <a href="<?php echo $createLink; ?>" class="uk-button uk-button-primary uk-button-small"><span uk-icon="icon: plus; ratio: 0.8" class="uk-margin-small-right"></span><?php echo Text::_('JACTION_CREATE'); ?> <?php echo Text::_('COM_CONTACT_CONTACT'); ?></a> </div> <?php endif; ?>
        <?php if ($params->get('show_pagination', 2) && !empty($this->pagination) && $this->pagination->pagesTotal > 1) : ?> <div class="pagination-wrap uk-margin-medium-top uk-text-center"> <?php if ($params->def('show_pagination_results', 1)) : ?><p class="counter uk-text-meta uk-margin-bottom"><?php echo $this->pagination->getPagesCounter(); ?></p><?php endif; ?> <div class="uk-pagination-container"><?php echo $this->pagination->getPagesLinks(['pagination' => 'uk-pagination']); ?></div> </div> <?php endif; ?>
        <div> <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"> <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"> </div>


    </form> <?php // End #adminForm ?>

</div> <?php // End .com-contact-category__items ?>
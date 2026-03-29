<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 * @author      Partially modified for Joomla 5, UIkit 3, SEO, JUImage, Layout
 * @version     1.19 (2025-04-29) // Changed grid spacing to uk-grid-small for author info.
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// --- Используемые классы ---
use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ContentHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Filesystem\Path;
use Joomla\CMS\Filesystem\File;
use Joomla\Component\Contact\Site\Helper\RouteHelper;
use Joomla\Registry\Registry;
use Joomla\CMS\Log\Log;

// --- Инициализация JUImage ---
// ... (без изменений) ...
if (!class_exists('JUImage')) { $juImagePath = JPATH_LIBRARIES . '/juimage/JUImage.php'; if (File::exists($juImagePath)) { JLoader::register('JUImage', $juImagePath); } } $juImg = null; if (class_exists('JUImage')) { try { $juImg = new JUImage(); } catch (\Throwable $e) { Log::add('Error instantiating JUImage: ' . $e->getMessage(), Log::ERROR, 'juimage-error'); } }

/** @var \Joomla\Component\Contact\Site\View\Contact\HtmlView $this */

// --- Получение основных объектов и данных ---
// ... (без изменений) ...
$app = Factory::getApplication(); $document = $app->getDocument(); $user = $this->user ?? $app->getIdentity(); $item = $this->item; $tparams = $item->params instanceof Registry ? $item->params : new Registry($item->params); $contactUser = $this->contactUser ?? null; $contactName = trim($item->name ?: '');

// =========================================================================
// === SEO Оптимизация (без изменений) ===
// =========================================================================
// ... (блок SEO без изменений) ...
$siteName = $app->get('sitename'); $currentUrl = Uri::current(); $pageTitle = $document->getTitle(); if ($contactName && strpos($pageTitle, $contactName) === false) { $pageTitle = $contactName . ' - ' . $pageTitle; } elseif (!$contactName) { $contactName = $pageTitle; } $ogTitle = htmlspecialchars(strip_tags($contactName), ENT_QUOTES, 'UTF-8'); $ogDescription = $item->metadesc ?: ''; if (!$ogDescription && $item->misc) { $ogDescription = HTMLHelper::_('string.truncate', strip_tags($item->misc), 200, true, false); } if (!$ogDescription) { $ogDescription = $document->getDescription(); } $ogDescription = htmlspecialchars(strip_tags($ogDescription), ENT_QUOTES, 'UTF-8'); $ogImage = ''; $sourceImagePathForOg = ''; $ogThumb = null; if ($item->image && $tparams->get('show_image')) { $ogPathParts = explode('#', $item->image, 2); $cleanOgPath = $ogPathParts[0] ?? ''; $potentialPathOg = ltrim($cleanOgPath, '/'); if (!empty($potentialPathOg) && File::exists(JPATH_ROOT . '/' . $potentialPathOg)) { $sourceImagePathForOg = $potentialPathOg; } } if (!$sourceImagePathForOg) { $templateName = $app->getTemplate(); $defaultImagePath = '/media/templates/site/' . $templateName . '/images/og_default.jpg'; if (File::exists(JPATH_ROOT . $defaultImagePath)) { $sourceImagePathForOg = ltrim($defaultImagePath, '/'); } } if ($sourceImagePathForOg && $juImg) { $ogImageParams = ['w' => '300', 'h' => '300', 'q' => '80', 'zc' => 'C', 'far' => 'C', 'webp' => false, 'cache' => 'img']; try { $ogThumb = $juImg->render($sourceImagePathForOg, $ogImageParams); $ogSrc = $ogThumb->src ?? ($ogThumb->img ?? null); if ($ogThumb && !empty($ogSrc)) { $ogImage = Uri::base() . ltrim($ogSrc, '/'); } else { $ogImage = Uri::base() . $sourceImagePathForOg; } } catch (\Throwable $e) { Log::add('JUImage error for OG path "' . $sourceImagePathForOg . '": ' . $e->getMessage(), Log::ERROR, 'juimage-error'); $ogImage = Uri::base() . $sourceImagePathForOg; } } elseif ($sourceImagePathForOg) { $ogImage = Uri::base() . $sourceImagePathForOg; } $ogImage = htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); $lang = ($item->language && $item->language !== '*') ? $item->language : $app->get('language', 'en-GB'); $ogLang = htmlspecialchars(str_replace('-', '_', $lang), ENT_QUOTES, 'UTF-8'); $joomlaUsername = ($contactUser && $contactUser->name !== $contactName) ? $contactUser->username : ''; $individualTwitterCreator = ''; $twitterCustomFieldName = 'twitter-handle'; if (!empty($item->jcfields)) { foreach ($item->jcfields as $field) { if ($field->name === $twitterCustomFieldName && !empty($field->rawvalue)) { $potentialHandle = trim($field->rawvalue); if ($potentialHandle) { $individualTwitterCreator = (strpos($potentialHandle, '@') === 0) ? $potentialHandle : '@' . $potentialHandle; } break; } } } if (!$individualTwitterCreator && $contactUser && isset($contactUser->profile['twitter'])) { $potentialHandle = trim($contactUser->profile['twitter']); if ($potentialHandle) { $individualTwitterCreator = (strpos($potentialHandle, '@') === 0) ? $potentialHandle : '@' . $potentialHandle; } } $twitterSiteHandle = Text::_('SEO_TWITTER_SITE', ''); $facebookAdmins = Text::_('SEO_FACEBOOK_ID', ''); $facebookAppId = Text::_('SEO_YOUR_APP_ID', ''); $document->setMetaData('og:title', $ogTitle); $document->setMetaData('og:description', $ogDescription); $document->setMetaData('og:url', $currentUrl); $document->setMetaData('og:site_name', htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8')); $document->setMetaData('og:type', 'profile'); $document->setMetaData('og:locale', $ogLang); if ($joomlaUsername) { $document->setMetaData('profile:username', htmlspecialchars($joomlaUsername, ENT_QUOTES, 'UTF-8')); } if ($ogImage) { $document->setMetaData('og:image', $ogImage); $document->setMetaData('og:image:secure_url', $ogImage); $document->setMetaData('og:image:alt', $ogTitle); $document->setMetaData('og:image:width', '300'); $document->setMetaData('og:image:height', '300'); $document->setMetaData('twitter:image', $ogImage); $document->setMetaData('twitter:image:alt', $ogTitle); $document->setMetaData('twitter:card', 'summary_large_image'); } else { $document->setMetaData('twitter:card', 'summary'); } if ($twitterSiteHandle) { $document->setMetaData('twitter:site', htmlspecialchars($twitterSiteHandle, ENT_QUOTES, 'UTF-8')); } if ($individualTwitterCreator) { $document->setMetaData('twitter:creator', htmlspecialchars($individualTwitterCreator, ENT_QUOTES, 'UTF-8')); } if ($facebookAdmins) { $document->setMetaData('fb:admins', htmlspecialchars($facebookAdmins, ENT_QUOTES, 'UTF-8')); } if ($facebookAppId) { $document->setMetaData('fb:app_id', htmlspecialchars($facebookAppId, ENT_QUOTES, 'UTF-8')); } $schema = ['@context' => 'https://schema.org', '@type' => 'Person', 'name' => htmlspecialchars($contactName, ENT_QUOTES, 'UTF-8'), 'url' => $currentUrl]; if (!empty($joomlaUsername)) { $schema['alternateName'] = htmlspecialchars($joomlaUsername, ENT_QUOTES, 'UTF-8'); } if (!empty($ogImage)) { $schema['image'] = $ogImage; } if ($item->con_position && $tparams->get('show_position')) { $schema['jobTitle'] = htmlspecialchars($item->con_position, ENT_QUOTES, 'UTF-8'); } if ($item->email_to && $tparams->get('show_email')) { $schema['email'] = 'mailto:' . htmlspecialchars($item->email_to, ENT_QUOTES, 'UTF-8'); } $telephones = []; if ($item->telephone && $tparams->get('show_telephone')) { $telephones[] = htmlspecialchars($item->telephone, ENT_QUOTES, 'UTF-8'); } if ($item->mobile && $tparams->get('show_mobile')) { $telephones[] = htmlspecialchars($item->mobile, ENT_QUOTES, 'UTF-8'); } if (!empty($telephones)) { $schema['telephone'] = implode(', ', $telephones); } if ($item->fax && $tparams->get('show_fax')) { $schema['faxNumber'] = htmlspecialchars($item->fax, ENT_QUOTES, 'UTF-8'); } $schema['sameAs'] = []; if ($item->webpage && $tparams->get('show_webpage')) { $webpageUrl = trim($item->webpage); if ($webpageUrl) { if (strpos($webpageUrl, 'http') !== 0) { $webpageUrl = 'http://' . $webpageUrl; } if (filter_var($webpageUrl, FILTER_VALIDATE_URL)) { if ($webpageUrl !== $currentUrl) { $schema['url'] = htmlspecialchars($webpageUrl, ENT_COMPAT, 'UTF-8'); } $schema['sameAs'][] = htmlspecialchars($webpageUrl, ENT_COMPAT, 'UTF-8'); } } } if (!empty($individualTwitterCreator)) { $twitterUrl = 'https://twitter.com/' . ltrim($individualTwitterCreator, '@'); $schema['sameAs'][] = htmlspecialchars($twitterUrl, ENT_COMPAT, 'UTF-8'); } if (empty($schema['sameAs'])) { unset($schema['sameAs']); } else { $schema['sameAs'] = array_values(array_unique($schema['sameAs'])); } $addressSchema = []; if ($item->address && $tparams->get('show_street_address')) { $addressSchema['streetAddress'] = htmlspecialchars($item->address, ENT_QUOTES, 'UTF-8'); } if ($item->suburb && $tparams->get('show_suburb')) { $addressSchema['addressLocality'] = htmlspecialchars($item->suburb, ENT_QUOTES, 'UTF-8'); } if ($item->state && $tparams->get('show_state')) { $addressSchema['addressRegion'] = htmlspecialchars($item->state, ENT_QUOTES, 'UTF-8'); } if ($item->postcode && $tparams->get('show_postcode')) { $addressSchema['postalCode'] = htmlspecialchars($item->postcode, ENT_QUOTES, 'UTF-8'); } if ($item->country && $tparams->get('show_country')) { $addressSchema['addressCountry'] = htmlspecialchars($item->country, ENT_QUOTES, 'UTF-8'); } if (!empty($addressSchema)) { $addressSchema['@type'] = 'PostalAddress'; $schema['address'] = $addressSchema; } $schema['worksFor'] = ['@type' => 'Organization', 'name' => htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'), 'url' => Uri::base()]; $document->addScriptDeclaration(json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), 'application/ld+json');
// =========================================================================
// === Конец блока SEO ===
// =========================================================================


// --- Блок подготовки изображения (300x300, cache='img') ---
// ... (Этот блок без изменений) ...
$displayImageHTML = ''; $showImageParam = $tparams->get('show_image', 1); $imgWidth = 300; $imgHeight = 300; $imgAlt = htmlspecialchars($contactName, ENT_QUOTES, 'UTF-8'); if ($showImageParam) { $rawImagePath = $item->image ?? ''; $contactImagePath = ''; if (!empty($rawImagePath)) { $pathParts = explode('#', $rawImagePath, 2); $cleanPath = $pathParts[0] ?? ''; $potentialPath = ltrim($cleanPath, '/'); if (!empty($potentialPath) && File::exists(JPATH_ROOT . '/' . $potentialPath)) { $contactImagePath = $potentialPath; } } if ($contactImagePath && $juImg) { $displayImageParams = ['w'=>(string)$imgWidth, 'h'=>(string)$imgHeight, 'zc'=>'C', 'q'=>'75', 'webp'=>true, 'webp_q'=>'70', 'webp_maxq'=>'75', 'cache'=>'img']; try { $thumb = $juImg->render($contactImagePath, $displayImageParams); $imgSrc = $thumb->webp ?? ($thumb->src ?? ($thumb->img ?? null)); if ($thumb && !empty($imgSrc)) { $renderWidth = $thumb->width ?? $imgWidth; $renderHeight = $thumb->height ?? $imgHeight; $displayImageHTML = '<img src="'.htmlspecialchars($imgSrc).'" width="'.$renderWidth.'" height="'.$renderHeight.'" alt="'.$imgAlt.'" class="uk-img uk-border-rounded" loading="lazy" style="width: '.$imgWidth.'px; height: '.$imgHeight.'px; object-fit: cover; max-width: 100%;">'; } } catch (\Throwable $e) { /* Log error */ } } if (empty($displayImageHTML) && $contactImagePath) { $originalUrl = Uri::root(true) . '/' . $contactImagePath; $displayImageHTML = '<img src="'.htmlspecialchars($originalUrl).'" alt="'.$imgAlt.'" class="uk-img uk-preserve-width uk-border-rounded" style="max-width: '.$imgWidth.'px; max-height: '.$imgHeight.'px; height: auto;" loading="lazy">'; } if (empty($displayImageHTML)) { $placeholderText = $imgWidth.' x '.$imgHeight; $displayImageHTML = '<div class="uk-placeholder uk-text-center uk-text-small uk-margin-remove uk-flex uk-flex-middle uk-flex-center uk-border-rounded" style="width: '.$imgWidth.'px; height: '.$imgHeight.'px; max-width: 100%; box-sizing: border-box; background-color: #f0f0f0;"><div>'.$this->escape($placeholderText).'</div></div>'; } }
// --- КОНЕЦ ПОДГОТОВКИ ИЗОБРАЖЕНИЯ/ЗАГЛУШКИ ---


// --- Переменные для отображения ---
$canDo = ContentHelper::getActions('com_contact', 'category', $item->catid); $canEdit = $canDo->get('core.edit') || ($canDo->get('core.edit.own') && $item->created_by === $user->id); $pageHeadingLevel = $tparams->get('show_page_heading') ? 1 : 0; $nameHeadingLevel = $tparams->get('show_name') ? ($pageHeadingLevel === 1 ? 2 : 1) : 0; $subHeadingLevel = ($pageHeadingLevel === 1 || $nameHeadingLevel > 0) ? 3 : 2;
?>
<div class="uk-article com-contact contact" itemscope itemtype="https://schema.org/Person">

    <?php // 1. Заголовок страницы (без изменений) ?>
    <?php if ($tparams->get('show_page_heading')) : ?> <h1 class="uk-h1 uk-margin-medium-bottom"><?php echo $this->escape($tparams->get('page_heading')); ?></h1> <?php endif; ?>

    <?php // --- Имя и категория (без изменений) --- ?>
    <div class="uk-position-relative"> <?php if ($canEdit) : ?> <div class="uk-position-top-right uk-margin-small-top uk-margin-small-right"><?php echo HTMLHelper::_('contacticon.edit', $item, $tparams); ?></div> <?php endif; ?> <?php if ($item->name && $tparams->get('show_name')) : ?> <div class="uk-margin-bottom"><?php echo '<h' . $nameHeadingLevel . ' class="uk-h' . $nameHeadingLevel . ' uk-margin-remove-bottom" itemprop="name">'; ?><?php if ($item->published == 0) : ?><span class="uk-label uk-label-warning uk-margin-small-right"><?php echo Text::_('JUNPUBLISHED'); ?></span><?php endif; ?><span class="contact-name"><?php echo $this->escape($item->name); ?></span><?php echo '</h' . $nameHeadingLevel . '>'; ?></div> <?php endif; ?> </div>
    <?php $show_contact_category = $tparams->get('show_contact_category'); ?> <?php if (($show_contact_category === 'show_no_link' || $show_contact_category === 'show_with_link') && $item->category_title ) : ?> <?php $catHeadingLevel = $nameHeadingLevel ? $nameHeadingLevel + 1 : ($pageHeadingLevel ? 2 : 1); ?> <?php echo '<h' . $catHeadingLevel . ' class="uk-h' . $catHeadingLevel . ' uk-text-meta uk-margin-medium-bottom">'; ?> <span class="contact-category" itemprop="jobTitle"><?php if ($show_contact_category === 'show_with_link') : ?><?php $contactLink = Route::_(RouteHelper::getCategoryRoute($item->catid, $item->language)); ?> <a href="<?php echo $contactLink; ?>" class="uk-link-reset"><?php echo $this->escape($item->category_title); ?></a><?php else : ?><?php echo $this->escape($item->category_title); ?><?php endif; ?></span> <?php echo '</h' . $catHeadingLevel . '>'; ?> <?php endif; ?>
    <?php echo $item->event->afterDisplayTitle ?? ''; ?>


    <?php // --- СЕТКА: [Портрет/Заглушка] | [Доп. Инфо] --- ?>
    <?php // <<< ИЗМЕНЕНИЕ: uk-grid-small >>> ?>
    <div class="uk-grid-small uk-margin-medium-bottom" uk-grid>
        <?php if (!empty($displayImageHTML)) : ?>
            <div class="uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-text-center uk-text-left@s">
                 <div class="uk-margin-bottom">
                     <?php echo $displayImageHTML; ?>
                 </div>
            </div>
            <div class="uk-width-expand@m">
        <?php else : ?>
            <div class="uk-width-1-1">
        <?php endif; ?>

            <?php // Дополнительная информация (Misc Info) ?>
            <?php if ($item->misc && $tparams->get('show_misc')) : ?>
                <div class="contact-miscinfo uk-column-1-2@m" itemprop="description">
                    <?php echo $item->misc; ?>
                </div>
            <?php endif; ?>

        </div> <?php // Закрываем uk-width-expand@m или uk-width-1-1 ?>
    </div> <?php // Закрываем Сетку ?>
    <?php // --- КОНЕЦ СЕТКИ --- ?>


    <?php // --- Блок тегов контакта (без изменений) --- ?>
    <?php if ($tparams->get('show_tags', 1) && !empty($item->tags->itemTags)) : ?> <div class="uk-margin-medium-bottom com-contact__tags"> <?php $item->tagLayout = new FileLayout('joomla.content.tags'); ?> <?php echo $item->tagLayout->render($item->tags->itemTags); ?> </div> <?php endif; ?>


    <?php echo $item->event->beforeDisplayContent ?? ''; ?>


    <?php // --- Блок Контактных Деталей --- ?>
    <?php $hasDetails = ( ($tparams->get('show_street_address') && $item->address) || ($tparams->get('show_suburb') && $item->suburb) || ($tparams->get('show_state') && $item->state) || ($tparams->get('show_postcode') && $item->postcode) || ($tparams->get('show_country') && $item->country) || ($tparams->get('show_telephone') && $item->telephone) || ($tparams->get('show_mobile') && $item->mobile) || ($tparams->get('show_fax') && $item->fax) || /* Email убран */ ($tparams->get('show_webpage') && $item->webpage) ); ?>
    <?php if ($hasDetails) : ?>
        <div class="contact-details uk-margin-medium-bottom">
            <?php echo '<h' . $subHeadingLevel . ' class="uk-h' . $subHeadingLevel . ' uk-heading-divider uk-margin-medium-bottom">' . Text::_('COM_CONTACT_DETAILS') . '</h' . $subHeadingLevel . '>'; ?>
             <?php // <<< ИЗМЕНЕНИЕ: uk-grid-small >>> ?>
            <div class="uk-grid-small" uk-grid>

                <?php // --- Колонка 1: Адрес --- ?>
                <?php if ($hasAddress = (($tparams->get('show_street_address') && $item->address) || ($tparams->get('show_suburb') && $item->suburb) || ($tparams->get('show_state') && $item->state) || ($tparams->get('show_postcode') && $item->postcode) || ($tparams->get('show_country') && $item->country))) : ?>
                    <div class="uk-width-1-1 uk-width-1-2@m">
                        <dl class="uk-description-list uk-description-list-divider">
                            <?php /* ... address details ... */ ?>
                            <?php $addressParts = []; if ($tparams->get('show_street_address') && $item->address) { $addressParts[] = '<span itemprop="streetAddress">' . $this->escape($item->address) . '</span>'; } $locality = []; if ($tparams->get('show_suburb') && $item->suburb) { $locality[] = '<span itemprop="addressLocality">' . $this->escape($item->suburb) . '</span>'; } if ($tparams->get('show_state') && $item->state) { $locality[] = '<span itemprop="addressRegion">' . $this->escape($item->state) . '</span>'; } if ($tparams->get('show_postcode') && $item->postcode) { $locality[] = '<span itemprop="postalCode">' . $this->escape($item->postcode) . '</span>'; } if (!empty($locality)) { $addressParts[] = implode(', ', $locality); } if ($tparams->get('show_country') && $item->country) { $addressParts[] = '<span itemprop="addressCountry">' . $this->escape($item->country) . '</span>'; } $fullAddress = implode('<br>', $addressParts); ?> <?php if (!empty(trim(strip_tags($fullAddress)))) : ?> <dt><span uk-icon="icon: location" class="uk-margin-small-right uk-text-muted"></span><?php echo Text::_('COM_CONTACT_ADDRESS'); ?></dt> <dd itemprop="address" itemscope itemtype="https://schema.org/PostalAddress"><?php echo $fullAddress; ?></dd> <?php endif; ?>
                        </dl>
                    </div>
                <?php endif; ?>

                <?php // --- Колонка 2: Телефоны, Факс, Сайт --- ?>
                <?php if ($hasComms = (($tparams->get('show_telephone') && $item->telephone) || ($tparams->get('show_mobile') && $item->mobile) || ($tparams->get('show_fax') && $item->fax) || ($tparams->get('show_webpage') && $item->webpage))) : ?>
                    <div class="uk-width-1-1 <?php echo $hasAddress ? 'uk-width-1-2@m' : 'uk-width-1-1'; ?>">
                        <dl class="uk-description-list uk-description-list-divider">
                            <?php /* ... phone, mobile, fax, website details ... */ ?>
                             <?php if ($tparams->get('show_telephone') && $item->telephone) : ?> <dt><span uk-icon="icon: receiver" class="uk-margin-small-right uk-text-muted"></span><?php echo Text::_('COM_CONTACT_TELEPHONE'); ?></dt> <dd itemprop="telephone"><a href="tel:<?php echo $this->escape(preg_replace('/[^0-9+]/', '', $item->telephone)); ?>"><?php echo $this->escape($item->telephone); ?></a></dd> <?php endif; ?> <?php if ($tparams->get('show_mobile') && $item->mobile) : ?> <dt><span uk-icon="icon: phone" class="uk-margin-small-right uk-text-muted"></span><?php echo Text::_('COM_CONTACT_MOBILE'); ?></dt> <dd itemprop="telephone"><a href="tel:<?php echo $this->escape(preg_replace('/[^0-9+]/', '', $item->mobile)); ?>"><?php echo $this->escape($item->mobile); ?></a></dd> <?php endif; ?> <?php if ($tparams->get('show_fax') && $item->fax) : ?> <dt><span uk-icon="icon: print" class="uk-margin-small-right uk-text-muted"></span><?php echo Text::_('COM_CONTACT_FAX'); ?></dt> <dd itemprop="faxNumber"><?php echo $this->escape($item->fax); ?></dd> <?php endif; ?> <?php if ($tparams->get('show_webpage') && $item->webpage) : ?> <?php $webpageUrl = $item->webpage; if (strpos($webpageUrl, 'http') !== 0) { $webpageUrl = 'http://' . $webpageUrl; } ?> <dt><span uk-icon="icon: world" class="uk-margin-small-right uk-text-muted"></span><?php echo Text::_('COM_CONTACT_FIELD_INFORMATION_WEBPAGE_LABEL'); ?></dt> <dd itemprop="url"><a href="<?php echo htmlspecialchars($webpageUrl, ENT_COMPAT, 'UTF-8'); ?>" target="_blank" rel="noopener nofollow"><?php echo $this->escape($item->webpage); ?></a></dd> <?php endif; ?>
                        </dl>
                    </div>
                <?php endif; ?>

            </div> <?php // end uk-grid ?>
        </div> <?php // end contact-details ?>
    <?php endif; ?>
    <?php // --- <<< КОНЕЦ: Блок Контактных Деталей >>> --- ?>


    <?php // --- Форма (без изменений) --- ?>
    <?php $show_form = $tparams->get('show_form'); ?> <?php if ($show_form) : ?> <?php $formData = ['contact' => $this->item, 'params' => $tparams, 'user' => $this->user, 'captchaEnabled' => $this->captchaEnabled ?? PluginHelper::isEnabled('captcha'), 'error' => $this->error ?? null]; ?> <div class="uk-margin-medium-bottom contact-form"> <?php echo '<h' . $subHeadingLevel . ' class="uk-h' . $subHeadingLevel . ' uk-heading-divider uk-margin-medium-bottom">' . Text::_('COM_CONTACT_FORM_LABEL') . '</h' . $subHeadingLevel . '>'; ?> <?php try { echo LayoutHelper::render('joomla.contact.form', $formData); } catch (\Exception $e) { Log::add('Error rendering contact form layout: ' . $e->getMessage(), Log::ERROR, 'layout-error'); echo '<p class="uk-text-danger">' . Text::_('COM_CONTACT_ERROR_FORM_LAYOUT') . '</p>'; } ?> </div> <?php endif; ?>


    <?php // --- Остальные блоки (Статьи, Ссылки, Профиль, Поля) (без изменений) --- ?>
    <?php /* ... Код для остальных loadTemplate или LayoutHelper::render ... */ ?>
    <?php $articles = $this->item->articles ?? []; $showArticles = $tparams->get('show_articles') && $item->user_id && !empty($articles); ?> <?php if ($showArticles) : ?> <div class="uk-margin-medium-bottom contact-articles"> <?php echo '<h' . $subHeadingLevel . ' class="uk-h' . $subHeadingLevel . ' uk-heading-divider uk-margin-medium-bottom">' . Text::_('JGLOBAL_ARTICLES') . '</h' . $subHeadingLevel . '>'; ?> <?php try { echo $this->loadTemplate('articles'); } catch (\Exception $e) { Log::add('Error loading articles template: ' . $e->getMessage(), Log::ERROR, 'template-load-error'); } ?> </div> <?php endif; ?> <?php if ($tparams->get('show_links')) : ?> <div class="uk-margin-medium-bottom contact-links"> <?php echo '<h' . $subHeadingLevel . ' class="uk-h' . $subHeadingLevel . ' uk-heading-divider uk-margin-medium-bottom">' . Text::_('COM_CONTACT_LINKS') . '</h' . $subHeadingLevel . '>'; ?> <?php try { echo $this->loadTemplate('links'); } catch (\Exception $e) { Log::add('Error loading links template: ' . $e->getMessage(), Log::ERROR, 'template-load-error'); } ?> </div> <?php endif; ?> <?php if ($tparams->get('show_profile') && $item->user_id && PluginHelper::isEnabled('user', 'profile')) : ?> <div class="uk-margin-medium-bottom contact-profile"> <?php echo '<h' . $subHeadingLevel . ' class="uk-h' . $subHeadingLevel . ' uk-heading-divider uk-margin-medium-bottom">' . Text::_('COM_CONTACT_PROFILE') . '</h' . $subHeadingLevel . '>'; ?> <?php try { echo $this->loadTemplate('profile'); } catch (\Exception $e) { Log::add('Error loading profile template: ' . $e->getMessage(), Log::ERROR, 'template-load-error'); } ?> </div> <?php endif; ?> <?php if (!empty($item->jcfields) && $tparams->get('show_contact_custom_fields')) : ?> <div class="uk-margin-medium-bottom contact-custom-fields"> <?php echo '<h' . $subHeadingLevel . ' class="uk-h' . $subHeadingLevel . ' uk-heading-divider uk-margin-medium-bottom">' . Text::_('COM_CONTACT_CONTACT_INFORMATION') . '</h' . $subHeadingLevel . '>'; ?> <?php echo LayoutHelper::render('joomla.content.fields', ['item' => $item, 'context' => 'com_contact.contact']); ?> </div> <?php endif; ?> <?php if ($tparams->get('show_user_custom_fields') && isset($this->contactUser) && $this->contactUser && !empty($this->contactUser->jcfields) && PluginHelper::isEnabled('user', 'profile')) : ?> <div class="uk-margin-medium-bottom contact-user-custom-fields"> <?php echo '<h' . $subHeadingLevel . ' class="uk-h' . $subHeadingLevel . ' uk-heading-divider uk-margin-medium-bottom">' . Text::_('COM_FIELDS_USER_DEFAULT_LABEL') . '</h' . $subHeadingLevel . '>'; ?> <?php try { echo $this->loadTemplate('user_custom_fields'); } catch (\Exception $e) { Log::add('Error loading user_custom_fields template: ' . $e->getMessage(), Log::ERROR, 'template-load-error'); } ?> </div> <?php endif; ?>


    <?php echo $item->event->afterDisplayContent ?? ''; ?>

</div> <?php // end uk-article ?>
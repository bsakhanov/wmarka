<?php
/**
 * WMARKA — страница контакта: фото, должность, адрес и средства связи,
 * форма обратной связи, ссылки, материалы, профиль, доп. информация.
 * Передаёт SEO-движку узел Person (имя, должность, телефон, фото).
 *
 * @var \Joomla\Component\Contact\Site\View\Contact\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Helper\ContentHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\CMS\Router\Route;
use Joomla\Component\Contact\Site\Helper\RouteHelper;
use Wmarka\Template\Image;
use Wmarka\Template\Seo;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$item    = $this->item;
$tparams = $item->params;
$canDo   = ContentHelper::getActions('com_contact', 'category', $item->catid);
$canEdit = $canDo->get('core.edit') || ($canDo->get('core.edit.own') && $item->created_by === $this->getCurrentUser()->id);
$htag    = $tparams->get('show_page_heading') ? 'h2' : 'h1';
$photo   = ($item->image && $tparams->get('show_image')) ? Image::thumb($item->image, 'avatar', false) : [];

Seo::page(['description' => strip_tags((string) $item->misc), 'image' => (string) $item->image]);
Seo::addNode(array_filter([
    '@type'     => 'Person',
    'name'      => $item->name,
    'jobTitle'  => $item->con_position ?: null,
    'telephone' => $item->telephone ?: null,
    'image'     => $photo ? Image::og($item->image) : null,
]));
?>
<div class="com-contact contact" itemscope itemtype="https://schema.org/Person">
    <?php if ($tparams->get('show_page_heading')) : ?>
        <h1 class="uk-heading-small"><?php echo $this->escape($tparams->get('page_heading')); ?></h1>
    <?php endif; ?>

    <div class="uk-grid-large" uk-grid>
        <?php if ($photo) : ?>
            <div class="uk-width-1-4@m">
                <?php echo Image::img($photo, $item->name, ['class' => 'uk-border-circle uk-width-small uk-width-1-1@m', 'itemprop' => 'image', 'loading' => 'eager']); ?>
            </div>
        <?php endif; ?>

        <div class="uk-width-expand@m">
            <?php if ($item->name && $tparams->get('show_name')) : ?>
                <<?php echo $htag; ?> class="<?php echo $htag === 'h1' ? 'uk-heading-small' : 'uk-h2'; ?> uk-margin-remove-bottom" itemprop="name"><?php echo $this->escape($item->name); ?></<?php echo $htag; ?>>
                <?php if ($item->published == 0) : ?>
                    <span class="uk-label uk-label-warning"><?php echo Text::_('JUNPUBLISHED'); ?></span>
                <?php endif; ?>
            <?php endif; ?>

            <?php if ($item->con_position && $tparams->get('show_position')) : ?>
                <p class="uk-text-lead uk-margin-small-top" itemprop="jobTitle"><?php echo $this->escape($item->con_position); ?></p>
            <?php endif; ?>

            <?php if ($canEdit) : ?>
                <div class="uk-margin-small"><?php echo Ui::bridge((string) HTMLHelper::_('contacticon.edit', $item, $tparams)); ?></div>
            <?php endif; ?>

            <?php $showCat = $tparams->get('show_contact_category'); ?>
            <?php if ($showCat === 'show_no_link') : ?>
                <p class="uk-article-meta"><?php echo $this->escape($item->category_title); ?></p>
            <?php elseif ($showCat === 'show_with_link') : ?>
                <p class="uk-article-meta"><a class="uk-link-muted" href="<?php echo Route::_(RouteHelper::getCategoryRoute($item->catid, $item->language)); ?>"><?php echo $this->escape($item->category_title); ?></a></p>
            <?php endif; ?>

            <?php echo $item->event->afterDisplayTitle; ?>

            <?php if ($tparams->get('show_contact_list') && \count($this->contacts) > 1) : ?>
                <form action="#" method="get" name="selectForm" id="selectForm" class="uk-margin">
                    <label class="uk-form-label" for="select_contact"><?php echo Text::_('COM_CONTACT_SELECT_CONTACT'); ?></label>
                    <?php echo HTMLHelper::_('select.genericlist', $this->contacts, 'select_contact', 'class="uk-select uk-form-width-large" onchange="document.location.href = this.value"', 'link', 'name', $item->link); ?>
                </form>
            <?php endif; ?>

            <?php if ($tparams->get('show_tags', 1) && !empty($item->tags->itemTags)) : ?>
                <?php echo LayoutHelper::render('joomla.content.tags', $item->tags->itemTags); ?>
            <?php endif; ?>

            <?php echo $item->event->beforeDisplayContent; ?>

            <?php if ($this->params->get('show_info', 1)) : ?>
                <div class="uk-margin-medium-top">
                    <?php echo $this->loadTemplate('address'); ?>
                    <?php if ($tparams->get('allow_vcard')) : ?>
                        <p class="uk-text-small">
                            <?php echo Text::_('COM_CONTACT_DOWNLOAD_INFORMATION_AS'); ?>
                            <a href="<?php echo Route::_('index.php?option=com_contact&view=contact&catid=' . $item->catslug . '&id=' . $item->slug . '&format=vcf'); ?>"><?php echo Text::_('COM_CONTACT_VCARD'); ?></a>
                        </p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if ($item->misc && $tparams->get('show_misc')) : ?>
                <div class="uk-margin-medium-top" itemprop="description"><?php echo $item->misc; ?></div>
            <?php endif; ?>
        </div>
    </div>

    <?php if ($tparams->get('show_email_form') && ($item->email_to || $item->user_id)) : ?>
        <section class="uk-margin-large-top">
            <h2 class="uk-h3"><?php echo Text::_('COM_CONTACT_EMAIL_FORM'); ?></h2>
            <?php echo $this->loadTemplate('form'); ?>
        </section>
    <?php endif; ?>

    <?php if ($tparams->get('show_links')) : ?>
        <?php echo $this->loadTemplate('links'); ?>
    <?php endif; ?>

    <?php if ($tparams->get('show_articles') && $item->user_id && $item->articles) : ?>
        <section class="uk-margin-large-top">
            <h2 class="uk-h3"><?php echo Text::_('JGLOBAL_ARTICLES'); ?></h2>
            <?php echo $this->loadTemplate('articles'); ?>
        </section>
    <?php endif; ?>

    <?php if ($tparams->get('show_profile') && $item->user_id && PluginHelper::isEnabled('user', 'profile')) : ?>
        <section class="uk-margin-large-top">
            <h2 class="uk-h3"><?php echo Text::_('COM_CONTACT_PROFILE'); ?></h2>
            <?php echo $this->loadTemplate('profile'); ?>
        </section>
    <?php endif; ?>

    <?php if ($tparams->get('show_user_custom_fields') && $this->contactUser) : ?>
        <?php echo $this->loadTemplate('user_custom_fields'); ?>
    <?php endif; ?>

    <?php echo $item->event->afterDisplayContent; ?>
</div>

<?php
/**
 * WMARKA — страница метки: заголовок, картинка и описание метки, затем
 * материалы карточками (сетка / список / масонри — опции WMARKA пункта меню).
 * Работает и без пункта меню: любая новая метка выглядит так же.
 *
 * @var \Joomla\Component\Tags\Site\View\Tag\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Wmarka\Template\Image;
use Wmarka\Template\Seo;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$htag   = $this->params->get('show_page_heading') ? 'h2' : 'h1';
$single = \count($this->item) === 1;
$tag    = $single ? $this->item[0] : null;
$images = $tag ? (json_decode((string) $tag->images, true) ?: []) : [];
$image  = ($single && $this->params->get('tag_list_show_tag_image', 1)) ? Image::thumb($images['image_fulltext'] ?? ($images['image_intro'] ?? ''), 'full', false) : [];

Seo::page([
    'description' => $tag ? strip_tags((string) $tag->description) : '',
    'image'       => $images['image_intro'] ?? ($images['image_fulltext'] ?? ''),
]);
?>
<div class="com-tags-tag tag-category" itemscope itemtype="https://schema.org/CollectionPage">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1 class="uk-heading-small"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
    <?php endif; ?>

    <?php if ($this->params->get('show_tag_title', 1)) : ?>
        <<?php echo $htag; ?> class="<?php echo $htag === 'h1' ? 'uk-heading-small' : 'uk-h2'; ?>" itemprop="name">
            <?php echo HTMLHelper::_('content.prepare', Ui::quotes($this->tags_title), '', 'com_tags.tag'); ?>
        </<?php echo $htag; ?>>
    <?php endif; ?>

    <?php if ($image || ($single && $this->params->get('tag_list_show_tag_description', 1) && $tag->description)) : ?>
        <div class="uk-grid-medium uk-margin-medium-bottom" uk-grid>
            <?php if ($image) : ?>
                <div class="uk-width-1-3@m"><?php echo Image::img($image, (string) ($images['image_fulltext_alt'] ?? ''), ['class' => 'uk-width-1-1']); ?></div>
            <?php endif; ?>
            <?php if ($single && $this->params->get('tag_list_show_tag_description', 1) && $tag->description) : ?>
                <div class="uk-width-expand@m uk-text-lead" itemprop="description"><?php echo HTMLHelper::_('content.prepare', $tag->description, '', 'com_tags.tag'); ?></div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if ($this->params->get('show_description_image', 1) == 1 && $this->params->get('tag_list_image')) : ?>
        <?php echo \Joomla\CMS\HTML\HTMLHelper::_('image', $this->params->get('tag_list_image'), $this->params->get('tag_list_image_alt_empty') ? '' : (string) $this->params->get('tag_list_image_alt'), ['class' => 'uk-margin-bottom']); ?>
    <?php endif; ?>
    <?php if ($this->params->get('tag_list_description', '') > '') : ?>
        <div class="uk-margin-medium-bottom"><?php echo HTMLHelper::_('content.prepare', $this->params->get('tag_list_description'), '', 'com_tags.tag'); ?></div>
    <?php endif; ?>

    <?php echo $this->loadTemplate('items'); ?>

    <?php if (($this->params->def('show_pagination', 1) == 1 || $this->params->get('show_pagination') == 2) && $this->pagination->pagesTotal > 1) : ?>
        <?php echo $this->pagination->getPagesLinks(); ?>
        <?php if ($this->params->def('show_pagination_results', 1)) : ?>
            <p class="uk-text-meta uk-text-center"><?php echo $this->pagination->getPagesCounter(); ?></p>
        <?php endif; ?>
    <?php endif; ?>
</div>

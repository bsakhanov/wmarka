<?php
/**
 * WMARKA — избранные материалы (та же сетка и карточки, что в блоге).
 *
 * @var \Joomla\Component\Content\Site\View\Featured\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Wmarka\Template\Config;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$view    = $this->params->get('wm_view', Config::str('blog_view', 'grid')) === 'list' ? 'list' : 'grid';
$switch  = (bool) $this->params->get('wm_switch', 1);
$cols    = max(1, min(6, (int) $this->params->get('num_columns', 3) ?: 3));
$masonry = (bool) $this->params->get('wm_masonry', 0);
$gutter  = Ui::gutter((string) $this->params->get('wm_gutter', 'medium'));
$card    = [
    'style'   => $this->params->get('wm_card', 'default'),
    'hover'   => (bool) $this->params->get('wm_hover', 1),
    'heading' => $this->params->get('show_page_heading') ? 'h2' : 'h2',
    'media'   => $this->params->get('wm_media', 'top') === 'alternate' ? 'left' : $this->params->get('wm_media', 'top'),
    'limit'   => Ui::introLimit($this->params),
    'sizes'   => \Wmarka\Template\Image::sizes($cols),
];
?>
<div class="com-content-featured blog-featured" itemscope itemtype="https://schema.org/Blog">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1 class="uk-heading-small"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
    <?php endif; ?>

    <?php if (empty($this->lead_items) && empty($this->intro_items) && empty($this->link_items) && $this->params->get('show_no_articles', 1)) : ?>
        <div class="uk-alert-primary" uk-alert><p><?php echo Text::_('COM_CONTENT_NO_ARTICLES'); ?></p></div>
    <?php endif; ?>

    <?php if (!empty($this->lead_items)) : ?>
        <div class="uk-child-width-1-1 uk-margin-medium-bottom <?php echo $this->params->get('blog_class_leading'); ?>" uk-grid>
            <?php $this->wmCard = ['view' => 'list', 'media' => 'left', 'switch' => false, 'limit' => $this->params->get('wm_lead_full', 0) ? 0 : $card['limit'], 'sizes' => \Wmarka\Template\Image::sizes(0)] + $card; ?>
            <?php foreach ($this->lead_items as $wmI => &$item) : ?>
                <?php $this->wmCard['media'] = ($this->params->get('wm_media') === 'alternate' && $wmI % 2) || $this->params->get('wm_media') === 'right' ? 'right' : 'left'; ?>
                <div><?php $this->item = &$item; echo $this->loadTemplate('item'); ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($this->intro_items)) : ?>
        <?php $this->wmCard = ['view' => $view, 'switch' => $switch] + $card; ?>
        <div data-wm-switch="featured" data-wm-view="<?php echo $view; ?>">
            <?php if ($switch) : ?>
                <div class="uk-flex uk-flex-right uk-margin-small-bottom"><?php echo Ui::viewSwitch($view); ?></div>
            <?php endif; ?>
            <div <?php echo Ui::switchAttr($view, Ui::columns($cols), 'uk-child-width-1-1', $gutter . ($masonry ? '' : ' uk-grid-match') . ' ' . $this->params->get('blog_class', '')); ?> uk-grid<?php echo $masonry ? '="masonry: pack"' : ''; ?>>
                <?php foreach (array_values($this->intro_items) as $wmI => &$item) : ?>
                    <?php if ($this->params->get('wm_media') === 'alternate') { $this->wmCard['media'] = $wmI % 2 ? 'right' : 'left'; } ?>
                    <div><?php $this->item = &$item; echo $this->loadTemplate('item'); ?></div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($this->link_items)) : ?>
        <div class="uk-margin-medium-top"><?php echo $this->loadTemplate('links'); ?></div>
    <?php endif; ?>

    <?php if ($this->params->def('show_pagination', 2) == 1 || ($this->params->get('show_pagination') == 2 && $this->pagination->pagesTotal > 1)) : ?>
        <?php echo $this->pagination->getPagesLinks(); ?>
        <?php if ($this->params->def('show_pagination_results', 1)) : ?>
            <p class="uk-text-meta uk-text-center"><?php echo $this->pagination->getPagesCounter(); ?></p>
        <?php endif; ?>
    <?php endif; ?>
</div>

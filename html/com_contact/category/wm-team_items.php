<?php
/**
 * WMARKA — контакты категории: фильтр, лимит, карточки (сетка/список), пагинация.
 *
 * @var \Joomla\Component\Contact\Site\View\Category\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Contact\Administrator\Helper\ContactHelper;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$this->getDocument()->getWebAssetManager()->useScript('com_contact.contacts-list')->useScript('core');

$canDo   = ContactHelper::getActions('com_contact', 'category', $this->category->id);
$userId  = $this->getCurrentUser()->id;
$view    = $this->params->get('wm_view', $this->getLayout() === 'wm-team' ? 'grid' : 'list') === 'grid' ? 'grid' : 'list';
$switch  = (bool) $this->params->get('wm_switch', 1);
$cols    = max(1, min(6, (int) $this->params->get('wm_columns', 4)));
$grid    = 'uk-child-width-1-2@s uk-child-width-1-' . $cols . '@m';
?>
<form action="<?php echo htmlspecialchars(Uri::getInstance()->toString(), ENT_QUOTES, 'UTF-8'); ?>" method="post" name="adminForm" id="adminForm">
    <?php echo \Joomla\CMS\Layout\LayoutHelper::render('wmarka.filterbar', [
        'search'    => $this->params->get('filter_field') ? ['name' => 'filter-search', 'value' => (string) $this->state->get('list.filter'), 'label' => Text::_('COM_CONTACT_FILTER_SEARCH_DESC')] : null,
        'buttons'   => true,
        'limit'     => $this->params->get('show_pagination_limit') ? $this->pagination->getLimitBox() : null,
        'switch'    => ($switch && !empty($this->items)) ? $view : null,
        'switchKey' => 'contacts-' . (int) $this->category->id,
    ]); ?>

    <?php if (empty($this->items)) : ?>
        <?php if ($this->params->get('show_no_contacts', 1)) : ?>
            <div class="uk-alert-primary" uk-alert><p><?php echo Text::_('COM_CONTACT_NO_CONTACTS'); ?></p></div>
        <?php endif; ?>
    <?php else : ?>
        <div data-wm-switch="contacts-<?php echo (int) $this->category->id; ?>" data-wm-view="<?php echo $view; ?>">
            <div <?php echo Ui::switchAttr($view, $grid, 'uk-child-width-1-1 uk-child-width-1-2@m', 'uk-grid-small uk-grid-match'); ?> uk-grid>
                <?php foreach ($this->items as $item) : ?>
                    <div>
                        <?php echo LayoutHelper::render('wmarka.contact', ['item' => $item, 'params' => $this->params, 'view' => $view, 'switch' => $switch, 'photo' => $this->getLayout() === 'wm-team']); ?>
                        <?php if ($canDo->get('core.edit') || ($canDo->get('core.edit.own') && $item->created_by === $userId)) : ?>
                            <div class="uk-margin-small"><?php echo Ui::bridge((string) HTMLHelper::_('contacticon.edit', $item, $this->params)); ?></div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($canDo->get('core.create')) : ?>
        <div class="uk-margin"><?php echo Ui::bridge((string) HTMLHelper::_('contacticon.create', $this->category, $this->category->params)); ?></div>
    <?php endif; ?>

    <?php if ($this->params->get('show_pagination', 2) && $this->pagination->pagesTotal > 1) : ?>
        <?php echo $this->pagination->getPagesLinks(); ?>
        <?php if ($this->params->def('show_pagination_results', 1)) : ?>
            <p class="uk-text-meta uk-text-center"><?php echo $this->pagination->getPagesCounter(); ?></p>
        <?php endif; ?>
    <?php endif; ?>

    <input type="hidden" name="filter_order" value="<?php echo $this->escape($this->state->get('list.ordering')); ?>">
    <input type="hidden" name="filter_order_Dir" value="<?php echo $this->escape($this->state->get('list.direction')); ?>">
</form>

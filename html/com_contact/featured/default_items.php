<?php
/**
 * WMARKA — карточки избранных контактов.
 *
 * @var \Joomla\Component\Contact\Site\View\Featured\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;

if (empty($this->items)) : ?>
    <div class="uk-alert-primary" uk-alert><p><?php echo Text::_('COM_CONTACT_NO_CONTACTS'); ?></p></div>
<?php return; endif; ?>
<form action="<?php echo htmlspecialchars(\Joomla\CMS\Uri\Uri::getInstance()->toString(), ENT_QUOTES, 'UTF-8'); ?>" method="post" name="adminForm" id="adminForm">
    <?php echo LayoutHelper::render('wmarka.filterbar', [
        'search'  => $this->params->get('filter_field') ? ['name' => 'filter-search', 'value' => (string) $this->state->get('list.filter'), 'label' => Text::_('COM_CONTACT_FILTER_SEARCH_DESC')] : null,
        'buttons' => true,
        'limit'   => $this->params->get('show_pagination_limit') ? $this->pagination->getLimitBox() : null,
    ]); ?>
    <input type="hidden" name="filter_order" value="<?php echo $this->escape($this->state->get('list.ordering')); ?>">
    <input type="hidden" name="filter_order_Dir" value="<?php echo $this->escape($this->state->get('list.direction')); ?>">
</form>
<div class="uk-grid-small uk-child-width-1-2@s uk-child-width-1-4@m uk-grid-match" uk-grid>
    <?php foreach ($this->items as $item) : ?>
        <div><?php echo LayoutHelper::render('wmarka.contact', ['item' => $item, 'params' => $this->params, 'view' => 'grid', 'photo' => true]); ?></div>
    <?php endforeach; ?>
</div>

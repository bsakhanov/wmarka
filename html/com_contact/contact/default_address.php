<?php
/**
 * WMARKA — адрес и средства связи контакта (uk-list с иконками UIkit).
 *
 * @var \Joomla\Component\Contact\Site\View\Contact\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\String\PunycodeHelper;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$item  = $this->item;
$p     = $this->params;
$rows  = [];

if ($p->get('address_check') > 0) {
    $parts = [];

    foreach (['address' => 'show_street_address', 'suburb' => 'show_suburb', 'state' => 'show_state', 'postcode' => 'show_postcode', 'country' => 'show_country'] as $field => $flag) {
        if ($item->$field && $p->get($flag)) {
            $parts[] = $field === 'address' ? nl2br($this->escape($item->$field), false) : $this->escape($item->$field);
        }
    }

    if ($parts) {
        $rows[] = ['location', Text::_('COM_CONTACT_ADDRESS'), '<span itemprop="address">' . implode(', ', $parts) . '</span>'];
    }
}

if ($item->email_to && $p->get('show_email')) {
    $rows[] = ['mail', Text::_('JGLOBAL_EMAIL'), $item->email_to];
}

if ($item->telephone && $p->get('show_telephone')) {
    $rows[] = ['receiver', Text::_('COM_CONTACT_TELEPHONE'), '<a href="tel:' . preg_replace('/[^\d+]/', '', $item->telephone) . '" itemprop="telephone">' . $this->escape($item->telephone) . '</a>'];
}

if ($item->mobile && $p->get('show_mobile')) {
    $rows[] = ['phone', Text::_('COM_CONTACT_MOBILE'), '<a href="tel:' . preg_replace('/[^\d+]/', '', $item->mobile) . '">' . $this->escape($item->mobile) . '</a>'];
}

if ($item->fax && $p->get('show_fax')) {
    $rows[] = ['print', Text::_('COM_CONTACT_FAX'), $this->escape($item->fax)];
}

if ($item->webpage && $p->get('show_webpage')) {
    $url    = $this->escape($item->webpage);
    $rows[] = ['world', Text::_('COM_CONTACT_WEBPAGE'), '<a href="' . $url . '" target="_blank" rel="noopener noreferrer" itemprop="url">' . $this->escape(PunycodeHelper::urlToUTF8($item->webpage)) . '</a>'];
}

if (!$rows) {
    return;
}
?>
<?php $mode = (int) $p->get('contact_icons', 0); ?>
<ul class="uk-list uk-list-large">
    <?php foreach ($rows as [$icon, $label, $value]) : ?>
        <li class="uk-flex uk-flex-top">
            <?php if ($mode === 0) : ?>
                <?php $marker = (string) $p->get('marker_' . ['location' => 'address', 'mail' => 'email', 'receiver' => 'telephone', 'phone' => 'mobile', 'print' => 'fax', 'world' => 'webpage'][$icon], ''); ?>
                <?php echo $marker !== '' ? '<span class="uk-margin-small-right">' . $marker . '</span>' : Ui::icon($icon, 1.0, 'uk-margin-small-right uk-text-muted'); ?>
            <?php endif; ?>
            <div><span class="<?php echo $mode === 1 ? 'uk-text-muted ' . $p->get('marker_class', '') : 'uk-hidden-visually'; ?>"><?php echo $label; ?>: </span><?php echo $value; ?></div>
        </li>
    <?php endforeach; ?>
</ul>

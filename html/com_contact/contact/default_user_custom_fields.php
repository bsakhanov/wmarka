<?php
/**
 * WMARKA — пользовательские поля пользователя контакта, сгруппированные.
 *
 * @var \Joomla\Component\Contact\Site\View\Contact\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

$display = $this->item->params->get('show_user_custom_fields');

if (!$display || !$this->contactUser) {
    return;
}

$groups = [];

foreach ($this->contactUser->jcfields as $field) {
    if ($field->value && (\in_array('-1', $display) || \in_array($field->group_id, $display))) {
        $groups[$field->group_title][] = $field;
    }
}

foreach ($groups as $title => $fields) : ?>
    <section class="uk-margin-large-top">
        <h3 class="uk-h4"><?php echo $title ?: Text::_('COM_CONTACT_USER_FIELDS'); ?></h3>
        <dl class="uk-description-list uk-description-list-divider">
            <?php foreach ($fields as $field) : ?>
                <?php if ($field->params->get('showlabel')) : ?><dt><?php echo Text::_($field->label); ?></dt><?php endif; ?>
                <dd><?php echo $field->value; ?></dd>
            <?php endforeach; ?>
        </dl>
    </section>
<?php endforeach;

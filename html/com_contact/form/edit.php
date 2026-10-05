<?php
/**
 * WMARKA — фронтенд-редактирование контакта (все наборы полей формы).
 *
 * @var \Joomla\Component\Contact\Site\View\Form\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

$this->getDocument()->getWebAssetManager()->useScript('keepalive')->useScript('form.validate');
?>
<div class="edit contact-edit">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1 class="uk-heading-small"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
    <?php endif; ?>
    <form action="<?php echo Route::_('index.php?option=com_contact&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate uk-form-stacked">
        <?php foreach ($this->form->getFieldsets() as $fieldset) : ?>
            <?php $fields = $this->form->getFieldset($fieldset->name); ?>
            <?php if (!\count($fields)) { continue; } ?>
            <fieldset class="uk-fieldset uk-margin-medium-bottom">
                <?php if (!empty($fieldset->label)) : ?><legend class="uk-legend uk-h4"><?php echo Text::_($fieldset->label); ?></legend><?php endif; ?>
                <?php foreach ($fields as $field) : ?>
                    <?php echo $field->renderField(); ?>
                <?php endforeach; ?>
            </fieldset>
        <?php endforeach; ?>
        <div class="uk-margin-medium-top">
            <button type="button" class="uk-button uk-button-primary" onclick="Joomla.submitbutton('contact.save')"><?php echo Text::_('JSAVE'); ?></button>
            <button type="button" class="uk-button uk-button-default" onclick="Joomla.submitbutton('contact.cancel')"><?php echo Text::_('JCANCEL'); ?></button>
        </div>
        <input type="hidden" name="return" value="<?php echo $this->return_page; ?>">
        <input type="hidden" name="task" value="">
        <?php echo HTMLHelper::_('form.token'); ?>
    </form>
</div>

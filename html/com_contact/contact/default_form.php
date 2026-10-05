<?php
/**
 * WMARKA — форма обратной связи контакта (UIkit, штатная валидация Joomla).
 *
 * @var \Joomla\Component\Contact\Site\View\Contact\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

$this->getDocument()->getWebAssetManager()->useScript('keepalive')->useScript('form.validate');
?>
<form id="contact-form" action="<?php echo Route::_('index.php'); ?>" method="post" class="form-validate uk-form-stacked uk-width-xlarge@m">
    <?php foreach ($this->form->getFieldsets() as $fieldset) : ?>
        <?php if ($fieldset->name === 'captcha' && $this->captchaEnabled) : ?>
            <?php continue; ?>
        <?php endif; ?>
        <?php $fields = $this->form->getFieldset($fieldset->name); ?>
        <?php if (\count($fields)) : ?>
            <fieldset class="uk-fieldset">
                <?php if (isset($fieldset->label) && ($legend = trim(Text::_($fieldset->label))) !== '') : ?>
                    <legend class="uk-legend uk-h4"><?php echo $legend; ?></legend>
                <?php endif; ?>
                <?php foreach ($fields as $field) : ?>
                    <?php echo $field->renderField(); ?>
                <?php endforeach; ?>
            </fieldset>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php if ($this->captchaEnabled) : ?>
        <?php echo $this->form->renderFieldset('captcha'); ?>
    <?php endif; ?>
    <div class="uk-margin">
        <button class="uk-button uk-button-primary validate" type="submit"><?php echo Text::_('COM_CONTACT_CONTACT_SEND'); ?></button>
        <input type="hidden" name="option" value="com_contact">
        <input type="hidden" name="task" value="contact.submit">
        <input type="hidden" name="return" value="<?php echo $this->return_page; ?>">
        <input type="hidden" name="id" value="<?php echo $this->item->slug; ?>">
        <?php echo HTMLHelper::_('form.token'); ?>
    </div>
</form>

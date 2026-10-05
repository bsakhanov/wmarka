<?php
/**
 * WMARKA — редактирование профиля: наборы полей карточками, сохранение / отмена.
 *
 * @var \Joomla\Component\Users\Site\View\Profile\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

$this->getDocument()->getWebAssetManager()->useScript('keepalive')->useScript('form.validate');
?>
<div class="com-users-profile__edit">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1 class="uk-heading-small"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
    <?php endif; ?>
    <form id="member-profile" action="<?php echo Route::_('index.php'); ?>" method="post" class="form-validate uk-form-stacked" enctype="multipart/form-data">
        <?php foreach ($this->form->getFieldsets() as $group => $fieldset) : ?>
            <?php $fields = $this->form->getFieldset($group); ?>
            <?php if (!\count($fields)) { continue; } ?>
            <fieldset class="uk-fieldset uk-card uk-card-default uk-card-body uk-margin">
                <?php if (!empty($fieldset->label)) : ?><legend class="uk-legend uk-h4"><?php echo Text::_($fieldset->label); ?></legend><?php endif; ?>
                <?php if (!empty($fieldset->description)) : ?><p class="uk-text-meta"><?php echo Text::_($fieldset->description); ?></p><?php endif; ?>
                <?php foreach ($fields as $field) : ?>
                    <?php echo $field->renderField(); ?>
                <?php endforeach; ?>
            </fieldset>
        <?php endforeach; ?>
        <?php if (!empty($this->mfaConfigurationUI)) : ?>
            <fieldset class="uk-fieldset uk-card uk-card-default uk-card-body uk-margin"><?php echo $this->mfaConfigurationUI; ?></fieldset>
        <?php endif; ?>
        <div class="uk-margin-medium-top">
            <button type="submit" class="uk-button uk-button-primary validate" name="task" value="profile.save"><?php echo Text::_('JSAVE'); ?></button>
            <button type="submit" class="uk-button uk-button-default" name="task" value="profile.cancel" formnovalidate><?php echo Text::_('JCANCEL'); ?></button>
        </div>
        <input type="hidden" name="option" value="com_users">
        <?php echo HTMLHelper::_('form.token'); ?>
    </form>
</div>

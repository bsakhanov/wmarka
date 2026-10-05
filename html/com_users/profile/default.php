<?php
/**
 * WMARKA — профиль пользователя: основные данные, поля плагинов и
 * пользовательские поля списком описаний UIkit, кнопка «Изменить».
 *
 * @var \Joomla\Component\Users\Site\View\Profile\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
?>
<div class="com-users-profile">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1 class="uk-heading-small"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
    <?php endif; ?>

    <?php if ($this->getCurrentUser()->id == $this->data->id) : ?>
        <a class="uk-button uk-button-default uk-button-small uk-margin-bottom" href="<?php echo Route::_('index.php?option=com_users&task=profile.edit&user_id=' . (int) $this->data->id); ?>"><span uk-icon="icon: pencil; ratio: 0.8"></span> <?php echo Text::_('COM_USERS_EDIT_PROFILE'); ?></a>
    <?php endif; ?>

    <?php foreach ($this->form->getFieldsets() as $group => $fieldset) : ?>
        <?php $fields = $this->form->getFieldset($group); ?>
        <?php if (!\count($fields)) { continue; } ?>
        <section class="uk-card uk-card-default uk-card-body uk-margin">
            <?php if (!empty($fieldset->label)) : ?><h2 class="uk-card-title"><?php echo Text::_($fieldset->label); ?></h2><?php endif; ?>
            <dl class="uk-description-list uk-description-list-divider">
                <?php foreach ($fields as $field) : ?>
                    <?php if ($field->hidden || $field->type === 'Spacer') { continue; } ?>
                    <?php $value = $field->value; ?>
                    <?php if ($value === '' || $value === null || $value === []) { continue; } ?>
                    <dt><?php echo $field->title; ?></dt>
                    <dd><?php echo \is_array($value) ? $this->escape(implode(', ', $value)) : ($field->fieldname === 'password1' || $field->fieldname === 'password2' ? '••••••' : $this->escape((string) $value)); ?></dd>
                <?php endforeach; ?>
            </dl>
        </section>
    <?php endforeach; ?>
</div>

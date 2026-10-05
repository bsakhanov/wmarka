<?php
/**
 * WMARKA — общий вывод форм com_users (регистрация, напоминание, сброс):
 * карточка по центру, наборы полей ядра, капча, кнопка.
 *
 * @var \Joomla\CMS\MVC\View\HtmlView $this
 * @var string $wmAction   маршрут формы
 * @var string $wmId       id формы
 * @var string $wmButton   ключ языковой строки кнопки
 * @var string $wmTask     задача (если нужна скрытым полем)
 * @var bool   $wmMultipart
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

$this->getDocument()->getWebAssetManager()->useScript('keepalive')->useScript('form.validate');
?>
<div class="uk-flex uk-flex-center">
    <div class="uk-card uk-card-default uk-card-body uk-width-large@s uk-width-1-1">
        <?php if ($this->params->get('show_page_heading')) : ?>
            <h1 class="uk-h2"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
        <?php endif; ?>
        <form id="<?php echo $wmId; ?>" action="<?php echo Route::_($wmAction); ?>" method="post" class="form-validate uk-form-stacked"<?php echo !empty($wmMultipart) ? ' enctype="multipart/form-data"' : ''; ?>>
            <?php foreach ($this->form->getFieldsets() as $fieldset) : ?>
                <?php if ($fieldset->name === 'captcha' && !empty($this->captchaEnabled)) { continue; } ?>
                <?php $fields = $this->form->getFieldset($fieldset->name); ?>
                <?php if (!\count($fields)) { continue; } ?>
                <fieldset class="uk-fieldset">
                    <?php if (!empty($fieldset->label)) : ?><legend class="uk-legend uk-h4"><?php echo Text::_($fieldset->label); ?></legend><?php endif; ?>
                    <?php if (!empty($fieldset->description)) : ?><p class="uk-text-meta"><?php echo Text::_($fieldset->description); ?></p><?php endif; ?>
                    <?php echo $this->form->renderFieldset($fieldset->name); ?>
                </fieldset>
            <?php endforeach; ?>
            <?php if (!empty($this->captchaEnabled)) : ?>
                <?php echo $this->form->renderFieldset('captcha'); ?>
            <?php endif; ?>
            <div class="uk-margin">
                <button type="submit" class="uk-button uk-button-primary uk-width-1-1 validate"><?php echo Text::_($wmButton); ?></button>
            </div>
            <?php if (!empty($wmTask)) : ?>
                <input type="hidden" name="option" value="com_users">
                <input type="hidden" name="task" value="<?php echo $wmTask; ?>">
            <?php endif; ?>
            <?php echo method_exists($this->form, 'renderControlFields') ? $this->form->renderControlFields() : HTMLHelper::_('form.token'); ?>
        </form>
    </div>
</div>

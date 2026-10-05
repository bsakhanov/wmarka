<?php
/**
 * WMARKA — форма входа: карточка по центру, поля ядра (renderfield UIkit),
 * «Запомнить меня», Passkeys/WebAuthn, ссылки восстановления и регистрации.
 *
 * @var \Joomla\Component\Users\Site\View\Login\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\CMS\Router\Route;

$this->getDocument()->getWebAssetManager()->useScript('keepalive')->useScript('form.validate');

$config  = ComponentHelper::getParams('com_users');
$regLink = 'index.php?option=com_users&view=registration';

if (($menuId = $this->params->get('customRegLinkMenu')) && Factory::getApplication()->getMenu()->getItem($menuId)) {
    $regLink = 'index.php?Itemid=' . $menuId;
}
?>
<div class="uk-flex uk-flex-center">
    <div class="uk-card uk-card-default uk-card-body uk-width-large@s uk-width-1-1">
        <?php if ($this->params->get('show_page_heading')) : ?>
            <h1 class="uk-h2"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
        <?php endif; ?>

        <?php if ($this->params->get('logindescription_show') == 1 && trim((string) $this->params->get('login_description', ''))) : ?>
            <div class="uk-text-meta uk-margin"><?php echo $this->params->get('login_description'); ?></div>
        <?php endif; ?>
        <?php if ($this->params->get('login_image') != '') : ?>
            <?php echo HTMLHelper::_('image', $this->params->get('login_image'), $this->params->get('login_image_alt_empty') ? '' : (string) $this->params->get('login_image_alt'), ['class' => 'uk-margin uk-width-1-1']); ?>
        <?php endif; ?>

        <form action="<?php echo Route::_('index.php?task=user.login'); ?>" method="post" id="com-users-login__form" class="form-validate uk-form-stacked">
            <fieldset class="uk-fieldset">
                <?php echo $this->form->renderFieldset('credentials'); ?>

                <?php if (PluginHelper::isEnabled('system', 'remember')) : ?>
                    <div class="uk-margin-small">
                        <label class="uk-text-small"><input class="uk-checkbox uk-margin-xsmall-right" id="remember" type="checkbox" name="remember" value="yes"> <?php echo Text::_('COM_USERS_LOGIN_REMEMBER_ME'); ?></label>
                    </div>
                <?php endif; ?>

                <?php foreach ($this->extraButtons as $button) : ?>
                    <?php $data = array_filter(array_keys($button), static fn ($key) => str_starts_with((string) $key, 'data-')); ?>
                    <div class="uk-margin-small">
                        <button type="button" class="uk-button uk-button-default uk-width-1-1 <?php echo $button['class'] ?? ''; ?>"
                            <?php foreach ($data as $key) : ?> <?php echo $key; ?>="<?php echo $button[$key]; ?>"<?php endforeach; ?>
                            <?php echo !empty($button['onclick']) ? ' onclick="' . $button['onclick'] . '"' : ''; ?>
                            title="<?php echo Text::_($button['label']); ?>" id="<?php echo $button['id']; ?>">
                            <?php if (!empty($button['svg'])) : ?><span class="uk-margin-xsmall-right" style="display: inline-block; width: 20px; height: 20px"><?php echo $button['svg']; ?></span><?php endif; ?>
                            <?php echo Text::_($button['label']); ?>
                        </button>
                    </div>
                <?php endforeach; ?>

                <div class="uk-margin">
                    <button type="submit" class="uk-button uk-button-primary uk-width-1-1"><?php echo Text::_('JLOGIN'); ?></button>
                </div>
                <?php echo $this->form->renderControlFields(); ?>
            </fieldset>
        </form>

        <ul class="uk-list uk-text-small uk-margin-remove-bottom">
            <li><a href="<?php echo Route::_('index.php?option=com_users&view=reset'); ?>"><?php echo Text::_('COM_USERS_LOGIN_RESET'); ?></a></li>
            <li><a href="<?php echo Route::_('index.php?option=com_users&view=remind'); ?>"><?php echo Text::_('COM_USERS_LOGIN_REMIND'); ?></a></li>
            <?php if ($config->get('allowUserRegistration')) : ?>
                <li><a href="<?php echo Route::_($regLink); ?>"><?php echo Text::_('COM_USERS_LOGIN_REGISTER'); ?></a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>

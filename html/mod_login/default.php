<?php
/**
 * WMARKA — модуль входа: uk-form-stacked, поля с иконками, показ пароля,
 * кнопки Passkeys/WebAuthn ($extraButtons), ссылки восстановления и регистрации.
 *
 * @var \Joomla\Registry\Registry $params
 * @var object $module
 * @var string $return
 * @var array  $extraButtons
 * @var string $registerLink
 * @var \Joomla\CMS\Application\SiteApplication $app
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\CMS\Router\Route;

$app->getDocument()->getWebAssetManager()->useScript('core')->useScript('keepalive');
$id = (int) $module->id;
?>
<form id="login-form-<?php echo $id; ?>" class="uk-form-stacked" action="<?php echo Route::_('index.php', true); ?>" method="post">
    <?php if ($params->get('pretext')) : ?><p class="uk-text-small"><?php echo $params->get('pretext'); ?></p><?php endif; ?>

    <div class="uk-margin-small">
        <label class="<?php echo $params->get('usetext', 0) ? 'uk-form-label' : 'uk-hidden-visually'; ?>" for="modlgn-username-<?php echo $id; ?>"><?php echo Text::_('MOD_LOGIN_VALUE_USERNAME'); ?></label>
        <div class="uk-inline uk-width-1-1">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input id="modlgn-username-<?php echo $id; ?>" type="text" name="username" class="uk-input" autocomplete="username" placeholder="<?php echo Text::_('MOD_LOGIN_VALUE_USERNAME'); ?>" required>
        </div>
    </div>

    <div class="uk-margin-small">
        <label class="<?php echo $params->get('usetext', 0) ? 'uk-form-label' : 'uk-hidden-visually'; ?>" for="modlgn-passwd-<?php echo $id; ?>"><?php echo Text::_('JGLOBAL_PASSWORD'); ?></label>
        <div class="uk-inline uk-width-1-1">
            <span class="uk-form-icon" uk-icon="icon: lock"></span>
            <a class="uk-form-icon uk-form-icon-flip" href="#" uk-icon="icon: eye" data-wm-password="#modlgn-passwd-<?php echo $id; ?>" aria-label="<?php echo Text::_('JSHOWPASSWORD'); ?>"></a>
            <input id="modlgn-passwd-<?php echo $id; ?>" type="password" name="password" class="uk-input" autocomplete="current-password" placeholder="<?php echo Text::_('JGLOBAL_PASSWORD'); ?>" required>
        </div>
    </div>

    <?php if (PluginHelper::isEnabled('system', 'remember')) : ?>
        <div class="uk-margin-small">
            <label class="uk-text-small"><input type="checkbox" name="remember" class="uk-checkbox uk-margin-xsmall-right" value="yes"> <?php echo Text::_('MOD_LOGIN_REMEMBER_ME'); ?></label>
        </div>
    <?php endif; ?>

    <?php foreach ($extraButtons as $button) : ?>
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

    <div class="uk-margin-small">
        <button type="submit" name="Submit" class="uk-button uk-button-primary uk-width-1-1"><?php echo Text::_('JLOGIN'); ?></button>
    </div>

    <ul class="uk-list uk-text-small uk-margin-small">
        <li><a href="<?php echo Route::_('index.php?option=com_users&view=reset'); ?>"><?php echo Text::_('MOD_LOGIN_FORGOT_YOUR_PASSWORD'); ?></a></li>
        <li><a href="<?php echo Route::_('index.php?option=com_users&view=remind'); ?>"><?php echo Text::_('MOD_LOGIN_FORGOT_YOUR_USERNAME'); ?></a></li>
        <?php if (ComponentHelper::getParams('com_users')->get('allowUserRegistration')) : ?>
            <li><a href="<?php echo Route::_($registerLink); ?>"><?php echo Text::_('MOD_LOGIN_REGISTER'); ?></a></li>
        <?php endif; ?>
    </ul>

    <input type="hidden" name="option" value="com_users">
    <input type="hidden" name="task" value="user.login">
    <input type="hidden" name="return" value="<?php echo $return; ?>">
    <?php echo HTMLHelper::_('form.token'); ?>

    <?php if ($params->get('posttext')) : ?><p class="uk-text-small"><?php echo $params->get('posttext'); ?></p><?php endif; ?>
</form>

<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_login
 * @version     WMARKA ULTRA (UIkit 3 Login Form)
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
$wa = $this->getDocument()->getWebAssetManager();
$wa->useScript('keepalive'); // Поддержка сессии
?>

<div class="login-module-container">
    <form action="<?php echo Route::_('index.php', true); ?>" method="post" id="login-form-<?php echo $module->id; ?>" class="uk-form-stacked" itemscope itemtype="https://schema.org/LoginForm">

        <?php if ($params->get('pretext')) : ?>
            <div class="uk-margin-small-bottom uk-text-meta">
                <?php echo $params->get('pretext'); ?>
            </div>
        <?php endif; ?>

        <div class="uk-margin-small">
            <div class="uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: user; ratio: 0.9"></span>
                <input id="modlgn-username-<?php echo $module->id; ?>" type="text" name="username" class="uk-input uk-border-rounded" placeholder="<?php echo Text::_('MOD_LOGIN_VALUE_USERNAME'); ?>" required>
            </div>
        </div>

        <div class="uk-margin-small">
            <div class="uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: lock; ratio: 0.9"></span>
                <input id="modlgn-passwd-<?php echo $module->id; ?>" type="password" name="password" class="uk-input uk-border-rounded" placeholder="<?php echo Text::_('MOD_LOGIN_VALUE_PASSWORD'); ?>" required>
            </div>
        </div>

        <?php if (Joomla\CMS\Component\ComponentHelper::getParams('com_users')->get('remember_me_link')) : ?>
            <div class="uk-margin-small">
                <label class="uk-text-small">
                    <input class="uk-checkbox" type="checkbox" name="remember" value="yes"> <?php echo Text::_('MOD_LOGIN_COLUMN_REMEMBER'); ?>
                </label>
            </div>
        <?php endif; ?>

        <div class="uk-margin-small">
            <button type="submit" name="Submit" class="uk-button uk-button-primary uk-width-1-1 uk-border-rounded">
                <?php echo Text::_('JLOGIN'); ?>
            </button>
        </div>

        <ul class="uk-list uk-margin-remove-bottom uk-text-xsmall uk-text-center">
            <li>
                <a href="<?php echo Route::_('index.php?option=com_users&view=reset'); ?>" class="uk-link-muted">
                    <?php echo Text::_('MOD_LOGIN_FORGOT_YOUR_PASSWORD'); ?>
                </a>
            </li>
            <li>
                <a href="<?php echo Route::_('index.php?option=com_users&view=remind'); ?>" class="uk-link-muted">
                    <?php echo Text::_('MOD_LOGIN_FORGOT_YOUR_USERNAME'); ?>
                </a>
            </li>
            <?php $usersConfig = Joomla\CMS\Component\ComponentHelper::getParams('com_users'); ?>
            <?php if ($usersConfig->get('allowUserRegistration')) : ?>
                <li class="uk-margin-small-top">
                    <a href="<?php echo Route::_('index.php?option=com_users&view=registration'); ?>" class="uk-button uk-button-text uk-text-primary uk-text-bold">
                        <?php echo Text::_('MOD_LOGIN_REGISTER'); ?>
                    </a>
                </li>
            <?php endif; ?>
        </ul>

        <input type="hidden" name="option" value="com_users">
        <input type="hidden" name="task" value="user.login">
        <input type="hidden" name="return" value="<?php echo $return; ?>">
        <?php echo HTMLHelper::_('form.token'); ?>
    </form>
</div>

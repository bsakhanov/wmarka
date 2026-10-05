<?php
/**
 * WMARKA — модуль входа для вошедшего пользователя: приветствие, профиль, выход.
 *
 * @var \Joomla\Registry\Registry $params
 * @var object $module
 * @var object $user
 * @var string $return
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
?>
<form class="uk-form-stacked" action="<?php echo Route::_('index.php', true); ?>" method="post" id="login-form-<?php echo (int) $module->id; ?>">
    <?php if ($params->get('greeting', 1)) : ?>
        <p class="uk-margin-small"><?php echo Text::sprintf('MOD_LOGIN_HINAME', htmlspecialchars($params->get('name', 0) ? $user->username : $user->name, ENT_COMPAT, 'UTF-8')); ?></p>
    <?php endif; ?>
    <?php if ($params->get('profilelink', 0)) : ?>
        <p class="uk-margin-small"><a href="<?php echo Route::_('index.php?option=com_users&view=profile'); ?>"><?php echo Text::_('MOD_LOGIN_PROFILE'); ?></a></p>
    <?php endif; ?>
    <button type="submit" name="Submit" class="uk-button uk-button-default uk-width-1-1"><?php echo Text::_('JLOGOUT'); ?></button>
    <input type="hidden" name="option" value="com_users">
    <input type="hidden" name="task" value="user.logout">
    <input type="hidden" name="return" value="<?php echo $return; ?>">
    <?php echo HTMLHelper::_('form.token'); ?>
</form>

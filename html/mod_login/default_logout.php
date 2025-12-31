<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_login
 * @version     WMARKA ULTRA (UIkit 3 Logout View)
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

$user = Joomla\CMS\Factory::getApplication()->getIdentity();
?>

<div class="login-status-container uk-text-center" itemscope itemtype="https://schema.org/Person">
    
    <div class="uk-margin-small-bottom">
        <span uk-icon="icon: user; ratio: 2" class="uk-text-muted"></span>
    </div>

    <div class="uk-text-lead uk-text-bold" itemprop="name">
        <?php echo Text::sprintf('MOD_LOGIN_HINAME', htmlspecialchars($user->get('name'), ENT_QUOTES, 'UTF-8')); ?>
    </div>

    <?php if ($params->get('posttext')) : ?>
        <div class="uk-margin-small uk-text-meta">
            <?php echo $params->get('posttext'); ?>
        </div>
    <?php endif; ?>

    <form action="<?php echo Route::_('index.php', true); ?>" method="post" id="login-form-<?php echo $module->id; ?>">
        <div class="uk-margin-top">
            <button type="submit" name="Submit" class="uk-button uk-button-danger uk-button-small uk-border-rounded">
                <span uk-icon="icon: sign-out; ratio: 0.8" class="uk-margin-small-right"></span>
                <?php echo Text::_('JLOGOUT'); ?>
            </button>
        </div>
        
        <input type="hidden" name="option" value="com_users">
        <input type="hidden" name="task" value="user.logout">
        <input type="hidden" name="return" value="<?php echo $return; ?>">
        <?php echo HTMLHelper::_('form.token'); ?>
    </form>
</div>

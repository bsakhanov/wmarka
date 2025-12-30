<?php
/**
 * Страница "Сайт оффлайн" для шаблона Wmarka
 * Joomla 6 + UIkit 3 + PHP 8.4
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;

// Инициализация хелпера шаблона
require_once dirname(__FILE__) . '/php/init.php';

/** @var \Wmarka\Template\Helper $tpl */
$app             = Factory::getApplication();
$doc             = $app->getDocument();
$sitename        = $app->get('sitename');
$offline_image   = $app->get('offline_image');
$offline_message = $app->get('offline_message');
$display_msg     = $app->get('display_offline_message', 1);

// Проверка поддержки MFA (Multi-Factor Authentication) для Joomla 6
// Мы проверяем наличие поля 'secretkey' в сессии или через плагины
$twofactor = $app->get('tfamethods', []); // Упрощенный доступ к методам в J6
?>

<!DOCTYPE html>
<?php echo $tpl->renderHTML(); ?>
<head>
    <jdoc:include type="head" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="<?php echo $tpl->getBodyClasses(); ?> uk-flex uk-flex-middle uk-flex-center uk-background-muted" 
      style="min-height: 100vh;" id="page-offline">

    <div class="uk-width-1-1 uk-width-large@s uk-padding-large">
        <div class="uk-card uk-card-default uk-card-body uk-box-shadow-large uk-border-rounded uk-text-center">
            
            <?php /* 1. БРЕНДИНГ */ ?>
            <div class="uk-margin-medium-bottom">
                <div class="uk-logo uk-h3 uk-margin-remove uk-text-bold uk-text-uppercase">
                    <?php echo $sitename; ?>
                </div>

                <?php if ($offline_image && file_exists(JPATH_ROOT . '/' . $offline_image)) : ?>
                    <img class="uk-margin-medium-top uk-border-rounded" 
                         src="<?php echo Uri::root() . $offline_image; ?>" 
                         alt="<?php echo $sitename; ?>" 
                         uk-img loading="lazy">
                <?php endif; ?>
            </div>

            <?php /* 2. СООБЩЕНИЕ ОБ ОФФЛАЙНЕ */ ?>
            <div class="uk-margin-medium-bottom">
                <?php if ($display_msg == 1 && !empty(trim($offline_message))) : ?>
                    <div class="uk-text-lead uk-text-muted"><?php echo $offline_message; ?></div>
                <?php elseif ($display_msg == 2) : ?>
                    <div class="uk-text-lead uk-text-muted"><?php echo Text::_('JOFFLINE_MESSAGE'); ?></div>
                <?php endif; ?>
            </div>

            <hr class="uk-divider-small">

            <?php /* 3. ФОРМА ВХОДА ДЛЯ АДМИНИСТРАТОРА */ ?>
            <form action="<?php echo Route::_('index.php', true); ?>" method="post" id="form-login" class="uk-form-stacked uk-text-left">
                
                <div class="uk-margin-small">
                    <label class="uk-form-label" for="username"><?php echo Text::_('JGLOBAL_USERNAME'); ?></label>
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: user"></span>
                        <input class="uk-input uk-border-rounded" id="username" name="username" type="text" 
                               required placeholder="<?php echo Text::_('JGLOBAL_USERNAME'); ?>">
                    </div>
                </div>

                <div class="uk-margin-small">
                    <label class="uk-form-label" for="password"><?php echo Text::_('JGLOBAL_PASSWORD'); ?></label>
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                        <input class="uk-input uk-border-rounded" id="password" name="password" type="password" 
                               required placeholder="<?php echo Text::_('JGLOBAL_PASSWORD'); ?>">
                    </div>
                </div>

                <?php /* Поле для секретного ключа (MFA) */ ?>
                <?php if (!empty($twofactor)) : ?>
                    <div class="uk-margin-small">
                        <label class="uk-form-label" for="secretkey"><?php echo Text::_('JGLOBAL_SECRETKEY'); ?></label>
                        <div class="uk-inline uk-width-1-1">
                            <span class="uk-form-icon" uk-icon="icon: receiver"></span>
                            <input class="uk-input uk-border-rounded" id="secretkey" name="secretkey" type="text" 
                                   placeholder="<?php echo Text::_('JGLOBAL_SECRETKEY'); ?>">
                        </div>
                    </div>
                <?php endif; ?>

                <div class="uk-margin-top">
                    <button type="submit" name="Submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1 uk-border-rounded">
                        <?php echo Text::_('JLOGIN'); ?>
                    </button>
                </div>

                <input type="hidden" name="option" value="com_users">
                <input type="hidden" name="task" value="user.login">
                <input type="hidden" name="return" value="<?php echo base64_encode(Uri::base()); ?>">
                <?php echo HTMLHelper::_('form.token'); ?>
            </form>

        </div>
        
        <div class="uk-text-center uk-margin-top uk-text-meta">
            &copy; <?php echo date('Y'); ?> <?php echo $sitename; ?>
        </div>
    </div>

</body>
</html>

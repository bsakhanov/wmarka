<?php
defined('_JEXEC') or die;


// init $tpl helper
require dirname(__FILE__) . '/php/init.php';

// add CSS
$app = $tpl->app;

// check Joomla auth method
require_once JPATH_ADMINISTRATOR . '/components/com_users/helpers/users.php';
if (method_exists('UsersHelper','getTwoFactorMethods')) {
    $twoFactors = UsersHelper::getTwoFactorMethods();
}

?><?php echo $tpl->renderHTML(); ?>
<head>
    <jdoc:include type="head" />
</head>

<body class="<?php echo $tpl->getBodyClasses(); ?> uk-flex uk-flex-middle uk-flex-center" style="min-height:100vh"  id="page-offline">
    <div class="uk-panel">
        <div class="uk-container" style="max-width:400px;">
            <div class="uk-flex uk-flex-column uk-flex-middle uk-text-center">

                <div class="uk-logo"><?php echo Factory::getConfig()->get('sitename', $this->template); ?></div>

                <?php if ($app->get('offline_image') && file_exists($app->get('offline_image'))) { ?>
                <img class="uk-margin-medium-top" data-src="<?php echo $app->get('offline_image'); ?>" alt="<?php echo $sitename; ?>" data-uk-img loading="lazy">
                <?php } ?>

                <?php if ($app->get('display_offline_message', 1) == 1 && str_replace(' ', '', $app->get('offline_message')) !== '') { ?>
                <p class="uk-margin-medium"><?php echo $app->get('offline_message'); ?></p>
                <?php } elseif ($app->get('display_offline_message', 1) == 2) { ?>
                <p class="uk-margin-medium"><?php echo Text::_('JOFFLINE_MESSAGE'); ?></p>
                <?php } ?>

            </div>

            <form action="<?php echo Route::_('index.php', true); ?>" method="post" id="form-login">

                <input class="uk-input uk-margin-top uk-text-center" name="username" type="text" title="<?php echo Text::_('JGLOBAL_USERNAME'); ?>" placeholder="<?php echo Text::_('JGLOBAL_USERNAME'); ?>">

                <input class="uk-input uk-margin-top uk-text-center" type="password" name="password" id="password" title="<?php echo Text::_('JGLOBAL_PASSWORD'); ?>" placeholder="<?php echo Text::_('JGLOBAL_PASSWORD'); ?>">

                <?php if (count($twofactormethods) > 1) { ?>
                <input class="uk-input uk-margin-top" type="text" name="secretkey" id="secretkey" title="<?php echo Text::_('JGLOBAL_SECRETKEY'); ?>" placeholder="<?php echo Text::_('JGLOBAL_SECRETKEY'); ?>">
                <?php } ?>

                <input type="submit" name="Submit" class="uk-button uk-button-primary uk-margin-top uk-width" value="<?php echo Text::_('JLOGIN'); ?>">

                <input type="hidden" name="option" value="com_users">
                <input type="hidden" name="task" value="user.login">
                <input type="hidden" name="return" value="<?php echo base64_encode(Uri::base()); ?>">
                <?php echo HTMLHelper::_('form.token'); ?>
            </form>

        </div>
    </div>
</body>
</html>
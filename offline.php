<?php
/**
 * Страница "Сайт оффлайн" для шаблона Wmarka
 * Joomla 6 + UIkit 3
 */
declare(strict_types=1);

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;

require_once __DIR__ . '/php/init.php';

/** @var \Joomla\CMS\Document\HtmlDocument $this */
$app             = Factory::getApplication();
$sitename        = $app->get('sitename');
$offline_image   = $app->get('offline_image');
$offline_message = $app->get('offline_message');
$display_msg     = $app->get('display_offline_message', 1);
?>
<!DOCTYPE html>
<?php echo $tpl->renderHTML(); ?>
<head>
    <jdoc:include type="metas" />
    <jdoc:include type="styles" />
    <jdoc:include type="scripts" />
</head>

<body class="<?php echo $tpl->getBodyClasses(); ?> uk-flex uk-flex-middle uk-flex-center uk-background-muted" style="min-height: 100vh;">

    <div class="uk-width-1-1 uk-width-large@s uk-padding-large">
        <div class="uk-card uk-card-default uk-card-body uk-box-shadow-large uk-border-rounded uk-text-center">
            
            <div class="uk-margin-medium-bottom">
                <div class="uk-logo uk-h3 uk-margin-remove uk-text-bold uk-text-uppercase">
                    <?php echo htmlspecialchars((string) $sitename, ENT_QUOTES, 'UTF-8'); ?>
                </div>

                <?php if ($offline_image && is_file(JPATH_ROOT . '/' . $offline_image)) : ?>
                    <img class="uk-margin-medium-top uk-border-rounded" 
                         src="<?php echo Uri::root() . htmlspecialchars($offline_image, ENT_QUOTES, 'UTF-8'); ?>" 
                         alt="<?php echo htmlspecialchars((string) $sitename, ENT_QUOTES, 'UTF-8'); ?>" 
                         uk-img>
                <?php endif; ?>
            </div>

            <div class="uk-margin-medium-bottom">
                <?php if ($display_msg == 1 && !empty(trim((string)$offline_message))) : ?>
                    <div class="uk-text-lead uk-text-muted"><?php echo $offline_message; ?></div>
                <?php elseif ($display_msg == 2) : ?>
                    <div class="uk-text-lead uk-text-muted"><?php echo Text::_('JOFFLINE_MESSAGE'); ?></div>
                <?php endif; ?>
            </div>

            <hr class="uk-divider-small">

            <form action="<?php echo Route::_('index.php', true); ?>" method="post" class="uk-form-stacked uk-text-left">
                <div class="uk-margin-small">
                    <label class="uk-form-label" for="username"><?php echo Text::_('JGLOBAL_USERNAME'); ?></label>
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: user"></span>
                        <input class="uk-input uk-border-rounded" id="username" name="username" type="text" required>
                    </div>
                </div>

                <div class="uk-margin-small">
                    <label class="uk-form-label" for="password"><?php echo Text::_('JGLOBAL_PASSWORD'); ?></label>
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                        <input class="uk-input uk-border-rounded" id="password" name="password" type="password" required>
                    </div>
                </div>

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
    </div>
</body>
</html>
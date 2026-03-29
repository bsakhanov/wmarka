<?php
/**
 * Страница системных ошибок для шаблона Wmarka
 * Joomla 6 + UIkit 3
 */
declare(strict_types=1);

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Language\Text;

/** @var \Joomla\CMS\Document\ErrorDocument $this */

$app      = Factory::getApplication();
$config   = Factory::getConfig();
$sitename = $config->get('sitename', 'Wmarka');
$tplPath  = Uri::root(true) . '/media/templates/site/' . $this->template;

// Логика отображения отладки
$errorLevelStr = $config->get('error_reporting', 'default');
$isShowFile    = in_array($errorLevelStr, ['maximum', 'development'], true);
$isBacktrace   = ($errorLevelStr === 'development');

$errorCode = $this->error->getCode();
$errorMsg  = $this->error->getMessage();
$errorFile = str_replace(JPATH_ROOT, 'JROOT', $this->error->getFile());
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta charset="utf-8" />
    <title><?php echo $errorCode; ?> — <?php echo htmlspecialchars($errorMsg, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">

    <?php /* ФАВИКОНЫ */ ?>
    <link rel="icon" type="image/svg+xml" href="<?php echo $tplPath; ?>/images/logo.svg">

    <?php /* СТИЛИ И СКРИПТЫ (Аварийный режим без WebAssetManager) */ ?>
    <link rel="stylesheet" href="<?php echo $tplPath; ?>/css/uikit.min.css">
    <link rel="stylesheet" href="<?php echo $tplPath; ?>/css/user.css">
    <script src="<?php echo $tplPath; ?>/js/uikit.min.js" defer></script>
    <script src="<?php echo $tplPath; ?>/js/uikit-icons.min.js" defer></script>
</head>

<body class="uk-background-muted uk-flex uk-flex-column" style="min-height: 100vh;">

    <header class="uk-section uk-section-default uk-section-xsmall uk-box-shadow-small">
        <div class="uk-container">
            <div class="uk-flex uk-flex-middle uk-flex-between">
                <div class="uk-logo uk-h4 uk-margin-remove uk-text-bold uk-text-uppercase">
                    <?php echo htmlspecialchars($sitename, ENT_QUOTES, 'UTF-8'); ?>
                </div>
                <a href="<?php echo Uri::root(); ?>" class="uk-button uk-button-text">
                    <span uk-icon="home"></span> <?php echo Text::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>
                </a>
            </div>
        </div>
    </header>

    <main class="uk-section uk-section-large uk-flex-auto">
        <div class="uk-container uk-container-small">
            <div class="uk-card uk-card-default uk-card-body uk-box-shadow-xlarge uk-border-rounded uk-text-center">
                
                <h1 class="uk-heading-2xlarge uk-margin-remove uk-text-primary"><?php echo $errorCode; ?></h1>
                
                <p class="uk-h2 uk-margin-small-top uk-text-bold">
                    <?php echo ($errorCode == 404) ? Text::_('JERROR_LAYOUT_PAGE_NOT_FOUND') : Text::_('JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND'); ?>
                </p>

                <p class="uk-text-lead uk-text-muted">
                    <?php echo htmlspecialchars($errorMsg, ENT_QUOTES, 'UTF-8'); ?>
                </p>

                <?php if ($isShowFile) : ?>
                    <div class="uk-alert-danger uk-text-left uk-margin-top" uk-alert>
                        <p class="uk-text-bold uk-margin-remove"><?php echo Text::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></p>
                        <code class="uk-display-block uk-margin-small-top">
                            <?php echo htmlspecialchars($errorFile, ENT_QUOTES, 'UTF-8'); ?> : <?php echo $this->error->getLine(); ?>
                        </code>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($isBacktrace) : ?>
                <div class="uk-margin-large-top">
                    <div class="uk-card uk-card-secondary uk-card-body uk-border-rounded">
                        <h3 class="uk-card-title">Technical Details</h3>
                        <div class="uk-overflow-auto">
                            <?php echo $this->renderBacktrace(); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
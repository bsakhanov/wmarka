<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Language\Text;

$errorLevelStr = Factory::getConfig()->get('error_reporting', 'default');
$isShowFile = ($errorLevelStr === 'maximum') || ($errorLevelStr === 'development');
$isBacktrace = $errorLevelStr === 'development';

$errorCode = $this->error->getCode();
$errorFile = str_replace(JPATH_ROOT, 'JROOT', $this->error->getFile());
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta charset="utf-8" />
    <base href="<?php echo Uri::base(); ?>" />
    <title><?php echo $this->title; ?> — <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo Uri::base(true); ?>/media/templates/site/wmarka/images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo Uri::base(true); ?>/media/templates/site/wmarka/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo Uri::base(true); ?>/media/templates/site/wmarka/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo Uri::base(true); ?>/media/templates/site/wmarka/images/favicon/site.webmanifest">
	<link rel="mask-icon" href="<?php echo Uri::base(true); ?>/media/templates/site/wmarka/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="<?php echo Uri::base(true); ?>/media/templates/site/wmarka/images/favicon/favicon.ico">
	<meta name="msapplication-TileColor" content="#2d89ef">
	<meta name="msapplication-config" content="/media/templates/site/wmarka/images/favicon/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">	
    <link href="<?php echo Uri::base(true); ?>/media/templates/site/wmarka/css/uikit.min.css" rel="stylesheet" />
    <link href="<?php echo Uri::base(true); ?>/media/templates/site/wmarka/css/user.css" rel="stylesheet" />
	<script src="/media/templates/site/wmarka/js/uikit.min.js" defer=""></script>	
	<script src="/media/templates/site/wmarka/js/uikit-icons.min.js" defer=""></script>
</head>
<body>


    <header class="uk-section uk-section-default uk-section-small">
        <div class="uk-container">
            <div class="uk-logo"><?php echo Factory::getConfig()->get('sitename', $this->template); ?></div>
        </div>
    </header>


    <div class="uk-section uk-section-muted uk-padding-remove">
        <div class="uk-container">
            <div class="uk-navbar">
                <ul class="uk-navbar-nav">
                    <li><a href="<?php echo Uri::base(true) ?: '/'; ?>"><span uk-icon="home"></span>  <?php echo Text::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?></a></li>
                </ul>
            </div>
        </div>
    </div>


    <div class="uk-section uk-section-default">
        <div class="uk-container">
            <div>
                <h1><?php echo Text::_(($errorCode == 404 ? 'JERROR_LAYOUT_PAGE_NOT_FOUND' : 'JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND')); ?></h1>

                <div class="uk-margin-large-top"><?php echo Text::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></div>

                <div class="uk-h3"><?php echo $errorCode, ': ', htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></div>

                <?php if ($isShowFile) { ?>
                <div class="uk-h4 uk-margin-remove-top"><?php echo htmlspecialchars($errorFile, ENT_QUOTES, 'UTF-8'), ':', $this->error->getLine(); ?></div>
                <?php } ?>

                <?php if ($isBacktrace) { ?>
                <div class="uk-margin-large-top">
                    <?php
                    echo $this->renderBacktrace();
                    if ($this->error->getPrevious()) {
                        $loop = true;
                        $this->setError($this->_error->getPrevious());
                        while ($loop === true) {
                    ?>
                    <p><strong><?php echo Text::_('JERROR_LAYOUT_PREVIOUS_ERROR'); ?></strong></p>
                    <p><?php
                        echo
                            htmlspecialchars($this->_error->getMessage(), ENT_QUOTES, 'UTF-8'), '<br>',
                            htmlspecialchars($this->_error->getFile(), ENT_QUOTES, 'UTF-8'), ':', $this->_error->getLine();
                        ?></p>
                    <?php
                            echo $this->renderBacktrace();
                            $loop = $this->setError($this->_error->getPrevious());
                        }
                        $this->setError($this->error);
                    }
                    ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>


</body>
</html>

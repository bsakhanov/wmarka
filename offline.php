<?php
/**
 * WMARKA — сайт на обслуживании: сообщение и форма входа администратора.
 *
 * @var \Joomla\CMS\Document\HtmlDocument $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

require_once __DIR__ . '/php/autoload.php';

// Строки родителя wmarka: у дочернего шаблона своих языковых файлов нет
\Joomla\CMS\Factory::getApplication()->getLanguage()->load('tpl_wmarka', JPATH_BASE)
    || \Joomla\CMS\Factory::getApplication()->getLanguage()->load('tpl_wmarka', JPATH_THEMES . '/wmarka');

$app = Factory::getApplication();
(new \Wmarka\Template\Helper($this))->assets();
$this->setMetaData('viewport', 'width=device-width, initial-scale=1');
$message = $app->get('display_offline_message', 1) == 2 ? Text::_('JOFFLINE_MESSAGE') : $app->get('offline_message');
?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($this->language, ENT_QUOTES, 'UTF-8'); ?>" dir="<?php echo $this->direction; ?>">
<head>
    <jdoc:include type="metas" />
    <jdoc:include type="styles" />
    <jdoc:include type="scripts" />
</head>
<body class="uk-background-muted">
    <div class="uk-flex uk-flex-center uk-flex-middle" uk-height-viewport>
        <div class="uk-card uk-card-default uk-card-body uk-width-large@s uk-margin">
            <h1 class="uk-h3"><?php echo htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8'); ?></h1>
            <?php if ($app->get('display_offline_message', 1) && $message) : ?>
                <p class="uk-text-lead"><?php echo $message; ?></p>
            <?php endif; ?>
            <jdoc:include type="message" />
            <form action="<?php echo Route::_('index.php', true); ?>" method="post" class="uk-form-stacked">
                <div class="uk-margin-small"><input class="uk-input" name="username" type="text" autocomplete="username" placeholder="<?php echo Text::_('JGLOBAL_USERNAME'); ?>" aria-label="<?php echo Text::_('JGLOBAL_USERNAME'); ?>" required></div>
                <div class="uk-margin-small"><input class="uk-input" name="password" type="password" autocomplete="current-password" placeholder="<?php echo Text::_('JGLOBAL_PASSWORD'); ?>" aria-label="<?php echo Text::_('JGLOBAL_PASSWORD'); ?>" required></div>
                <button type="submit" class="uk-button uk-button-primary uk-width-1-1"><?php echo Text::_('JLOGIN'); ?></button>
                <input type="hidden" name="option" value="com_users">
                <input type="hidden" name="task" value="user.login">
                <input type="hidden" name="return" value="<?php echo base64_encode(\Joomla\CMS\Uri\Uri::base()); ?>">
                <?php echo HTMLHelper::_('form.token'); ?>
            </form>
        </div>
    </div>
</body>
</html>

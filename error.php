<?php
/**
 * WMARKA — страница ошибки (404, 403, 500): крупный код, пояснение, поиск,
 * ссылка на главную; меню навбара — если опубликовано.
 *
 * @var \Joomla\CMS\Document\ErrorDocument $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;

require_once __DIR__ . '/php/autoload.php';

// Строки родителя wmarka: у дочернего шаблона своих языковых файлов нет
\Joomla\CMS\Factory::getApplication()->getLanguage()->load('tpl_wmarka', JPATH_BASE)
    || \Joomla\CMS\Factory::getApplication()->getLanguage()->load('tpl_wmarka', JPATH_THEMES . '/wmarka');

$app  = Factory::getApplication();
$code = (int) $this->error->getCode();
$code = $code >= 400 && $code < 600 ? $code : 500;
$wa   = $this->getWebAssetManager();

foreach (['style' => ['template.wmarka.uikit', 'template.wmarka.nocaps', 'template.user'], 'script' => ['template.wmarka.uikit', 'template.wmarka.icons']] as $type => $names) {
    foreach ($names as $name) {
        if ($wa->getRegistry()->exists($type, $name)) {
            $type === 'style' ? $wa->useStyle($name) : $wa->useScript($name);
        }
    }
}

$this->setMetaData('viewport', 'width=device-width, initial-scale=1');
$this->setMetaData('robots', 'noindex, follow');
$this->setTitle($code . ' — ' . $app->get('sitename'));
?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($this->language, ENT_QUOTES, 'UTF-8'); ?>" dir="<?php echo $this->direction; ?>">
<head>
    <jdoc:include type="metas" />
    <jdoc:include type="styles" />
    <jdoc:include type="scripts" />
</head>
<body id="top" class="site-wmarka error-<?php echo $code; ?>">
    <?php if ($this->countModules('navbar-right') || $this->countModules('navbar-left')) : ?>
        <nav class="uk-navbar-container">
            <div class="uk-container">
                <div uk-navbar>
                    <div class="uk-navbar-left"><a class="uk-navbar-item uk-logo" href="<?php echo Uri::base(true); ?>/"><?php echo htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8'); ?></a><jdoc:include type="modules" name="navbar-left" style="navbar" /></div>
                    <div class="uk-navbar-right"><jdoc:include type="modules" name="navbar-right" style="navbar" /></div>
                </div>
            </div>
        </nav>
    <?php endif; ?>
    <main class="uk-section uk-section-large">
        <div class="uk-container uk-container-small uk-text-center">
            <p class="uk-heading-2xlarge uk-text-muted uk-margin-remove"><?php echo $code; ?></p>
            <h1 class="uk-h2 uk-margin-small-top"><?php echo $code === 404 ? Text::_('TPL_WMARKA_ERROR_TITLE') : htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></h1>
            <p class="uk-text-lead"><?php echo Text::_('TPL_WMARKA_ERROR_TEXT'); ?></p>
            <form class="uk-search uk-search-default uk-width-large@s uk-margin" action="<?php echo Route::_('index.php?option=com_finder&view=search'); ?>" method="get" role="search">
                <span uk-search-icon></span>
                <input class="uk-search-input" type="search" name="q" placeholder="<?php echo htmlspecialchars(Text::_('TPL_WMARKA_ERROR_SEARCH'), ENT_QUOTES, 'UTF-8'); ?>" aria-label="<?php echo htmlspecialchars(Text::_('TPL_WMARKA_ERROR_SEARCH'), ENT_QUOTES, 'UTF-8'); ?>">
            </form>
            <p><a class="uk-button uk-button-primary" href="<?php echo Uri::base(true); ?>/"><?php echo Text::_('TPL_WMARKA_ERROR_HOME'); ?></a></p>
            <?php if ($this->debug) : ?>
                <div class="uk-text-left uk-margin-large-top uk-text-small"><?php echo $this->renderBacktrace(); ?></div>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>

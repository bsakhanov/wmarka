<?php
defined('_JEXEC') or die;

// --- СТАТИЧЕСКИЙ ДОМЕН (если используется) ---
// define('STATIC_DOMAIN', 'https://static.bestnews.kz'); 

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Filesystem\Path;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Session\Session;

/** @var Joomla\CMS\Document\HtmlDocument $this */

// 1. Инициализация хелперов
require dirname(__FILE__) . '/php/init.php';

// 2. Подготовка путей и опций Joomla (для корректной работы JS)
$mediaPath = Uri::root(true) . '/media/templates/site/wmarka';
$rootFull  = Uri::root();
$baseFull  = Uri::base();

$scriptOptions = [
    "system.paths" => ["root" => "", "rootFull" => $rootFull, "base" => "", "baseFull" => $baseFull],
    "csrf.token"   => Session::getFormToken()
];
$jsonOptions = json_encode($scriptOptions);

// 3. Логика главной страницы
$isHome = (Uri::current() === Uri::base());
$option = Factory::getApplication()->input->get('option');
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <?php /* --- ЛАЙФХАК: Предзагрузка критических стилей --- */ ?>
    <link rel="preload" href="<?php echo $mediaPath; ?>/css/uikit.min.css" as="style">
    <link rel="preload" href="<?php echo $mediaPath; ?>/css/user.css" as="style">

    <jdoc:include type="metas" />

    <?php /* --- Настройки Joomla для JS --- */ ?>
    <script type="application/json" class="joomla-script-options new">
        <?php echo $jsonOptions; ?>
    </script>

    <?php /* --- Подключение основных стилей --- */ ?>
    <link rel="stylesheet" href="<?php echo $mediaPath; ?>/css/uikit.min.css">
    <link rel="stylesheet" href="<?php echo $mediaPath; ?>/css/user.css">

    <?php /* --- ЛАЙФХАК: Асинхронная загрузка шрифтов (без блокировки рендеринга) --- */ ?>
    <link rel="stylesheet" href="<?php echo $mediaPath; ?>/css/fonts.css" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="<?php echo $mediaPath; ?>/css/fonts.css"></noscript>

    <jdoc:include type="styles" />

    <?php /* --- ЛАЙФХАК: Системные скрипты только для поиска com_finder --- */ ?>
    <?php if ($option === 'com_finder') : ?>
        <jdoc:include type="scripts" />
    <?php endif; ?>

    <?php /* --- Основные скрипты шаблона (Deferred) --- */ ?>
    <script src="<?php echo $mediaPath; ?>/js/uikit.min.js" defer></script>
    <script src="<?php echo $mediaPath; ?>/js/uikit-icons.min.js" defer></script>
</head>

<body class="<?php echo $tpl->getBodyClasses(); ?>">
 
    <?php 
    // Верхние секции
    echo $tpl->partial('toolbar.php');
    echo $tpl->partial('navbar.php');

    // Хлебные крошки (скрываем на главной)
    if (!$isHome) {
        echo $tpl->partial('breadcrumb.php');
    }

    // Блоки модулей (набор секций для гибкости)
    echo $tpl->partial('block-a.php');
    echo $tpl->partial('block-b.php');

    // ОСНОВНОЙ КОНТЕНТ (скрываем на главной)
    if (!$isHome) {
        echo $tpl->partial('content.php');
    }

    // Секции для сборки лендинга на главной
    echo $tpl->partial('slider.php');
    echo $tpl->partial('block-c.php');
    echo $tpl->partial('block-d.php');
    echo $tpl->partial('block-e.php');

    // Футер
    echo $tpl->partial('footer.php');
    ?>
 
    <?php /* --- Кнопка Вверх --- */ ?>
    <a class="uk-icon uk-totop uk-position-fixed uk-position-bottom-left uk-margin-small-left uk-margin-small-bottom" 
       uk-totop uk-scroll href="#section-toolbar" aria-label="Up"></a>

    <?php if ($this->countModules('debug')) : ?>
        <jdoc:include type="modules" name="debug" style="none" />
    <?php endif; ?>

    <?php echo $tpl->partial('counters.php'); ?>

</body>
</html>

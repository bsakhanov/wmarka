<?php
/**
 * @package     Joomla.Site
 * @subpackage  Template.wmarka
 * @version     3.0.0 (Joomla 6 & UIkit 3)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Filesystem\Path;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Session\Session;

/** @var Joomla\CMS\Document\HtmlDocument $this */

// 1. Инициализация логики, автозагрузчика и SEO
require_once __DIR__ . '/php/init.php';

// 2. Переменные окружения для шаблона
$isHome = (Uri::current() === Uri::base());
$option = Factory::getApplication()->input->get('option');
$mediaPath = Uri::root(true) . '/media/templates/site/' . $this->template;
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <?php /* --- Предзагрузка критических стилей (PageSpeed Hack) --- */ ?>
    <link rel="preload" href="<?php echo $mediaPath; ?>/css/uikit.min.css" as="style">
    <link rel="preload" href="<?php echo $mediaPath; ?>/css/user.css" as="style">

    <?php /* --- Системный вывод Joomla (Meta, Title, CSS, JS от WebAssetManager) --- */ ?>
    <jdoc:include type="metas" />
    <jdoc:include type="styles" />
    <jdoc:include type="scripts" />
</head>

<body class="<?php echo $tpl->getBodyClasses(); ?>">
 
    <?php 
    // ВЕРХНИЕ СЕКЦИИ
    echo $tpl->partial('toolbar.php');
    echo $tpl->partial('navbar.php');

    // ХЛЕБНЫЕ КРОШКИ (скрываем на главной)
    if (!$isHome) {
        echo $tpl->partial('breadcrumb.php');
    }

    // БЛОКИ ПОЗИЦИЙ (A, B)
    echo $tpl->partial('block-a.php');
    echo $tpl->partial('block-b.php');

    // ОСНОВНОЙ КОНТЕНТ (скрываем на главной)
    if (!$isHome) {
        echo $tpl->partial('content.php');
    }

    // ЛЕНДИНГ-БЛОКИ ДЛЯ ГЛАВНОЙ (опционально)
    if ($isHome) {
        echo $tpl->partial('slider.php');
        echo $tpl->partial('block-c.php');
        echo $tpl->partial('block-d.php');
        echo $tpl->partial('block-e.php');
    }

    // ФУТЕР
    echo $tpl->partial('footer.php');
    ?>
 
    <?php /* --- Кнопка "Наверх" (UIkit) --- */ ?>
    <a class="uk-icon uk-totop uk-position-fixed uk-position-bottom-left uk-margin-small-left uk-margin-small-bottom" 
       uk-totop uk-scroll href="#section-toolbar" aria-label="Up"></a>

    <?php /* --- Системная отладка --- */ ?>
    <?php if ($this->countModules('debug')) : ?>
        <jdoc:include type="modules" name="debug" style="none" />
    <?php endif; ?>

    <?php /* --- Метрики и счетчики --- */ ?>
    <?php echo $tpl->partial('counters.php'); ?>

</body>
</html>
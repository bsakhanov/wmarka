<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.wmarka
 * @copyright   (C) 2016–2026 Webmarka, Beibit Sakhanov
 * @license     GNU General Public License version 2 or later
 *
 * Каркас страницы: только порядок партиалов. Логика — в php/, блоки — в partial/.
 *
 * @var \Joomla\CMS\Document\HtmlDocument $this
 */

\defined('_JEXEC') or die;

use Wmarka\Template\Config;

require __DIR__ . '/php/init.php';
?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($this->language, ENT_QUOTES, 'UTF-8'); ?>" dir="<?php echo $this->direction; ?>">
<head>
    <jdoc:include type="metas" />
    <jdoc:include type="styles" />
    <jdoc:include type="scripts" />
    <!-- wmarka <?php echo Config::VERSION; ?> · build <?php echo Config::BUILD; ?> -->
<?php echo $tpl->code('head'); ?>
</head>
<body id="top" class="<?php echo $tpl->bodyClass(); ?>">
<?php echo $tpl->code('body_start'); ?>
<?php echo $tpl->partial('toolbar'); ?>
<?php echo $tpl->partial('header'); ?>
<?php echo $tpl->partial('breadcrumb'); ?>
<?php echo $tpl->partial('top'); ?>
<?php echo $tpl->partial('main'); ?>
<?php echo $tpl->partial('bottom'); ?>
<?php echo $tpl->partial('footer'); ?>
<?php echo $tpl->partial('offcanvas'); ?>
<?php echo $tpl->partial('search'); ?>
<?php echo $tpl->partial('totop'); ?>
<?php if ($this->countModules('debug')) : ?>
    <jdoc:include type="modules" name="debug" style="none" />
<?php endif; ?>
<?php echo $tpl->partial('counters'); ?>
</body>
</html>

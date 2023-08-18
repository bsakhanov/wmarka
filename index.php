<?php
defined('_JEXEC') or die;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Filesystem\Path;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
// init $tpl helper
require dirname(__FILE__) . '/php/init.php';
$wa    = $this->getWebAssetManager();

// Enable assets

/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
 
 
// Or multiple
$wa->useStyle('uikit.min');
$wa->useStyle('user');
$wa->useScript('uikit.min');
$wa->useScript('uikit-icons.min');
$wa->useScript('wmarka-icons-min');
?>


<?php echo $tpl->renderHTML();  ?>

<head>
    <jdoc:include type="metas" />
    <jdoc:include type="styles" />
    <jdoc:include type="scripts" />
</head>
<body class="<?php echo $tpl->getBodyClasses(); ?>">
 
<?php echo $tpl->partial('toolbar.php');?>
<?php echo $tpl->partial('headbar.php');?> 
<?php echo $tpl->partial('navbar.php');?> 
<?php echo $tpl->partial('breadcrumb.php');?>  
<?php echo $tpl->partial('block-a.php');?> 
<?php echo $tpl->partial('content.php');?>
<?php if ($tpl->isError()) : ?>
<jdoc:include type="message" />
<?php endif; ?>
<?php echo $tpl->partial('slider.php');?>
<?php echo $tpl->partial('block-b.php');?>
<?php echo $tpl->partial('block-c.php');?>
<?php echo $tpl->partial('block-d.php');?>
<?php echo $tpl->partial('block-e.php');?>
<?php echo $tpl->partial('block-f.php');?>
<?php echo $tpl->partial('block-g.php');?>
<?php echo $tpl->partial('block-h.php');?>
<?php echo $tpl->partial('block-i.php');?>
<?php echo $tpl->partial('block-k.php');?>
<?php echo $tpl->partial('footer.php');?>
 
<a class="uk-padding-small uk-position-bottom-left uk-position-fixed uk-icon uk-totop" data-uk-totop data-uk-scroll aria-label="Up" href="#section-toolbar">
  </a>
 

<?php if ($this->countModules('debug')) { ?>
<jdoc:include type="modules" name="debug" style="none" />
<?php } ?>
<?php echo $tpl->partial('counters.php');?>

</body>
 
</html>

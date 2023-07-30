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

?><?php echo $tpl->renderHTML(); 

 ?>

<head>
<jdoc:include type="head" />
	<?php echo $tpl->partial('critical-css.php');?>
	<?php echo $tpl->partial('critical-js.php');?>
<!-- extlinks -->  

<!-- /extlinks -->	
 
</head>
<body class="<?php echo $tpl->getBodyClasses(); ?>">
<?php echo $tpl->partial('adver-top.php');?>
<?php echo $tpl->partial('toolbar.php');?>
<?php echo $tpl->partial('headbar.php');?> 
<?php echo $tpl->partial('navbar.php');?> 

<div hidden>
 <?php echo $tpl->partial('breadcrumb.php');?>  
  </div>

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
<div class="uk-visible@m">
<?php echo $tpl->partial('block-i.php');?>
</div>
<?php echo $tpl->partial('partners.php');?>

<?php echo $tpl->partial('block-k.php');?>

<?php echo $tpl->partial('footer.php');?>
<a class="uk-padding-small uk-position-bottom-left uk-position-fixed" data-uk-totop data-uk-scroll aria-label="Up" name="Up"></a>

<?php if ($this->countModules('debug')) { ?>
<jdoc:include type="modules" name="debug" style="none" />
<?php } ?>
<?php echo $tpl->partial('counters1.php');?>

</body>
 
</html>
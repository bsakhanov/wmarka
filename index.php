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
  <script charset="UTF-8" src="//web.webpushs.com/js/push/83562f2d1e34da4f80053f6dc0dfebe9_1.js" async></script>

          <meta name="yandex-verification" content="d9a2cb517741123b" />
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
  <div class="uk-visibles">  
<?php echo $tpl->partial('block-ee.php');?>
    </div>
<?php echo $tpl->partial('block-g.php');?>
<?php echo $tpl->partial('block-es.php');?> 
<?php echo $tpl->partial('block-e-3.php');?>
<div class="uk-visibles">
<?php echo $tpl->partial('block-i.php');?>
</div>
<?php echo $tpl->partial('block-pr.php');?>
<?php echo $tpl->partial('block-hokkey.php');?>
<?php echo $tpl->partial('block-e-4.php');?>
<div class="uk-visibles">  
<?php echo $tpl->partial('block-women.php');?>
  </div>
<?php echo $tpl->partial('block-f.php');?>


<?php echo $tpl->partial('content2.php');?>



<?php echo $tpl->partial('partners.php');?>

<?php echo $tpl->partial('block-k.php');?>

<?php echo $tpl->partial('footer.php');?> 
 

<?php if ($this->countModules('debug')) { ?>
<jdoc:include type="modules" name="debug" style="none" />
<?php } ?> 
<?php echo $tpl->partial('counters1.php');?>

</body>
 
</html>
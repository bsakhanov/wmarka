<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.master3lite
 * @copyright   Copyright (C) Aleksey A. Morozov. All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

defined('_JEXEC') or die;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Filesystem\Path;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;

/* === Menu options === */

// check offcanvas
$isOffcanvas = $_this->countModules('offcanvas') > 0;

// ckeck menu in 'navbar-left' position

JLoader::register('JUImage',  JPATH_LIBRARIES . '/juimage/JUImage.php');

$juImg = new JUImage();
?>
<?php

$thumb = $juImg->render('templates/'.  $_this->template . '/images/logo.png', [
	'w'     	=> '200',
	'h'     	=> '200',
	'q'         => '95',
	'zc'        => 'C',
	'far'        => 'C',	
	'webp'      => true,
	'webp_q'    => '90',
	'webp_maxq' => '95',
	'error_image' => 'templates/'.  $_this->template . '/images/logo1.png',	
	'cache'     => 'img' 

	
]); 
?>

<?php if ($_this->countModules('navbar-left + navbar-center + navbar-right + lang')) { ?>
<div role="navigation" id="navbar-medium" class="uk-section uk-section-secondary uk-preserve-color  uk-padding-remove uk-background-center-center uk-background-cover uk-height-medium"  itemscope itemtype="http://www.schema.org/SiteNavigationElement" style="background-image: url(/templates/wmarka/images/header3.jpg);">
    <div class="uk-container uk-position-top   uk-padding-remove uk-light" >
        <nav class="uk-navbar-container uk-navbar-transparent uk-width-expand uk-padding uk-padding-remove-vertical" uk-sticky="cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent uk-light;">
		<div class="uk-flex uk-flex-center">
            <div class="uk-navbar-left ">
                <a href="#offcanvas" class="uk-navbar-toggle" data-uk-navbar-toggle-icon data-uk-toggle aria-label="Menu" name="Menu"></a>
            </div>
            <div class="uk-navbar-left uk-visible@m">
            <a href="/" itemprop="url"> 
            <div class="uk-navbar-item uk-logo " style="margin-top: 10px; margin-bottom: -130px;">
            		<picture>
            			<source srcset="<?php echo $thumb->webp; ?>" type="image/webp" width="190" height="190">
            				<img src="<?php echo $thumb->img; ?>" width="190" height="190" class="img-responsive" alt="<?php echo Factory::getConfig()->get('sitename', $_this->template); ?>"  itemprop="logo" loading="lazy" style="height: 190px;width:auto;">
            		</picture>			
			</div>
            </a>
            </div>			
            <?php if ($_this->countModules('navbar-left')) { ?>
            <div class="uk-navbar-left uk-visible@m">
                <jdoc:include type="modules" name="navbar-left" style="master3lite" />
            </div>		
            <?php } ?>

            <?php if ($_this->countModules('navbar-center')) { ?>
            <div class="uk-navbar-center uk-visible@m">
                <jdoc:include type="modules" name="navbar-center" style="master3lite" />
            </div>
            <?php } ?>
			
            <div class="uk-navbar-center uk-hidden@m">
            <?php if (JURI::current()!= JURI::base()) { echo '<a href="'.JURI::base(true).'" itemprop="url">'; } ?>
            <div class="uk-navbar-item uk-logo ">
            		<picture>
            			<source srcset="<?php echo $thumb->webp; ?>" type="image/webp" width="40" height="40">
            				<img src="<?php echo $thumb->img; ?>" width="40" height="40" class="img-responsive" alt="<?php echo Factory::getConfig()->get('sitename', $_this->template); ?>"  itemprop="logo" loading="lazy" style="height: 40px;width:auto;">
            		</picture>			
			</div>
            <?php if (JURI::current()!= JURI::base()) { echo '</a>'; } ?>
            </div>
 
            <?php if ($_this->countModules('navbar-right + lang')) { ?>
            <div class="uk-navbar-right">
                <jdoc:include type="modules" name="navbar-right" style="master3lite" />
                <jdoc:include type="modules" name="lang" style="master3lite" /> 
            </div>
            <?php } ?>	
			</div>
        </nav>
    </div>
</div>
<?php } ?>

<?php if ($isOffcanvas) { ?>
<aside id="offcanvas" data-uk-offcanvas="mode:slide;overlay:true;">
    <div class="uk-offcanvas-bar uk-hidden-hover uk-background-primary">
        <a class="uk-offcanvas-close" data-uk-close aria-label="<?php echo Text::_('JLIB_HTML_BEHAVIOR_CLOSE'); ?>" name="<?php echo Text::_('JLIB_HTML_BEHAVIOR_CLOSE'); ?>"></a>
		<div class="uk-margin-top">
		<?php if ($_this->countModules('searh')) : ?><jdoc:include type="modules" name="searh" style="no" />
		<?php endif; ?>
        <jdoc:include type="modules" name="offcanvas" style="master3lite" />
		</div>
    </div>
</aside>
<?php } ?>

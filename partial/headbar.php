<?php



defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

$sectionClass = 'uk-section uk-section-default';
$containerClass = 'uk-container';

?>

<?php
/*
 * logo
 * headbar
 */
 
{ ?> 

<header id="header" class="uk-section uk-section-default uk-padding-remove ">
  
<div class="uk-flex uk-flex-center uk-flex-middle uk-padding-small uk-flex-top uk-inline uk-visible@m">
            <?php if ($_this->countModules('headbar')) { ?>
			            <?php if (JURI::current()!= JURI::base()) { echo '<a class="uk-link-heading" href="'.JURI::base(true).'" itemprop="url">'; } ?>
            <div class="uk-navbar-item uk-logo uk-text-large uk-text-bold "><img src="/templates/wmarka/images/logo.svg" width="300" height="68">	
			</div>
            <?php if (JURI::current()!= JURI::base()) { echo '</a>'; } ?>			


			<div class="uk-text-lighter uk-position-bottom-right uk-position-small ">
                <jdoc:include type="modules" name="headbar" style="master3lite" />
            </div>
            <?php } ?>
		
            <div class="uk-flex uk-flex-center uk-flex-middle  uk-position-top-left uk-position-small ">
			<div class=" ">
			<a class="uk-link-heading uk-text-muted uk-margin-small-right uk-text-bold" href="#offcanvas-nav" uk-toggle><span uk-icon="icon: menu; ratio: 2"></span></a>
			</div> 			
		
 
            </div>
            <div class="uk-flex uk-flex-center uk-flex-middle  uk-position-top-right uk-position-small ">			
			<div class="uk-margin-small-right">
			<a href="#modal-login" uk-tooltip="<?php echo Text::_('JLOGIN'); ?>" class=" uk-margin-small-right " uk-icon="icon: sign-in; ratio: 2" uk-toggle> </a>
			</div>
			<div id="modal-login"  uk-modal>
			    <div class="uk-modal-dialog uk-width-medium">
			        <button class="uk-modal-close-outside" type="button" uk-close></button>
			        <div class="uk-modal-body" uk-overflow-auto>
             
            <jdoc:include type="modules" name="login" style="master3lite" />
            
			            </div>
			    </div>
			</div>
			</div>			
      </div>
<div class="uk-padding-small uk-hidden@m">
            <?php if ($_this->countModules('headbar')) { ?>
			            <?php if (JURI::current()!= JURI::base()) { echo '<a class="uk-link-heading" href="'.JURI::base(true).'" itemprop="url">'; } ?>
            <div class="uk-navbar-item uk-logo uk-text-large uk-text-bold "><img src="/templates/wmarka/images/logo.svg" width="300" height="68">	
			</div>
            <?php if (JURI::current()!= JURI::base()) { echo '</a>'; } ?>			

            <div class="uk-flex uk-flex-center uk-flex-middle uk-text-lighter">
                <jdoc:include type="modules" name="headbar" style="master3lite" />
            </div>

            <?php } ?>


      </div>	  
</header>
 
<?php } ?>



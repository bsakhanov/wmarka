<?php
defined('_JEXEC') or die;
use Joomla\CMS\Language\Text;
?>
<?php
/*
 * toolbar-left
 * toolbar-right
 */
if ($_this->countModules('toolbar-left + toolbar-right')) {
?>
<div role="toolbar" id="toolbar" class="uk-section uk-section-xsmall uk-section-primary " >
    <div class="uk-container">
	<hr>crfpfkb ckjdj
        <div class="uk-flex uk-flex-between">

            <?php if ($_this->countModules('toolbar-left')) { ?>
            <jdoc:include type="modules" name="toolbar-left" style="none" />
            <?php } ?>

            <?php if ($_this->countModules('toolbar-right')) { ?>
            <jdoc:include type="modules" name="toolbar-right" style="none" />
            <?php } ?>
			<a class="uk-button uk-button-default uk-button-small" href="#modal-login" uk-toggle><?php echo Text::_('JLOGIN'); ?></a>
			<div id="modal-login"  uk-modal>
			    <div class="uk-modal-dialog uk-width-medium">
			        <button class="uk-modal-close-outside" type="button" uk-close></button>
			        <div class="uk-modal-body" uk-overflow-auto>
            <?php if ($_this->countModules('login')) { ?>
            <jdoc:include type="modules" name="login" style="master3lite" />
            <?php } ?>	
			            </div>
			    </div>
			</div>
        </div>
    </div>
</div>
<?php } ?>
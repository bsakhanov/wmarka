<?php

defined('_JEXEC') or die;

?>
<?php
$blocke2 = $_this->countModules('block-e-2');
$blocke2 = $blocke2 > 6 ? 6 : $blocke2;
if ($blocke2) {
?>
<section id="block-e-2" class="uk-section uk-section-small uk-padding-remove-top uk-margin-top">
    <div class="uk-container  uk-flex uk-flex-center" >
	<div class="uk-grid-small" uk-grid>
        <div class="uk-width-2-3@m uk-child-width-1-<?php echo $blocke2; ?>@l uk-child-width-1-<?php echo ceil($blocke2 / 2); ?>@m uk-child-width-1-1@s uk-grid-small" uk-grid>
            <jdoc:include type="modules" name="block-e-2" style="master3lite" />
        </div>
        <div class="uk-width-1-3@m sery" >
            <jdoc:include type="modules" name="block-e-2a" style="master3lite" />
        </div>	
</div>		
    </div>
</section>
<?php } ?>
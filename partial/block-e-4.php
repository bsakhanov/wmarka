<?php

defined('_JEXEC') or die;

?>
<?php
$blocke4 = $_this->countModules('block-e-4');
$blocke4 = $blocke4 > 6 ? 6 : $blocke4;
if ($blocke4) {
?>
<section id="block-e-4" class="uk-section uk-section-large uk-section-default uk-padding-remove-vertical  ">
    <div class="uk-container uk-container-small uk-flex uk-flex-center">
	<div class="uk-grid-small" uk-grid>
        <div class="uk-child-width-1-<?php echo $blocke4; ?>@l uk-child-width-1-<?php echo ceil($blocke4 / 2); ?>@m uk-child-width-1-1@s " uk-grid>
            <jdoc:include type="modules" name="block-e-4" style="master3lite" />
        </div>
	
</div>		
    </div>
</section>
<?php } ?>
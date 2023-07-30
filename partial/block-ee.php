<?php

defined('_JEXEC') or die;

?>
<?php
$blockee = $_this->countModules('block-ee');
$blockee = $blockee > 6 ? 6 : $blockee;
if ($blockee) {
?>
<section id="block-ee" class="uk-section uk-section-large uk-section-default uk-padding-remove-vertical back">
 


 
    <div class="uk-container uk-container-small">
        <div class=" uk-flex uk-flex-center uk-child-width-1-<?php echo $blockee; ?>@l uk-child-width-1-<?php echo ceil($blockee / 2); ?>@m uk-child-width-1-1@s uk-grid-medium" data-uk-grid>
            <jdoc:include type="modules" name="block-ee" style="master3lite" />
	</div></div>
</section>
<?php } ?>
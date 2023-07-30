<?php

defined('_JEXEC') or die;

?>
<?php
$blocke3 = $_this->countModules('block-e-3');
$blocke3 = $blocke3 > 6 ? 6 : $blocke3;
if ($blocke3) {
?>
<section id="block-e-3" class="uk-section uk-section-large uk-section-default uk-padding-remove-vertical ">
    <div class="uk-container uk-container-small uk-flex uk-flex-center">
        <div class="uk-child-width-1-<?php echo $blocke3; ?>@l uk-child-width-1-<?php echo ceil($blocke3 / 2); ?>@m uk-child-width-1-1@s  " data-uk-grid>
            <jdoc:include type="modules" name="block-e-3" style="master3lite" />
        </div>
    </div>
</section>
<?php } ?>
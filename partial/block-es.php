<?php

defined('_JEXEC') or die;

?>
<?php
$blockes = $_this->countModules('block-es');
$blockes = $blockes > 6 ? 6 : $blockes;
if ($blockes) {
?>
<section id="block-es" class="uk-section uk-section-large uk-section-default uk-padding-remove-vertical back">
    <div class="uk-container uk-container-small uk-flex uk-flex-center">
        <div class="uk-child-width-1-<?php echo $blockes; ?>@l uk-child-width-1-<?php echo ceil($blockes / 2); ?>@m uk-child-width-1-1@s uk-grid-medium" data-uk-grid>
            <jdoc:include type="modules" name="block-es" style="master3lite" />
        </div>
    </div>
</section>
<?php } ?>
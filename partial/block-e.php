<?php

defined('_JEXEC') or die;

?>
<?php
$blocke = $_this->countModules('block-e');
$blocke = $blocke > 6 ? 6 : $blocke;
if ($blocke) {
?>
<section id="block-e" class="uk-section uk-padding-remove-top">
    <div class="uk-container  uk-flex uk-flex-center">
        <div class="uk-child-width-1-<?php echo $blocke; ?>@l uk-child-width-1-<?php echo ceil($blocke / 2); ?>@m uk-child-width-1-1@s uk-grid-small" data-uk-grid>
            <jdoc:include type="modules" name="block-e" style="master3lite" />
        </div>
    </div>
</section>
<?php } ?>
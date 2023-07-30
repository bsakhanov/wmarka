<?php

defined('_JEXEC') or die;

?>
<?php
$blockg = $_this->countModules('block-g');
$blockg = $blockg > 6 ? 6 : $blockg;
if ($blockg) {
?>
<section id="block-g" class="uk-section uk-section-large uk-section-default uk-padding-remove-vertical uk-background-muted">
    <div class="uk-container uk-container-small uk-flex uk-flex-center">
        <div class="uk-child-width-1-<?php echo $blockg; ?>@l uk-child-width-1-<?php echo ceil($blockg / 2); ?>@m uk-child-width-1-1@s uk-grid-medium" data-uk-grid>
            <jdoc:include type="modules" name="block-g" style="master3lite" />
        </div>
    </div>
</section>
<?php } ?>
<?php

defined('_JEXEC') or die;

?>
<?php
$blocki = $_this->countModules('block-i');
$blocki = $blocki > 6 ? 6 : $blocki;
if ($blocki) {
?>
<section id="block-i" class="uk-section uk-section-large uk-section-default uk-padding-remove-vertical uk-section-primary">
    <div class="uk-container uk-container-small uk-flex uk-flex-center">
         
            <jdoc:include type="modules" name="block-i" style="master3lite" />
 
    </div>
</section>
<?php } ?>
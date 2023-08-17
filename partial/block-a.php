<?php

defined('_JEXEC') or die;

?>
<?php
$blocka = $_this->countModules('block-a');
$blocka = $blocka > 6 ? 6 : $blocka;
if ($blocka) {
?>
<section id="block-a" class="uk-section uk-section-xsmall uk-section-muted uk-margin-remove-vertical ">
    <div class="uk-container">
        <div class="uk-child-width-1-<?php echo $blocka; ?>@l uk-child-width-1-<?php echo ceil($blocka / 2); ?>@m uk-child-width-1-1@s uk-grid-large uk-grid-divider"  data-uk-grid>
            <jdoc:include type="modules" name="block-a" style="master3" />
        </div>
    </div>
</section>
<?php } ?>
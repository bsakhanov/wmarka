<?php

defined('_JEXEC') or die;

?>
<?php
$blockhokkey = $_this->countModules('block-hokkey');
$blockhokkey = $blockhokkey > 6 ? 6 : $blockhokkey;
if ($blockhokkey) {
?>
<section id="block-hokkey" class="uk-section uk-section-large uk-section-default uk-padding-remove-vertical back">
    <div class="uk-container uk-container-small uk-flex uk-flex-center">
        <div class="uk-child-width-1-<?php echo $blockhokkey; ?>@l uk-child-width-1-<?php echo ceil($blockhokkey / 2); ?>@m uk-child-width-1-1@s uk-grid-medium" data-uk-grid>
            <jdoc:include type="modules" name="block-hokkey" style="master3lite" />
        </div>
    </div>
</section>
<?php } ?>
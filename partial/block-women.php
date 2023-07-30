<?php

defined('_JEXEC') or die;

?>
<?php
$blockwomen = $_this->countModules('block-women');
$blockwomen = $blockwomen > 6 ? 6 : $blockwomen;
if ($blockwomen) {
?>
<section id="block-women" class="uk-section uk-section-large uk-section-default uk-padding-remove-vertical back">
    <div class="uk-container uk-container-small uk-flex uk-flex-center">
        <div class="uk-child-width-1-<?php echo $blockwomen; ?>@l uk-child-width-1-<?php echo ceil($blockwomen / 2); ?>@m uk-child-width-1-1@s uk-grid-medium" data-uk-grid>
            <jdoc:include type="modules" name="block-women" style="master3lite" />
        </div>
    </div>
</section>
<?php } ?>
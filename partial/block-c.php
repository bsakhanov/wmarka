<?php

defined('_JEXEC') or die;

?>
<?php
$blockc = $_this->countModules('block-c');
$blockc = $blockc > 6 ? 6 : $blockc;
if ($blockc) {
?>
<section id="block-c" class="uk-section uk-section-muted">
    <div class="uk-container">
        <div class="uk-child-width-1-<?php echo $blockc; ?>@l uk-child-width-1-<?php echo($blockc / 2); ?>@m  uk-child-width-1-1@s uk-grid-medium  uk-grid-match " data-uk-grid>
            <jdoc:include type="modules" name="block-c" style="master3" />
        </div>
    </div>
</section>
<?php } ?>
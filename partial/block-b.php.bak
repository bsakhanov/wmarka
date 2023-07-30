<?php

defined('_JEXEC') or die;

?>
<?php
$blockb = $_this->countModules('block-b');
$blockb = $blockb > 6 ? 6 : $blockb;
if ($blockb) {
?>
<section id="block-b" class="uk-section uk-section-default">
    <div class="uk-container  uk-flex uk-flex-center">
        <div class="uk-child-width-1-<?php echo $blockb; ?>@l uk-child-width-1-<?php echo ceil($blockb / 2); ?>@m uk-child-width-1-1@s uk-grid-large" data-uk-grid>
            <jdoc:include type="modules" name="block-b" style="master3lite" />
        </div>
    </div>
</section>
<?php } ?>
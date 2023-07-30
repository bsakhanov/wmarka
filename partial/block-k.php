<?php

defined('_JEXEC') or die;

?>
<?php
$blockk = $_this->countModules('block-k');
$blockk = $blockk > 6 ? 6 : $blockk;
if ($blockk) {
?>
<section id="block-k" class="uk-section uk-section-small uk-section-muted">
    <div class="uk-container  uk-flex uk-flex-center">
        <div class="uk-child-width-1-<?php echo $blockk; ?>@l uk-child-width-1-<?php echo ceil($blockk / 2); ?>@m uk-child-width-1-1@s" data-uk-grid>
            <jdoc:include type="modules" name="block-k" style="master3lite" />
        </div>
    </div>
</section>
<?php } ?>
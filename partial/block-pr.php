<?php

defined('_JEXEC') or die;

?>
<?php
$blockpr = $_this->countModules('block-pr');
$blockpr = $blockpr > 6 ? 6 : $blockpr;
if ($blockpr) {
?>
<section id="block-pr" class="uk-section uk-section-large uk-section-default uk-padding-remove-vertical uk-background-muted">
    <div class="uk-container uk-container-small uk-flex uk-flex-center">
        <div class="uk-child-width-1-<?php echo $blockpr; ?>@l uk-child-width-1-<?php echo ceil($blockpr / 2); ?>@m uk-child-width-1-1@s uk-grid-medium" data-uk-grid>
            <jdoc:include type="modules" name="block-pr" style="master3lite" />
        </div>
    </div>
</section>
<?php } ?>
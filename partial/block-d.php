<?php

defined('_JEXEC') or die;

?>
<?php
$blockd = $_this->countModules('block-d');
$blockd = $blockd > 6 ? 6 : $blockd;
if ($blockd) {
?>
<section id="block-d" class="uk-section uk-section-default uk-section-primary uk-margin-large-bottom">
    <div class="uk-container  uk-flex uk-flex-center">
        <div class="uk-child-width-1-<?php echo $blockd; ?>@l uk-child-width-1-<?php echo ceil($blockd / 2); ?>@m uk-child-width-1-1@s uk-grid-small" data-uk-grid>
            <jdoc:include type="modules" name="block-d" style="master3lite" />
        </div>
    </div>
</section>
<?php } ?>
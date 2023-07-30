<?php

defined('_JEXEC') or die;

?>
<?php
$blockf = $_this->countModules('block-f');
$blockf = $blockf > 6 ? 6 : $blockf;
if ($blockf) {
?>
<section id="block-f" class="uk-section  uk-section-muted  uk-flex uk-flex-center">
    <div class="uk-panel  uk-flex uk-flex-center">
        <div class="uk-child-width-1-<?php echo $blockf; ?>@l uk-child-width-1-<?php echo ceil($blockf / 2); ?>@m uk-child-width-1-1@s uk-grid-small" data-uk-grid>
            <jdoc:include type="modules" name="block-f" style="master3lite" />
        </div>
    </div>
</section> 
<?php } ?>
<?php

defined('_JEXEC') or die;

?>
<?php
$blockh = $_this->countModules('block-h');
$blockh = $blockh > 6 ? 6 : $blockh;
if ($blockh) {
?>
<section id="block-h" class="uk-section uk-section-secondary">
    <div class="uk-container uk-container-small uk-container-center uk-flex uk-flex-center">
        <div class="uk-child-width-1-<?php echo $blockh; ?>@l uk-child-width-1-<?php echo ceil($blockh / 2); ?>@m uk-child-width-1-1@s" data-uk-grid>
            <jdoc:include type="modules" name="block-h" style="master3lite" />
        </div>
    </div>
</section>
<?php } ?>
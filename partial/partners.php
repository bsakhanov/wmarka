<?php

defined('_JEXEC') or die;

?>
<?php
$partners = $_this->countModules('partners');
$partners = $partners > 6 ? 6 : $partners;
if ($partners) {
?>
<section id="partners" class="uk-section uk-section-muted">
    <div class="uk-container">
        <div class="uk-child-width-1-<?php echo $partners; ?>@l uk-child-width-1-<?php echo ceil($partners / 2); ?>@m uk-margin-auto uk-child-width-1-1@s uk-grid-small uk-grid-match " data-uk-grid>
            <jdoc:include type="modules" name="partners" style="none" />
        </div>
    </div>
</section>
<?php } ?>
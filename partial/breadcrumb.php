<?php

defined('_JEXEC') or die;

?>
<?php
/*
breadcrumb
 */
if ($_this->countModules('breadcrumb')) {
?>
<div role="navigation" id="breadcrumb" class="uk-section uk-section-xsmall uk-section-default uk-padding-small">
    <div class="uk-container">
        <jdoc:include type="modules" name="breadcrumb" style="none" />
    </div>
</div>
<?php } ?>
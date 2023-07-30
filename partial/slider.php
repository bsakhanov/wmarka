<?php

defined('_JEXEC') or die;

?>
<?php
if ($_this->countModules('slider')) {
?>
<section id="slider" class="uk-section uk-padding-remove-vertical">
    <div class="uk-panel">
	<?php if ($_this->countModules('slider')) { ?>
        <div class="uk-child-width-1-1" >
            <jdoc:include type="modules" name="slider" style="none" />
        </div>
	<?php } ?>	
    </div>
</section>
<?php } ?>
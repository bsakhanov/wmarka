<?php
defined('_JEXEC') or die;
use Joomla\CMS\Language\Text;
?>
<?php
/*
 * adver-top
 */
if ($_this->countModules('adver-top')) {
?>
<div role="adver-top" id="adver-top" class="uk-section uk-visible@m uk-padding-remove-vertical">
    <div class="uk-container uk-container-small uk-flex uk-flex-center uk-flex-middle">
            <?php if ($_this->countModules('adver-top')) { ?>
            <jdoc:include type="modules" name="adver-top" style="none" />
            <?php } ?>
    </div>
</div>
<?php } ?>


<?php
defined('_JEXEC') or die;
use Joomla\CMS\Language\Text;

/*
 * toolbar-left
 * toolbar-right
 */
if ($_this->countModules('toolbar-left') || $_this->countModules('toolbar-right')) {
    ?>
<div role="toolbar" id="section-toolbar" class="uk-section uk-section-xsmall uk-section-primary">
    <div class="uk-container">
        <div class="uk-flex uk-flex-middle uk-flex-between">

            <?php if ($_this->countModules('toolbar-left')) { ?>
            <jdoc:include type="modules" name="toolbar-left" style="master3" />
            <?php } ?>

            <?php if ($_this->countModules('toolbar-right')) { ?>
            <jdoc:include type="modules" name="toolbar-right" style="master3" />
            <?php } ?>

        </div>
    </div>
</div>
<?php } ?>

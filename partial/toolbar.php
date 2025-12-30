<?php
defined('_JEXEC') or die;

// Проверяем наличие модулей через объект документа
if ($this->doc->countModules('toolbar-left') || $this->doc->countModules('toolbar-right')) : ?>
<div role="toolbar" id="section-toolbar" class="uk-section uk-section-xsmall uk-section-primary">
    <div class="uk-container">
        <div class="uk-flex uk-flex-middle uk-flex-between">

            <?php if ($this->doc->countModules('toolbar-left')) : ?>
                <jdoc:include type="modules" name="toolbar-left" style="master3" />
            <?php endif; ?>

            <?php if ($this->doc->countModules('toolbar-right')) : ?>
                <jdoc:include type="modules" name="toolbar-right" style="master3" />
            <?php endif; ?>

        </div>
    </div>
</div>
<?php endif; ?>

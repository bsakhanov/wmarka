<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Router\Route;

/** @var \Wmarka\Template\Helper $this */
$doc = $this->doc;
$app = Factory::getApplication(); // Теперь Factory всегда под рукой

// Проверяем наличие модулей через объект документа
if ($this->doc->countModules('toolbar-left') || $this->doc->countModules('toolbar-right')) : ?>
<div role="toolbar" id="section-toolbar" class="uk-section uk-section-xsmall uk-section-primary">
    <div class="uk-container">
        <div class="uk-flex uk-flex-middle uk-flex-between">

            <?php if ($this->doc->countModules('toolbar-left')) : ?>
                <jdoc:include type="modules" name="toolbar-left" style="wmarka" />
            <?php endif; ?>

            <?php if ($this->doc->countModules('toolbar-right')) : ?>
                <jdoc:include type="modules" name="toolbar-right" style="wmarka" />
            <?php endif; ?>

        </div>
    </div>
</div>
<?php endif; ?>

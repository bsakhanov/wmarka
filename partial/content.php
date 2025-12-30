<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Router\Route;

/** @var \Wmarka\Template\Helper $this */
$doc = $this->doc;
$app = Factory::getApplication(); // Теперь Factory всегда под рукой

$sidebarACount = $doc->countModules('sidebar-a');
$sidebarBCount = $doc->countModules('sidebar-b');

// Расчет сетки
if ($sidebarACount && $sidebarBCount) {
    $mainWidth = 'uk-width-1-2@m';
} elseif ($sidebarACount || $sidebarBCount) {
    $mainWidth = 'uk-width-3-4@m';
} else {
    $mainWidth = 'uk-width-1-1';
}
?>
<div id="main" class="uk-section uk-section-default uk-padding-small uk-margin-bottom">
    <div class="uk-container">
        <div class="uk-grid-small" uk-grid>

            <?php if ($sidebarACount) : ?>
                <aside class="uk-width-1-4@m uk-flex-first@m">
                    <div class="uk-grid-small uk-grid-divider" uk-grid>	
                        <jdoc:include type="modules" name="sidebar-a" style="wmarka" />
                    </div>
                </aside>
            <?php endif; ?>

            <div class="<?php echo $mainWidth; ?>">
                <?php if ($doc->countModules('main-top')) : ?>
                    <div class="uk-margin-bottom">
                        <jdoc:include type="modules" name="main-top" style="wmarka" />
                    </div>
                <?php endif; ?>

                <main id="content">					
                    <jdoc:include type="component" />
                </main>

                <?php if ($doc->countModules('main-bottom')) : ?>
                    <div class="uk-margin-top">
                        <jdoc:include type="modules" name="main-bottom" style="wmarka" />
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($sidebarBCount) : ?>
                <aside class="uk-width-1-4@m">
                    <div class="uk-grid-small uk-grid-divider" uk-grid>
                        <jdoc:include type="modules" name="sidebar-b" style="wmarka" />
                    </div>			
                </aside>			
            <?php endif; ?>

        </div>
    </div>
</div>

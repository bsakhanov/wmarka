<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * @version     WMARKA UIKIT (Empty State Ultra Clean)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

$textPrefix = $displayData['textPrefix'] ?? '';

if (!$textPrefix) {
    $textPrefix = strtoupper(Factory::getApplication()->getInput()->get('option'));
}

$formURL    = $displayData['formURL'] ?? '';
$createURL  = $displayData['createURL'] ?? '';
$helpURL    = $displayData['helpURL'] ?? '';
$title      = $displayData['title'] ?? Text::_($textPrefix . '_EMPTYSTATE_TITLE');
$content    = $displayData['content'] ?? Text::_($textPrefix . '_EMPTYSTATE_CONTENT');
$append     = $displayData['formAppend'] ?? '';
$btnadd     = $displayData['btnadd'] ?? Text::_($textPrefix . '_EMPTYSTATE_BUTTON_ADD');

$controlFields = $displayData['controlFields'] ?? '';

// Маппинг иконок: переводим системные иконки Joomla в UIkit
$iconName = 'copy'; 
if (isset($displayData['icon']) && strpos($displayData['icon'], 'search') !== false) $iconName = 'search';
if (isset($displayData['icon']) && strpos($displayData['icon'], 'calendar') !== false) $iconName = 'calendar';
?>

<form action="<?php echo Route::_($formURL); ?>" method="post" name="adminForm" id="adminForm">

    <div class="uk-section uk-section-large uk-flex uk-flex-middle uk-text-center uk-background-muted uk-border-rounded" uk-height-viewport="offset-top: true; offset-bottom: 20">
        <div class="uk-width-1-1">
            <div class="uk-container uk-container-small">
                
                <?php /* Иконка плейсхолдера */ ?>
                <span uk-icon="icon: <?php echo $iconName; ?>; ratio: 5" class="uk-text-muted uk-margin-bottom"></span>
                
                <h1 class="uk-heading-small uk-text-bold"><?php echo $title; ?></h1>
                
                <div class="uk-text-lead uk-margin-medium-bottom">
                    <?php echo $content; ?>
                </div>

                <div class="uk-flex uk-flex-center uk-grid-small" uk-grid uk-margin>
                    <?php if ($createURL && Factory::getApplication()->getInput()->get('tmpl') !== 'component') : ?>
                        <div>
                            <a href="<?php echo Route::_($createURL); ?>"
                               id="confirmButton" 
                               class="uk-button uk-button-primary uk-button-large uk-border-rounded">
                                <span uk-icon="icon: plus; ratio: 0.9" class="uk-margin-small-right"></span>
                                <?php echo $btnadd; ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if ($helpURL) : ?>
                        <div>
                            <a href="<?php echo $helpURL; ?>" target="_blank"
                               class="uk-button uk-button-default uk-button-large uk-border-rounded">
                                <?php echo Text::_('JGLOBAL_LEARN_MORE'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

    <?php echo $append; ?>

    <?php if ($controlFields) : ?>
        <?php echo $controlFields; ?>
    <?php else : ?>
        <input type="hidden" name="task" value="">
        <input type="hidden" name="boxchecked" value="0">
        <?php echo HTMLHelper::_('form.token'); ?>
    <?php endif; ?>
</form>

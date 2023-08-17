<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_finder
 *
 * @copyright   (C) 2011 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

/*
* This segment of code sets up the autocompleter.
*/
if ($this->params->get('show_autosuggest', 1)) {
    $this->document->getWebAssetManager()->usePreset('awesomplete');
    $this->document->addScriptOptions('finder-search', ['url' => Route::_('index.php?option=com_finder&task=suggestions.suggest&format=json&tmpl=component', false)]);

    Text::script('JLIB_JS_AJAX_ERROR_OTHER');
    Text::script('JLIB_JS_AJAX_ERROR_PARSE');
}

?>

<form action="<?php echo Route::_($this->query->toUri()); ?>" method="get" class="uk-width-auto">
    <?php echo $this->getFields(); ?>
    <fieldset class="uk-fieldset">

        <div class="form-inline">

            <div class="uk-flex" >
				<div class="uk-margin-small-right uk-width-large@m">
                <input class="uk-input" type="text"  name="q" id="q" class="js-finder-search-query form-control" value="<?php echo $this->escape($this->query->input); ?>">
                </div>
				<div class="uk-width-auto">
				<button type="submit" class="uk-button uk-button-primary">
                     GO!
                </button>
				</div>
            </div>
        </div>
    </fieldset>

 
</form>

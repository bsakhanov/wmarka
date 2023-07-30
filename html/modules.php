<?php

/**
 * @package     Joomla.Site
 * @subpackage  Templates.Master3_J4
 * @copyright   Copyright (C) Aleksey A. Morozov. All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

\defined('_JEXEC') or die;

function modChrome_master3($module, &$params, &$attribs)
{
    $moduleTag = 'div';
    if ($module->module === 'mod_menu') {
        $moduleTag = 'nav';
    }

    $moduleClass = [];
    $moduleClass[] = 'tm-position-' . $module->position;
    $moduleClass[] = 'tm-modid-' . $module->id;
    $moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx', ''));
    if ($moduleclass_sfx) {
        $moduleClass[] = 'tm-modclass-' . $moduleclass_sfx;
    }
    $moduleClass = trim(implode(' ', $moduleClass));

    $titleTag = htmlspecialchars($params->get('header_tag', 'h3'));
    $titleClass = htmlspecialchars($params->get('header_class', ''), ENT_COMPAT, 'UTF-8');
    $titleClass = $titleClass ? ' class="' . $titleClass . '"' : '';

    if ($module->content) {
        echo '<div><' . $moduleTag . ' class="' . trim($moduleClass) . '">';

        if ($module->showtitle) {
            echo '<' . $titleTag . $titleClass . '>' . $module->title . '</' . $titleTag . '>';
        }

        echo $module->content;

        echo '</' . $moduleTag . '></div>';
    }
}

function modChrome_empty($module, &$params, &$attribs)
{
    echo str_replace(
        ["<div >\r\n    ", "<div >\n    ", "</div>\r\n", "</div>\n", "</div>\r"],
        ['<div>', '<div>', '</div>', '</div>', '</div>'],
        $module->content
    );
}
// Uikit3 Specific Module Chrome
function modChrome_uikit($module, &$params, &$attribs)
{
	$moduleTag      = $params->get('module_tag', 'div');
	$headerTag      = htmlspecialchars($params->get('header_tag', 'h3'));
	$bootstrapSize  = (int) $params->get('bootstrap_size', 0);
	$moduleClass    = $bootstrapSize != 0 ? ' span' . $bootstrapSize : '';

	// Temporarily store header class in variable
	$headerClass    = $params->get('header_class', 'uk-title');
	$headerClass    = ($headerClass) ? ' class="uk-heading-divider uk-heading-bullet uk-h2"' : '';

	if (!empty ($module->content)) : ?>
		<<?php echo $moduleTag; ?> class="moduletable <?php echo htmlspecialchars($params->get('moduleclass_sfx')) . $moduleClass; ?>">
			<?php echo $module->content; ?>
		</<?php echo $moduleTag; ?>>
	<?php endif;
}
function modChrome_uikittitle($module, &$params, &$attribs)
{
    $moduleTag = 'div';
    if ($module->module === 'mod_menu') {
        $moduleTag = 'nav';
    }

    $moduleClass = [];
    $moduleClass[] = 'tm-position-' . $module->position;
    $moduleClass[] = 'tm-modid-' . $module->id;
    $moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx', ''));
    if ($moduleclass_sfx) {
        $moduleClass[] = 'tm-modclass-' . $moduleclass_sfx;
    }
    $moduleClass = trim(implode(' ', $moduleClass));

    $titleTag = htmlspecialchars($params->get('header_tag', 'h3'));
    $titleClass = htmlspecialchars($params->get('header_class', ''), ENT_COMPAT, 'UTF-8');
    $titleClass = ' class="uk-heading-divider uk-heading-bullet uk-h2"';

    if ($module->content) {
        echo '<div><' . $moduleTag . ' class="' . trim($moduleClass) . ' ">';

        if ($module->showtitle) {
            echo '<' . $titleTag . $titleClass . '>' . $module->title . '</' . $titleTag . '>';
        }

        echo $module->content;

        echo '</' . $moduleTag . '></div>';
    }
}

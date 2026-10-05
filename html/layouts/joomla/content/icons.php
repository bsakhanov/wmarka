<?php
/**
 * WMARKA — кнопка редактирования материала на фронтенде (компактная иконка).
 *
 * @var array $displayData ['params', 'item']
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$params = $displayData['params'];
$item   = $displayData['item'];

if (empty($params) || !$params->get('access-edit')) {
    return;
}

$html = (string) HTMLHelper::_('contenticon.edit', $item, $params, [], true);

if ($html === '') {
    return;
}
?>
<div class="uk-margin-small uk-text-small"><?php echo Ui::bridge(str_replace('<a ', '<a class="uk-button uk-button-default uk-button-small" uk-tooltip="' . Ui::esc(strip_tags($html)) . '" ', $html)); ?></div>

<?php
/**
 * WMARKA — ссылка «Читать далее» (uk-button-text со стрелкой).
 *
 * @var array $displayData ['item', 'params', 'link']
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

$params = $displayData['params'];
$item   = $displayData['item'];
$link   = (string) $displayData['link'];

if (!$params->get('access-view')) {
    $label = Text::_('JGLOBAL_REGISTER_TO_READ_MORE');
} elseif ($readmore = trim((string) ($item->alternative_readmore ?? ''))) {
    $label = htmlspecialchars($readmore, ENT_QUOTES, 'UTF-8');
} elseif ($params->get('show_readmore_title', 0)) {
    $label = Text::_('JGLOBAL_READ_MORE') . ' ' . HTMLHelper::_('string.truncate', $item->title, $params->get('readmore_limit'));
} else {
    $label = Text::_('TPL_WMARKA_READ_MORE');
}
?>
<a class="uk-button uk-button-text" href="<?php echo $link; ?>" aria-label="<?php echo htmlspecialchars(Text::_('JGLOBAL_READ_MORE') . ': ' . $item->title, ENT_QUOTES, 'UTF-8'); ?>">
    <?php echo $label; ?> <span uk-icon="icon: arrow-right; ratio: 0.9" aria-hidden="true"></span>
</a>

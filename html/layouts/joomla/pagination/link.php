<?php
/**
 * WMARKA — звено пагинации: стрелки UIkit вместо иконок ядра.
 *
 * @var array $displayData ['data', 'active']
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;

$item    = $displayData['data'];
$text    = (string) $item->text;
$rtl     = Factory::getApplication()->getLanguage()->isRtl();
$display = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
$aria    = Text::sprintf('JLIB_HTML_GOTO_PAGE', strtolower($text));

if ($text === Text::_('JPREV')) {
    $display = '<span uk-pagination-' . ($rtl ? 'next' : 'previous') . '></span>';
    $aria    = Text::_('JLIB_HTML_GOTO_POSITION_PREVIOUS');
} elseif ($text === Text::_('JNEXT')) {
    $display = '<span uk-pagination-' . ($rtl ? 'previous' : 'next') . '></span>';
    $aria    = Text::_('JLIB_HTML_GOTO_POSITION_NEXT');
} elseif ($text === Text::_('JLIB_HTML_START') || $text === Text::_('JLIB_HTML_END')) {
    return;
}

if ($displayData['active']) : ?>
    <li><a href="<?php echo $item->link; ?>" aria-label="<?php echo htmlspecialchars($aria, ENT_QUOTES, 'UTF-8'); ?>"><?php echo $display; ?></a></li>
<?php elseif (!empty($item->active)) : ?>
    <li class="uk-active"><span aria-current="page"><?php echo $display; ?></span></li>
<?php else : ?>
    <li class="uk-disabled"><span><?php echo $display; ?></span></li>
<?php endif;

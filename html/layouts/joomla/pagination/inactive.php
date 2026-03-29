<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * @version     WMARKA ULTRA (Pagination Inactive)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

$item = $displayData['data'];
$text = (string) $item->text;

if ($text == Text::_('JLIB_HTML_START')) {
    $icon = '<span uk-pagination-previous></span><span uk-pagination-previous></span>';
    $class = '';
} elseif ($text == Text::_('JPREV')) {
    $icon = '<span uk-pagination-previous></span>';
    $class = '';
} elseif ($text == Text::_('JNEXT')) {
    $icon = '<span uk-pagination-next></span>';
    $class = '';
} elseif ($text == Text::_('JLIB_HTML_END')) {
    $icon = '<span uk-pagination-next></span><span uk-pagination-next></span>';
    $class = '';
} else {
    $icon = $text;
    $class = 'uk-visible@s'; // Прячем номер текущей страницы на мобильных
}
?>

<?php if ($displayData['active']) : ?>
    <li class="uk-active <?php echo $class; ?>">
        <span class="uk-text-bold"><?php echo $icon; ?></span>
    </li>
<?php else : ?>
    <li class="uk-disabled <?php echo $class; ?>">
        <span><?php echo $icon; ?></span>
    </li>
<?php endif; ?>
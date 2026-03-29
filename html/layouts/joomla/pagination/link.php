<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * @version     WMARKA ULTRA (Pagination Link)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

$item = $displayData['data'];
$text = (string) $item->text;

// Настройка иконок и адаптивности
switch ($text) {
    case Text::_('JLIB_HTML_START'):
        $icon = '<span uk-pagination-previous></span><span uk-pagination-previous></span>';
        $tip  = Text::_('JLIB_HTML_GOTO_POSITION_START');
        $class = ''; // Всегда видно
        break;
    case Text::_('JPREV'):
        $icon = '<span uk-pagination-previous></span>';
        $tip  = Text::_('JLIB_HTML_GOTO_POSITION_PREVIOUS');
        $class = ''; 
        break;
    case Text::_('JNEXT'):
        $icon = '<span uk-pagination-next></span>';
        $tip  = Text::_('JLIB_HTML_GOTO_POSITION_NEXT');
        $class = '';
        break;
    case Text::_('JLIB_HTML_END'):
        $icon = '<span uk-pagination-next></span><span uk-pagination-next></span>';
        $tip  = Text::_('JLIB_HTML_GOTO_POSITION_END');
        $class = '';
        break;
    default:
        $icon = $text;
        $tip  = Text::sprintf('JLIB_HTML_GOTO_PAGE', $text);
        // Скрываем цифры на мобильных (до 640px)
        $class = 'uk-visible@s'; 
        break;
}
?>

<li class="<?php echo $class; ?>" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
    <a href="<?php echo $item->link; ?>" 
       itemprop="url" 
       title="<?php echo $tip; ?>" 
       uk-tooltip="pos: top; delay: 400" 
       aria-label="<?php echo $tip; ?>">
        <span itemprop="name"><?php echo $icon; ?></span>
    </a>
    <meta itemprop="position" content="<?php echo $text; ?>">
</li>
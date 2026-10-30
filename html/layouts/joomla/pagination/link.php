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
$aria    = Text::sprintf('JLIB_HTML_GOTO_PAGE', mb_strtolower($text));

if ($text === Text::_('JPREV')) {
    $display = '<span uk-pagination-' . ($rtl ? 'next' : 'previous') . '></span>';
    $aria    = Text::_('JLIB_HTML_GOTO_POSITION_PREVIOUS');
} elseif ($text === Text::_('JNEXT')) {
    $display = '<span uk-pagination-' . ($rtl ? 'previous' : 'next') . '></span>';
    $aria    = Text::_('JLIB_HTML_GOTO_POSITION_NEXT');
} elseif ($text === Text::_('JLIB_HTML_START') || $text === Text::_('JLIB_HTML_END')) {
    return;
}

// Первая страница — без «?start=0»: у неё один адрес, тот же, что у самого списка
$uri = new \Joomla\CMS\Uri\Uri(html_entity_decode((string) $item->link, ENT_QUOTES, 'UTF-8'));

foreach (['start', 'limitstart'] as $var) {
    if ((string) $uri->getVar($var) === '0') {
        $uri->delVar($var);
    }
}

$href = htmlspecialchars($uri->toString(), ENT_QUOTES, 'UTF-8');

if ($displayData['active']) : ?>
    <li><a href="<?php echo $href; ?>" aria-label="<?php echo htmlspecialchars($aria, ENT_QUOTES, 'UTF-8'); ?>"><?php echo $display; ?></a></li>
<?php elseif (!empty($item->active)) : ?>
    <li class="uk-active"><span aria-current="page"><?php echo $display; ?></span></li>
<?php else : ?>
    <li class="uk-disabled"><span><?php echo $display; ?></span></li>
<?php endif;

<?php
/**
 * WMARKA — ссылка на RSS-ленту.
 *
 * @var \Joomla\Registry\Registry $params
 * @var string $link
 * @var string $text
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

$label = !empty($text) ? $text : Text::_('MOD_SYNDICATE_DEFAULT_FEED_ENTRIES');
?>
<a class="uk-button uk-button-default uk-button-small" href="<?php echo $link; ?>" aria-label="<?php echo htmlspecialchars(strip_tags($label), ENT_QUOTES, 'UTF-8'); ?>">
    <span uk-icon="icon: rss; ratio: 0.9"></span><?php if ($params->get('display_text', 1)) : ?> <?php echo $label; ?><?php endif; ?>
</a>

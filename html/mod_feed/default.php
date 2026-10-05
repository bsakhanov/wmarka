<?php
/**
 * WMARKA — внешняя RSS-лента.
 *
 * @var \Joomla\Registry\Registry $params
 * @var mixed  $feed
 * @var string $rssurl
 * @var int    $rssrtl
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\Filter\OutputFilter;

if (empty($rssurl)) {
    echo '<p class="uk-text-meta">' . Text::_('MOD_FEED_ERR_NO_URL') . '</p>';
    return;
}

if (!empty($feed) && \is_string($feed)) {
    echo $feed;
    return;
}

if ($feed === false) {
    return;
}
?>
<div dir="<?php echo $rssrtl ? 'rtl' : 'ltr'; ?>">
    <?php if ($feed->title !== null && $params->get('rsstitle', 1)) : ?>
        <h4 class="uk-margin-small"><a class="uk-link-heading" href="<?php echo htmlspecialchars($rssurl, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener"><?php echo htmlspecialchars($feed->title, ENT_QUOTES, 'UTF-8'); ?></a></h4>
    <?php endif; ?>
    <?php if ($params->get('rssdate', 1) && $feed->publishedDate !== null) : ?>
        <p class="uk-text-meta"><?php echo HTMLHelper::_('date', $feed->publishedDate, Text::_('DATE_FORMAT_LC3')); ?></p>
    <?php endif; ?>
    <?php if ($params->get('rssdesc', 1)) : ?>
        <div class="uk-text-small"><?php echo $feed->description; ?></div>
    <?php endif; ?>
    <?php if ($feed->image && $params->get('rssimage', 1)) : ?>
        <?php echo HTMLHelper::_('image', $feed->image->uri, $feed->image->title, ['class' => 'uk-margin-small']); ?>
    <?php endif; ?>
    <?php if (!empty($feed)) : ?>
        <ul class="uk-list uk-list-divider">
            <?php for ($i = 0, $max = min(\count($feed), (int) $params->get('rssitems', 3)); $i < $max; $i++) : ?>
                <?php
                $uri  = $feed[$i]->uri || !$feed[$i]->isPermaLink ? trim($feed[$i]->uri) : trim($feed[$i]->guid);
                $uri  = !$uri || stripos($uri, 'http') !== 0 ? $rssurl : $uri;
                $text = $feed[$i]->content !== '' ? trim($feed[$i]->content) : '';
                ?>
                <li>
                    <a class="uk-link-heading" href="<?php echo htmlspecialchars($uri, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener"><?php echo htmlspecialchars(trim($feed[$i]->title), ENT_QUOTES, 'UTF-8'); ?></a>
                    <?php if ($params->get('rssitemdate', 0) && $feed[$i]->publishedDate !== null) : ?>
                        <div class="uk-text-meta"><?php echo HTMLHelper::_('date', $feed[$i]->publishedDate, Text::_('DATE_FORMAT_LC3')); ?></div>
                    <?php endif; ?>
                    <?php if ($params->get('rssitemdesc', 1) && $text !== '') : ?>
                        <div class="uk-text-small uk-margin-xsmall-top"><?php echo str_replace('&apos;', "'", HTMLHelper::_('string.truncate', OutputFilter::stripImages($text), $params->get('word_count', 0))); ?></div>
                    <?php endif; ?>
                </li>
            <?php endfor; ?>
        </ul>
    <?php endif; ?>
</div>

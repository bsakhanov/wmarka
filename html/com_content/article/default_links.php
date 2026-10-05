<?php
/**
 * WMARKA — ссылки A/B/C материала.
 *
 * @var \Joomla\Component\Content\Site\View\Article\HtmlView $this
 */

\defined('_JEXEC') or die;

$urls = json_decode((string) $this->item->urls);
$params = $this->item->params;

if (!$urls || (empty($urls->urla) && empty($urls->urlb) && empty($urls->urlc))) {
    return;
}

$links = [];

foreach (['a', 'b', 'c'] as $id) {
    $url = $urls->{'url' . $id} ?? '';

    if (!$url) {
        continue;
    }

    $label  = htmlspecialchars(($urls->{'url' . $id . 'text'} ?? '') ?: $url, ENT_QUOTES, 'UTF-8');
    $target = $urls->{'target' . $id} ?? $params->get('target' . $id);
    $attr   = in_array((string) $target, ['1', '2'], true) ? ' target="_blank" rel="nofollow noopener noreferrer"' : ' rel="nofollow"';
    $links[] = '<li><a href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '"' . $attr . '>' . $label . '</a></li>';
}
?>
<ul class="uk-list uk-list-bullet uk-margin"><?php echo implode('', $links); ?></ul>

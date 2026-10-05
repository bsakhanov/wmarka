<?php
/**
 * WMARKA — ссылки контакта (соцсети, сайты): кнопки-иконки по домену.
 *
 * @var \Joomla\Component\Contact\Site\View\Contact\HtmlView $this
 */

\defined('_JEXEC') or die;

use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$icons = ['t.me' => 'telegram', 'telegram' => 'telegram', 'wa.me' => 'whatsapp', 'whatsapp' => 'whatsapp', 'instagram' => 'instagram',
    'facebook' => 'facebook', 'x.com' => 'x', 'twitter' => 'x', 'youtube' => 'youtube', 'linkedin' => 'linkedin', 'github' => 'github',
    'tiktok' => 'tiktok', 'threads' => 'threads', 'pinterest' => 'pinterest', 'behance' => 'behance', 'dribbble' => 'dribbble'];
$links = [];

foreach (range('a', 'e') as $char) {
    $link = (string) $this->item->params->get('link' . $char);

    if ($link === '') {
        continue;
    }

    $link  = str_starts_with($link, 'http') ? $link : 'https://' . $link;
    $label = (string) ($this->item->params->get('link' . $char . '_name') ?: $link);
    $icon  = 'link';

    foreach ($icons as $needle => $name) {
        if (stripos($link, $needle) !== false) {
            $icon = $name;
            break;
        }
    }

    $links[] = [$link, $label, $icon];
}

if (!$links) {
    return;
}
?>
<ul class="uk-iconnav uk-margin-medium-top">
    <?php foreach ($links as [$link, $label, $icon]) : ?>
        <li><a class="uk-icon-button" href="<?php echo Ui::esc($link); ?>" target="_blank" rel="noopener noreferrer" uk-icon="<?php echo $icon; ?>" title="<?php echo Ui::esc($label); ?>" aria-label="<?php echo Ui::esc($label); ?>" itemprop="sameAs"></a></li>
    <?php endforeach; ?>
</ul>

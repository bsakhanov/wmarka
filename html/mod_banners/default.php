<?php
/**
 * WMARKA — баннеры: изображение или свой код, клики через com_banners.
 *
 * @var \Joomla\Registry\Registry $params
 * @var array  $list
 * @var string $headerText
 * @var string $footerText
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Helper\MediaHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
?>
<div class="uk-child-width-1-1 uk-grid-small" uk-grid>
    <?php if ($headerText) : ?><div class="uk-text-meta"><?php echo $headerText; ?></div><?php endif; ?>
    <?php foreach ($list as $item) : ?>
        <div>
            <?php $link = Route::_('index.php?option=com_banners&task=click&id=' . $item->id); ?>
            <?php if ((int) $item->type === 1) : ?>
                <?php echo str_replace(['{CLICKURL}', '{NAME}'], [$link, $item->name], $item->custombannercode); ?>
            <?php else : ?>
                <?php
                $url = HTMLHelper::cleanImageURL($item->params->get('imageurl'))->url;

                if (empty($url) || !(MediaHelper::isImage($url) || MediaHelper::getMimeType($url) === 'image/svg+xml')) {
                    continue;
                }

                $alt    = $item->params->get('alt') ?: ($item->name ?: Text::_('MOD_BANNERS_BANNER'));
                $width  = $item->params->get('width');
                $height = $item->params->get('height');
                $img    = '<img src="' . (str_starts_with($url, 'http') ? '' : Uri::base(true) . '/') . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($alt, ENT_QUOTES, 'UTF-8') . '"'
                    . ($width ? ' width="' . (int) $width . '"' : '') . ($height ? ' height="' . (int) $height . '"' : '') . ' loading="lazy">';
                $target = (int) $params->get('target', 1);
                ?>
                <?php if ($item->clickurl) : ?>
                    <a href="<?php echo $link; ?>" title="<?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8'); ?>"<?php echo $target === 1 ? ' target="_blank" rel="noopener noreferrer sponsored"' : ' rel="sponsored"'; ?>><?php echo $img; ?></a>
                <?php else : ?>
                    <?php echo $img; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    <?php if ($footerText) : ?><div class="uk-text-meta"><?php echo $footerText; ?></div><?php endif; ?>
</div>

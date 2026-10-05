<?php
/**
 * WMARKA — случайное изображение.
 *
 * @var object $image
 * @var array  $images
 * @var string $link
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

if (!\count($images)) {
    echo '<p class="uk-text-meta">' . Text::_('MOD_RANDOM_IMAGE_NO_IMAGES') . '</p>';
    return;
}

$img = '<img class="uk-width-1-1" src="' . Uri::base(true) . '/' . htmlspecialchars($image->folder . '/' . $image->name, ENT_QUOTES, 'UTF-8') . '" width="' . (int) $image->width . '" height="' . (int) $image->height . '" alt="" loading="lazy">';
?>
<div class="uk-inline-clip">
    <?php echo $link ? '<a href="' . htmlspecialchars($link, ENT_QUOTES, 'UTF-8') . '">' . $img . '</a>' : $img; ?>
</div>

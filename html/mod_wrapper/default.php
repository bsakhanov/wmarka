<?php
/**
 * WMARKA — обёртка iframe на всю ширину колонки.
 *
 * @var string $load
 * @var int    $id
 * @var string $target
 * @var string $url
 * @var string $width
 * @var string $height
 * @var string $lazyloading
 * @var string $ititle
 * @var \Joomla\CMS\Application\SiteApplication $app
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

$app->getDocument()->getWebAssetManager()->registerAndUseScript('com_wrapper.iframe', 'com_wrapper/iframe-height.min.js', [], ['defer' => true]);
?>
<iframe <?php echo $load; ?> id="blockrandom-<?php echo $id; ?>" name="<?php echo $target; ?>" src="<?php echo $url; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" loading="<?php echo $lazyloading; ?>" title="<?php echo $ititle; ?>" class="uk-width-1-1" style="border: 0"><?php echo Text::_('MOD_WRAPPER_NO_IFRAMES'); ?></iframe>

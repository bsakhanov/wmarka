<?php
/**
 * WMARKA — «Свой HTML». С фоновым изображением модуля — обложка
 * uk-background-cover со светлым текстом (картинка грузится лениво через uk-img).
 *
 * @var \Joomla\Registry\Registry $params
 * @var object $module
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;

$bg = $params->get('backgroundimage');

if ($bg) : ?>
    <div id="mod-custom<?php echo (int) $module->id; ?>" class="uk-background-cover uk-background-center-center uk-light uk-padding-large uk-flex uk-flex-middle" style="min-height: 320px" data-src="<?php echo Uri::root(true) . '/' . htmlspecialchars(HTMLHelper::_('cleanImageURL', $bg)->url, ENT_QUOTES, 'UTF-8'); ?>" uk-img>
        <div class="uk-width-1-1"><?php echo $module->content; ?></div>
    </div>
<?php else : ?>
    <div id="mod-custom<?php echo (int) $module->id; ?>" class="uk-text-break"><?php echo $module->content; ?></div>
<?php endif;

<?php
/**
 * WMARKA — профиль пользователя контакта (плагин «Профиль пользователя»).
 *
 * @var \Joomla\Component\Contact\Site\View\Contact\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\CMS\String\PunycodeHelper;

if (!PluginHelper::isEnabled('user', 'profile')) {
    return;
}
?>
<dl class="uk-description-list uk-description-list-divider">
    <?php foreach ($this->item->profile->getFieldset('profile') as $profile) : ?>
        <?php if (!$profile->value) { continue; } ?>
        <?php $text = htmlspecialchars($profile->value, ENT_COMPAT, 'UTF-8'); ?>
        <dt><?php echo $profile->label; ?></dt>
        <?php if ($profile->id === 'profile_website') : ?>
            <dd><a href="<?php echo str_starts_with($profile->value, 'http') ? $text : 'http://' . $text; ?>" rel="noopener"><?php echo $this->escape(PunycodeHelper::urlToUTF8($text)); ?></a></dd>
        <?php elseif ($profile->id === 'profile_dob') : ?>
            <dd><?php echo HTMLHelper::_('date', $text, Text::_('DATE_FORMAT_LC4'), false); ?></dd>
        <?php else : ?>
            <dd><?php echo $text; ?></dd>
        <?php endif; ?>
    <?php endforeach; ?>
</dl>

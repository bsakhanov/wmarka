<?php
/**
 * WMARKA — системные сообщения: алерты UIkit на сервере (без мигания JS).
 * Контейнер #system-message-container сохранён для сообщений, которые
 * дорисовывает Joomla.renderMessages (валидация форм, ajax).
 *
 * @var array $displayData ['msgList']
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;

$msgList = $displayData['msgList'];
$map     = [
    CMSApplication::MSG_EMERGENCY => 'danger', CMSApplication::MSG_ALERT => 'danger', CMSApplication::MSG_CRITICAL => 'danger',
    CMSApplication::MSG_ERROR => 'danger', CMSApplication::MSG_WARNING => 'warning', CMSApplication::MSG_NOTICE => 'primary',
    CMSApplication::MSG_INFO => 'primary', CMSApplication::MSG_DEBUG => 'primary', CMSApplication::MSG_MESSAGE => 'success',
    'error' => 'danger', 'warning' => 'warning', 'notice' => 'primary', 'message' => 'success', 'success' => 'success', 'info' => 'primary',
];

foreach (['ERROR', 'MESSAGE', 'NOTICE', 'WARNING', 'SUCCESS', 'JCLOSE', 'JOK', 'JOPEN'] as $key) {
    Text::script($key);
}

Factory::getApplication()->getDocument()->getWebAssetManager()->useStyle('webcomponent.joomla-alert')->useScript('messages');
?>
<div id="system-message-container" aria-live="polite">
    <?php if (\is_array($msgList)) : ?>
        <?php foreach ($msgList as $type => $msgs) : ?>
            <?php if (!empty($msgs)) : ?>
                <div class="uk-alert-<?php echo $map[$type] ?? 'primary'; ?>" uk-alert role="alert">
                    <a href="#" class="uk-alert-close" uk-close aria-label="<?php echo Text::_('JCLOSE'); ?>"></a>
                    <?php foreach ($msgs as $msg) : ?>
                        <p><?php echo $msg; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

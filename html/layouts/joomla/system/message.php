<?php

/**
 * Системные сообщения.
 *
 * Макет ядра (layouts/joomla/system/message.php) на каждой странице подключает стили и
 * скрипты сообщений — core.js, messages.js, joomla-alert.css и строки для JavaScript, —
 * даже если сообщений нет. Здесь они подключаются, только когда сообщение есть или на
 * странице работает проверка форм (её ошибки выводит тот же скрипт сообщений). Иначе —
 * пустой контейнер: в него могут писать скрипты, если сообщение появится позже.
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;

$msgList = $displayData['msgList'] ?? [];
$wa      = Factory::getApplication()->getDocument()->getWebAssetManager();

if ((\is_array($msgList) && $msgList) || $wa->isAssetActive('script', 'form.validate')) {
    // Есть что показать — штатный макет ядра целиком
    require JPATH_ROOT . '/layouts/joomla/system/message.php';

    return;
}

echo '<div id="system-message-container" aria-live="polite"></div>';

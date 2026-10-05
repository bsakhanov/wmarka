<?php
/** WMARKA — подтверждение сброса пароля (код из письма). */
\defined('_JEXEC') or die;
$wmAction = 'index.php?task=reset.confirm';
$wmId = 'user-registration';
$wmButton = 'JSUBMIT';
$wmTask = '';
require \dirname(__DIR__) . '/_form.php';

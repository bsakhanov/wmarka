<?php
/** WMARKA — регистрация пользователя. */
\defined('_JEXEC') or die;
$wmAction = 'index.php?task=registration.register';
$wmId = 'member-registration';
$wmButton = 'JREGISTER';
$wmTask = 'registration.register';
$wmMultipart = true;
require \dirname(__DIR__) . '/_form.php';

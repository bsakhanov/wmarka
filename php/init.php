<?php
defined('_JEXEC') or die;

// Используем современное пространство имен шаблона
use Joomla\CMS\Factory;

// Подключаем файл хелпера
require_once __DIR__ . '/Helper.php';

// Создаем экземпляр для использования в index.php
// $this в init.php — это объект документа, переданный из index.php
$tpl = new \Wmarka\Template\Helper($this);

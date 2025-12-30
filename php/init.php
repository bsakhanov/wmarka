<?php
defined('_JEXEC') or die;

// Используем современное пространство имен шаблона
use Joomla\CMS\Factory;

// Подключаем обновленный хелпер
require_once __DIR__ . '/Helper.php';

// Инициализируем наш класс (вместо тяжелого JBlank)
$tpl = new Wmarka\Template\Helper($this);

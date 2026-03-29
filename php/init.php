<?php
declare(strict_types=1);

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;

/**
 * 1. Регистрация пространства имен (PSR-4)
 * Позволяет Joomla автоматически загружать классы Helper и Seo без require_once
 */
\JLoader::registerNamespace('Wmarka\\Template', JPATH_THEMES . '/' . $this->template . '/php');

/**
 * 2. Инициализация Хелпера и SEO-класса
 */
$tpl = new \Wmarka\Template\Helper($this);
$seo = new \Wmarka\Template\Seo($this);

// Запуск генерации всех мета-тегов и микроразметки
$seo->render();

/**
 * 3. Управление активами через WebAssetManager (Joomla 5/6 Standard)
 * Указанные зависимости автоматически подтянут UIkit и Fonts из joomla.asset.json
 */
$wa = $this->getWebAssetManager();
$wa->useStyle('template.wmarka.user'); // Загрузит user.css и uikit.min.css
$wa->useScript('template.wmarka.uikit.min');
$wa->useScript('template.wmarka.uikit-icons.min');

// Дополнительный скрипт иконок (если описан в asset.json)
if ($wa->getRegistry()->exists('script', 'template.wmarka.wmarka-icons-min')) {
    $wa->useScript('template.wmarka.wmarka-icons-min');
}

/**
 * 4. ОЧИСТКА HEAD ОТ МУСОРА И BOOTSTRAP
 * Отключаем старые стили ядра, чтобы они не ломали верстку UIkit 3
 */
$wa->disableAsset('style', 'bootstrap');
$wa->disableAsset('script', 'bootstrap');
$wa->disableAsset('style', 'fontawesome');

/**
 * 5. БАЗОВЫЕ НАСТРОЙКИ ДОКУМЕНТА И МЕТА-ТЕГИ
 */
$this->setMetaData('viewport', 'width=device-width, initial-scale=1, shrink-to-fit=no');
$this->setGenerator('Wmarka Engine');
$this->setMetaData('HandheldFriendly', 'true');
$this->setMetaData('apple-mobile-web-app-capable', 'YES');

/**
 * 6. ФАВИКОНКИ И МАНИФЕСТ (PWA & Apple Ready)
 * Путь: /media/templates/site/wmarka/images/favicon/
 */
$faviconPath = $this->baseurl . '/media/templates/site/' . $this->template . '/images/favicon/';

// Apple Touch & Стандартные PNG
$this->addHeadLink($faviconPath . 'apple-touch-icon.png', 'apple-touch-icon', 'rel', ['sizes' => '180x180']);
$this->addHeadLink($faviconPath . 'favicon-32x32.png', 'icon', 'rel', ['type' => 'image/png', 'sizes' => '32x32']);
$this->addHeadLink($faviconPath . 'favicon-16x16.png', 'icon', 'rel', ['type' => 'image/png', 'sizes' => '16x16']);

// Современный SVG и Манифест
$this->addHeadLink($faviconPath . 'favicon.svg', 'icon', 'rel', ['type' => 'image/svg+xml']);
$this->addHeadLink($faviconPath . 'site.webmanifest', 'manifest', 'rel');
$this->addHeadLink($faviconPath . 'safari-pinned-tab.svg', 'mask-icon', 'rel', ['color' => '#181b1f']);

// Цвета тем для мобильных устройств
$this->setMetaData('msapplication-TileColor', '#181b1f');
$this->setMetaData('theme-color', '#181b1f');

/**
 * 7. Настройки Joomla для JavaScript
 * Передаем системные пути (как было в твоем оригинальном файле)
 */
$this->addScriptOptions('system.paths', [
    'root'     => '',
    'rootFull' => Uri::root(),
    'base'     => '',
    'baseFull' => Uri::base()
]);
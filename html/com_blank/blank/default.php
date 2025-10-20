<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_blank // <-- Убедитесь, что имя компонента верное (латиницей)
 * @since       1.0.0  
 * @copyright   Copyright (C) 2025 Ваше имя или компания. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// Запрет прямого доступа.
\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\HTML\HTMLHelper; // Может понадобиться для _('select.option') или других хелперов

// Получаем основные объекты приложения Joomla 5
$app = Factory::getApplication();
$document = $app->getDocument();
// $wa = $document->getWebAssetManager(); // Получаем Web Asset Manager, если нужно загружать JS/CSS/хелперы

// --- Если этот код находится в файле шаблона вида (view.html.php) ---
// $document = $this->document;
// $app = Factory::getApplication();
// $wa = $document->getWebAssetManager();
// ------------------------------------------------------------------

// --- Удалено: JHtml::addIncludePath устарело. Используйте WAM, если нужны хелперы. ---
// JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
// JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
// Если вам нужны хелперы из вашего компонента, используйте:
// $wa->useHelper('com_blank.yourhelpername'); // Замените на реальное имя хелпера

// Получаем и очищаем заголовок и описание документа
$docTitle = $document->getTitle();
$docDescription = $document->getDescription(); // Используем латиницу в имени переменной

// Устанавливаем заголовок страницы (можно оставить как есть, если нужно обрезать теги)
$document->setTitle(strip_tags(trim($docTitle)));

// --- OpenGraph и Twitter Cards ---

// Путь к изображению по умолчанию (лучше сделать настраиваемым через параметры)
$templateName = $app->getTemplate();
$defaultImagePath = Uri::base(true) . '/media/templates/site/' . $templateName . '/images/logotype.jpg';
$ogImage = htmlspecialchars($defaultImagePath); // Экранируем для безопасности

// Получаем значения из языковых файлов (добавьте значения по умолчанию на случай отсутствия констант)
$ogLang = Text::_('OG_LANG', 'ru_RU'); // Пример значения по умолчанию
$twitterSite = Text::_('SEO_TWITTER_SITE', ''); // Например, @YourTwitterHandle
$twitterCreator = Text::_('SEO_TWITTER_CREATOR', ''); // Например, @AuthorTwitterHandle
$articleAuthor = Text::_('SEO_DESCRIPTION_AUTHOR', '');
$facebookAdmins = Text::_('SEO_FACEBOOK_ID', '');
$facebookAppId = Text::_('SEO_YOUR_APP_ID', '');
$siteName = $app->get('sitename'); // Получаем имя сайта из конфигурации Joomla
$currentUrl = Uri::current();

// Экранируем динамические данные перед использованием в мета-тегах
$safeTitle = htmlspecialchars($docTitle, ENT_QUOTES, 'UTF-8');
$safeDescription = htmlspecialchars($docDescription, ENT_QUOTES, 'UTF-8');
$safeArticleAuthor = htmlspecialchars($articleAuthor, ENT_QUOTES, 'UTF-8');
$safeTwitterSite = htmlspecialchars($twitterSite, ENT_QUOTES, 'UTF-8');
$safeTwitterCreator = htmlspecialchars($twitterCreator, ENT_QUOTES, 'UTF-8');

// Установка мета-тегов с помощью setMetaData
// Twitter Card
$document->setMetaData('twitter:card', 'summary_large_image');
$document->setMetaData('twitter:site', $safeTwitterSite);
$document->setMetaData('twitter:creator', $safeTwitterCreator);
$document->setMetaData('twitter:title', $safeTitle);
$document->setMetaData('twitter:description', $safeDescription);
$document->setMetaData('twitter:url', $currentUrl);
$document->setMetaData('twitter:image', $ogImage); // Можно использовать то же изображение
// $document->setMetaData('twitter:image:alt', 'Описание изображения для Twitter'); // Хорошая практика - добавить alt текст

// Open Graph
$document->setMetaData('og:title', $safeTitle);
$document->setMetaData('og:description', $safeDescription);
$document->setMetaData('og:type', 'website'); // Или 'article', 'product' и т.д. в зависимости от страницы
$document->setMetaData('og:url', $currentUrl);
$document->setMetaData('og:image', $ogImage);
$document->setMetaData('og:image:secure_url', $ogImage); // Если сайт работает по HTTPS (что рекомендуется)
// $document->setMetaData('og:image:type', 'image/jpeg'); // Можно указать тип MIME
// $document->setMetaData('og:image:width', '1200'); // Можно указать размеры
// $document->setMetaData('og:image:height', '630');
// $document->setMetaData('og:image:alt', 'Описание изображения для Open Graph'); // Хорошая практика - добавить alt текст
$document->setMetaData('og:locale', $ogLang);
$document->setMetaData('og:site_name', htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'));

// Эти теги специфичны, но можно оставить, если они вам нужны
if (!empty($safeArticleAuthor)) {
    $document->setMetaData('article:author', $safeArticleAuthor); // Используется для og:type = article
}
// $document->setMetaData('article:publisher', htmlspecialchars(Text::_('SEO_DESCRIPTION_PUBLISHER', ''), ENT_QUOTES, 'UTF-8')); // Если нужно

if (!empty($facebookAdmins)) {
    $document->setMetaData('fb:admins', htmlspecialchars($facebookAdmins, ENT_QUOTES, 'UTF-8'));
}
if (!empty($facebookAppId)) {
    $document->setMetaData('fb:app_id', htmlspecialchars($facebookAppId, ENT_QUOTES, 'UTF-8'));
}

// --- Гео-теги и Schema.org (Лучше реализовать через JSON-LD) ---
// Вместо добавления множества отдельных мета-тегов для адреса, телефона и т.д.,
// рекомендуется использовать разметку Schema.org в формате JSON-LD.
// Это более современный и поддерживаемый поисковыми системами подход.
// Пример (добавляется как скрипт в <head>):
/*
$schema = [
    '@context' => 'https://schema.org',
    '@type' => 'Organization', // Или LocalBusiness, Person и т.д.
    'name' => $siteName,
    'url' => Uri::base(),
    'logo' => $ogImage,
    'contactPoint' => [
        '@type' => 'ContactPoint',
        'telephone' => htmlspecialchars(Text::_('SEO_TEL', ''), ENT_QUOTES, 'UTF-8'),
        'contactType' => 'Customer Service' // Пример
    ],
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => htmlspecialchars(Text::_('SEO_STREET_ADDRESS', ''), ENT_QUOTES, 'UTF-8'),
        'addressLocality' => htmlspecialchars(Text::_('SEO_LOCALITY', ''), ENT_QUOTES, 'UTF-8'),
        'addressRegion' => htmlspecialchars(Text::_('SEO_REGION', ''), ENT_QUOTES, 'UTF-8'),
        'postalCode' => htmlspecialchars(Text::_('SEO_POSTALCODE', ''), ENT_QUOTES, 'UTF-8'),
        'addressCountry' => htmlspecialchars(Text::_('SEO_COUNTRY', ''), ENT_QUOTES, 'UTF-8')
    ],
    // 'geo' => [ // Можно добавить геокоординаты, если нужно
    //     '@type' => 'GeoCoordinates',
    //     'latitude' => htmlspecialchars(Text::_('SEO_LATITUDE', ''), ENT_QUOTES, 'UTF-8'),
    //     'longitude' => htmlspecialchars(Text::_('SEO_LONGITUDE', ''), ENT_QUOTES, 'UTF-8')
    // ]
];
$document->addScriptDeclaration(json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT), 'application/ld+json');
*/
// Если вы все же хотите использовать старые гео-теги (менее рекомендуется):
// $document->setMetaData('geo.position', htmlspecialchars(Text::_('SEO_LATITUDE', ''), ENT_QUOTES, 'UTF-8') . ';' . htmlspecialchars(Text::_('SEO_LONGITUDE', ''), ENT_QUOTES, 'UTF-8'));
// $document->setMetaData('geo.placename', htmlspecialchars(Text::_('SEO_COUNTRY_CITY', ''), ENT_QUOTES, 'UTF-8'));
// $document->setMetaData('geo.region', htmlspecialchars(Text::_('SEO_COUNTRY', ''), ENT_QUOTES, 'UTF-8') . '-' . htmlspecialchars(Text::_('SEO_REGION', ''), ENT_QUOTES, 'UTF-8'));
// $document->setMetaData('ICBM', htmlspecialchars(Text::_('SEO_LATITUDE', ''), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(Text::_('SEO_LONGITUDE', ''), ENT_QUOTES, 'UTF-8'));


// --- DNS Prefetch ---
// Добавляем через addCustomTag, так как это нестандартные теги <link>
// Исправлены URL (убрано //http://) и используется https там, где возможно.
$dnsPrefetchTags = '
    <link href="//ajax.googleapis.com" rel="dns-prefetch preconnect" />
    <link href="//www.google-analytics.com" rel="dns-prefetch preconnect" />
    <link href="//pagead2.googlesyndication.com" rel="dns-prefetch preconnect" />
    <link href="//static.doubleclick.net" rel="dns-prefetch preconnect" />
    <link href="//googleusercontent.com" rel="dns-prefetch preconnect" />
    <link href="//www.youtube.com" rel="dns-prefetch preconnect" />
    <link href="//graph.facebook.com" rel="dns-prefetch preconnect" />
    <link href="//maxcdn.bootstrapcdn.com" rel="dns-prefetch preconnect" />
    <link href="//cdnjs.cloudflare.com" rel="dns-prefetch preconnect" />
    <link href="//cdn.jsdelivr.net" rel="dns-prefetch preconnect" />
    <link href="//oss.maxcdn.com" rel="dns-prefetch preconnect" />
    <link href="//mc.yandex.ru" rel="dns-prefetch preconnect" /> <link href="//informer.yandex.ru" rel="dns-prefetch preconnect" />
    ';
// Добавляем блок ссылок в <head>
$document->addCustomTag($dnsPrefetchTags);

// --- Конец OpenGraph и DNS Prefetch ---

// Другой код вашего шаблона или вида может идти здесь...
?>
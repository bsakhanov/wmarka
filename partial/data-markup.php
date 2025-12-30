<?php
/**
 * Разметка Schema.org LocalBusiness
 * Выводится только на определенных страницах (Главная, О компании, Контакты)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;

// Получаем текущий Itemid через современный API
$app    = Factory::getApplication();
$itemId = $app->input->getInt('Itemid');

// Массив ID страниц, где нужна эта разметка
$targetIds = [169, 208, 259, 361];

// Проверяем, входит ли текущий ID в наш список
if (in_array($itemId, $targetIds)) : ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "Студия Webmarka Kazakhstan",
        "image": "https://webmarka.kz/images/zfavicons/apple-touch-icon.png",
        "telephone": [
            "+7 (7172) 251-394",
            "+7 (708) 4251-394"
        ],
        "email": "support@webmarka.kz",
        "priceRange": "180000-1000000KZT",
        "url": "https://webmarka.kz/",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "ул. Касыма Аманжолова 32/1",
            "addressLocality": "Астана",
            "addressCountry": "Казахстан",
            "postalCode": "010000"
        },
        "openingHoursSpecification": {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": [
                "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"
            ],
            "opens": "09:00",
            "closes": "21:00"
        }
    }
    </script>
    <?php endif; ?>

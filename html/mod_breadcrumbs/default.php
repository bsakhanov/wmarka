<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_breadcrumbs
 * @copyright   (C) 2024 Wmarka. All rights reserved.
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;

/** @var Joomla\Registry\Registry $params */
/** @var array $list */

if (empty($list)) {
    return;
}

// Если в настройках выключен показ последнего элемента — убираем его из списка
if (!$params->get('showLast', 1)) {
    array_pop($list);
}

$count = count($list);
$doc   = Factory::getApplication()->getDocument();
$wa    = $doc->getWebAssetManager();

// Подготавливаем данные для JSON-LD (SEO)
$jsonLd = [
    '@context'        => 'https://schema.org',
    '@type'           => 'BreadcrumbList',
    'itemListElement' => []
];
?>

<ul class="uk-breadcrumb uk-margin-medium-bottom">
    <?php foreach ($list as $key => $item) : 
        $isLast = ($key === $count - 1);
        
        // Обработка имени (убираем разделитель ||, если он есть)
        $name = $item->name;
        if ($pos = strpos($name, '||')) {
            $name = trim(substr($name, 0, $pos));
        }

        // Формируем ссылку для JSON-LD
        $link = $item->link ? Route::_($item->link, true, Route::TLS_IGNORE, true) : Uri::getInstance()->toString();
        
        $jsonLd['itemListElement'][] = [
            '@type'    => 'ListItem',
            'position' => $key + 1,
            'item'     => [
                '@id'  => $link,
                'name' => $name
            ]
        ];
    ?>
        <?php if ($isLast) : ?>
            <li class="uk-active">
                <span><?php echo $name; ?></span>
            </li>
        <?php elseif (!empty($item->link)) : ?>
            <li>
                <a href="<?php echo Route::_($item->link); ?>">
                    <?php echo $name; ?>
                </a>
            </li>
        <?php else : ?>
            <li class="uk-disabled">
                <span><?php echo $name; ?></span>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>

<?php
// Регистрируем JSON-LD разметку в <head>
$wa->addInline('script', json_encode($jsonLd, JSON_UNESCAPED_UNICODE), [], ['type' => 'application/ld+json']);

<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_blank
 * @version     WMARKA ULTRA (SEO Core - No Redundant Wrappers)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

/** @var Joomla\CMS\Document\HtmlDocument $this */
$app      = Factory::getApplication();
$doc      = $app->getDocument();
$sitename = $app->get('sitename');
$title    = $doc->getTitle();
$desc     = $doc->getDescription();
$curUrl   = Uri::getInstance()->toString();

// 1. Мета-данные и SEO
$ogImage = Uri::base() . ($params->get('og_image') ?: 'images/logotype.jpg');

$doc->setMetaData('og:title', $title);
$doc->setMetaData('og:description', $desc);
$doc->setMetaData('og:url', $curUrl);
$doc->setMetaData('og:image', $ogImage);
$doc->setMetaData('og:type', 'website');
$doc->setMetaData('og:locale', Text::_('OG_LANG', 'ru_RU'));

$doc->setMetaData('twitter:card', 'summary_large_image');
$doc->setMetaData('twitter:image', $ogImage);

// 2. JSON-LD Organization
$schema = [
    '@context' => 'https://schema.org',
    '@type'    => 'Organization',
    'name'     => $sitename,
    'url'      => Uri::base(),
    'logo'     => $ogImage
];
$doc->addScriptDeclaration(json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE), 'application/ld+json');

// 3. Очистка Title
$doc->setTitle(strip_tags($title));
?>

<div class="com-blank-content" itemscope itemtype="https://schema.org/Article">
    <?php /* Системные сообщения Joomla */ ?>
    <jdoc:include type="message" />

    <?php if ($params->get('show_page_heading')) : ?>
        <h1 class="uk-article-title uk-heading-bullet uk-margin-bottom" itemprop="headline">
            <?php echo $this->escape($params->get('page_heading')); ?>
        </h1>
    <?php endif; ?>

    <div class="uk-article-content" itemprop="articleBody">
        <?php /* Основной контент без лишних вложений */ ?>
        <?php echo $this->item->text ?? ''; ?>
    </div>
</div>

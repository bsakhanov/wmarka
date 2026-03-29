<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_tags
 * @version     Joomla 6.x
 * @PHP         8.3 / 8.4
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\Registry\Registry; // Используем для элегантной работы с JSON
use Joomla\Component\Tags\Site\Helper\RouteHelper;

// Базовые проверки и переменные
if (empty($this->items)) {
    return;
}

$user = Factory::getUser();
$authorisedViewLevels = $user->getAuthorisedViewLevels();

// Регулярное выражение для поиска картинки в тексте (твой старый паттерн)
$regexImageSrc = '/src="([^"]+)"/i'; // Я немного упростил регулярку для надежного поиска src="..."
?>

<div class="com-tags__items uk-margin-top">
    <div class="uk-grid-match uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m" uk-grid>

        <?php foreach ($this->items as $item) : ?>
            <?php
            // --- 1. ПОДГОТОВКА ДАННЫХ ДЛЯ JLAYOUT ---
            
            // Получаем JSON из core_images (компонент тегов)
            $jsonImages = $item->core_images ?? '';
            $images     = new Registry($jsonImages);
            
            // Если вступительное изображение пустое, пытаемся найти его в тексте статьи
            if (empty($images->get('image_intro')) && !empty($item->core_body)) {
                if (preg_match($regexImageSrc, $item->core_body, $matches)) {
                    // Если нашли, записываем в реестр
                    $images->set('image_intro', $matches[1]);
                    // Ставим alt по умолчанию (заголовок)
                    $images->set('image_intro_alt', $item->core_title ?? $item->title); 
                }
            }

            // Создаем свойство images, которое ожидает макет joomla.content.intro_image
            // Конвертируем наш реестр обратно в JSON-строку
            $item->images = $images->toString();
            ?>

            <div class="uk-width-1-1">
                <article class="uk-card uk-card-default uk-card-hover uk-height-1-1" itemscope itemtype="https://schema.org/Article">

                    <?php echo LayoutHelper::render('joomla.content.intro_image', $item); ?>

                    <div class="uk-card-body">
                        <h3 class="uk-card-title uk-margin-small-bottom" itemprop="headline">
                            <a href="<?php echo Route::_(RouteHelper::getItemRoute($item->content_item_id, $item->core_alias, $item->core_catid, $item->core_language, $item->type_alias, $item->router)); ?>" class="uk-link-heading">
                                <?php echo $this->escape($item->core_title); ?>
                            </a>
                        </h3>

                        <?php if ($item->core_publish_up && $item->core_publish_up !== '0000-00-00 00:00:00') : ?>
                            <div class="uk-text-meta uk-margin-small-bottom">
                                <span uk-icon="icon: calendar; ratio: 0.8"></span>
                                <time datetime="<?php echo HTMLHelper::_('date', $item->core_publish_up, 'c'); ?>" itemprop="datePublished">
                                    <?php echo HTMLHelper::_('date', $item->core_publish_up, Text::_('DATE_FORMAT_LC3')); ?>
                                </time>
                            </div>
                        <?php endif; ?>

                        <div class="uk-text-muted uk-text-small" itemprop="articleBody">
                            <?php 
                                $introText = HTMLHelper::_('string.truncate', strip_tags($item->core_body), 150, true, false);
                                echo $introText; 
                            ?>
                        </div>
                    </div>

                </article>
            </div>
        <?php endforeach; ?>

    </div>

    <?php if ($this->pagination->pagesTotal > 1 && $this->params->get('show_pagination')) : ?>
        <div class="pagination-wrapper uk-margin-medium-top uk-flex uk-flex-between uk-flex-middle">
            <div class="uk-pagination-container">
                <?php echo $this->pagination->getPagesLinks(['pagination' => 'uk-pagination']); ?>
            </div>
            <?php if ($this->params->get('show_pagination_results', 1)) : ?>
                <div class="uk-text-meta">
                    <?php echo $this->pagination->getPagesCounter(); ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</div>
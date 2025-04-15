<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_tags
 *
 * @copyright   (C) 2013 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Необходимые классы
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;

/** @var \Joomla\Component\Tags\Site\View\Tags\HtmlView $this */

// --- НАЧАЛО: Инициализация JUImage ---
if (!class_exists('JUImage')) {
    JLoader::register('JUImage', JPATH_LIBRARIES . '/juimage/JUImage.php'); // Проверьте путь
}
$juImg = new JUImage();
// Регулярное выражение для очистки #joomlaImage синтаксиса (если он может использоваться в параметрах)
$regexImageSrc = '/#joomlaImage?([^\'" >]+)/';
// --- КОНЕЦ: Инициализация JUImage ---

// Получаем параметры для описания и изображения
$showDescriptionParam = $this->params->get('show_description', 0);
$showImageParam       = $this->params->get('all_tags_show_description_image', 0);
$descriptionText      = $this->params->get('all_tags_description', '');
$descriptionImage     = $this->params->get('all_tags_description_image', '');
$descriptionImageAlt  = $this->params->get('all_tags_description_image_alt', '');

// Определяем, нужно ли показывать блок описания/изображения
$showDescriptionBlock = ($showImageParam && !empty($descriptionImage)) || ($showDescriptionParam && !empty($descriptionText));

?>
<?php // Основной контейнер ?>
<div class="com-tags-tags-list tags-list uk-container uk-container-large uk-margin-auto uk-margin-large-bottom">

    <?php // 1. Заголовок страницы ?>
    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1 class="uk-h1 uk-margin-medium-bottom uk-text-center">
            <?php echo $this->escape($this->params->get('page_heading')); ?>
        </h1>
    <?php endif; ?>

    <?php // 2. Блок описания и изображения списка ?>
    <?php if ($showDescriptionBlock) : ?>
        <div class="tag-list-description uk-margin uk-clearfix"> <?php // Отступ и очистка потока ?>

            <?php // --- НАЧАЛО: Изображение списка с использованием JUImage --- ?>
            <?php if ($showImageParam && !empty($descriptionImage)) : ?>
                <?php
                    // Параметры для JUImage (можно вынести в параметры Joomla или оставить общими)
                    $juImageParams = [
                        // 'w'         => 300, // Не задаем ширину, пусть CSS решает (uk-align-left)
                        // 'h'         => 200, // Не задаем высоту
                        'q'         => 75,    // Качество JPEG
                        'webp'      => true,  // Включить WebP
                        'webp_q'    => 70,    // Качество WebP
                        'webp_maxq' => 75,
                        'cache'     => 'img'  // Папка кеша
                    ];
                    // Обрабатываем путь с помощью JUImage
                    // Применяем preg_replace на случай использования синтаксиса #joomlaImage в параметре
                    $thumb = $juImg->render(preg_replace($regexImageSrc, '', $descriptionImage), $juImageParams);
                ?>
                <?php // Выводим изображение, если JUImage успешно сработал ?>
                <?php if ($thumb && isset($thumb->webp)) : ?>
                    <img src="<?php echo $thumb->webp; ?>"
                         class="uk-align-left uk-margin-remove-adjacent uk-margin-right uk-border-rounded" <?php // Классы UIkit ?>
                         alt="<?php echo $this->escape($descriptionImageAlt); ?>"
                         itemprop="image"
                         loading="lazy"
                         <?php // Добавляем атрибуты width/height из результата JUImage, если они есть (для предотвращения CLS) ?>
                         <?php if (isset($thumb->width)) : ?>width="<?php echo $thumb->width; ?>"<?php endif; ?>
                         <?php if (isset($thumb->height)) : ?>height="<?php echo $thumb->height; ?>"<?php endif; ?>
                         >
                 <?php else : // Фоллбэк: если JUImage не сработал, можно попробовать вывести оригинал (опционально) ?>
                     <?php
                        /* // Можно раскомментировать, если нужен вывод оригинала при ошибке JUImage
                         $listImgAttr = [
                            'class' => 'uk-align-left uk-margin-remove-adjacent uk-margin-right uk-border-rounded',
                            'alt'   => $this->escape($descriptionImageAlt),
                            'itemprop' => 'image',
                            'loading' => 'lazy'
                         ];
                         echo HTMLHelper::_('image', $descriptionImage, $listImgAttr['alt'], $listImgAttr);
                        */
                     ?>
                 <?php endif; // Конец проверки $thumb ?>
            <?php endif; // Конец проверки $showImageParam && !empty($descriptionImage) ?>
            <?php // --- КОНЕЦ: Изображение списка с использованием JUImage --- ?>


            <?php // Текст описания списка ?>
            <?php if ($showDescriptionParam && !empty($descriptionText)) : ?>
                <div class="list-description-text">
                    <?php echo HTMLHelper::_('content.prepare', $descriptionText, '', 'com_tags.tags.list'); ?>
                </div>
            <?php endif; ?>

        </div> <?php // end .tag-list-description ?>
    <?php endif; // end $showDescriptionBlock ?>

    <?php // 3. Подключение шаблона для вывода карточек тегов ?>
    <?php // Убедитесь, что ваш файл templates/wmarka/html/com_tags/tags/default_items.php существует и адаптирован ?>
    <?php echo $this->loadTemplate('items'); ?>

    <?php // 4. Пагинация (если есть) ?>
    <?php if (!empty($this->pagination) && ($this->pagination->pagesTotal > 1)) : ?>
         <div class="pagination-wrapper uk-margin-medium-top uk-clearfix">
             <?php if ($this->params->get('show_pagination_results', 1)) : ?>
                <div class="counter uk-float-right">
                    <p class="uk-text-meta">
                        <?php echo $this->pagination->getPagesCounter(); ?>
                    </p>
                </div>
            <?php endif; ?>
             <div class="uk-pagination-container">
                <?php echo $this->pagination->getPagesLinks(['pagination' => 'uk-pagination']); ?>
             </div>
        </div>
    <?php endif; ?>

</div> <?php // end .com-tags-tags-list ?>
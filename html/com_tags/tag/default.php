<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_tags
 *
 * @copyright   (C) 2013 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Layout\LayoutHelper; // Используем LayoutHelper для пагинации, если нужно

// Получаем объекты приложения, документа и конфигурации один раз
$app      = Factory::getApplication();
$document = $app->getDocument();
$config   = $app->getConfig();
$user     = $app->getIdentity();

// Регистрируем хелперы и пути
HTMLHelper::addIncludePath(JPATH_COMPONENT . '/helpers');
JLoader::register('JUImage', JPATH_LIBRARIES . '/juimage/JUImage.php'); // Убедитесь, что путь верный

// --- Формирование заголовка страницы (Title) ---
$pageTitleParts = [];
$fixed_str = ''; // Инициализируем переменную

// Используем заголовок тега (если есть)
if (!empty($this->tags_title)) {
    // Сокращаем заголовок до ~7 слов для мета-тега title
    $shortenedTagTitle = preg_replace("/^(\s*(\S+\s+){0,7}\S+).*/s", '$1', $this->tags_title);
    $pageTitleParts[] = trim($shortenedTagTitle);
}

// Добавляем metakey первого тега, если он существует
if (!empty($this->item) && isset($this->item[0]->metakey)) {
    $pageTitleParts[] = $this->escape($this->item[0]->metakey);
}

// Добавляем $fixed_str, если она будет использоваться
if (!empty($fixed_str)) {
     $pageTitleParts[] = $fixed_str;
}

// Добавляем имя сайта
$pageTitleParts[] = $config->get('sitename');

// Формируем окончательный заголовок, убирая лишние пробелы и теги
$pageTitle = strip_tags(implode(' | ', array_filter($pageTitleParts))); // array_filter уберет пустые элементы

// Добавляем информацию о пагинации
if ($this->pagination->pagesTotal > 1 && $this->pagination->pagesCurrent > 1) {
    $pageTitle .= ' | ' . Text::sprintf('JPAGINATION_PAGE_OF', $this->pagination->pagesCurrent, $this->pagination->pagesTotal);
} elseif (!empty($this->pagination->pagesCounter)) {
    // Если нужен счетчик на всех страницах (включая первую), можно использовать $this->pagination->getPagesCounter()
    // Но стандартно добавляется только номер страницы > 1
}

$document->setTitle($pageTitle);

// --- Остальная часть шаблона ---

$isSingleTag = count($this->item) === 1;
$htag        = $this->params->get('show_page_heading') ? 'h2' : 'h1'; // htag для заголовка тега
$juImg = new JUImage();
$regexImageSrc = '/#joomlaImage?([^\'" >]+)/';

?>

<div class="com-tags-tag tag-category<?php echo $this->pageclass_sfx; ?>">

    <?php if ($this->params->get('show_page_heading')) : ?>
        <div class="page-header">
            <h1 class="uk-h2 uk-text-uppercase">
                <?php echo $this->escape($this->params->get('page_heading')); ?>
            </h1>
        </div>
    <?php endif; ?>

    <?php if ($this->params->get('show_tag_title', 1) && !empty($this->tags_title)) : ?>
        <<?php echo $htag; ?> class="uk-h2 uk-text-uppercase tag-title">
            #<?php echo HTMLHelper::_('content.prepare', $this->tags_title, '', 'com_tags.tag'); ?>
        </<?php echo $htag; ?>>
    <?php endif; ?>

    <?php // Описание и изображение тега (если только один тег) ?>
    <?php if ($isSingleTag && !empty($this->item[0]) && ($this->params->get('tag_list_show_tag_image', 1) || $this->params->get('tag_list_show_tag_description', 1))) : ?>
        <div class="tag-description">
            <?php $tagItem = $this->item[0]; ?>
            <?php $images = json_decode($tagItem->images); ?>

            <?php // Изображение тега ?>
            <?php if ($this->params->get('tag_list_show_tag_image', 1) && !empty($images->image_intro)) : ?>
                <?php
                $thumb = $juImg->render(preg_replace($regexImageSrc, '', $images->image_intro), [
                    'w'         => '1920', // Рекомендуется использовать числовые значения без кавычек для размеров
                    'h'         => '720',
                    'q'         => 65,
                    'zc'        => 'C',
                    'far'       => 'C',
                    'webp'      => true,
                    'webp_q'    => 60,
                    'webp_maxq' => 65,
                    'cache'     => 'img'
                ]);
                ?>
                <?php if ($thumb && isset($thumb->webp)) : // Проверка что рендеринг прошел успешно ?>
                    <img src="<?php echo $thumb->webp; ?>" <?php // type="image/webp" не нужен для тега img ?>
                         width="1920" <?php // Укажите реальную ширину, если она отличается от 1920 ?>
                         height="720" <?php // Укажите реальную высоту ?>
                         alt="<?php echo $this->escape(empty($images->image_intro_alt) ? $tagItem->title : $images->image_intro_alt); ?>"
                         loading="lazy" <?php // Добавляем ленивую загрузку для больших изображений ?>
                         itemprop="thumbnailUrl"/>
                <?php endif; ?>
            <?php endif; ?>

            <?php // Описание тега ?>
            <?php if ($this->params->get('tag_list_show_tag_description', 1) && !empty($tagItem->description)) : ?>
                <div class="p-3 mb-2 bg-light text-dark"> <?php // Используйте div вместо h2 для описания, если это не заголовок ?>
                    <?php echo HTMLHelper::_('content.prepare', $tagItem->description, '', 'com_tags.tag'); ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php // Общее описание из параметров меню/компонента (если не показывается описание конкретного тега) ?>
	<?php if ($this->params->get('tag_list_description') && (!$isSingleTag || !$this->params->get('tag_list_show_tag_description'))) : ?>
        <div class="p-3 bg-white text-dark list-description">
            <?php if ($this->params->get('show_description_image', 1) && $this->params->get('tag_list_image')) : ?>
                <?php // Изображение из параметров ?>
                 <img src="<?php echo $this->params->get('tag_list_image'); ?>"
                      alt="<?php echo $this->escape($this->params->get('tag_list_image_alt', '')); ?>"
                      loading="lazy"> <?php // Возможно, стоит использовать HTMLHelper::_('image', ...) для добавления классов ?>
            <?php endif; ?>
            <?php echo HTMLHelper::_('content.prepare', $this->params->get('tag_list_description'), '', 'com_tags.tag'); ?>
        </div>
    <?php endif; ?>


    <?php // Загрузка шаблона для списка элементов ?>
    <?php echo $this->loadTemplate('items'); ?>

    <?php // Пагинация ?>
    <?php if ($this->params->get('show_pagination') && $this->pagination->pagesTotal > 1) : ?>
        <div class="com-tags-tag__pagination pagination-wrap">
             <div class="counter float-end pt-3 pe-2"> <?php // Используем float-end вместо w-100 для лучшего позиционирования ?>
                <?php if ($this->params->get('show_pagination_results', 1)) : ?>
                    <p class="pagination-counter">
                        <?php echo $this->pagination->getPagesCounter(); ?>
                    </p>
                <?php endif; ?>
             </div>
             <?php echo $this->pagination->getPagesLinks(); ?>
        </div>
    <?php endif; ?>
</div>
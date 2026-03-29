<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 * @author      Partially modified for Joomla 5, UIkit 3 (Public Links, No Readmore)
 * @version     1.17 (2025-04-23) // Версия - Всегда публичные ссылки, без "Подробнее"
 *
 * @copyright   (C) 2009 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\Component\Content\Site\Helper\RouteHelper;
use Joomla\Component\Tags\Site\Helper\RouteHelper as TagsHelperRoute; // Нужен для макета tags
use Joomla\CMS\Pagination\Pagination;
use Joomla\Registry\Registry;
use Joomla\CMS\Filesystem\File;

/** @var \Joomla\Component\Contact\Site\View\Contact\HtmlView $this */
$app = Factory::getApplication();
$user = $app->getIdentity(); // Все еще нужен для проверки доступа к тегам
$authorisedViewLevels = $user->getAuthorisedViewLevels();

// --- Получаем статьи и готовим пагинацию ---
$articles = $this->item->articles ?? [];
$limit = (int) $this->params->get('list_limit', 15);
if ($limit === 0) { $limit = 15; }
$currentPage = $app->input->getInt('page', 1);
$totalArticles = count($articles);
$pagination = new Pagination($totalArticles, ($currentPage - 1) * $limit, $limit);
$paginatedArticles = array_slice($articles, $pagination->limitstart, $pagination->limit);
// --- Конец пагинации ---

// --- Параметры отображения ---
$itemParams = $this->item->params;
$linkTitles = $this->params->get('link_titles', 1); // Используется для заголовка и макета intro_image
$showTags   = $this->params->get('show_tags', 1);
$showDate   = $this->params->get('show_publish_date', 1);
// $showReadmore больше не используется

?>
<?php if (!empty($paginatedArticles)) : ?>
<div class="com-contact__articles contact-articles">

    <div class="contact-article-items uk-grid-small uk-grid-match uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m" uk-grid>

        <?php foreach ($paginatedArticles as $article) : ?>
            <?php
            // --- Подготовка данных и ПАРАМЕТРОВ статьи ---
            $article->slug = $article->slug ?? ($article->id ? $article->id . ':' . $article->alias : '');
            $article->catid = $article->catid ?? 0;
            $article->language = $article->language ?? '*';
            $article->title = $article->title ?? '';
            $article->images = $article->images ?? '{}';
            $article->tags = $article->tags ?? null;
            $article->introtext = $article->introtext ?? '';
            $article->publish_up = $article->publish_up ?? ($article->created ?? null);
            // $article->readmore не используется

            // Убедимся, что $article->params есть
            if (!isset($article->params) || !$article->params instanceof Registry) {
                $article->params = new Registry();
            }

            // --- УБРАНА проверка access-view ---

            // Передаем нужные параметры в $article->params для макета intro_image
            if (!$article->params->exists('link_titles')) {
                 $article->params->set('link_titles', $linkTitles);
            }
             // Устанавливаем access-view в true для макета intro_image, чтобы он всегда создавал ссылку (если link_titles включен)
            $article->params->set('access-view', true);


            // Генерируем URL статьи
            $articleLink = '#';
             try {
                 if (!empty($article->slug) && !empty($article->catid)) {
                    $articleLink = Route::_(RouteHelper::getArticleRoute($article->slug, $article->catid, $article->language));
                 }
             } catch (\Exception $e) {
                  Factory::getApplication()->enqueueMessage('Error generating article route for article ID ' . ($article->id ?? 'N/A') . ': ' . $e->getMessage(), 'warning');
             }
            ?>

            <div class="contact-article-item" itemprop="blogPost" itemscope itemtype="https://schema.org/Article">
                <div class="uk-card uk-card-default uk-padding-remove-horizontal uk-box-shadow-small uk-box-shadow-hover-large uk-border-rounded uk-overflow-hidden">

                    <?php
                    // 1. Изображение + Оверлей (через ВАШ кастомный макет intro_image.php)
                    // Теперь он всегда будет пытаться сделать картинку ссылкой (если link_titles включен)
                    try {
                        echo LayoutHelper::render('joomla.content.intro_image', $article);
                    } catch (\Exception $e) {
                         Factory::getApplication()->enqueueMessage('Error rendering intro_image layout: ' . $e->getMessage(), 'error');
                         echo '<div class="uk-card-media-top uk-background-muted uk-height-small uk-flex uk-flex-center uk-flex-middle">'.Text::_('JGLOBAL_LAYOUT_LOAD_ERROR').'</div>';
                    }
                    ?>

                    <div class="uk-card-body uk-padding-small">

                        <?php // 2.1 Заголовок статьи (ссылка зависит только от $linkTitles) ?>
                        <h3 class="uk-card-title uk-h6 uk-text-bold uk-margin-remove-top uk-margin-small-bottom">
                             <?php if ($linkTitles) : // Проверяем ТОЛЬКО параметр linkTitles ?>
                                <a href="<?php echo $articleLink; ?>" class="uk-link-heading">
                                    <?php echo $this->escape($article->title); ?>
                                </a>
                             <?php else : ?>
                                 <?php echo $this->escape($article->title); ?>
                             <?php endif; ?>
                        </h3>

                        <?php // 2.2 Дата публикации ?>
                        <?php if ($showDate && !empty($article->publish_up)) : ?>
                            <p class="uk-article-meta uk-text-small uk-margin-remove-top uk-margin-small-bottom">
                                <span uk-icon="icon: calendar; ratio: 0.8"></span>
                                <?php echo HTMLHelper::_('date', $article->publish_up, Text::_('DATE_FORMAT_LC3')); ?>
                            </p>
                        <?php endif; ?>

                        <?php // 2.3 Теги (Метки) - через ваш макет ?>
                        <?php if ($showTags && isset($article->tags) && !empty($article->tags->itemTags)) : ?>
                            <div class="uk-margin-small-top">
                                <?php echo LayoutHelper::render('joomla.content.tags', $article->tags->itemTags); ?>
                            </div>
                        <?php endif; ?>

                        <?php // 2.4 Кнопка "Читать далее" - УДАЛЕНА ?>

                    </div> <?php // end uk-card-body ?>
                </div> <?php // end uk-card container ?>
            </div> <?php // end grid item ?>
        <?php endforeach; ?>

    </div> <?php // end uk-grid ?>

    <?php // --- Пагинация --- ?>
    <?php if ($pagination->pagesTotal > 1) : ?>
        <div class="pagination-wrap uk-margin-medium-top uk-text-center">
            <?php echo $pagination->getPagesLinks(['pagination' => 'uk-pagination']); ?>
        </div>
    <?php endif; ?>

</div>
<?php endif; ?>
<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * @version     Joomla 6 WMARKA Core Edition (Archive Items)
 */

declare(strict_types=1);

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;

/** @var \Joomla\Component\Content\Site\View\Archive\HtmlView $this */

$params = $this->params;

// --- УЛЬТРА-ТИПОГРАФ (Для красивых кавычек) ---
$typograph = function (?string $text): string {
    if (empty($text)) return '';
    return preg_replace_callback('#(([\"]{2,})|(?![^\W])(\"))|([^\s][\"]+(?![\w]))#u', function ($m) {
        if (count($m) === 3) return "«»";
        return (!empty($m[1])) ? str_replace('"', "«", $m[1]) : str_replace('"', "»", $m[4] ?? '"');
    }, $text) ?? $text;
};
?>

<div class="com-content-archive__items">
    
    <?php if (!empty($this->items)) : ?>
        <ul class="uk-list uk-list-large uk-list-divider">
            
            <?php foreach ($this->items as $i => $item) : ?>
                <li class="uk-margin-bottom">
                    <article class="uk-article">
                        
                        <?php /* ЗАГОЛОВОК СТАТЬИ */ ?>
                        <h3 class="uk-article-title uk-margin-small-bottom uk-h4">
                            <a class="uk-link-heading" href="<?php echo Route::_(RouteHelper::getArticleRoute($item->slug, $item->catid, $item->language)); ?>">
                                <?php echo $typograph($this->escape($item->title)); ?>
                            </a>
                        </h3>

                        <?php /* ИНФО-БЛОК (Дата, Автор, Категория) */ ?>
                        <?php if ($params->get('show_author') || $params->get('show_parent_category') || $params->get('show_category') || $params->get('show_publish_date')) : ?>
                            <div class="uk-article-meta uk-margin-small-bottom">
                                <?php echo LayoutHelper::render('joomla.content.info_block', ['item' => $item, 'params' => $params, 'position' => 'above']); ?>
                            </div>
                        <?php endif; ?>

                        <?php /* ВВОДНЫЙ ТЕКСТ */ ?>
                        <?php if ($params->get('show_intro')) : ?>
                            <div class="uk-text-muted uk-margin-small-bottom">
                                <?php echo HTMLHelper::_('string.truncate', strip_tags((string) $item->introtext), 160); ?>
                            </div>
                        <?php endif; ?>

                        <?php /* КНОПКА ПОДРОБНЕЕ */ ?>
                        <div class="uk-margin-small-top">
                            <a href="<?php echo Route::_(RouteHelper::getArticleRoute($item->slug, $item->catid, $item->language)); ?>" class="uk-button uk-button-text uk-text-primary">
                                <?php echo Text::_('TPL_WMARKA_READ_MORE'); ?> <span uk-icon="arrow-right"></span>
                            </a>
                        </div>
                        
                    </article>
                </li>
            <?php endforeach; ?>
            
        </ul>

        <?php /* ПАГИНАЦИЯ */ ?>
        <?php if (($params->def('show_pagination', 1) == 1 || ($params->get('show_pagination') == 2)) && ($this->pagination->pagesTotal > 1)) : ?>
            <div class="uk-margin-large-top uk-flex uk-flex-between uk-flex-middle uk-flex-wrap">
                <div class="wmarka-pagination">
                    <?php echo $this->pagination->getPagesLinks(); ?>
                </div>
                <?php if ($params->def('show_pagination_results', 1)) : ?>
                    <div class="uk-text-meta">
                        <?php echo $this->pagination->getPagesCounter(); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    <?php else : ?>
        
        <?php /* СООБЩЕНИЕ, ЕСЛИ СТАТЕЙ НЕТ */ ?>
        <div class="uk-alert-primary" uk-alert>
            <span uk-icon="info" class="uk-margin-small-right"></span>
            <?php echo Text::_('COM_CONTENT_NO_ARTICLES'); ?>
        </div>
        
    <?php endif; ?>
    
</div>
<?php
/**
 * WMARKA — полная статья (uk-article).
 * Порядок и события — как в ядре; служебная строка, метки, изображение
 * (профиль full), тело, ссылки, навигация «назад / далее».
 * Передаёт данные в SEO-движок: OG-картинка, даты, автор, рубрика.
 *
 * @var \Joomla\Component\Content\Site\View\Article\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Content\Administrator\Extension\ContentComponent;
use Joomla\Component\Content\Site\Helper\RouteHelper;
use Wmarka\Template\Image;
use Wmarka\Template\Seo;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$item     = $this->item;
$params   = $item->params;
$canEdit  = $params->get('access-edit');
$user     = $this->getCurrentUser();
$info     = (int) $params->get('info_block_position', 0);
$htag     = $this->params->get('show_page_heading') ? 'h2' : 'h1';
$assoc    = Associations::isEnabled() && $params->get('show_associations');
$now      = Factory::getDate()->format('Y-m-d H:i:s');
$notYet   = $item->publish_up > $now;
$expired  = !\is_null($item->publish_down) && $item->publish_down < $now;
$tagsBottom = \Wmarka\Template\Config::bool('article_tags_bottom', true);
$useInfo  = $params->get('show_modify_date') || $params->get('show_publish_date') || $params->get('show_create_date')
    || $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category') || $params->get('show_author') || $assoc;

// SEO: данные материала для OpenGraph и JSON-LD
$seoImage = Image::source($item, 'full');
Seo::page([
    'type'        => 'article',
    'headline'    => $item->title,
    'description' => $item->introtext ?: $item->text,
    'image'       => $seoImage['src'],
    'published'   => Ui::iso($item->publish_up),
    'modified'    => Ui::iso($item->modified),
    'author'      => $params->get('show_author') ? ($item->created_by_alias ?: ($item->author ?? '')) : '',
    'section'     => $item->category_title ?? '',
]);
?>
<article class="uk-article com-content-article item-page<?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Article">
    <meta itemprop="inLanguage" content="<?php echo ($item->language === '*') ? Factory::getApplication()->get('language') : $item->language; ?>">

    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1 class="uk-heading-small"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
    <?php endif; ?>

    <?php if (!empty($item->pagination) && !$item->paginationposition && $item->paginationrelative) : ?>
        <?php echo $item->pagination; ?>
    <?php endif; ?>

    <?php if ($params->get('show_category') && !empty($item->category_title)) : ?>
        <p class="uk-text-small uk-margin-remove-bottom">
            <?php if ($params->get('link_category') && !empty($item->catslug)) : ?>
                <a class="uk-text-primary" href="<?php echo Route::_(RouteHelper::getCategoryRoute($item->catslug, $item->category_language ?? '*')); ?>" itemprop="genre"><?php echo $this->escape($item->category_title); ?></a>
            <?php else : ?>
                <span class="uk-text-primary" itemprop="genre"><?php echo $this->escape($item->category_title); ?></span>
            <?php endif; ?>
        </p>
    <?php endif; ?>

    <?php if ($params->get('show_title')) : ?>
        <<?php echo $htag; ?> class="uk-article-title uk-margin-small-top uk-margin-remove-bottom" itemprop="headline"><?php echo Ui::title($item->title); ?></<?php echo $htag; ?>>
        <?php if ($item->state == ContentComponent::CONDITION_UNPUBLISHED) : ?>
            <span class="uk-label uk-label-warning"><?php echo Text::_('JUNPUBLISHED'); ?></span>
        <?php endif; ?>
        <?php if ($notYet) : ?>
            <span class="uk-label uk-label-warning"><?php echo Text::_('JNOTPUBLISHEDYET'); ?></span>
        <?php endif; ?>
        <?php if ($expired) : ?>
            <span class="uk-label uk-label-danger"><?php echo Text::_('JEXPIRED'); ?></span>
        <?php endif; ?>
    <?php endif; ?>

    <?php if ($canEdit) : ?>
        <?php echo LayoutHelper::render('joomla.content.icons', ['params' => $params, 'item' => $item]); ?>
    <?php endif; ?>

    <?php echo $item->event->afterDisplayTitle; ?>

    <?php if ($useInfo && ($info === 0 || $info === 2)) : ?>
        <?php echo LayoutHelper::render('joomla.content.info_block', ['item' => $item, 'params' => $params, 'position' => 'above', 'nocategory' => true]); ?>
    <?php endif; ?>

    <?php if ($info === 0 && !$tagsBottom && $params->get('show_tags', 1) && !empty($item->tags->itemTags)) : ?>
        <?php echo LayoutHelper::render('joomla.content.tags', $item->tags->itemTags); ?>
    <?php endif; ?>

    <?php echo $item->event->beforeDisplayContent; ?>

    <?php if ((int) $params->get('urls_position', 0) === 0) : ?>
        <?php echo $this->loadTemplate('links'); ?>
    <?php endif; ?>

    <?php if ($params->get('access-view')) : ?>
        <?php // Видеоновость со встроенным плеером: обложку не дублируем, первым идёт видео ?>
        <?php if (!(\Wmarka\Template\Ui::mediaKind((array) ($item->tags->itemTags ?? [])) === 'video' && str_contains((string) $item->text, '<iframe'))) : ?>
            <div class="uk-margin-medium-top"><?php echo LayoutHelper::render('joomla.content.full_image', $item); ?></div>
        <?php endif; ?>

        <?php if (!empty($item->pagination) && !$item->paginationposition && !$item->paginationrelative) : ?>
            <?php echo $item->pagination; ?>
        <?php endif; ?>

        <?php if (isset($item->toc)) : ?>
            <?php echo $item->toc; ?>
        <?php endif; ?>

        <div class="com-content-article__body" itemprop="articleBody" data-wm-content data-wm-lead>
            <?php echo $item->text; ?>
        </div>

        <?php if ($tagsBottom && $params->get('show_tags', 1) && !empty($item->tags->itemTags)) : ?>
            <div class="uk-margin-medium-top"><?php echo LayoutHelper::render('joomla.content.tags', $item->tags->itemTags); ?></div>
        <?php endif; ?>

        <?php if (\Wmarka\Template\Config::bool('share_buttons', true)) : ?>
            <?php
            $shareUrl   = rawurlencode(Uri::getInstance()->toString());
            $shareTitle = rawurlencode((string) $item->title);
            $share      = [
                'whatsapp' => 'https://wa.me/?text=' . $shareTitle . '%20' . $shareUrl,
                'telegram' => 'https://t.me/share/url?url=' . $shareUrl . '&text=' . $shareTitle,
                'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=' . $shareUrl,
                'x'        => 'https://twitter.com/intent/tweet?url=' . $shareUrl . '&text=' . $shareTitle,
            ];
            ?>
            <div class="uk-flex uk-flex-middle uk-margin-medium-top">
                <span class="uk-text-meta uk-margin-small-right"><?php echo Text::_('TPL_WMARKA_SHARE'); ?></span>
                <?php foreach ($share as $net => $href) : ?>
                    <a class="uk-icon-button uk-margin-xsmall-right" href="<?php echo $href; ?>" target="_blank" rel="noopener nofollow" uk-icon="<?php echo $net; ?>" aria-label="<?php echo ucfirst($net); ?>"></a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (\Wmarka\Template\Config::bool('article_author_box', true) && $params->get('show_author') && ($author = \Wmarka\Template\Helper::authorContact((int) $item->created_by))) : ?>
            <div class="uk-card uk-card-default uk-card-small uk-card-body uk-margin-medium-top" itemprop="author" itemscope itemtype="https://schema.org/Person">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <?php if ($author['image']) : ?>
                        <div class="uk-width-auto"><?php echo Image::img($author['image'], $author['name'], ['class' => 'uk-border-circle', 'width' => 64, 'height' => 64, 'itemprop' => 'image']); ?></div>
                    <?php endif; ?>
                    <div class="uk-width-expand">
                        <p class="uk-text-meta uk-margin-remove"><?php echo Text::_('TPL_WMARKA_AUTHOR'); ?></p>
                        <p class="uk-text-bold uk-margin-remove"><a class="uk-link-heading" href="<?php echo $author['link']; ?>" itemprop="url"><span itemprop="name"><?php echo $this->escape($author['name']); ?></span></a></p>
                        <?php if ($author['position'] !== '') : ?><p class="uk-text-small uk-text-muted uk-margin-remove" itemprop="jobTitle"><?php echo $this->escape($author['position']); ?></p><?php endif; ?>
                    </div>
                    <div class="uk-width-1-1 uk-width-auto@s"><a class="uk-button uk-button-default uk-button-small" href="<?php echo $author['link']; ?>"><?php echo Text::_('TPL_WMARKA_AUTHOR_ALL'); ?></a></div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($info === 1 || $info === 2) : ?>
            <?php if ($useInfo) : ?>
                <?php echo LayoutHelper::render('joomla.content.info_block', ['item' => $item, 'params' => $params, 'position' => 'below']); ?>
            <?php endif; ?>
            <?php if (!$tagsBottom && $params->get('show_tags', 1) && !empty($item->tags->itemTags)) : ?>
                <?php echo LayoutHelper::render('joomla.content.tags', $item->tags->itemTags); ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (!empty($item->pagination) && $item->paginationposition && !$item->paginationrelative) : ?>
            <?php echo $item->pagination; ?>
        <?php endif; ?>

        <?php if ((int) $params->get('urls_position', 0) === 1) : ?>
            <?php echo $this->loadTemplate('links'); ?>
        <?php endif; ?>

    <?php elseif ($params->get('show_noauth') && $user->guest) : ?>
        <?php echo LayoutHelper::render('joomla.content.intro_image', $item); ?>
        <?php echo HTMLHelper::_('content.prepare', $item->introtext); ?>
        <?php if ($params->get('show_readmore') && $item->fulltext != null) : ?>
            <?php
            $active = Factory::getApplication()->getMenu()->getActive();
            $login  = new Uri(Route::_('index.php?option=com_users&view=login' . ($active ? '&Itemid=' . $active->id : ''), false));
            $login->setVar('return', base64_encode(RouteHelper::getArticleRoute($item->slug, $item->catid, $item->language)));
            ?>
            <div class="uk-margin"><?php echo LayoutHelper::render('joomla.content.readmore', ['item' => $item, 'params' => $params, 'link' => $login]); ?></div>
        <?php endif; ?>
    <?php endif; ?>

    <?php if (!empty($item->pagination) && $item->paginationposition && $item->paginationrelative) : ?>
        <?php echo $item->pagination; ?>
    <?php endif; ?>

    <?php echo $item->event->afterDisplayContent; ?>
</article>

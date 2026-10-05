<?php
/**
 * WMARKA — таблица материалов категории: фильтр, сортировка по столбцам,
 * лимит, миниатюры (опция WMARKA), пагинация. uk-table-responsive на мобильных.
 *
 * @var \Joomla\Component\Content\Site\View\Category\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Content\Administrator\Extension\ContentComponent;
use Joomla\Component\Content\Site\Helper\RouteHelper;
use Wmarka\Template\Image;
use Wmarka\Template\Seo;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$this->getDocument()->getWebAssetManager()->useScript('com_content.articles-list');

$listOrder  = $this->escape($this->state->get('list.ordering'));
$listDirn   = $this->escape($this->state->get('list.direction'));
$filter     = $this->params->get('filter_field');
$langFilter = false;
$thumbs     = (bool) $this->params->get('wm_list_thumbs', 0);

if ($filter === 'tag' && Multilanguage::isEnabled()) {
    $tagfilter  = ComponentHelper::getParams('com_tags')->get('tag_list_language_filter');
    $langFilter = $tagfilter === 'current_language' ? Factory::getApplication()->getLanguage()->getTag() : ($tagfilter === 'all' ? false : $tagfilter);
}

$isEditable = false;

foreach ($this->items as $article) {
    if ($article->params->get('access-edit')) {
        $isEditable = true;
        break;
    }
}

$sort = static fn (string $label, string $field): string => Ui::bridge((string) HTMLHelper::_('grid.sort', $label, $field, $listDirn, $listOrder, null, 'asc', '', 'adminForm'));
?>
<form action="<?php echo htmlspecialchars(Uri::getInstance()->toString(), ENT_QUOTES, 'UTF-8'); ?>" method="post" name="adminForm" id="adminForm">
    <?php
    $wmSelect = null;

    if ($filter === 'tag') {
        $wmSelect = '<select name="filter_tag" id="filter-search" class="uk-select uk-form-small" onchange="this.form.submit()" aria-label="' . Ui::esc(Text::_('JOPTION_SELECT_TAG')) . '"><option value="">' . Text::_('JOPTION_SELECT_TAG') . '</option>'
            . HTMLHelper::_('select.options', HTMLHelper::_('tag.options', ['filter.published' => [1], 'filter.language' => $langFilter], true), 'value', 'text', $this->state->get('filter.tag')) . '</select>';
    } elseif ($filter === 'month') {
        $wmSelect = '<select name="filter-search" id="filter-search" class="uk-select uk-form-small" onchange="this.form.submit()" aria-label="' . Ui::esc(Text::_('JOPTION_SELECT_MONTH')) . '"><option value="">' . Text::_('JOPTION_SELECT_MONTH') . '</option>'
            . HTMLHelper::_('select.options', HTMLHelper::_('content.months', $this->state), 'value', 'text', $this->state->get('list.filter')) . '</select>';
    }

    echo \Joomla\CMS\Layout\LayoutHelper::render('wmarka.filterbar', [
        'search'  => \in_array($filter, ['hide', 'tag', 'month'], true) ? null : ['name' => 'filter-search', 'value' => (string) $this->state->get('list.filter'), 'label' => Text::_('COM_CONTENT_' . $filter . '_FILTER_LABEL')],
        'select'  => $wmSelect,
        'buttons' => $filter !== 'hide',
        'limit'   => $this->params->get('show_pagination_limit') ? $this->pagination->getLimitBox() : null,
    ]);
    ?>

    <?php if (empty($this->items)) : ?>
        <?php if ($this->params->get('show_no_articles', 1)) : ?>
            <div class="uk-alert-primary" uk-alert><p><?php echo Text::_('COM_CONTENT_NO_ARTICLES'); ?></p></div>
        <?php endif; ?>
    <?php else : ?>
        <div class="uk-overflow-auto">
        <table class="uk-table uk-table-divider uk-table-hover uk-table-middle uk-table-responsive">
            <caption class="uk-hidden-visually"><?php echo Text::_('COM_CONTENT_ARTICLES_TABLE_CAPTION'); ?></caption>
            <thead<?php echo $this->params->get('show_headings', '1') ? '' : ' class="uk-hidden-visually"'; ?>>
                <tr>
                    <th scope="col" class="uk-table-expand"><?php echo $sort('JGLOBAL_TITLE', 'a.title'); ?></th>
                    <?php if ($date = $this->params->get('list_show_date')) : ?>
                        <th scope="col" class="uk-table-shrink uk-text-nowrap"><?php echo $sort('COM_CONTENT_' . $date . '_DATE', ['created' => 'a.created', 'modified' => 'a.modified', 'published' => 'a.publish_up'][$date] ?? 'a.created'); ?></th>
                    <?php endif; ?>
                    <?php if ($this->params->get('list_show_author')) : ?>
                        <th scope="col" class="uk-table-shrink uk-text-nowrap"><?php echo $sort('JAUTHOR', 'author'); ?></th>
                    <?php endif; ?>
                    <?php if ($this->params->get('list_show_hits')) : ?>
                        <th scope="col" class="uk-table-shrink uk-text-nowrap"><?php echo $sort('JGLOBAL_HITS', 'a.hits'); ?></th>
                    <?php endif; ?>
                    <?php if ($this->params->get('list_show_votes', 0) && $this->vote) : ?>
                        <th scope="col" class="uk-table-shrink"><?php echo $sort('COM_CONTENT_VOTES', 'rating_count'); ?></th>
                    <?php endif; ?>
                    <?php if ($this->params->get('list_show_ratings', 0) && $this->vote) : ?>
                        <th scope="col" class="uk-table-shrink"><?php echo $sort('COM_CONTENT_RATINGS', 'rating'); ?></th>
                    <?php endif; ?>
                    <?php if ($isEditable) : ?>
                        <th scope="col" class="uk-table-shrink"><?php echo Text::_('COM_CONTENT_EDIT_ITEM'); ?></th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($this->items as $article) : ?>
                <?php
                $canView = \in_array($article->access, $this->user->getAuthorisedViewLevels());
                $link    = Route::_(RouteHelper::getArticleRoute($article->slug, $article->catid, $article->language));

                if ($canView) {
                    Seo::addListItem((string) $article->title, $link);
                }
                ?>
                <tr<?php echo $article->state == ContentComponent::CONDITION_UNPUBLISHED ? ' class="uk-text-muted"' : ''; ?>>
                    <td>
                        <div class="uk-flex uk-flex-middle">
                            <?php if ($thumbs && ($thumb = Image::intro($article, false))) : ?>
                                <a href="<?php echo $link; ?>" class="uk-margin-small-right uk-flex-none uk-width-small" tabindex="-1" aria-hidden="true"><?php echo Image::img($thumb, '', ['class' => 'uk-width-1-1', 'sizes' => '150px']); ?></a>
                            <?php endif; ?>
                            <div>
                                <?php if ($canView) : ?>
                                    <a class="uk-link-heading" href="<?php echo $link; ?>"><?php echo Ui::title($article->title); ?></a>
                                <?php else : ?>
                                    <?php
                                    $active = Factory::getApplication()->getMenu()->getActive();
                                    $login  = new Uri(Route::_('index.php?option=com_users&view=login' . ($active ? '&Itemid=' . $active->id : ''), false));
                                    $login->setVar('return', base64_encode(RouteHelper::getArticleRoute($article->slug, $article->catid, $article->language)));
                                    ?>
                                    <?php echo Ui::title($article->title); ?> — <a href="<?php echo $login; ?>"><?php echo Text::_('COM_CONTENT_REGISTER_TO_READ_MORE'); ?></a>
                                <?php endif; ?>
                                <?php if ($article->state == ContentComponent::CONDITION_UNPUBLISHED) : ?>
                                    <span class="uk-label uk-label-warning"><?php echo Text::_('JUNPUBLISHED'); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </td>
                    <?php if ($this->params->get('list_show_date')) : ?>
                        <td class="uk-text-nowrap uk-text-meta"><?php echo HTMLHelper::_('date', $article->displayDate, $this->escape($this->params->get('date_format', Text::_('DATE_FORMAT_LC3')))); ?></td>
                    <?php endif; ?>
                    <?php if ($this->params->get('list_show_author')) : ?>
                        <td class="uk-text-nowrap uk-text-meta">
                            <?php $author = $article->created_by_alias ?: $article->author; ?>
                            <?php if (!empty($article->contact_link) && $this->params->get('link_author')) : ?>
                                <a href="<?php echo $article->contact_link; ?>"><?php echo $this->escape($author); ?></a>
                            <?php else : ?>
                                <?php echo $this->escape($author); ?>
                            <?php endif; ?>
                        </td>
                    <?php endif; ?>
                    <?php if ($this->params->get('list_show_hits')) : ?>
                        <td class="uk-text-meta"><span class="uk-badge"><?php echo (int) $article->hits; ?></span></td>
                    <?php endif; ?>
                    <?php if ($this->params->get('list_show_votes', 0) && $this->vote) : ?>
                        <td class="uk-text-meta"><?php echo (int) $article->rating_count; ?></td>
                    <?php endif; ?>
                    <?php if ($this->params->get('list_show_ratings', 0) && $this->vote) : ?>
                        <td class="uk-text-meta"><?php echo $article->rating; ?></td>
                    <?php endif; ?>
                    <?php if ($isEditable) : ?>
                        <td><?php echo $article->params->get('access-edit') ? Ui::bridge((string) HTMLHelper::_('contenticon.edit', $article, $article->params)) : ''; ?></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    <?php endif; ?>

    <?php if ($this->category->getParams()->get('access-create')) : ?>
        <div class="uk-margin"><?php echo Ui::bridge((string) HTMLHelper::_('contenticon.create', $this->category, $this->category->params)); ?></div>
    <?php endif; ?>

    <?php if (!empty($this->items) && ($this->params->def('show_pagination', 2) == 1 || $this->params->get('show_pagination') == 2) && $this->pagination->pagesTotal > 1) : ?>
        <?php echo $this->pagination->getPagesLinks(); ?>
        <?php if ($this->params->def('show_pagination_results', 1)) : ?>
            <p class="uk-text-meta uk-text-center"><?php echo $this->pagination->getPagesCounter(); ?></p>
        <?php endif; ?>
    <?php endif; ?>

    <input type="hidden" name="filter_order" value="">
    <input type="hidden" name="filter_order_Dir" value="">
    <input type="hidden" name="limitstart" value="">
    <input type="hidden" name="task" value="">
</form>

<?php
/**
 * WMARKA — все метки сеткой карточек. Опции ядра: «Колонки», изображение
 * метки, описание и «Максимум символов» (0 — лимит анонса шаблона),
 * просмотры, фильтр, «Кол-во на странице», счётчик страниц.
 *
 * @var \Joomla\Component\Tags\Site\View\Tags\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Tags\Site\Helper\RouteHelper;
use Wmarka\Template\Card;
use Wmarka\Template\Image;
use Wmarka\Template\Seo;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$columns = max(1, min(6, (int) $this->params->get('tag_columns', 3)));
$levels  = $this->getCurrentUser()->getAuthorisedViewLevels();
$limit   = (int) $this->params->get('all_tags_tag_maximum_characters', 0) ?: Ui::introLimit($this->params);
$image   = (bool) $this->params->get('all_tags_show_tag_image', 1);
$desc    = (bool) $this->params->get('all_tags_show_tag_description', 1);
$hits    = (bool) $this->params->get('all_tags_show_tag_hits', 0);
?>
<?php if ($this->params->get('filter_field') || $this->params->get('show_pagination_limit')) : ?>
    <form action="<?php echo htmlspecialchars(Uri::getInstance()->toString(), ENT_QUOTES, 'UTF-8'); ?>" method="post" name="adminForm" id="adminForm">
        <?php echo LayoutHelper::render('wmarka.filterbar', [
            'search'  => $this->params->get('filter_field') ? ['name' => 'filter-search', 'value' => (string) $this->state->get('list.filter'), 'label' => Text::_('COM_TAGS_TITLE_FILTER_LABEL')] : null,
            'buttons' => true,
            'limit'   => $this->params->get('show_pagination_limit') ? $this->pagination->getLimitBox() : null,
        ]); ?>
        <input type="hidden" name="limitstart" value="">
        <input type="hidden" name="task" value="">
    </form>
<?php endif; ?>

<?php if (empty($this->items)) : ?>
    <div class="uk-alert-primary" uk-alert><p><?php echo Text::_('COM_TAGS_NO_TAGS'); ?></p></div>
<?php return; endif; ?>

<div class="uk-grid-medium <?php echo Ui::columns($columns); ?> uk-grid-match" uk-grid>
    <?php foreach ($this->items as $item) : ?>
        <?php if (empty($item->access) || !\in_array($item->access, $levels)) { continue; } ?>
        <?php
        $link = Route::_(RouteHelper::getComponentTagRoute($item->id . ':' . $item->alias, $item->language));
        Seo::addListItem((string) $item->title, $link);
        $meta = $hits ? [Text::sprintf('JGLOBAL_HITS_COUNT', (int) $item->hits)] : [];
        ?>
        <div>
            <?php echo Card::render([
                'title'      => '#' . $item->title,
                'link'       => $link,
                'imageLink'  => $link,
                'thumb'      => $image ? Image::intro($item, false) : [],
                'meta'       => $meta,
                'metaBelow'  => true,
                'text'       => $desc ? Ui::excerpt((string) $item->description, $limit) : '',
                'size'       => 'small',
                'titleClass' => 'uk-h4',
                'heading'    => 'h2',
                'hover'      => true,
                'schema'     => '',
                'sizes'      => Image::sizes($columns),
            ]); ?>
        </div>
    <?php endforeach; ?>
</div>

<?php if (($this->params->def('show_pagination', 2) == 1 || $this->params->get('show_pagination') == 2) && $this->pagination->pagesTotal > 1) : ?>
    <?php echo $this->pagination->getPagesLinks(); ?>
    <?php if ($this->params->def('show_pagination_results', 1)) : ?>
        <p class="uk-text-meta uk-text-center"><?php echo $this->pagination->getPagesCounter(); ?></p>
    <?php endif; ?>
<?php endif; ?>

<?php
/**
 * WMARKA — макет «Каталог меток»: карточки с картинкой метки (профиль intro),
 * названием и описанием, клиентский фильтр по названию.
 *
 * @var \Joomla\Component\Tags\Site\View\Tags\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Tags\Site\Helper\RouteHelper;
use Wmarka\Template\Card;
use Wmarka\Template\Seo;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$levels  = $this->getCurrentUser()->getAuthorisedViewLevels();
$columns = max(1, min(6, (int) $this->params->get('tag_columns', 3)));
$cards   = [];

foreach ($this->items as $item) {
    if (empty($item->access) || !\in_array($item->access, $levels)) {
        continue;
    }

    $link = Route::_(RouteHelper::getComponentTagRoute($item->id . ':' . $item->alias, $item->language));
    Seo::addListItem((string) $item->title, $link);

    $desc    = $this->params->get('all_tags_show_tag_description', 1) ? Ui::excerpt((string) $item->description, (int) $this->params->get('all_tags_tag_maximum_characters', 0) ?: Ui::introLimit($this->params)) : '';
    $cards[] = ['title' => (string) $item->title, 'link' => $link, 'imageLink' => $link, 'thumb' => \Wmarka\Template\Image::intro($item), 'meta' => $this->params->get('all_tags_show_tag_hits') ? [Text::sprintf('JGLOBAL_HITS_COUNT', (int) $item->hits)] : [], 'metaBelow' => true, 'text' => $desc, 'hover' => true, 'heading' => 'h2', 'size' => 'small', 'titleClass' => 'uk-h4', 'attrs' => 'data-wm-filter-text="' . Ui::esc(mb_strtolower((string) $item->title)) . '"'];
}
?>
<div class="com-tags wm-tags-catalog">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1 class="uk-heading-small"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
    <?php endif; ?>

    <?php if (!$cards) : ?>
        <div class="uk-alert-primary" uk-alert><p><?php echo Text::_('COM_TAGS_NO_TAGS'); ?></p></div>
    <?php else : ?>
        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1 uk-width-medium@s">
                <span class="uk-form-icon" uk-icon="icon: search; ratio: 0.8"></span>
                <input class="uk-input uk-form-small" type="search" data-wm-filter="#wm-tags-catalog" placeholder="<?php echo Ui::esc(Text::_('COM_TAGS_TITLE_FILTER_LABEL')); ?>" aria-label="<?php echo Ui::esc(Text::_('COM_TAGS_TITLE_FILTER_LABEL')); ?>">
            </div>
        </div>
        <div id="wm-tags-catalog" class="uk-grid-medium <?php echo Ui::columns($columns); ?> uk-grid-match" uk-grid>
            <?php foreach ($cards as $card) : ?>
                <div><?php echo Card::render($card); ?></div>
            <?php endforeach; ?>
        </div>
        <?php if ($this->pagination->pagesTotal > 1) : ?>
            <?php echo $this->pagination->getPagesLinks(); ?>
        <?php endif; ?>
    <?php endif; ?>
</div>

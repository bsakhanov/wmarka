<?php
/**
 * WMARKA — карточки категорий: картинка категории (профиль intro), название,
 * число материалов, описание, подкатегории ссылками. Рекурсия — как в ядре.
 *
 * @var \Joomla\Component\Content\Site\View\Categories\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;
use Wmarka\Template\Image;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

if ($this->maxLevelcat == 0 || empty($this->items[$this->parent->id])) {
    return;
}

$top = !isset($this->wmDepth);
$this->wmDepth = ($this->wmDepth ?? 0) + 1;
?>
<?php if ($top) : ?>
<div class="uk-grid-medium uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-match" uk-grid>
<?php else : ?>
<ul class="uk-list uk-margin-small-top">
<?php endif; ?>
    <?php foreach ($this->items[$this->parent->id] as $item) : ?>
        <?php if (!$this->params->get('show_empty_categories_cat') && !$item->numitems && !\count($item->getChildren())) : ?>
            <?php continue; ?>
        <?php endif; ?>
        <?php $link = Route::_(RouteHelper::getCategoryRoute($item->id, $item->language)); ?>
        <?php if ($top) : ?>
            <div>
                <div class="uk-card uk-card-default uk-card-hover uk-overflow-hidden">
                    <?php if ($this->params->get('show_description_image') && ($thumb = Image::thumb($item->getParams()->get('image'), 'intro', false))) : ?>
                        <a class="uk-display-block" href="<?php echo $link; ?>" tabindex="-1" aria-hidden="true"><?php echo Image::img($thumb, (string) $item->getParams()->get('image_alt', ''), ['class' => 'uk-width-1-1']); ?></a>
                    <?php endif; ?>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title uk-margin-remove">
                            <a class="uk-link-heading" href="<?php echo $link; ?>"><?php echo Ui::title($item->title); ?></a>
                            <?php if ($this->params->get('show_cat_num_articles_cat') == 1) : ?>
                                <span class="uk-badge" title="<?php echo Ui::esc(Text::_('COM_CONTENT_NUM_ITEMS')); ?>"><?php echo (int) $item->numitems; ?></span>
                            <?php endif; ?>
                        </h3>
                        <?php if ($this->params->get('show_subcat_desc_cat') == 1 && $item->description) : ?>
                            <div class="uk-text-small uk-text-muted uk-margin-small-top"><?php echo HTMLHelper::_('content.prepare', $item->description, '', 'com_content.categories'); ?></div>
                        <?php endif; ?>
        <?php else : ?>
            <li>
                <a class="uk-link-text" href="<?php echo $link; ?>"><?php echo Ui::title($item->title); ?></a>
                <?php if ($this->params->get('show_cat_num_articles_cat') == 1) : ?><span class="uk-text-meta">(<?php echo (int) $item->numitems; ?>)</span><?php endif; ?>
        <?php endif; ?>

        <?php if (\count($item->getChildren()) > 0 && $this->maxLevelcat > 1) : ?>
            <?php
            $this->items[$item->id] = $item->getChildren();
            $this->parent = $item;
            $this->maxLevelcat--;
            echo $this->loadTemplate('items');
            $this->parent = $item->getParent();
            $this->maxLevelcat++;
            ?>
        <?php endif; ?>

        <?php if ($top) : ?>
                    </div>
                </div>
            </div>
        <?php else : ?>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
<?php if ($top) : ?>
</div>
<?php else : ?>
</ul>
<?php endif; ?>
<?php
$this->wmDepth--;

if ($this->wmDepth === 0) {
    unset($this->wmDepth);
}

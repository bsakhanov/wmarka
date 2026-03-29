<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * @version     Joomla 6 WMARKA Core Edition (List View + UIkit 3 Toggle)
 */

declare(strict_types=1);

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;

/** @var \Joomla\Component\Content\Site\View\Categories\HtmlView $this */
?>

<?php if ($this->maxLevelcat != 0 && count($this->items[$this->parent->id]) > 0) : ?>
    <ul class="com-content-categories__items uk-list uk-list-large uk-list-divider">
        
        <?php foreach ($this->items[$this->parent->id] as $id => $item) : ?>
            <?php if ($this->params->get('show_empty_categories_cat') || $item->numitems || count($item->getChildren())) : ?>
                <li class="com-content-categories__item">
                    
                    <?php /* --- ШАПКА КАТЕГОРИИ (Заголовок + Кнопка) --- */ ?>
                    <div class="com-content-categories__item-title-wrapper uk-flex uk-flex-between uk-flex-middle">
                        
                        <div class="uk-flex-inline uk-flex-middle com-content-categories__item-title">
                            <a class="uk-link-heading uk-h4 uk-margin-remove-bottom" href="<?php echo Route::_(RouteHelper::getCategoryRoute($item->id, $item->language)); ?>">
                                <?php echo $this->escape($item->title); ?>
                            </a>
                            
                            <?php if ($this->params->get('show_cat_num_articles_cat') == 1) : ?>
                                <span class="uk-badge uk-margin-small-left" title="<?php echo Text::_('COM_CONTENT_NUM_ITEMS'); ?>" uk-tooltip>
                                    <?php echo $item->numitems; ?>
                                </span>
                            <?php endif; ?>
                        </div>

                        <?php /* Нативная кнопка раскрытия UIkit 3 (uk-toggle) */ ?>
                        <?php if (count($item->getChildren()) > 0 && $this->maxLevelcat > 1) : ?>
                            <a href="#category-<?php echo $item->id; ?>" uk-toggle class="uk-icon-button uk-button-small" aria-label="<?php echo Text::_('JGLOBAL_EXPAND_CATEGORIES'); ?>">
                                <span uk-icon="icon: chevron-down" aria-hidden="true"></span>
                            </a>
                        <?php endif; ?>
                        
                    </div>

                    <?php /* --- ИЗОБРАЖЕНИЕ КАТЕГОРИИ --- */ ?>
                    <?php if ($this->params->get('show_description_image') && $item->getParams()->get('image')) : ?>
                        <div class="uk-margin-small-top">
                            <img src="<?php echo $item->getParams()->get('image'); ?>" alt="<?php echo htmlspecialchars((string) $item->getParams()->get('image_alt'), ENT_COMPAT, 'UTF-8'); ?>" class="uk-border-rounded uk-box-shadow-small">
                        </div>
                    <?php endif; ?>

                    <?php /* --- ОПИСАНИЕ КАТЕГОРИИ --- */ ?>
                    <?php if ($this->params->get('show_subcat_desc_cat') == 1 && $item->description) : ?>
                        <div class="com-content-categories__description category-desc uk-margin-small-top uk-text-muted">
                            <?php echo HTMLHelper::_('content.prepare', $item->description, '', 'com_content.categories'); ?>
                        </div>
                    <?php endif; ?>

                    <?php /* --- ВЛОЖЕННЫЕ ПОДКАТЕГОРИИ (РЕКУРСИЯ) --- */ ?>
                    <?php if (count($item->getChildren()) > 0 && $this->maxLevelcat > 1) : ?>
                        <div class="com-content-categories__children uk-margin-top uk-padding-small uk-background-muted uk-border-rounded" id="category-<?php echo $item->id; ?>" hidden>
                            <?php
                            $this->items[$item->id] = $item->getChildren();
                            $this->parent = $item;
                            $this->maxLevelcat--;
                            echo $this->loadTemplate('items');
                            $this->parent = $item->getParent();
                            $this->maxLevelcat++;
                            ?>
                        </div>
                    <?php endif; ?>
                    
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
        
    </ul>
<?php endif; ?>
<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * @version     WMARKA ULTRA (Categories Tree + JUImage + UIkit Accordion)
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;

/** @var \Joomla\Component\Content\Site\View\Categories\HtmlView $this */

// Проверка уровней вложенности и наличия элементов
if ($this->maxLevelcat != 0 && count($this->items[$this->parent->id]) > 0) : ?>
    <div class="com-content-categories__items uk-grid-small uk-child-width-1-1" uk-grid>
        
        <?php foreach ($this->items[$this->parent->id] as $id => $item) : ?>
            <?php 
            // Условие отображения: не пустая, или разрешен показ пустых
            if ($this->params->get('show_empty_categories_cat') || $item->numitems || count($item->getChildren())) : ?>
            
            <div class="com-content-categories__item">
                <div class="uk-card uk-card-default uk-card-small uk-border-rounded uk-overflow-hidden">
                    
                    <div class="uk-card-header uk-flex uk-flex-middle uk-flex-between">
                        <h3 class="uk-card-title uk-margin-remove uk-text-bold uk-text-break">
                            <a href="<?php echo Route::_(RouteHelper::getCategoryRoute($item->id, $item->language)); ?>" class="uk-link-reset">
                                <?php echo $this->escape($item->title); ?>
                            </a>
                            
                            <?php /* Счетчик материалов */ ?>
                            <?php if ($this->params->get('show_cat_num_articles_cat') == 1) : ?>
                                <span class="uk-badge uk-margin-small-left" title="<?php echo Text::_('COM_CONTENT_NUM_ITEMS'); ?>">
                                    <?php echo $item->numitems; ?>
                                </span>
                            <?php endif; ?>
                        </h3>

                        <?php /* Кнопка развертывания подкатегорий (UIkit style) */ ?>
                        <?php if (count($item->getChildren()) > 0 && $this->maxLevelcat > 1) : ?>
                            <button class="uk-button uk-button-default uk-button-small uk-border-rounded" 
                                    type="button" 
                                    uk-toggle="target: #category-<?php echo $item->id; ?>; animation: uk-animation-fade"
                                    aria-label="<?php echo Text::_('JGLOBAL_EXPAND_CATEGORIES'); ?>">
                                <span uk-icon="icon: plus; ratio: 0.8"></span>
                            </button>
                        <?php endif; ?>
                    </div>

                    <?php /* Изображение категории с оптимизацией JUImage */ ?>
                    <?php if ($this->params->get('show_description_image') && ($img = $item->getParams()->get('image'))) : ?>
                        <div class="uk-card-media-top">
                            <a href="<?php echo Route::_(RouteHelper::getCategoryRoute($item->id, $item->language)); ?>">
                                <?php echo Joomla\CMS\Layout\LayoutHelper::render(
                                    'joomla.html.image',
                                    [
                                        'src' => $img,
                                        'alt' => $item->getParams()->get('image_alt'),
                                        'loading' => 'lazy',
                                        'class' => 'wmarka-optimized-img'
                                    ]
                                ); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php /* Описание подкатегории */ ?>
                    <?php if ($this->params->get('show_subcat_desc_cat') == 1 && $item->description) : ?>
                        <div class="uk-card-body uk-padding-small uk-text-meta">
                            <?php echo HTMLHelper::_('content.prepare', $item->description, '', 'com_content.categories'); ?>
                        </div>
                    <?php endif; ?>

                    <?php /* РЕКУРСИВНЫЙ ВЫВОД ПОДКАТЕГОРИЙ */ ?>
                    <?php if (count($item->getChildren()) > 0 && $this->maxLevelcat > 1) : ?>
                        <div class="uk-card-footer uk-background-muted" id="category-<?php echo $item->id; ?>" hidden>
                            <?php
                            $this->items[$item->id] = $item->getChildren();
                            $this->parent = $item;
                            $this->maxLevelcat--;
                            
                            // Загружаем этот же шаблон для следующего уровня
                            echo $this->loadTemplate('items');
                            
                            $this->parent = $item->getParent();
                            $this->maxLevelcat++;
                            ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
            <?php endif; ?>
        <?php endforeach; ?>

    </div>
<?php endif; ?>

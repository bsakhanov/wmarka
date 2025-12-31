<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * @version     WMARKA ULTRA (Blog Children + UIkit 3 + Schema.org)
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;

/** @var \Joomla\Component\Content\Site\View\Category\HtmlView $this */

$user   = $this->getCurrentUser();
$groups = $user->getAuthorisedViewLevels();

// Проверяем наличие дочерних категорий
if (count($this->children[$this->category->id]) > 0) : ?>
    <div class="uk-margin-medium-top blog-children-container" itemscope itemtype="https://schema.org/ItemList">
        
        <?php foreach ($this->children[$this->category->id] as $id => $child) : ?>
            <?php 
            // Проверка прав доступа и условий отображения
            if (in_array($child->access, $groups) && ($this->params->get('show_empty_categories') || $child->getNumItems(true) || count($child->getChildren()))) : ?>
                
                <div class="uk-card uk-card-default uk-card-small uk-margin-small-bottom uk-border-rounded" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    
                    <div class="uk-card-header uk-flex uk-flex-middle uk-flex-between">
                        <h4 class="uk-margin-remove uk-text-bold">
                            <a href="<?php echo Route::_(RouteHelper::getCategoryRoute($child->id, $child->language)); ?>" class="uk-link-reset" itemprop="item">
                                <span itemprop="name"><?php echo $this->escape($child->title); ?></span>
                            </a>
                            
                            <?php /* Счетчик материалов */ ?>
                            <?php if ($this->params->get('show_cat_num_articles', 1)) : ?>
                                <span class="uk-badge uk-margin-small-left" title="<?php echo Text::_('COM_CONTENT_NUM_ITEMS'); ?>">
                                    <?php echo $child->getNumItems(true); ?>
                                </span>
                            <?php endif; ?>
                        </h4>

                        <?php /* Кнопка раскрытия вложенных уровней (UIkit Toggle) */ ?>
                        <?php if (count($child->getChildren()) > 0 && $this->maxLevel > 1) : ?>
                            <button class="uk-button uk-button-text" 
                                    type="button" 
                                    uk-toggle="target: #subcat-<?php echo $child->id; ?>; animation: uk-animation-fade"
                                    aria-label="<?php echo Text::_('JGLOBAL_EXPAND_CATEGORIES'); ?>">
                                <span uk-icon="icon: plus; ratio: 0.8"></span>
                            </button>
                        <?php endif; ?>
                    </div>

                    <?php /* Описание подкатегории */ ?>
                    <?php if ($this->params->get('show_subcat_desc') == 1 && $child->description) : ?>
                        <div class="uk-card-body uk-padding-small uk-text-meta" itemprop="description">
                            <?php echo HTMLHelper::_('content.prepare', $child->description, '', 'com_content.category'); ?>
                        </div>
                    <?php endif; ?>

                    <?php /* Рекурсивный вызов для глубокой вложенности */ ?>
                    <?php if (count($child->getChildren()) > 0 && $this->maxLevel > 1) : ?>
                        <div id="subcat-<?php echo $child->id; ?>" class="uk-card-footer uk-background-muted" hidden>
                            <?php
                            $this->children[$child->id] = $child->getChildren();
                            $this->category = $child;
                            $this->maxLevel--;
                            
                            // Загружаем этот же шаблон для вложенных уровней
                            echo $this->loadTemplate('children');
                            
                            $this->category = $child->getParent();
                            $this->maxLevel++;
                            ?>
                        </div>
                    <?php endif; ?>

                    <meta itemprop="position" content="<?php echo $id + 1; ?>">
                </div>
                
            <?php endif; ?>
        <?php endforeach; ?>

    </div>
<?php endif; ?>

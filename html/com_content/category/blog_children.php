<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * @version     Joomla 6 WMARKA BLOG CHILDREN (UIkit 3 Cards)
 */

declare(strict_types=1);

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;

$lang   = $this->getLanguage();
$user   = $this->getCurrentUser();
$groups = $user->getAuthorisedViewLevels();

if ($this->maxLevel != 0 && count($this->children[$this->category->id]) > 0) : ?>
    <?php foreach ($this->children[$this->category->id] as $id => $child) : ?>
        
        <?php if (in_array($child->access, $groups)) : ?>
            <?php if ($this->params->get('show_empty_categories') || $child->getNumItems(true) || count($child->getChildren())) : ?>
            
            <?php /* Обертка элемента сетки */ ?>
            <div class="com-content-category-blog__child">
                
                <?php /* КАРТОЧКА ПОДКАТЕГОРИИ (UIkit 3) */ ?>
                <div class="uk-card uk-card-default uk-card-hover uk-card-small uk-card-body uk-border-rounded uk-height-1-1 uk-flex uk-flex-column">
                    
                    <h3 class="uk-card-title uk-h4 uk-margin-remove-bottom">
                        <a class="uk-link-heading" href="<?php echo Route::_(RouteHelper::getCategoryRoute($child->id, $child->language)); ?>">
                            <?php echo $this->escape($child->title); ?>
                        </a>
                        
                        <?php /* Бейдж количества статей */ ?>
                        <?php if ($this->params->get('show_cat_num_articles', 1)) : ?>
                            <span class="uk-badge uk-margin-small-left" title="<?php echo Text::_('COM_CONTENT_NUM_ITEMS'); ?>" uk-tooltip>
                                <?php echo $child->getNumItems(true); ?>
                            </span>
                        <?php endif; ?>
                    </h3>

                    <?php /* Описание подкатегории */ ?>
                    <?php if ($this->params->get('show_subcat_desc') == 1 && $child->description) : ?>
                        <div class="category-desc uk-text-meta uk-margin-small-top uk-flex-auto">
                            <?php echo HTMLHelper::_('content.prepare', $child->description, '', 'com_content.category'); ?>
                        </div>
                    <?php endif; ?>

                    <?php /* Раскрывающийся список глубоких подкатегорий (Toggle) */ ?>
                    <?php if ($this->maxLevel > 1 && count($child->getChildren()) > 0) : ?>
                        
                        <div class="uk-margin-small-top">
                            <a href="#category-<?php echo $child->id; ?>" uk-toggle class="uk-button uk-button-text uk-text-muted uk-text-small">
                                <?php echo Text::_('JGLOBAL_EXPAND_CATEGORIES'); ?> <span uk-icon="icon: chevron-down; ratio: 0.7"></span>
                            </a>
                        </div>
                        
                        <?php /* Контейнер для рекурсивного вызова (скрыт по умолчанию) */ ?>
                        <div id="category-<?php echo $child->id; ?>" class="uk-margin-top uk-text-left" hidden>
                            <hr class="uk-margin-small">
                            <div class="uk-grid-small uk-child-width-1-1" uk-grid>
                                <?php
                                $this->children[$child->id] = $child->getChildren();
                                $this->category = $child;
                                $this->maxLevel--;
                                echo $this->loadTemplate('children');
                                $this->category = $child->getParent();
                                $this->maxLevel++;
                                ?>
                            </div>
                        </div>

                    <?php endif; ?>

                </div>
            </div>
            
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>
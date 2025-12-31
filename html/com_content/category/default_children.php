<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;

/** @var \Joomla\Component\Content\Site\View\Category\HtmlView $this */
$user   = $this->getCurrentUser();
$groups = $user->getAuthorisedViewLevels();

if (count($this->children[$this->category->id]) > 0) : ?>
    <div class="uk-margin-medium-top" itemscope itemtype="https://schema.org/ItemList">
        <?php foreach ($this->children[$this->category->id] as $id => $child) : ?>
            <?php if (in_array($child->access, $groups)) : ?>
                <?php if ($this->params->get('show_empty_categories') || $child->getNumItems(true) || count($child->getChildren())) : ?>
                    
                    <div class="uk-card uk-card-default uk-card-small uk-margin-small-bottom uk-border-rounded">
                        <div class="uk-card-header uk-flex uk-flex-middle uk-flex-between">
                            <h3 class="uk-card-title uk-margin-remove uk-text-bold">
                                <a href="<?php echo Route::_(RouteHelper::getCategoryRoute($child->id, $child->language)); ?>" class="uk-link-reset">
                                    <?php echo $this->escape($child->title); ?>
                                </a>
                                <?php if ($this->params->get('show_cat_num_articles', 1)) : ?>
                                    <span class="uk-badge uk-margin-small-left" title="<?php echo Text::_('COM_CONTENT_NUM_ITEMS'); ?>">
                                        <?php echo $child->getNumItems(true); ?>
                                    </span>
                                <?php endif; ?>
                            </h3>

                            <?php if (count($child->getChildren()) > 0 && $this->maxLevel > 1) : ?>
                                <button class="uk-button uk-button-text" type="button" 
                                        uk-toggle="target: #child-<?php echo $child->id; ?>; animation: uk-animation-fade">
                                    <span uk-icon="icon: plus; ratio: 0.8"></span>
                                </button>
                            <?php endif; ?>
                        </div>

                        <?php if ($this->params->get('show_subcat_desc') == 1 && $child->description) : ?>
                            <div class="uk-card-body uk-padding-small uk-text-meta">
                                <?php echo HTMLHelper::_('content.prepare', $child->description, '', 'com_content.category'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (count($child->getChildren()) > 0 && $this->maxLevel > 1) : ?>
                            <div id="child-<?php echo $child->id; ?>" class="uk-card-footer uk-background-muted" hidden>
                                <?php
                                $this->children[$child->id] = $child->getChildren();
                                $this->category = $child;
                                $this->maxLevel--;
                                echo $this->loadTemplate('children');
                                $this->category = $child->getParent();
                                $this->maxLevel++;
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>

                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

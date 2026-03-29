<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * @version     Joomla 6 WMARKA Core Edition (UIkit 3 Category Children)
 *
 * @copyright   (C) 2009 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
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
?>

<?php if (count($this->children[$this->category->id]) > 0) : ?>
    <?php foreach ($this->children[$this->category->id] as $id => $child) : ?>
        <?php // Check whether category access level allows access to subcategories. ?>
        <?php if (in_array($child->access, $groups)) : ?>
            <?php if ($this->params->get('show_empty_categories') || $child->getNumItems(true) || count($child->getChildren())) : ?>
            <div class="com-content-category__children uk-margin-bottom">
                
                <?php if ($lang->isRtl()) : ?>
                <h3 class="page-header item-title uk-h4 uk-margin-remove-bottom">
                    <?php if ($this->params->get('show_cat_num_articles', 1)) : ?>
                        <span class="uk-badge uk-margin-small-right" title="<?php echo HTMLHelper::_('tooltipText', 'COM_CONTENT_NUM_ITEMS'); ?>" uk-tooltip>
                            <?php echo $child->getNumItems(true); ?>
                        </span>
                    <?php endif; ?>
                    <a class="uk-link-heading" href="<?php echo Route::_(RouteHelper::getCategoryRoute($child->id, $child->language)); ?>">
                        <?php echo $this->escape($child->title); ?>
                    </a>

                    <?php if (count($child->getChildren()) > 0 && $this->maxLevel > 1) : ?>
                        <a href="#category-<?php echo $child->id; ?>" uk-toggle class="uk-icon-button uk-button-small uk-float-left" uk-icon="chevron-down" aria-label="<?php echo Text::_('JGLOBAL_EXPAND_CATEGORIES'); ?>"></a>
                    <?php endif; ?>
                </h3>
                
                <?php else : ?>
                <h3 class="page-header item-title uk-h4 uk-margin-remove-bottom">
                    <a class="uk-link-heading" href="<?php echo Route::_(RouteHelper::getCategoryRoute($child->id, $child->language)); ?>">
                        <?php echo $this->escape($child->title); ?>
                    </a>
                    <?php if ($this->params->get('show_cat_num_articles', 1)) : ?>
                        <span class="uk-badge uk-margin-small-left" title="<?php echo HTMLHelper::_('tooltipText', 'COM_CONTENT_NUM_ITEMS'); ?>" uk-tooltip>
                            <?php echo $child->getNumItems(true); ?>
                        </span>
                    <?php endif; ?>

                    <?php if (count($child->getChildren()) > 0 && $this->maxLevel > 1) : ?>
                        <a href="#category-<?php echo $child->id; ?>" uk-toggle class="uk-icon-button uk-button-small uk-float-right" uk-icon="chevron-down" aria-label="<?php echo Text::_('JGLOBAL_EXPAND_CATEGORIES'); ?>"></a>
                    <?php endif; ?>
                </h3>
                <?php endif; ?>

                <?php if ($this->params->get('show_subcat_desc') == 1) : ?>
                    <?php if ($child->description) : ?>
                        <div class="category-desc uk-text-meta uk-margin-small-top">
                            <?php echo HTMLHelper::_('content.prepare', $child->description, '', 'com_content.category'); ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if (count($child->getChildren()) > 0 && $this->maxLevel > 1) : ?>
                <div class="uk-margin-top uk-padding-small uk-background-muted uk-border-rounded" id="category-<?php echo $child->id; ?>" hidden>
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
<?php endif; ?>
<?php
/**
 * WMARKA — дочерние категории (общий для блога и списка): uk-list с
 * числом материалов и описанием, рекурсия по уровням как в ядре.
 *
 * @var \Joomla\Component\Content\Site\View\Category\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$groups = $this->getCurrentUser()->getAuthorisedViewLevels();

if ($this->maxLevel == 0 || empty($this->children[$this->category->id])) {
    return;
}
?>
<ul class="uk-list uk-list-divider">
    <?php foreach ($this->children[$this->category->id] as $child) : ?>
        <?php if (!\in_array($child->access, $groups) || (!$this->params->get('show_empty_categories') && !$child->numitems && !\count($child->getChildren()))) : ?>
            <?php continue; ?>
        <?php endif; ?>
        <li>
            <a class="uk-link-heading uk-text-bold" href="<?php echo Route::_(RouteHelper::getCategoryRoute($child->id, $child->language)); ?>"><?php echo Ui::title($child->title); ?></a>
            <?php if ($this->params->get('show_cat_num_articles', 1)) : ?>
                <span class="uk-badge uk-margin-small-left" title="<?php echo Ui::esc(\Joomla\CMS\Language\Text::_('COM_CONTENT_NUM_ITEMS')); ?>"><?php echo (int) $child->numitems; ?></span>
            <?php endif; ?>
            <?php if ($this->params->get('show_subcat_desc') == 1 && $child->description) : ?>
                <div class="uk-text-small uk-text-muted uk-margin-xsmall-top"><?php echo HTMLHelper::_('content.prepare', $child->description, '', 'com_content.category'); ?></div>
            <?php endif; ?>
            <?php if (\count($child->getChildren()) > 0 && $this->maxLevel > 1) : ?>
                <?php
                $this->children[$child->id] = $child->getChildren();
                $this->category = $child;
                $this->maxLevel--;
                echo '<div class="uk-margin-small-left uk-margin-small-top">' . $this->loadTemplate('children') . '</div>';
                $this->category = $child->getParent();
                $this->maxLevel++;
                ?>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>

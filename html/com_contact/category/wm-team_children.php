<?php
/**
 * WMARKA — дочерние категории контактов.
 *
 * @var \Joomla\Component\Contact\Site\View\Category\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Router\Route;
use Joomla\Component\Contact\Site\Helper\RouteHelper;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

if ($this->maxLevel == 0 || empty($this->children[$this->category->id])) {
    return;
}
?>
<ul class="uk-list uk-list-divider">
    <?php foreach ($this->children[$this->category->id] as $child) : ?>
        <?php if (!$this->params->get('show_empty_categories') && !$child->numitems && !\count($child->getChildren())) { continue; } ?>
        <li>
            <a class="uk-link-heading" href="<?php echo Route::_(RouteHelper::getCategoryRoute($child->id, $child->language)); ?>"><?php echo Ui::title($child->title); ?></a>
            <?php if ($this->params->get('show_cat_items', 1)) : ?><span class="uk-badge uk-margin-small-left"><?php echo (int) $child->numitems; ?></span><?php endif; ?>
            <?php if ($this->params->get('show_subcat_desc') == 1 && $child->description) : ?>
                <div class="uk-text-small uk-text-muted"><?php echo \Joomla\CMS\HTML\HTMLHelper::_('content.prepare', $child->description, '', 'com_contact.category'); ?></div>
            <?php endif; ?>
            <?php if (\count($child->getChildren()) > 0 && $this->maxLevel > 1) : ?>
                <?php
                $this->children[$child->id] = $child->getChildren();
                $this->category = $child;
                $this->maxLevel--;
                echo '<div class="uk-margin-small-left">' . $this->loadTemplate('children') . '</div>';
                $this->category = $child->getParent();
                $this->maxLevel++;
                ?>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>

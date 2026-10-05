<?php
/**
 * WMARKA — список категорий контактов с числом контактов и описанием.
 *
 * @var \Joomla\Component\Contact\Site\View\Categories\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;
use Joomla\Component\Contact\Site\Helper\RouteHelper;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

if ($this->maxLevelcat == 0 || empty($this->items[$this->parent->id])) {
    return;
}
?>
<ul class="uk-list uk-list-divider">
    <?php foreach ($this->items[$this->parent->id] as $item) : ?>
        <?php if (!$this->params->get('show_empty_categories_cat') && !$item->numitems && !\count($item->getChildren())) { continue; } ?>
        <li>
            <a class="uk-link-heading uk-text-bold" href="<?php echo Route::_(RouteHelper::getCategoryRoute($item->id, $item->language)); ?>"><?php echo Ui::title($item->title); ?></a>
            <?php if ($this->params->get('show_cat_items_cat') == 1) : ?><span class="uk-badge uk-margin-small-left"><?php echo (int) $item->numitems; ?></span><?php endif; ?>
            <?php if ($this->params->get('show_subcat_desc_cat') == 1 && $item->description) : ?>
                <div class="uk-text-small uk-text-muted"><?php echo HTMLHelper::_('content.prepare', $item->description, '', 'com_contact.categories'); ?></div>
            <?php endif; ?>
            <?php if ($this->maxLevelcat > 1 && \count($item->getChildren()) > 0) : ?>
                <div class="uk-margin-small-left">
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
    <?php endforeach; ?>
</ul>

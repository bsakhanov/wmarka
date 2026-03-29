<?php
defined('_JEXEC') or die;

use Joomla\CMS\Router\Route;
use Joomla\Component\Tags\Site\Helper\RouteHelper;

/** @var \Joomla\Component\Tags\Site\View\Tags\HtmlView $this */

$items = $this->items;

if (empty($items)) : ?>
    <div class="uk-alert uk-alert-warning">Метки не найдены.</div>
<?php else : 

    $itemsByParent = [];
    foreach ($items as $item) {
        $itemsByParent[(int)$item->parent_id][] = $item;
    }

    $renderTree = function($pId, $source, $params, &$renderTree) {
        if (!isset($source[$pId])) return;

        foreach ($source[$pId] as $item) {
            $isRoot = ($item->level <= 1);
            $padding = ($item->level - 1) * 25;
            ?>
            <li class="tree-item <?php echo $isRoot ? 'is-root' : 'is-child'; ?>" 
                data-parent-id="<?php echo $item->parent_id; ?>"
                style="padding-left: <?php echo $padding; ?>px;">
                
                <div class="uk-flex uk-flex-middle">
                    <div class="uk-margin-small-right">
                        <?php if ($isRoot) : ?>
                            <span uk-icon="icon: folder; ratio: 0.85" class="uk-text-primary"></span>
                        <?php else : ?>
                            <span style="display: inline-block; transform: rotate(90deg);" 
                                  uk-icon="icon: reply; ratio: 0.7" class="uk-text-muted"></span>
                        <?php endif; ?>
                    </div>

                    <div class="uk-flex-1 uk-flex uk-flex-middle uk-flex-between">
                        <a class="uk-link-reset <?php echo $isRoot ? 'uk-text-bold uk-text-emphasis' : 'uk-text-muted uk-text-small'; ?>" 
                           href="<?php echo Route::_(RouteHelper::getTagRoute($item->id . ':' . $item->alias)); ?>">
                            <span class="tag-title"><?php echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8'); ?></span>
                        </a>

                        <?php if ($item->item_count > 0) : ?>
                            <span class="uk-text-meta uk-text-small uk-margin-small-left" style="font-size: 0.7rem; opacity: 0.7;">
                                <?php echo $item->item_count; ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
            <?php
            $renderTree($item->id, $source, $params, $renderTree);
        }
    };
?>

<div class="tag-tree-container uk-margin-medium-top">
    <div class="uk-column-1-2@m uk-column-divider">
        <ul class="uk-list tree-list-root">
            <?php $renderTree(1, $itemsByParent, $this->params, $renderTree); ?>
        </ul>
    </div>
</div>

<style>
.tree-item { position: relative; margin-bottom: 6px !important; list-style: none; }
.tree-item.is-child::before {
    content: "";
    position: absolute;
    left: 12px;
    top: -8px;
    bottom: 50%;
    width: 1px;
    border-left: 1px dashed #ddd;
}
.uk-column-divider { column-gap: 50px; }
.tree-item:hover a { color: #1e87f0 !important; }
/* Улучшаем вид инпута */
.uk-search-input { border-radius: 500px !important; background: #f8f8f8 !important; }
.uk-search-input:focus { background: #fff !important; border-color: #1e87f0 !important; }
</style>

<?php endif; ?>
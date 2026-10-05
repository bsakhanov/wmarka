<?php
/**
 * WMARKA — «Ещё материалы» под блогом.
 *
 * @var \Joomla\Component\Content\Site\View\Category\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';
?>
<h3 class="uk-h4"><?php echo Text::_('COM_CONTENT_MORE_ARTICLES'); ?></h3>
<ul class="uk-list uk-list-divider">
    <?php foreach ($this->link_items as $item) : ?>
        <li>
            <a class="uk-link-heading" href="<?php echo Route::_(RouteHelper::getArticleRoute($item->slug, $item->catid, $item->language)); ?>"><?php echo Ui::title($item->title); ?></a>
            <?php if (Ui::validDate($item->publish_up)) : ?><span class="uk-text-meta uk-margin-small-left"><?php echo Ui::date($item->publish_up); ?></span><?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>

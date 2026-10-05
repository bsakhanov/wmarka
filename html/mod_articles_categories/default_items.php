<?php
/**
 * WMARKA — пункты категорий (рекурсия по паттерну ядра).
 *
 * @var \Joomla\Registry\Registry $params
 * @var array $list
 * @var int   $startLevel
 * @var \Joomla\CMS\Application\SiteApplication $app
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;

$input  = $app->getInput();
$active = $input->getCmd('option') === 'com_content' && \in_array($input->getCmd('view'), ['category', 'categories'], true) ? $input->getInt('id') : 0;

foreach ($list as $item) : ?>
    <li<?php echo $active === (int) $item->id ? ' class="uk-active"' : ''; ?>>
        <a href="<?php echo Route::_(RouteHelper::getCategoryRoute($item->id, $item->language)); ?>" class="uk-flex uk-flex-between uk-flex-middle">
            <span><?php echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8'); ?></span>
            <?php if ($params->get('numitems')) : ?><span class="uk-badge"><?php echo (int) $item->numitems; ?></span><?php endif; ?>
        </a>
        <?php if ($params->get('show_description', 0)) : ?>
            <div class="uk-text-small uk-text-muted"><?php echo HTMLHelper::_('content.prepare', $item->description, $item->getParams(), 'mod_articles_categories.content'); ?></div>
        <?php endif; ?>
        <?php if ($params->get('show_children', 0) && (($params->get('maxlevel', 0) == 0) || ($params->get('maxlevel') >= ($item->level - $startLevel))) && \count($item->getChildren())) : ?>
            <ul class="uk-nav-sub">
                <?php $temp = $list; $list = $item->getChildren(); require ModuleHelper::getLayoutPath('mod_articles_categories', $params->get('layout', 'default') . '_items'); $list = $temp; ?>
            </ul>
        <?php endif; ?>
    </li>
<?php endforeach;

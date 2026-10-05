<?php
/**
 * WMARKA — категории материалов: навигация uk-nav с бейджами-счётчиками.
 *
 * @var \Joomla\Registry\Registry $params
 * @var array $list
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;

if (empty($list)) {
    return;
}
?>
<ul class="uk-nav uk-nav-default">
    <?php require ModuleHelper::getLayoutPath('mod_articles_categories', $params->get('layout', 'default') . '_items'); ?>
</ul>

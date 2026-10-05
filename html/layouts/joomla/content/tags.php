<?php
/**
 * WMARKA — метки материала: строка приглушённых #хэштегов (uk-subnav).
 * Учитывает уровни доступа меток.
 *
 * @var array $displayData массив меток (itemTags)
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Router\Route;
use Joomla\Component\Tags\Site\Helper\RouteHelper;

if (empty($displayData)) {
    return;
}

$levels = Factory::getApplication()->getIdentity()->getAuthorisedViewLevels();
$links  = [];

foreach ((array) $displayData as $tag) {
    if (!\in_array((int) ($tag->access ?? 1), $levels, true)) {
        continue;
    }

    // Плашки только классами UIkit: маленькая кнопка с закруглением uk-border-pill
    $links[] = '<a class="uk-button uk-button-default uk-button-small uk-border-pill uk-margin-xsmall-right" href="' . Route::_(RouteHelper::getComponentTagRoute($tag->tag_id . ':' . $tag->alias, $tag->language)) . '" rel="tag">#'
        . htmlspecialchars($tag->title, ENT_QUOTES, 'UTF-8') . '</a>';
}

if ($links) {
    echo '<div class="uk-margin-small" uk-margin data-wm-tags>' . implode('', $links) . '</div>';
}

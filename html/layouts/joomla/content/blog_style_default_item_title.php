<?php
/**
 * WMARKA — заголовок элемента блога (для сторонних вызовов макета ядра).
 *
 * @var object $displayData
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$params = $displayData->params;

if (!$params->get('show_title')) {
    return;
}

$title = Ui::title($displayData->title);
?>
<h2 class="uk-h3 uk-margin-remove-bottom" itemprop="headline">
    <?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
        <a class="uk-link-heading" href="<?php echo Route::_(RouteHelper::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language)); ?>" itemprop="url"><?php echo $title; ?></a>
    <?php else : ?>
        <?php echo $title; ?>
    <?php endif; ?>
</h2>

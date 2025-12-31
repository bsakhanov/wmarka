<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * @version     WMARKA ULTRA (Blog Item Title + UKit 3 + Typography)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;

// Создаем сокращение для параметров
$params = $displayData->params;

// Логика кавычек-"елочек" для заголовков
$fixQuotes = function ($text) {
    return preg_replace_callback('#(([\"]{2,})|(?![^\W])(\"))|([^\s][\"]+(?![\w]))#u', function ($m) {
        if (count($m) === 3) return "«»";
        return (isset($m[1]) && $m[1]) ? "«" : "»";
    }, $text);
};

$currentDate = Factory::getDate()->format('Y-m-d H:i:s');
$link = RouteHelper::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language);

$showTitle = $params->get('show_title');
$isUnpublished = ($displayData->state == 0);
$isNotPublishedYet = ($displayData->publish_up > $currentDate);
$isExpired = ($displayData->publish_down !== null && $displayData->publish_down < $currentDate);
?>

<?php if ($isUnpublished || $showTitle || ($params->get('show_author') && !empty($displayData->author))) : ?>
    <div class="uk-margin-small-bottom blog-item-header">
        
        <?php if ($showTitle) : ?>
            <h2 class="uk-card-title uk-margin-remove-top uk-text-bold">
                <?php if ($params->get('link_titles') && ($params->get('access-view') || $params->get('show_noauth', '0') == '1')) : ?>
                    <a href="<?php echo Route::_($link); ?>" class="uk-link-reset">
                        <?php echo $fixQuotes($this->escape($displayData->title)); ?>
                    </a>
                <?php else : ?>
                    <?php echo $fixQuotes($this->escape($displayData->title)); ?>
                <?php endif; ?>
            </h2>
        <?php endif; ?>

        <?php /* Вывод меток состояния материала (Снято с публикации / Ожидает / Истекло) */ ?>
        <?php if ($isUnpublished || $isNotPublishedYet || $isExpired) : ?>
            <div class="uk-grid-small uk-child-width-auto uk-margin-small-top" uk-grid>
                <?php if ($isUnpublished) : ?>
                    <div>
                        <span class="uk-label uk-label-warning uk-border-rounded"><?php echo Text::_('JUNPUBLISHED'); ?></span>
                    </div>
                <?php endif; ?>

                <?php if ($isNotPublishedYet) : ?>
                    <div>
                        <span class="uk-label uk-label-warning uk-border-rounded"><?php echo Text::_('JNOTPUBLISHEDYET'); ?></span>
                    </div>
                <?php endif; ?>

                <?php if ($isExpired) : ?>
                    <div>
                        <span class="uk-label uk-label-danger uk-border-rounded"><?php echo Text::_('JEXPIRED'); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>

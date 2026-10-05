<?php
/**
 * WMARKA — элементы архива: строки с миниатюрой, служебной строкой и вводным текстом.
 *
 * @var \Joomla\Component\Content\Site\View\Archive\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;
use Wmarka\Template\Image;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$params = $this->params;
?>
<div id="archive-items" class="uk-child-width-1-1 uk-grid-divider" uk-grid>
    <?php foreach ($this->items as $item) : ?>
        <?php
        $link  = Route::_(RouteHelper::getArticleRoute($item->slug, $item->catid, $item->language));
        $thumb = Image::intro($item, false);
        $info  = (int) $item->params->get('info_block_position', 0);
        ?>
        <article class="uk-grid-medium" uk-grid>
            <?php if ($thumb) : ?>
                <div class="uk-width-1-4@m">
                    <a href="<?php echo $link; ?>" class="uk-display-block uk-inline-clip" tabindex="-1" aria-hidden="true"><?php echo Image::img($thumb, $thumb['alt'], ['class' => 'uk-width-1-1', 'sizes' => '(min-width: 960px) 25vw, 100vw']); ?></a>
                </div>
            <?php endif; ?>
            <div class="uk-width-expand@m">
                <h2 class="uk-h3 uk-margin-remove">
                    <?php if ($params->get('link_titles')) : ?>
                        <a class="uk-link-heading" href="<?php echo $link; ?>"><?php echo Ui::title($item->title); ?></a>
                    <?php else : ?>
                        <?php echo Ui::title($item->title); ?>
                    <?php endif; ?>
                </h2>
                <?php echo $item->event->afterDisplayTitle; ?>
                <?php if ($info === 0 || $info === 2) : ?>
                    <?php echo LayoutHelper::render('joomla.content.info_block', ['item' => $item, 'params' => $params, 'position' => 'above', 'readtime' => false]); ?>
                <?php endif; ?>
                <?php echo $item->event->beforeDisplayContent; ?>
                <?php if ($params->get('show_intro')) : ?>
                    <div class="uk-margin-small-top"><?php echo HTMLHelper::_('string.truncateComplex', $item->introtext, (int) $params->get('introtext_limit')); ?></div>
                <?php endif; ?>
                <?php if ($info === 1 || $info === 2) : ?>
                    <?php echo LayoutHelper::render('joomla.content.info_block', ['item' => $item, 'params' => $params, 'position' => 'below']); ?>
                <?php endif; ?>
                <?php echo $item->event->afterDisplayContent; ?>
            </div>
        </article>
    <?php endforeach; ?>
</div>

<?php if ($this->pagination->pagesTotal > 1) : ?>
    <?php echo $this->pagination->getPagesLinks(); ?>
    <?php if ($params->def('show_pagination_results', 1)) : ?>
        <p class="uk-text-meta uk-text-center"><?php echo $this->pagination->getPagesCounter(); ?></p>
    <?php endif; ?>
<?php endif; ?>

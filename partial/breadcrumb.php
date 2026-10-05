<?php
/**
 * WMARKA — хлебные крошки. Модуль в позиции breadcrumb выводится как есть;
 * без модуля шаблон строит крошки сам из pathway (настройка «Крошки»).
 * Микроразметка BreadcrumbList — одна, в JSON-LD движка Seo.
 *
 * @var \Wmarka\Template\Helper $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Wmarka\Template\Config;
use Wmarka\Template\Ui;

if ($this->isHome()) {
    return;
}

$hasModule = $this->count('breadcrumb') > 0;

if (!$hasModule && !Config::bool('breadcrumbs_auto', true)) {
    return;
}

if (!$hasModule) {
    $pathway = Factory::getApplication()->getPathway()->getPathway();

    if (!$pathway) {
        return;
    }
}
?>
<div id="breadcrumb" class="uk-section uk-section-default uk-section-xsmall uk-padding-remove-bottom">
    <div class="<?php echo Config::container(); ?>">
        <?php if ($hasModule) : ?>
            <?php echo $this->modules('breadcrumb', 'none'); ?>
        <?php else : ?>
            <nav aria-label="<?php echo Ui::esc(Text::_('TPL_WMARKA_BREADCRUMBS')); ?>">
                <ul class="uk-breadcrumb uk-margin-remove">
                    <li><a href="<?php echo Ui::esc(Uri::base(true) . '/'); ?>"><?php echo Text::_('TPL_WMARKA_HOME'); ?></a></li>
                    <?php $last = \count($pathway) - 1; ?>
                    <?php foreach (array_values($pathway) as $i => $crumb) : ?>
                        <?php if ($i < $last && !empty($crumb->link)) : ?>
                            <li><a href="<?php echo Route::_($crumb->link); ?>"><?php echo Ui::title($crumb->name); ?></a></li>
                        <?php else : ?>
                            <li><span<?php echo $i === $last ? ' aria-current="page"' : ''; ?>><?php echo Ui::title($crumb->name); ?></span></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </nav>
        <?php endif; ?>
    </div>
</div>

<?php
/**
 * WMARKA — пагинация UIkit (uk-pagination) для всех списков сайта.
 *
 * @var array $displayData ['list', 'options']
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\Registry\Registry;

$list    = $displayData['list'];
$pages   = $list['pages'];
$options = new Registry($displayData['options']);

if (empty($pages) && !$options->get('showLimitBox', false)) {
    return;
}
?>
<nav class="uk-margin-medium-top" aria-label="<?php echo Text::_('JLIB_HTML_PAGINATION'); ?>">
    <?php if ($options->get('showPagesLinks', true) && !empty($pages)) : ?>
        <ul class="uk-pagination uk-flex-center uk-margin-remove-bottom">
            <?php echo LayoutHelper::render('joomla.pagination.link', $pages['previous']); ?>
            <?php foreach ($pages['pages'] as $page) : ?>
                <?php echo LayoutHelper::render('joomla.pagination.link', $page); ?>
            <?php endforeach; ?>
            <?php echo LayoutHelper::render('joomla.pagination.link', $pages['next']); ?>
        </ul>
    <?php endif; ?>
    <?php if ($options->get('showLimitBox', false)) : ?>
        <div class="uk-flex uk-flex-center uk-flex-middle uk-margin-small-top uk-text-small"><?php echo Text::_('JGLOBAL_DISPLAY_NUM'); ?>&nbsp;<?php echo str_replace('form-select', 'uk-select uk-form-small uk-form-width-xsmall', $list['limitfield']); ?></div>
    <?php endif; ?>
    <?php if ($options->get('showLimitStart', true)) : ?>
        <input type="hidden" name="<?php echo $list['prefix']; ?>limitstart" value="<?php echo $list['limitstart']; ?>">
    <?php endif; ?>
</nav>

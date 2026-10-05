<?php
/**
 * WMARKA — панель над материалами метки (общий макет wmarka.filterbar).
 *
 * @var \Joomla\Component\Tags\Site\View\Tag\HtmlView $this
 * @var bool   $wmSwitch
 * @var string $wmView
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Uri\Uri;
?>
<form action="<?php echo htmlspecialchars(Uri::getInstance()->toString(), ENT_QUOTES, 'UTF-8'); ?>" method="post" name="adminForm" id="adminForm">
    <?php echo LayoutHelper::render('wmarka.filterbar', [
        'search'    => $this->params->get('filter_field') ? ['name' => 'filter-search', 'value' => (string) $this->state->get('list.filter'), 'label' => Text::_('COM_TAGS_TITLE_FILTER_LABEL')] : null,
        'buttons'   => true,
        'limit'     => $this->params->get('show_pagination_limit') ? $this->pagination->getLimitBox() : null,
        'switch'    => !empty($wmSwitch) ? $wmView : null,
        'switchKey' => 'tag',
    ]); ?>
    <input type="hidden" name="limitstart" value="">
    <input type="hidden" name="task" value="">
</form>

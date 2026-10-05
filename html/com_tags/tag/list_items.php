<?php
/**
 * WMARKA — материалы метки таблицей: миниатюра (интро), заголовок, дата, просмотры.
 *
 * @var \Joomla\Component\Tags\Site\View\Tag\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Tags\Site\Helper\RouteHelper;
use Wmarka\Template\Image;
use Wmarka\Template\Seo;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$wmSwitch = false; // таблица — без переключателя вида
$wmView   = 'list';
$thumbs   = (bool) $this->params->get('wm_list_thumbs', 1);
$date     = $this->params->get('tag_list_show_date');
$format   = $this->params->get('date_format', Text::_('DATE_FORMAT_LC3'));

require __DIR__ . '/_filterbar.php';

if (empty($this->items)) : ?>
    <div class="uk-alert-primary" uk-alert><p><?php echo Text::_('COM_TAGS_NO_ITEMS'); ?></p></div>
<?php return; endif; ?>
<div class="uk-overflow-auto">
<table class="uk-table uk-table-divider uk-table-hover uk-table-middle uk-table-responsive">
    <thead<?php echo $this->params->get('show_headings') ? '' : ' class="uk-hidden-visually"'; ?>>
        <tr>
            <th class="uk-table-expand"><?php echo Text::_('JGLOBAL_TITLE'); ?></th>
            <?php if ($date) : ?><th class="uk-table-shrink uk-text-nowrap"><?php echo Text::_('COM_TAGS_' . strtoupper($date) . '_DATE'); ?></th><?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->items as $item) : ?>
            <?php
            $link = Route::_(RouteHelper::getItemRoute($item->content_item_id, $item->core_alias, $item->core_catid, $item->core_language, $item->type_alias, $item->router));
            Seo::addListItem((string) $item->core_title, $link);
            $field = ['published' => 'core_publish_up', 'created' => 'core_created_time', 'modified' => 'core_modified_time'][$date] ?? 'core_publish_up';
            ?>
            <tr>
                <td>
                    <div class="uk-flex uk-flex-middle">
                        <?php if ($thumbs && ($thumb = Image::intro($item, false))) : ?>
                            <a href="<?php echo $link; ?>" class="uk-margin-small-right uk-flex-none uk-width-small" tabindex="-1" aria-hidden="true"><?php echo Image::img($thumb, '', ['class' => 'uk-width-1-1', 'sizes' => '150px']); ?></a>
                        <?php endif; ?>
                        <a class="uk-link-heading" href="<?php echo $link; ?>"><?php echo Ui::title($item->core_title); ?></a>
                    </div>
                </td>
                <?php if ($date) : ?>
                    <td class="uk-text-meta uk-text-nowrap"><?php echo Ui::validDate($item->$field ?? null) ? HTMLHelper::_('date', $item->$field, $format) : ''; ?></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>

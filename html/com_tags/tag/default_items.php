<?php
/**
 * WMARKA — материалы метки карточками. Работают опции ядра пункта меню и
 * компонента «Метки»: изображение материала, описание и его длина
 * («Максимум символов»; 0 — лимит анонса из настроек шаблона), дата и её формат,
 * фильтр и «Кол-во на странице». Вид — вкладка «Опции WMARKA».
 * Миниатюра — тот же интро-файл, что в блоге и модулях.
 *
 * @var \Joomla\Component\Tags\Site\View\Tag\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Tags\Site\Helper\RouteHelper;
use Wmarka\Template\Card;
use Wmarka\Template\Config;
use Wmarka\Template\Seo;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$wmView   = $this->params->get('wm_view', Config::str('blog_view', 'grid')) === 'list' ? 'list' : 'grid';
$wmSwitch = (bool) $this->params->get('wm_switch', 1);
$cols     = max(1, min(6, (int) $this->params->get('wm_columns', 3)));
$masonry  = (bool) $this->params->get('wm_masonry', 1);
$gutter   = Ui::gutter((string) $this->params->get('wm_gutter', 'medium'));
$limit    = (int) $this->params->get('tag_list_item_maximum_characters', 0) ?: Ui::introLimit($this->params);

require __DIR__ . '/_filterbar.php';

if (empty($this->items)) : ?>
    <div class="uk-alert-primary" uk-alert><p><?php echo Text::_('COM_TAGS_NO_ITEMS'); ?></p></div>
<?php return; endif; ?>

<div data-wm-switch="tag" data-wm-view="<?php echo $wmView; ?>">
    <div <?php echo Ui::switchAttr($wmView, Ui::columns($cols), 'uk-child-width-1-1', $gutter . ($masonry ? '' : ' uk-grid-match')); ?> uk-grid<?php echo $masonry ? '="masonry: pack"' : ''; ?>>
        <?php $wmMedia = (string) $this->params->get('wm_media', 'top'); ?>
        <?php foreach (array_values($this->items) as $wmI => $item) : ?>
            <?php
            $link = Route::_(RouteHelper::getItemRoute($item->content_item_id, $item->core_alias, $item->core_catid, $item->core_language, $item->type_alias, $item->router));
            Seo::addListItem((string) $item->core_title, $link);
            $card = Card::tagItem($item, $link, [
                'date'        => (string) $this->params->get('tag_list_show_date', '0'),
                'dateFormat'  => (string) $this->params->get('date_format', ''),
                'description' => (bool) $this->params->get('tag_list_show_item_description', 1),
                'limit'       => $limit,
                'image'       => (bool) $this->params->get('tag_list_show_item_image', 1),
                'view'        => $wmView,
                'switch'      => $wmSwitch,
                'hover'       => true,
                'heading'     => 'h3',
                'media'       => $wmMedia === 'alternate' ? ($wmI % 2 ? 'right' : 'left') : $wmMedia,
                'sizes'       => \Wmarka\Template\Image::sizes($cols),
            ]);
            ?>
            <div><?php echo Card::render($card); ?></div>
        <?php endforeach; ?>
    </div>
</div>

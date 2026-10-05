<?php
/**
 * WMARKA — навигация «предыдущая / следующая статья» (плагин ядра «Контент — Постраничная навигация»).
 *
 * Работают все опции плагина:
 *  - «Текст ссылки» = «Пред./След.» — компактные кнопки со стрелками, названия статей в подсказке;
 *  - «Текст ссылки» = «Заголовок статьи» — две карточки рядом: подпись «Предыдущая статья» /
 *    «Следующая статья», заголовок (длинный обрезается по слову), интро-миниатюра — тот же файл,
 *    что в блоге и модулях (настройка шаблона «Миниатюры в навигации по статьям»);
 *  - «Положение» и «Относительно» обрабатывает макет статьи.
 * На телефоне карточки встают одна под другой.
 *
 * @var object $row       текущий материал (prev, next, prev_label, next_label)
 * @var array  $rows      соседние материалы
 * @var int    $location  позиция текущего в $rows
 *
 * $this — объект плагина: его параметры — $this->params (в $params лежат параметры материала).
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Wmarka\Template\Config;
use Wmarka\Template\Image;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

if (!$row->prev && !$row->next) {
    return;
}

$this->loadLanguage();

$rtl    = Factory::getApplication()->getLanguage()->isRtl();
$prev   = $row->prev ? ($rows[$location - 1] ?? null) : null;
$next   = $row->next ? ($rows[$location + 1] ?? null) : null;
$titles = (int) $this->params->get('display', 0) === 1;
$aria   = Text::_('PLG_PAGENAVIGATION_ARIA_LABEL') !== 'PLG_PAGENAVIGATION_ARIA_LABEL' ? Text::_('PLG_PAGENAVIGATION_ARIA_LABEL') : Text::_('JLIB_HTML_PAGINATION');
$iconP  = 'uk-pagination-' . ($rtl ? 'next' : 'previous');
$iconN  = 'uk-pagination-' . ($rtl ? 'previous' : 'next');

if (!$titles) : ?>
<nav class="uk-margin-medium-top" aria-label="<?php echo Ui::esc($aria); ?>">
    <div class="uk-flex uk-flex-between uk-flex-middle">
        <div>
            <?php if ($prev) : ?>
                <a class="uk-button uk-button-default uk-button-small" href="<?php echo Route::_($row->prev); ?>" rel="prev" title="<?php echo Ui::esc(Text::sprintf('JPREVIOUS_TITLE', $prev->title)); ?>"><span class="uk-margin-small-right" <?php echo $iconP; ?>></span><?php echo Ui::esc($row->prev_label); ?></a>
            <?php endif; ?>
        </div>
        <div>
            <?php if ($next) : ?>
                <a class="uk-button uk-button-default uk-button-small" href="<?php echo Route::_($row->next); ?>" rel="next" title="<?php echo Ui::esc(Text::sprintf('JNEXT_TITLE', $next->title)); ?>"><?php echo Ui::esc($row->next_label); ?><span class="uk-margin-small-left" <?php echo $iconN; ?>></span></a>
            <?php endif; ?>
        </div>
    </div>
</nav>
<?php return; endif;

// Интро-миниатюры соседей одним запросом (у строк плагина нет поля images)
$thumbs = [];

if (Config::bool('pagenav_thumbs', true)) {
    $ids  = array_filter([(int) ($prev->id ?? 0), (int) ($next->id ?? 0)]);
    $data = Image::articles($ids);

    foreach ($data as $id => $article) {
        $thumbs[$id] = Image::intro($article, false);
    }
}

$card = static function (object $item, string $href, string $rel, string $label, string $icon, bool $end) use ($thumbs): string {
    $thumb = $thumbs[(int) $item->id] ?? [];
    $title = Ui::esc(Ui::cut((string) $item->title, 80));
    $img   = $thumb ? '<div class="uk-width-1-4 uk-width-1-3@m' . ($end ? ' uk-flex-last' : '') . '">' . Image::img($thumb, '', ['class' => 'uk-width-1-1', 'sizes' => '(min-width: 640px) 15vw, 25vw']) . '</div>' : '';
    $arrow = '<span ' . $icon . '></span>';
    $kick  = $end ? Ui::esc($label) . ' ' . $arrow : $arrow . ' ' . Ui::esc($label);

    return '<a class="uk-link-toggle uk-display-block uk-card uk-card-default uk-card-small uk-card-hover uk-card-body uk-height-1-1" href="' . $href . '" rel="' . $rel . '">'
        . '<div class="uk-grid-small uk-flex-middle" uk-grid>' . $img
        . '<div class="uk-width-expand' . ($end ? ' uk-text-right@s' : '') . '">'
        . '<div class="uk-text-meta">' . $kick . '</div>'
        . '<div class="uk-link-heading uk-text-bold uk-margin-xsmall-top">' . $title . '</div>'
        . '</div></div></a>';
};
?>
<nav class="uk-margin-large-top" aria-label="<?php echo Ui::esc($aria); ?>">
    <div class="uk-grid-small uk-child-width-1-2@s uk-grid-match" uk-grid>
        <div>
            <?php if ($prev) : ?>
                <?php echo $card($prev, Route::_($row->prev), 'prev', Text::_('TPL_WMARKA_PREV_ARTICLE'), $iconP, false); ?>
            <?php endif; ?>
        </div>
        <div>
            <?php if ($next) : ?>
                <?php echo $card($next, Route::_($row->next), 'next', Text::_('TPL_WMARKA_NEXT_ARTICLE'), $iconN, true); ?>
            <?php endif; ?>
        </div>
    </div>
</nav>

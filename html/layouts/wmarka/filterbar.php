<?php
/**
 * WMARKA — единая панель над списками: поиск по заголовку, выбор (метка, месяц и год),
 * кнопки «Искать / Очистить», «Кол-во на странице» и переключатель «сетка / список».
 *
 * Одна сетка UIkit без вложенности: все элементы — соседи. Кнопки и выбор количества —
 * одна группа действий, она не разрывается при переносе: на телефоне поиск занимает строку,
 * под ним в один ряд «Искать», «Очистить» и количество; с 640 px всё в строку, переключатель
 * вида прижат вправо. Высота всех полей, списков и кнопок одна — переменная --wm-control-h
 * (wmarka.css). Порядок табуляции: поиск → выбор → кнопки → количество → переключатель.
 * Рендерится ВНУТРИ формы вызывающего макета (adminForm ядра).
 *
 * @var array $displayData [
 *   'search' => ['name' => 'filter-search', 'value' => '', 'label' => ''] | null,
 *   'select' => HTML | null (один или несколько списков), 'buttons' => bool,
 *   'clear' => bool (кнопка «Очистить», по умолчанию есть), 'limit' => HTML | null,
 *   'switch' => 'grid'|'list'|null, 'switchKey' => string
 * ]
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$d       = $displayData;
$search  = $d['search'] ?? null;
$select  = $d['select'] ?? null;
$limit   = $d['limit'] ?? null;
$switch  = $d['switch'] ?? null;
$buttons = !empty($d['buttons']) && ($search || $select);
$clear   = $buttons && ($d['clear'] ?? true);

if (!$search && !$select && !$limit && !$switch) {
    return;
}
?>
<div class="wm-filterbar uk-margin">
    <div class="uk-grid-small uk-flex-middle" uk-grid>
        <?php if ($search) : ?>
            <div class="uk-width-1-1 uk-width-medium@s">
                <label class="uk-hidden-visually" for="filter-search"><?php echo Ui::esc($search['label']); ?></label>
                <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: search; ratio: 0.8"></span>
                    <input class="uk-input uk-form-small" type="search" name="<?php echo Ui::esc($search['name'] ?? 'filter-search'); ?>" id="filter-search" value="<?php echo Ui::esc($search['value'] ?? ''); ?>" placeholder="<?php echo Ui::esc($search['label']); ?>">
                </div>
            </div>
        <?php endif; ?>

        <?php if ($select) : ?>
            <div class="uk-width-1-1 uk-width-medium@s"><div class="wm-filterbar__selects"><?php echo $select; ?></div></div>
        <?php endif; ?>

        <?php if ($buttons || $limit) : ?>
            <div class="uk-width-auto">
                <div class="wm-filterbar__actions">
                    <?php if ($buttons) : ?>
                        <button type="submit" name="filter_submit" class="uk-button uk-button-primary uk-button-small"><?php echo Text::_('JGLOBAL_FILTER_BUTTON'); ?></button>
                    <?php endif; ?>
                    <?php if ($clear) : ?>
                        <button type="button" class="uk-button uk-button-default uk-button-small" data-wm-clear><?php echo Text::_('JSEARCH_FILTER_CLEAR'); ?></button>
                    <?php endif; ?>
                    <?php if ($limit) : ?>
                        <label for="limit" class="uk-hidden-visually"><?php echo Text::_('JGLOBAL_DISPLAY_NUM'); ?></label>
                        <?php echo Ui::limitBox($limit); ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($switch) : ?>
            <div class="uk-width-auto uk-margin-auto-left@s" data-wm-switch-proxy="<?php echo Ui::esc($d['switchKey'] ?? ''); ?>"><?php echo Ui::viewSwitch($switch); ?></div>
        <?php endif; ?>
    </div>
</div>

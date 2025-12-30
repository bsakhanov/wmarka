<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
try {
    $wa->useAsset('script', 'field.calendar');
    $wa->useAsset('style', 'field.calendar');
    // Предзагрузка для инициализации
    HTMLHelper::_('calendar', '', 'finder-init', 'finder-init', ['class' => 'uk-hidden']);
} catch (\Exception $e) {}

if ($this->params->get('show_autosuggest', 1)) {
    $wa->usePreset('awesomplete');
}

$showAdvanced = $this->params->get('expand_advanced', 0);
?>

<style>
    /* Прячем системные лейблы и лишние ветки */
    .hidden-raw-data, .field-calendar label, #finder-filter-select-dates label { display: none !important; }
    #finder-filter-select-dates { list-style: none !important; padding: 0 !important; margin: 0 !important; }

    /* Оформление группы календаря в стиле UIkit */
    /* Joomla 6 использует .field-calendar-container или .input-group */
    .field-calendar .input-group, 
    .field-calendar div[class*="group"] { 
        display: flex !important; 
        align-items: stretch; 
        border: 1px solid #ccc; 
        border-radius: 4px; 
        overflow: hidden; 
        height: 35px;
        background: #fff;
    }

    .field-calendar input { border: none !important; flex: 1; padding: 0 10px; font-size: 13px; height: 100% !important; box-shadow: none !important; }
    .field-calendar button { 
        border: none !important; 
        border-left: 1px solid #ccc !important; 
        background: #f5f5f5 !important; 
        padding: 0 12px !important; 
        cursor: pointer !important; 
        color: #333 !important;
    }
    .field-calendar button:hover { background: #eee !important; }

    /* Сетка расширенного поиска */
    .search-advanced-grid { display: flex; flex-wrap: wrap; gap: 15px; align-items: flex-end; }
    .search-advanced-grid > div { flex: 1; min-width: 180px; }
</style>

<form action="<?php echo Route::_($this->query->toUri()); ?>" method="get" class="uk-form-stacked">
    <?php echo $this->getFields(); ?>

    <div class="uk-margin-small-bottom">
        <div class="uk-grid-small uk-flex-middle" uk-grid>
            <div class="uk-width-expand@s">
                <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: search"></span>
                    <input type="text" name="q" id="q" class="uk-input uk-border-rounded" value="<?php echo $this->escape($this->query->input); ?>" placeholder="Поиск новостей...">
                </div>
            </div>
            <div class="uk-width-auto">
                <button type="submit" class="uk-button uk-button-primary uk-border-rounded">Найти</button>
                <button class="uk-button uk-button-default uk-border-rounded" type="button" uk-toggle="target: #advancedSearch">
                    <span uk-icon="icon: settings"></span>
                </button>
            </div>
        </div>
    </div>

    <div id="advancedSearch" class="uk-margin-small-top" <?php echo !$showAdvanced ? 'hidden' : ''; ?>>
        <div class="uk-card uk-card-default uk-card-body uk-background-muted uk-border-rounded uk-padding-small">
            <div class="search-advanced-grid">
                
                <div id="mount-date-1">
                    <div class="uk-text-meta uk-text-bold uk-margin-xsmall-bottom">Дата с:</div>
                </div>

                <div id="mount-date-2">
                    <div class="uk-text-meta uk-text-bold uk-margin-xsmall-bottom">Дата по:</div>
                </div>

                <div id="mount-rubric">
                    <div class="uk-text-meta uk-text-bold uk-margin-xsmall-bottom">Рубрика:</div>
                </div>

            </div>
        </div>
    </div>

    <div class="hidden-raw-data">
        <?php echo HTMLHelper::_('filter.select', $this->query, $this->params); ?>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const raw = document.querySelector('.hidden-raw-data');
    if (!raw) return;

    // 1. ПЕРЕНОС ДАТ (сохраняем оригинальные узлы для работы JS Joomla)
    const dateElements = raw.querySelectorAll('.field-calendar');
    if (dateElements.length >= 2) {
        document.getElementById('mount-date-1').appendChild(dateElements[0]);
        document.getElementById('mount-date-2').appendChild(dateElements[1]);
        
        dateElements.forEach(el => {
            const btn = el.querySelector('button');
            if (btn) btn.innerHTML = '<span uk-icon="icon: calendar; ratio: 0.8"></span>';
        });
    }

    // 2. УМНЫЙ ПЕРЕНОС РУБРИКИ
    const selects = Array.from(raw.querySelectorAll('.filter-branch select'));
    
    if (selects.length > 0) {
        // Сортируем списки по количеству опций (от большего к меньшему)
        // Категории всегда имеют самый длинный список
        selects.sort((a, b) => b.options.length - a.options.length);
        
        const rubric = selects[0]; // Берем самый большой список
        
        if (rubric) {
            rubric.classList.add('uk-select');
            document.getElementById('mount-rubric').appendChild(rubric);
        }
    }
});
</script>
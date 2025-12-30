<?php
/**
 * Часть шаблона: Футер (Footer)
 * Автоматически адаптирует количество колонок в зависимости от активных модулей.
 */

defined('_JEXEC') or die;

/** @var \Wmarka\Template\Helper $this */
$doc = $this->doc; // Используем наш Helper

// Определяем список позиций в футере
$positions = ['footer-left', 'footer-center', 'footer-right'];
$activePositions = [];

// Проверяем, какие позиции содержат модули
foreach ($positions as $pos) {
    if ($doc->countModules($pos)) {
        $activePositions[] = $pos;
    }
}

// Рендерим футер только если в нем есть хотя бы один модуль
if (!empty($activePositions)) : 
    // Динамический расчет класса сетки (например, uk-child-width-1-3@m если 3 позиции)
    $gridClass = 'uk-child-width-1-' . count($activePositions) . '@m';
?>

<footer id="footer" class="uk-section uk-section-secondary uk-section-small" itemscope itemtype="https://schema.org/WPFooter">
    <div class="uk-container uk-container-small">
        
        <?php /* Сетка UIkit 3:
           - uk-grid-match: выравнивает модули по высоте.
           - uk-grid: современный синтаксис без data- префикса.
        */ ?>
        <div class="<?php echo $gridClass; ?> uk-grid-medium uk-grid-match" uk-grid>

            <?php foreach ($activePositions as $posName) : ?>
                <div>
                    <?php /* Используем наш стиль wmarka для оформления модулей */ ?>
                    <jdoc:include type="modules" name="<?php echo $posName; ?>" style="wmarka" />
                </div>
            <?php endforeach; ?>

        </div>

        <?php /* Копирайт или другие системные элементы можно добавить ниже */ ?>
        <div class="uk-margin-medium-top uk-text-center uk-text-meta">
            <p>© <?php echo date('Y'); ?> <?php echo Factory::getApplication()->get('sitename'); ?>. 
               <?php echo Text::_('TPL_WMARKA_ALL_RIGHTS_RESERVED'); ?>
            </p>
        </div>

    </div>
</footer>

<?php endif; ?>

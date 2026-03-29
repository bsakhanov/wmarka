<?php
/**
 * Часть шаблона: Футер (Footer)
 * Автоматически адаптирует количество колонок в зависимости от активных модулей.
 */
declare(strict_types=1);

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;

/** @var \Wmarka\Template\Helper $this */
$doc = $this->doc;

$positions = ['footer-left', 'footer-center', 'footer-right'];
$activePositions = [];

// Проверяем, какие позиции содержат модули
foreach ($positions as $pos) {
    if ($doc->countModules($pos)) {
        $activePositions[] = $pos;
    }
}

if (!empty($activePositions)) : 
    // Динамический расчет класса сетки (например, uk-child-width-1-3@m)
    $gridClass = 'uk-child-width-1-' . count($activePositions) . '@m';
?>

<footer id="footer" class="uk-section uk-section-secondary uk-section-small" itemscope itemtype="https://schema.org/WPFooter">
    <div class="uk-container">
        
        <div class="<?php echo $gridClass; ?> uk-grid-medium uk-grid-match" uk-grid>
            <?php foreach ($activePositions as $posName) : ?>
                <div>
                    <jdoc:include type="modules" name="<?php echo $posName; ?>" style="wmarka" />
                </div>
            <?php endforeach; ?>
        </div>

        <div class="uk-margin-medium-top uk-text-center uk-text-meta">
            <p>© <?php echo date('Y'); ?> <?php echo Factory::getApplication()->get('sitename'); ?>. 
               <?php echo Text::_('TPL_WMARKA_ALL_RIGHTS_RESERVED'); ?>
            </p>
        </div>

    </div>
</footer>

<?php endif; ?>
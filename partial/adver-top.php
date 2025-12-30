<?php
/**
 * Часть шаблона: Верхний рекламный блок (Adver Top)
 * Особенности: виден только на десктопах, центрирует содержимое.
 */

defined('_JEXEC') or die;

/** @var \Wmarka\Template\Helper $this */
$doc = $this->doc; // Наш Helper
$position = 'adver-top';

// Проверка наличия модулей
if ($doc->countModules($position)) : ?>

    <?php /* role="region" — более корректная семантика для рекламного блока.
       uk-visible@m — скрывает блок на экранах меньше 960px (Mobile First).
       uk-padding-remove-vertical — прижимает баннер к соседним элементам.
    */ ?>
    <div role="region" id="<?php echo $position; ?>" class="uk-section uk-visible@m uk-padding-remove-vertical">
        <div class="uk-container uk-container-small uk-flex uk-flex-center uk-flex-middle">
            
            <?php /* style="none" — идеален для рекламных кодов (AdSense, Яндекс.Директ), 
               так как они сами генерируют нужные обертки. 
            */ ?>
            <jdoc:include type="modules" name="<?php echo $position; ?>" style="none" />
            
        </div>
    </div>

<?php endif; ?>

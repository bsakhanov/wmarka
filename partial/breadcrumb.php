<?php
/**
 * Часть шаблона: Хлебные крошки (Breadcrumbs)
 * Логика: выводится только если в позиции есть модули.
 */

defined('_JEXEC') or die;

/** @var \Wmarka\Template\Helper $this */
$doc = $this->doc; // Используем объект документа из нашего Helper.php

// Проверка наличия модулей в позиции breadcrumb
if ($doc->countModules('breadcrumb')) : ?>

    <?php /* Секция навигации:
       uk-section-xsmall — минимальные отступы сверху/снизу.
       uk-padding-remove-vertical — если нужно еще сильнее прижать крошки к шапке или контенту.
    */ ?>
    <div role="navigation" id="breadcrumb" class="uk-section uk-section-xsmall uk-section-default uk-padding-small">
        <div class="uk-container">
            
            <?php /* Вывод модуля хлебных крошек.
               style="wmarka" — используем наш чистый стиль хрома из html/modules.php.
            */ ?>
            <jdoc:include type="modules" name="breadcrumb" style="wmarka" />
            
        </div>
    </div>

<?php endif; ?>

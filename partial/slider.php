<?php
/**
 * Часть шаблона: Слайдер (Slider)
 * Оптимизировано для вывода на всю ширину экрана.
 */

defined('_JEXEC') or die;

/** @var \Wmarka\Template\Helper $this */
$doc = $this->doc; // Используем наш Helper

// Проверка наличия модулей: достаточно одного условия в начале
if ($doc->countModules('slider')) : ?>

<section id="slider" class="uk-section uk-padding-remove-vertical">
    <?php /* uk-panel — базовый контейнер UIkit, который позволяет накладывать 
       элементы поверх или задавать контекст для дочерних объектов слайдера.
    */ ?>
    <div class="uk-panel">
        
        <?php /* Стиль "none" здесь оправдан, так как модули слайдеров (например, Unite Slider или UIkit Slideshow) 
           обычно имеют собственную сложную верстку, которой не нужны обертки шаблона.
        */ ?>
        <jdoc:include type="modules" name="slider" style="none" />
        
    </div>
</section>

<?php endif; ?>

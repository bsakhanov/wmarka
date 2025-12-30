<?php
/**
 * Ультра-лаконичный универсальный шаблон секции для Joomla 6
 * Использует имя позиции в качестве ID напрямую.
 */

defined('_JEXEC') or die;

/** @var \Wmarka\Template\Helper $this */
$doc = $this->doc;

// --- ИМЯ ПОЗИЦИИ ---
// Просто меняй это значение для каждого нового файла в папке /partial/
$position = 'block-i'; 

// Проверка: если в позиции нет модулей, секция не рендерится вовсе
if ($doc->countModules($position)) : ?>

    <?php /* 
       Контейнер секции: uk-section-default — белый фон. Можно менять на muted, primary, secondary или любой кастомный.
       id — полезен для якорных ссылок (меню -> #section-block-a)
    */ ?>
    <section id="<?php echo $position; ?>" class="uk-section uk-section-default">
        
        <div class="uk-container">
            
            <?php /* Сетка UIkit 3:
               - uk-grid-match: делает все модули в ряду одной высоты.
               - uk-child-width-*: управляет колонками (1 на мобиле, 2 на планшете, 3 на ПК).
            */ ?>
            <div class="uk-grid-medium uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-match" uk-grid>
                
                <?php /* Твой стиль wmarka из html/modules.php.
                   Все модули станут элементами этой сетки автоматически.
                */ ?>
                <jdoc:include type="modules" name="<?php echo $position; ?>" style="wmarka" />
                
            </div>
            
        </div>
    </section>

<?php endif; ?>

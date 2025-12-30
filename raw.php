<?php
/**
 * Файл вывода чистого компонента (версия для печати / модальные окна)
 * Joomla 6 + UIkit 3
 */

defined('_JEXEC') or die;

// Инициализация хелпера шаблона (подключает стили и скрипты)
require_once dirname(__FILE__) . '/php/init.php';

/** @var \Wmarka\Template\Helper $tpl */
$doc = $this->doc;
?>

<!DOCTYPE html>
<?php echo $tpl->renderHTML(); ?>
<head>
    <?php /* Подключаем системные мета-теги и ассеты из joomla.asset.json */ ?>
    <jdoc:include type="head" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="<?php echo $tpl->getBodyClasses(); ?> uk-background-white">
    
    <main class="uk-section uk-section-small">
        <div class="uk-container">
            
            <?php /* Вывод основного содержимого компонента */ ?>
            <jdoc:include type="component" />
            
        </div>
    </main>

</body>
</html>

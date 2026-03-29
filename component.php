<?php
/**
 * Файл вывода чистого компонента (версия для модальных окон)
 * Joomla 6 + UIkit 3
 */
declare(strict_types=1);

defined('_JEXEC') or die;

// Инициализация (подключает автозагрузку классов и WebAssetManager)
require_once __DIR__ . '/php/init.php';

/** * Подсказки для IDE (PhpStorm / VSCode)
 * @var \Joomla\CMS\Document\HtmlDocument $this 
 * @var \Wmarka\Template\Helper $tpl 
 */
?>
<!DOCTYPE html>
<?php echo $tpl->renderHTML(); ?>
<head>
    <jdoc:include type="metas" />
    <jdoc:include type="styles" />
    <jdoc:include type="scripts" />
</head>
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

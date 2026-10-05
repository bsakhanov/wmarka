<?php
/**
 * WMARKA — только компонент (tmpl=component: печать, модальные окна).
 *
 * @var \Joomla\CMS\Document\HtmlDocument $this
 */

\defined('_JEXEC') or die;

require_once __DIR__ . '/php/autoload.php';

// Строки родителя wmarka: у дочернего шаблона своих языковых файлов нет
\Joomla\CMS\Factory::getApplication()->getLanguage()->load('tpl_wmarka', JPATH_BASE)
    || \Joomla\CMS\Factory::getApplication()->getLanguage()->load('tpl_wmarka', JPATH_THEMES . '/wmarka');

(new \Wmarka\Template\Helper($this))->assets();
$this->setMetaData('viewport', 'width=device-width, initial-scale=1');
?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($this->language, ENT_QUOTES, 'UTF-8'); ?>" dir="<?php echo $this->direction; ?>">
<head>
    <jdoc:include type="metas" />
    <jdoc:include type="styles" />
    <jdoc:include type="scripts" />
</head>
<body class="contentpane">
    <div class="uk-padding">
        <jdoc:include type="message" />
        <jdoc:include type="component" />
    </div>
</body>
</html>

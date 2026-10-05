<?php
/**
 * WMARKA — автозагрузчик классов шаблона (PSR-4: Wmarka\Template\* → php/*.php).
 *
 * Подключается из index.php И из любого оверрайда: html-переопределения
 * компонентов исполняются раньше index.php, поэтому каждый, кому нужны
 * Image/Seo/Ui, делает require_once этого файла. Повторный вызов безопасен.
 */

\defined('_JEXEC') or die;

if (!\defined('WMARKA_TPL_PHP')) {
    \define('WMARKA_TPL_PHP', __DIR__);

    spl_autoload_register(static function (string $class): void {
        $prefix = 'Wmarka\\Template\\';

        if (!str_starts_with($class, $prefix)) {
            return;
        }

        $file = WMARKA_TPL_PHP . '/' . str_replace('\\', '/', substr($class, \strlen($prefix))) . '.php';

        if (is_file($file)) {
            require $file;
        }
    });

    // Строки TPL_WMARKA_* — сразу, при первом подключении из любого оверрайда.
    // Для HTML-страниц ядро грузит до вывода компонента только язык активного шаблона
    // (ComponentHelper::renderComponent), язык родителя — лишь для не-HTML документов
    // (HtmlView::loadTemplate). У дочернего шаблона, созданного ядром, своих языковых
    // файлов нет, поэтому без этой строки оверрайды компонентов показали бы ключи.
    try {
        $wmLang = \Joomla\CMS\Factory::getApplication()->getLanguage();
        $wmLang->load('tpl_wmarka', JPATH_SITE) || $wmLang->load('tpl_wmarka', JPATH_SITE . '/templates/wmarka');
    } catch (\Throwable $e) {
        // приложение ещё не создано — строки загрузит шаблон
    }
}

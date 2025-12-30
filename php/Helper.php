<?php
namespace Wmarka\Template;

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Language\Text;

/**
 * Хелпер шаблона Wmarka для Joomla 6
 * Оптимизирован под PHP 8.3/8.4
 */
class Helper
{
    /** @var \Joomla\CMS\Document\HtmlDocument */
    public $doc;

    /**
     * Конструктор хелпера
     * @param object $doc Объект документа из index.php ($this)
     */
    public function __construct(object $doc)
    {
        $this->doc = $doc;
    }

    /**
     * Рендеринг тега <html>
     * Используется в index.php: <?php echo $tpl->renderHTML(); ?>
     */
    public function renderHTML(): string
    {
        return '<!DOCTYPE html><html lang="' . $this->doc->language . '" dir="' . $this->doc->direction . '">';
    }

    /**
     * Генерация классов для тега <body>
     * Учитывает ID меню, текущий компонент и статус главной страницы
     */
    public function getBodyClasses(): string
    {
        $app   = Factory::getApplication();
        $menu  = $app->getMenu()->getActive();
        $input = $app->input;

        $classes = [];
        
        // Базовые классы Joomla
        $classes[] = 'site-' . $this->doc->template;
        $classes[] = 'option-' . str_replace('com_', '', $input->get('option', ''));
        $classes[] = 'view-' . $input->get('view', '');
        $classes[] = 'layout-' . $input->get('layout', 'default');
        $classes[] = 'itemid-' . ($menu ? $menu->id : '0');

        // Класс для главной страницы
        if (Uri::current() === Uri::base()) {
            $classes[] = 'is-home';
        }

        // Адаптивный класс UIkit (опционально)
        $classes[] = 'uk-offcanvas-content';

        return implode(' ', array_filter($classes));
    }

    /**
     * Подключение частей шаблона (partials)
     * Ищет файлы в папке /templates/wmarka/partial/
     * @param string $file Имя файла (например, 'navbar.php')
     */
    public function partial(string $file): string
    {
        $path = JPATH_THEMES . '/' . $this->doc->template . '/partial/' . $file;

        if (file_exists($path)) {
            // Буферизация вывода для корректного внедрения в index.php
            ob_start();
            include $path;
            return ob_get_clean();
        }

        return '';
    }
}

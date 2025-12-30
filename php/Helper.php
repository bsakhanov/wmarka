<?php
namespace Wmarka\Template;

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;

class Helper {
    protected $doc;

    public function __construct($doc) {
        $this->doc = $doc;
    }

    // Метод для подключения частей шаблона из папки /partial/
    public function partial($file) {
        $path = JPATH_THEMES . '/' . $this->doc->template . '/partial/' . $file;
        if (file_exists($path)) {
            include $path;
        }
        return '';
    }

    // Формирование классов для body
    public function getBodyClasses() {
        $app = Factory::getApplication();
        $menu = $app->getMenu()->getActive();
        $cls = [];

        $cls[] = 'site-' . ($app->getTemplate() ?: 'default');
        $cls[] = 'itemid-' . ($menu ? $menu->id : '0');
        
        if ($menu && $menu->home) {
            $cls[] = 'is-home';
        }

        return implode(' ', $cls);
    }

    // Заглушка для совместимости с нашим index.php
    public function renderHTML() {
        return '<!DOCTYPE html><html lang="' . $this->doc->language . '" dir="' . $this->doc->direction . '">';
    }
}

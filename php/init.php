<?php
/**
 * WMARKA — инициализация страницы: хелпер, ассеты, мета, SEO.
 *
 * @var \Joomla\CMS\Document\HtmlDocument $this
 */

\defined('_JEXEC') or die;

use Wmarka\Template\Config;
use Wmarka\Template\Helper;
use Wmarka\Template\Seo;

require_once __DIR__ . '/autoload.php';

// Строки шаблона. Для дочернего шаблона (wmarka_*) Joomla грузит только его собственный
// языковой файл, а у дочернего шаблона, созданного по правилам ядра, своих файлов нет:
// строки TPL_WMARKA_* берутся у родителя
$lang = \Joomla\CMS\Factory::getApplication()->getLanguage();
$lang->load('tpl_' . Config::NAME, JPATH_BASE) || $lang->load('tpl_' . Config::NAME, JPATH_THEMES . '/' . Config::NAME);

$tpl = new Helper($this);
$tpl->assets();
$tpl->meta();

if (Config::bool('seo_enable', true)) {
    (new Seo($this))->render();
}

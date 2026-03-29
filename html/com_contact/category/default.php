<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact (Category View Override for wmarka)
 * @version     1.2 (2025-04-23) - Fixed 'Class File not found' by adding use statement.
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Filesystem\File; // <<<===== ДОБАВЛЕНО ИСПРАВЛЕНИЕ =====>>>

/** @var Joomla\Component\Contact\Site\View\Category\HtmlView $this */

// Получаем суффикс класса страницы из параметров меню для дополнительной стилизации
$pageClassSuffix = $this->params->get('page_class_sfx', '');

?>

<?php // Добавляем классы для общего контейнера + UIkit секции + суффикс класса страницы ?>
<div class="com-contact-category contact-category <?php echo $pageClassSuffix; ?> uk-section uk-section-small">

    <?php
    // Устанавливаем имя подшаблона, который будет загружен макетом category_default
    // Этот файл ДОЛЖЕН существовать в templates/wmarka/html/com_contact/category/
    // и содержать UIkit-разметку для вывода списка контактов ($this->items)
    $this->subtemplatename = 'items';

    /*
    -----------------------------------------------------------------------
    ВАЖНО! Отображение этой страницы зависит от следующих переопределений
           в вашем шаблоне 'wmarka':

    1. templates/wmarka/html/layouts/joomla/content/category_default.php
       (Отвечает за заголовки, описание категории. Должен использовать UIkit классы
        и СОВРЕМЕННЫЙ ВЫЗОВ СОБЫТИЙ ПЛАГИНОВ, как мы делали для blog.php)

    2. templates/wmarka/html/com_contact/category/default_items.php
       (Отвечает за вывод СПИСКА контактов. ДОЛЖЕН БЫТЬ СОЗДАН/ИЗМЕНЕН для UIkit.)

    3. templates/wmarka/html/layouts/joomla/pagination/links.php
       (Отвечает за внешний вид пагинации. Должен использовать UIkit классы.)
    -----------------------------------------------------------------------
    */

    try {
        // Вызываем стандартный макет Joomla для отображения категории
        // Передаем ему текущий объект вида ($this) в качестве источника данных ($displayData)
        echo LayoutHelper::render('joomla.content.category_default', $this);
    } catch (\Exception $e) {
        // Обработка ошибки, если макет не найден или вызвал исключение
        Factory::getApplication()->enqueueMessage(Text::sprintf('JERROR_LAYOUT_RENDER_ERROR', $e->getMessage()), 'error');
    }
    ?>
</div>
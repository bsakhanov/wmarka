<?php
/**
 * WMARKA — сценарий установки и обновления.
 *
 * Обновление безопасно для сайта:
 *  - css/user.css и js/user.js создаются из заготовок seed/ ТОЛЬКО если их нет —
 *    свои стили и скрипты переживают любое обновление;
 *  - удаляются файлы прежних версий, которые иначе перехватили бы новый вывод
 *    (html/pagination.php подменял бы пагинацию, старые макеты меню и т. п.).
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Installer\InstallerAdapter;
use Joomla\CMS\Language\Text;

class wmarkaInstallerScript
{
    private string $minimumPhp = '8.1.0';

    private string $minimumJoomla = '5.0.0';

    /** Устаревшие файлы шаблона (пути от корня сайта) */
    private array $obsolete = [
        'templates/wmarka/html/modules.php',
        'templates/wmarka/html/pagination.php',
        'templates/wmarka/html/mod_menu/offcanvas.php',
        'templates/wmarka/html/mod_menu/offcanvas_default.php',
        'templates/wmarka/html/com_tags/tags/tree.php',
        'templates/wmarka/html/com_tags/tags/tree.xml',
        'templates/wmarka/html/com_tags/tags/tree_items.php',
        'templates/wmarka/html/com_tags/tag/default_baq.php',
        'templates/wmarka/html/layouts/joomla/content/emptystate.php',
        'templates/wmarka/html/layouts/joomla/content/emptystate_module.php',
        'templates/wmarka/partial/navbar.php',
        'templates/wmarka/partial/headbar.php',
        'templates/wmarka/partial/content.php',
        'templates/wmarka/partial/_block.php',
        'templates/wmarka/readme.md',
        'media/templates/site/wmarka/joomla.asset.json',
        'media/templates/site/wmarka/js/wmarka-icons-min.js',
    ];

    private array $obsoleteFolders = [
        'templates/wmarka/html/layouts/joomla/content/info_block',
    ];

    public function preflight(string $type, InstallerAdapter $parent): bool
    {
        if (version_compare(PHP_VERSION, $this->minimumPhp, '<')) {
            Factory::getApplication()->enqueueMessage('WMARKA: PHP ' . $this->minimumPhp . '+', 'error');

            return false;
        }

        if (version_compare(JVERSION, $this->minimumJoomla, '<')) {
            Factory::getApplication()->enqueueMessage('WMARKA: Joomla ' . $this->minimumJoomla . '+', 'error');

            return false;
        }

        return true;
    }

    public function postflight(string $type, InstallerAdapter $parent): void
    {
        if ($type === 'uninstall') {
            return;
        }

        if ($type === 'update') {
            foreach ($this->obsolete as $file) {
                if (is_file(JPATH_ROOT . '/' . $file)) {
                    @unlink(JPATH_ROOT . '/' . $file);
                }
            }

            foreach ($this->obsoleteFolders as $folder) {
                $this->removeFolder(JPATH_ROOT . '/' . $folder);
            }

            foreach (['partial/block-a.php', 'partial/block-b.php', 'partial/block-c.php', 'partial/block-d.php', 'partial/block-e.php', 'partial/block-f.php', 'partial/block-g.php', 'partial/block-h.php', 'partial/block-i.php', 'partial/block-k.php', 'partial/slider.php', 'partial/adver-top.php', 'partial/modal-contact.php'] as $old) {
                @unlink(JPATH_ROOT . '/templates/wmarka/' . $old);
            }
        }

        $media = JPATH_ROOT . '/media/templates/site/wmarka';
        $seed  = JPATH_ROOT . '/templates/wmarka/seed';

        foreach (['css/user.css' => 'user.css', 'js/user.js' => 'user.js'] as $target => $source) {
            if (!is_file($media . '/' . $target) && is_file($seed . '/' . $source)) {
                @mkdir(\dirname($media . '/' . $target), 0755, true);
                @copy($seed . '/' . $source, $media . '/' . $target);
            }
        }

        $message = $type === 'install' ? 'установлен' : 'обновлён';
        echo '<div class="alert alert-success"><h3 class="alert-heading">Wmarka 4.0.12 ' . $message . '</h3>'
            . '<p>Ключевые настройки — в стиле шаблона (Система → Стили шаблонов сайта → wmarka). '
            . 'Свои стили — media/templates/site/wmarka/css/user.css: файл не перезаписывается обновлением.</p></div>';
    }

    private function removeFolder(string $dir): void
    {
        if (!is_dir($dir)) {
            return;
        }

        foreach (array_diff(scandir($dir) ?: [], ['.', '..']) as $entry) {
            $path = $dir . '/' . $entry;
            is_dir($path) ? $this->removeFolder($path) : @unlink($path);
        }

        @rmdir($dir);
    }
}

// Имя класса Joomla строит из element: «wmarka» → wmarkaInstallerScript (у 3.0.0 был tpl_… — он не вызывался)

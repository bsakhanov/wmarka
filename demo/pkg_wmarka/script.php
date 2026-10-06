<?php
/**
 * Пакет wmarka: после установки включает установщик демо-сайта и com_blank
 * и подсказывает, где запустить демо.
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Installer\InstallerAdapter;
use Joomla\Database\DatabaseInterface;

class pkg_wmarkaInstallerScript
{
    public function preflight(string $type, InstallerAdapter $parent): bool
    {
        if (version_compare(PHP_VERSION, '8.1.0', '<') || version_compare(JVERSION, '5.0.0', '<')) {
            Factory::getApplication()->enqueueMessage('Wmarka: нужны PHP 8.1+ и Joomla 5+.', 'error');

            return false;
        }

        return true;
    }

    public function postflight(string $type, InstallerAdapter $parent): void
    {
        if ($type === 'uninstall') {
            return;
        }

        $db = Factory::getContainer()->get(DatabaseInterface::class);

        foreach ([['plugin', 'sampledata', 'wmarka'], ['component', '', 'com_blank']] as [$kind, $folder, $element]) {
            $query = $db->getQuery(true)
                ->update($db->quoteName('#__extensions'))
                ->set($db->quoteName('enabled') . ' = 1')
                ->where($db->quoteName('type') . ' = ' . $db->quote($kind))
                ->where($db->quoteName('element') . ' = ' . $db->quote($element));

            if ($folder !== '') {
                $query->where($db->quoteName('folder') . ' = ' . $db->quote($folder));
            }

            try {
                $db->setQuery($query)->execute();
            } catch (\Throwable $e) {
                // включается вручную
            }
        }

        Factory::getApplication()->enqueueMessage('<b>Wmarka 4.0.12 установлен.</b> Демо-сайт: <b>Система → Образцы данных → Демо-сайт wmarka → Применить</b>. Повторный запуск безопасен: дублей не будет.', 'notice');
    }
}

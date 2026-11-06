<?php
/**
 * Пакет wmarka: включает установщик демо-сайта, com_blank, плагины «Система — wmarka» и
 * «Карточки для соцсетей» (wmarkaog) — только те, которых на сайте до пакета не было.
 * Уже стоявшие расширения пакет обновляет, не меняя их включённости: выключенный
 * администратором установщик демо на рабочем сайте при обновлении остаётся выключенным.
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Installer\InstallerAdapter;
use Joomla\Database\DatabaseInterface;

class pkg_wmarkaInstallerScript
{
    /** Расширения, которые пакет включает, если до него их на сайте не было: [тип, папка, элемент] */
    private const ENABLE = [['plugin', 'sampledata', 'wmarka'], ['plugin', 'system', 'wmarka'], ['plugin', 'system', 'wmarkaog'], ['component', '', 'com_blank']];

    /** Какие из них стояли до установки пакета */
    private array $before = [];

    public function preflight(string $type, InstallerAdapter $parent): bool
    {
        if (version_compare(PHP_VERSION, '8.1.0', '<') || version_compare(JVERSION, '5.0.0', '<')) {
            Factory::getApplication()->enqueueMessage('Wmarka: нужны PHP 8.1+ и Joomla 5+.', 'error');

            return false;
        }

        $db = Factory::getContainer()->get(DatabaseInterface::class);

        foreach (self::ENABLE as [$kind, $folder, $element]) {
            try {
                $query = $db->createQuery()->select('COUNT(*)')->from($db->quoteName('#__extensions'))
                    ->where($db->quoteName('type') . ' = ' . $db->quote($kind))
                    ->where($db->quoteName('element') . ' = ' . $db->quote($element));

                if ($folder !== '') {
                    $query->where($db->quoteName('folder') . ' = ' . $db->quote($folder));
                }

                $this->before[$kind . '/' . $folder . '/' . $element] = (bool) $db->setQuery($query)->loadResult();
            } catch (\Throwable $e) {
                $this->before[$kind . '/' . $folder . '/' . $element] = true;   // не знаем — не трогаем
            }
        }

        return true;
    }

    public function postflight(string $type, InstallerAdapter $parent): void
    {
        if ($type === 'uninstall') {
            return;
        }

        $db = Factory::getContainer()->get(DatabaseInterface::class);

        foreach (self::ENABLE as [$kind, $folder, $element]) {
            if (!empty($this->before[$kind . '/' . $folder . '/' . $element])) {
                continue;
            }

            $query = $db->createQuery()
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

        Factory::getApplication()->enqueueMessage('<b>Wmarka 4.2.0 установлен.</b> Демо-сайт: <b>Система → Образцы данных → Демо-сайт wmarka → Применить</b>. Повторный запуск безопасен: дублей не будет.', 'notice');
    }
}

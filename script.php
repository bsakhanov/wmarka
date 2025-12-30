<?php
defined('_JEXEC') or die;

use Joomla\CMS\Filesystem\Folder;
use Joomla\CMS\Filesystem\File;

class tpl_wmarkaInstallerScript
{
    /**
     * Выполняется перед установкой или обновлением
     */
    public function preflight($type, $parent)
    {
        // Если это обновление (update), нам нужно подготовить почву
        if ($type == 'update') {
            $mediaPath = JPATH_ROOT . '/media/templates/site/wmarka';
            
            // Удаляем старую папку media в системной директории, 
            // чтобы Joomla создала её заново из файлов пакета
            if (Folder::exists($mediaPath)) {
                Folder::delete($mediaPath);
            }
        }
    }

    /**
     * Выполняется после установки или обновления
     */
    public function postflight($type, $parent)
    {
        // Здесь можно вывести сообщение пользователю
        echo '<p>Wmarka Template has been ' . ($type == 'install' ? 'installed' : 'updated') . ' successfully.</p>';
    }
}

<?php
declare(strict_types=1);

defined('_JEXEC') or die;

use Joomla\CMS\Installer\InstallerAdapter;
use Joomla\CMS\Filesystem\Folder;
use Joomla\CMS\Filesystem\File;

class tpl_wmarkaInstallerScript
{
    /**
     * Выполняется перед установкой или обновлением
     */
    public function preflight(string $type, InstallerAdapter $parent): bool
    {
        // Мы больше не удаляем папку media целиком, чтобы сохранить user.css 
        // и загруженные пользователем фавиконки. Joomla сама обновит нужные файлы.
        return true;
    }

    /**
     * Выполняется после установки или обновления
     */
    public function postflight(string $type, InstallerAdapter $parent): void
    {
        $action = $type === 'install' ? 'установлен' : 'обновлен';
        echo '<div class="alert alert-success"><p>Шаблон <b>Wmarka</b> успешно ' . $action . '. Приятной работы!</p></div>';
    }
}
<?php
/**
 * WMARKA — поле «Состояние шаблона» на первой вкладке настроек:
 * версии шаблона и UIkit, наличие JUImage и user.css, объём кэша превью.
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Form\FormField;
use Joomla\CMS\Language\Text;

class JFormFieldWmarkastatus extends FormField
{
    protected $type = 'Wmarkastatus';

    protected function getInput()
    {
        $media   = JPATH_ROOT . '/media/templates/site/wmarka';
        $head    = is_file($media . '/css/uikit.min.css') ? (string) file_get_contents($media . '/css/uikit.min.css', false, null, 0, 80) : '';
        $uikit   = preg_match('/UIkit ([\d.]+)/', $head, $m) ? $m[1] : '—';
        $xml     = @simplexml_load_file(JPATH_ROOT . '/templates/wmarka/templateDetails.xml');
        $version = $xml ? (string) $xml->version : '—';
        $juimage = is_file(JPATH_LIBRARIES . '/juimage/vendor/autoload.php');
        $userCss = is_file($media . '/css/user.css');
        $form    = $this->form;
        $cache   = 'img';

        if ($form && ($value = $form->getValue('img_cache', 'params'))) {
            $cache = trim((string) $value, '/');
        }

        $count = 0;
        $bytes = 0;

        if ($cache !== '' && is_dir(JPATH_ROOT . '/' . $cache)) {
            $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(JPATH_ROOT . '/' . $cache, FilesystemIterator::SKIP_DOTS));

            foreach ($it as $file) {
                if ($file->isFile() && preg_match('/\.(webp|jpe?g|png)$/i', $file->getFilename())) {
                    $count++;
                    $bytes += $file->getSize();
                }
            }
        }

        $ok  = '<span class="badge bg-success">%s</span>';
        $bad = '<span class="badge bg-warning text-dark">%s</span>';
        $rows = [
            [Text::_('TPL_WMARKA_STATUS_VERSION'), '<strong>' . htmlspecialchars($version) . '</strong>'],
            [Text::_('TPL_WMARKA_STATUS_UIKIT'), htmlspecialchars($uikit)],
            [Text::_('TPL_WMARKA_STATUS_JUIMAGE'), sprintf($juimage ? $ok : $bad, Text::_($juimage ? 'TPL_WMARKA_STATUS_YES' : 'TPL_WMARKA_STATUS_NO'))],
            [Text::_('TPL_WMARKA_STATUS_USERCSS'), sprintf($userCss ? $ok : $bad, Text::_($userCss ? 'TPL_WMARKA_STATUS_FILE_YES' : 'TPL_WMARKA_STATUS_FILE_NO'))],
            [Text::_('TPL_WMARKA_STATUS_CACHE'), $count . ' · ' . number_format($bytes / 1048576, 1, ',', ' ') . ' МБ · /' . htmlspecialchars($cache)],
        ];

        // SEO-окружение: строгая маршрутизация ядра склеивает адреса 301-м перенаправлением,
        // плагин Schema.org ядра добавляет второй граф JSON-LD рядом с графом шаблона
        $sef    = \Joomla\CMS\Plugin\PluginHelper::getPlugin('system', 'sef');
        $strict = $sef && (new \Joomla\Registry\Registry($sef->params ?? ''))->get('strictrouting');
        $schema = \Joomla\CMS\Plugin\PluginHelper::isEnabled('system', 'schemaorg');
        $rows[] = [Text::_('TPL_WMARKA_STATUS_STRICT'), sprintf($strict ? $ok : $bad, Text::_($strict ? 'TPL_WMARKA_STATUS_ON' : 'TPL_WMARKA_STATUS_STRICT_OFF'))];
        $rows[] = [Text::_('TPL_WMARKA_STATUS_SCHEMAORG'), sprintf($schema ? $bad : $ok, Text::_($schema ? 'TPL_WMARKA_STATUS_SCHEMAORG_ON' : 'TPL_WMARKA_STATUS_OFF'))];

        $html = '<table class="table table-sm mb-0" style="max-width: 640px"><tbody>';

        foreach ($rows as [$label, $value]) {
            $html .= '<tr><th scope="row" class="fw-normal text-muted">' . $label . '</th><td>' . $value . '</td></tr>';
        }

        return $html . '</tbody></table>';
    }
}

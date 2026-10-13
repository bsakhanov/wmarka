<?php

/**
 * @package     Wmarka
 * @subpackage  plg_system_wmarka
 * @copyright   (C) 2026 Webmarka
 * @license     GNU General Public License version 2 or later
 */

namespace Webmarka\Plugin\System\Wmarka\Extension;

\defined('_JEXEC') or die;

use Joomla\CMS\Event\Model\PrepareFormEvent;
use Joomla\CMS\Form\Form;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\Event\SubscriberInterface;

/**
 * Поля шаблона wmarka в форме пункта меню.
 *
 * Joomla строит форму пункта меню по XML макета компонента, а XML из папки шаблона читает
 * только для альтернативного макета вида «шаблон:макет» (ItemModel::preprocessForm). Копия
 * XML штатного макета в шаблоне поэтому не действует, а параметры, которых нет в форме,
 * исчезают при первом сохранении пункта.
 *
 * Плагин добавляет к штатной форме только поля WMARKA из templates/wmarka/forms/menu/
 * (option.view.layout.xml). Поля ядра остаются те, что даёт установленная версия Joomla,
 * поэтому новые параметры ядра (в 6.2 — «Изображения подкатегорий») появляются сами. Для
 * альтернативных макетов wmarka (wm-team, wm-catalog, wm-tree) плагин подгружает и поля
 * ядра — из макета компонента, указанного во фрагменте атрибутом base.
 */
final class Wmarka extends CMSPlugin implements SubscriberInterface
{
    /** Папка фрагментов форм в родительском шаблоне */
    private const FORMS = JPATH_SITE . '/templates/wmarka/forms/menu/';

    public static function getSubscribedEvents(): array
    {
        return ['onContentPrepareForm' => 'onContentPrepareForm'];
    }

    public function onContentPrepareForm(PrepareFormEvent $event): void
    {
        $form = $event->getForm();
        $data = $event->getData();
        $app  = $this->getApplication();

        if (!$form instanceof Form || $form->getName() !== 'com_menus.item' || !($app->isClient('administrator') || $app->isClient('cli')) || !is_dir(self::FORMS)) {
            return;
        }

        // Админка, а также консоль (сценарии и команды, работающие с формами пунктов меню). Только пункты меню сайта
        $clientId = $this->value($data, 'client_id');

        if ($clientId === null) {
            $clientId = $app->getUserState('com_menus.items.client_id', 0);
        }

        if ((int) $clientId !== 0) {
            return;
        }

        $link = (string) ($this->value($data, 'link') ?: $app->getUserState('com_menus.edit.item.link', ''));
        parse_str((string) parse_url(htmlspecialchars_decode($link), PHP_URL_QUERY), $query);

        $option = preg_replace('/[^a-z0-9_]/', '', strtolower((string) ($query['option'] ?? '')));
        $view   = preg_replace('/[^a-z0-9_]/', '', strtolower((string) ($query['view'] ?? '')));
        $layout = (string) ($query['layout'] ?? '');
        $tpl    = '';

        if (str_contains($layout, ':')) {
            [$tpl, $layout] = explode(':', $layout, 2);
        }

        $layout = preg_replace('/[^a-z0-9_-]/', '', strtolower($layout !== '' ? $layout : 'default'));

        // Альтернативный макет другого шаблона — не наш
        if ($option === '' || $view === '' || ($tpl !== '' && !preg_match('/^wmarka(_[a-z0-9_]+)?$/', $tpl))) {
            return;
        }

        $file = self::FORMS . $option . '.' . $view . '.' . $layout . '.xml';

        if (!is_file($file)) {
            return;
        }

        $language = $app->getLanguage();
        $language->load('tpl_wmarka', JPATH_SITE) || $language->load('tpl_wmarka', JPATH_SITE . '/templates/wmarka');

        // Альтернативный макет wmarka: поля ядра — из макета компонента, на котором он построен
        if ($tpl !== '') {
            $xml  = simplexml_load_file($file);
            $base = $xml ? preg_replace('/[^a-z0-9_-]/', '', (string) ($xml['base'] ?? '')) : '';
            $core = JPATH_SITE . '/components/' . $option . '/tmpl/' . $view . '/' . ($base !== '' ? $base : 'default') . '.xml';

            if ($base !== '' && is_file($core)) {
                $form->loadFile($core, false, '/metadata');
            }
        }

        $form->loadFile($file, false);
    }

    /** Значение из данных формы: массив, объект или Registry */
    private function value(mixed $data, string $key): mixed
    {
        if (\is_array($data)) {
            return $data[$key] ?? null;
        }

        if ($data instanceof \Joomla\Registry\Registry) {
            return $data->get($key);
        }

        return \is_object($data) ? ($data->$key ?? null) : null;
    }
}

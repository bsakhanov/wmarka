<?php
/**
 * Система — Карточки для соцсетей и разметка статьи при кеше Joomla (Wmarka).
 *
 * @package     Wmarka
 * @copyright   (C) 2026 Webmarka · Beibit Sakhanov <https://webmarka.kz>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 *
 * Что чинит. Шаблон wmarka передаёт данные статьи для OpenGraph и JSON-LD (тип «article», картинка новости, время публикации, узел NewsArticle)
 * из макета статьи вызовом Seo::page(), а теги собирает позже, в index.php. Если в «Системе → Общих настройках → Кеш» стоит «Включено»,
 * Joomla кеширует вывод компонента для гостей; при выдаче из кеша макет не исполняется, Seo::page() не вызывается, и у каждого гостя
 * и краулера (Telegram, WhatsApp, Facebook, X, поисковые роботы) страница получает «сайт» вместо «статьи»: og:type=website, общая брендовая
 * картинка вместо картинки новости, ни article:published_time, ни NewsArticle. Администратор, вошедший в систему, кеша не видит, поэтому
 * в его браузере всё в порядке. Заодно из кеша не растёт счётчик просмотров.
 *
 * Что делает плагин.
 *   1. onAfterRoute: для материала (com_content, вид «article», GET, формат html) выключает кеш на время запроса. Макет исполняется каждый раз,
 *      и теги верны при любом режиме кеша. Кеш модулей и остальных страниц не затрагивается: он задаётся настройками самих модулей и уровнем сайта.
 *   2. onBeforeCompileHead: к og:image добавляет og:image:width, og:image:height, og:image:type, og:image:alt и twitter:image:alt
 *      (размеры берутся из адреса JUImage /img/1200x630/… или из файла), чтобы первая карточка в Facebook и в мессенджерах была большой.
 *   3. Заголовок ответа X-Wmarkaog показывает, что плагин сработал: curl -sI https://сайт/адрес-материала | grep -i x-wmarkaog.
 *
 * Версия 1.0.0 жила копией в репозиториях сайтов; с пакета wmarka 4.2.0 плагин ставится вместе с шаблоном. Элемент тот же (wmarkaog),
 * поэтому пакет обновляет имеющуюся копию на месте, с её настройками и включённостью.
 */

namespace Webmarka\Plugin\System\WmarkaOg\Extension;

\defined('_JEXEC') or die;

use Joomla\CMS\Document\HtmlDocument;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Uri\Uri;
use Joomla\Database\DatabaseInterface;
use Joomla\Database\ParameterType;
use Joomla\Event\Event;
use Joomla\Event\Priority;
use Joomla\Event\SubscriberInterface;

final class WmarkaOg extends CMSPlugin implements SubscriberInterface
{
    /** Страница материала: из onAfterRoute в onBeforeCompileHead */
    private bool $article = false;

    public static function getSubscribedEvents(): array
    {
        return [
            'onAfterRoute'        => ['onAfterRoute', Priority::MAX],
            'onBeforeCompileHead' => ['onBeforeCompileHead', Priority::MIN],
        ];
    }

    public function onAfterRoute(Event $event): void
    {
        $app = $this->getApplication();

        if (!$app || !$app->isClient('site')) {
            return;
        }

        $input = $app->getInput();

        if ($input->getMethod() !== 'GET' || $input->getCmd('format', 'html') !== 'html') {
            return;
        }

        $article = $input->getCmd('option') === 'com_content' && $input->getCmd('view') === 'article';
        $mode    = (int) $this->params->get('bypass_cache', 1);   // 0 — не трогать; 1 — страницы материалов; 2 — все страницы сайта

        $this->article = $article;

        if (!$article && $mode < 2) {
            return;
        }

        $off = false;

        if ($mode >= 1 && (int) $app->get('caching') >= 1) {
            $app->set('caching', 0);
            $off = true;
        }

        if ((int) $this->params->get('header', 1)) {
            $app->setHeader('X-Wmarkaog', ($article ? 'article' : 'page') . ($off ? '; cache=off' : ''));
        }
    }

    public function onBeforeCompileHead(Event $event): void
    {
        if (!$this->article || !(int) $this->params->get('og_extras', 1)) {
            return;
        }

        $app = $this->getApplication();
        $doc = $app ? $app->getDocument() : null;

        if (!$doc instanceof HtmlDocument) {
            return;
        }

        $image = (string) $doc->getMetaData('og:image', 'property');

        if ($image === '') {
            return;
        }

        [$w, $h] = $this->size($image);

        if ($w > 0 && $h > 0) {
            $doc->setMetaData('og:image:width', (string) $w, 'property');
            $doc->setMetaData('og:image:height', (string) $h, 'property');
        }

        $type = self::mime($image);

        if ($type !== '') {
            $doc->setMetaData('og:image:type', $type, 'property');
        }

        $alt = $this->alt((int) $app->getInput()->getInt('id'));

        if ($alt !== '') {
            $doc->setMetaData('og:image:alt', $alt, 'property');
            $doc->setMetaData('twitter:image:alt', $alt);
        }
    }

    /** Размеры по адресу JUImage /img/ШИРИНАxВЫСОТА/…, иначе по файлу на диске */
    private function size(string $url): array
    {
        if (preg_match('#/img/(\d{2,4})x(\d{2,4})/#', $url, $m)) {
            return [(int) $m[1], (int) $m[2]];
        }

        $path = (string) parse_url($url, PHP_URL_PATH);
        $file = JPATH_ROOT . '/' . ltrim(rawurldecode($path), '/');

        if ($path !== '' && is_file($file) && ($info = @getimagesize($file))) {
            return [(int) $info[0], (int) $info[1]];
        }

        return [0, 0];
    }

    private static function mime(string $url): string
    {
        $ext = strtolower((string) pathinfo((string) parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION));

        return ['jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png', 'webp' => 'image/webp', 'gif' => 'image/gif'][$ext] ?? '';
    }

    /** Подпись к картинке материала: alt обложки, иначе alt вступительной картинки, иначе заголовок */
    private function alt(int $id): string
    {
        if ($id < 1) {
            return '';
        }

        try {
            $db  = \Joomla\CMS\Factory::getContainer()->get(DatabaseInterface::class);
            $row = $db->setQuery(
                $db->getQuery(true)->select($db->quoteName(['images', 'title']))->from($db->quoteName('#__content'))->where($db->quoteName('id') . ' = :id')->bind(':id', $id, ParameterType::INTEGER)
            )->loadObject();
        } catch (\Throwable $e) {
            return '';
        }

        if (!$row) {
            return '';
        }

        $images = json_decode((string) $row->images, true) ?: [];
        $alt    = trim((string) ($images['image_fulltext_alt'] ?? '')) ?: trim((string) ($images['image_intro_alt'] ?? ''));

        return $alt !== '' ? $alt : trim(strip_tags((string) $row->title));
    }
}

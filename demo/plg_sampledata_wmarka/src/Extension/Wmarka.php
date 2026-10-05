<?php
/**
 * @package     Webmarka.Plugin
 * @subpackage  Sampledata.wmarka
 *
 * Демо-сайт шаблона wmarka: «Система → Образцы данных → Демо-сайт wmarka → Применить».
 * Устроен по образцу установщика TAMGARD PARTNERS.
 *
 * Шесть шагов, порядок обязателен:
 *   1 категории, метки, кадры          4 меню (основное, мегаменю, служебное)
 *   2 материалы                        5 модули и привязки, токены wm-mod-ID
 *   3 контакты                         6 настройки шаблона и компонентов
 *
 * ИДЕМПОТЕНТНОСТЬ. Каждая запись ищется по ключу до вставки: найденная обновляется,
 * а не дублируется. Созданные id складываются в параметры плагина — это и след для
 * повторного прогона, и список для ручной уборки.
 *
 * ВЛАДЕЛЕЦ. Записи помечены префиксом «wmarka-demo:» в служебном поле «Заметка»:
 * видно, что принадлежит установщику, а что заведено руками.
 *
 * ТОКЕНЫ в данных: %R% — корень сайта, %IMG% — папка кадров images/wmarka-demo,
 * %MENU:ключ% — ссылка на пункт меню, %MENUID:ключ% — его id, %CAT:ключ% — id категории.
 */

declare(strict_types=1);

namespace Webmarka\Plugin\Sampledata\Wmarka\Extension;

\defined('_JEXEC') or die;

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\CMS\Table\Menu as MenuTable;
use Joomla\CMS\Table\MenuType;
use Joomla\CMS\Table\Module as ModuleTable;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Categories\Administrator\Table\CategoryTable;
use Joomla\Database\DatabaseInterface;
use Joomla\Event\Event;
use Joomla\Event\SubscriberInterface;
use Joomla\Registry\Registry;

final class Wmarka extends CMSPlugin implements SubscriberInterface
{
    protected $autoloadLanguage = true;

    private const OWNER  = 'wmarka-demo:';
    private const STEPS  = 6;
    private const IMAGES = 'images/wmarka-demo';

    /** @var array<string, array<string, int>> */
    private array $registry = [];

    public static function getSubscribedEvents(): array
    {
        $events = ['onSampledataGetOverview' => 'onSampledataGetOverview'];

        for ($i = 1; $i <= self::STEPS; $i++) {
            $events['onAjaxSampledataApplyStep' . $i] = 'onAjaxSampledataApplyStep' . $i;
        }

        return $events;
    }

    public function onSampledataGetOverview(Event $event): void
    {
        if (!$this->getApplication()->getIdentity()->authorise('core.create', 'com_content')) {
            return;
        }

        $data              = new \stdClass();
        $data->name        = 'wmarka';
        $data->title       = Text::_('PLG_SAMPLEDATA_WMARKA_OVERVIEW_TITLE');
        $data->description = Text::_('PLG_SAMPLEDATA_WMARKA_OVERVIEW_DESC');
        $data->icon        = 'images';
        $data->steps       = self::STEPS;

        $result   = (array) $event->getArgument('result', []);
        $result[] = $data;
        $event->setArgument('result', $result);
    }

    public function onAjaxSampledataApplyStep1(Event $event): void
    {
        $this->step($event, 1, function (): array {
            foreach ($this->json('categories.json') as $row) {
                $this->remember('categories', $row['key'], $this->category($row));
            }

            foreach ($this->json('tags.json') as $row) {
                $this->remember('tags', $row['key'], $this->tag($row));
            }

            foreach ($this->json('users.json') as $row) {
                $this->remember('users', $row['key'], $this->user($row));
            }

            $photos = $this->photos();

            return ['message' => Text::sprintf('PLG_SAMPLEDATA_WMARKA_STEP1_OK', \count($this->registry['categories'] ?? []), \count($this->registry['tags'] ?? []), $photos)];
        });
    }

    public function onAjaxSampledataApplyStep2(Event $event): void
    {
        $this->step($event, 2, function (): array {
            // Метки сохраняются через UCM — без плагинов behaviour они молча теряются;
            // content и finder подключают индексатор умного поиска
            PluginHelper::importPlugin('behaviour');
            PluginHelper::importPlugin('content');
            PluginHelper::importPlugin('finder');

            $count = 0;

            foreach ($this->json('articles.json') as $row) {
                $this->remember('articles', $row['key'], $this->article($row));
                $count++;
            }

            return ['message' => Text::sprintf('PLG_SAMPLEDATA_WMARKA_STEP2_OK', $count)];
        });
    }

    public function onAjaxSampledataApplyStep3(Event $event): void
    {
        $this->step($event, 3, function (): array {
            $count = 0;

            foreach ($this->json('contacts.json') as $row) {
                $this->remember('contacts', $row['key'], $this->contact($row));
                $count++;
            }

            return ['message' => Text::sprintf('PLG_SAMPLEDATA_WMARKA_STEP3_OK', $count)];
        });
    }

    public function onAjaxSampledataApplyStep4(Event $event): void
    {
        $this->step($event, 4, function (): array {
            $menus = $this->json('menus.json');

            foreach ($menus['types'] as $type) {
                $this->menuType($type);
            }

            $count = 0;

            foreach ($menus['items'] as $row) {
                $this->remember('menu', $row['key'], $this->menuItem($row));
                $count++;
            }

            (new MenuTable($this->db(), $this->getDispatcher()))->rebuild();
            $this->relink();

            return ['message' => Text::sprintf('PLG_SAMPLEDATA_WMARKA_STEP4_OK', \count($menus['types']), $count)];
        });
    }

    public function onAjaxSampledataApplyStep5(Event $event): void
    {
        $this->step($event, 5, function (): array {
            $count = 0;

            foreach ($this->json('modules.json') as $row) {
                $this->module($row);
                $count++;
            }

            // Колонка мегаменю с модулем: токен wm-mod-ID известен только теперь
            foreach ($this->json('menus.json')['items'] as $row) {
                if (!empty($row['module'])) {
                    $this->menuCss($this->id('menu', $row['key']), trim(($row['css'] ?? '') . ' wm-mod-' . $this->id('modules', $row['module'])));
                }
            }

            return ['message' => Text::sprintf('PLG_SAMPLEDATA_WMARKA_STEP5_OK', $count)];
        });
    }

    public function onAjaxSampledataApplyStep6(Event $event): void
    {
        $this->step($event, 6, function (): array {
            $notes   = [];
            $notes[] = $this->templateStyle();
            $notes[] = $this->componentParams();
            $this->enableBlank();
            $notes[] = is_file(JPATH_LIBRARIES . '/juimage/vendor/autoload.php')
                ? Text::_('PLG_SAMPLEDATA_WMARKA_STEP6_IMAGING_OK')
                : Text::_('PLG_SAMPLEDATA_WMARKA_STEP6_IMAGING_NO');

            return ['message' => Text::sprintf('PLG_SAMPLEDATA_WMARKA_STEP6_OK', implode('; ', array_filter($notes)))];
        });
    }

    private function step(Event $event, int $number, callable $work): void
    {
        $result = (array) $event->getArgument('result', []);

        if ($this->getApplication()->getInput()->get('type') !== 'wmarka') {
            $result[] = null;
            $event->setArgument('result', $result);

            return;
        }

        $this->registry = (array) json_decode((string) $this->params->get('registry', '{}'), true);

        try {
            $payload  = $work();
            $response = ['success' => true, 'message' => $payload['message'] ?? Text::sprintf('PLG_SAMPLEDATA_WMARKA_STEP_OK', $number)];
            $this->saveRegistry();
        } catch (\Throwable $e) {
            $response = ['success' => false, 'message' => Text::sprintf('PLG_SAMPLEDATA_WMARKA_STEP_FAIL', $number, $e->getMessage())];
        }

        $result[] = $response;
        $event->setArgument('result', $result);
    }

    private function category(array $row): int
    {
        $db        = $this->db();
        $table     = new CategoryTable($db, $this->getDispatcher());
        $extension = $row['extension'] ?? 'com_content';
        $existing  = $this->lookup('#__categories', ['alias' => $row['alias'], 'extension' => $extension]);
        $params    = json_encode(['category_layout' => '', 'image' => $this->tokens((string) ($row['image'] ?? '')), 'image_alt' => ''], JSON_UNESCAPED_SLASHES);

        if ($existing && $table->load($existing)) {
            $table->title       = $row['title'];
            $table->description = $this->tokens((string) ($row['description'] ?? ''));
            $table->params      = $params;
            $table->note        = self::OWNER . $row['key'];
            $table->store();

            return (int) $table->id;
        }

        $table->extension   = $extension;
        $table->title       = $row['title'];
        $table->alias       = $row['alias'];
        $table->description = $this->tokens((string) ($row['description'] ?? ''));
        $table->published   = 1;
        $table->access      = 1;
        $table->language    = '*';
        $table->params      = $params;
        $table->metadata    = '{"author":"","robots":""}';
        $table->metadesc    = (string) ($row['metadesc'] ?? '');
        $table->note        = self::OWNER . $row['key'];
        $table->setLocation(!empty($row['parent']) ? $this->id('categories', $row['parent']) : 1, 'last-child');

        if (!$table->check() || !$table->store()) {
            throw new \RuntimeException($row['key'] . ': ' . $table->getError());
        }

        // Дерево lft/rgt строит только Table-класс: прямой INSERT оставит категорию
        // невидимой для выборок по вложенности
        $table->rebuildPath($table->id);
        $table->rebuild();

        return (int) $table->id;
    }

    private function tag(array $row): int
    {
        $table    = $this->getApplication()->bootComponent('com_tags')->getMVCFactory()->createTable('Tag', 'Administrator');
        $existing = $this->lookup('#__tags', ['alias' => $row['alias']]);
        $images   = json_encode(['image_intro' => $this->tokens((string) ($row['image'] ?? '')), 'image_intro_alt' => '', 'float_intro' => '', 'image_intro_caption' => '', 'image_fulltext' => '', 'image_fulltext_alt' => '', 'float_fulltext' => '', 'image_fulltext_caption' => ''], JSON_UNESCAPED_SLASHES);

        if ($existing && $table->load($existing)) {
            $table->title       = $row['title'];
            $table->description = $this->tokens((string) ($row['description'] ?? ''));
            $table->images      = $images;
            $table->note        = self::OWNER . $row['key'];
            $table->store();

            return (int) $table->id;
        }

        $table->title       = $row['title'];
        $table->alias       = $row['alias'];
        $table->description = $this->tokens((string) ($row['description'] ?? ''));
        $table->images      = $images;
        $table->published   = 1;
        $table->access      = 1;
        $table->language    = '*';
        $table->params      = '{}';
        $table->metadata    = '{}';
        $table->urls        = '{}';
        $table->note        = self::OWNER . $row['key'];
        $table->setLocation(1, 'last-child');

        if (!$table->check() || !$table->store()) {
            throw new \RuntimeException($row['key'] . ': ' . $table->getError());
        }

        $table->rebuildPath($table->id);
        $table->rebuild();

        return (int) $table->id;
    }

    /**
     * Авторы — пользователи Joomla в группе «Автор», заблокированные для входа: они нужны,
     * чтобы материалы были подписаны, а страница контакта автора показывала его материалы.
     */
    private function user(array $row): int
    {
        $db       = $this->db();
        $existing = $this->lookup('#__users', ['username' => $row['username']]);

        if (!$existing) {
            $db->setQuery($db->getQuery(true)->insert($db->quoteName('#__users'))
                ->columns($db->quoteName(['name', 'username', 'email', 'password', 'block', 'sendEmail', 'registerDate', 'params', 'requireReset']))
                ->values(implode(', ', [$db->quote($row['name']), $db->quote($row['username']), $db->quote($row['email']), $db->quote(\Joomla\CMS\User\UserHelper::hashPassword(bin2hex(random_bytes(16)))), 1, 0, $db->quote(Factory::getDate()->toSql()), $db->quote('{}'), 0])))->execute();
            $existing = (int) $db->insertid();
        } else {
            $db->setQuery($db->getQuery(true)->update($db->quoteName('#__users'))->set($db->quoteName('name') . ' = ' . $db->quote($row['name']))->where($db->quoteName('id') . ' = ' . $existing))->execute();
        }

        $mapped = (int) $db->setQuery($db->getQuery(true)->select('COUNT(*)')->from($db->quoteName('#__user_usergroup_map'))->where($db->quoteName('user_id') . ' = ' . $existing))->loadResult();

        if (!$mapped) {
            $db->setQuery($db->getQuery(true)->insert($db->quoteName('#__user_usergroup_map'))->columns($db->quoteName(['user_id', 'group_id']))->values($existing . ', 3'))->execute();
        }

        return $existing;
    }

    /** Кадры переезжают в images/wmarka-demo: медиаменеджер видит только images/ */
    private function photos(): int
    {
        $source = JPATH_ROOT . '/media/plg_sampledata_wmarka/photos';
        $target = JPATH_ROOT . '/' . self::IMAGES;

        if (!is_dir($source)) {
            return 0;
        }

        if (!is_dir($target) && !@mkdir($target, 0755, true) && !is_dir($target)) {
            throw new \RuntimeException(Text::_('PLG_SAMPLEDATA_WMARKA_ERR_IMAGES'));
        }

        $copied = 0;

        foreach ((array) glob($source . '/*.{jpg,jpeg,png,webp,svg}', GLOB_BRACE) as $file) {
            $name = basename((string) $file);

            if (!is_file($target . '/' . $name) && copy((string) $file, $target . '/' . $name)) {
                $copied++;
            }
        }

        return $copied;
    }

    private function article(array $row): int
    {
        $model    = $this->getApplication()->bootComponent('com_content')->getMVCFactory()->createModel('Article', 'Administrator', ['ignore_request' => true]);
        $catid    = $this->id('categories', $row['category']);
        $existing = $this->lookup('#__content', ['alias' => $row['alias'], 'catid' => $catid]);
        $tags     = array_map(fn ($key) => (string) $this->id('tags', $key), $row['tags'] ?? []);
        $text     = $this->tokens($row['intro'], true) . (trim((string) ($row['full'] ?? '')) !== '' ? '<hr id="system-readmore">' . $this->tokens($row['full'], true) : '');

        $data = [
            'id'          => $existing ?: 0,
            'title'       => $row['title'],
            'alias'       => $row['alias'],
            'catid'       => $catid,
            'articletext' => $text,
            'state'       => 1,
            'featured'    => (int) ($row['featured'] ?? 0),
            'access'      => 1,
            'language'    => '*',
            'publish_up'  => $row['date'] ?? null,
            'created'     => $row['date'] ?? null,
            'created_by_alias' => !empty($row['user']) ? '' : (string) ($row['author'] ?? ''),
            'created_by'  => !empty($row['user']) ? $this->id('users', $row['user']) : (int) $this->getApplication()->getIdentity()->id,
            'note'        => self::OWNER . $row['key'],
            // Достаточно вступительного кадра: шаблон покажет его и в полной статье
            'images'      => [
                'image_intro'            => $this->tokens((string) ($row['image'] ?? '')),
                'image_intro_alt'        => (string) ($row['image_alt'] ?? $row['title']),
                'image_intro_caption'    => '',
                'float_intro'            => '',
                'image_fulltext'         => '',
                'image_fulltext_alt'     => '',
                'image_fulltext_caption' => (string) ($row['caption'] ?? ''),
                'float_fulltext'         => '',
            ],
            'urls'        => ['urla' => '', 'urlatext' => '', 'targeta' => '', 'urlb' => '', 'urlbtext' => '', 'targetb' => '', 'urlc' => '', 'urlctext' => '', 'targetc' => ''],
            'attribs'     => [],
            'metadesc'    => (string) ($row['metadesc'] ?? ''),
            // Ключевые слова = названия меток: по ним модуль «Похожие материалы» находит соседей
            'metakey'     => (string) ($row['metakey'] ?? ''),
            'metadata'    => ['robots' => '', 'author' => '', 'rights' => ''],
            'tags'        => $tags,
        ];

        if (!$model->save($data)) {
            throw new \RuntimeException($row['key'] . ': ' . $model->getError());
        }

        $id = (int) $model->getState('article.id');

        // Просмотры: без них модуль «Популярное» пуст, а счётчик в карточках — сплошные нули
        if (isset($row['hits'])) {
            $db = $this->db();
            $db->setQuery($db->getQuery(true)->update($db->quoteName('#__content'))->set($db->quoteName('hits') . ' = ' . (int) $row['hits'])->where($db->quoteName('id') . ' = ' . $id))->execute();
        }

        return $id;
    }

    private function contact(array $row): int
    {
        $model    = $this->getApplication()->bootComponent('com_contact')->getMVCFactory()->createModel('Contact', 'Administrator', ['ignore_request' => true]);
        $catid    = $this->id('categories', $row['category']);
        $existing = $this->lookup('#__contact_details', ['alias' => $row['alias'], 'catid' => $catid]);

        $data = [
            'id'           => $existing ?: 0,
            'name'         => $row['name'],
            'alias'        => $row['alias'],
            'catid'        => $catid,
            'con_position' => (string) ($row['position'] ?? ''),
            'address'      => (string) ($row['address'] ?? ''),
            'suburb'       => (string) ($row['suburb'] ?? ''),
            'state'        => '',
            'country'      => (string) ($row['country'] ?? ''),
            'postcode'     => (string) ($row['postcode'] ?? ''),
            'telephone'    => (string) ($row['telephone'] ?? ''),
            'mobile'       => (string) ($row['mobile'] ?? ''),
            'fax'          => '',
            'email_to'     => (string) ($row['email'] ?? ''),
            'webpage'      => (string) ($row['webpage'] ?? ''),
            'misc'         => $this->tokens((string) ($row['misc'] ?? ''), true),
            'image'        => $this->tokens((string) ($row['image'] ?? '')),
            'published'    => 1,
            'featured'     => (int) ($row['featured'] ?? 0),
            'access'       => 1,
            'language'     => '*',
            'ordering'     => (int) ($row['ordering'] ?? 0),
            'user_id'      => !empty($row['user']) ? $this->id('users', $row['user']) : 0,
            'params'       => (array) ($row['params'] ?? []),
            'metadata'     => ['robots' => '', 'rights' => ''],
        ];

        if (!$model->save($data)) {
            throw new \RuntimeException($row['key'] . ': ' . $model->getError());
        }

        return (int) $model->getState('contact.id');
    }

    private function menuType(array $row): void
    {
        if ($this->lookup('#__menu_types', ['menutype' => $row['menutype']])) {
            return;
        }

        $type              = new MenuType($this->db(), $this->getDispatcher());
        $type->menutype    = $row['menutype'];
        $type->title       = $row['title'];
        $type->description = (string) ($row['description'] ?? '');
        $type->client_id   = 0;

        if (!$type->store()) {
            throw new \RuntimeException($row['menutype'] . ': ' . $type->getError());
        }
    }

    private function menuItem(array $row): int
    {
        $db     = $this->db();
        $kind   = $row['type'];
        $layout = !empty($row['layout']) ? '&layout=' . $row['layout'] : '';

        [$link, $component, $type] = match ($kind) {
            'blank'      => ['index.php?option=com_blank&view=blank', 'com_blank', 'component'],
            'blog'       => ['index.php?option=com_content&view=category&layout=blog&id=' . $this->id('categories', $row['category']), 'com_content', 'component'],
            'category'   => ['index.php?option=com_content&view=category&id=' . $this->id('categories', $row['category']), 'com_content', 'component'],
            'categories' => ['index.php?option=com_content&view=categories&id=0', 'com_content', 'component'],
            'archive'    => ['index.php?option=com_content&view=archive', 'com_content', 'component'],
            'article'    => ['index.php?option=com_content&view=article&id=' . $this->id('articles', $row['article']) . '&catid=' . $this->id('categories', $row['category']), 'com_content', 'component'],
            'tags'       => ['index.php?option=com_tags&view=tags' . $layout, 'com_tags', 'component'],
            'tag'        => ['index.php?option=com_tags&view=tag' . $layout . '&id[0]=' . $this->id('tags', $row['tag']), 'com_tags', 'component'],
            'contact'    => ['index.php?option=com_contact&view=contact&id=' . $this->id('contacts', $row['contact']), 'com_contact', 'component'],
            'contacts'   => ['index.php?option=com_contact&view=category' . $layout . '&id=' . $this->id('categories', $row['category']), 'com_contact', 'component'],
            'finder'     => ['index.php?option=com_finder&view=search', 'com_finder', 'component'],
            'alias'      => ['index.php?Itemid=', '', 'alias'],
            'heading'    => ['', '', 'heading'],
            'url'        => [$this->tokens((string) $row['url']), '', 'url'],
            default      => throw new \RuntimeException('menu type: ' . $kind),
        };

        $parent = !empty($row['parent']) ? $this->id('menu', $row['parent']) : 1;
        $params = [
            'menu-anchor_title' => '',
            'menu-anchor_css'   => (string) ($row['css'] ?? ''),
            'menu_icon_css'     => '',
            'menu_image'        => '',
            'menu_image_css'    => '',
            'menu_text'         => 1,
            'menu_show'         => (int) ($row['show'] ?? 1),
            'pageclass_sfx'     => (string) ($row['pageclass'] ?? ''),
            'menu-meta_description' => (string) ($row['metadesc'] ?? ''),
            'robots'            => '',
        ];

        $params['wmarka_demo'] = self::OWNER . $row['key'];

        if ($kind === 'alias') {
            $params['aliasoptions']   = $this->id('menu', $row['target']);
            $params['alias_redirect'] = 0;
        }

        foreach ((array) ($row['params'] ?? []) as $key => $value) {
            $params[$key] = \is_string($value) ? $this->tokens($value) : $value;
        }

        $table    = new MenuTable($db, $this->getDispatcher());
        $existing = $this->lookup('#__menu', ['alias' => $row['alias'], 'parent_id' => $parent, 'client_id' => 0]);

        if ($existing) {
            $table->load($existing);
        }

        $table->menutype     = $row['menutype'];
        $table->title        = $row['title'];
        $table->alias        = $row['alias'];
        // Заметку пункта шаблон показывает в мегаменю (подпись колонки, заголовок окна),
        // поэтому метка владельца у пунктов меню живёт в параметрах, а не в заметке
        $table->note         = (string) ($row['note'] ?? '');
        $table->link         = $link;
        $table->type         = $type;
        $table->published    = 1;
        $table->parent_id    = $parent;
        $table->component_id = $component !== '' ? $this->componentId($component) : 0;
        $table->access       = 1;
        $table->language     = '*';
        $table->browserNav   = (int) ($row['browserNav'] ?? 0);
        $table->params       = (new Registry($params))->toString();
        $table->img          = '';
        $table->home         = 0;
        $table->setLocation($parent, 'last-child');

        if (!$table->check() || !$table->store()) {
            throw new \RuntimeException($row['key'] . ': ' . $table->getError());
        }

        $id = (int) $table->id;

        if (!empty($row['home'])) {
            $db->setQuery($db->getQuery(true)->update($db->quoteName('#__menu'))->set($db->quoteName('home') . ' = 0')->where($db->quoteName('client_id') . ' = 0')->where($db->quoteName('language') . ' = ' . $db->quote('*')))->execute();
            $db->setQuery($db->getQuery(true)->update($db->quoteName('#__menu'))->set($db->quoteName('home') . ' = 1')->where($db->quoteName('id') . ' = ' . $id))->execute();
        }

        return $id;
    }

    /** Ссылки %MENU:…% в материалах и контактах — после того, как меню создано */
    private function relink(): void
    {
        $db = $this->db();

        foreach ([['#__content', ['introtext', 'fulltext'], 'articles'], ['#__contact_details', ['misc'], 'contacts']] as [$table, $columns, $bucket]) {
            foreach ($this->registry[$bucket] ?? [] as $id) {
                $row = $db->setQuery($db->getQuery(true)->select($db->quoteName($columns))->from($db->quoteName($table))->where($db->quoteName('id') . ' = ' . (int) $id))->loadAssoc();

                if (!$row) {
                    continue;
                }

                $query = $db->getQuery(true)->update($db->quoteName($table))->where($db->quoteName('id') . ' = ' . (int) $id);

                foreach ($columns as $column) {
                    $query->set($db->quoteName($column) . ' = ' . $db->quote($this->tokens((string) $row[$column])));
                }

                $db->setQuery($query)->execute();
            }
        }
    }

    private function menuCss(int $id, string $css): void
    {
        $table = new MenuTable($this->db(), $this->getDispatcher());

        if ($table->load($id)) {
            $params = new Registry($table->params);
            $params->set('menu-anchor_css', $css);
            $table->params = $params->toString();
            $table->store();
        }
    }

    private function module(array $row): int
    {
        $db       = $this->db();
        $table    = new ModuleTable($db, $this->getDispatcher());
        $existing = $this->lookup('#__modules', ['note' => self::OWNER . $row['key'], 'client_id' => 0]);

        if ($existing) {
            $table->load($existing);
        }

        $params = [];

        foreach ((array) ($row['params'] ?? []) as $key => $value) {
            $params[$key] = match (true) {
                $key === 'catid'   => array_map(fn ($k) => (string) $this->id('categories', (string) $k), (array) $value),
                $key === 'filter_tag' => array_map(fn ($k) => (string) $this->id('tags', (string) $k), (array) $value),
                \is_string($value) => $this->tokens($value),
                default            => $value,
            };
        }

        $table->title     = $row['title'];
        $table->note      = self::OWNER . $row['key'];
        $table->content   = $this->tokens((string) ($row['content'] ?? ''));
        $table->position  = $row['position'];
        $table->ordering  = (int) ($row['ordering'] ?? 1);
        $table->published = 1;
        $table->module    = $row['module'];
        $table->access    = 1;
        $table->showtitle = (int) ($row['showtitle'] ?? 0);
        $table->params    = (new Registry($params))->toString();
        $table->client_id = 0;
        $table->language  = '*';

        if (!$table->check() || !$table->store()) {
            throw new \RuntimeException($row['key'] . ': ' . $table->getError());
        }

        $id = (int) $table->id;

        $db->setQuery($db->getQuery(true)->delete($db->quoteName('#__modules_menu'))->where($db->quoteName('moduleid') . ' = ' . $id))->execute();

        // Привязка: all — все страницы; home — главная; {"only": [...]} — только эти пункты;
        // {"except": [...]} — все, кроме этих (ключи пунктов из menus.json)
        $assign  = $row['assign'] ?? 'all';
        $targets = match (true) {
            $assign === 'home'       => [$this->id('menu', 'home')],
            isset($assign['only'])   => array_map(fn ($k) => $this->id('menu', $k), (array) $assign['only']),
            isset($assign['except']) => array_map(fn ($k) => -$this->id('menu', $k), (array) $assign['except']),
            default                  => [0],
        };

        foreach ($targets as $menuId) {
            $db->setQuery($db->getQuery(true)->insert($db->quoteName('#__modules_menu'))->columns([$db->quoteName('moduleid'), $db->quoteName('menuid')])->values($id . ', ' . (int) $menuId))->execute();
        }

        $this->remember('modules', $row['key'], $id);

        return $id;
    }

    private function templateStyle(): string
    {
        $db = $this->db();

        // Демо идёт на дочернем шаблоне (settings.json → style_template, например wmarka_vestnik),
        // если он установлен; иначе — на родительском wmarka
        $target = (string) ($this->json('settings.json')['style_template'] ?? 'wmarka');
        $row    = $this->lookup('#__template_styles', ['template' => $target, 'client_id' => 0]);

        if (!$row) {
            $target = 'wmarka';
            $row    = $this->lookup('#__template_styles', ['template' => 'wmarka', 'client_id' => 0]);
        }

        $isChild = $target !== 'wmarka';

        if (!$row) {
            return Text::_('PLG_SAMPLEDATA_WMARKA_STEP6_NOSTYLE');
        }

        $current = (string) $db->setQuery($db->getQuery(true)->select($db->quoteName('params'))->from($db->quoteName('#__template_styles'))->where($db->quoteName('id') . ' = ' . $row))->loadResult();
        $params  = new Registry($current);

        foreach ($this->json('settings.json')['template'] as $key => $value) {
            $params->set($key, \is_string($value) ? $this->tokens($value) : $value);
        }

        $db->setQuery($db->getQuery(true)->update($db->quoteName('#__template_styles'))->set($db->quoteName('params') . ' = ' . $db->quote($params->toString()))->set($db->quoteName('home') . ' = ' . $db->quote('1'))->where($db->quoteName('id') . ' = ' . $row))->execute();
        $db->setQuery($db->getQuery(true)->update($db->quoteName('#__template_styles'))->set($db->quoteName('home') . ' = ' . $db->quote('0'))->where($db->quoteName('client_id') . ' = 0')->where($db->quoteName('id') . ' <> ' . $row))->execute();

        // Дополнительные стили (например, страница позиций с шапкой «логотип над меню»):
        // копия основного стиля с изменёнными параметрами, назначенная пунктам меню
        foreach ($this->json('settings.json')['styles'] ?? [] as $key => $style) {
            $extra = new Registry($params->toString());

            foreach ($style['params'] as $name => $value) {
                $extra->set($name, $value);
            }

            // Стиль дочернего шаблона — как его пишет ядро (TemplateModel::copyStyles):
            // template = дочерний, inheritable = 0, parent = wmarka. Стиль самого родителя —
            // как при копировании стиля: inheritable = 1, parent пустой
            $styleId = $this->lookup('#__template_styles', ['client_id' => 0, 'title' => $style['title']]);
            $cols    = [
                'template'    => $target,
                'inheritable' => $isChild ? 0 : 1,
                'parent'      => $isChild ? 'wmarka' : '',
                'params'      => $extra->toString(),
            ];

            if ($styleId) {
                $query = $db->getQuery(true)->update($db->quoteName('#__template_styles'))->where($db->quoteName('id') . ' = ' . $styleId);

                foreach ($cols as $name => $value) {
                    $query->set($db->quoteName($name) . ' = ' . $db->quote((string) $value));
                }

                $db->setQuery($query)->execute();
            } else {
                $db->setQuery($db->getQuery(true)->insert($db->quoteName('#__template_styles'))->columns($db->quoteName(['template', 'client_id', 'home', 'title', 'inheritable', 'parent', 'params']))
                    ->values(implode(', ', [$db->quote($target), 0, $db->quote('0'), $db->quote($style['title']), (int) $cols['inheritable'], $db->quote($cols['parent']), $db->quote($cols['params'])])))->execute();
                $styleId = (int) $db->insertid();
            }

            foreach ($this->json('menus.json')['items'] as $item) {
                if (($item['style'] ?? '') === $key) {
                    $db->setQuery($db->getQuery(true)->update($db->quoteName('#__menu'))->set($db->quoteName('template_style_id') . ' = ' . $styleId)->where($db->quoteName('id') . ' = ' . $this->id('menu', $item['key'])))->execute();
                }
            }
        }

        return Text::_('PLG_SAMPLEDATA_WMARKA_STEP6_STYLE');
    }

    /** Опции компонентов под демо: только перечисленные ключи, остальное не трогается */
    private function componentParams(): string
    {
        $db = $this->db();

        foreach ($this->json('settings.json')['components'] as $element => $values) {
            $params = clone ComponentHelper::getParams($element);

            foreach ($values as $key => $value) {
                $params->set($key, $value);
            }

            $db->setQuery($db->getQuery(true)->update($db->quoteName('#__extensions'))->set($db->quoteName('params') . ' = ' . $db->quote($params->toString()))->where($db->quoteName('type') . ' = ' . $db->quote('component'))->where($db->quoteName('element') . ' = ' . $db->quote($element)))->execute();
        }

        // Плагины: «Постраничная навигация» показывает названия соседних статей
        foreach ($this->json('settings.json')['plugins'] ?? [] as $name => $values) {
            [$folder, $element] = explode('/', $name, 2);
            $current = (string) $db->setQuery($db->getQuery(true)->select($db->quoteName('params'))->from($db->quoteName('#__extensions'))->where($db->quoteName('type') . ' = ' . $db->quote('plugin'))->where($db->quoteName('folder') . ' = ' . $db->quote($folder))->where($db->quoteName('element') . ' = ' . $db->quote($element)))->loadResult();
            $params  = new Registry($current);

            foreach ($values as $key => $value) {
                $params->set($key, $value);
            }

            $db->setQuery($db->getQuery(true)->update($db->quoteName('#__extensions'))->set($db->quoteName('params') . ' = ' . $db->quote($params->toString()))->where($db->quoteName('type') . ' = ' . $db->quote('plugin'))->where($db->quoteName('folder') . ' = ' . $db->quote($folder))->where($db->quoteName('element') . ' = ' . $db->quote($element)))->execute();
        }

        return Text::_('PLG_SAMPLEDATA_WMARKA_STEP6_COMPONENTS');
    }

    /** Выключенный com_blank не виден в выборе типа пункта меню, а главная на нём падает в 404 */
    private function enableBlank(): void
    {
        $db = $this->db();
        $db->setQuery($db->getQuery(true)->update($db->quoteName('#__extensions'))->set($db->quoteName('enabled') . ' = 1')->where($db->quoteName('type') . ' = ' . $db->quote('component'))->where($db->quoteName('element') . ' = ' . $db->quote('com_blank')))->execute();
    }

    private function db(): DatabaseInterface
    {
        return Factory::getContainer()->get(DatabaseInterface::class);
    }

    private function json(string $file): array
    {
        static $cache = [];

        if (!isset($cache[$file])) {
            $path = \dirname(__DIR__, 2) . '/data/' . $file;

            if (!is_file($path)) {
                throw new \RuntimeException(Text::sprintf('PLG_SAMPLEDATA_WMARKA_ERR_DATA', $file));
            }

            $cache[$file] = (array) json_decode((string) file_get_contents($path), true);
        }

        return $cache[$file];
    }

    /**
     * %IMG% — относительный путь images/wmarka-demo (поля картинок Joomla хранят его так),
     * %R% — корень сайта для ссылок в HTML, %MENU:ключ% и %CAT:ключ% — из реестра.
     */
    private function tokens(string $value, bool $defer = false): string
    {
        $value = str_replace(['%IMG%', '%R%'], [self::IMAGES, Uri::root(true)], $value);

        // Ссылки на пункты меню в текстах материалов: меню создаётся позже материалов,
        // поэтому %MENU:…% остаются до шага 4 и разрешаются там (relink)
        if ($defer) {
            return $value;
        }

        return (string) preg_replace_callback('/%(MENU|MENUID|CAT):([\w-]+)%/', function (array $m): string {
            return match ($m[1]) {
                'MENU'   => 'index.php?Itemid=' . $this->id('menu', $m[2]),
                'MENUID' => (string) $this->id('menu', $m[2]),
                default  => (string) $this->id('categories', $m[2]),
            };
        }, $value);
    }

    /** id из реестра; без него — понятная ошибка вместо тихого id = 0 */
    private function id(string $bucket, string $key): int
    {
        $id = (int) ($this->registry[$bucket][$key] ?? 0);

        if (!$id) {
            throw new \RuntimeException(Text::sprintf('PLG_SAMPLEDATA_WMARKA_ERR_KEY', $bucket . '/' . $key));
        }

        return $id;
    }

    private function lookup(string $table, array $where): int
    {
        $db    = $this->db();
        $query = $db->getQuery(true)->select($db->quoteName('id'))->from($db->quoteName($table));

        foreach ($where as $column => $value) {
            $query->where($db->quoteName($column) . ' = ' . $db->quote((string) $value));
        }

        return (int) ($db->setQuery($query, 0, 1)->loadResult() ?? 0);
    }

    private function componentId(string $element): int
    {
        $db = $this->db();

        return (int) ($db->setQuery($db->getQuery(true)->select($db->quoteName('extension_id'))->from($db->quoteName('#__extensions'))->where($db->quoteName('type') . ' = ' . $db->quote('component'))->where($db->quoteName('element') . ' = ' . $db->quote($element)), 0, 1)->loadResult() ?? 0);
    }

    private function remember(string $bucket, string $key, int $id): void
    {
        $this->registry[$bucket][$key] = $id;
    }

    private function saveRegistry(): void
    {
        $db     = $this->db();
        $params = new Registry($this->params->toArray());
        $params->set('registry', json_encode($this->registry, JSON_UNESCAPED_UNICODE));

        $db->setQuery($db->getQuery(true)->update($db->quoteName('#__extensions'))->set($db->quoteName('params') . ' = ' . $db->quote($params->toString()))->where($db->quoteName('type') . ' = ' . $db->quote('plugin'))->where($db->quoteName('folder') . ' = ' . $db->quote('sampledata'))->where($db->quoteName('element') . ' = ' . $db->quote('wmarka')))->execute();

        $this->params->set('registry', $params->get('registry'));
    }
}

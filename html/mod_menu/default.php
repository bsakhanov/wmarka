<?php
/**
 * WMARKA — меню. Вид зависит от позиции модуля:
 *   navbar-*    → uk-navbar-nav с выпадающими списками (мобильно скрыто, есть оффканвас);
 *   offcanvas*  → вертикальная uk-nav (копия меню навбара в мобильной панели);
 *   прочие      → вертикальная uk-nav uk-nav-default с вложенными uk-nav-sub.
 * Макет wm-subnav — строка ссылок uk-subnav (тулбар, подвал).
 *
 * Токены поля «CSS-класс ссылки» пункта 1-го уровня в навбаре:
 *   wm-mega               — мегаменю из подпунктов: 2-й уровень — колонки, 3-й — ссылки;
 *   wm-mega:тип_меню      — мегаменю из вспомогательного меню (пункты 1-го уровня — колонки);
 *   wm-mega-modal:тип_меню — то же во весь экран (модальное окно);
 *   uk-icon:имя           — иконка UIkit перед названием (wm-icon-only — только иконка);
 *   wm-mod-ID             — вставить модуль по ID в колонку мегаменю;
 *   wm-col-footer         — пункт-подвал колонки; wm-invert — тёмная колонка.
 *
 * @var \Joomla\Registry\Registry $params
 * @var array  $list
 * @var array  $path
 * @var int    $active_id
 * @var object $module
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Filter\OutputFilter;
use Wmarka\Template\Config;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

if (empty($list)) {
    return;
}

$position = (string) ($module->position ?? '');
$wmMode ??= str_starts_with($position, 'navbar') ? 'navbar' : (str_starts_with($position, 'offcanvas') ? 'offcanvas' : 'nav');
$bp       = Config::bp();
$tagId    = $params->get('tag_id') ? ' id="' . Ui::esc($params->get('tag_id')) . '"' : '';
$sfx      = trim((string) $params->get('class_sfx', ''));
$path     = array_map('intval', (array) ($path ?? []));

$tokenRe = '/(?:^|\s)(?:wm-mega(?:-modal)?(?::[\w-]+)?|wm-mod-\d+|wm-icon-only|wm-col-footer|wm-invert|uk-icon:[\w-]+)(?=\s|$)/i';

$cssOf = static fn ($item): string => (string) ($item->anchor_css ?? $item->getParams()->get('menu-anchor_css', ''));

$icon = static function (string $css): string {
    return preg_match('/uk-icon:([\w-]+)/i', $css, $m) ? '<span uk-icon="icon: ' . strtolower($m[1]) . '; ratio: 0.9" class="uk-margin-xsmall-right"></span>' : '';
};

$moduleById = static function (string $css): string {
    if (!preg_match('/wm-mod-(\d+)/', $css, $m)) {
        return '';
    }

    $mod = ModuleHelper::getModuleById($m[1]);

    return ($mod && $mod->id) ? '<div class="uk-margin-small-top">' . ModuleHelper::renderModule($mod, ['style' => 'none']) . '</div>' : '';
};

/** Ссылка пункта (основное меню: $item->flink уже готов у хелпера модуля) */
$anchor = static function ($item, string $inner = '', string $extraClass = '') use ($cssOf, $tokenRe, $icon, $active_id): string {
    $css   = $cssOf($item);
    $class = trim(preg_replace('/\s+/', ' ', preg_replace($tokenRe, ' ', $css) ?? '') . ' ' . $extraClass);
    $title = htmlspecialchars((string) $item->title, ENT_QUOTES, 'UTF-8');
    $only  = str_contains($css, 'wm-icon-only');
    $label = $icon($css) . ($only ? '<span class="uk-hidden-visually">' . $title . '</span>' : $title);

    if (!empty($item->menu_image)) {
        $textOn = (int) $item->getParams()->get('menu_text', 1) === 1;
        $label  = HTMLHelper::_('image', $item->menu_image, $textOn ? '' : $title, ['class' => trim('uk-margin-xsmall-right ' . ($item->menu_image_css ?? ''))])
            . ($textOn ? $label : '<span class="uk-hidden-visually">' . $title . '</span>');
    }

    if (\in_array($item->type, ['separator', 'heading'], true)) {
        return '<a href="#" role="button"' . ($class !== '' ? ' class="' . Ui::esc($class) . '"' : '') . '>' . $label . $inner . '</a>';
    }

    $attrs = ' href="' . OutputFilter::ampReplace(htmlspecialchars((string) ($item->flink ?? '#'), ENT_COMPAT, 'UTF-8', false)) . '"';
    $attrs .= $class !== '' ? ' class="' . Ui::esc($class) . '"' : '';
    $attrs .= !empty($item->anchor_title) ? ' title="' . Ui::esc($item->anchor_title) . '"' : ($only ? ' title="' . $title . '"' : '');
    $attrs .= !empty($item->anchor_rel) ? ' rel="' . Ui::esc($item->anchor_rel) . '"' : '';
    $attrs .= (int) $item->browserNav === 1 ? ' target="_blank" rel="noopener"' : '';
    $attrs .= (int) $item->browserNav === 2 ? ' onclick="window.open(this.href, \'targetWindow\', \'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes\'); return false;"' : '';
    $attrs .= (int) $item->id === (int) $active_id ? ' aria-current="page"' : '';

    return '<a' . $attrs . '>' . $label . $inner . '</a>';
};

/** Пункты вспомогательного меню (для wm-mega:тип) — у них нет flink */
$auxLink = static function ($it): string {
    return match ($it->type) {
        'url'                  => (string) $it->link,
        'heading', 'separator' => '#',
        'alias'                => ($t = (int) $it->getParams()->get('aliasoptions')) ? Route::_('index.php?Itemid=' . $t) : '#',
        default                => Route::_('index.php?Itemid=' . (int) $it->id),
    };
};

// Дерево текущего меню
$ids = [];

foreach ($list as $item) {
    $ids[(int) $item->id] = true;
}

$tree = [];

foreach ($list as $item) {
    $tree[isset($ids[(int) $item->parent_id]) ? (int) $item->parent_id : 0][] = $item;
}

$isActive = static fn ($item): bool => (int) $item->id === (int) $active_id || \in_array((int) $item->id, $path, true);

/** Вложенный список (dropdown-nav, nav-sub) */
$sub = static function (int $parent, string $ulClass) use (&$sub, $tree, $anchor, $isActive): string {
    if (empty($tree[$parent])) {
        return '';
    }

    $html = '<ul class="' . $ulClass . '">';

    foreach ($tree[$parent] as $item) {
        if ($item->type === 'separator' && !empty($tree[(int) $item->id]) === false) {
            $html .= '<li class="uk-nav-divider"></li>';
            continue;
        }

        if ($item->type === 'heading' && empty($tree[(int) $item->id])) {
            $html .= '<li class="uk-nav-header">' . htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8') . '</li>';
            continue;
        }

        $html .= '<li' . ($isActive($item) ? ' class="uk-active"' : '') . '>' . $anchor($item) . $sub((int) $item->id, 'uk-nav-sub') . '</li>';
    }

    return $html . '</ul>';
};

/**
 * Мегаменю: колонки собираются в данные, а выводятся двумя способами —
 * выпадающая панель (карточка UIkit на колонку) и полноэкранное окно
 * (секция на колонку, карточка на каждый пункт).
 *
 * Колонка: title, link, note, css, module, invert, items[], footer[].
 * Пункт:   title, href, css (uk-icon:имя), note (заметка пункта меню), active, target, children.
 */
$leafData = static function ($leaf, string $href, string $css, string $children, bool $active): array {
    return [
        'title'    => (string) $leaf->title,
        'href'     => $href,
        'css'      => $css,
        'note'     => trim((string) ($leaf->note ?? '')),
        'active'   => $active,
        'target'   => (int) ($leaf->browserNav ?? 0) === 1,
        'children' => $children,
    ];
};

$megaColumns = static function ($item, string $menutype) use ($tree, $sub, $cssOf, $moduleById, $auxLink, $isActive, $leafData, $active_id): array {
    $cols = [];
    $push = static function (array &$cols, $col, string $link, string $css, array $leaves) use ($moduleById): void {
        $items = $footer = [];

        foreach ($leaves as $l) {
            str_contains($l['css'], 'wm-col-footer') ? $footer[] = $l : $items[] = $l;
        }

        $cols[] = [
            'title'  => (string) $col->title,
            'link'   => $link,
            'note'   => trim((string) ($col->note ?? '')),
            'css'    => $css,
            'module' => $moduleById($css),
            'invert' => str_contains($css, 'wm-invert'),
            'items'  => $items,
            'footer' => $footer,
        ];
    };

    if ($menutype === '') {
        foreach ($tree[(int) $item->id] ?? [] as $col) {
            $leaves = [];

            foreach ($tree[(int) $col->id] ?? [] as $leaf) {
                $leaves[] = $leafData($leaf, (string) ($leaf->flink ?? '#'), $cssOf($leaf), $sub((int) $leaf->id, 'uk-nav-sub'), (bool) $isActive($leaf));
            }

            $push($cols, $col, \in_array($col->type, ['heading', 'separator'], true) ? '' : (string) ($col->flink ?? ''), $cssOf($col), $leaves);
        }

        return $cols;
    }

    $byParent = [];

    foreach (Factory::getApplication()->getMenu()->getItems('menutype', $menutype) ?: [] as $it) {
        $byParent[(int) $it->parent_id][] = $it;
    }

    foreach ($byParent[1] ?? [] as $col) {
        $leaves = [];

        foreach ($byParent[(int) $col->id] ?? [] as $leaf) {
            if (\in_array($leaf->type, ['heading', 'separator'], true)) {
                continue;
            }

            $current  = (int) $active_id > 0 && \in_array((int) $active_id, [(int) $leaf->id, (int) $leaf->getParams()->get('aliasoptions', 0)], true);
            $leaves[] = $leafData($leaf, $auxLink($leaf), (string) $leaf->getParams()->get('menu-anchor_css', ''), '', $current);
        }

        $push($cols, $col, \in_array($col->type, ['heading', 'separator'], true) ? '' : $auxLink($col), (string) $col->getParams()->get('menu-anchor_css', ''), $leaves);
    }

    return $cols;
};

$linkOf = static function (array $l, string $class = '') use ($icon): string {
    return '<a' . ($class !== '' ? ' class="' . $class . '"' : '') . ' href="' . $l['href'] . '"' . ($l['target'] ? ' target="_blank" rel="noopener"' : '')
        . '>' . $icon($l['css']) . htmlspecialchars($l['title'], ENT_QUOTES, 'UTF-8') . '</a>';
};

/** Выпадающая панель: колонка — карточка с шапкой, списком ссылок и подвалом */
$dropColumn = static function (array $c) use ($linkOf): string {
    $title = htmlspecialchars($c['title'], ENT_QUOTES, 'UTF-8');
    $card  = $c['invert'] ? 'uk-card-secondary uk-light' : 'uk-card-default';

    // Колонка-модуль: модуль сам рисует свою карточку, второй рамки вокруг нет
    if ($c['module'] !== '' && !$c['items']) {
        return '<div' . ($c['invert'] ? ' class="uk-light"' : '') . '><p class="uk-text-meta uk-margin-small-bottom">' . $title . '</p>' . $c['module'] . '</div>';
    }

    $head = '<div class="uk-card-header"><h3 class="uk-h5 uk-margin-remove">'
        . ($c['link'] !== '' ? '<a class="uk-link-heading" href="' . $c['link'] . '">' . $title . '</a>' : $title) . '</h3>'
        . ($c['note'] !== '' ? '<p class="uk-text-meta uk-margin-xsmall-top uk-margin-remove-bottom">' . Ui::esc($c['note']) . '</p>' : '') . '</div>';
    $list = '';

    foreach ($c['items'] as $l) {
        $list .= '<li' . ($l['active'] ? ' class="uk-active"' : '') . '>' . $linkOf($l) . $l['children'] . '</li>';
    }

    $foot = '';

    foreach ($c['footer'] as $l) {
        $foot .= $linkOf($l, 'uk-button uk-button-text');
    }

    return '<div><div class="uk-card ' . $card . ' uk-card-small">' . $head
        . '<div class="uk-card-body"><ul class="uk-nav uk-navbar-dropdown-nav">' . $list . '</ul>' . $c['module'] . '</div>'
        . ($foot !== '' ? '<div class="uk-card-footer">' . $foot . '</div>' : '') . '</div></div>';
};

/** Полноэкранное окно: колонка — секция с заголовком-линией, каждый пункт — карточка с иконкой и заметкой */
$modalSection = static function (array $c) use ($linkOf): string {
    $cards = '';

    foreach (array_merge($c['items'], $c['footer']) as $l) {
        $iconName = preg_match('/uk-icon:([\w-]+)/', $l['css'], $m) ? $m[1] : '';
        $cards   .= '<div><a class="uk-link-toggle uk-display-block uk-height-1-1" href="' . $l['href'] . '"' . ($l['target'] ? ' target="_blank" rel="noopener"' : '') . '>'
            . '<div class="uk-card ' . ($l['active'] ? 'uk-card-primary' : 'uk-card-default') . ' uk-card-hover uk-card-body uk-height-1-1">'
            . ($iconName !== '' ? '<span class="' . ($l['active'] ? '' : 'uk-text-primary') . '" uk-icon="icon: ' . $iconName . '; ratio: 1.6"></span>' : '')
            . '<h4 class="uk-h5 uk-margin-small-top uk-margin-remove-bottom"><span class="uk-link-heading">' . htmlspecialchars($l['title'], ENT_QUOTES, 'UTF-8') . '</span>'
            . ($l['target'] ? ' <span uk-icon="icon: arrow-up-right; ratio: 0.8"></span>' : '') . '</h4>'
            . ($l['note'] !== '' ? '<p class="uk-text-small uk-margin-xsmall-top uk-margin-remove-bottom' . ($l['active'] ? '' : ' uk-text-muted') . '">' . Ui::esc($l['note']) . '</p>' : '')
            . '</div></a></div>';
    }

    if ($c['module'] !== '') {
        $cards .= '<div><div class="uk-card ' . ($c['invert'] ? 'uk-card-secondary uk-light' : 'uk-card-default') . ' uk-card-body uk-height-1-1">' . $c['module'] . '</div></div>';
    }

    return '<section class="uk-margin-large-bottom">'
        . '<h3 class="uk-heading-line uk-h4"><span>' . htmlspecialchars($c['title'], ENT_QUOTES, 'UTF-8') . '</span></h3>'
        . ($c['note'] !== '' ? '<p class="uk-text-meta uk-margin-remove-top">' . Ui::esc($c['note']) . '</p>' : '')
        . '<div class="uk-grid-medium uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-grid-match" uk-grid>' . $cards . '</div>'
        . '</section>';
};

// ---------- Вывод ----------

if ($wmMode === 'subnav') : ?>
    <ul class="uk-subnav uk-subnav-divider uk-margin-remove <?php echo Ui::esc($sfx); ?>"<?php echo $tagId; ?>>
        <?php foreach ($tree[0] ?? [] as $item) : ?>
            <li<?php echo $isActive($item) ? ' class="uk-active"' : ''; ?>><?php echo $anchor($item); ?></li>
        <?php endforeach; ?>
    </ul>
<?php return; endif;

if ($wmMode !== 'navbar') :
    echo str_replace('<ul class="uk-nav uk-nav-default', '<ul' . $tagId . ' class="uk-nav uk-nav-default ' . Ui::esc($sfx), $sub(0, 'uk-nav uk-nav-default'));

    return;
endif;
?>
<ul class="uk-navbar-nav uk-visible@<?php echo $bp; ?> <?php echo Ui::esc($sfx); ?>"<?php echo $tagId; ?>>
    <?php foreach ($tree[0] ?? [] as $item) : ?>
        <?php
        $css      = $cssOf($item);
        $children = !empty($tree[(int) $item->id]);
        $classes  = ($isActive($item) ? 'uk-active' : '') . ($children ? ' uk-parent' : '');
        $modal    = preg_match('/wm-mega-modal:([\w-]+)/i', $css, $mm) ? $mm[1] : null;
        $mega     = $modal === null && preg_match('/(?:^|\s)wm-mega(?::([\w-]+))?(?=\s|$)/i', $css, $mg) ? ($mg[1] ?? '') : null;
        ?>
        <li<?php echo trim($classes) !== '' ? ' class="' . trim($classes) . '"' : ''; ?>>
            <?php if ($modal !== null) : ?>
                <?php $cols = $megaColumns($item, $modal); ?>
                <a href="#wm-mega-<?php echo (int) $item->id; ?>" uk-toggle><?php echo $icon($css) . (str_contains($css, 'wm-icon-only') ? '<span class="uk-hidden-visually">' . Ui::esc($item->title) . '</span>' : Ui::esc($item->title)); ?></a>
                <div id="wm-mega-<?php echo (int) $item->id; ?>" class="uk-modal-full" uk-modal>
                    <div class="uk-modal-dialog uk-background-muted" uk-height-viewport>
                        <button class="uk-modal-close-full uk-close-large" type="button" uk-close aria-label="<?php echo Ui::esc(Text::_('JLIB_HTML_BEHAVIOR_CLOSE')); ?>"></button>
                        <div class="uk-section uk-section-large">
                            <div class="<?php echo Config::container(); ?>">
                                <div class="uk-margin-large-bottom">
                                    <p class="uk-text-meta uk-margin-remove"><?php echo Ui::esc(Config::siteTitle()); ?></p>
                                    <h2 class="uk-heading-small uk-margin-small-top uk-margin-remove-bottom"><?php echo Ui::esc(trim((string) ($item->note ?? '')) ?: $item->title); ?></h2>
                                </div>
                                <?php echo $cols ? implode('', array_map($modalSection, $cols)) : '<!-- wm-mega-modal: в меню «' . Ui::esc($modal) . '» нет пунктов 1-го уровня -->'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif ($mega !== null) : ?>
                <?php $cols = $megaColumns($item, $mega); $n = max(1, min(5, \count($cols))); ?>
                <?php echo $anchor($item, ' <span uk-navbar-parent-icon></span>'); ?>
                <?php if ($cols) : ?>
                    <div class="uk-navbar-dropdown uk-navbar-dropdown-large uk-navbar-dropdown-width-<?php echo $n; ?> uk-background-muted">
                        <div class="uk-grid-small uk-child-width-1-2@s uk-child-width-1-<?php echo $n; ?>@m uk-grid-match" uk-grid><?php echo implode('', array_map($dropColumn, $cols)); ?></div>
                    </div>
                <?php endif; ?>
            <?php elseif ($children) : ?>
                <?php echo $anchor($item, ' <span uk-navbar-parent-icon></span>'); ?>
                <div class="uk-navbar-dropdown"><?php echo $sub((int) $item->id, 'uk-nav uk-navbar-dropdown-nav'); ?></div>
            <?php else : ?>
                <?php echo $anchor($item); ?>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>

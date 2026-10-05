<?php
/**
 * WMARKA — переключатель языков: строка uk-subnav или выпадающий список
 * uk-dropdown (без Bootstrap и CSS модуля ядра).
 *
 * @var \Joomla\Registry\Registry $params
 * @var array  $list
 * @var object $module
 * @var string $headerText
 * @var string $footerText
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

$label = static function ($language) use ($params): string {
    $html = '';

    if ($params->get($params->get('dropdown', 0) ? 'dropdownimage' : 'image', 1) && $language->image) {
        $html .= HTMLHelper::_('image', 'mod_languages/' . $language->image . '.gif', '', ['class' => 'uk-margin-xsmall-right'], true);
    }

    if ($params->get('full_name', 1) || !$params->get('image', 1) || !$language->image) {
        $html .= htmlspecialchars($params->get('full_name', 1) ? $language->title_native : strtoupper($language->sef), ENT_QUOTES, 'UTF-8');
    }

    return $html;
};
$href = static fn ($language): string => $language->active ? htmlspecialchars((string) Uri::getInstance(), ENT_QUOTES, 'UTF-8') : htmlspecialchars_decode(htmlspecialchars($language->link, ENT_QUOTES, 'UTF-8'), ENT_NOQUOTES);
?>
<div class="mod-languages">
    <?php if ($headerText) : ?><p class="uk-text-meta"><?php echo $headerText; ?></p><?php endif; ?>
    <?php if ($params->get('dropdown', 0)) : ?>
        <?php foreach ($list as $language) : ?>
            <?php if ($language->active) : ?>
                <button class="uk-button uk-button-default uk-button-small" type="button" aria-label="<?php echo Text::_('MOD_LANGUAGES_DESC'); ?>"><?php echo $label($language); ?> <span uk-icon="icon: chevron-down; ratio: 0.7"></span></button>
            <?php endif; ?>
        <?php endforeach; ?>
        <div uk-dropdown="mode: click; pos: bottom-right">
            <ul class="uk-nav uk-dropdown-nav">
                <?php foreach ($list as $language) : ?>
                    <?php if (!$language->active || $params->get('show_active', 1)) : ?>
                        <li<?php echo $language->active ? ' class="uk-active"' : ''; ?>><a href="<?php echo $href($language); ?>" lang="<?php echo $language->lang_code; ?>"<?php echo $language->active ? ' aria-current="true"' : ''; ?>><?php echo $label($language); ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php else : ?>
        <ul class="uk-subnav uk-subnav-divider uk-margin-remove<?php echo $params->get('inline', 1) ? '' : ' uk-flex-column'; ?>">
            <?php foreach ($list as $language) : ?>
                <?php if (!$language->active || $params->get('show_active', 1)) : ?>
                    <li<?php echo $language->active ? ' class="uk-active"' : ''; ?>><a href="<?php echo $href($language); ?>" lang="<?php echo $language->lang_code; ?>" title="<?php echo htmlspecialchars($language->title_native, ENT_QUOTES, 'UTF-8'); ?>"<?php echo $language->active ? ' aria-current="true"' : ''; ?>><?php echo $label($language); ?></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <?php if ($footerText) : ?><p class="uk-text-meta"><?php echo $footerText; ?></p><?php endif; ?>
</div>

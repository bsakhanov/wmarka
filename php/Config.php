<?php
/**
 * WMARKA — доступ к настройкам стиля шаблона.
 *
 * Единственная точка чтения параметров: партиалы, оверрайды компонентов,
 * модулей и макеты обращаются сюда, а не к $app->getTemplate() напрямую.
 * Метод text() даёт мягкую миграцию с 3.0.x: если поле в настройках пусто,
 * берётся прежняя языковая константа (TPL_WMARKA_SEO_* и т. п.).
 */

declare(strict_types=1);

namespace Wmarka\Template;

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;
use Joomla\Registry\Registry;

final class Config
{
    /** Имя родительского шаблона (каталог в templates/ и media/templates/site/) */
    public const NAME = 'wmarka';

    public const VERSION = '4.0.9';

    public const BUILD = '2026-10-03';

    private static ?Registry $params = null;

    public static function params(): Registry
    {
        if (self::$params === null) {
            $params = null;

            try {
                $params = Factory::getApplication()->getTemplate(true)->params ?? null;
            } catch (\Throwable) {
                $params = null;
            }

            self::$params = $params instanceof Registry ? $params : new Registry((string) ($params ?? ''));
        }

        return self::$params;
    }

    /** Значение параметра; пустая строка считается «не задано» */
    public static function get(string $key, mixed $default = null): mixed
    {
        $value = self::params()->get($key);

        return ($value === null || $value === '') ? $default : $value;
    }

    public static function bool(string $key, bool $default = false): bool
    {
        return (bool) (int) self::get($key, $default ? 1 : 0);
    }

    public static function int(string $key, int $default = 0): int
    {
        return (int) self::get($key, $default);
    }

    public static function str(string $key, string $default = ''): string
    {
        $value = self::get($key, $default);

        return \is_scalar($value) ? trim((string) $value) : $default;
    }

    /**
     * Параметр → устаревшие языковые константы 3.0.x → значение по умолчанию.
     *
     * @param string[] $legacy
     */
    public static function text(string $key, array $legacy = [], string $default = ''): string
    {
        $value = self::str($key);

        if ($value !== '') {
            return $value;
        }

        foreach ($legacy as $const) {
            $translated = Text::_($const);

            if ($translated !== $const && trim($translated) !== '') {
                return trim($translated);
            }
        }

        return $default;
    }

    /** Путь к медиапапке шаблона от корня сайта, без ведущего слеша */
    public static function mediaPath(string $file = ''): string
    {
        return 'media/templates/site/' . self::NAME . ($file !== '' ? '/' . ltrim($file, '/') : '');
    }

    /**
     * Медиафайл с учётом дочернего шаблона: сначала media/templates/site/{дочерний}/…,
     * затем родительский wmarka — тот же порядок, что у Joomla для относительных
     * путей ассетов (HTMLHelper::includeRelativeFiles).
     */
    public static function mediaFile(string $file): string
    {
        $active = (string) Factory::getApplication()->getTemplate();

        if ($active !== '' && $active !== self::NAME) {
            $child = 'media/templates/site/' . $active . '/' . ltrim($file, '/');

            if (is_file(JPATH_ROOT . '/' . $child)) {
                return $child;
            }
        }

        return self::mediaPath($file);
    }

    /** URL медиафайла шаблона (с учётом установки в подкаталог) */
    public static function mediaUrl(string $file = ''): string
    {
        return Uri::root(true) . '/' . self::mediaPath($file);
    }

    public static function sitename(): string
    {
        return (string) Factory::getApplication()->get('sitename');
    }

    /** Название сайта для логотипа и микроразметки */
    public static function siteTitle(): string
    {
        return self::str('site_title') ?: self::sitename();
    }

    /** Брейкпоинт мобильной навигации UIkit: s, m, l */
    public static function bp(): string
    {
        $bp = self::str('mobile_bp', 'm');

        return \in_array($bp, ['s', 'm', 'l', 'xl'], true) ? $bp : 'm';
    }

    /** Класс контейнера по настройке ширины */
    public static function container(): string
    {
        $size = self::str('container', 'default');

        return 'uk-container' . (\in_array($size, ['xsmall', 'small', 'large', 'xlarge', 'expand'], true) ? ' uk-container-' . $size : '');
    }
}

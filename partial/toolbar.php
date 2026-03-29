<?php
/**
 * Верхняя панель (Toolbar)
 * Joomla 6 + UIkit 3
 */
declare(strict_types=1);

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Router\Route;

// 1. Получаем данные из нашего языкового файла
$phoneDisplay = Text::_('TPL_WMARKA_SEO_TEL_DISPLAY');
$phoneClean   = Text::_('TPL_WMARKA_SEO_TEL');
$whatsapp     = Text::_('TPL_WMARKA_SEO_TEL_WHATSAPP');
$waMessage    = Text::_('TPL_WMARKA_SEO_TEL_WHATSAPP_MESSAGE');

// 2. УСЛОВИЕ: Проверяем, существует ли перевод и не пустой ли он
// (Если константа не переведена, Joomla возвращает само имя константы)
$hasPhone    = ($phoneDisplay !== 'TPL_WMARKA_SEO_TEL_DISPLAY' && trim($phoneDisplay) !== '');
$hasWhatsapp = ($whatsapp !== 'TPL_WMARKA_SEO_TEL_WHATSAPP' && trim($whatsapp) !== '');
?>

<?php /* Выводим секцию только если есть хотя бы какая-то контактная информация */ ?>
<?php if ($hasPhone || $hasWhatsapp) : ?>
<div id="section-toolbar" class="uk-section-xsmall uk-background-secondary uk-light uk-visible@m">
    <div class="uk-container">
        <div class="uk-flex uk-flex-between uk-flex-middle">
            
            <?php /* Левая часть тулбара (например, меню или слоган) */ ?>
            <div class="uk-text-meta">
                <jdoc:include type="modules" name="toolbar" style="none" />
            </div>

            <?php /* Правая часть тулбара: Условный вывод телефонов */ ?>
            <div class="uk-flex uk-flex-middle">
                
                <?php /* Обычный телефонный звонок (tel:) */ ?>
                <?php if ($hasPhone) : ?>
                    <a href="tel:<?php echo htmlspecialchars((string) $phoneClean, ENT_QUOTES, 'UTF-8'); ?>" 
                       class="uk-link-reset uk-text-bold uk-flex uk-flex-middle uk-margin-right transition-hover">
                        <span uk-icon="icon: receiver; ratio: 0.8" class="uk-margin-small-right"></span>
                        <?php echo htmlspecialchars((string) $phoneDisplay, ENT_QUOTES, 'UTF-8'); ?>
                    </a>
                <?php endif; ?>

                <?php /* Прямая ссылка на WhatsApp */ ?>
                <?php if ($hasWhatsapp) : ?>
                    <a href="https://wa.me/<?php echo htmlspecialchars((string) $whatsapp, ENT_QUOTES, 'UTF-8'); ?>?text=<?php echo urlencode((string) $waMessage); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="uk-icon-button uk-button-primary uk-preserve-color" 
                       uk-icon="whatsapp"
                       title="<?php echo Text::_('TPL_WMARKA_SEO_WHATSAPP_LABEL'); ?>"
                       uk-tooltip>
                    </a>
                <?php endif; ?>

            </div>
            
        </div>
    </div>
</div>
<?php endif; ?>
<?php
/**
 * WMARKA — com_blank («Пустая страница», Alek Volsk, Sergey Tolkachyov).
 *
 * Компонент ничего не выводит: страница собирается из модулей позиций.
 * Оверрайд добавляет то, чего у компонента нет, — вкладка «Опции WMARKA»
 * пункта меню (html/com_blank/blank/default.xml):
 *   - вводный абзац (uk-text-lead), обложка и текст страницы (редактор);
 *   - ширина колонки текста и выравнивание.
 * Заголовок — штатный «Показывать заголовок страницы» вкладки «Отображение страницы».
 * Заголовок окна и описание выставляет сам компонент по своим настройкам
 * (источник заголовка и описания), шаблон их не перебивает.
 *
 * Если всё пусто и заголовок выключен — вывод пустой, и шаблон не рисует
 * под компонент пустую секцию (partial/main.php). Для главной из модулей
 * удобнее токен wm-blank в «CSS-классе страницы».
 *
 * @var \Joomla\Component\Blank\Site\View\Blank\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Wmarka\Template\Image;
use Wmarka\Template\Seo;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$app     = Factory::getApplication();
$params  = $app->getMenu()->getActive()?->getParams() ?? new \Joomla\Registry\Registry();
$heading = (int) $params->get('show_page_heading', 0) === 1;
$title   = (string) ($params->get('page_heading') ?: ($app->getMenu()->getActive()->title ?? ''));
$lead    = trim((string) $params->get('wm_blank_lead', ''));
$text    = trim((string) $params->get('wm_blank_text', ''));
$image   = Image::clean((string) $params->get('wm_blank_image', ''));
$width   = (string) $params->get('wm_blank_width', 'small');
$center  = (int) $params->get('wm_blank_center', 0) === 1;

if (!$heading && $lead === '' && $text === '' && $image === '') {
    return;
}

$cover = $image !== '' ? Image::thumb($image, 'full', false) : [];

if ($image !== '') {
    Seo::page(['image' => $image]);
}

$width = \in_array($width, ['xsmall', 'small', 'medium', 'large', 'xlarge', '1-1'], true) ? $width : 'small';
?>
<article class="wm-blank<?php echo $center ? ' uk-text-center' : ''; ?>">
    <div class="<?php echo $width === '1-1' ? '' : 'uk-width-' . $width . '@m'; ?><?php echo $center ? ' uk-margin-auto' : ''; ?>">
        <?php if ($heading) : ?>
            <h1 class="uk-article-title"><?php echo Ui::title($title); ?></h1>
        <?php endif; ?>

        <?php if ($lead !== '') : ?>
            <p class="uk-text-lead"><?php echo nl2br(Ui::esc($lead)); ?></p>
        <?php endif; ?>
    </div>

    <?php if ($cover) : ?>
        <figure class="uk-margin-medium">
            <?php echo Image::img($cover, $title, ['class' => 'uk-width-1-1', 'loading' => 'eager', 'fetchpriority' => 'high', 'sizes' => '(min-width: 1200px) 1200px, 100vw']); ?>
        </figure>
    <?php endif; ?>

    <?php if ($text !== '') : ?>
        <div class="<?php echo $width === '1-1' ? '' : 'uk-width-' . $width . '@m'; ?><?php echo $center ? ' uk-margin-auto' : ''; ?>" data-wm-content>
            <?php echo \Wmarka\Template\Ui::tables(HTMLHelper::_('content.prepare', $text, '', 'com_blank.blank')); ?>
        </div>
    <?php endif; ?>
</article>

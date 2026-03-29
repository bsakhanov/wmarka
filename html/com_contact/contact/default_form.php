<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 * @author      Partially modified for Joomla 5 and UIkit 3
 * @version     1.3 (2025-04-22) // Обновлена версия - применен обход для renderInput
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Factory;

/** @var \Joomla\Component\Contact\Site\View\Contact\HtmlView $this */
/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
$wa = $this->getDocument()->getWebAssetManager();
$wa->useScript('keepalive')
   ->useScript('form.validate');

?>
<div class="com-contact__form contact-form">
    <form id="contact-form" action="<?php echo Route::_('index.php'); ?>" method="post" class="uk-form-horizontal uk-margin-medium-top form-validate" enctype="multipart/form-data">

        <?php foreach ($this->form->getFieldsets() as $fieldset) : ?>
            <?php if ($fieldset->name === 'captcha' && $this->captchaEnabled) : ?>
                <?php continue; ?>
            <?php endif; ?>

            <?php $fields = $this->form->getFieldset($fieldset->name); ?>
            <?php if (count($fields)) : ?>
                <fieldset class="uk-fieldset uk-margin-medium">

                    <?php if (isset($fieldset->label) && ($legend = trim(Text::_($fieldset->label))) !== '') : ?>
                        <legend class="uk-legend uk-margin-medium-bottom"><?php echo $this->escape($legend); ?></legend>
                    <?php endif; ?>

                    <?php // Перебираем поля в филдсете ?>
                    <?php foreach ($fields as $field) : ?>
                        <?php
                        // 1. Пропускаем скрытые поля
                        if ($field->hidden) {
                            echo $field->input;
                            continue;
                        }

                        // 2. Получаем тип поля для специальной обработки
                        $fieldType = $field->type;

                        // 3. Обработка Spacer и других не-вводимых полей
                        if ($fieldType === 'Spacer' || $fieldType === 'Rules' || $fieldType === 'Note') {
                            echo '<div class="uk-margin">' . $field->input . '</div>';
                            continue; // Переходим к следующему полю
                        }
                        ?>

                        <?php // 4. Стандартная обработка для большинства полей ?>
                        <div class="uk-margin"> <?php // Обертка для каждого поля ?>
                            <?php
                            // --- Вывод метки и поля ---

                            // === Используем ручной рендеринг метки (<label>) ===
                            if ($field->showLabel && $field->label) : // Проверяем, нужно ли показывать метку
                                $labelText = Text::_($field->label); // Переводим текст метки
                                $labelClass = 'uk-form-label';     // Базовый класс UIkit
                                if ($field->required) {
                                    $labelClass .= ' required';    // Добавляем класс required
                                }
                            ?>
                                <label id="<?php echo $field->id; ?>-lbl" for="<?php echo $field->id; ?>" class="<?php echo $labelClass; ?>">
                                    <?php echo $labelText; ?>
                                    <?php // Опциональный видимый маркер '*'
                                       // if ($field->required) { echo '<span class="star uk-text-danger"> *</span>'; }
                                    ?>
                                </label>
                            <?php endif; // Конец ручного рендеринга метки ?>
                            <?php // === Конец ручного рендеринга метки === ?>


                            <div class="uk-form-controls <?php echo ($fieldType === 'Radio' || $fieldType === 'Checkbox') ? 'uk-form-controls-text' : ''; ?>">
                                <?php
                                // === ИСПОЛЬЗУЕМ $field->input НАПРЯМУЮ ===
                                // Так как $field->renderInput() вызывает ошибку, используем
                                // предварительно отрендеренный HTML поля.
                                // Примечание: Классы UIkit (uk-input, uk-textarea и т.д.) НЕ будут
                                // автоматически добавлены к полю этим методом. Поле будет иметь
                                // стили по умолчанию из стандартных макетов Joomla (вероятно, Bootstrap).
                                // Для полной стилизации UIkit полей рекомендуется исправить
                                // причину ошибки или переопределить макеты joomla.form.*
                                ?>
                                <?php echo $field->input; ?>
                                <?php // === Конец использования $field->input === ?>


                                <?php // Выводим описание поля, если оно есть ?>
                                <?php if ($field->description) : ?>
                                    <div class="uk-text-meta uk-margin-small-top"><?php echo Text::_($field->description); ?></div>
                                <?php endif; ?>
                            </div>
                        </div> <?php // Конец обертки поля uk-margin ?>
                    <?php endforeach; // Конец перебора полей ?>

                </fieldset> <?php // Конец fieldset ?>
            <?php endif; // Конец проверки count($fields) ?>
        <?php endforeach; // Конец перебора fieldsets ?>

        <?php // --- Вывод капчи (если включена) --- ?>
        <?php if ($this->captchaEnabled) : ?>
            <div class="uk-margin">
                 <?php echo $this->form->renderFieldset('captcha'); ?>
            </div>
        <?php endif; ?>

        <?php // --- Кнопка отправки и скрытые поля --- ?>
        <div class="uk-margin uk-text-right">
             <button class="uk-button uk-button-primary validate" type="submit">
                 <span uk-icon="icon: mail" class="uk-margin-small-right"></span>
                 <?php echo Text::_('COM_CONTACT_CONTACT_SEND'); ?>
             </button>
             <?php // Скрытые поля ?>
             <input type="hidden" name="option" value="com_contact">
             <input type="hidden" name="task" value="contact.submit">
             <input type="hidden" name="return" value="<?php echo $this->return_page; ?>">
             <input type="hidden" name="id" value="<?php echo $this->item->slug; ?>">
             <?php echo HTMLHelper::_('form.token'); // CSRF токен ?>
        </div>

    </form>
</div>
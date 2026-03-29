<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 * @author      Partially modified for Joomla 5 and UIkit 3
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\String\PunycodeHelper;
use Joomla\CMS\HTML\HTMLHelper; // Добавим для email cloak

/** @var \Joomla\Component\Contact\Site\View\Contact\HtmlView $this */

?>
<?php // Используем горизонтальный список описаний UIkit ?>
<dl class="uk-description-list uk-description-list-horizontal">

    <?php // --- Блок Адреса --- ?>
    <?php if (($this->params->get('address_check') > 0) &&
              ($this->item->address || $this->item->suburb || $this->item->state || $this->item->country || $this->item->postcode)) : ?>
        <dt>
            <?php // Иконка UIkit для адреса ?>
            <span uk-icon="icon: location" class="uk-margin-small-right" aria-hidden="true"></span>
            <?php echo Text::_('COM_CONTACT_ADDRESS'); ?>:
        </dt>
        <?php // Оборачиваем весь адрес в dd с микроразметкой PostalAddress ?>
        <dd itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
            <?php if ($this->item->address && $this->params->get('show_street_address')) : ?>
                <div class="contact-street" itemprop="streetAddress"> <?php // Используем div вместо span для nl2br ?>
                    <?php echo nl2br($this->escape($this->item->address)); ?>
                </div>
            <?php endif; ?>
            <?php // Собираем остальные части адреса в одну строку для компактности ?>
            <?php
            $address_parts = [];
            if ($this->item->suburb && $this->params->get('show_suburb')) {
                $address_parts[] = '<span itemprop="addressLocality">' . $this->escape($this->item->suburb) . '</span>';
            }
            if ($this->item->state && $this->params->get('show_state')) {
                $address_parts[] = '<span itemprop="addressRegion">' . $this->escape($this->item->state) . '</span>';
            }
            if ($this->item->postcode && $this->params->get('show_postcode')) {
                $address_parts[] = '<span itemprop="postalCode">' . $this->escape($this->item->postcode) . '</span>';
            }
            if ($this->item->country && $this->params->get('show_country')) {
                $address_parts[] = '<span itemprop="addressCountry">' . $this->escape($this->item->country) . '</span>';
            }
            ?>
            <?php if (!empty($address_parts)) : ?>
                 <div class="contact-city-state-zip-country uk-margin-small-top">
                     <?php echo implode(', ', $address_parts); ?>
                 </div>
            <?php endif; ?>
        </dd>
    <?php endif; ?>

    <?php // --- Блок Email --- ?>
    <?php if ($this->item->email_to && $this->params->get('show_email')) : ?>
        <dt>
            <?php // Иконка UIkit для Email ?>
            <span uk-icon="icon: mail" class="uk-margin-small-right" aria-hidden="true"></span>
            <?php echo Text::_('COM_CONTACT_EMAIL_LABEL'); ?>:
        </dt>
        <dd>
            <span class="contact-emailto" itemprop="email"> <?php // itemprop на сам email ?>
                <?php // Используем email cloak для защиты от спама ?>
                <?php echo HTMLHelper::_('email.cloak', $this->escape($this->item->email_to)); ?>
            </span>
        </dd>
    <?php endif; ?>

    <?php // --- Блок Телефон --- ?>
    <?php if ($this->item->telephone && $this->params->get('show_telephone')) : ?>
        <dt>
             <?php // Иконка UIkit для Телефона ?>
            <span uk-icon="icon: receiver" class="uk-margin-small-right" aria-hidden="true"></span>
            <?php echo Text::_('COM_CONTACT_TELEPHONE'); ?>:
        </dt>
        <dd>
            <span class="contact-telephone" itemprop="telephone"> <?php // itemprop для телефона ?>
                <?php // Создаем ссылку tel: (удаляем все кроме цифр и + для href) ?>
                <a href="tel:<?php echo $this->escape(preg_replace('/[^0-9+]/', '', $this->item->telephone)); ?>">
                    <?php echo $this->escape($this->item->telephone); ?>
                </a>
            </span>
        </dd>
    <?php endif; ?>

    <?php // --- Блок Мобильный --- ?>
    <?php if ($this->item->mobile && $this->params->get('show_mobile')) : ?>
        <dt>
            <?php // Иконка UIkit для Мобильного ?>
            <span uk-icon="icon: phone" class="uk-margin-small-right" aria-hidden="true"></span>
            <?php echo Text::_('COM_CONTACT_MOBILE'); ?>:
        </dt>
        <dd>
            <span class="contact-mobile" itemprop="telephone"> <?php // Schema.org использует 'telephone' для всех видов ?>
                <?php // Создаем ссылку tel: ?>
                <a href="tel:<?php echo $this->escape(preg_replace('/[^0-9+]/', '', $this->item->mobile)); ?>">
                    <?php echo $this->escape($this->item->mobile); ?>
                </a>
            </span>
        </dd>
    <?php endif; ?>

    <?php // --- Блок Факс --- ?>
    <?php if ($this->item->fax && $this->params->get('show_fax')) : ?>
        <dt>
            <?php // Иконка UIkit для Факса ?>
            <span uk-icon="icon: print" class="uk-margin-small-right" aria-hidden="true"></span>
            <?php echo Text::_('COM_CONTACT_FAX'); ?>:
        </dt>
        <dd>
            <span class="contact-fax" itemprop="faxNumber"> <?php // itemprop для факса ?>
                <?php echo $this->escape($this->item->fax); ?>
            </span>
        </dd>
    <?php endif; ?>

    <?php // --- Блок Веб-сайт --- ?>
    <?php if ($this->item->webpage && $this->params->get('show_webpage')) : ?>
        <dt>
            <?php // Иконка UIkit для Веб-сайта ?>
            <span uk-icon="icon: world" class="uk-margin-small-right" aria-hidden="true"></span>
            <?php echo Text::_('COM_CONTACT_WEBPAGE'); ?>:
        </dt>
        <dd>
            <span class="contact-webpage" itemprop="url"> <?php // itemprop url или sameAs ?>
                <?php
                    // Убедимся, что URL имеет протокол
                    $webpageUrl = trim($this->item->webpage);
                    if ($webpageUrl && strpos($webpageUrl, 'http') !== 0) {
                        $webpageUrl = 'http://' . $webpageUrl;
                    }
                ?>
                <?php if (filter_var($webpageUrl, FILTER_VALIDATE_URL)): // Проверяем валидность URL ?>
                    <a href="<?php echo $this->escape($webpageUrl); ?>" target="_blank" rel="noopener noreferrer nofollow"> <?php // Добавим nofollow ?>
                        <?php // Отображаем URL в читаемом виде (Punycode для IDN) ?>
                        <?php echo $this->escape(PunycodeHelper::urlToUTF8($this->item->webpage)); ?>
                    </a>
                <?php else: // Если URL невалидный, просто показываем текст ?>
                    <?php echo $this->escape($this->item->webpage); ?>
                <?php endif; ?>
            </span>
        </dd>
    <?php endif; ?>
</dl>
<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * @version     WMARKA UIKIT EDITION (Associations)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

$items = $displayData;

if (!empty($items)) : ?>
    <div class="uk-margin-small-top uk-margin-small-bottom">
        <ul class="uk-subnav uk-subnav-divider uk-flex-middle item-associations" role="list" aria-label="<?php echo Text::_('JGLOBAL_ASSOCIATIONS'); ?>">
            <?php /* Заголовок блока (опционально) */ ?>
            <li class="uk-nav-header uk-text-meta uk-text-uppercase">
                <span uk-icon="icon: world; ratio: 0.8"></span>
            </li>

            <?php foreach ($items as $id => $item) : ?>
                <?php 
                // Определяем ссылку и текст
                $link = '';
                if (is_array($item) && isset($item['link'])) {
                    $link = $item['link'];
                } elseif (isset($item->link)) {
                    $link = $item->link;
                }
                
                if ($link) : ?>
                    <li class="uk-text-meta">
                        <?php 
                            // В Joomla 6 ссылки ассоциаций обычно приходят уже в виде готового HTML-тега <a>
                            // Мы просто выводим их, UIkit сам применит стили к вложенным ссылкам
                            echo $link; 
                        ?>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

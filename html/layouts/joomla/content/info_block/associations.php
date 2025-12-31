<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * @version     WMARKA UIKIT (Associations Sublayout)
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

/**
 * $displayData['item'] - объект материала
 */
if (empty($displayData['item']->associations)) {
    return;
}

$associations = $displayData['item']->associations;
$params = $displayData['item']->params;
?>

<div class="article-associations uk-flex uk-flex-middle">
    <?php /* Используем иконку world из UIkit вместо icon-globe */ ?>
    <span uk-icon="icon: world; ratio: 0.8" class="uk-margin-xsmall-right"></span>
    
    <span class="uk-visible@m uk-margin-small-right"><?php echo Text::_('JASSOCIATIONS'); ?>:</span>

    <?php foreach ($associations as $association) : ?>
        <?php /* Логика вывода флагов */ ?>
        <?php if ($params->get('flags', 1) && $association['language']->image) : ?>
            <?php 
                $flag = HTMLHelper::_('image', 
                    'mod_languages/' . $association['language']->image . '.gif', 
                    $association['language']->title_native, 
                    ['title' => $association['language']->title_native, 'class' => 'uk-border-rounded uk-margin-xsmall-right'], 
                    true
                ); 
            ?>
            <a href="<?php echo Route::_($association['item']); ?>" class="uk-link-reset"><?php echo $flag; ?></a>
        
        <?php else : ?>
            <?php /* Логика вывода текстовых кодов языков */ ?>
            <a class="uk-text-uppercase uk-text-bold uk-margin-small-right uk-link-muted" 
               title="<?php echo $association['language']->title_native; ?>" 
               href="<?php echo Route::_($association['item']); ?>">
                <?php echo $association['language']->lang_code; ?>
                <span class="uk-hidden"><?php echo $association['language']->title_native; ?></span>
            </a>
        <?php endif; ?>
    <?php endforeach; ?>
</div>

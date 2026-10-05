<?php
/**
 * WMARKA — выход: приветствие и кнопка.
 *
 * @var \Joomla\Component\Users\Site\View\Login\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
?>
<div class="uk-flex uk-flex-center">
    <div class="uk-card uk-card-default uk-card-body uk-width-large@s uk-width-1-1 uk-text-center">
        <?php if ($this->params->get('show_page_heading')) : ?>
            <h1 class="uk-h2"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
        <?php endif; ?>
        <?php if ($this->params->get('logoutdescription_show') == 1 && trim((string) $this->params->get('logout_description', ''))) : ?>
            <div class="uk-text-meta uk-margin"><?php echo $this->params->get('logout_description'); ?></div>
        <?php endif; ?>
        <?php if ($this->params->get('logout_image') != '') : ?>
            <?php echo HTMLHelper::_('image', $this->params->get('logout_image'), $this->params->get('logout_image_alt_empty') ? '' : (string) $this->params->get('logout_image_alt'), ['class' => 'uk-margin uk-width-1-1']); ?>
        <?php endif; ?>
        <p><?php echo Text::sprintf('TPL_WMARKA_LOGGED_IN_AS', $this->escape($this->user->name)); ?></p>
        <form action="<?php echo Route::_('index.php?task=user.logout'); ?>" method="post" id="com-users-logout__form">
            <button type="submit" class="uk-button uk-button-default"><?php echo Text::_('JLOGOUT'); ?></button>
            <?php if ($this->params->get('logout_redirect_url')) : ?>
                <input type="hidden" name="return" value="<?php echo base64_encode($this->params->get('logout_redirect_url', $this->form->getValue('return', null, ''))); ?>">
            <?php else : ?>
                <input type="hidden" name="return" value="<?php echo base64_encode($this->params->get('logout_redirect_menuitem', $this->form->getValue('return', null, ''))); ?>">
            <?php endif; ?>
            <?php echo HTMLHelper::_('form.token'); ?>
        </form>
    </div>
</div>

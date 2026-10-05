<?php
/**
 * WMARKA — фронтенд-редактирование материала.
 * Вкладки — штатный веб-компонент Joomla (uitab), поля — макет renderfield
 * в разметке UIkit, кнопки — uk-button. Задачи формы прежние (data-submit-task).
 *
 * @var \Joomla\Component\Content\Site\View\Form\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;

$this->getDocument()->getWebAssetManager()->useScript('keepalive')->useScript('form.validate')->useScript('com_content.form-edit');

$this->tab_name         = 'com-content-form';
$this->ignore_fieldsets = ['image-intro', 'image-full', 'jmetadata', 'item_associations'];
$this->useCoreUI        = true;

$params = $this->state->get('params');

if (!$params->exists('show_publishing_options')) {
    $params->set('show_urls_images_frontend', '0');
}
?>
<div class="edit item-page">
    <?php if ($params->get('show_page_heading')) : ?>
        <h1 class="uk-heading-small"><?php echo $this->escape($params->get('page_heading')); ?></h1>
    <?php endif; ?>

    <form action="<?php echo Route::_('index.php'); ?>" method="post" name="adminForm" id="adminForm" class="form-validate uk-form-stacked">
        <fieldset class="uk-fieldset">
            <?php echo HTMLHelper::_('uitab.startTabSet', $this->tab_name, ['active' => 'editor', 'recall' => true, 'breakpoint' => 768]); ?>

            <?php echo HTMLHelper::_('uitab.addTab', $this->tab_name, 'editor', Text::_('COM_CONTENT_ARTICLE_CONTENT')); ?>
                <?php echo $this->form->renderField('title'); ?>
                <?php echo $this->form->renderField('alias'); ?>
                <?php echo $this->form->renderField('articletext'); ?>
                <?php if ($this->captchaEnabled) : ?>
                    <?php echo $this->form->renderField('captcha'); ?>
                <?php endif; ?>
            <?php echo HTMLHelper::_('uitab.endTab'); ?>

            <?php if ($params->get('show_urls_images_frontend')) : ?>
                <?php echo HTMLHelper::_('uitab.addTab', $this->tab_name, 'images', Text::_('COM_CONTENT_IMAGES_AND_URLS')); ?>
                    <div class="uk-grid-large uk-child-width-1-2@m" uk-grid>
                        <div>
                            <?php foreach (['image_intro', 'image_intro_alt', 'image_intro_alt_empty', 'image_intro_caption', 'float_intro'] as $field) : ?>
                                <?php echo $this->form->renderField($field, 'images'); ?>
                            <?php endforeach; ?>
                        </div>
                        <div>
                            <?php foreach (['image_fulltext', 'image_fulltext_alt', 'image_fulltext_alt_empty', 'image_fulltext_caption', 'float_fulltext'] as $field) : ?>
                                <?php echo $this->form->renderField($field, 'images'); ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <p class="uk-text-meta"><?php echo Text::_('TPL_WMARKA_EDIT_IMAGE_HINT'); ?></p>
                    <hr>
                    <?php foreach (['a', 'b', 'c'] as $l) : ?>
                        <?php echo $this->form->renderField('url' . $l, 'urls'); ?>
                        <?php echo $this->form->renderField('url' . $l . 'text', 'urls'); ?>
                        <div class="uk-margin"><div class="uk-form-controls"><?php echo $this->form->getInput('target' . $l, 'urls'); ?></div></div>
                    <?php endforeach; ?>
                <?php echo HTMLHelper::_('uitab.endTab'); ?>
            <?php endif; ?>

            <?php echo LayoutHelper::render('joomla.edit.params', $this); ?>

            <?php echo HTMLHelper::_('uitab.addTab', $this->tab_name, 'options', Text::_('JOPTIONS')); ?>
                <?php echo $this->form->renderField('transition'); ?>
                <?php echo $this->form->renderField('state'); ?>
                <?php echo $this->form->renderField('catid'); ?>
                <?php if ($this->item->params->get('access-change')) : ?>
                    <?php echo $this->form->renderField('featured'); ?>
                <?php endif; ?>
                <?php echo $this->form->renderField('access'); ?>
                <?php echo $this->form->renderField('language'); ?>
                <?php echo $this->form->renderField('tags'); ?>
                <?php echo $this->form->renderField('note'); ?>
                <?php if ($params->get('save_history', 0)) : ?>
                    <?php echo $this->form->renderField('version_note'); ?>
                <?php endif; ?>
            <?php echo HTMLHelper::_('uitab.endTab'); ?>

            <?php if ($params->get('show_publishing_options', 1) == 1) : ?>
                <?php echo HTMLHelper::_('uitab.addTab', $this->tab_name, 'publishing', Text::_('COM_CONTENT_PUBLISHING')); ?>
                    <?php if ($this->item->params->get('access-change')) : ?>
                        <?php foreach (['publish_up', 'publish_down', 'featured_up', 'featured_down'] as $field) : ?>
                            <?php echo $this->form->renderField($field); ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php echo $this->form->renderField('created_by_alias'); ?>
                    <fieldset class="uk-fieldset uk-margin-medium-top">
                        <legend class="uk-legend uk-h4"><?php echo Text::_('COM_CONTENT_METADATA'); ?></legend>
                        <?php echo $this->form->renderField('metadesc'); ?>
                        <?php echo $this->form->renderField('metakey'); ?>
                    </fieldset>
                <?php echo HTMLHelper::_('uitab.endTab'); ?>
            <?php endif; ?>

            <?php echo HTMLHelper::_('uitab.endTabSet'); ?>
            <?php echo $this->form->renderControlFields(); ?>
        </fieldset>

        <div class="uk-margin-medium-top">
            <button type="button" class="uk-button uk-button-primary" data-submit-task="article.apply"><?php echo Text::_('JSAVE'); ?></button>
            <button type="button" class="uk-button uk-button-primary" data-submit-task="article.save"><?php echo Text::_('JSAVEANDCLOSE'); ?></button>
            <?php if ($this->showSaveAsCopy) : ?>
                <button type="button" class="uk-button uk-button-default" data-submit-task="article.save2copy"><?php echo Text::_('JSAVEASCOPY'); ?></button>
            <?php endif; ?>
            <button type="button" class="uk-button uk-button-danger" data-submit-task="article.cancel"><?php echo Text::_('JCANCEL'); ?></button>
            <?php if ($params->get('save_history', 0) && $this->item->id && ComponentHelper::isEnabled('com_contenthistory')) : ?>
                <?php echo $this->form->getInput('contenthistory'); ?>
            <?php endif; ?>
        </div>
    </form>
</div>

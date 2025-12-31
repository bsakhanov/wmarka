<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;

$canEdit = $displayData['params']->get('access-edit');
?>
<?php if ($canEdit) : ?>
    <div class="uk-align-right uk-margin-remove-bottom edit-icon">
        <div class="uk-button-group">
            <?php /* Joomla сама отрендерит иконку правки, мы просто даем ей контекст */ ?>
            <?php echo HTMLHelper::_('icon.edit', $displayData['item'], $displayData['params']); ?>
        </div>
    </div>
<?php endif; ?>

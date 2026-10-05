<?php
/**
 * WMARKA — поле фронтенд-формы в структуре UIkit (uk-form-stacked).
 *
 * @var array $displayData
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

extract($displayData);

if (!empty($options['showonEnabled'])) {
    Factory::getApplication()->getDocument()->getWebAssetManager()->useScript('showon');
}

$class    = trim(($options['class'] ?? '') . ' ' . ($parentclass ?? ''));
$rel      = empty($options['rel']) ? '' : ' ' . $options['rel'];
$descId   = ($id ?? $name) . '-desc';
$hideDesc = !empty($options['hiddenDescription']);
?>
<div class="uk-margin <?php echo $class; ?>"<?php echo $rel; ?>>
    <?php if (!empty($options['hiddenLabel'])) : ?>
        <div class="uk-hidden-visually"><?php echo $label; ?></div>
    <?php elseif ($label) : ?>
        <?php echo $label; ?>
    <?php endif; ?>
    <div class="uk-form-controls">
        <?php echo Ui::bridge((string) $input); ?>
        <?php if (!$hideDesc && !empty($description)) : ?>
            <div id="<?php echo $descId; ?>" class="uk-text-meta uk-margin-xsmall-top"><?php echo $description; ?></div>
        <?php endif; ?>
    </div>
</div>

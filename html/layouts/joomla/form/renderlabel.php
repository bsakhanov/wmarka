<?php
/**
 * WMARKA — подпись поля формы (uk-form-label, звёздочка обязательности).
 *
 * @var array $displayData
 */

\defined('_JEXEC') or die;

extract($displayData);

$classes   = array_filter((array) $classes);
$classes[] = 'uk-form-label';

if ($required) {
    $classes[] = 'required';
}
?>
<label id="<?php echo $for; ?>-lbl" for="<?php echo $for; ?>" class="<?php echo implode(' ', array_unique($classes)); ?>">
    <?php echo $text; ?><?php if ($required) : ?><span class="uk-text-danger" aria-hidden="true">&#160;*</span><?php endif; ?>
</label>

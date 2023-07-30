<?php defined('_JEXEC') or die;
/*
 * @package     mod_uk_grid
 * @copyright   Copyright (C) 2018 Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

?>

<div class="mod_uk_grid<?php echo $grid_class, $classes; ?> uk-container uk-margin-top uk-flex uk-flex-center " data-uk-grid<?php echo $grid_params, $hm_param; ?> uk-scrollspy="cls: uk-animation-fade; target: > div > .uk-card; delay: 500; repeat: true" uk-height-match="target: > div > .uk-card">
    <?php
    foreach ($items as $item)
    {
        $item_add_class = trim($item->class) ? ' ' . trim($item->class) : '';
        $item_class = $item_class || $item_add_class ? ' class="' . $item_class . $item_add_class . '"' : '';
    ?>
    <div class="">

		<a href="#<?php echo $item->link; ?>" uk-toggle>
		<div class="<?php echo $item->al_img; ?>">
		<img src="<?php echo $item->img; ?>" alt="<?php echo $item->title; ?>">
		</div>
		<?php if ($item->title) { ?>
            <h5 class="<?php echo $item->al_title; ?> uk-h5 uk-text-uppercase uk-text-bold uk-text-primary"><?php echo $item->title; ?>
			</h5>
            <?php } ?>
		</a>

<div id="<?php echo $item->link; ?>" uk-modal>
    <div class="uk-modal-dialog">
		<div class="uk-light">
        <button class="uk-modal-close-default " type="button" uk-close></button>
		</div>
        <div class="uk-modal-header uk-background-primary uk-text-center uk-light">
            <h4 class="uk-modal-title uk-text-lead"><?php echo $item->title; ?></h4>
        </div>
        <div class="uk-modal-body">
            <p><?php echo $item->content; ?></p>
        </div>
        <div class="uk-modal-footer uk-text-right uk-background-body-2 box-shadow-footer">
            <button class="uk-button uk-button-primary uk-border-rounded uk-button-small  uk-modal-close" type="button"><?= JText::_('MOD_PROMO_CLOSE') ?></button>           
        </div>
    </div>
</div>
      
     </div>

    <?php } ?>
</div>

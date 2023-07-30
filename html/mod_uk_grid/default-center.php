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
        <div<?php echo $item_class; ?> class="uk-border-rounded">
		<div class="uk-card uk-width-medium uk-margin-left uk-margin-right uk-card-default uk-box-shadow-small uk-box-shadow-hover-large uk-border-rounded uk-background-secondary-3 uk-scrollspy-inview uk-animation-fade">
		<div class="uk-card-media-top uk-inline-clip uk-transition-toggle uk-border-rounded uk-brightness">
            <?php if ($item->img) { ?>
            <div class="<?php echo $item->al_img; ?> uk-transition-scale-up uk-transition-opaque uk-border-rounded"><img src="<?php echo $item->img; ?>" alt="<?php echo $item->title; ?>"></div>
            <?php } ?>
           </div> 
		   <div class=" uk-card-body uk-padding-small-plus uk-light">
            <?php if ($item->title) { ?>
            <h3 class="<?php echo $item->al_title; ?>  uk-text-small"><?php echo $item->title; ?></h3>
            <?php } ?>
            
            <?php if ($item->content) { ?>
            <div class="<?php echo $item->al_content; ?>   uk-text-small"><?php echo $item->content; ?></div>
            <?php } ?>
            
            <?php if ($item->link) { ?>
            <div class="uk-margin <?php echo trim(' ' . $item->al_content); ?>"><a class="uk-button uk-button-primary uk-border-rounded  uk-text-bold " href="<?php echo $item->link; ?>" target="_blank"><?php echo $item->link_text; ?>  </a></div>
            <?php } ?>
			</div>
			</div>
     </div>
    </div>
    <?php } ?>
</div>

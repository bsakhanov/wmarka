<?php defined('_JEXEC') or die;
/*
 * @package     mod_uk_slider
 * @copyright   Copyright (C) 2018 Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

?>

<div class="mod_uk_slider uk-position-relative<?php echo $slider_class; ?>" data-uk-slider<?php echo $sw_params; ?>>
    <div class="uk-slider-container">
        <ul class="uk-slider-items<?php echo $classes; ?>">
            <?php
            foreach ($items as $item)
            {
                $item_slide_class = trim($item->class) ? ' ' . trim($item->class) : '';
                $item_class = $item_class || $item_slide_class ? ' class="' . $item_class . $item_slide_class . '"' : '';
            ?>
           <a class="uk-button uk-button-link uk-flex uk-flex-center" href="<?php echo $item->link; ?>" target="_blank"> <li class="uk-flex uk-flex-center" >
			
                <div<?php echo $item_class; ?>>
                    <?php if ($item->img) { ?>
                    <img class="uk-border-rounded" src="<?php echo $item->img; ?>" alt="<?php echo $item->title; ?>">
                    <?php } ?>
                    
                    <?php if ($item->title) { ?>
                    <h3 class="uk-text-center uk-text-small text-orta"><?php echo $item->title; ?></h3>
                    <?php } ?>
                    
                    <?php if ($item->content) { ?>
                    <div><?php echo $item->content; ?></div>
                    <?php } ?>
                    
                </div>
            </li></a>
            <?php } ?>
        </ul>
    </div>
    
        <div class="uk-hidden@s uk-light">
            <a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
        </div>

        <div class="uk-visible@s">
            <a class="uk-position-center-left-out uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right-out uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
        </div>
    
</div>

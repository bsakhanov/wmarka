<?php defined('_JEXEC') or die;
/*
 * @package     mod_uk_slider
 * @copyright   Copyright (C) 2018 Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

?>

<div class="uk-container uk-container-small uk-text-center uk-light mod_uk_slider uk-position-relative uk-padding-small uk-width-medium@s uk-width-xxlarge@m <?php echo $slider_class; ?>" data-uk-slider<?php echo $sw_params; ?>>
    <div class="uk-slider-container ">
        <ul class="uk-slider-items<?php echo $classes; ?>  uk-margin-auto  "  data-uk-scrollspy="target: > .animate; cls: uk-animation-slide-bottom-small uk-invisible; delay: 300">
            <?php
            foreach ($items as $item)
            {
                $item_slide_class = trim($item->class) ? ' ' . trim($item->class) : '';
                $item_class = $item_class || $item_slide_class ? ' class="' . $item_class . $item_slide_class . '"' : '';
            ?>
            <li >
                <div<?php echo $item_class; ?>>
                    <?php if ($item->img) { ?>
                    <img class="uk-width-medium" src="<?php echo $item->img; ?>" alt="<?php echo $item->title; ?>">
                    <?php } ?>
                    
                    <?php if ($item->title) { ?>
                    <h2 class="" ><?php echo $item->title; ?></h2>
                    <?php } ?>
                    
                    <?php if ($item->content) { ?>
                    <div class=" "><?php echo $item->content; ?></div>
                    <?php } ?>
                    
                    <?php if ($item->link) { ?>
                    <div class="uk-margin-small-top"><a class="uk-button uk-button-default uk-width-auto uk-text-bold uk-text-center" href="<?php echo $item->link; ?>" ><?php echo $item->link_text; ?></a></div>
                    <?php } ?>
                </div>
            </li>
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

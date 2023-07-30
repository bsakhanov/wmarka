<?php defined('_JEXEC') or die;
/*
 * @package     mod_uk_slider
 * @copyright   Copyright (C) 2018 Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

?>

<div class="mod_uk_slider uk-position-relative<?php echo $slider_class; ?>" data-uk-slider="autoplay:true;autoplay_interval:2000;pause-on-hover:true;center: true">
    <div class="uk-slider-container">
        <ul class="uk-slider-items<?php echo $classes; ?>">
            <?php
            foreach ($items as $item)
            {
                $item_slide_class = trim($item->class) ? ' ' . trim($item->class) : '';
                $item_class = $item_class || $item_slide_class ? ' class="' . $item_class . $item_slide_class . '"' : '';
            ?>
            <li>
                <div class="uk-inline-clip uk-transition-toggle  " tabindex="0">
                    <?php if ($item->img) { ?>
                    <img class="uk-width-medium" src="<?php echo $item->img; ?>" alt="<?php echo $item->title; ?>">
                    <?php } ?>
					<div class="uk-position-bottom">
                    <div class="uk-transition-slide-bottom-small uk-tile uk-overlay uk-overlay-primary  uk-padding-small uk-text-center">
                    <?php if ($item->title) { ?>
                    <div class=" uk-h4  uk-text-bold "><?php echo $item->title; ?></div>
                    <?php } ?>
					
                    
                    <?php if ($item->content) { ?>
                    <div class="uk-margin-small-top uk-text-bold uk-text-small"><?php echo $item->content; ?></div>
                    <?php } ?>
                    
                    <?php if ($item->link) { ?>
                    <div class="uk-margin-small-top"><a class="uk-button uk-button-primary" href="<?php echo $item->link; ?>"><?php echo $item->link_text; ?></a></div>
                    <?php } ?>
					</div>
					</div>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
    
    <?php if ($slidenav) { ?>
    <a class="uk-position-center-left uk-position-small uk-hidden-hover uk-light" href="#" data-uk-slidenav-previous data-uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover uk-light" href="#" data-uk-slidenav-next data-uk-slider-item="next"></a>
    <?php } ?>
    
    <?php if ($dotnav) { ?>
    <div class="uk-flex uk-flex-center uk-margin-small-top">
        <ul class="uk-slider-nav uk-dotnav"></ul>
    </div>
    <?php } ?>
    
</div>

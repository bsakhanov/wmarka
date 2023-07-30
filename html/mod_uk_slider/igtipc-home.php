<?php defined('_JEXEC') or die;
/*
 * @package     mod_uk_slider
 * @copyright   Copyright (C) 2018 Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

?>
<div class=" uk-flex uk-flex-center uk-text-center  uk-position-relative  uk-padding-small uk-margin-left uk-margin-right <?php echo $slider_class; ?>" data-uk-slider<?php echo $sw_params; ?>>
    <div class="uk-slider-container ">
        <ul class="uk-slider-items<?php echo $classes; ?>  uk-margin-auto  "  data-uk-scrollspy="target: > .animate; cls: uk-animation-slide-bottom-small uk-invisible; delay: 300">
            <?php
            foreach ($items as $item)
            {
                $item_slide_class = trim($item->class) ? ' ' . trim($item->class) : '';
                $item_class = $item_class || $item_slide_class ? ' class="' . $item_class . $item_slide_class . '"' : '';
            ?>
            <li >
			<a href="#<?php echo $item->link_text; ?>" uk-toggle>
     <div  class="uk-card uk-card-default uk-card-body uk-portfolio uk-text-primary2 uk-text-center uk-border-rounded" >
        
		    <?php if ($item->icon) { ?>
            <span class=" uk-padding-remove uk-margin-auto uk-text-primary2" uk-icon="icon: <?php echo $item->icon; ?>; ratio: 5"></span>
            <?php } ?>
            <?php if ($item->img) { ?>
            <div class="<?php echo $item->al_img; ?>">
			</div>
            <?php } ?>
            
            <?php if ($item->title) { ?>
            <h3 class="<?php echo $item->al_title; ?> uk-h4 uk-text-uppercase uk-text-bold uk-text-primary2"><?php echo $item->title; ?></h3>
            <?php } ?>
            
            <?php if ($item->content) { ?>
            <div class="<?php echo $item->al_content; ?>  uk-text-primary2 "><?php echo JHtml::_('string.truncate', (strip_tags($item->content, 'com_content.article')), '60'); ?></div>
            <?php } ?>
            
            <?php if ($item->link) { ?>
            <div class="uk-margin <?php echo trim(' ' . $item->al_content); ?>"><div class="uk-button uk-button-primary uk-button-primary2 uk-button-small uk-border-rounded  uk-text-bold " ><?php echo $item->link_text; ?>  </div></div>
            <?php } ?>
    			<div id="<?php echo $item->link_text; ?>" uk-modal>
  			  <div class="uk-modal-dialog uk-width-large">
  			      <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
 			       <div class="uk-grid-collapse uk-child-width-1-1@s uk-flex-middle" uk-grid>

						<div class="uk-padding">
  			              <h2 class="uk-modal-title uk-text-lead uk-text-bold uk-text-primary uk-margin-top" ><?php echo $item->title; ?></h2>
						  <p><?php echo $item->content; ?></p>
					<div class="uk-modal-footer uk-text-right uk-background-body-2 box-shadow-footer">
						<a class="uk-button uk-button-primary uk-border-rounded uk-button-small " href="<?php echo $item->link; ?>" ><?= JText::_('MOD_PROMO_MORE') ?></a>
						<button type="button" class="uk-hidden@s uk-visible@m uk-button uk-button-primary uk-border-rounded uk-button-small  uk-modal-close  "><?= JText::_('MOD_PROMO_CLOSE') ?></button>
					</div>
 			           </div>
			        </div>
			    </div>
			</div>
    </div>
	 </a>
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

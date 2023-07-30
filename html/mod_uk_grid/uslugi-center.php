<?php defined('_JEXEC') or die;
/*
 * @package     mod_uk_grid
 * @copyright   Copyright (C) 2018 Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

?>

<div class="mod_uk_grid<?php echo $grid_class, $classes; ?> uk-container uk-margin-top uk-flex uk-flex-center uk-grid-collapse uk-border-rounded" data-uk-grid<?php echo $grid_params, $hm_param; ?> uk-scrollspy="cls: uk-animation-fade; target: > div > .uk-card; delay: 500; repeat: true" uk-height-match="target: > div > .uk-card">
    <?php
    foreach ($items as $item)
    {
        $item_add_class = trim($item->class) ? ' ' . trim($item->class) : '';
        $item_class = $item_class || $item_add_class ? ' class="' . $item_class . $item_add_class . '"' : '';
    ?>
	<div>
	<a href="#<?php echo $item->link_text; ?>" uk-toggle>
    <div class="<?php echo $item_add_class; ?> uk-card uk-card-default uk-card-body uk-portfolio uk-light uk-text-center" >
        
		    <?php if ($item->icon) { ?>
            <span class="uk-light uk-padding-remove uk-margin-auto" uk-icon="icon: <?php echo $item->icon; ?>; ratio: 5"></span>
            <?php } ?>
            <?php if ($item->img) { ?>
            <div class="<?php echo $item->al_img; ?>">
			</div>
            <?php } ?>
            
            <?php if ($item->title) { ?>
            <h3 class="<?php echo $item->al_title; ?> uk-h4 uk-text-uppercase uk-text-bold uk-text-primary"><?php echo $item->title; ?></h3>
            <?php } ?>
            
            <?php if ($item->content) { ?>
            <div class="<?php echo $item->al_content; ?>   "><?php echo JHtml::_('string.truncate', (strip_tags($item->content, 'com_content.article')), '60'); ?></div>
            <?php } ?>
            
            <?php if ($item->link) { ?>
            <div class="uk-margin <?php echo trim(' ' . $item->al_content); ?>"><a class="uk-button uk-button-primary uk-button-large uk-border-rounded  uk-text-bold " href="#<?php echo $item->link_text; ?>" uk-toggle><?php echo $item->link_text; ?>  </a></div>
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
	</div>
    <?php } ?>
</div>

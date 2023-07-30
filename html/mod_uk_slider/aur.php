<?php defined('_JEXEC') or die;
/*
 * @package     mod_uk_slider
 * @copyright   Copyright (C) 2018 Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

?>

<div class="" itemscope="itemscope" itemtype="http://schema.org/OfferCatalog">
    <div class="uk-container uk-container-center uk-container-small uk-padding-remove">

<div uk-slider="autoplay: true; autoplay-interval: 5000;">

    <div class="uk-position-relative ">

        <div class="uk-slider-container ">
        <ul class="uk-flex uk-flex-center uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-6@m uk-child-width-1-8@l uk-grid-small">
            <?php
            foreach ($items as $item)
            {
                $item_slide_class = trim($item->class) ? ' ' . trim($item->class) : '';
                $item_class = $item_class || $item_slide_class ? ' class="' . $item_class . $item_slide_class . '"' : '';
            ?>
	
			<li class=" " itemscope itemtype="https://schema.org/ImageObject">
	
<?php echo JLoader::register('JUImage',  JPATH_LIBRARIES . '/juimage/JUImage.php');
                    $juImg = new JUImage();	
					$thumb = $juImg->render($item->img, [
	'w'     	=> '177',
	'h'     	=> '177',
	'q'         => '75',
	'zc'        => 'C',
	'far'        => 'C',	
	'webp'      => true,
	'webp_q'    => '70',
	'webp_maxq' => '75',
	'cache'     => 'img'
	
]);	?>
			
 	<a href="<?php echo $item->link; ?>" target="_blank">
	<figure class="uk-inline-clip uk-transition-toggle uk-border-rounded box-shadow-kvadro"  itemprop="image">
	
          <picture> 
          <source srcset="<?php echo $thumb->webp; ?>" type="image/webp" width="400" height="400">	
          <img src="<?php echo $thumb->img; ?>" alt="<?php echo $item->title; ?>" width="400" height="400" class="uk-transition-scale-up uk-transition-opaque uk-border-rounded" itemprop="url" itemprop="contentUrl" />   
		  </picture>
	
                 <figcaption itemprop="name"><div  class="uk-position-center uk-panel">
                <h4 class="uk-overlay uk-overlay-padding uk-overlay-primary uk-transition-slide-bottom-small uk-banners uk-text-center uk-text-small"><?php echo $item->title; ?></h4></div></figcaption>
				</figure>
            </a>
            </li>
            <?php } ?>
        </ul>
    </div>
    
        <div class="uk-hidden@s uk-light">
            <a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
        </div>

        <div class="uk-visible@s uk-text-bold">
            <a class="uk-position-center-left-out uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right-out uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
        </div>

    </div>

    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin "></ul>

</div>			
			
			           
	</div>
</div></div>

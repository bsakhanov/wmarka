<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fields.Repeatable
 *
 * @copyright   Copyright (C) Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$tmpFields = $field->fieldparams->get('fields');
$aFields = [];
foreach ($tmpFields as $tmpField) {
    $aFields[$tmpField->fieldname] = $tmpField->fieldtype;
}

$fieldValue = $field->value;

if ($fieldValue === '') {
    return;
}

// Get the values
$fieldValues = json_decode($fieldValue, true);
if (empty($fieldValues)) {
    return;
}
JLoader::register('JUImage',  JPATH_LIBRARIES . '/juimage/JUImage.php');
$juImg = new JUImage();	
$regexImageSrc = '/#joomlaImage?([^\'" >]+)/';
?>
<div class=" uk-flex uk-flex-center uk-visible-toggle" tabindex="-1" uk-slider>  
 <div class="uk-width-xlarge uk-inline">

        <div class="uk-slider-container uk-margin-right uk-margin-remove-right@s">
 
    <ul class="uk-slider-items uk-child-width-1-1 "  uk-lightbox="animation: slide" >
 
	<?php foreach ($fieldValues as $value) : ?>
<?php
    foreach ($value as $vKey => $vValue) {
        if ($vValue === '') {
            unset($value[$vKey]);
        }
        if ($aFields[$vKey] === 'media' & $vValue !== '') {
			
            $value[$vKey] = '<img src="/' . $vValue . '"/>';
        }
    }
$stripped = strip_tags (implode('',$value));
	?>

	    <?php
            
$thumb3 = $juImg->render(preg_replace($regexImageSrc, '', $vValue), [
	'w'     	=> '900',
	'h'     	=> '600', 
	'q'         => '65',
	'zc'        => 'C',
	'far'        => 'C',	
	'webp'      => true,
	'webp_q'    => '60',
	'webp_maxq' => '65',
	'cache'     => 'img' 

	
]); 
$thumb2 = $juImg->render(preg_replace($regexImageSrc, '', $vValue), [
	'w'     	=> '1800',
	'h'     	=> '1200', 	
	'q'         => '100',
	'zc'        => 'C',
	'far'        => 'C',	
	'webp'      => true,
	'webp_q'    => '100',
	'webp_maxq' => '100',
	'cache'     => 'img' 

	
]); 		 
  ?>	  

		<li class="uk-flex  ">
        <div itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" class=" ">
	
            <div class="uk-transition-toggle uk-inline-clip">
                <figure class=" uk-margin-remove" >
 
                                        <img src="<?php echo $thumb3->webp; ?>" type="image/webp" width="900" height="600" class="" alt="<?= $stripped ? :$item->title;?>" itemprop="thumbnailUrl"/>
  
					<meta itemprop="url" content="<?php echo JUri::root(); ?><?php echo $thumb3->webp; ?>">
					<meta itemprop="width" content="900" /><meta itemprop="height" content="600" />
				</figure>	
                <div class="uk-position-cover uk-overlay uk-overlay-primary uk-transition-fade uk-light"><div class="uk-position-small uk-position-top-right  uk-light  "><span uk-icon="icon: enlarge"></span></div><div class="uk-position-small uk-position-bottom-left  uk-overlay-primary-news uk-light overla uk-border-rounded2"><figcaption class="uk-slidenav uk-text-meta"><?= $stripped ? :$item->title;?></figcaption></div></div>
                <a class="uk-position-cover" href="<?php echo $thumb2->webp; ?>" type="image/webp" width="'. $size->width .'" height="'. $size->height .'" data-caption="<?= $stripped ? :$item->title;?>"></a>
				 
				 
            </div>
        </div>	
		 
        </li>		
		
	<?php  endforeach;  ?>
</ul>
    </div>

 

			           
	</div>
	
	<div class="uk-slidenav-container uk-width-small@m uk-overlay-primary-news uk-light overla  uk-flex uk-flex-center uk-flex-middle">
			<a class="uk-icon-link uk-margin-small-left" uk-icon="artqa" href="#" uk-slider-item="previous"></a>
			<a class="uk-icon-link" uk-icon="alga" href="#" uk-slider-item="next"></a>
			 
        		
        	 
		</div>
	 

</div>


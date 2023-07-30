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

<!-- jQuery 1.8 or later, 33 KB -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Fotorama from CDNJS, 19 KB -->
<link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>

<div class="fotorama uk-padding-small uk-flex uk-flex-center  uk-section-secondary2" 
     data-nav="thumbs" 
	 data-allowfullscreen="true">
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
	'w'     	=> '400',
	'h'     	=> '300', 
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
  <a href="<?php echo $vValue; ?> " ><img src="<?php echo $thumb3->img; ?>" width="144" height="96" ></a>
	<?php  endforeach;  ?>
</div>
<div class="data-hidden uk-margin" 
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
            

$thumb4 = $juImg->render(preg_replace($regexImageSrc, '', $vValue), [
	'w'     	=> '900',
	'q'         => '100',
	'zc'        => 'C',
	'far'        => 'C',	
	'webp'      => true,
	'webp_q'    => '100',
	'webp_maxq' => '100',
	'cache'     => 'img' 

	
]); 		 
  ?>	 
  <img src="<?php echo $thumb2->webp; ?>" type="image/webp"  width="900" height="auto" > 
	<?php  endforeach;  ?>
</div>
 

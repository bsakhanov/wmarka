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

<div uk-slideshow="animation: push">
    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" >

        <ul class="uk-slideshow-items">

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
  $regexImageSrc = '/#joomlaImage?([^\'" >]+)/';          
 
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
        <li itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">


                <figure class=" uk-margin-remove" >
				<img src="<?php echo $vValue; ?>"  alt="<?= $stripped ? :$item->title;?>" itemprop="thumbnailUrl" uk-cover/>
					<meta itemprop="url" content="<?php echo JUri::root(); ?><?php echo $thumb2->img; ?>">
					<meta itemprop="width" content="1800" /><meta itemprop="height" content="1200" />
				</figure>	



        </li>
	<?php  endforeach;  ?>
        </ul>

	    <a class="uk-slidenav-large uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a class="uk-slidenav-large uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

    </div><ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>
</div>
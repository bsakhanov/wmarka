<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_fields
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

if (!key_exists('field', $displayData))
{
	return;
}

$field = $displayData['field'];
$label = JText::_($field->label);
$value = $field->value;
$showLabel = $field->params->get('showlabel');
$labelClass = $field->params->get('label_render_class');

if ($value == '')
{
	return;
}

JLoader::register('JUImage',  JPATH_LIBRARIES . '/juimage/JUImage.php');

$juImg = new JUImage();

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
?>
<div class="uk-grid-small uk-child-width-1-5@m uk-flex uk-flex-center" uk-lightbox="animation: slide" uk-grid="masonry: true">

	<?php foreach ($fieldValues as $value) : ?>
<?php
    foreach ($value as $vKey => $vValue) {
        if ($vValue === '') {
            unset($value[$vKey]);
        }
        if ($aFields[$vKey] === 'media' & $vValue !== '') {
			
            $value[$vKey] = '<img src="/' . $vValue . '"/>';
        }
    }     ?>

	    <?php
            JLoader::register('JUImage',  JPATH_LIBRARIES . '/juimage/JUImage.php');
            $juImg = new JUImage();	
            $thumb = $juImg->render($vValue, [
                'w'     	=> '400',
                'h'     	=> '400',
                'q'         => '65',
                'zc'        => 'C',
                'far'        => 'C',	
                'webp'      => true,
                'webp_q'    => '60',
                'webp_maxq' => '65',
                'cache'     => 'img'
            ]);
			
	     ?>

        <div>
            <div class="uk-transition-toggle uk-inline-clip">
                <figure class=" uk-margin-remove" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                    <picture>
                                        <source srcset="<?php echo $thumb->webp; ?>" type="image/webp" width="400" height="400">
                                        <img src="<?php echo $thumb->img; ?>" width="400" height="400" class="" <meta itemprop="width"
                                         itemprop="thumbnailUrl"/>
										<amp-img src="<?php echo $thumb->img; ?>" width="400" height="400" class=""
                                        itemprop="thumbnailUrl" ></amp-img>
                    </picture>
					<meta itemprop="width" content="400" /><meta itemprop="height" content="400" />
				</figure>	
                <div class="uk-position-cover uk-overlay uk-overlay-primary uk-transition-fade"></div>
                <a class="uk-position-cover" href="<?= $vValue; ?>" data-caption="<?=  $item->title; ?>"></a>
				
            </div>
        </div>
	<?php  endforeach;  ?>
</div>




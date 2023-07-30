<?php

/**
 * @package   FL Amp Plugin
 * @author    Дмитрий Васюков http://fictionlabs.ru
 * @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$adType 		=  $this->params->get('ad_type');
$googleClient 	=  $this->params->get('ad_google_client');
$googleSlot 	=  $this->params->get('ad_google_slot');
$yandexId 		=  $this->params->get('ad_yandex_id');
$adfoxId 		=  $this->params->get('ad_adfox_id');
$adfoxParams 	=  $this->params->get('ad_adfox_params');

?>

<?php if ($adType == 'adsense') : ?>
	<amp-ad width="300" height="250"
      	type="adsense"
      	data-ad-client="<?php echo $googleClient; ?>"
      	data-ad-slot="<?php echo $googleSlot; ?>">
 	</amp-ad>
<?php elseif ($adType == 'yandex') : ?>
	<amp-ad width="300" height="250"
	    type="yandex"
	    data-block-id="<?php echo $yandexId; ?>">
	</amp-ad>
<?php elseif ($adType == 'adfox') : ?>
	<amp-ad width="300" height="250"
	    type="adfox"
	    data-owner-id="<?php echo $adfoxId; ?>"
	    data-adfox-params="<?php echo $adfoxParams; ?>">
	</amp-ad>
<?php endif; ?>
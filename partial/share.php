<?php

/**
 * @package   FL Amp Plugin
 * @author    Дмитрий Васюков http://fictionlabs.ru
 * @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$shareProviders 	= $this->params->get('share_providers');
$shareFacebookId    = $this->params->get('share_facebook_id');
$shareWidth 		= $this->params->get('share_icon_width', 60);
$shareHeight 		= $this->params->get('share_icon_height', 48);

?>

<?php if(!empty($shareProviders)) {
	foreach ($shareProviders as $provider) {
		$html = array();
		$html[] = '<amp-social-share ';
		$html[] = 'type="'.$provider.'" width="'.$shareWidth.'" height="'.$shareHeight.'" ';

		if ($provider == 'facebook') {
			$html[] = 'data-param-app_id="'.$shareFacebookId.'" ';
		}

		if ($provider == 'vk') {
			$html[] = 'data-share-endpoint="https://vk.com/share.php?url='.urlencode(JURI::current()).'&title='.urlencode($title).'&description='.urlencode($description).($image ? '&image='.urlencode($image) : '').'" ';
		}

		if ($provider == 'skype') {
			$html[] = 'data-share-endpoint="https://web.skype.com/share?url='.urlencode(JURI::current()).'" ';
		}

		if ($provider == 'telegram') {
			$html[] = 'data-share-endpoint="tg://msg_url?url='.urlencode(JURI::current()).'&text='.urlencode($title).'" ';
		}

		$html[] = '></amp-social-share>';

		echo implode('', $html);
	}
} ?>
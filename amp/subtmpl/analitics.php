<?php

/**
 * @package   FL Amp Plugin
 * @author    Дмитрий Васюков http://fictionlabs.ru
 * @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$options = $this->params->get('analitics_options');

?>

<?php if (!empty($options)) : ?>
	<?php foreach ($options as $option) : ?>

		<?php if ($option->analitics_type == 'googleanalytics') : ?>
			<amp-analytics type="googleanalytics" id="analytics2">
				<script type="application/json">
				{
				  	"vars": {
				    	"account": "<?php echo $option->analitics_id; ?>"
				  	},
				  	"triggers": {
				    	"trackPageviewWithAmpdocUrl": {
				      		"on": "visible",
				      		"request": "pageview",
				      		"vars": {
				        		"title": "<?php echo $title; ?>",
				        		"ampdocUrl": "<?php echo JURI::current().'?flview=amp'; ?>"
				      		}
				    	}
				  	}
				}
				</script>
			</amp-analytics>
		<?php elseif ($option->analitics_type == 'metrika') : ?>
			<amp-analytics type="metrika">
		        <script type="application/json">
		            {
		                "vars": {
		                    "counterId": "<?php echo $option->analitics_id; ?>"
		                }
		            }
		        </script>
		    </amp-analytics>
		<?php elseif ($option->analitics_type == 'top100') : ?>
			<amp-analytics type="top100" id="top100" config="https://kraken.rambler.ru/amp/config.json">
				<script type="application/json">
					{
				 		"vars": {
				 			"pid": "<?php echo $option->analitics_id; ?>"
				 		}
					}
				</script>
			</amp-analytics>
		<?php elseif ($option->analitics_type == 'topmailru') : ?>
			<amp-analytics type="topmailru" id="topmailru">
				<script type="application/json">
					{
				      	"vars": {
				            "id": "<?php echo $option->analitics_id; ?>"
				      	}
					}
				</script>
			</amp-analytics>
		<?php elseif ($option->analitics_type == 'facebookpixel') : ?>
			<amp-analytics type="facebookpixel" id="facebookpixel">
				<script type="application/json">
					{
				      	"vars": {
				            "pixelId": "<?php echo $option->analitics_id; ?>"
				      	}
					}
				</script>
			</amp-analytics>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>
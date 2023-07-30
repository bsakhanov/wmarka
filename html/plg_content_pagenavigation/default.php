<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Content.pagenavigation
 *
 * @copyright   (C) 2013 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

$app  = Factory::getContainer()->get(Joomla\CMS\Application\SiteApplication::class);
$lang = $app->getLanguage();

$class = $row->prev && $row->next ? ' uk-flex-between' : ($row->next ? ' uk-flex-right' : '');
$class .= $lang->isRtl() ? ' uk-flex-row-reverse' : '';

?>
<hr>
<nav class="pagenavigation">
	<div class="uk-grid<?php echo $class; ?>" data-uk-grid="margin:uk-margin-small-top" uk-grid uk-height-match="target: > div > .uk-card">
	<?php if ($row->prev) {
		$direction = $lang->isRtl() ? 'right; ratio: 5' : 'left; ratio: 5'; ?>
		<div class="uk-flex   uk-width-1-2@m previous page-item">
			<a class="uk-button uk-button-link uk-flex-inline uk-flex-middle" href="<?php echo Route::_($row->prev); ?>" rel="prev">
			<?php echo '<span data-uk-icon="icon:chevron-' . $direction . '" aria-hidden="true" class="uk-text-muted"></span> <span aria-hidden="true">' . Text::sprintf('JPREVIOUS_TITLE', htmlspecialchars($rows[$location-1]->title)) . '</span>'; ?>
			</a>
		</div>
	<?php } ?>
	<?php if ($row->next) {
		$direction = $lang->isRtl() ? 'left; ratio: 5' : 'right; ratio: 5'; ?>
		<div class="uk-flex   uk-flex-right@m uk-width-1-2@m next page-item">
			<a class="uk-button uk-button-link uk-flex-inline uk-flex-middle" href="<?php echo Route::_($row->next); ?>" rel="next">
			<?php echo '<span aria-hidden="true">' . Text::sprintf('JNEXT_TITLE', htmlspecialchars($rows[$location+1]->title)) . '</span> <span data-uk-icon="icon:chevron-' . $direction . '" aria-hidden="true" class="uk-text-muted"></span>'; ?>
			</a>
		</div>
	<?php } ?>
	</div>
</nav>

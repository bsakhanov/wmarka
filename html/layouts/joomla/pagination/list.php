<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * @version     WMARKA ULTRA (Pagination List)
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

$list = $displayData['list'];
?>
<div class="uk-flex uk-flex-column uk-flex-middle">
    <nav aria-label="<?php echo Text::_('JLIB_HTML_PAGINATION'); ?>" itemscope itemtype="https://schema.org/SiteNavigationElement">
        <?php /* uk-flex-nowrap гарантирует одну строку */ ?>
        <ul class="uk-pagination uk-flex-center uk-flex-nowrap uk-margin-remove-bottom">
            <?php echo $list['start']['data']; ?>
            <?php echo $list['previous']['data']; ?>
            
            <?php foreach ($list['pages'] as $page) : ?>
                <?php echo $page['data']; ?>
            <?php endforeach; ?>
            
            <?php echo $list['next']['data']; ?>
            <?php echo $list['end']['data']; ?>
        </ul>
    </nav>
</div>
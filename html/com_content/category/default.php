<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * @version     Joomla 6 WMARKA Core Edition (UIkit 3 Category List)
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

declare(strict_types=1);

defined('_JEXEC') or die;

use Joomla\CMS\Layout\LayoutHelper;

?>
<div class="com-content-category category-list uk-margin-bottom">

<?php
$this->subtemplatename = 'articles';
echo LayoutHelper::render('joomla.content.category_default', $this);
?>

</div>
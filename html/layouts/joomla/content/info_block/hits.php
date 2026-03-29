<?php
defined('_JEXEC') or die;
use Joomla\CMS\Language\Text;
$item = $displayData['item'];
?>
<meta itemprop="interactionCount" content="UserPageVisits:<?php echo $item->hits; ?>">
<span class="hits-count">
    <?php echo Text::sprintf('COM_CONTENT_ARTICLE_HITS', $item->hits); ?>
</span>

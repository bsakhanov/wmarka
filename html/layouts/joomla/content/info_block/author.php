<?php
defined('_JEXEC') or die;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

$item   = $displayData['item'];
$params = $displayData['params'];
$authorName = ($item->created_by_alias ?: $item->author);
?>
<span itemprop="author" itemscope itemtype="https://schema.org/Person">
    <?php $author = '<span itemprop="name">' . $authorName . '</span>'; ?>
    <?php if (!empty($item->contact_link) && $params->get('link_author')) : ?>
        <?php echo Text::sprintf('COM_CONTENT_WRITTEN_BY', HTMLHelper::_('link', $item->contact_link, $author, ['itemprop' => 'url'])); ?>
    <?php else : ?>
        <?php echo Text::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
    <?php endif; ?>
</span>

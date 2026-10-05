<?php
/**
 * WMARKA — умный поиск: форма + результаты.
 * CSS ядра com_finder не подключается (его правило «.com-finder * {margin-bottom:0}»
 * ломает ритм UIkit); скрипт автоподсказки — штатный.
 *
 * @var \Joomla\Component\Finder\Site\View\Search\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

$this->getDocument()->getWebAssetManager()->useScript('com_finder.finder');
?>
<div class="com-finder finder">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1 class="uk-heading-small"><?php echo $this->escape($this->params->get('page_heading') ?: $this->params->get('page_title')); ?></h1>
    <?php endif; ?>

    <div id="search-form" class="uk-margin-medium-bottom"><?php echo $this->loadTemplate('form'); ?></div>

    <?php if ($this->query->search === true) : ?>
        <div id="search-results"><?php echo $this->loadTemplate('results'); ?></div>
    <?php endif; ?>
</div>

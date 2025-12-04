<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_finder
 *
 * @copyright   (C) 2011 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Подключаем стили компонента, если нужно (можно убрать, если все стили в шаблоне)
$this->document->getWebAssetManager()
    ->useStyle('com_finder.finder')
    ->useScript('com_finder.finder');

?>
<div class="com-finder finder uk-section uk-container">
    
    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1 class="uk-heading-medium uk-margin-medium-bottom">
            <?php if ($this->escape($this->params->get('page_heading'))) : ?>
                <?php echo $this->escape($this->params->get('page_heading')); ?>
            <?php else : ?>
                <?php echo $this->escape($this->params->get('page_title')); ?>
            <?php endif; ?>
        </h1>
    <?php endif; ?>

    <div id="search-form" class="com-finder__form uk-margin-large-bottom">
        <?php // Загружаем шаблон формы (default_form.php) ?>
        <?php echo $this->loadTemplate('form'); ?>
    </div>

    <?php // Загружаем результаты, если поиск был выполнен ?>
    <?php if ($this->query->search === true) : ?>
        <div id="search-results" class="com-finder__results uk-margin-top">
            <h2 class="uk-h3 uk-heading-line text-center"><span>Результаты поиска</span></h2>
            <?php echo $this->loadTemplate('results'); ?>
        </div>
    <?php endif; ?>

</div>
<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;

/** @var \Wmarka\Template\Helper $this */
$doc = $this->doc;

// Проверяем наличие модулей в позиции, чтобы не плодить пустые теги в DOM
if ($doc->countModules('block-a')) : ?>
    <section id="section-block-a" class="uk-section uk-section-default">
        <div class="uk-container">
            
            <?php /* Вывод модулей с нашим новым стилем хрома */ ?>
            <jdoc:include type="modules" name="block-a" style="wmarka" />
            
        </div>
    </section>
<?php endif; ?>

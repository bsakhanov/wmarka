<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_finder
 *
 * @copyright   (C) 2011 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Layout\LayoutHelper; // Добавили для работы LayoutHelper::render
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Finder\Administrator\Helper\LanguageHelper;
use Joomla\Component\Finder\Administrator\Indexer\Helper;
use Joomla\Component\Finder\Administrator\Indexer\Taxonomy;
use Joomla\String\StringHelper;

/** @var \Joomla\Component\Finder\Site\View\Search\HtmlView $this */
$user             = $this->getCurrentUser();
$show_description = $this->params->get('show_description', 1);

// Приводим переменную к виду, ожидаемому в макете (для совместимости)
$item = $this->result; 

// --- БЛОК ЛОГИКИ JOOMLA (описание, подсветка) ---
if ($show_description) {
    $term_length = StringHelper::strlen($this->query->input);
    $desc_length = $this->params->get('description_length', 255);
    $pad_length  = $term_length < $desc_length ? (int) floor(($desc_length - $term_length) / 2) : 0;

    $full_description = $this->result->description;
    if (!empty($this->result->summary) && !empty($this->result->body)) {
        $full_description = Helper::parse($this->result->summary . $this->result->body);
    }

    $pos = $term_length ? StringHelper::strpos(StringHelper::strtolower($full_description), StringHelper::strtolower($this->query->input)) : false;
    $start = ($pos && $pos > $pad_length) ? $pos - $pad_length : 0;
    $space = StringHelper::strpos($full_description, ' ', $start > 0 ? $start - 1 : 0);
    $start = ($space && $space < $pos) ? $space + 1 : $start;

    $description = HTMLHelper::_('string.truncate', StringHelper::substr($full_description, $start), $desc_length, true);
}
// --- КОНЕЦ БЛОКА ЛОГИКИ ---

$showImage = $this->params->get('show_image', 0);

// Иконка файла (MIME)
$icon = '';
if (!empty($this->result->mime)) {
    $icon = '<span uk-icon="icon: file-text; ratio: 1" class="uk-margin-small-right uk-text-muted"></span>';
}

// URL
$show_url = '';
if ($this->params->get('show_url', 1)) {
    $show_url = '<div class="uk-text-meta uk-text-break uk-text-small">' . $this->baseUrl . Route::_($this->result->cleanURL) . '</div>';
}
?>

<li class="uk-margin-medium-bottom">
    <article class="uk-article">
        
        <div class="uk-grid-medium" uk-grid>
            
            <?php if ($showImage && !empty($item->imageUrl)) : ?>
                <div class="uk-width-medium@s"> <?php
                    try {
                        // Передаем объект $item ($this->result) в макет
                        echo LayoutHelper::render('joomla.content.intro_image', $item);
                    } catch (\Exception $e) {
                        Factory::getApplication()->enqueueMessage('Error rendering intro_image layout: ' . $e->getMessage(), 'error');
                        // Заглушка при ошибке
                        echo '<div class="uk-card-media-top uk-background-muted uk-height-small uk-flex uk-flex-center uk-flex-middle uk-text-muted uk-text-small">'.Text::_('JGLOBAL_LAYOUT_LOAD_ERROR').'</div>';
                    }
                    ?>
                </div>
            <?php endif; ?>

            <div class="uk-width-expand">
                
                <h3 class="uk-h4 uk-margin-remove-bottom">
                    <?php if ($this->result->route) : ?>
                        <a class="uk-link-heading" href="<?php echo Route::_($this->result->route); ?>">
                            <?php echo $icon . $this->result->title; ?>
                        </a>
                    <?php else : ?>
                        <?php echo $icon . $this->result->title; ?>
                    <?php endif; ?>
                </h3>

                <div class="uk-article-meta uk-margin-small-top">
                    <?php if ($this->result->start_date && $this->params->get('show_date', 1)) : ?>
                        <time datetime="<?php echo HTMLHelper::_('date', $this->result->start_date, 'c'); ?>">
                            <span uk-icon="icon: calendar; ratio: 0.8"></span>
                            <?php echo HTMLHelper::_('date', $this->result->start_date, Text::_('DATE_FORMAT_LC3')); ?>
                        </time>
                        <?php if ($show_url) echo ' | '; ?>
                    <?php endif; ?>
                    
                    <?php if ($show_url) : ?>
                         <?php echo str_replace('<div', '<span', str_replace('</div>', '</span>', $show_url)); ?>
                    <?php endif; ?>
                </div>

                <?php if ($show_description && $description !== '') : ?>
                    <p class="uk-margin-small-top">
                        <?php echo $description; ?>
                    </p>
                <?php endif; ?>

                <?php $taxonomies = $this->result->getTaxonomy(); ?>
                <?php if (count($taxonomies) && $this->params->get('show_taxonomy', 1)) : ?>
                    <div class="uk-margin-small-top uk-flex uk-flex-wrap" uk-margin>
                        <?php foreach ($taxonomies as $type => $taxonomy) : ?>
                            
                            <?php // --- ИСКЛЮЧАЕМ ТИП И АВТОРА --- ?>
                            <?php if (in_array($type, ['Type', 'Author'])) continue; ?>

                            <?php if ($type == 'Language' && (!Multilanguage::isEnabled() || (isset($taxonomy[0]) && $taxonomy[0]->title == '*'))) : ?>
                                <?php continue; ?>
                            <?php endif; ?>
                            
                            <?php $branch = Taxonomy::getBranch($type); ?>
                            <?php if ($branch->state == 1 && in_array($branch->access, $user->getAuthorisedViewLevels())) : ?>
                                <?php $taxonomy_text = []; ?>
                                <?php foreach ($taxonomy as $node) : ?>
                                    <?php if ($node->state == 1 && in_array($node->access, $user->getAuthorisedViewLevels())) : ?>
                                        <?php $taxonomy_text[] = $node->title; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                
                                <?php if (count($taxonomy_text)) : ?>
                                    <div class="uk-margin-small-right">
                                        <span class="uk-text-meta uk-text-uppercase uk-text-small" style="font-size: 0.7rem;">
                                            <?php echo Text::_(LanguageHelper::branchSingular($type)); ?>:
                                        </span>
                                        <?php foreach($taxonomy_text as $term): ?>
                                            <span class="uk-label uk-label-soft-blue uk-text-small">
                                                <?php echo Text::_($term); ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </article>
</li>
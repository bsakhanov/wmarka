<?php
/**
 * WMARKA — один результат поиска.
 * Миниатюра — тот же интро-файл, что в карточках блога (профиль intro):
 * поиск не плодит свой размер превью.
 *
 * @var \Joomla\Component\Finder\Site\View\Search\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Finder\Administrator\Helper\LanguageHelper;
use Joomla\Component\Finder\Administrator\Indexer\Helper;
use Joomla\Component\Finder\Administrator\Indexer\Taxonomy;
use Joomla\String\StringHelper;
use Wmarka\Template\Image;
use Wmarka\Template\Ui;

require_once JPATH_THEMES . '/wmarka/php/autoload.php';

$user        = $this->getCurrentUser();
$result      = $this->result;
$description = '';

if ($this->params->get('show_description', 1)) {
    $termLength = StringHelper::strlen($this->query->input);
    $descLength = (int) $this->params->get('description_length', 255);
    $padLength  = $termLength < $descLength ? (int) floor(($descLength - $termLength) / 2) : 0;
    $full       = $result->description;

    if (!empty($result->summary) && !empty($result->body)) {
        $full = Helper::parse($result->summary . $result->body);
    }

    $pos   = $termLength ? StringHelper::strpos(StringHelper::strtolower($full), StringHelper::strtolower($this->query->input)) : false;
    $start = ($pos && $pos > $padLength) ? $pos - $padLength : 0;
    $space = StringHelper::strpos($full, ' ', $start > 0 ? $start - 1 : 0);
    $start = ($space && $space < $pos) ? $space + 1 : $start;

    $description = HTMLHelper::_('string.truncate', StringHelper::substr($full, $start), $descLength, true);
}

$thumb = ($this->params->get('show_image', 0) && !empty($result->imageUrl)) ? Image::responsive($result->imageUrl, false) : [];
$route = $result->route ? Route::_($result->route) : '';
?>
<li>
    <article class="uk-grid-medium" uk-grid>
        <?php if ($thumb) : ?>
            <div class="uk-width-1-4@s">
                <?php if ($route && $this->params->get('link_image', 1)) : ?><a class="uk-display-block" href="<?php echo $route; ?>" tabindex="-1" aria-hidden="true"><?php endif; ?>
                    <?php echo Image::img($thumb, (string) ($result->imageAlt ?? ''), ['class' => trim('uk-width-1-1 ' . $this->params->get('image_class', '')), 'sizes' => '(min-width: 640px) 25vw, 100vw']); ?>
                <?php if ($route && $this->params->get('link_image', 1)) : ?></a><?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="uk-width-expand">
            <h3 class="uk-h4 uk-margin-remove">
                <?php if ($route) : ?>
                    <a class="uk-link-heading" href="<?php echo $route; ?>"><?php echo $result->title; ?></a>
                <?php else : ?>
                    <?php echo $result->title; ?>
                <?php endif; ?>
            </h3>
            <div class="uk-article-meta uk-margin-xsmall-top">
                <?php if ($result->start_date && $this->params->get('show_date', 1)) : ?>
                    <time datetime="<?php echo HTMLHelper::_('date', $result->start_date, 'c'); ?>"><?php echo HTMLHelper::_('date', $result->start_date, Text::_('DATE_FORMAT_LC3')); ?></time>
                <?php endif; ?>
                <?php if ($this->params->get('show_url', 1)) : ?>
                    <span class="uk-text-break uk-margin-small-left"><?php echo $this->baseUrl . Route::_($result->cleanURL); ?></span>
                <?php endif; ?>
            </div>
            <?php if ($description !== '') : ?>
                <p class="uk-margin-small-top uk-margin-remove-bottom"><?php echo $description; ?></p>
            <?php endif; ?>
            <?php $taxonomies = $result->getTaxonomy(); ?>
            <?php if (\count($taxonomies) && $this->params->get('show_taxonomy', 1)) : ?>
                <ul class="uk-subnav uk-subnav-divider uk-margin-small-top">
                    <?php foreach ($taxonomies as $type => $taxonomy) : ?>
                        <?php if ($type === 'Language' && (!Multilanguage::isEnabled() || (isset($taxonomy[0]) && $taxonomy[0]->title === '*'))) { continue; } ?>
                        <?php $branch = Taxonomy::getBranch($type); ?>
                        <?php if ($branch->state != 1 || !\in_array($branch->access, $user->getAuthorisedViewLevels())) { continue; } ?>
                        <?php $titles = []; ?>
                        <?php foreach ($taxonomy as $node) : ?>
                            <?php if ($node->state == 1 && \in_array($node->access, $user->getAuthorisedViewLevels())) { $titles[] = Text::_(LanguageHelper::branchSingular($node->title)); } ?>
                        <?php endforeach; ?>
                        <?php if ($titles) : ?>
                            <li><span><?php echo Text::_(LanguageHelper::branchSingular($type)); ?>: <?php echo Ui::esc(implode(', ', $titles)); ?></span></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </article>
</li>

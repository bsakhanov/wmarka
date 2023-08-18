<?php

defined('_JEXEC') or die;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Filesystem\Path;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;

/*
 * logo
 * headbar
 */

if ($_this->countModules('headbar')) {
    ?>
<header id="section-headbar" class="uk-section uk-section-xsmall">
    <div class="uk-container">
        <div data-uk-grid>

            
             <div class="uk-width-auto uk-flex uk-flex-middle">
            <?php if (JURI::current()!= JURI::base()) { echo '<a href="'.JURI::base(true).'" itemprop="url">'; } ?>
				<div class="uk-logo uk-display-inline-block uk-margin-small-left"><img src="media/templates/site/wmarka/images/logo.svg" width="100" height="62" uk-svg>
				</div>
			<?php if (JURI::current()!= JURI::base()) { echo '</a>'; } ?>
            </div>
            

            <?php if ($_this->countModules('headbar')) { ?>
            <div class="uk-width-expand uk-flex uk-flex-middle uk-flex-right">
                <jdoc:include type="modules" name="headbar" style="master3" />
            </div>
            <?php } ?>

        </div>
    </div>
</header>
<?php } ?>
<?php



defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

$sectionClass = 'uk-section uk-section-default';
$containerClass = 'uk-container';

?>
<?php
/*
 * logo
 * headbar
 */
{ ?> 
<header id="header" class="uk-section uk-section-default uk-section-small uk-background-cover uk-background-blend-multiply uk-background-primary uk-flex uk-flex-center uk-flex-middle" style="background-image: url(/templates/wmarka/images/header.webp);"> 
 
    <div class="uk-container">
        <div data-uk-grid>   
            <div class="uk-width-auto@m uk-flex uk-flex-middle">
            
            <div class="uk-navbar-item uk-logo "><img src="/templates/wmarka/images/logo-white.svg" width="200" height="90" uk-svg>
			</div>
           
            </div>
            <div class="uk-width-expand@m uk-flex uk-flex-middle uk-flex-right@m">
                <jdoc:include type="modules" name="headbar" style="master3" />
            </div>


        </div>
    </div>
</header>
 
<?php } ?>



<?php

defined('_JEXEC') or die;
$app  = JFactory::getApplication();
?>
<?php
$mainTopCount = $_this->countModules('main-top');
$mainBottomCount = $_this->countModules('main-bottom');
$sidebarACount = $_this->countModules('sidebar-a');
$sidebarBCount = $_this->countModules('sidebar-b');
$mainWidth = $sidebarACount && $sidebarBCount ? '1-2' : ($sidebarACount || $sidebarBCount ? '3-4' : '1-1');
?>
<div id="main" class="uk-section uk-section-default uk-padding-small uk-margin-bottom">
    <div class="uk-container">
        <div class="uk-grid-divider uk-grid-small" data-uk-grid>

            <div class="uk-width-<?php echo $mainWidth; ?>@m">
	 

                    <?php if ($mainTopCount) { ?>
                    <div class="uk-margin-auto uk-padding uk-margin-top" data-uk-grid>
                        <jdoc:include type="modules" name="main-top" style="master3lite" />
                    </div>
                    <?php } ?>

                    <main id="content" class="uk-padding-remove-vertical">					
                        <jdoc:include type="component" />
                    </main>

                    <?php if ($mainBottomCount) { ?>
                    <div class="">
                        <jdoc:include type="modules" name="main-bottom" style="master3lite" />
						
                    </div>
                    <?php } ?>
            
            </div>

            <?php if ($sidebarACount) { ?>
            <aside class="uk-width-1-4@m uk-width-1-1@s uk-flex-first@m ">
                <div class="uk-child-width-1-1  uk-grid-small uk-grid-divider" data-uk-grid>	
                    <jdoc:include type="modules" name="sidebar-a" style="master3lite" />

                </div>
            </aside>
            <?php } ?>

            <?php if ($sidebarBCount) { ?>
            <aside class="uk-width-1-4@m uk-width-1-1@s">
                <div class="uk-child-width-1-1  uk-grid-divider uk-grid-small" data-uk-grid>
                    <jdoc:include type="modules" name="sidebar-b" style="master3lite" />
                </div>			
		    </aside>			
            <?php } ?>

        </div>
		<div class="" id="stop"></div>
    </div>
</div>

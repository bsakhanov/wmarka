<?php

defined('_JEXEC') or die;
$app  = JFactory::getApplication();
?>
<?php
$mainTopCount = $_this->countModules('block-za');
$mainBottomCount = $_this->countModules('block-az + temy');
$sidebarACount = $_this->countModules('sidebar-aa');
$sidebarBCount = $_this->countModules('sidebar-bb');
$mainWidth = $sidebarACount && $sidebarBCount ? '1-2' : ($sidebarACount || $sidebarBCount ? '3-4' : '1-1');
?>
<div id="block-a" class="uk-section uk-section-default uk-padding-remove">
    <div class="uk-container">
        <div class="uk-grid-divider uk-grid-small uk-height-match" data-uk-grid>

            <div class="uk-width-<?php echo $mainWidth; ?>@m">
	           <div class="uk-child-width-1-1" data-uk-grid>

                    <?php if ($mainTopCount) { ?>
                    <div class="uk-margin-auto uk-padding-remove uk-child-width-1-1 uk-margin-top" data-uk-grid>
                        <jdoc:include type="modules" name="block-za" style="master3lite" />
                    </div>
                    <?php } ?>
                    <?php if ($mainBottomCount) { ?>
                    <div class="uk-child-width-1-1 ">
                        <jdoc:include type="modules" name="block-az" style="master3lite" />
						<div class="uk-visible@m">
						<jdoc:include type="modules" name="temy" style="master3lite" />
						</div>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <?php if ($sidebarACount) { ?>
            <aside class="uk-width-1-4@m uk-width-1-1@s uk-flex-first@m ">
                <div class="uk-child-width-1-1 uk-margin-top uk-grid-small uk-grid-divider" data-uk-grid>	
                    <jdoc:include type="modules" name="sidebar-aa" style="master3lite" />

                </div>
            </aside>
            <?php } ?>

            <?php if ($sidebarBCount) { ?>
            <aside class="uk-width-1-4@m uk-width-1-1@s">
                <div class="uk-child-width-1-1  uk-margin-top  uk-grid-small " data-uk-grid>
                    <jdoc:include type="modules" name="sidebar-bb" style="master3lite" />

                </div>	

		    </aside>			
            <?php } ?>

        </div>
		<div class="" id="stop"></div>
    </div>
</div>

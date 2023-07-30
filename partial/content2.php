<?php

defined('_JEXEC') or die;
$app  = JFactory::getApplication();
?>
<?php
$main2TopCount = $_this->countModules('main-top-2');
$main2BottomCount = $_this->countModules('main-bottom-2 + temy');
$sidebarA2Count = $_this->countModules('sidebar-a2');
$sidebarB2Count = $_this->countModules('sidebar-b2');
$main2Width = $sidebarA2Count && $sidebarB2Count ? '1-2' : ($sidebarA2Count || $sidebarB2Count ? '3-4' : '1-1');
?>
<div id="main2" class="uk-section uk-section-default uk-padding-remove ">
    <div class="uk-container"> 
        <div class="uk-grid-divider uk-grid-small" uk-grid>

            <div class="uk-width-<?php echo $main2Width; ?>@m">
	           <div class="uk-child-width-1-1" uk-grid>

                    <?php if ($main2TopCount) { ?>
                    <div class="uk-margin-auto uk-padding-remove uk-child-width-1-1 uk-margin-top" data-uk-grid>
                        <jdoc:include type="modules" name="main-top-2" style="master3lite" />
                    </div>
                    <?php } ?>

                    <?php if ($main2BottomCount) { ?>
                    <div class="uk-child-width-1-1 ">
                        <jdoc:include type="modules" name="main-bottom-2" style="master3lite" />
                    </div>
                    <?php } ?>
                </div>
            </div>

            <?php if ($sidebarA2Count) { ?>
            <aside class="uk-width-1-4@m uk-width-1-1@s uk-flex-first@m ">
                <div class="uk-child-width-1-1 uk-margin-top uk-grid-small uk-grid-divider" data-uk-grid>	
                    <jdoc:include type="modules" name="sidebar-a2" style="master3lite" />

                </div>
            </aside>
            <?php } ?>

            <?php if ($sidebarB2Count) { ?>
            <aside class="uk-width-1-4@m uk-width-1-1@s">
                <div class="uk-child-width-1-1 uk-margin-top uk-grid-divider uk-grid-small" data-uk-grid>
                    <jdoc:include type="modules" name="sidebar-b2" style="master3lite" />
                </div>			
		    </aside>			
            <?php } ?>

        </div>
		<div class="" id="stop2"></div>
    </div>
</div>

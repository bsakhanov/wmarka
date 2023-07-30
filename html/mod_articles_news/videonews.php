<?php
defined('_JEXEC') or die;
?>
<a href="/foto" target="_blank" ><h3 class="uk-link-reset uk-margin-remove-top  uk-text-center"><span uk-icon="icon: eye; ratio: 1.2"></span> <?php echo $module->title; ?></a></h3>
<div uk-slider="autoplay: true; autoplay-interval: 3000; center: true; pause-on-hover: true">
    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
<ul class="uk-slider-items uk-child-width-1-3@m  uk-flex uk-flex-center" uk-grid>
	<?php for ($i = 0, $n = count($list); $i < $n; $i ++) : ?>
		<?php $item = $list[$i]; ?>
		<li >
			<?php require JModuleHelper::getLayoutPath('mod_articles_news', '_videonews'); ?>

		</li>
	<?php endfor; ?>
        </ul>
        <a class="uk-position-center-left uk-position-small uk-hidden-hover  uk-slidenav-large uk-padding-small uk-background-primary" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover  uk-slidenav-large  uk-padding-small uk-background-primary" href="#" uk-slidenav-next uk-slider-item="next"></a>
    </div>
    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
</div>

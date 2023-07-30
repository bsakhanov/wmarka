<?php
defined('_JEXEC') or die;
?>
<div uk-slider="autoplay: true; finite: true; autoplay-interval: 3000;">
    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
<ul class="uk-slider-items uk-child-width-1-1@m">
	<?php for ($i = 0, $n = count($list); $i < $n; $i ++) : ?>
		<?php $item = $list[$i]; ?>
		<li >
			<?php require JModuleHelper::getLayoutPath('mod_articles_news', '_slide'); ?>

		</li>
	<?php endfor; ?>
        </ul>
        <a class="uk-position-center-left uk-position-small uk-hidden-hover  " href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover  " href="#" uk-slidenav-next uk-slider-item="next"></a>
    </div>
    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
</div>

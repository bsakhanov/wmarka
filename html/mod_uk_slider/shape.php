<?php defined('_JEXEC') or die;
/*
 * @package     mod_uk_slider
 * @copyright   Copyright (C) 2018 Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

?>
<link rel="stylesheet" type="text/css" href="<?php echo JUri::root(); ?>/templates/asta2/css/shape.css" />
<script src="<?php echo JUri::root(); ?>/templates/asta2/js/libs/shape/snap.svg-min.js"></script>


        <section id="grid" class="grid clearfix">
		            <?php
            foreach ($items as $item)
            {
                $item_slide_class = trim($item->class) ? ' ' . trim($item->class) : '';
                $item_class = $item_class || $item_slide_class ? ' class="' . $item_class . $item_slide_class . '"' : '';
            ?>
				<a href="#" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
					<figure>
						<?php if ($item->img) { ?>
                    <img class="uk-width-medium" src="<?php echo $item->img; ?>" alt="<?php echo $item->title; ?>">
                    <?php } ?>
						<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
						<figcaption>
							<h2><?php echo $item->title; ?></h2>
							<p><?php echo $item->content; ?></p>
							<button><?php echo $item->link_text; ?></button>
						</figcaption>
					</figure>
				</a>
				<?php } ?>
			</section>

		<script>
			(function() {
	
				function init() {
					var speed = 330,
						easing = mina.backout;

					[].slice.call ( document.querySelectorAll( '#grid > a' ) ).forEach( function( el ) {
						var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
							pathConfig = {
								from : path.attr( 'd' ),
								to : el.getAttribute( 'data-path-hover' )
							};

						el.addEventListener( 'mouseenter', function() {
							path.animate( { 'path' : pathConfig.to }, speed, easing );
						} );

						el.addEventListener( 'mouseleave', function() {
							path.animate( { 'path' : pathConfig.from }, speed, easing );
						} );
					} );
				}

				init();

			})();
		</script>
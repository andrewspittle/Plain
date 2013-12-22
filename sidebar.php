<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Plain
 */
?>

	<section id="sidebar">
		<div id="secondary" class="widget-area" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'footer-1' ) ) : ?>
	
			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary -->
		
		<div id="tertiary" class="widget-area" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'footer-2' ) ) : ?>
	
			<?php endif; // end sidebar widget area ?>
		</div><!-- #tertiary -->
	</section>
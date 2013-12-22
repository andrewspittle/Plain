<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Plain
 * @since Plain 1.0
 */
?>

	</div><!-- #main .site-main -->
	
	<?php get_sidebar(); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'plain_credits' ); ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'plain' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'plain' ), 'WordPress' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon .site-footer -->
</div><!-- #wrapper .row -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>
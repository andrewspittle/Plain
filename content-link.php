<?php
/**
 * Template for Link format posts.
 *
 * @package Plain
 * @since Plain 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'plain' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'plain' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<div class="post-meta">
			<?php if ( 'post' == get_post_type() ) : ?>
				<?php plain_meta(); ?>
			<?php endif; ?>
		</div>
		
		<?php edit_post_link( __( 'Edit', 'plain' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php
/**
 * Template for Image format posts.
 *
 * @package Plain
 * @since Plain 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		$args = array(
			'post_type' => 'attachment',
			'numberposts' => -1,
			'post_status' => null,
			'post_parent' => $post->ID
		);

		$attachments = get_posts( $args );
			if ( $attachments ) :
				foreach ( $attachments as $attachment ) {
					if ( ! is_single() )
						printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
							get_permalink( $post->ID ),
							the_title_attribute( array( 'echo' => false ) ),
							wp_get_attachment_image( $attachment->ID, 'media-feature' )
						);
					else 
						echo wp_get_attachment_image( $attachment->ID, 'media-feature-single' );
				}
			else :
				remove_filter( 'the_content', 'plain_remove_images', 2 ); // Remove content filter from functions.php if there are no attachments returned
			endif;
	?>
	
	<div class="entry-content">
		<?php if ( !is_single() ) : ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'minimal_stream' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php else : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php endif; ?>
		
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

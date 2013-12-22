<?php
/**
 * Template for Gallery format posts.
 *
 * @package Plain
 * @since Plain 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( has_post_thumbnail() && ! is_single() ) { // check for a Post Thumbnail and a non-single template
				printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
					get_permalink( $post->ID ),
					the_title_attribute( array( 'echo' => false ) ),
					get_the_post_thumbnail( $post->ID, 'media-feature' )
				);
			}
			elseif ( has_post_thumbnail() && is_single() ) { // check for a Post Thumbnail and a single template
				the_post_thumbnail( 'media-feature' );
			}
			?>
		
		<?php if ( !is_single() ) : ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'plain' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php else : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( ! is_single() ) : // Only display Excerpts most places ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'plain' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'plain' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<div class="post-meta">
			<?php if ( 'post' == get_post_type() ) : ?>
				<?php plain_meta(); ?>
			<?php endif; ?>
		</div>
		
		<?php edit_post_link( __( 'Edit', 'plain' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->

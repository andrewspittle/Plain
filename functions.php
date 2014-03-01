<?php
/**
 * Plain functions and definitions
 *
 * @package Plain
 * @since Plain 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Plain 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 780; /* pixels */

if ( ! function_exists( 'plain_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Plain 1.0
 */
function plain_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Plain, use a find and replace
	 * to change 'plain' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'plain', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	
	/**
	 * Register custom image sizes
	 */
	add_image_size( 'media-feature-single', 1200, 9999, false ); //1200 pixels wide, unlimited height
	add_image_size( 'media-feature', 1200, 9999, false ); //1200 pixels wide, unlimited height

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'status', 'image', 'quote' ) );
}
endif; // plain_setup
add_action( 'after_setup_theme', 'plain_setup' );

/**
 * Register widgetized areas and update sidebar with default widgets
 */
function plain_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Left', 'plain' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Right', 'plain' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'plain_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function plain_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri(), '', '20131205' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'plain_scripts' );

/**
 * Filter images out of the_content
 * Since images are pulled separately for Image Format posts we'll remove them from the_content
 */
function plain_remove_images( $content ) {
	if ( 'image' == get_post_format() ) :
		return preg_replace( '/<img[^>]+./', '', $content );
	else :
		return $content;
	endif;
}
add_filter( 'the_content', 'plain_remove_images', 2 );

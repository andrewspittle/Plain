<?php
/**
 * The template for displaying search forms in Plain
 *
 * @package Plain
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'plain' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search the archives&hellip;', 'placeholder', 'plain' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'plain' ); ?>">
	</label>
</form>

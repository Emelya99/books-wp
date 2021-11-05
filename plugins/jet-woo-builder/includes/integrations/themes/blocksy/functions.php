<?php
/**
 * Blocksy Theme Integration
 */

// Enqueue styles.
add_action( 'wp_enqueue_scripts', 'jet_woo_blocksy_enqueue_styles' );

// Set template post classes.
add_filter( 'post_class', 'set_post_class' );

/**
 * Change the view of the gallery to be used in single product.
 */
add_filter( 'blocksy:woocommerce:product-view:use-default', function ( $current_value ) {
	return true;
} );

/**
 * Disable custom single add to cart form action wrapper.
 */
add_filter( 'blocksy:woocommerce:cart-actions:attr', function ( $attrs ) {

	$attrs['class'] = 'actions';

	return $attrs;

} );

/**
 * Add 'product' class to post on template pages
 *
 * @param array $classes Default classes list.
 *
 * @return array
 */
function set_post_class( $classes ) {

	if ( is_singular( 'jet-woo-builder' ) ) {
		$template_settings = get_post_meta( get_the_ID(), '_elementor_page_settings', true );

		if ( isset( $template_settings['general_condition'] ) ) {
			$classes[] = 'ct-default-gallery';
		}
	}

	return $classes;

}

/**
 * Enqueue Blocksy theme integration stylesheets.
 */
function jet_woo_blocksy_enqueue_styles() {
	wp_enqueue_style(
		'jet-woo-builder-blocksy',
		jet_woo_builder()->plugin_url( 'includes/integrations/themes/blocksy/assets/css/style.css' ),
		false,
		jet_woo_builder()->get_version()
	);
}

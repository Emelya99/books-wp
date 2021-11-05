<?php
/**
 * Categories loop item template
 */

$classes       = [];

if ( $carousel_enabled ) {
	array_push( $classes, 'swiper-slide' );
}
?>
<div class="jet-woo-categories__item <?php echo implode( ' ', $classes ); ?>">
	<div class="jet-woo-categories__inner-box">
		<?php include $this->get_category_preset_template(); ?>
	</div>
</div>
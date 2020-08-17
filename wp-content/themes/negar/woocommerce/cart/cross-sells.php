<?php
/**
 * Cross-sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cross-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( $cross_sells ) : ?>

	<div class="cross-sells">

		<h2 class="maybe-like-it"><?php esc_html_e( 'You may be interested in&hellip;', 'woocommerce' ); ?></h2>
    <div class="hscroll-product swiper-container">
    <div class="hscroll-product-slider swiper-wrapper">


			<?php foreach ( $cross_sells as $cross_sell ) : ?>
        <div class="swiper-slide">
				<?php
					$post_object = get_post( $cross_sell->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited, Squiz.PHP.DisallowMultipleAssignments.Found

					wc_get_template_part( 'content', 'product' );
				?>
        </div>
			<?php endforeach; ?>

    </div></div>
	</div>
	<?php
endif;

wp_reset_postdata();

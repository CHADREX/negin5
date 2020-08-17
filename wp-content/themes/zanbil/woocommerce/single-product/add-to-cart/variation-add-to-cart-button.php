<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
if( ! $product->managing_stock() && ! $product->is_in_stock() ) {

   echo ' <div class="col-md-12"><p class="woocommerce-error" style="margin-top:25px;display: block;">متاسفانه این کالا در حال حاضر موجود نیست. می‌توانید از طریق لیست پایین صفحه، از محصولات مشابه این کالا دیدن نمایید </p></div>';

   do_action( 'woocommerce_before_add_to_cart_button' ); 

}else { 
?>
<div class="woocommerce-variation-add-to-cart variations_button">
	<p> برای فعال شدن سبد خرید و نمایش قیمت ، گزینه های محصول را از کادر بالا انتخاب کنید. </p>
	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
	
	<?php
	do_action( 'woocommerce_before_add_to_cart_quantity' );

	woocommerce_quantity_input( array(
		'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
		'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
		'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
	) );

	do_action( 'woocommerce_after_add_to_cart_quantity' );
	?>
	
	<button type="submit" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>
<?php } ?>
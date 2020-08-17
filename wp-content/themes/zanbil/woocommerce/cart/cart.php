<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
$zanbil_cart_text =zanbil_options()->getCpanelValue('cart-text');
wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>

<form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

<?php do_action( 'woocommerce_before_cart_table' ); ?>

<table class="shop_table cart" cellspacing="0">
	<thead>
		<tr>
			<th class="product-remove">&nbsp;</th>
			<th class="product-thumbnail"><?php esc_html_e( 'Image', 'zanbil' ); ?></th>
			<th class="product-name"><?php esc_html_e( 'Product', 'zanbil' ); ?></th>
			<th class="product-quantity"><?php esc_html_e( 'Quantity', 'zanbil' ); ?></th>
			<th class="product-subtotal"><?php esc_html_e( 'Total', 'zanbil' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php do_action( 'woocommerce_before_cart_contents' ); ?>

		<?php
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>
				<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

					<td class="product-remove">
						<?php
							echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">&times;</a>', esc_url( wc_get_cart_remove_url( $cart_item_key ) ), __( 'Remove this item', 'zanbil' ) ), $cart_item_key );
						?>
					</td>

					<td class="product-thumbnail">
						<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

							if ( ! $_product->is_visible() )
								echo $thumbnail;
							else
								printf( '<a href="%s">%s</a>', $_product->get_permalink( $cart_item ), $thumbnail );
						?>
					</td>

					<td class="product-name">
						<?php
							if ( ! $_product->is_visible() )
								echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
							else
								echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s </a>', $_product->get_permalink( $cart_item ), $_product->get_title() ), $cart_item, $cart_item_key );

							// Meta data
							echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

               				// Backorder notification
               				if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
               					echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'zanbil' ) . '</p>';
						?>
					</td>
					<td class="product-quantity">
						<?php
							if ( $_product->is_sold_individually() ) {
								$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
							} else {
								$product_quantity = woocommerce_quantity_input( array(
									'input_name'  => "cart[{$cart_item_key}][qty]",
									'input_value' => $cart_item['quantity'],
									'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
									'min_value'   => '0'
								), $_product, false );
							}

							echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
						?>
					</td>

					<td class="product-subtotal">
						<?php
							echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );

                        // For simple products
                        if ($_product->is_type('simple') && $_product->is_on_sale()) {
                            $regular_price = (float)wc_get_price_to_display($_product, array('price' => $_product->get_regular_price()));
                            $active_price = (float)wc_get_price_to_display($_product, array('price' => $_product->get_sale_price()));

                            $saved_amount = $regular_price - $active_price;

                            echo '<p class="cart-off"> تخفیف برای این محصول : <strong>' . wc_price($saved_amount) . '</strong></p>';
                        } else {

                            $variation_data = $_product->get_variation_attributes();
                            $variation_detail = wc_get_formatted_variation($variation_data, true);
                            $qq = wc_get_product($product_id);
                            $available_variations = $qq->get_available_variations();
                            foreach ($available_variations as $available_variation) {
                                if ($available_variation['display_regular_price'] > $available_variation['display_price'] && $available_variation['attributes'] == $variation_data) {
                                    $save = ($available_variation['display_regular_price'] - $available_variation['display_price']) * $cart_item['quantity'];
                                    echo '<p class="cart-off"> تخفیف برای این محصول : <strong>' . wc_price($save) . ' </strong></p>';

                                }
                            }
                        }


                        ?>
					</td>
				</tr>
				<?php
			}
		}

		do_action( 'woocommerce_cart_contents' );
		?>
		<tr>
			<td colspan="6" class="actions">

				<?php if ( WC()->cart->coupons_enabled() ) { ?>
					<div class="coupon">

						<label for="coupon_code"><?php esc_html_e( 'Coupon', 'zanbil' ); ?>:</label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_html_e( 'Coupon code', 'zanbil' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_html_e( 'Apply Coupon', 'zanbil' ); ?>" />

						<?php do_action( 'woocommerce_cart_coupon' ); ?>

					</div>
				<?php } ?>

				<input type="submit" class="button" name="update_cart" value="<?php esc_html_e( 'Update Cart', 'zanbil' ); ?>" />

				<?php do_action( 'woocommerce_cart_actions' ); ?>

				<?php wp_nonce_field( 'woocommerce-cart' ); ?>
			</td>
		</tr>

		<?php do_action( 'woocommerce_after_cart_contents' ); ?>
	</tbody>
</table>

<?php do_action( 'woocommerce_after_cart_table' ); ?>

</form>

<div class="cart-collaterals">
		<div class="cart_total">
				<?php do_action( 'woocommerce_cart_collaterals' ); ?>
				<div class="cart-text">
<?php echo $zanbil_cart_text; ?>
</div>
		</div>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>

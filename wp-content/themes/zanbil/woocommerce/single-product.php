<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     3.7.4
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

get_header('shop'); ?>

<?php if (apply_filters('woocommerce_show_page_title', true)) {
    zanbil_breadcrumb_title();
}
?>

<div class="container">
    <div class="row">
        <div id="contents-detail" class="content col-lg-12 col-md-12 col-sm-12" role="main">
            <?php
            /**
             * woocommerce_before_main_content hook
             *
             * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
             * @hooked woocommerce_breadcrumb - 20
             */
            do_action('woocommerce_before_main_content');
            ?>
            <div class="single-product clearfix">

                <?php while (have_posts()) : the_post(); ?>

                    <?php wc_get_template_part('content', 'single-product'); ?>

                <?php endwhile; // end of the loop. ?>

            </div>

            <?php
            /**
             * woocommerce_after_main_content hook
             *
             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
             */
            do_action('woocommerce_after_main_content');
            ?>
        </div>

    </div>
</div>

<?php get_footer( 'shop' );

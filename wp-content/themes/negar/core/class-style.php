<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'AVN_Negar_Theme_Style' ) ) {

	class AVN_Negar_Theme_Style {

		public function __construct() {
			add_action( 'wp_enqueue_scripts', array( $this, 'add_assets' ) , 999 );
			add_action( 'wp_enqueue_scripts', array( $this, 'inline_color_code_css' ) );
		}

		/**
		 * Enqueue CSS & JS files
		 */
		public function add_assets() {

			wp_enqueue_style( 'avn-style', get_template_directory_uri() . '/assets/css/main.css', '', '', 'screen' );
			wp_add_inline_style( 'avn-style', $this->inline_color_code_css() );
			wp_enqueue_style( 'avn-vendor', get_template_directory_uri() . '/assets/css/vendor.css', '', '', 'screen' );
			wp_enqueue_script( 'avn-bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap.min.js', '', false, true );
			wp_enqueue_style( 'swiper-slider-css', get_template_directory_uri() . '/assets/swiper/css/swiper-bundle.min.css', '', '', 'screen' );
			wp_enqueue_script( 'swiper-slider-js', get_template_directory_uri() . '/assets/swiper/js/swiper-bundle.min.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'avn-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), false, true );

			wp_localize_script( 'avn-custom-js', 'avn_negar', array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
			) );

			wp_dequeue_script( 'swiper' );
			wp_dequeue_style( 'swiper' );
		}

		public function inline_color_code_css() {
			global $avn_negar;
			ob_start();
			/* light get colors */
			if ( ! empty( $avn_negar['light_header_color'] ) ) { ?>
                .header-area,
                .single-post .image-single-post div,
                .woocommerce-account .header-area,
                .customer-account .account-header,
                .customer-account .account-header::after,
                .checkout-sub-navbar,
                .theme-negar #my-account-menu .user-profile,
                .theme-negar #my-account-menu-tab .user-profile,
                #my-account-menu-tab .user-profile::after{
                background-color: <?= $avn_negar['light_header_color']; ?>;
                }
			<?php } ?>

			<?php if ( ! empty( $avn_negar['light_text_header_color'] ) ) { ?>
                .top-header-center h1,
                .top-header-icon a,
                .top-header-icon .cart-customlocation,
                .checkout-sub-navbar ul .ngr-nav p,
                .woocommerce-account .top-header-icon a,
                .customer-account .account-header span,
                .theme-negar #my-account-menu-tab .user-info p,
                .theme-negar .user-profile .user-info .logout a{
                color: <?= $avn_negar['light_text_header_color']; ?>;
                }

                .top-header-sidebar span,
                .checkout-sub-navbar ul .ngr-nav span,
                .woocommerce-account .top-header-sidebar span,
                .woocommerce-cart .checkout-sub-navbar ul li:nth-child(2) span{
                background-color: <?= $avn_negar['light_text_header_color']; ?>;
                }
			<?php } ?>

			<?php if ( ! empty( $avn_negar['light_backgorund_sidebar_color'] ) ) { ?>
                .suha-sidenav-wrapper{
                background: <?= $avn_negar['light_backgorund_sidebar_color']; ?>;
                }
			<?php } ?>

			<?php if ( ! empty( $avn_negar['light_textt_sidebar_color'] ) ) { ?>
                .suha-sidenav-wrapper.nav-active h1,
                .suha-sidenav-wrapper.nav-active #accordian ul a{
                color: <?= $avn_negar['light_textt_sidebar_color']; ?>;
                }
			<?php } ?>

			<?php if ( ! empty( $avn_negar['primary_light_color'] ) ) { ?>
                p > a,
                p > a:hover,
                p > a:focus,
                strong,
                .negar-footer-nav ul li.active i,
                .negar-footer-nav ul li.active p,
                .sidebarcontact .phone_code,
                .negar-footer-part .first-menu h4,
                .negar-footer-part .second-menu h4,
                .negar-footer-part .validationlogos h4,
                .footer-image-widget h4,
                .footer-phone-info h4,
                .single-post span.post_my,
                .brand-swiper-container .footer .item-text.product-price,
                .footer-phone-info a span,
                .title-intro h2 span,
                .ngr-eleman-title span,
                .tcw_table_price .ngr-eleman-title,
                .title-intro.content-red-title,
                .woocommerce div.product .woocommerce-tabs ul.tabs li a:after,
                .tm-woowishlist .tm-woowishlist-wrapper .row .col-lg-4 .tm-woowishlist-remove:before{
                color: <?= $avn_negar['primary_light_color']; ?>;
                }

                .woocommerce-account .woocommerce-form-login.login .form-row .woocommerce-button,
                .woocommerce-form-register.register .woocommerce-form-row.form-row .woocommerce-Button.woocommerce-button,
                .woocommerce-lost-password .woocommerce-Button.button,
                .woocommerce-EditAccountForm.edit-account button.woocommerce-Button.button,
                form.woocommerce-form.woocommerce-form-track-order.track_order .form-row button.button, button.button[name="save_address"],
                header.woocommerce-Address-title.title a,
                .woocommerce-lost-password .woocommerce-Button.button,
                .woocommerce-EditAccountForm.edit-account button.woocommerce-Button.button,
                form.woocommerce-form.woocommerce-form-track-order.track_order .form-row button.button,
                button.button[name="save_address"],
                header.woocommerce-Address-title.title a,
                .woocommerce ul.products li.product .onsale,
                .hscroll-product-slider .swiper-slide .readmore,
                .footer-nav-area .buttonbar-second span,
                .footer-nav-area .buttonbar-first span,
                .top-header-icon .cart-customlocation span,
                .single-product span.onsale,
                .full-order-data .sections .code,
                .woocommerce-page.woocommerce-view-order .woocommerce-MyAccount-content p,
                .add-shortcut-btn .add-mobile-view,
                .add-shortcut-btn .cancel-mobile-view{
                background-color: <?= $avn_negar['primary_light_color']; ?>;
                }

                #tab-closer{
                background: <?= $avn_negar['primary_light_color']; ?>;
                }

                @keyframes pulse {
                0% {
                -moz-box-shadow: 0 0 0 0 <?= $avn_negar['primary_light_color']; ?>;
                box-shadow: 0 0 0 0 <?= $avn_negar['primary_light_color']; ?>;
                }
                50% {
                -moz-box-shadow: 0 0 0 10px <?= $avn_negar['primary_light_color']; ?>00;
                box-shadow: 0 0 0 10px <?= $avn_negar['primary_light_color']; ?>00;
                }
                100% {
                -moz-box-shadow: 0 0 0 0 rgba(204, 169, 44, 0);
                box-shadow: 0 0 0 0 rgba(204, 169, 44, 0);
                }
                }

                .hscroll-category-product .card-content .footer .price,
                .ngr_slider .swiper-slide-thumb-active {
                background-color: <?= $avn_negar['primary_light_color']; ?>24 !important;
                color: <?= $avn_negar['primary_light_color']; ?> !important;
                }
			<?php } ?>

            /* night get colors */
			<?php if ( ! empty( $avn_negar['night_header_color'] ) ) { ?>
                [data-theme="dark"] .header-area,
                [data-theme="dark"] .single-post .image-single-post div
                [data-theme="dark"] .woocommerce-account .header-area,
                [data-theme="dark"] .customer-account .account-header,
                [data-theme="dark"] .customer-account .account-header::after,
                [data-theme="dark"] .checkout-sub-navbar,
                [data-theme="dark"] .theme-negar #my-account-menu .user-profile,
                [data-theme="dark"] .theme-negar #my-account-menu-tab .user-profile,
                [data-theme="dark"] #my-account-menu-tab .user-profile::after{
                background-color: <?= $avn_negar['night_header_color']; ?>;
                }
			<?php } ?>

			<?php if ( ! empty( $avn_negar['night_text_header_color'] ) ) { ?>
                [data-theme="dark"] .top-header-center h1,
                [data-theme="dark"] .top-header-icon a,
                [data-theme="dark"] .top-header-icon .cart-customlocation,
                [data-theme="dark"] .checkout-sub-navbar ul .ngr-nav p,
                [data-theme="dark"] .woocommerce-account .top-header-icon a,
                [data-theme="dark"] .customer-account .account-header span,
                [data-theme="dark"] .theme-negar #my-account-menu-tab .user-info p,
                [data-theme="dark"] .theme-negar .user-profile .user-info .logout a{
                color: <?= $avn_negar['night_text_header_color']; ?> !important;
                }

                [data-theme="dark"] .top-header-sidebar span,
                [data-theme="dark"] .checkout-sub-navbar ul .ngr-nav span,
                [data-theme="dark"] .woocommerce-account .top-header-sidebar span,
                [data-theme="dark"] .woocommerce-cart .checkout-sub-navbar ul li:nth-child(2) span{
                background-color: <?= $avn_negar['night_text_header_color']; ?>;
                }
			<?php } ?>


			<?php if ( ! empty( $avn_negar['night_backgorund_sidebar_color'] ) ) { ?>
                [data-theme="dark"] .suha-sidenav-wrapper{
                background: <?= $avn_negar['night_backgorund_sidebar_color']; ?>;
                }
			<?php } ?>

			<?php if ( ! empty( $avn_negar['night_textt_sidebar_color'] ) ) { ?>
                [data-theme="dark"] .suha-sidenav-wrapper.nav-active h1,
                [data-theme="dark"] .suha-sidenav-wrapper.nav-active #accordian ul a{
                color: <?= $avn_negar['night_textt_sidebar_color']; ?>;
                }
			<?php } ?>

			<?php if ( ! empty( $avn_negar['primary_night_color'] ) ) { ?>
                [data-theme="dark"] p > a,
                [data-theme="dark"] a,
                [data-theme="dark"] p > a:hover,
                [data-theme="dark"] p > a:focus,
                [data-theme="dark"] strong,
                [data-theme="dark"] .negar-footer-nav ul li.active i,
                [data-theme="dark"] .negar-footer-nav ul li.active p,
                [data-theme="dark"] .single-post span.post_my,
                [data-theme="dark"] .sidebarcontact .phone_code,
                [data-theme="dark"] .footer-phone-info a span,
                [data-theme="dark"] .negar-footer-part .first-menu h4,
                [data-theme="dark"] .negar-footer-part .second-menu h4,
                [data-theme="dark"] .negar-footer-part .validationlogos h4,
                [data-theme="dark"] .footer-image-widget h4,
                [data-theme="dark"] .footer-phone-info h4,
                [data-theme="dark"] .title-intro h2 span,
                [data-theme="dark"] .ngr-eleman-title span,
                [data-theme="dark"] .tcw_table_price .ngr-eleman-title,
                [data-theme="dark"] .brand-swiper-container .footer .item-text.product-price,
                [data-theme="dark"] .title-intro.content-red-title,
                [data-theme="dark"] .woocommerce div.product .woocommerce-tabs ul.tabs li a:after,
                [data-theme="dark"] .tm-woowishlist .tm-woowishlist-wrapper .row .col-lg-4 .tm-woowishlist-remove:before{
                color: <?= $avn_negar['primary_night_color']; ?>;
                }

                [data-theme="dark"] .woocommerce-lost-password .woocommerce-Button.button,
                [data-theme="dark"] .woocommerce-EditAccountForm.edit-account button.woocommerce-Button.button,
                [data-theme="dark"] form.woocommerce-form.woocommerce-form-track-order.track_order .form-row button.button, button.button[name="save_address"],
                [data-theme="dark"] header.woocommerce-Address-title.title a,
                [data-theme="dark"] .woocommerce-account .woocommerce-form-login.login .form-row .woocommerce-button,
                [data-theme="dark"] .woocommerce-form-register.register .woocommerce-form-row.form-row .woocommerce-Button.woocommerce-button,
                [data-theme="dark"] .woocommerce-lost-password .woocommerce-Button.button,
                [data-theme="dark"] .woocommerce-EditAccountForm.edit-account button.woocommerce-Button.button,
                [data-theme="dark"] form.woocommerce-form.woocommerce-form-track-order.track_order .form-row button.button,
                [data-theme="dark"] button.button[name="save_address"],
                [data-theme="dark"] header.woocommerce-Address-title.title a,
                [data-theme="dark"] .woocommerce ul.products li.product .onsale,
                [data-theme="dark"] .hscroll-product-slider .swiper-slide .readmore,
                [data-theme="dark"] .footer-nav-area .buttonbar-second span,
                [data-theme="dark"] .footer-nav-area .buttonbar-first span,
                [data-theme="dark"] .top-header-icon .cart-customlocation span,
                [data-theme="dark"] .single-product span.onsale,
                [data-theme="dark"] .full-order-data .sections .code,
                [data-theme="dark"] .woocommerce-page.woocommerce-view-order .woocommerce-MyAccount-content p,
                [data-theme="dark"] .add-shortcut-btn .add-mobile-view,
                [data-theme="dark"] .add-shortcut-btn .cancel-mobile-view{
                background-color: <?= $avn_negar['primary_night_color']; ?>;
                }

                [data-theme="dark"] #tab-closer{
                background: <?= $avn_negar['primary_night_color']; ?>;
                }

                [data-theme="dark"] @keyframes pulse {
                0% {
                -moz-box-shadow: 0 0 0 0 <?= $avn_negar['primary_night_color']; ?>;
                box-shadow: 0 0 0 0 <?= $avn_negar['primary_night_color']; ?>;
                }
                50% {
                -moz-box-shadow: 0 0 0 10px <?= $avn_negar['primary_night_color']; ?>00;
                box-shadow: 0 0 0 10px <?= $avn_negar['primary_night_color']; ?>00;
                }
                100% {
                -moz-box-shadow: 0 0 0 0 <?= $avn_negar['primary_night_color']; ?>;
                box-shadow: 0 0 0 0 <?= $avn_negar['primary_night_color']; ?>;
                }
                }

                [data-theme="dark"] .hscroll-category-product .card-content .footer .price,
                [data-theme="dark"] .ngr_slider .swiper-slide-thumb-active {
                background-color: <?= $avn_negar['primary_night_color']; ?>24 !important;
                color: <?= $avn_negar['primary_night_color']; ?> !important;
                }
				<?php
			}
			$buffer = ob_get_clean();
			$minifiedCSS = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $buffer );

			return $minifiedCSS;
		}

	}

}
new AVN_Negar_Theme_Style();

add_action( 'template_redirect', 'ngr_setcookie', 20 );

function ngr_setcookie (){

	if (!isset($_COOKIE['PWACookie']) && is_front_page()) {
		setcookie('PWACookie', 'PWA', time() + (86400 * 10));
	}

}

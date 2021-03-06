<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $avn_negar;
?>
<!-- Preloader-->
<div class="preloader" id="preloader">
    <div id="ngr-preloader"></div>
</div>
<!-- Header Area-->
<div class="header-area" id="headerArea">

    <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Navbar Toggler-->
        <div class="top-header-sidebar col-4" id="suhaNavbarToggler">
            <span></span><span></span><span></span>
        </div>

        <!-- Logo Wrapper-->
        <div class="top-header-center col-4">

			<?php
			if ( ! empty( $avn_negar['site_logo']['url'] ) ) {
				if ( $avn_negar['logo_position'] == "center" ) { ?>
                    <a href="<?= get_site_url() ?>"><img src="<?= $avn_negar['site_logo']['url'] ?>"
                                                         alt="<?= get_bloginfo() ?>"></a>
				<?php }
			}
			if ( ! empty( $avn_negar['site_name'] ) ) {
				if ( $avn_negar['logo_position'] == "sidebar" ) { ?>
                    <a href="<?= get_site_url() ?>"><h1><?= $avn_negar['site_name']; ?></h1></a>
				<?php }
			} ?>
        </div>


        <div class="top-header-icon col-4">
			<?php
			if ( is_account_page() ) {
				require NGR_PATH . '/template-part/toolbar-icon/back.php';
			} else {

				foreach ( $avn_negar['top_toolbar_button']['enable'] as $key => $value ) {
					if ( file_exists( NGR_PATH . '/template-part/toolbar-icon/' . $key . '.php' ) ) {
						require NGR_PATH . '/template-part/toolbar-icon/' . $key . '.php';
					}
				}
			}
			?>
        </div>

    </div>

	<?php if ( class_exists( 'woocommerce' ) ) {
		// Search Form
		if ( class_exists( 'TCW_PLUGIN_WooCommerce' ) ) {
			?>
            <form method="get" id="searchform_special" class="hide" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="جستجو"/>
                <button type="submit" title="جستجو" class="fa fa-search button-search-pro form-button"></button>
                <input type="hidden" name="search_posttype" value="product"/>
            </form>
			<?php
		} else {
			?>
            <form role="search" method="get" data-custom-search="true"
                  class="nav-shadow woocommerce-product-search searchbar m-0"
                  action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <div class="searchbar-input">
                    <input type="search" class="search-field" placeholder="<?php if ( empty( get_search_query() ) ) {
						echo 'نام محصول را وارد کرده و اینتر را بزنید ...';
					} else {
						echo get_search_query();
					} ?>" name="s">
                </div>
                <input type="hidden" name="post_type" value="product">
            </form>
		<?php }
	} ?>
</div>


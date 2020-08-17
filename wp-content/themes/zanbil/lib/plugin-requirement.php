<?php
/***** Active Plugin ********/
require_once( get_template_directory().'/lib/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'zanbil_register_required_plugins' );
function zanbil_register_required_plugins() {
    $plugins = array(
        array(
            'name'               => 'ووکامرس',
            'slug'               => 'woocommerce',
            'required'           => true,
            'version'            => '4.0.0'
        ),

            array(
            'name'               => 'افزونه زنبیل (ووکامرس)',
            'slug'               => 'sw_woocommerce',
            'source'         		 => esc_url( 'https://avin-tarh.ir/autoupdate/zanbil/sw_woocommerce.zip' ),
            'required'           => true,
            'version'            => '5.2.0'
        ),

        array(
            'name'               => 'افزونه زنبیل(پست اسلایدر)',
            'slug'               => 'sw-responsive-post-slider',
            'source'         		 => esc_url( 'https://avin-tarh.ir/autoupdate/zanbil/sw-responsive-post-slider.zip' ),
            'required'           => true,
            'version'            => '5.2.0'
        ),

        array(
            'name'               => 'افزونه زنبیل (آپدیت سوم)',
            'slug'               => 'sw-zanbil',
            'source'         		 => esc_url( 'https://avin-tarh.ir/autoupdate/zanbil/sw-zanbil.zip' ),
            'required'           => true,
            'version'            => '5.2.0'
        ),

        array(
            'name'               => 'سفارشی سازی حساب کاربری ووکامرس',
            'slug'               => 'yith-woocommerce-customize-myaccount-page',
            'source'         		 => esc_url( 'https://avin-tarh.ir/autoupdate/zanbil/yith-woocommerce-customize-myaccount-page.zip' ),
            'required'           => true,
            'version'            => '5.2.0'
        ),

        array(
            'name'               => 'ویژگی پیشرفته محصول',
            'slug'               => 'jc-woocommerce-advanced-attributes',
            'source'         		 => esc_url( 'https://avin-tarh.ir/autoupdate/zanbil/jc-woocommerce-advanced-attributes.zip' ),
            'required'           => true,
            'version'            => '5.2.0'
        ),

        array(
            'name'               => 'مقایسه و علاقه مندی ووکامرس',
            'slug'               => 'tm-woocommerce-compare-wishlist',
            'source'         		 => esc_url( 'https://avin-tarh.ir/autoupdate/zanbil/tm-woocommerce-compare-wishlist.zip' ),
            'required'           => true,
            'version'            => '5.2.0'
        ),
    );
    $config = array();

    tgmpa( $plugins, $config );

}
add_action( 'vc_before_init', 'Zanbil_vcSetAsTheme' );
function Zanbil_vcSetAsTheme() {
    vc_set_as_theme();
}

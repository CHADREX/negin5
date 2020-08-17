<?php

thf_build_plugin_option( array(
    'title'  => esc_html__( 'WooCommerce Notifier SMS Settings', TCW_TEXTDOMAIN ),
    'parent' => 'woocommerce-notifier-tab',
    'id'     => 'woocommerce-notifier-sms-tab',
    'type'   => 'tab-title',
) );

thf_build_plugin_option( array(
    'text' => sprintf( __( 'You Can Config SMS Web Service on this page: <a href="%s" target="_blank">Persian WooCommerce SMS</a>', TCW_TEXTDOMAIN ), admin_url( 'admin.php?page=persian-woocommerce-sms-pro&tab=main' ) ),
    'type' => 'message',
) );

thf_build_plugin_option( array(
    'title' => esc_html__( 'Notifier SMS Settings', TCW_TEXTDOMAIN ),
    'type'  => 'header',
) );

thf_build_plugin_option( array(
    'name' => esc_html__( 'Enable', TCW_TEXTDOMAIN ),
    'id'   => 'wc_notifier_sms',
    'type' => 'checkbox',
) );

$default = __( 'Hello
Product {product_title} is now available and can be purchased.
{product_url}', TCW_TEXTDOMAIN );
thf_build_plugin_option( array(
    'name'    => esc_html__( 'SMS Content', TCW_TEXTDOMAIN ),
    'id'      => 'wc_notifier_sms_content',
    'type'    => 'textarea',
    'default' => $default,
    'hint'    => '<div dir="ltr"><code>{site_title}</code> <code>{site_url}</code> <code>{product_id}</code> <code>{product_url}</code> <code>{product_title}</code> <code>{product_image}</code> <code>{regular_price}</code> <code>{onsale_price}</code> <code>{onsale_from}</code> <code>{onsale_to}</code> <code>{sku}</code> <code>{stock}</code></div>',
) );
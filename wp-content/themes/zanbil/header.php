<!DOCTYPE html>
<html class="no-js" dir="rtl" lang="fa-IR">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php set_product_cookie() ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="body-wrapper theme-clearfix" id="body_wrapper">
    <?php
    $zanbil_top_banner = zanbil_options()->getCpanelValue('topheader');
    $zanbil_header_style = zanbil_options()->getCpanelValue('header_style');
    $zanbil_preload_page = zanbil_options()->getCpanelValue( 'preload_active_page' );
    /* Preload */
    if( 1 == zanbil_options()->getCpanelValue( 'preload_active' ) &&( is_array( $zanbil_preload_page ) && in_array( get_the_ID(), $zanbil_preload_page ) ) ) :
        ?>
        <div class="ip-header vc_hidden-xs">
            <div class="ip-loader">
                <svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
                    <path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
                    <path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
                </svg>
            </div>
        </div>
    <?php endif; ?>

    <?php
    if($zanbil_top_banner!= '') {
    ?>
    <div class="topbanner" role="alert">
        <img src="<?php echo $zanbil_top_banner; ?>" alt="<?php bloginfo('name'); ?>" width="100%" height="auto"/>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php } ?>
    <?php
    if($zanbil_header_style=='style1') {
        include('header-style1.php');
    }elseif($zanbil_header_style=='style2'){
        include('header-style2.php');
    }else{
		 include('header-default.php');
	}

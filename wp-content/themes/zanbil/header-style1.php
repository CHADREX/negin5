<?php
$zanbil_my_phone = zanbil_options()->getCpanelValue('phone_number');
$zanbil_page_hotdeals = zanbil_options()->getCpanelValue('hot_deals');
?>
<div id="header" class="header-style1 newheader">
    <div class="yt-header-middle">
        <div class="container das">
            <div class="row">
                <div class="col-lg-2 col-md-2 logo-wrapper">
                    <div class="logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo esc_attr(zanbil_options()->getCpanelValue('sitelogo')); ?>"
                                 alt="<?php bloginfo('name'); ?>" width="201" height="62"/>
                        </a>
                    </div>
                </div>

                <div class="col-lg-10 col-md-10 yt-searchbox">
                    <div class="search-pro">
                        <a class="phone-icon-search  fa fa-search" href="#"
                           title="<?php esc_attr_e('Search', 'zanbil') ?>"></a>
                        <div id="sm_serachbox_pro" class="sm-serachbox-pro">

                            <div class="sm-searbox-content">
                                <?php get_template_part('widgets/zanbil_top/searchcate'); ?>

                            </div>

                            <!-- MiniCart -->
                            <div class="mini-cart-header">
                                <?php get_template_part('woocommerce/minicart-ajax'); ?>
                            </div>

                            <!-- MiniLogin -->
                            <div class="mini-login-header">
                                <?php get_template_part('widgets/zanbil_top/login-header2'); ?>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="yt-header-under-2">
            <div class="container">
                <div class="row yt-header-under-wrap">
                    <div class="yt-main-menu col-md-12">
                        <div class="header-under-2-wrapper">

                            <div class="yt-searchbox-vermenu">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 vertical-mega">
                                        <div class="ver-megamenu-header">
                                            <div class="mega-left-title">
                                                <strong>دسـته بـندی محـصولات</strong>
                                            </div>
                                            <?php
                                            if (has_nav_menu('leftmenu')) {
                                                wp_nav_menu(array('theme_location' => 'leftmenu', 'menu_class' => 'vertical-megamenu'));
                                            } ?>
                                        </div>
                                    </div>

                                    <div class="yt-header-under col-lg-10 col-md-9 no-padding-l">
                                        <?php if (has_nav_menu('primary_menu')) { ?>
                                            <nav id="primary-menu" class="primary-menu">
                                                <div class="yt-menu">
                                                    <div class="navbar-inner navbar-inverse">
                                                        <?php
                                                        $menu_class = 'nav nav-pills';
                                                        if ('mega' == zanbil_options()->getCpanelValue('menu_type')) {
                                                            $menu_class .= ' nav-mega';
                                                        } else $menu_class .= ' nav-css';
                                                        ?>
                                                        <?php wp_nav_menu(array('theme_location' => 'primary_menu', 'menu_class' => $menu_class)); ?>
                                                    </div>
                                                </div>
                                            </nav>
                                        <?php } ?>
                                        <?php
                                        if ($zanbil_page_hotdeals != '' && get_page($zanbil_page_hotdeals) != NULL):
                                            $zanbil_pagedeal = get_page($zanbil_page_hotdeals);
                                            ?>
                                            <div class="menu-hotdeals hidden-sm hidden-xs">
                                                <a class="custom-font"
                                                   href="<?php echo get_page_link($zanbil_page_hotdeals); ?>">
                                                    <?php echo $zanbil_pagedeal->post_title; ?>
                                                </a>
                                            </div>
                                        <?php endif ?>
                                        <!-- MiniCart -->
                                        <div class="mini-cart-header">
                                            <?php get_template_part('woocommerce/minicart-ajax'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
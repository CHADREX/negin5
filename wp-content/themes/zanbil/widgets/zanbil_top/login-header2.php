<?php do_action('before'); ?>
<?php if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) { ?>
<?php global $woocommerce; ?>
<div class="top-login pull-left">
    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiPgo8Zz4KCTxnPgoJCTxnPgoJCQk8cGF0aCBkPSJNMTMxLjUsNDcySDYwLjY5M2MtOC41MzgsMC0xMy42ODktNC43NjUtMTUuOTk5LTcuNjA2Yy0zLjk4OC00LjkwNi01LjUzMy0xMS4yOS00LjIzNi0xNy41MTkgICAgIGMyMC43NjktOTkuNzYxLDEwOC44MDktMTcyLjYxNiwyMTAuNDQ1LTE3NC45OGMxLjY5MywwLjA2MywzLjM5LDAuMTA1LDUuMDk3LDAuMTA1YzEuNzIyLDAsMy40MzQtMC4wNDMsNS4xNDItMC4xMDcgICAgIGMyNC44NTMsMC41NjcsNDkuMTI5LDUuMjQsNzIuMjM2LDEzLjkxN2MxMC4zNCwzLjg4NSwyMS44NzEtMS4zNTIsMjUuNzU0LTExLjY5M2MzLjg4My0xMC4zNC0xLjM1Mi0yMS44NzEtMTEuNjkzLTI1Ljc1NCAgICAgYy0zLjMxMS0xLjI0NC02LjY0NS0yLjQwOC05Ljk5NS0zLjUxMkMzNzAuNTQ1LDIyMC4wMjEsMzkyLDE4MC40NjksMzkyLDEzNkMzOTIsNjEuMDEsMzMwLjk5MSwwLDI1NiwwICAgICBjLTc0Ljk5MSwwLTEzNiw2MS4wMS0xMzYsMTM2YzAsNDQuNTA5LDIxLjQ5Miw4NC4wOTIsNTQuNjQzLDEwOC45MThjLTMwLjM3MSw5Ljk5OC01OC44NzEsMjUuNTQ2LTgzLjgxMyw0Ni4wNjIgICAgIGMtNDUuNzMyLDM3LjYxNy03Ny41MjksOTAuMDg2LTg5LjUzMiwxNDcuNzQzYy0zLjc2MiwxOC4wNjYsMC43NDQsMzYuNjIyLDEyLjM2Myw1MC45MDhDMjUuMjIxLDUwMy44NDcsNDIuMzY0LDUxMiw2MC42OTMsNTEyICAgICBIMTMxLjVjMTEuMDQ2LDAsMjAtOC45NTQsMjAtMjBDMTUxLjUsNDgwLjk1NCwxNDIuNTQ2LDQ3MiwxMzEuNSw0NzJ6IE0xNjAsMTM2YzAtNTIuOTM1LDQzLjA2NS05Niw5Ni05NnM5Niw0My4wNjUsOTYsOTYgICAgIGMwLDUxLjM2Ny00MC41NTQsOTMuNDM4LTkxLjMyNiw5NS44ODVjLTEuNTU3LTAuMDI4LTMuMTE0LTAuMDUyLTQuNjc0LTAuMDUyYy0xLjU2NCwwLTMuMTI3LDAuMDIzLTQuNjg5LDAuMDUxICAgICBDMjAwLjU0NiwyMjkuNDMsMTYwLDE4Ny4zNjIsMTYwLDEzNnoiIGZpbGw9IiMwMDAwMDAiLz4KCQkJPHBhdGggZD0iTTQ5Ni42ODksMzQ0LjYwN2MtOC41NjEtMTkuMTUtMjcuODQ1LTMxLjU1OC00OS4xNzYtMzEuNjA3aC02Mi4zNzJjLTAuMDQ1LDAtMC4wODcsMC0wLjEzMywwICAgICBjLTIyLjUsMC00Mi4xMywxMy4yNi01MC4wMjksMzMuODA3Yy0xLjA1MSwyLjczNC0yLjMzNiw2LjE3OC0zLjY3NywxMC4xOTNIMjAwLjM1NmMtNS40MDcsMC0xMC41ODMsMi4xODktMTQuMzUsNi4wNjggICAgIGwtMzQuMzU2LDM1LjM4OGMtNy41NjcsNy43OTQtNy41MjksMjAuMjAzLDAuMDg1LDI3Ljk1bDM1LDM1LjYxMmMzLjc2LDMuODI2LDguOSw1Ljk4MSwxNC4yNjQsNS45ODFoNjVjMTEuMDQ2LDAsMjAtOC45NTQsMjAtMjAgICAgIGMwLTExLjA0Ni04Ljk1NC0yMC0yMC0yMGgtNTYuNjE0bC0xNS40MjgtMTUuNjk4TDIwOC44MTQsMzk3aDEzNy40OTFjOS4yMTQsMCwxNy4yMzUtNi4yOTUsMTkuNDI2LTE1LjI0NCAgICAgYzEuNjE4LTYuNjA3LDMuNjQ4LTEyLjk1OSw2LjU4NC0yMC41OTZjMS45MzYtNS4wMzYsNi43OTgtOC4xNiwxMi43NDEtOC4xNmMwLjAxMywwLDAuMDI2LDAsMC4wMzksMGg2Mi4zNzEgICAgIGM1LjY1NiwwLjAxMywxMC41MjQsMy4wNTMsMTIuNzA1LDcuOTMyYzUuMzY5LDEyLjAxMiwxMS43OCwzMC42MDgsMTEuODI4LDUwLjk4NmMwLjA0OCwyMC41MjktNi4zNTYsMzkuNTUxLTExLjczOSw1MS44OTQgICAgIGMtMi4xNyw0Ljk3OC03LjA3OSw4LjE4OC0xMi41Niw4LjE4OGMtMC4wMTEsMC0wLjAyMiwwLTAuMDMzLDBoLTYzLjEyNWMtNS41MzMtMC4wMTMtMTAuNzE2LTMuNTczLTEyLjg5Ni04Ljg1OCAgICAgYy0yLjMzOS01LjY3MS00LjM2Ni0xMi4xNDYtNi4xOTctMTkuNzk3Yy0yLjU3MS0xMC43NDItMTMuMzY3LTE3LjM2Ni0yNC4xMDUtMTQuNzk2Yy0xMC43NDMsMi41NzEtMTcuMzY3LDEzLjM2NC0xNC43OTYsMjQuMTA2ICAgICBjMi4zMjEsOS42OTksNC45NzgsMTguMTE4LDguMTIxLDI1LjczOGM4LjM5OSwyMC4zNjQsMjcuOTM5LDMzLjU1NSw0OS44MjcsMzMuNjA2aDYzLjEyNWMwLjA0MywwLDAuMDgzLDAsMC4xMjYsMCAgICAgYzIxLjM1MS0wLjAwMSw0MC42NDctMTIuNjMsNDkuMTgtMzIuMjAxYzYuOTEyLTE1Ljg1MSwxNS4xMzctNDAuNTExLDE1LjA3Mi02Ny45NzUgICAgIEM1MTEuOTM1LDM4NC40MzQsNTAzLjYzOCwzNjAuMTUzLDQ5Ni42ODksMzQ0LjYwN3oiIGZpbGw9IiMwMDAwMDAiLz4KCQkJPGNpcmNsZSBjeD0iNDMxIiBjeT0iNDEyIiByPSIyMCIgZmlsbD0iIzAwMDAwMCIvPgoJCTwvZz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K"/>
    <div class="mini-log">
        <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" class="register"
           title="ثبت نام"><span> حساب کاربری </span></a>
        <?php if (!is_user_logged_in()) {
        if (is_plugin_active('digits/digit.php'))
        {
            echo "<div>" . do_shortcode('[dm-login-modal]') . " | " . do_shortcode('[dm-signup-modal]') . "</div>";

        }else {?>
                    <?php echo '<div><a href="javascript:void(0);" data-toggle="modal" data-target="#login_form_1"><span> ورود </span></a> <span>  | </span> <a href="' . get_permalink(get_option('woocommerce_myaccount_page_id')) . '" class="register" title="ثبت نام"><span> ثبت نام </span></a></div>' ?>
                    <div class="modal fade" id="login_form_1" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog block-popup-login">
                            <a href="javascript:void(0)" title="بستن" class="close close-login" data-dismiss="modal"><i
                                        class="fas fa-times"></i></a>
                            <div class="tt_popup_login"><strong>عضویت یا ورود</strong></div>
                            <?php get_template_part('woocommerce/myaccount/login-form'); ?>
                        </div>
                    </div>
        <?php }} else { ?>
            <div class="div-logined">
                <?php
                $user_id = get_current_user_id();
                $user_info = get_userdata($user_id);
                $user_name = $user_info->display_name;
                ?>
                سلام <?php echo $user_name ?>,
                <a href="<?php echo wp_logout_url(home_url('/')); ?>" title="خروج" class="logout"> خروج </a>
            </div>
        <?php } ?>
    </div>
    <?php } ?>
</div>

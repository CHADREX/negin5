<?php do_action( 'before' ); ?>
<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?>
<?php global $woocommerce; ?>
<div class="top-login pull-left">
	<?php if ( ! is_user_logged_in() ) {
    if (is_plugin_active('digits/digit.php'))
    {
        echo "<div>" . do_shortcode('[dm-login-modal]') . " | " . do_shortcode('[dm-signup-modal]') . "</div>";

    }else {?>

	<ul style="list-style: none;">
		<li>
		    	<?php echo '<a href="javascript:void(0);" data-toggle="modal" data-target="#login_form_1"><span> وارد شوید </span></a> <span>  یا </span> <a href="'. get_permalink( get_option('woocommerce_myaccount_page_id') ).'" class="register" title="ثبت نام"><span> ثبت نام کنید</span></a>'?>
 <div class="modal fade" id="login_form_1" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog block-popup-login">
		<a href="javascript:void(0)" title="بستن" class="close close-login" data-dismiss="modal"><i class="fas fa-times"></i></a>
		<div class="tt_popup_login"><strong>عضویت یا ورود</strong></div>
		<?php get_template_part('woocommerce/myaccount/login-form'); ?>
	</div>
</div>
		</li>
	</ul>
	<?php} } else{?>
		<div class="div-logined">
			<?php
				$user_id = get_current_user_id();
				$user_info = get_userdata( $user_id );
				$user_name = $user_info->display_name;
			?>
			سلام <?php echo $user_name ?>,
			<a href="<?php echo wp_logout_url( home_url('/') ); ?>" title="خروج" class="logout"> خروج </a>
		</div>
	<?php } ?>
</div>
<?php } ?>

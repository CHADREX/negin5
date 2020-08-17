
<?php get_template_part('header'); ?>
<?php $sidebar_template = zanbil_options()->getCpanelValue('sidebar_blog') ;?>
<?php zanbil_breadcrumb_title(); ?>

<div class="container">
	<div class="row">
		<?php if ( is_active_sidebar_ZANBIL('left-blog') && $sidebar_template != 'right_sidebar' && $sidebar_template !='full' ):
		?>
		<aside id="left" class="sidebar col-lg-3 col-md-4 col-sm-4">
			<?php dynamic_sidebar('left-blog'); ?>
		</aside>
		<?php endif; ?>

		<div class="single main <?php zanbil_content_blog(); ?>" >
			<?php get_template_part('templates/content', 'single');	?>
		</div>
		<?php if ( is_active_sidebar_ZANBIL('right-blog') && $sidebar_template !='left_sidebar' && $sidebar_template !='full' ):
		?>
		<aside id="right" class="sidebar col-lg-3 col-md-4 col-sm-4">
			<?php dynamic_sidebar('right-blog'); ?>
		</aside>
		<?php endif; ?>
	</div>	
</div>
<?php get_template_part('footer'); ?>

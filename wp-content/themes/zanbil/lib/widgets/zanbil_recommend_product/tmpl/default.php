<?php 
	global $woocommerce;
	$number    		= isset( $instance['numberposts'] ) ? intval($instance['numberposts']) : 5;
	
	$args = array(
	'post_type'		=> 'product',
	'meta_key'		=> 'recommend_product',
	'meta_value'	=> 'yes',
	'showposts'		=> $number );
	$loop = new wp_query( $args );
	if( $loop -> have_posts() ) {	
?>
	<div id="<?php echo esc_attr( $widget_id ); ?>" class="sw-recommend-product">
		<ul class="list-unstyled">
			<?php while ($loop->have_posts()) : $loop->the_post();
			global $product, $post, $wpdb, $average;
			$count = $wpdb->get_var($wpdb->prepare("
				SELECT COUNT(meta_value) FROM $wpdb->commentmeta
				LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
				WHERE meta_key = 'rating'
				AND comment_post_ID = %d
				AND comment_approved = '1'
				AND meta_value > 0
			",$post->ID));

			$rating = $wpdb->get_var($wpdb->prepare("
				SELECT SUM(meta_value) FROM $wpdb->commentmeta
				LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
				WHERE meta_key = 'rating'
				AND comment_post_ID = %d
				AND comment_approved = '1'
			",$post->ID));
			?>
			<li class="clearfix">
				<div class="item-img">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>">
						<?php if( has_post_thumbnail() ){  
							echo (get_the_post_thumbnail( $loop->post->ID, 'shop_thumbnail')) ? get_the_post_thumbnail( $loop->post->ID, 'shop_thumbnail') : '<img src="'.get_template_directory_uri().'/assets/img/placeholder/shop_thumbnail.png" alt="No thumb"/>' ;
						}else{ 
							echo '<img src="'.get_template_directory_uri().'/assets/img/placeholder/shop_thumbnail.png" alt="No thumb"/>' ;
						} ?>
					</a>
				</div>
				<div class="item-content">
					<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a></h4>
					<p><?php echo $product->get_price_html(); ?></p>
					<?php
						if( $count > 0 ){
							$average = number_format($rating / $count, 1);
					?>
						<div class="star"><span style="width: <?php echo ($average*14).'px'; ?>"></span></div>
						
					<?php } else { ?>
					
						<div class="star"></div>
						
					<?php } ?>					
					<div class="review">
						<span><?php echo $count; ?> <?php esc_html_e(' review(s)', 'zanbil'); ?></span>
					</div>
				</div>
			</li>
			<?php endwhile; ?>
		</ul>
	</div>
<?php
}
?>
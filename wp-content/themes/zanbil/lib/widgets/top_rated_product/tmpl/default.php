<?php 
	global $woocommerce;
	$number    		= isset( $instance['numberposts'] ) ? intval($instance['numberposts']) : 5;

	add_filter( 'posts_clauses',  array( $woocommerce->query, 'order_by_rating_post_clauses' ) );

	$query_args = array('posts_per_page' => $number, 'no_found_rows' => 1, 'post_status' => 'publish', 'post_type' => 'product' );

	$query_args['meta_query'] = $woocommerce->query->get_meta_query();

	$top_rated_posts = new WP_Query( $query_args );

	if ($top_rated_posts->have_posts()) :
?>		<div id="<?php echo esc_attr( $widget_id ); ?>" class="sw-top-rated-product">
			<ul class="list-unstyled">
				<?php while ($top_rated_posts->have_posts()) : $top_rated_posts->the_post();
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
								echo (get_the_post_thumbnail( $top_rated_posts->post->ID, 'shop_thumbnail' )) ? get_the_post_thumbnail( $top_rated_posts->post->ID, 'shop_thumbnail' ) : '<img src="'.get_template_directory_uri().'/assets/img/placeholder/shop_thumbnail.png" alt="No thumb"/>' ;
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
	endif;

	wp_reset_postdata();
	remove_filter( 'posts_clauses', array( $woocommerce->query, 'order_by_rating_post_clauses' ) );
?>
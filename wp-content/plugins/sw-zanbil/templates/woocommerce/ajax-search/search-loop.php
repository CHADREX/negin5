<div class="list-group search-result-body">
    <?php if ( !empty( $loop ) && $loop->have_posts() ) : ?>
        <?php while ( $loop->have_posts() ) : ?>
            <?php $loop->the_post(); ?>
            <?php
            $product = wc_get_product( $loop->post->ID );
            ?>
            <a href="<?= get_permalink( $loop->post->ID ) ?>" class="list-group-item search-item"><img src="<?php echo get_the_post_thumbnail_url($loop->post->ID , 'thumbnail'); ?>" class="img-responsive" alt=""/><?php the_title() ?> <strong><?php echo $product->get_price_html(); ?></strong></a>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
    <?php elseif ( isset( $filters ) ): ?>
        <a href="<?= site_url( "?search_category={$filters['categories']}&s={$filters['search']}&search_posttype=product" ) ?>" class="list-group-item search-item search-keyword-link">&#1606;&#1605;&#1575;&#1740;&#1588; &#1607;&#1605;&#1607; &#1606;&#1578;&#1575;&#1740;&#1580; &#1576;&#1585;&#1575;&#1740;
            <span class="search-keyword"><?= $filters['search'] ?></span></a>
    <?php endif; ?>
</div>



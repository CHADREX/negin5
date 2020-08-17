<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

?>

    <div class="page-content-wrapper">
		<?php
		while ( have_posts() ) : the_post();
			the_content();
		endwhile;
		?>
    </div>


<?php

get_footer();

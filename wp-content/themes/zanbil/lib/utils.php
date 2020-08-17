<?php
/**
 * Theme wrapper
 *
 * @link http://scribu.net/wordpress/theme-wrappers.html
 */

/**
 * Page titles
 */
function zanbil_title() {
	if (is_home()) {
		if (get_option('page_for_posts', true)) {
			echo get_the_title(get_option('page_for_posts', true));
		} else {
			esc_html_e('Latest Posts', 'zanbil');
		}
	} elseif (is_archive()) {
		$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
		if ($term) {
			echo $term->name;
		} elseif (is_post_type_archive()) {
			echo get_queried_object()->labels->name;
		} elseif (is_day()) {
			printf(__('Daily Archives: %s', 'zanbil'), get_the_date());
		} elseif (is_month()) {
			printf(__('Monthly Archives: %s', 'zanbil'), get_the_date('F Y'));
		} elseif (is_year()) {
			printf(__('Yearly Archives: %s', 'zanbil'), get_the_date('Y'));
		} elseif (is_author()) {
			printf(__('Author Archives: %s', 'zanbil'), get_the_author());
		} else {
			single_cat_title();
		}
	} elseif (is_search()) {
		printf(__('Search Results for <small>%s</small>', 'zanbil'), get_search_query());
	} elseif (is_404()) {
		esc_html_e('Not Found', 'zanbil');
	} else {
		the_title();
	}
}


/**
 * Return WordPress subdirectory if applicable
 */
function wp_base_dir() {
	preg_match('!(https?://[^/|"]+)([^"]+)?!', home_url( '/' ), $matches);
	if (count($matches) === 3) {
		return end($matches);
	} else {
		return '';
	}
}


/**
 * Opposite of built in WP functions for trailing slashes
 */
function leadingslashit($string) {
	return '/' . unleadingslashit($string);
}

function unleadingslashit($string) {
	return ltrim($string, '/');
}

function add_filters($tags, $function) {
	foreach($tags as $tag) {
		add_filter($tag, $function);
	}
}

function is_element_empty($element) {
	$element = trim($element);
	return empty($element) ? false : true;
}

function is_customize(){
	return isset($_POST['customized']) && ( isset($_POST['customize_messenger_chanel']) || isset($_POST['wp_customize']) );
}
function zanbil_content_blog(){

    $sidebar_template 		= zanbil_options() -> getCpanelValue('sidebar_blog');
    if( is_active_sidebar_ZANBIL('left-blog') && is_active_sidebar_ZANBIL('right-blog') && $sidebar_template == 'lr_sidebar' ){
        $content_span_class 	= 6;
        $content_span_md_class 	= 4;
        $content_span_sm_class 	= 4;
    } elseif( is_active_sidebar_ZANBIL('left-blog') && $sidebar_template == 'left_sidebar' ) {
        $content_span_class 	= 9 ;
        $content_span_md_class 	= 8 ;
        $content_span_sm_class 	= 8 ;
    } elseif( is_active_sidebar_ZANBIL('right-blog') && $sidebar_template == 'right_sidebar' ) {
        $content_span_class 	= 9;
        $content_span_md_class 	= 8 ;
        $content_span_sm_class 	= 8 ;
    } else {
        $content_span_class 	= 12;
        $content_span_md_class 	= 12;
        $content_span_sm_class 	= 12;
    }
    $classes = array( '' );

    $classes[] = 'col-lg-'.$content_span_class.' col-md-'.$content_span_md_class .' col-sm-'.$content_span_sm_class . ' col-xs-12';

    echo  join( ' ', $classes ) ;
}

/**
 * Create HTML list checkbox of nav menu items.
 */

class ZANBIL_Menu_Checkbox extends Walker_Nav_Menu{

	private $menu_slug;

	public function __construct( $menu_slug = '') {
		$this->menu_slug = $menu_slug;
	}

	public function init($items, $args = array()) {
		$args = array( $items, 0, $args );

		return call_user_func_array( array($this, 'walk'), $args );
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$item_output = '<label for="' . $this->menu_slug . '-' . $item->post_name . '-' . $item->ID . '">';
		$item_output .= '<input type="checkbox" name="' . $this->menu_slug . '_'  . $item->post_name .  '_' . $item->ID . '" ' . $this->menu_slug.$item->post_name.$item->ID . ' id="' . $this->menu_slug . '-'  . $item->post_name . '-' . $item->ID . '" /> ' . $item->title;
		$item_output .= '</label>';

		$output .= $item_output;
	}

	public function is_menu_item_active($menu_id, $item_ids) {
		global $wp_query;

		$queried_object = $wp_query->get_queried_object();
		$queried_object_id = (int) $wp_query->queried_object_id;

		$items = wp_get_nav_menu_items($menu_id);
		$items_current = array();
		$possible_object_parents = array();
		$home_page_id = (int) get_option( 'page_for_posts' );

		if ( $wp_query->is_singular && ! empty( $queried_object->post_type ) && ! is_post_type_hierarchical( $queried_object->post_type ) ) {
			foreach ( (array) get_object_taxonomies( $queried_object->post_type ) as $taxonomy ) {
				if ( is_taxonomy_hierarchical( $taxonomy ) ) {
					$terms = wp_get_object_terms( $queried_object_id, $taxonomy, array( 'fields' => 'ids' ) );
					if ( is_array( $terms ) ) {
						$possible_object_parents = array_merge( $possible_object_parents, $terms );
					}
				}
			}
		}

		foreach ($items as $item) {

			if (key_exists($item->ID, $item_ids)) {
				$items_current[] = $item;
			}
		}

		foreach ($items_current as $item) {

			if ( ($item->object_id == $queried_object_id) && (
						( ! empty( $home_page_id ) && 'post_type' == $item->type && $wp_query->is_home && $home_page_id == $item->object_id ) ||
						( 'post_type' == $item->type && $wp_query->is_singular ) ||
						( 'taxonomy' == $item->type && ( $wp_query->is_category || $wp_query->is_tag || $wp_query->is_tax ) && $queried_object->taxonomy == $item->object )
					)
				)
				return true;
			elseif ( $wp_query->is_singular &&
					'taxonomy' == $item->type &&
					in_array( $item->object_id, $possible_object_parents ) ) {
				return true;
			}
		}

		return false;
	}
}
/**
 * Check widget display
 * */
function check_wdisplay ($widget_display){
	$widget_display = json_decode(json_encode($widget_display), true);
	$ZANBIL_Menu_Checkbox = new ZANBIL_Menu_Checkbox;
	if ( isset($widget_display['display_select']) && $widget_display['display_select'] == 'all' ) {
		return true;
	}else{
	if ( in_array( 'sitepress-multilingual-cms/sitepress.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		if(  isset($widget_display['display_language']) && strcmp($widget_display['display_language'], ICL_LANGUAGE_CODE) != 0  ){
			return false;
		}
	}
	if ( isset($widget_display['display_select']) && $widget_display['display_select'] == 'if_selected' ) {

		if (isset($widget_display['checkbox'])) {

			if (isset($widget_display['checkbox']['users'])) {
				global $user_ID;

				foreach ($widget_display['checkbox']['users'] as $key => $value) {

					if ( ($key == 'login' && $user_ID) || ($key == 'logout' && !$user_ID) ){

						if (isset($widget_display['checkbox']['general'])) {
							foreach ($widget_display['checkbox']['general'] as $key => $value) {
								$is = 'is_'.$key;
								if ( $is() === true ) return true;
							}
						}

						if (isset($widget_display['taxonomy-slugs'])) {

							$taxonomy_slugs = preg_split('/[\s,]/', $widget_display['taxonomy-slugs']);
							foreach ($taxonomy_slugs as $slug) {is_post_type_archive('product_cat');
								if (!empty($slug) && is_tax($slug) === true) {
									return true;
								}
							}

						}

						if (isset($widget_display['post-type'])) {
							$post_type = preg_split('/[\s,]/', $widget_display['post-type']);

							foreach ($post_type as $type) {
								if(is_archive()){
									if (!empty($type) && is_post_type_archive($type) === true) {
										return true;
									}
								}

								if($type!=ZANBIL_PRODUCT_TYPE)
								{
									if(!empty($type) && $type==ZANBIL_PRODUCT_DETAIL_TYPE && is_single() && get_post_type() != 'post'){
										return true;
									}else if (!empty($type) && is_singular($type) === true) {
										return true;
									}

								}
							}
						}

						if (isset($widget_display['catid'])) {
							$catid = preg_split('/[\s,]/', $widget_display['catid']);
							foreach ($catid as $id) {
								if (!empty($id) && is_category($id) === true) {
									return true;
								}
							}

						}

						if (isset($widget_display['postid'])) {
							$postid = preg_split('/[\s,]/', $widget_display['postid']);
							foreach ($postid as $id) {
								if (!empty($id) && (is_page($id) === true || is_single($id) === true) ) {
									return true;
								}
							}

						}

						if (isset($widget_display['checkbox']['menus'])) {

							foreach ($widget_display['checkbox']['menus'] as $menu_id => $item_ids) {

								if ( $ZANBIL_Menu_Checkbox->is_menu_item_active($menu_id, $item_ids) ) return true;
							}
						}
					}
				}
			}

			return false;

		} else return false ;

	} elseif ( isset($widget_display['display_select']) && $widget_display['display_select'] == 'if_no_selected' ) {

		if (isset($widget_display['checkbox'])) {

			if (isset($widget_display['checkbox']['users'])) {
				global $user_ID;

				foreach ($widget_display['checkbox']['users'] as $key => $value) {
					if ( ($key == 'login' && $user_ID) || ($key == 'logout' && !$user_ID) ) return false;
				}
			}

			if (isset($widget_display['checkbox']['general'])) {
				foreach ($widget_display['checkbox']['general'] as $key => $value) {
					$is = 'is_'.$key;
					if ( $is() === true ) return false;
				}
			}

			if (isset($widget_display['taxonomy-slugs'])) {
				$taxonomy_slugs = preg_split('/[\s,]/', $widget_display['taxonomy-slugs']);
				foreach ($taxonomy_slugs as $slug) {
					if (!empty($slug) && is_tax($slug) === true) {
						return false;
					}
				}

			}

			if (isset($widget_display['post-type'])) {
				$post_type = preg_split('/[\s,]/', $widget_display['post-type']);

				foreach ($post_type as $type) {
					if(is_archive()){
						if (!empty($type) && is_post_type_archive($type) === true) {
							return true;
						}
					}

					if($type!=ZANBIL_PRODUCT_TYPE)
					{
						if(!empty($type) && $type==ZANBIL_PRODUCT_DETAIL_TYPE && is_single() && get_post_type() != 'post'){
							return true;
						}else if (!empty($type) && is_singular($type) === true) {
							return true;
						}

					}
				}
			}



			if (isset($widget_display['catid'])) {
				$catid = preg_split('/[\s,]/', $widget_display['catid']);
				foreach ($catid as $id) {
					if (!empty($id) && is_category($id) === true) {
						return false;
					}
				}

			}

			if (isset($widget_display['postid'])) {
				$postid = preg_split('/[\s,]/', $widget_display['postid']);
				foreach ($postid as $id) {
					if (!empty($id) && (is_page($id) === true || is_single($id) === true)) {
						return false;
					}
				}

			}

			if (isset($widget_display['checkbox']['menus'])) {

				foreach ($widget_display['checkbox']['menus'] as $menu_id => $item_ids) {

					if ( $ZANBIL_Menu_Checkbox->is_menu_item_active($menu_id, $item_ids) ) return false;
				}
			}
		} else return false ;
	}
	}
	return true ;
}


/**
 *  Is active sidebar
 * */
function is_active_sidebar_ZANBIL($index) {
	global $wp_registered_widgets;

	$index = ( is_int($index) ) ? "sidebar-$index" : sanitize_title($index);
	$sidebars_widgets = wp_get_sidebars_widgets();
	if (!empty($sidebars_widgets[$index])) {
		foreach ($sidebars_widgets[$index] as $i => $id) {
			$id_base = preg_replace( '/-[0-9]+$/', '', $id );

			if ( isset($wp_registered_widgets[$id]) ) {
				$widget = new WP_Widget($id_base, $wp_registered_widgets[$id]['name']);

				if ( preg_match( '/' . $id_base . '-([0-9]+)$/', $id, $matches ) )
					$number = $matches[1];

				$instances = get_option($widget->option_name);

				if ( isset($instances) && isset($number) ) {
					$instance = $instances[$number];

					if ( isset($instance['widget_display']) && check_wdisplay($instance['widget_display']) == false ) {
						unset($sidebars_widgets[$index][$i]);
					}
				}
			}
		}

		if ( empty($sidebars_widgets[$index]) ) return false;

	} else return false;

	return true;
}

/**
 * Use Bootstrap's media object for listing comments
 *
 * @link http://twitter.github.com/bootstrap/components.html#media
 */

function zanbil_get_avatar($avatar) {
	$avatar = str_replace("class='avatar", "class='avatar pull-left media-object", $avatar);
	return $avatar;
}
add_filter('get_avatar', 'zanbil_get_avatar');

function excerpt($limit) {
  $excerpt = explode(' ', get_the_content(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
/*Product Meta*/
add_action("admin_init", "post_init");
add_action( 'save_post', 'zanbil_product_save_meta', 10, 1 );
function post_init(){
	add_meta_box("zanbil_product_meta", "محصول پیشنهادی", "zanbil_product_meta", "product", "normal", "low");
}
function zanbil_product_meta(){
	global $post;
	$value = get_post_meta( $post->ID, 'new_product', true );
	$recommend_product = get_post_meta( $post->ID, 'recommend_product', true );
?>
	<p><label><b>محصول پیشنهادی:</b></label> &nbsp;&nbsp;
	<input type="checkbox" name="recommend_product" value="yes" <?php if(esc_attr($recommend_product) == 'yes'){ echo "CHECKED"; }?> /></p>
<?php }
function zanbil_product_save_meta(){
	global $post;
	if( isset( $_POST['recommend_product'] ) && $_POST['recommend_product'] != '' ){
		update_post_meta($post->ID, 'recommend_product', $_POST['recommend_product']);
	}else{
		update_post_meta($post->ID, 'recommend_product', 'No');
	}
}
/*end product meta*/
remove_action( 'get_product_search_form', 'get_product_search_form', 10);
add_action('get_product_search_form', 'zanbil_search_product_form', 10);
function zanbil_search_product_form( ){
	$search_form_template = locate_template( 'product-searchform.php' );
	if ( '' != $search_form_template  ) {
		require $search_form_template;
		return;
	}

	$form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">
		<div class="product-search">
			<div class="product-search-inner">
				<input type="text" class="search-text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_attr__( 'Search for products', 'zanbil' ) . '" />
				<input type="submit" class="search-submit" id="searchsubmit" value="'. esc_attr__( 'Go', 'zanbil' ) .'" />
				<input type="hidden" name="post_type" value="product" />
			</div>
		</div>
	</form>';

	return apply_filters( 'zanbil_search_product_form', $form );
}

add_filter( 'widget_tag_cloud_args', 'zanbil_tag_clound' );
function zanbil_tag_clound($args){
	$args['largest'] = 8;
	return $args;
}

/**
 * This class handles the Breadcrumbs generation and display
 */
class Zanbil_Breadcrumbs {

	/**
	 * Wrapper function for the breadcrumb so it can be output for the supported themes.
	 */
	function breadcrumb_output() {
		$this->breadcrumb( '<div class="breadcumbs">', '</div>' );
	}

	/**
	 * Get a term's parents.
	 *
	 * @param object $term Term to get the parents for
	 * @return array
	 */
	function get_term_parents( $term ) {
		$tax     = $term->taxonomy;
		$parents = array();
		while ( $term->parent != 0 ) {
			$term      = get_term( $term->parent, $tax );
			$parents[] = $term;
		}
		return array_reverse( $parents );
	}

	/**
	 * Display or return the full breadcrumb path.
	 *
	 * @param string $before  The prefix for the breadcrumb, usually something like "You're here".
	 * @param string $after   The suffix for the breadcrumb.
	 * @param bool   $display When true, echo the breadcrumb, if not, return it as a string.
	 * @return string
	 */
	function breadcrumb( $before = '', $after = '', $display = true ) {
		$options = array('breadcrumbs-home' => esc_html__( 'Home', 'zanbil' ), 'breadcrumbs-blog-remove' => false, 'post_types-post-maintax' => '0');

		global $wp_query, $post;
		$on_front  = get_option( 'show_on_front' );
		$blog_page = get_option( 'page_for_posts' );

		$links = array(
			array(
				'url'  => get_home_url(),
				'text' => ( isset( $options['breadcrumbs-home'] ) && $options['breadcrumbs-home'] != '' ) ? $options['breadcrumbs-home'] : esc_html__( 'Home', 'zanbil' )
			)
		);

		if ( ( $on_front == "page" && is_front_page() ) || ( $on_front == "posts" && is_home() ) ) {

		} else if ( $on_front == "page" && is_home() ) {
			$links[] = array( 'id' => $blog_page );
		} else if ( is_singular() ) {
			$tax = get_object_taxonomies( $post->post_type );
			if ( 0 == $post->post_parent ) {
				if ( isset( $tax ) && count( $tax ) > 0 ) {
					$main_tax = $tax[0];
					if( $post->post_type == 'product' ){
						$main_tax = 'product_cat';
					}
					$terms    = wp_get_object_terms( $post->ID, $main_tax );

					if ( count( $terms ) > 0 ) {
						// Let's find the deepest term in this array, by looping through and then unsetting every term that is used as a parent by another one in the array.
						$terms_by_id = array();
						foreach ( $terms as $term ) {
							$terms_by_id[$term->term_id] = $term;
						}
						foreach ( $terms as $term ) {
							unset( $terms_by_id[$term->parent] );
						}

						// As we could still have two subcategories, from different parent categories, let's pick the first.
						reset( $terms_by_id );
						$deepest_term = current( $terms_by_id );

						if ( is_taxonomy_hierarchical( $main_tax ) && $deepest_term->parent != 0 ) {
							foreach ( $this->get_term_parents( $deepest_term ) as $parent_term ) {
								$links[] = array( 'term' => $parent_term );
							}
						}
						$links[] = array( 'term' => $deepest_term );
					}

				}
			} else {
				if ( isset( $post->ancestors ) ) {
					if ( is_array( $post->ancestors ) )
						$ancestors = array_values( $post->ancestors );
					else
						$ancestors = array( $post->ancestors );
				} else {
					$ancestors = array( $post->post_parent );
				}

				// Reverse the order so it's oldest to newest
				$ancestors = array_reverse( $ancestors );

				foreach ( $ancestors as $ancestor ) {
					$links[] = array( 'id' => $ancestor );
				}
			}
			$links[] = array( 'id' => $post->ID );
		} else {
			if ( is_post_type_archive() ) {
				$links[] = array( 'ptarchive' => get_post_type() );
			} else if ( is_tax() || is_tag() || is_category() ) {
				$term = $wp_query->get_queried_object();

				if ( is_taxonomy_hierarchical( $term->taxonomy ) && $term->parent != 0 ) {
					foreach ( $this->get_term_parents( $term ) as $parent_term ) {
						$links[] = array( 'term' => $parent_term );
					}
				}

				$links[] = array( 'term' => $term );
			} else if ( is_date() ) {
				$bc = esc_html__( 'Archives for', 'zanbil' );

				if ( is_day() ) {
					global $wp_locale;
					$links[] = array(
						'url'  => get_month_link( get_query_var( 'year' ), get_query_var( 'monthnum' ) ),
						'text' => $wp_locale->get_month( get_query_var( 'monthnum' ) ) . ' ' . get_query_var( 'year' )
					);
					$links[] = array( 'text' => $bc . " " . get_the_date() );
				} else if ( is_month() ) {
					$links[] = array( 'text' => $bc . " " . single_month_title( ' ', false ) );
				} else if ( is_year() ) {
					$links[] = array( 'text' => $bc . " " . get_query_var( 'year' ) );
				}
			} elseif ( is_author() ) {
				$bc = esc_html__( 'Archives for', 'zanbil' );
				$user    = $wp_query->get_queried_object();
				$links[] = array( 'text' => $bc . " " . esc_html( $user->display_name ) );
			} elseif ( is_search() ) {
				$bc = esc_html__( 'You searched for', 'zanbil' );
				$links[] = array( 'text' => $bc . ' "' . esc_html( get_search_query() ) . '"' );
			} elseif ( is_404() ) {
				$crumb404 = esc_html__( 'Error 404: Page not found', 'zanbil' );
				$links[] = array( 'text' => $crumb404 );
			}
		}

		$output = $this->create_breadcrumbs_string( $links );

		if ( $display ) {
			echo $before . $output . $after;
			return true;
		} else {
			return $before . $output . $after;
		}
	}

	/**
	 * Take the links array and return a full breadcrumb string.
	 *
	 * Each element of the links array can either have one of these keys:
	 *       "id"            for post types;
	 *    "ptarchive"  for a post type archive;
	 *    "term"         for a taxonomy term.
	 * If either of these 3 are set, the url and text are retrieved. If not, url and text have to be set.
	 *
	 * @link http://support.google.com/webmasters/bin/answer.py?hl=en&answer=185417 Google documentation on RDFA
	 *
	 * @param array  $links   The links that should be contained in the breadcrumb.
	 * @param string $wrapper The wrapping element for the entire breadcrumb path.
	 * @param string $element The wrapping element for each individual link.
	 * @return string
	 */
	function create_breadcrumbs_string( $links, $wrapper = 'ul', $element = 'li' ) {
		global $paged;

		$output = '';

		foreach ( $links as $i => $link ) {

			if ( isset( $link['id'] ) ) {
				$link['url']  = get_permalink( $link['id'] );
				$link['text'] = strip_tags( get_the_title( $link['id'] ) );
			}

			if ( isset( $link['term'] ) ) {
				$link['url']  = get_term_link( $link['term'] );
				$link['text'] = $link['term']->name;
			}

			if ( isset( $link['ptarchive'] ) ) {
				$post_type_obj = get_post_type_object( $link['ptarchive'] );
				$archive_title = $post_type_obj->labels->menu_name;
				$link['url']  = get_post_type_archive_link( $link['ptarchive'] );
				$link['text'] = $archive_title;
			}

			$link_class = '';
			if ( isset( $link['url'] ) && ( $i < ( count( $links ) - 1 ) || $paged ) ) {
				$link_output = '<a href="' . esc_url( $link['url'] ) . '" '.' itemprop="item"'.' >' .'<span itemprop="name"> ' .esc_html( $link['text'] ) . ' </span>' . '</a><span class="go-page"><i class="fa fa-angle-left" aria-hidden="true"></i></span>';
			} else {
				$link_class = ' class="active" ';
				$link_output = '<span>' . esc_html( $link['text'] ) . '</span>';
			}

			$element = esc_attr(  $element );
			$element_output = '<' . $element .' itemprop="itemListElement"  itemtype="http://schema.org/ListItem"' . $link_class . '>' . $link_output . '</' . $element . '>';

			$output .=  $element_output;

			$class = ' class="breadcrumb" ';
		}

		return '<' . $wrapper .' itemscope  itemtype="http://schema.org/BreadcrumbList"' . $class . '>' . $output . '</' . $wrapper . '>';
	}

}

global $yabreadcrumb;
$yabreadcrumb = new Zanbil_Breadcrumbs();

if ( !function_exists( 'zanbil_breadcrumb' ) ) {
	/**
	 * Template tag for breadcrumbs.
	 *
	 * @param string $before  What to show before the breadcrumb.
	 * @param string $after   What to show after the breadcrumb.
	 * @param bool   $display Whether to display the breadcrumb (true) or return it (false).
	 * @return string
	 */
	function zanbil_breadcrumb( $before = '', $after = '', $display = true ) {
		global $yabreadcrumb;
		return $yabreadcrumb->breadcrumb( $before, $after, $display );
	}
}

/* Menu Sticky */
add_action( 'wp_footer', 'zanbil_sticky_menu', 100 );
function zanbil_sticky_menu(){
	    $output = '';
		$output .= '<script type="text/javascript">';
		$output .= '(function($) {';

		$output .= 'if(($(window).width() > 1199)){';

		$output .= 'var sticky_navigation_offset_top = $(".yt-header-under-2").offset().top;';
		$output .= 'var sticky_navigation = function(){';
		$output .= 'var scroll_top = $(window).scrollTop();';
		$output .= 'if (scroll_top > sticky_navigation_offset_top) {';
		$output .= '$(".yt-header-under-2").addClass("sticky-menu");';
		$output .= '$(".yt-header-under-2").css({ "position": "fixed", "top":0, "left":0, "right" : 0, "z-index": 8000 });';
		$output .= '} else {';
		$output .= '$(".yt-header-under-2").removeClass("sticky-menu");';
		$output .= '$(".yt-header-under-2").css({ "position": "static" });';
		$output .= '}';
		$output .= '};';
		$output .= 'sticky_navigation();';
		$output .= '$(window).scroll(function() {';
		$output .= 'sticky_navigation();';
		$output .= '});';
		$output .= '}';
		$output .= '}(jQuery));';
		$output .= '</script>';
		echo $output;
}
/* Popup Newsletter */
add_action( 'wp_footer', 'zanbil_popup', 101 );
function zanbil_popup(){
	$zanbil_popup	 		= zanbil_options()->getCpanelValue( 'popup_active' );
	$zanbil_popup_content 	= zanbil_options()->getCpanelValue('popup_shortcode');
	if( $zanbil_popup ){
		echo stripslashes( do_shortcode( $zanbil_popup_content ) );
?>
		<script type="text/javascript">
			(function($) {
				$(document).ready(function() {
					var $width = $(this).width();
					if( $width > 1199 ){
					var check_cookie = $.cookie('subscribe_popup');
					if(check_cookie == null || check_cookie == 'shown') {
						 popupNewsletter();
					 }
					$('#subscribe_popup input#popup_check').on('click', function(){
						if($(this).parent().find('input:checked').length){
							var check_cookie = $.cookie('subscribe_popup');
						   if(check_cookie == null || check_cookie == 'shown') {
								$.cookie('subscribe_popup','dontshowitagain');
							}
							else
							{
								$.cookie('subscribe_popup','shown');
								popupNewsletter();
							}
						} else {
							$.cookie('subscribe_popup','shown');
						}
					});
				}});

				function popupNewsletter() {
					jQuery.fancybox({
						href: '#subscribe_popup',
						autoResize: true

					});
					jQuery('#subscribe_popup').trigger('click');
					jQuery('#subscribe_popup').parents('.fancybox-overlay').addClass('popup-fancy');
				};
			}(jQuery));
		</script>
<?php
	}
}

/*
** Breadcrumb Custom with title
*/
function zanbil_breadcrumb_title(){
	$maintaince_attr = ( zanbil_options()->getCpanelValue( 'bg_breadcrumb' ) != '' ) ? 'style="background: url( '. esc_url( zanbil_options()->getCpanelValue( 'bg_breadcrumb' ) ) .' )"' : '';
?>
<div class="container zanbil_breadcrumbs">
	<div class="row">
	    	<div class="listing-title" <?php echo $maintaince_attr?>>
				<?php
					if( class_exists( 'WooCommerce' ) ) {
						if( is_woocommerce() && !is_product() ) {
							echo '<h1><span>';
							woocommerce_page_title();
							echo '</span></h1>';
						}
						elseif(is_product()){
							echo '<p><span>';
							zanbil_title();
							echo '</p></span>';
						}
						else{
							echo '<h1><span>';
							zanbil_title();
							echo '</h1></span>';
						}
					}
				?>
				<?php
				if (!is_front_page() ) {
						if (function_exists('zanbil_breadcrumb')){
							zanbil_breadcrumb('<div class="breadcrumbs custom-font theme-clearfix">', '</div>');
						}
					}
				?>
			</div>
	</div>
</div>
<?php
}
// PopUp
function zanbil_modal( $atts ){
    extract(shortcode_atts(array(
        'link' => '',
        'background' => ''
    ), $atts));
    ob_start();
    ?>

    <div id="subscribe_popup" class="subscribe-popup" <?php echo ( $background != '' ) ? 'style="background: url('. esc_attr( $background ) .') no-repeat;background-size:contain;"' : '' ?>>
        <div class="subscribe-popup-container">
            <a href="<?php echo esc_html( $link ); ?>" style="position: absolute;left: 0;top: 0;right: 0;bottom: 40px"></a>
            <div class="subscribe-checkbox">
                <input id="popup_check" name="popup_check" type="checkbox" />
                <label>عدم نمایش این پنجره در بازدیدهای بعدی</label>
            </div>
        </div>
    </div>

    <?php
    $output = ob_get_clean();
    return $output;

}
add_shortcode('zanbil_modal','zanbil_modal');

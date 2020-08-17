<?php
$lib_dir = trailingslashit( str_replace( '\\', '/', get_template_directory() . '/lib/' ) );

if( !defined('ZANBIL_DIR') ){
	define( 'ZANBIL_DIR', $lib_dir );
}

if( !defined('ZANBIL_URL') ){
	define( 'ZANBIL_URL', trailingslashit( get_template_directory_uri() ) . '/lib/' );
}

if( !defined('ZANBIL_OPTIONS_URL') ){
	define( 'ZANBIL_OPTIONS_URL', trailingslashit( get_template_directory_uri() ) . 'lib/options/' ); 
}

defined('ZANBIL_THEME') or die;

if (!isset($content_width)) { $content_width = 940; }

define("ZANBIL_PRODUCT_TYPE","product");
define("ZANBIL_PRODUCT_DETAIL_TYPE","product_detail");

require_once( get_template_directory().'/lib/options.php' );
function Zanbil_Options_Setup(){
	global $zanbil_options, $options, $options_args;

	$options = array();
	$options[] = array(
			'title' => esc_html__('عمومی', 'zanbil'),
			'desc' => wp_kses( __(' ', 'zanbil'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it blank for default.
			'icon' => ZANBIL_URL.'/options/img/glyphicons/glyphicons_019_cogwheel.png',
			//Lets leave this as a blank section, no options just some intro text set above.
			'fields' => array(
					array(
							'id' => 'scheme',
							'type' => 'radio_img',
							'title' => esc_html__('Color Scheme', 'zanbil'),
							'sub_desc' => esc_html__( 'یک رنگبندی را انتخاب کنید.رنگ بندی های جدید بزودی اضافه خواهند شد.', 'zanbil' ),
							'desc' => '',
							'options' => array(
											'default' => array('title' => 'پیشفرض (رنگ های جدید بزودی اضافه خواهند شد.)', 'img' => get_template_directory_uri().'/assets/img/default.png'),
											),//Must provide key => value(array:title|img) pairs for radio options
							'std' => 'default'
						),

					array(
							'id' => 'favicon',
							'type' => 'upload',
							'title' => esc_html__('Favicon Icon', 'zanbil'),
							'sub_desc' => esc_html__( 'Use the Upload button to upload the new favicon and get URL of the favicon. To config Favicon in WordPress 4.3 upward, please go to Appearance -> Customize', 'zanbil' ),
							'std' => get_template_directory_uri().'/assets/img/favicon.ico'
						),
					array(
							'id' => 'sitelogo',
							'type' => 'upload',
							'title' => esc_html__('Logo Image', 'zanbil'),
							'sub_desc' => esc_html__( 'Use the Upload button to upload the new logo and get URL of the logo', 'zanbil' ),
							'std' => ''
						),
				)
		);

	$options[] = array(
			'title' => esc_html__('چیدمان', 'zanbil'),
			'desc' => wp_kses( __(' ', 'zanbil'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it blank for default.
			'icon' => ZANBIL_URL.'/options/img/glyphicons/glyphicons_319_sort.png',
			//Lets leave this as a blank section, no options just some intro text set above.
			'fields' => array(
					array(
								'id' => 'layout',
								'type' => 'select',
								'title' => esc_html__('Box Layout', 'zanbil'),
								'sub_desc' => esc_html__( 'Select Layout Box or Wide', 'zanbil' ),
								'options' => array(
										'full' => esc_html__( 'پیشفرض', 'zanbil' ),
										),
								'std' => 'wide'
							),
					
					array(
							'id' => 'bg_box_img',
							'type' => 'upload',
							'title' => esc_html__('Background Box Image', 'zanbil'),
							'sub_desc' => '',
							'std' => ''
						),
					array(
							'id' => 'sidebar_left_expand',
							'type' => 'select',
							'title' => esc_html__('Left Sidebar Expand', 'zanbil'),
							'options' => array(
									'2' => '2/12',
									'3' => '3/12',
									'4' => '4/12',
									'5' => '5/12', 
									'6' => '6/12',
									'7' => '7/12',
									'8' => '8/12',
									'9' => '9/12',
									'10' => '10/12',
									'11' => '11/12',
									'12' => '12/12'
								),
							'std' => '3',
							'sub_desc' => esc_html__( 'Select width of left sidebar.', 'zanbil' ),
						),
					
					array(
							'id' => 'sidebar_right_expand',
							'type' => 'select',
							'title' => esc_html__('Right Sidebar Expand', 'zanbil'),
							'options' => array(
									'2' => '2/12',
									'3' => '3/12',
									'4' => '4/12',
									'5' => '5/12',
									'6' => '6/12',
									'7' => '7/12',
									'8' => '8/12',
									'9' => '9/12',
									'10' => '10/12',
									'11' => '11/12',
									'12' => '12/12'
								),
							'std' => '3',
							'sub_desc' => esc_html__( 'Select width of right sidebar medium desktop.', 'zanbil' ),
						),
						array(
							'id' => 'sidebar_left_expand_md',
							'type' => 'select',
							'title' => esc_html__('Left Sidebar Medium Desktop Expand', 'zanbil'),
							'options' => array(
									'2' => '2/12',
									'3' => '3/12',
									'4' => '4/12',
									'5' => '5/12',
									'6' => '6/12',
									'7' => '7/12',
									'8' => '8/12',
									'9' => '9/12',
									'10' => '10/12',
									'11' => '11/12',
									'12' => '12/12'
								),
							'std' => '4',
							'sub_desc' => esc_html__( 'Select width of left sidebar medium desktop.', 'zanbil' ),
						),
					array(
							'id' => 'sidebar_right_expand_md',
							'type' => 'select',
							'title' => esc_html__('Right Sidebar Medium Desktop Expand', 'zanbil'),
							'options' => array(
									'2' => '2/12',
									'3' => '3/12',
									'4' => '4/12',
									'5' => '5/12',
									'6' => '6/12',
									'7' => '7/12',
									'8' => '8/12',
									'9' => '9/12',
									'10' => '10/12',
									'11' => '11/12',
									'12' => '12/12'
								),
							'std' => '4',
							'sub_desc' => esc_html__( 'Select width of right sidebar.', 'zanbil' ),
						),
						array(
							'id' => 'sidebar_left_expand_sm',
							'type' => 'select',
							'title' => esc_html__('Left Sidebar Tablet Expand', 'zanbil'),
							'options' => array(
									'2' => '2/12',
									'3' => '3/12',
									'4' => '4/12',
									'5' => '5/12',
									'6' => '6/12',
									'7' => '7/12',
									'8' => '8/12',
									'9' => '9/12',
									'10' => '10/12',
									'11' => '11/12',
									'12' => '12/12'
								),
							'std' => '4',
							'sub_desc' => esc_html__( 'Select width of left sidebar tablet.', 'zanbil' ),
						),
					array(
							'id' => 'sidebar_right_expand_sm',
							'type' => 'select',
							'title' => esc_html__('Right Sidebar Tablet Expand', 'zanbil'),
							'options' => array(
									'2' => '2/12',
									'3' => '3/12',
									'4' => '4/12',
									'5' => '5/12',
									'6' => '6/12',
									'7' => '7/12',
									'8' => '8/12',
									'9' => '9/12',
									'10' => '10/12',
									'11' => '11/12',
									'12' => '12/12'
								),
							'std' => '4',
							'sub_desc' => esc_html__( 'Select width of right sidebar tablet.', 'zanbil' ),
						),				
				)
		);
	$options[] = array(
		'title' => esc_html__('هدر و فوتر', 'zanbil'),
			'desc' => wp_kses( __(' ', 'zanbil'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it blank for default.
			'icon' => ZANBIL_URL.'/options/img/glyphicons/glyphicons_336_read_it_later.png',
			//Lets leave this as a blank section, no options just some intro text set above.
			'fields' => array(
				 array(
							'id' => 'header_style',
							'type' => 'select',
							'title' => esc_html__('Header Style', 'zanbil'),
							'sub_desc' => esc_html__( 'Select Header style', 'zanbil' ),
							'options' => array(
									'default'  => esc_html__( 'هدر منقضی شده', 'zanbil' ),
									'style1'  => esc_html__( 'هدر آپدیت شده', 'zanbil' ),							
									),
							'std' => 'style1'
						),
				 array(
							'id' => 'footer_style',
							'type' => 'select',
							'title' => esc_html__('Footer Style', 'zanbil'),
							'sub_desc' => esc_html__( 'Select Footer style', 'zanbil' ),
							'options' => array(
							'default' => esc_html__( 'Default', 'zanbil' ),              
							),
							'std' => 'default'
				),
				 array(
							'id' => 'phone_number',
							'type' => 'text',
							'sub_desc' => esc_html__( 'Enter my phone', 'zanbil' ),
							'title' => esc_html__( 'My Phone.', 'zanbil' ),
							'std' => ''
						),
				 array(
					'id' => 'hot_deals',
					'type' => 'pages_select',
					'title' => esc_html__('Select Page On Menu', 'zanbil'),
					'sub_desc' => esc_html__( 'Select a page show on menu', 'zanbil' ),
					'std' => ''
				),
				array(
					'id' => 'footer_copyright',
					'type' => 'editor',
					'sub_desc' => '',
					'title' => esc_html__( 'Copyright text', 'zanbil' )
				),
				
			)
	);
	$options[] = array(
			'title' => esc_html__('تنظیمات منو', 'zanbil'),
			'desc' => wp_kses( __(' ', 'zanbil'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it blank for default.
			'icon' => ZANBIL_URL.'/options/img/glyphicons/glyphicons_157_show_lines.png',
			//Lets leave this as a blank section, no options just some intro text set above.
			'fields' => array(
				array(
						'id' => 'menu_type',
						'type' => 'select',
						'title' => esc_html__('Menu Type', 'zanbil'),
						'options' => array( 'dropdown' => 'Dropdown Menu', 'mega' => 'Mega Menu' ),
						'std' => 'mega'
					),
				array(
						'id' => 'menu_location',
						'type' => 'menu_location_multi_select',
						'title' => esc_html__('Theme Location', 'zanbil'),
						'sub_desc' => esc_html__( 'Select theme location to active mega menu and menu responsive.', 'zanbil' ),
						'std' => 'primary_menu'
					),				
				array(
						'id' => 'sticky_menu',
						'type' => 'checkbox',
						'title' => esc_html__('Active sticky menu', 'zanbil'),
						'sub_desc' => '',
						'desc' => '',
						'std' => '0'// 1 = on | 0 = off
					),	
			)
		);
	$options[] = array(
		'title' => esc_html__('تنظیمات بخش وبلاگ', 'zanbil'),
		'desc' => wp_kses( __('<p class="description">Select layout in blog listing page.</p>', 'zanbil'), array( 'p' => array( 'class' => array() ) ) ),
		//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
		//You dont have to though, leave it blank for default.
		'icon' => ZANBIL_URL.'/options/img/glyphicons/glyphicons_319_sort.png',
		//Lets leave this as a blank section, no options just some intro text set above.
		'fields' => array(
				array(
						'id' => 'sidebar_blog',
						'type' => 'select',
						'title' => esc_html__( 'Sidebar Blog Layout', 'zanbil' ),
						'options' => array(
								'full' => esc_html__( 'Full Layout', 'zanbil' ),		
								'left_sidebar'	=> esc_html__( 'Left Sidebar', 'zanbil' ),
								'right_sidebar' => esc_html__( 'Right Sidebar', 'zanbil' ),
								 'lr_sidebar'   => esc_html__( 'هر دو ساید بار فعال', 'zanbil' )						
						),
						'std' => 'left_sidebar',
						'sub_desc' => esc_html__( 'Select style sidebar blog', 'zanbil' ),
					),
					array(
						'id' => 'blog_layout',
						'type' => 'select',
						'title' => esc_html__('Layout blog', 'zanbil'),
						'options' => array(
								'list'	=>  esc_html__( 'List Layout', 'zanbil' ),
								'grid' =>  esc_html__( 'Grid Layout', 'zanbil' )								
						),
						'std' => 'list',
						'sub_desc' => esc_html__( 'Select style layout blog', 'zanbil' ),
					),
					array(
						'id' => 'blog_column',
						'type' => 'select',
						'title' => esc_html__('Blog column', 'zanbil'),
						'options' => array(								
								'2' => 'دو ستونه',
								'3' => 'سه ستونه',
								'4' => 'چهار ستونه'								
							),
						'std' => '2',
						'sub_desc' => esc_html__( 'Select style number column blog', 'zanbil' ),
					),
			)
	);	
	$options[] = array(
		'title' => esc_html__('صفحه فروشگاه', 'zanbil'),
		'desc' => wp_kses( __(' ', 'zanbil'), array( 'p' => array( 'class' => array() ) ) ),
		//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
		//You dont have to though, leave it blank for default.
		'icon' => ZANBIL_URL.'/options/img/glyphicons/glyphicons_319_sort.png',
		//Lets leave this as a blank section, no options just some intro text set above.
		'fields' => array(
			array(
				'id' => 'product_col_large',
				'type' => 'select',
				'title' => esc_html__('Product Listing column Desktop', 'zanbil'),
				'options' => array(
						'2' => '2',
						'3' => '3',
						'4' => '4',							
					),
				'std' => '4',
				'sub_desc' => esc_html__( 'Select number of column on Desktop Screen', 'zanbil' ),
			),
			array(
				'id' => 'product_col_medium',
				'type' => 'select',
				'title' => esc_html__('Product Listing column Medium Desktop', 'zanbil'),
				'options' => array(
						'2' => '2',
						'3' => '3',
						'4' => '4',							
					),
				'std' => '3',
				'sub_desc' => esc_html__( 'Select number of column on Medium Desktop Screen', 'zanbil' ),
			),
			array(
				'id' => 'product_col_sm',
				'type' => 'select',
				'title' => esc_html__('Product Listing column Tablet', 'zanbil'),
				'options' => array(
						'2' => '2',
						'3' => '3',
						'4' => '4',							
					),
				'std' => '2',
				'sub_desc' => esc_html__( 'Select number of column on Tablet Screen', 'zanbil' ),
			),
			array(
					'id' => 'sidebar_product',
					'type' => 'select',
					'title' => esc_html__( 'Sidebar Product Layout', 'zanbil' ),
					'options' => array(
							'left'	=> esc_html__( 'Left Sidebar', 'zanbil' ),
							'full' =>  esc_html__( 'Full Layout', 'zanbil' ),		
							'right' => esc_html__( 'Right Sidebar', 'zanbil' ),				
					),
					'std' => 'left',
					'sub_desc' => esc_html__( 'Select style sidebar product', 'zanbil' ),
				),
			array(
				'id' => 'product_quickview',
				'title' => esc_html__( 'Quickview', 'zanbil' ),
				'type' => 'checkbox',
				'sub_desc' => '',
				'desc' => esc_html__( 'Turn On/Off Product Quickview', 'zanbil' ),
				'std' => '1'
			),
			array(
				'id' => 'product_number',
				'type' => 'text',
				'title' => esc_html__('تعداد نمایش محصول در هر صفحه', 'zanbil'),
				'sub_desc' => '',
				'std' => 12
			),
		)
);		
	$options[] = array(
			'title' => esc_html__('سایر تنظیمات', 'zanbil'),
			'desc' => wp_kses( __(' ', 'zanbil'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it blank for default.
			'icon' => ZANBIL_URL.'/options/img/glyphicons/glyphicons_083_random.png',
			//Lets leave this as a blank section, no options just some intro text set above.
			'fields' => array(
					array(
							'id' => 'widget-advanced',
							'title' => esc_html__('Widget Advanced', 'zanbil'),
							'type' => 'checkbox',
							'sub_desc' => esc_html__( 'Turn on/off Widget Advanced', 'zanbil' ),
							'desc' => '',
							'std' => '1'
						),
					array(
							'id' => 'back_active',
							'type' => 'checkbox',
							'title' => esc_html__('Back to top', 'zanbil'),
							'sub_desc' => '',
							'desc' => '',
							'std' => '1'// 1 = on | 0 = off
							),	
					array(
							'id' => 'preload_active',
							'type' => 'checkbox',
							'title' => esc_html__('Active preload', 'zanbil'),
							'sub_desc' => esc_html__( 'Active preloading for theme', 'zanbil' ),
							'desc' => '',
							'std' => '1'// 1 = on | 0 = off
							),
					array(
							'id' => 'preload_active_page',
							'type' => 'pages_multi_select',
							'title' => esc_html__('Preload Active Page(s)', 'zanbil'),
							'sub_desc' => esc_html__( 'Select page(s) to active preload.', 'zanbil' ),
							'desc' => '',
							),						
					array(
							'id' => 'direction',
							'type' => 'select',
							'title' => esc_html__('Direction', 'zanbil'),
							'options' => array( 'ltr' => esc_html__( 'Left to Right', 'zanbil' ), 'rtl' => esc_html__( 'Right to Left', 'zanbil' ) ),
							'std' => 'rtl'
						),
					array(
							'id' => 'popup_active',
							'type' => 'checkbox',
							'title' => esc_html__('Active Popup Subscribe', 'zanbil'),
							'sub_desc' => esc_html__( 'Check to active popup subscribe', 'zanbil' ),
							'desc' => '',
							'std' => '0'// 1 = on | 0 = off
							),	
					array(
							'id' => 'popup_shortcode',
							'type' => 'textarea',
							'sub_desc' => esc_html__( 'Insert the popup shortcode here', 'zanbil' ),
							'title' => esc_html__( 'Popup Shortcode', 'zanbil' )
						),
					array(
							'id' => 'advanced_head',
							'type' => 'textarea',
							'sub_desc' => esc_html__( 'Insert your own CSS into this block. This overrides all default styles located throughout the theme', 'zanbil' ),
							'title' => esc_html__( 'Custom CSS/JS', 'zanbil' )
						)
				)
		);

	$options_args = array();

	$options_args['share_icons']['telegram'] = array(
			'link' => esc_url( 'https://t.me/avintarhtheme' ),
			'title' => esc_html__( 'کانال تلگرام', 'zanbil' ),
			'img' => esc_url( ZANBIL_URL.'/options/img/glyphicons/glyphicons_043_group.png' )
	);
	$options_args['share_icons']['linked_in'] = array(
			'link' => esc_url( 'http://avin-tarh.ir/' ),
			'title' => esc_html__( 'سایت گروه طراحی آوین', 'zanbil' ),
			'img' => esc_url( ZANBIL_URL.'/options/img/glyphicons/glyphicons_050_link.png' )
	);

	//Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
	$options_args['opt_name'] = ZANBIL_THEME;

	$options_args['google_api_key'] = '';//must be defined for use with google webfonts field type

	//Custom menu title for options page - default is "Options"
	$options_args['menu_title'] = esc_html__('تنظیمات قالب', 'zanbil');

	//Custom Page Title for options page - default is "Options"
	$options_args['page_title'] = esc_html__('تنظیمات قالب فروشگاهی زنبیل ', 'zanbil') . wp_get_theme()->get('Name');

	//Custom page slug for options page (wp-admin/themes.php?page=***) - default is "zanbil_theme_options"
	$options_args['page_slug'] = 'zanbil_theme_options';

	//page type - "menu" (adds a top menu section) or "submenu" (adds a submenu) - default is set to "menu"
	$options_args['page_type'] = 'submenu';

	//custom page location - default 100 - must be unique or will override other items
	$options_args['page_position'] = 27;
	$zanbil_options = new ZANBIL_Options($options, $options_args);
}
add_action( 'admin_init', 'Zanbil_Options_Setup', 0 );
Zanbil_Options_Setup();

function zanbil_widget_setup_args(){
	$zanbil_widget_areas = array(
		
		array(
				'name' => esc_html__('ساید بار راست وبلاگ', 'zanbil'),
				'id'   => 'left-blog',
				'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
				'after_widget' => '</div></div>',
				'before_title' => '<div class="block-title-widget"><h2><span>',
				'after_title' => '</span></h2></div>'
		),
		array(
				'name' => esc_html__('ساید بار چپ وبلاگ', 'zanbil'),
				'id'   => 'right-blog',
				'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
				'after_widget' => '</div></div>',
				'before_title' => '<div class="block-title-widget"><h2><span>',
				'after_title' => '</span></h2></div>'
		),
		
		array(
				'name' => esc_html__('پایین جزئیات محصول', 'zanbil'),
				'id'   => 'bottom-detail-product',
				'before_widget' => '<div class="widget %1$s %2$s" data-scroll-reveal="enter bottom move 20px wait 0.2s"><div class="widget-inner">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
		),
		
		
		array(
				'name' => esc_html__('سایدبار راست محصول', 'zanbil'),
				'id'   => 'left-product',
				'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
				'after_widget' => '</div></div>',
				'before_title' => '<div class="block-title-widget"><h2><span>',
				'after_title' => '</span></h2></div>'
		),
		
		array(
				'name' => esc_html__('سایدبار چپ محصول', 'zanbil'),
				'id'   => 'right-product',
				'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
				'after_widget' => '</div></div>',
				'before_title' => '<div class="block-title-widget"><h2><span>',
				'after_title' => '</span></h2></div>'
		),
		
		array(
				'name' => esc_html__('Above Footer', 'zanbil'),
				'id'   => 'above-footer',
				'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
		),
		array(
				'name' => esc_html__('Footer', 'zanbil'),
				'id'   => 'footer',
				'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
		),

		array(
				'name' => esc_html__('Footer Copyright', 'zanbil'),
				'id'   => 'footer-copyright',
				'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
		),

	);
	return $zanbil_widget_areas;
}

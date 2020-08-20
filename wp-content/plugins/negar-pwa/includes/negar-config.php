<?php
if ( ! class_exists( 'Redux' ) ) {
	return;
}

$opt_name = 'avn_negar';

$args    = [
	'display_name'        => 'نسخه موبایل نگار',
	'display_version'     => '5.0.2',
	'menu_title'          => 'نسخه موبایل نگار',
	'customizer'          => false,
	'dev_mode'            => false,
	'forced_dev_mode_off' => false,
];
$avnArgs = array();
Redux::setArgs( $opt_name, $args );

Redux::setSection( $opt_name, array(
	'title'  => 'اطلاعات فروشگاه',
	'id'     => 'site_info',
	'desc'   => '',
	'icon'   => 'el el-network',
	'fields' => array(
		array(
			'id'       => 'site_name',
			'type'     => 'text',
			'title'    => 'نام فروشگاه',
			'subtitle' => 'این نام در هدر فروشگاه نمایش داده می شود.',
			'default'  => 'قالب نگار'
		),
		array(
			'id'       => 'site_logo',
			'type'     => 'media',
			'title'    => 'لوگوی فروشگاه',
			'subtitle' => 'لوگوی انتخاب شده در لیست کناری فروشگاه نمایش داده خواهد شد.',
		),
		array(
			'id'      => 'logo_position',
			'type'    => 'button_set',
			'title'   => 'موقعیت لوگو را انتخاب کنید.',
			'options' => array(
				'center'  => 'لوگو در هدر',
				'sidebar' => 'لوگو در ساید بار - نام فروشگاه در هدر'
			),
			'default' => 'center'
		),
		array(
			'id'       => 'menu_contact',
			'type'     => 'multi_text',
			'add_text' => 'افزودن شماره جدید',
			'title'    => 'شماره های تماس',
			'subtitle' => 'شماره هایی که در این قسمت وارد میکنید در پایین منوی اصلی قالب نمایش داده می شود.',
			'desc'     => 'کد شماره تماس را با خط فاصله (-) جدا کنید مثلا : 021-12345678',
			'default'  => array(
				'0' => '031-123456789',
				'1' => '0913-12345678'
			),
		),
		array(
			'id'       => 'about_us_footer',
			'type'     => 'text',
			'title'    => 'اطلاعات تماس',
			'subtitle' => 'این مقدار در قسمت اطلاعات حساب کاربری داخل فوتر نمایش داده می شود',
			'default'  => 'تهران خیابان آزادی'
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'  => 'تنظیمات PWA',
	'id'     => 'pwa_setting',
	'desc'   => '',
	'icon'   => 'el el-website ',
	'fields' => array(
		array(
			'id'       => 'pwa_activation',
			'type'     => 'checkbox',
			'title'    => 'فعال سازی PWA',
			'subtitle' => 'با فعال سازی این قسمت نسخه موبایل ویو سایت شما فعال خواهد شد.',
			'default'  => '0'// 1 = on | 0 = off
		),
		array(
			'id'       => 'favicon',
			'type'     => 'media',
			'title'    => 'فاوآیکون و لوگوی PWA',
			'subtitle' => '</br></br></br></br></br></br><span id="pwa-generator-btn">ایجاد تصاویر فاوآیکون در سایز های مورد نیاز PWA</span></br></br></br><span style="line-height: 2;">ابتدا فایل لوگوی PWA را از سیستم خود بارگذاری کرده و ذخیره تغییرات کنید و مجددا بر روی دکمه ایجاد فایل های مورد نیاز PWA کلیک کنید.</span>',
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'  => 'تنظیمات منو',
	'id'     => 'menu_setting',
	'desc'   => '',
	'icon'   => 'el el-align-center ',
	'fields' => array(
		array(
			'id'       => 'side_menu',
			'type'     => 'select',
			'data'     => 'menus',
			'title'    => 'دسته بندی منوی کناری',
			'subtitle' => 'دسته بندی انتخاب شده در سایدبارImport from File نمایش داده خواهد شد.'
		),
		array(
			'id'       => 'menu_page',
			'type'     => 'select',
			'title'    => 'برگه در منوی کناری',
			'data'     => 'pages',
			'subtitle' => 'این برگه به عنوان دکمه در پایین سایدبار نمایش داده می شود.'
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'  => 'تنظیمات مدیا',
	'id'     => 'media',
	'desc'   => '',
	'icon'   => 'el  el-paper-clip ',
	'fields' => array(
		array(
			'id'       => 'banner_slider',
			'type'     => 'slides',
			'title'    => 'اسلایدر',
			'subtitle' => 'تصاویر انتخاب شده برای اسلایدر بالای صفحه نمایش داده خواهد شد.',
			'show'     => array(
				'title' => true,
				'url'   => true
			)
		),
		array(
			'id'          => 'svg_slider',
			'type'        => 'slides',
			'title'       => 'تصویر SVG',
			'subtitle'    => 'تصویر svg مورد نظر را از سایت flaticon به صورت کد base64 دریافت و وارد کنید.',
			'show'        => array(
				'url'         => true,
				'title'       => true,
				'description' => true,
			),
			'placeholder' => array(
				'title'       => 'متن زیر تصویر',
				'description' => 'کد SVG',
				'url'         => 'لینک',
			),
		),
		array(
			'id'       => 'banners_full',
			'type'     => 'slides',
			'title'    => 'بنر تمام صفحه',
			'subtitle' => 'تصاویر انتخاب شده به عنوان بنرهایی در صفحه ساز نمایش داده خواهد شد.',
			'show'     => array(
				'title' => true,
				'url'   => true
			)
		),
		array(
			'id'       => 'banners_half',
			'type'     => 'slides',
			'title'    => 'بنر نیم صفحه',
			'subtitle' => 'تصاویر انتخاب شده به عنوان بنرهایی در صفحه ساز نمایش داده خواهد شد.',
			'show'     => array(
				'title' => true,
				'url'   => true
			)
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'  => 'تنظیمات فوتر',
	'id'     => 'footer',
	'desc'   => '',
	'icon'   => 'el el-website ',
	'fields' => array(
		array(
			'id'       => 'first_footer_menu',
			'type'     => 'select',
			'data'     => 'menus',
			'title'    => 'منو فوتر اول',
			'subtitle' => 'دسته بندی انتخاب شده در فوتر سایت نمایش داده خواهد شد.'
		),
		array(
			'id'       => 'second_footer_menu',
			'type'     => 'select',
			'data'     => 'menus',
			'title'    => 'منو فوتر دوم',
			'subtitle' => 'دسته بندی انتخاب شده در فوتر سایت نمایش داده خواهد شد.'
		),
		array(
			'id'       => 'title_image_widget',
			'type'     => 'text',
			'title'    => 'عنوان ویجت تصویر فوتر',
			'subtitle' => 'این مقدار برای عنوان تصاویر ویجت فوتر(تنظیم تصاویر در زیر) قرار داده می شود',
			'default'  => 'اپلیکشن ما'
		),
		array(
			'id'          => 'image_widget',
			'type'        => 'slides',
			'title'       => 'ویجت تصویر فوتر',
			'subtitle'    => 'تصویر و لینک تصاویر وارد شده داخل فوتر نمایش داده خواهد شد.',
			'show'        => array(
				'url'   => true,
				'title' => true,
			),
			'placeholder' => array(
				'title' => 'عنوان',
				'url'   => 'لینک',
			)
		),
		array(
			'id'       => 'enamad_logo',
			'type'     => 'ace_editor',
			'title'    => 'کد نماد اعتماد الکترونیک',
			'subtitle' => 'قطعه کد دریافتی از سایت enamad.ir را در این قسمت وارد کنید.',
		),
		array(
			'id'       => 'samandehi_logo',
			'type'     => 'ace_editor',
			'title'    => 'کد نماد ساماندهی',
			'subtitle' => 'قطعه کد دریافتی از سایت samandehi.ir را در این قسمت وارد کنید.',
		),
		array(
			'id'       => 'melat_bank_logo',
			'type'     => 'ace_editor',
			'title'    => 'کد بانک ملت',
			'subtitle' => 'قطعه کد دریافتی از سایت bankmellat.ir را در این قسمت وارد کنید.',
		),
		array(
			'id'       => 'show_contact_infooter',
			'type'     => 'checkbox',
			'title'    => 'نمایش اطلاعات تماس در فوتر',
			'subtitle' => 'با فعال سازی اطلاعات شماره تماس شما در فوتر نمایش داده خواهد شد.',
			'default'  => '1'// 1 = on | 0 = off
		),
		array(
			'id'       => 'google_location_add',
			'type'     => 'text',
			'title'    => 'اطلاعات نمایش آدرس در گوگل',
			'subtitle' => 'با تنظیم و مقدار دهی این فیلد آدرس گوگل مپ فروشگاهتان در فوتر نمایش داده می شود',
			'default'  => ''
		),
		array(
			'id'       => 'wase_location_add',
			'type'     => 'text',
			'title'    => 'اطلاعات نمایش آدرس در ویز',
			'subtitle' => 'با تنظیم و مقدار دهی این فیلد آدرس ویز فروشگاهتان در فوتر نمایش داده می شود',
			'default'  => ''
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'  => 'صفحه ساز',
	'id'     => 'page_bulider',
	'desc'   => '',
	'class' => 'page-builder',
	'icon'   => 'el el-magic ',
	'fields' => array(
		array(
			'id'      => 'top_toolbar_button',
			'type'    => 'sorter',
			'title'   => 'دکمه های هدر',
			'desc'    => 'جهت نمایش و مرتب سازی دکمه های فوتر 5 مورد را در قسمت موارد فعال قرار دهید.',
			'options' => array(
				'enable'   => array(
					'search' => '',
				),
				'disabled' => array(
					'cart'    => '',
					'account' => '',
				),
			),
		),
		array(
			'id'      => 'home_content',
			'type'    => 'sorter',
			'title'   => 'چیدمان محتوا در صفحه اصلی',
			'desc'    => '',
			'options' => array(
				'enable'   => array(),
				'disabled' => get_woo_category()
			),
		),
		array(
			'id'      => 'bottom_toolbar_button',
			'type'    => 'sorter',
			'title'   => 'دکمه های فوتر',
			'desc'    => 'جهت نمایش و مرتب سازی دکمه های فوتر 5 مورد را در قسمت موارد فعال قرار دهید.',
			'options' => array(
				'enable'   => array(
					'homepage' => '',
					'category' => '',
					'shop'     => '',
					'cart'     => '',
					'account'  => ''
				),
				'disabled' => array(
					'blog' => '',
				),
			),
		),
	)
) );

function get_woo_category() {
	global $wpdb;
	$categories = $wpdb->get_results( "SELECT {$wpdb->prefix}term_taxonomy.term_id , {$wpdb->prefix}terms.name FROM {$wpdb->prefix}term_taxonomy INNER JOIN {$wpdb->prefix}terms WHERE {$wpdb->prefix}term_taxonomy.term_id = {$wpdb->prefix}terms.term_id AND {$wpdb->prefix}term_taxonomy.taxonomy = 'product_cat' AND {$wpdb->prefix}term_taxonomy.parent = 0", OBJECT );


	$datas = get_option( 'avn_negar' );
	if ( ! empty( $datas['banners_full'] ) ) {
		foreach ( $datas['banners_full'] as $banner ) {
			if ( ! empty( $banner['attachment_id'] ) ) {
				$out[ 'banner_' . $banner['attachment_id'] ] = '<p style="background-image: url(' . $banner['image'] . ');width:100%;height:100%;background-size:cover;"></p>';
			}
		}
	}

	$datas = get_option( 'avn_negar' );
	if ( ! empty( $datas['banners_half'] ) ) {
		foreach ( $datas['banners_half'] as $banner ) {
			if ( ! empty( $banner['attachment_id'] ) ) {
				$out[ 'halfb_' . $banner['attachment_id'] ] = '<p class="half-banner" style="background-image: url(' . $banner['image'] . ');width:100%;height:100%;background-size:cover;"></p>';
			}
		}
	}


	if ( ! empty( $categories ) ) {
		foreach ( $categories as $category ) {
			$out[ 'hscrol_' . $category->term_id ] = '<p id="brand-slider-svg"></p>اسلایدر دسته :' . $category->name;
		}
	}

	if ( ! empty( $datas['svg_slider'] ) ) {
		foreach ( $datas['svg_slider'] as $svg ) {
			if ( ! empty( $svg['description'] ) ) {
				$out['svg-slider'] = '<p id="svg-icon-svg"></p>اسلایدر svg';
			}
		}
	}

	if ( ! empty( $datas['banner_slider'] ) ) {
		foreach ( $datas['banner_slider'] as $banner ) {
			if ( ! empty( $banner['image'] ) ) {
				$out['banner-slider'] = '<p id="banner-slider-svg"></p>اسلایدر بنرها';
			}
		}
	}

	$out['blog-slider']           = '<p id="blog-slider-svg"></p>اسلایدر نوشته';
	$out['brand-slider']          = '<p id="brand-slider-svg"></p>اسلایدر برند ها';
	$out['newest-product-slider'] = '<p id="newest-slider-svg"></p>اسلایدر جدیدترین محصولات';
	$out['offer-product-slider']  = '<p id="sale-slider-svg"></p>اسلایدر محصولات تخفیف خورده زماندار';
	$out['sale-product']          = '<p id="sale-slider-svg"></p>اسلایدر محصولات تخفیف خورده';
	$out['price-list']            = '<p id="price-list-svg"></p>لیست قیمت';
	$out['category-slider']       = '<p id="price-list-svg"></p>اسلایدر دسته بندی';
	$out['first-widget']          = '<p id="price-list-svg"></p>موقعیت ابزارک اول';
	$out['second-widget']         = '<p id="price-list-svg"></p>موقعیت ابزارک دوم';

	return $out;
}


Redux::setSection( $opt_name, array(
	'title'  => 'رنگبندی',
	'id'     => 'negar_color',
	'desc'   => '',
	'icon'   => 'el el-brush ',
	'fields' => array(
		array(
			'id'       => 'addressbar_color',
			'type'     => 'color',
			'title'    => 'رنگ آدرس بار',
			'subtitle' => 'رنگ آدرس بار انتخاب شده در نوار بالایی تلفن همراه نمایش داده خواهد شد',
		),
		array(
			'id'       => 'light_header_color',
			'type'     => 'color',
			'title'    => 'رنگ هدر ها در حالت روز',
			'subtitle' => 'رنگ هدر انتخاب شده در بالای قالب نمایش داده خواهد شد',
		),
		array(
			'id'       => 'light_text_header_color',
			'type'     => 'color',
			'title'    => 'رنگ متون هدرها در حالت روز',
			'subtitle' => 'رنگ هدر انتخاب شده در بالای قالب نمایش داده خواهد شد',
		),
		array(
			'id'       => 'light_backgorund_sidebar_color',
			'type'     => 'color',
			'title'    => 'رنگ سایدبار در حالت روز',
			'subtitle' => 'رنگ هدر انتخاب شده در بالای قالب نمایش داده خواهد شد',
		),
		array(
			'id'       => 'light_textt_sidebar_color',
			'type'     => 'color',
			'title'    => 'رنگ متن سایدبار در حالت روز',
			'subtitle' => 'رنگ هدر انتخاب شده در بالای قالب نمایش داده خواهد شد',
		),
		array(
			'id'       => 'primary_light_color',
			'type'     => 'color',
			'title'    => 'رنگ اصلی قالب در حالت روز',
			'subtitle' => 'رنگ هدر انتخاب شده در بالای قالب نمایش داده خواهد شد',
		),
		array(
			'id'       => 'night_header_color',
			'type'     => 'color',
			'title'    => 'رنگ هدر ها در حالت شب',
			'subtitle' => 'رنگ هدر انتخاب شده در بالای قالب نمایش داده خواهد شد',
		),
		array(
			'id'       => 'night_text_header_color',
			'type'     => 'color',
			'title'    => 'رنگ متون هدرها در حالت شب',
			'subtitle' => 'رنگ هدر انتخاب شده در بالای قالب نمایش داده خواهد شد',
		),
		array(
			'id'       => 'night_backgorund_sidebar_color',
			'type'     => 'color',
			'title'    => 'رنگ سایدبار در حالت شب',
			'subtitle' => 'رنگ هدر انتخاب شده در بالای قالب نمایش داده خواهد شد',
		),
		array(
			'id'       => 'night_textt_sidebar_color',
			'type'     => 'color',
			'title'    => 'رنگ متن سایدبار در حالت شب',
			'subtitle' => 'رنگ هدر انتخاب شده در بالای قالب نمایش داده خواهد شد',
		),
		array(
			'id'       => 'primary_night_color',
			'type'     => 'color',
			'title'    => 'رنگ اصلی قالب در حالت شب',
			'subtitle' => 'رنگ هدر انتخاب شده در بالای قالب نمایش داده خواهد شد',
		),
	)
) );


Redux::setSection( $opt_name, array(
	'title'  => 'تنظیمات شبکه های اجتماعی',
	'id'     => 'social_applicaton',
	'desc'   => '',
	'icon'   => 'el el-facebook ',
	'fields' => array(
		array(
			'id'       => 'telegram_link',
			'type'     => 'text',
			'title'    => 'لینک تلگرام',
			'subtitle' => 'درصورت مقدار دهی، لینک تلگرام شما داخل فوتر نمایش داده خواهد شد.',
			'default'  => 'https://t.me/avintarhtheme'
		),
		array(
			'id'       => 'instagram_link',
			'type'     => 'text',
			'title'    => 'لینک اینستگرام',
			'subtitle' => 'درصورت مقدار دهی، لینک اینستگرام شما داخل فوتر نمایش داده خواهد شد.',
			'default'  => 'https://www.instagram.com/avintarhir'
		),
		array(
			'id'       => 'whatsapp_link',
			'type'     => 'text',
			'title'    => 'لینک واتس اپ',
			'subtitle' => 'درصورت مقدار دهی، لینک واتس اپ شما داخل فوتر نمایش داده خواهد شد.',
			'default'  => 'https://wa.me/+989123456789'
		),
		array(
			'id'       => 'twitter_link',
			'type'     => 'text',
			'title'    => 'لینک تویتر',
			'subtitle' => 'درصورت مقدار دهی، لینک تویتر شما داخل فوتر نمایش داده خواهد شد.',
			'default'  => 'http://twitter.com/id'
		),
		array(
			'id'       => 'aparat_link',
			'type'     => 'text',
			'title'    => 'لینک آپارات',
			'subtitle' => 'درصورت مقدار دهی، لینک آپارات شما داخل فوتر نمایش داده خواهد شد.',
			'default'  => 'https://www.aparat.com/avintarh'
		),
	)
) );

Redux::setSection( $opt_name, array(
    'title'  => 'سایر',
    'id'     => 'others',
    'desc'   => '',
    'icon'   => 'el el-quote-right ',
    'fields' => array(
        array(
            'id'      => 'clean_head',
            'type'    => 'switch',
            'title'   => 'عدم لود فایل های اضافی در هدر',
            'default' => true,
        ),
        array(
            'id'      => 'header_html',
            'type'    => 'ace_editor',
            'title'   => 'کدهای هدر',
            'subtitle' => 'کد های وارد شده دقیقا در هدر سایت شما وارد میشود.',
        ),
    )
));

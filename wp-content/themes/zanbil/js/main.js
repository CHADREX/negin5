(function($) {
	"use strict";
	/* Add Click On Ipad */
	$(window).resize(function(){
		var $width = $(this).width();
		if( $width < 1199 ){
			$( '.primary-menu .nav .dropdown-toggle'  ).each(function(){
				$(this).attr('data-toggle', 'dropdown');
			});
		}
	});
	jQuery(window).load(function() {
		/* Masonry Blog */
		$('body').find('.blog-content-grid').isotope({ 
			layoutMode : 'masonry'
		});
	});

    jQuery('.phone-icon-search').on('click', function(){
		/*alert("The paragraph was clicked.");*/
        jQuery('.sm-serachbox-pro').toggle("slide");
    });
	$(document).ready(function(){
		/* Quickview */
		$('.fancybox').fancybox({
			'width'     : 850,
			'height'   : '500',
			'autoSize' : false,
			afterShow: function() {
				$( '.quickview-container .product-images' ).each(function(){
					var $id = this.id;
					var $rtl = $('body').hasClass( 'rtl' );
					var $img_slider = $( '#' + $id + ' .product-responsive');
					var $thumb_slider = $( '#' + $id + ' .product-responsive-thumbnail' )
					$img_slider.slick({
						slidesToShow: 1,
						slidesToScroll: 1,
						fade: true,
						arrows: false,
						rtl: $rtl,
						asNavFor: $thumb_slider
					});
					$thumb_slider.slick({
						slidesToShow: 3,
						slidesToScroll: 1,
						asNavFor: $img_slider,
						arrows: true,
						focusOnSelect: true,
						rtl: $rtl,
						responsive: [				
							{
							  breakpoint: 360,
							  settings: {
								slidesToShow: 2    
							  }
							}
						  ]
					});

					var el = $(this);
					setTimeout(function(){
						el.removeClass("loading");
					}, 1000);

				});
			}
		});
		/* Slider Image */
		$( '.product-images' ).each(function(){
			var $id 			= this.id;
			var $rtl 			= $(this).data('rtl');
			var $vertical		= $(this).data('vertical');
			var $img_slider 	= $( '#' + $id + ' .product-responsive');
			var $thumb_slider 	= $( '#' + $id + ' .product-responsive-thumbnail' );
			$img_slider.slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				fade: true,
				arrows: false,
				rtl: $rtl,
				asNavFor: $thumb_slider
			});
			$thumb_slider.slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				asNavFor: $img_slider,
				arrows: true,
				rtl: $rtl,
				vertical: $vertical,
				verticalSwiping: $vertical,
				focusOnSelect: true,
				responsive: [	
				    {
					  breakpoint: 1199,
					  settings: {
						slidesToShow: 3
					  }
					},			
					{
					  breakpoint: 360,
					  settings: {
						slidesToShow: 2    
					  }
					}
				  ]
			});
			var el = $(this);
			setTimeout(function(){
				el.removeClass("loading");
			}, 1000);
		});
	});

    jQuery('.product-categories')
        .find('li:gt(5)') /*you want :gt(4) since index starts at 0 and H3 is not in LI */
        .hide()
        .end()
        .each(function(){
            if($(this).children('li').length > 5){ //iterates over each UL and if they have 5+ LIs then adds Show More...
                $(this).append(
                    $('<li><a>See more   +</a></li>')
                        .addClass('showMore')
                        .on('click',function(){
                            if($(this).siblings(':hidden').length > 0){
                                $(this).html('<a>See less   -</a>').siblings(':hidden').show(400);
                            }else{
                                $(this).html('<a>See more   +</a>').show().siblings('li:gt(5)').hide(400);
                            }
                        })
                );
            }
        });
    /*Form search iP*/

	$('.zanbil-tooltip').tooltip();
	/* fix accordion heading state */
	$('.accordion-heading').each(function(){
		var $this = $(this), $body = $this.siblings('.accordion-body');
		if (!$body.hasClass('in')){
			$this.find('.accordion-toggle').addClass('collapsed');
		}
	});

/*Product listing select box*/
	jQuery('.view-catelog .orderby .current-li a').html(jQuery('.view-catelog .orderby ul li.current a').html());
	jQuery('.view-catelog .sort-count .current-li a').html(jQuery('.view-catelog .sort-count ul li.current a').html());
/*currency Selectbox*/
	$('.currency_switcher li a').on('click', function(){
		var $current = $(this).attr('data-currencycode');
		jQuery('.currency_w > li > a').html($current);
	});
	/*------ clear header ------*/
	$( '.zanbil-logo' ).on('click', function(){
		$.cookie("zanbil_header_style", null, { path: '/' });
		$.cookie("zanbil_footer_style", null, { path: '/' });
	});

/*end lavalamp*/
	jQuery(function($){
	// back to top
	$("#zanbil-totop").hide();
	$(function () {
		var wh = $(window).height();
		var whtml = $(document).height();
		$(window).scroll(function () {
			if ($(this).scrollTop() > whtml/10) {
					$('#zanbil-totop').fadeIn();
				} else {
					$('#zanbil-totop').fadeOut();
				}
			});
		$('#zanbil-totop').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
			});
	});
	/* end back to top */
	}); 
	jQuery(document).ready(function(){
  jQuery('.wpcf7-form-control-wrap').on('hover', function(){
   $(this).find('.wpcf7-not-valid-tip').css('display', 'none');
  });
 });
/** width tab **/
if(($(window).width() > 1199)) {
	 var dem = $('.vc_tta-tabs-list .vc_tta-tab').length;
	 var widthul = Math.ceil($(".vc_tta-tabs-container").outerWidth());
	 var widthli = (widthul / dem ) ;
		 $('.vc_tta-tabs-list').find('.vc_tta-tab').css({
			    width: (widthli)
			})
	$( "a.add_to_cart_button" ).attr( "title", "افزودن به سبد" );
	$( ".add_to_wishlist" ).attr( "title", "افزودن به مورد علاقه ها" );
	$( ".compare-button" ).attr( "title", "مقایسه" );
	$( ".group" ).attr( "title", "نمایش سریع" );

}
 /*fix js */
 $('.wpb_map_wraper').on('click', function () {
    $('.wpb_map_wraper iframe').css("pointer-events", "auto");
});

$( ".wpb_map_wraper" ).on('mouseleave', function() {
  $('.wpb_map_wraper iframe').css("pointer-events", "none"); 
});
/*Remove tag p colections*/
$( ".collections .tab-content .tab-pane" ).find('p:first-child').remove();

/*remove tag p*/
$( ".collections .tab-pane " ).find( "p" ).remove();
/*add title to button*/

	$("a.compare").attr('title', 'مقایسه');
	$(".yith-wcwl-add-button a").attr('title', 'افزودن به علاقه مندی ها');
	$("a.fancybox").attr('title', 'نمایش سریع');
	
$('#myTabs a').hover(function (e) {
	e.preventDefault()
	$(this).tab('show')
})
	/*remove loading*/
	$(".sw-woo-tab").fadeIn(300, function() {
		$(this).removeClass("loading");
	});
	$(".sw-woo-tab-cat-resp").fadeIn(300, function() {
		$(this).removeClass("loading");
	});
	$(".responsive-slider").fadeIn(300, function() {
		$(this).removeClass("loading");
	});

}(jQuery));

(function($){		
	$('[data-toggle="tooltip"]').tooltip();
             /*Verticle Menu*/
			    jQuery('.header-default .vertical-megamenu')
			        .find(' > li:gt(12) ') 
			        .hide()
			        .end()
			        .each(function(){
			            if($(this).children('li').length > 12){ 
			                $(this).append(
			                    $('<li><a class="open-more-cat">نمایش بیشتر </a></li>')
			                        .addClass('showMore')
			                        .on('click', function(){
			                            if($(this).siblings(':hidden').length > 0){
			                                $(this).html('<a class="close-more-cat">نمایش کمتر</a>').siblings(':hidden').show(400);
			                            }else{
			                                $(this).html('<a class="open-more-cat">نمایش بیشتر</a>').show().siblings('li:gt(12)').hide(400);
			                            }
			                        })
			                );
			            }
			    });

			    /*Verticle Menu*/
		var $width = $(this).width();
		if( $width < 1500 ){
		    jQuery('.header-style1 .vertical-megamenu')
		        .find(' > li:gt(8) ') 
		        .hide()
		        .end()
		        .each(function(){
		            if($(this).children('li').length > 8){ 
		                $(this).append(
		                    $('<li><a class="open-more-cat">نمایش بیشتر </a></li>')
		                        .addClass('showMore')
		                        .on('click', function(){
		                            if($(this).siblings(':hidden').length > 0){
		                                $(this).html('<a class="close-more-cat">نمایش کمتر</a>').siblings(':hidden').show(400);
		                            }else{
		                                $(this).html('<a class="open-more-cat">نمایش بیشتر</a>').show().siblings('li:gt(8)').hide(400);
		                            }
		                        })
		                );
		            }
		        });
		}
		if( $width > 1500 ) {
		    jQuery('.header-style1 .vertical-megamenu')
		        .find(' > li:gt(12) ') 
		        .hide()
		        .end()
		        .each(function(){
		            if($(this).children('li').length > 12){ 
		                $(this).append(
		                    $('<li><a class="open-more-cat">نمایش بیشتر </a></li>')
		                        .addClass('showMore')
		                        .on('click', function(){
		                            if($(this).siblings(':hidden').length > 0){
		                                $(this).html('<a class="close-more-cat">نمایش کمتر</a>').siblings(':hidden').show(400);
		                            }else{
		                                $(this).html('<a class="open-more-cat">نمایش بیشتر</a>').show().siblings('li:gt(12)').hide(400);
		                            }
		                        })
		                );
		            }
		        });
		}
		jQuery('.header-style2 .vertical-megamenu')
	        .find(' > li:gt(8) ')
	        .hide()
	        .end()
	        .each(function(){
	            if($(this).children('li').length > 8){
	                $(this).append(
	                    $('<li><a class="open-more-cat">نمایش بیشتر </a></li>')
	                        .addClass('showMore')
	                        .on('click', function(){
	                            if($(this).siblings(':hidden').length > 0){
	                                $(this).html('<a class="close-more-cat">نمایش کمتر</a>').siblings(':hidden').show(400);
	                            }else{
	                                $(this).html('<a class="open-more-cat">نمایش بیشتر</a>').show().siblings('li:gt(8)').hide(400);
	                            }
	                        })
	                );
	            }
        });
	     jQuery('.sw_mega_menu .vertical-megamenu')
		        .find(' > li:gt(12) ') 
		        .hide()
		        .end()
		        .each(function(){
		            if($(this).children('li').length > 12){ 
		                $(this).append(
		                    $('<li><a class="open-more-cat">نمایش بیشتر </a></li>')
		                        .addClass('showMore')
		                        .on('click', function(){
		                            if($(this).siblings(':hidden').length > 0){
		                                $(this).html('<a class="close-more-cat">نمایش کمتر</a>').siblings(':hidden').show(400);
		                            }else{
		                                $(this).html('<a class="open-more-cat">نمایش بیشتر</a>').show().siblings('li:gt(12)').hide(400);
		                            }
		                        })
		                );
		            }
		        });
})(jQuery);

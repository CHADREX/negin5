(function ($) {
    'use strict';

    var suhaWindow = $(window);
    var sideNavWrapper = $("#sidenavWrapper");
    var headerArea = $("#headerArea");
    var footerNav = $("#footerNav");
    var blackOverlay = $(".sidenav-black-overlay");

    // :: 1.0 Preloader
    suhaWindow.on('load', function () {
        $('#preloader').fadeOut('1000', function () {
            $(this).remove();
        });
    });

    // :: 2.0 Navbar
    $("#suhaNavbarToggler").on("click", function () {
        sideNavWrapper.addClass("nav-active");
        headerArea.addClass("header-out");
        footerNav.addClass("footer-out");
        blackOverlay.addClass("active");
    });

    blackOverlay.on("click", function () {
        $(this).removeClass("active");
        sideNavWrapper.removeClass("nav-active");
        headerArea.removeClass("header-out");
        footerNav.removeClass("footer-out");
    })

    // :: 11.0 Prevent Default 'a' Click
    $('a[href="#"]').on('click', function ($) {
        $.preventDefault();
    });

})(jQuery);

(function ($) {
    'use strict';

    // Dark Mode JS
    var toggleSwitch = document.getElementById('darkSwitch');
    var currentTheme = localStorage.getItem('theme');

    if (currentTheme) {
        document.documentElement.setAttribute('data-theme', currentTheme);
        if (currentTheme === 'dark') {
            if (toggleSwitch) {
                toggleSwitch.checked = true;
            }
        }
    }

    function switchTheme(e) {
        if (e.target.checked) {
            document.documentElement.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
        } else {
            document.documentElement.setAttribute('data-theme', 'light');
            localStorage.setItem('theme', 'light');
        }
    }

    if (toggleSwitch) {
        toggleSwitch.addEventListener('change', switchTheme, false);
    }
})();


jQuery(document).ready(function ($) {

    var textBanner = new Swiper('.text-banner-slider', {
        spaceBetween: 10,
        slidesPerView: 3,
        loop: true,
        freeMode: true,
        loopedSlides: 5, //looped slides should be the same
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        autoplay: {
            delay: 5000,
        },
    });

    var bannerTop = new Swiper('.image-banner-slider', {
        spaceBetween: 10,
		slidesPerView: 1.1,
		centeredSlides: true,
        loop: true,
        loopedSlides: 5, //looped slides should be the same
        thumbs: {
            swiper: textBanner,
        },
        autoplay: {
            delay: 5000,
        },
    });

    var svgSwiper = new Swiper('.svg-swiper-container', {
        // Optional parameters
        loop: false,
        slidesPerView: 2.7,
        spaceBetween: 10,
    });

    var categorySwiper = new Swiper('.category-swiper-container', {
        // Optional parameters
        loop: false,
        slidesPerView: 1.4,
        spaceBetween: 10,
    });

    var productSwiper = new Swiper('.hscroll-product', {
        // Optional parameters
        loop: false,
        slidesPerView: 1.8,
        spaceBetween: 10,
        margin: 5,
    });

    var blogSwiper = new Swiper('.blog-swiper-container', {
        // Optional parameters
        loop: false,
        slidesPerView: 1.2,
        spaceBetween: 10,
        margin: 5,
    });

    var brandSwiper = new Swiper('.brand-swiper-container', {
        // Optional parameters
        loop: false,
        slidesPerView: 1.8,
        spaceBetween: 10,
        margin: 5,
        autoplay: {
            delay: 5000,
        },
    });

    var timerSwiper = new Swiper('.timer-product-slider', {
        // Optional parameters
        loop: false,
        slidesPerView: 1.2,
        spaceBetween: 10,
        margin: 5,
    });

    var validationLogoSwiper = new Swiper('.validation-logos-slider', {
        // Optional parameters
        loop: true,
        slidesPerView: 1,
        spaceBetween: 10,
    });


    $("#accordian .fa-minus").click(function() {
        var link = $(this);
        var closest_ul = link.closest("ul");
        var parallel_active_links = closest_ul.find(".active")
        var closest_li = link.closest("li");
        var link_status = closest_li.hasClass("active");
        var count = 0;

        closest_ul.find("ul").slideUp(function() {
            if (++count == closest_ul.find("ul").length) {
                parallel_active_links.removeClass("active");
            }
        });

        if (!link_status) {
            closest_li.children("ul").slideDown();
            closest_li.addClass("active");
        }
    });

    var ajaxsearch = $("#searchform_special");
    var ajaxsearchB = $("#ajax-search");
    var defultsearchB = $(".search-field");
    ajaxsearchB.click(function (e) {
        e.preventDefault();
        ajaxsearch.toggleClass('hide');
        defultsearchB.toggleClass('hide');
    });
    ajaxsearchB.toggle(function() {
        $(this).html('<i class="fal fa-times"></i>');
    }, function() {
        $(this).html('<i class="fal fa-search"></i>');
    });

    var count = 0
    $('#category-modal-button').click(function (e) {
        e.preventDefault();
        $('#category-modal').toggleClass('show')
        $('.page-content-wrapper').toggleClass('content-blur')
        $('.buttonbar-first').find('li.active').removeClass('active')
        $(this).toggleClass('active')



        if(count < 1) {

            // This does the ajax request
            $.ajax({
                url: avn_negar.ajaxurl,
                data: {
                    'action': 'ngr_modal_category',
                },
                success:function(data) {

                    $('#category-modal').html(data);
                    count++;
                },
                error: function(errorThrown){
                    console.log(errorThrown);
                }
            });
        }

    })

    $(".plus").on("click", function(e) {
        var n = parseInt($(this).prev("input").val());
        $(this).prev("input").val(n + 1).change()
    }), $(".minus").on("click", function(e) {
        var n = parseInt($(this).next("input").val());
        0 !== n && $(this).next("input").val(n - 1).change()
    })

    $('.ngr-filter-product-button').click(function (e) {
        e.preventDefault()
        $('#primary').toggleClass('content-blur')
        $('#ngr_product_filter').toggleClass('open')
        $(this).toggleClass('close')
    })
    $('ul.tabs li').click(function () {
        var current_tab = $(this).attr('aria-controls')
        $('.woocommerce-tabs .woocommerce-Tabs-panel').removeClass('active')
        $('#'+current_tab).addClass('active')
        $('#ngr-product-tab-modal').addClass('active')
        $('#tab-closer').addClass('active')
    })

    $('#tab-closer').click(function (e) {
        e.preventDefault();
        $('.woocommerce-tabs .woocommerce-Tabs-panel').removeClass('active')
        $('#tab-closer').removeClass('active')
        $('#ngr-product-tab-modal').removeClass('active')

    })

    $('.view-mode').click(function (e) {

        $('.view-mode i').toggleClass('active')
        $('ul.products').toggleClass('list')
    })

    $('#signup-link').click(function () {
        $('.register-box').addClass('open')
    })

    $('#signin-link').click(function () {
        $('.register-box').removeClass('open')
    })

    $('.cancel-mobile-view').click(function () {
        $('.add-shortcut-btn').addClass('hidden')
    })

    let pwa = $('.add-shortcut-btn')
   if( pwa.data('cookie') === 0)
       pwa.addClass('close');

    var userAgent = navigator.userAgent || navigator.vendor || window.opera;

    // Windows Phone must come first because its UA also contains "Android"
    if (/windows phone/i.test(userAgent)) {

    }

    if (/android/i.test(userAgent)) {

    }

    // iOS detection from: http://stackoverflow.com/a/9039885/177710
    if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
        pwa.addClass('ios');
    }

});
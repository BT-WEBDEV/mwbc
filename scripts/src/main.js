$(document).ready(function() {

new WOW().init();

// ===== Main menu Active color. ==== 
// $(function() {
// 	var page = window.location.pathname.split('/');
// 	$("header .navbar li a").parent().removeClass("active");
// 	$("header .navbar li a").filter('[href="/'+page[1]+'"]').parent().addClass('active');
// });

$('.third-button').on('click dblclick', function () {
    $('.animated-icon3').toggleClass('open');
    $('.animated-icon3 span').toggleClass('bg-black');
});

// Add Class If user refreshes
if ($(window).scrollTop() >= 50) {
    $('.custom-navbar').addClass('shrink');
}

// Add Class When Scrolls
$(window).scroll(function() {
    var nav = $('.custom-navbar');
    var top = 50;
    if ($(window).scrollTop() >= top) {
        nav.addClass('shrink');
    } else {
        if($('.empty-slider').length == 0) {
            nav.removeClass('shrink');
        };
    }
});

// Add Class if Slider is empty
if($('.empty-slider').length > 0) {
    $('.custom-navbar').addClass('shrink');
};

// Initialize Swiper
var newsSwiper = new Swiper('.news-swiper', {
    slidesPerView: 1.5,
    spaceBetween: 20,
    breakpoints: {
        768: {
            slidesPerView: 2.5,
            spaceBetween: 40,
        },
        992: {
            slidesPerView: 3.5,
            spaceBetween: 40,
        }
    }
});

var albumsSwiper = new Swiper('.albums-swiper', {
    slidesPerView: 3.5,
    spaceBetween: 15,
    breakpoints: {
        768: {
            slidesPerView: 4.5,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 5.5,
            spaceBetween: 15,
        }
    }
});

var mainSwiper = new Swiper('.main-swiper', {
    pagination: {
        el: '.swiper-pagination',
    }
});

var testimonialsSwiper = new Swiper('.testimonials-swiper', {
    spaceBetween: 50,
    loop: true,
    autoplay: {
        delay: 3000,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
    },
});

}); /* Document Ready End */











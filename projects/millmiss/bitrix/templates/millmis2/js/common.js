$(function() {


	$(".mob_title_lk").click(function () {
    $('.menu_lk_list').toggleClass("active_block");
 });

	$(".header_basket_img").hover(function () {
    $('.minicart-popup').toggleClass("active");
 });


	$('.alhavite-nav').slick({
		horizontal: true,
		arrows: false,
		draggable: false,
		slidesToShow: 26,
		focusOnSelect: true,
		variableWidth: true,
		slidesToScroll: 1,
		asNavFor: '.list-nav'
	});

	$('.list-nav').slick({
		horizontal: true,
		arrows: true,
		slidesToShow: 4,
		slidesToScroll: 1,
		asNavFor: '.alhavite-nav',
		responsive: [
    {
      breakpoint: 1025,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
      }
    },
    {
      breakpoint: 700,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        arrows: false
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
	});

	$('.image-popup-vertical-fit').magnificPopup({
	  type: 'image'
	});

	$('.owl-slider_header').owlCarousel({
		loop: false,
		margin:10,
		nav:true,
		items:1,
		navText: ["<img src='img/slider/arrow_slider.svg'>","<img src='img/slider/arrow_slider_2.svg'>"]
	});

	$('.owl-section').owlCarousel({
		loop: false,
		nav: true,
		dots: true,
		margin:10,
		navText: ["<img src='img/slider/arrow_grey.svg'>","<img src='img/slider/arrow_grey_2.svg'>"],
		responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:2,
        },
        900:{
            items:4,
        }
    }
	});

	$('.owl-recommend').owlCarousel({
		loop: false,
		nav: true,
		dots: true,
		margin:10,
		navText: ["<img src='img/slider/arrow_grey.svg'>","<img src='img/slider/arrow_grey_2.svg'>"],
		responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:2,
        },
        900:{
            items:5,
        }
    }
	});

	$('.owl-brands').owlCarousel({
		loop: false,
		nav: true,
		dots: true,
		margin:10,
		items: 7,
		navText: ["<img src='img/slider/arrow_grey.svg'>","<img src='img/slider/arrow_grey_2.svg'>"]
	});


	$('.show_popup').click(function() {
	    var popup_id = $('#' + $(this).attr("rel"));
	    $(popup_id).fadeIn();
	    $('.overlay_popup').fadeIn();
	})
	$('.overlay_popup, .close_popup, .cancel_password, .return').click(function() {
	    $('.overlay_popup, .popup').fadeOut();
	});

	$('[rel="add_to_basket"]').click(function () {
		console.log($(this).parent().parent().attr('class'));
		if ($(this).parent().parent().attr('class') == 'table_recomend_item' ||
			$(this).parent().parent().attr('class') ==  'recomend_item') {
			console.log('+');

			let parent = $(this).parent().parent();
			let name = (parent.attr('class') == 'table_recomend_item') ? parent.find('.title_prod h3').html()
				: parent.find('.wrap_description h3 a').html();

			let type = (parent.attr('class') == 'table_recomend_item') ? parent.find('.title_prod ul li:eq(0)').html()
				: parent.find('.wrap_description p').html();

			$('#add_to_basket .add_prod_img').attr('src', parent.find('.wrap_img a').attr('href'));
			$('#add_to_basket .add_name').html(name);
			$('#add_to_basket .add_prod_type').html(type);
		}else {

			$('#add_to_basket .add_prod_img').attr('src', $('.cart-carousel .slick-slide img').attr('src'));
			$('#add_to_basket .add_name').html($('.cart_main .title_cart h3').html());
			$('#add_to_basket .add_prod_type').html($('.cart_main .title_cart p').html());
		}
	});

	//Chrome Smooth Scroll
	try {
		$.browserSelector();
		if($("html").hasClass("chrome")) {
			$.smoothScroll();
		}
	} catch(err) {

	};

	$("img, a").on("dragstart", function(event) { event.preventDefault(); });
	
});


$(".uncover_item").click(function(){
	$(this).parents(".uncover_items").toggleClass("covered");
})

$(".header_search_mobile").click(function(){
	$(".headerMain_top").toggleClass("search_active");
})


$('#trigger_sorting').click(function() {
	if ($('.sorting_popup').is(':visible')) {
		$('.sorting_popup').hide();
	}
	else {
		$('.sorting_popup').show();
	}
});

$('#trigger_filter').click(function() {
	if ($('.filter_popup').is(':visible')) {
		$('.filter_popup').hide();
	}
	else {
		$('.filter_popup').show();
	}
});


$('.btn_selected_filters').click(function() {
	$('.selected_filters .select_list').toggleClass("activeSlide");
	$('.btn_selected_filters').toggleClass("rotate_icon");
});

$('.btn_slide').click(function() {
	$(this).parent().toggleClass("slide_this");
});

$('.cd-nav-trigger').click(function() {
	$(document.body).toggleClass("hidden_overflow");
});

$('.sort_products').click(function() {
	$(".sort_products .select-list").toggleClass("active_list");
});

$('.cart-carousel').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	arrows: false,
	fade: true,
	asNavFor: '.cart-nav'
});
$('.cart-nav').slick({
	slidesToShow: 3,
	infinite: true,
	slidesToScroll: 1,
	asNavFor: '.cart-carousel',
	dots: false,
	variableWidth: true,
	autoplay: true,
  autoplaySpeed: 2000,
	focusOnSelect: true
});

var textForCart = $("#textForCart").text();

if (textForCart.length < 380) {
	$("#textForCart").toggleClass("openText");
	$('.readmore_btn').css("display","none");
}


$(".readmore_btn").click(function(){
	$("#textForCart").toggleClass("openText");
	$('.readmore_btn').toggleClass("hiddenRead");
});
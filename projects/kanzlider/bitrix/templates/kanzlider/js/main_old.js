$(document).ready(function(){
  heig = $('.header-nav__menu-2-lvl').height();

  if ($(window).width() < 1007) {
    $('.main-catalog-claster').unwrap();
    $('.main-catalog-item').unwrap();
  }

  if ($(window).width() > 1007) {

    $('.header-nav .header-nav__menu--top > li').mouseover(function(){
      var nav_top = $(".header-nav--footer").offset().top;
      $('header .header-nav .header-nav__overlay').css('height', nav_top - 150);
    })

    $('header .header-nav__menu > li:nth-child(2) > a').mouseover(function(){
      if (! $(this).hasClass("menu-open")) {
        $('header .header-nav__menu-2-lvl').stop(1,1).slideToggle(300);
        $(this).addClass('menu-open');
        $('header .header-nav__overlay').fadeIn(300);
      }
    })

    $('footer .header-nav__menu > li:nth-child(2) > a').mouseover(function(){
      if (! $(this).hasClass("menu-open")) {
        $('footer .header-nav__menu-2-lvl').stop(1,1).slideToggle(300);
        $(this).addClass('menu-open');
        $('footer .header-nav__overlay').fadeIn(300);
      }
    })

    $('header .header-nav__menu-2-lvl-close').click(function(e){
      e.preventDefault();
      $('header .header-nav__menu > li:nth-child(2) > a').removeClass('menu-open');
      $('header .header-nav__menu-2-lvl').stop(1,1).slideToggle(300);
      $('header .header-nav__overlay').fadeOut(300);
      $('body').height('100%');
    })

    $('footer .header-nav__menu-2-lvl-close').click(function(e){
      e.preventDefault();
      $('footer .header-nav__menu > li:nth-child(2) > a').removeClass('menu-open');
      $('footer .header-nav__menu-2-lvl').stop(1,1).slideToggle(300);
      $('footer .header-nav__overlay').fadeOut(300);
      $('body').height('100%');
    })

    $('header .header-nav__overlay').click(function(e){
      e.preventDefault();
      $('header .header-nav__menu > li:nth-child(2) > a').removeClass('menu-open');
      $('header .header-nav__menu-2-lvl').stop(1,1).slideToggle(300);
      $('header .header-nav__overlay').fadeOut(300);
      $('body').removeAttr('style');
    })

    $('footer .header-nav__overlay').click(function(e){
      e.preventDefault();
      $('footer .header-nav__menu > li:nth-child(2) > a').removeClass('menu-open');
      $('footer .header-nav__menu-2-lvl').stop(1,1).slideToggle(300);
      $('footer .header-nav__overlay').fadeOut(300);
      $('body').removeAttr('style');
    })

    $('.header-nav__menu.header-nav__menu--top').mouseover(function(){
      top_menu = $(".header-nav__menu-2-lvl-close").offset().top - (-3);
      $(".header-nav__menu-3-lvl").offset({top:top_menu});
    })

    $('.header-nav__menu-2-lvl > li').each(function(){
      if($(this).find('ul').length > 0) {
        $(this).addClass('have-menu');
      }});

    $('.main-catalog-item').each(function(){
      if($(this).find('ul').length > 0) {
        $(this).addClass('have-menu');
      }});

    $('.header-nav__menu--top .header-nav__menu-2-lvl > li').mouseover(function(){
      min_heig = $(this).offset().top - 260;
      $(this).find('ul').css('min-height', min_heig);
      heig = $('.header-nav__menu-2-lvl').height();
    })
  }

 $('.main-catalog-offers').slick({
    dots: true,
    arrows:false,
    infinite: true,
    speed: 700,
    fade: true,
   cssEase: 'linear'
  });

  $('.main-news__content').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    speed: 700,
    fade: true,
    cssEase: 'linear'
  });

  $('.brands-slider').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    dots: false,
    responsive: [
    {
      breakpoint: 1040,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 860,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 580,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    ]
  });

  $('.recommend__items').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: false,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 902,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 802,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 568,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    ]
  });

  $('.card__image-images').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.card__image-pagination'
  });
  $('.card__image-pagination').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.card__image-images',
    dots: false,
    centerMode: true,
    focusOnSelect: true,
    centerPadding: '0'
  });

  $(".main-news__new-title a").dotdotdot({
    ellipsis: "...",
    wrap: "word",
    fallbackToLetter: true,
    after: null,
    watch: false,
    height: 60,
    tolerance: 0,
    lastCharacter: {
      remove: [" ", ",", ";", ".", "!", "?"],
      noEllipsis: []
    }
  });

  $(".news__desc").dotdotdot({
    ellipsis: "...",
    wrap: "word",
    fallbackToLetter: true,
    after: null,
    watch: false,
    height: 40,
    tolerance: 0,
    lastCharacter: {
      remove: [" ", ",", ";", ".", "!", "?"],
      noEllipsis: []
    }
  });

  $('body').on('keyup change blur','input#input-name, input#input-number, input#input-email, input#input-phone, textarea#input-message', function(){

   var id = $(this).attr('id');
   var val = $(this).val();

   switch(id)
   {
     case 'input-name':
     var rv_name = /^[\s\a-zA-Zа-яА-Я]+$/; 

     if (val.length > 2 && val != '' && rv_name.test(val))
     {
       $(this).addClass('not_error').removeClass('error');
       $(this).parent('.input-block--required').addClass('apply').removeClass('denied');
     }

     else
     {
       $(this).removeClass('not_error').addClass('error');
       $(this).parent('.input-block--required').addClass('denied').removeClass('apply');
     }
     break;

     case 'input-email':
     var rv_email = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
     if (val != '' && rv_email.test(val))
     {
      $(this).addClass('not_error').removeClass('error');
      $(this).parent('.input-block--required').addClass('apply').removeClass('denied');
    }
    else
    {
      $(this).removeClass('not_error').addClass('error');
      $(this).parent('.input-block--required').addClass('denied').removeClass('apply');
    }
    break;

    case 'input-message':
    if(val != '' && val.length > 5 && val.length < 5000)
    {
     $(this).addClass('not_error').removeClass('error');
     $(this).parent('.input-block--required').addClass('apply').removeClass('denied');
   }
   else
   {
     $(this).removeClass('not_error').addClass('error');
     $(this).parent('.input-block--required').addClass('denied').removeClass('apply');
   }
   break;

   case 'input-phone':
   var rv_phone = /^([0-9])+/;
   if (val != '' && val.length < 12 && val.length >= 6 && rv_phone.test(val))
   {
    $(this).addClass('not_error').removeClass('error');
    $(this).parent('.input-block--required').addClass('apply').removeClass('denied');
  }
  else
  {
    $(this).removeClass('not_error').addClass('error');
    $(this).parent('.input-block--required').addClass('denied').removeClass('apply');
  }
  break;

  case 'input-number':
  var rv_number = /^([0-9])+/;
  if (val != '' && val.length >= 1 && rv_number.test(val))
  {
    $(this).addClass('not_error').removeClass('error');
    $(this).parent('.input-block--required').addClass('apply').removeClass('denied');
  }
  else
  {
    $(this).removeClass('not_error').addClass('error');
    $(this).parent('.input-block--required').addClass('denied').removeClass('apply');
  }
  break;
}
})
  $('input[type="submit"]').click(function(e) {
    e.preventDefault();
    $( "input#input-name, input#input-number, input#input-email, input#input-phone, textarea#input-message" ).trigger( "blur" );

    var kol_er = 0;
    $(this).closest('form').find('input').each(function(){
      if ($(this).hasClass('error')) {
        kol_er = kol_er + 1;
      }
    })
    if (kol_er == 0) {
      $(this).closest('form').submit();
    }
  })

  $('.header-nav--footer .header-nav__menu-2-lvl > li').mouseover(function(){
    var nav_top = $(".header-nav--footer").offset().top;
    var ul_top = $(this).find("ul").offset().top;
    var height_ul = $(this).find("ul").height();
    var height_ul_itog = ul_top + height_ul;
    if (height_ul_itog > nav_top)  {
      var res = ((height_ul_itog - nav_top) + 42) * (-1);
      $(this).find("ul").css('top', res);
    }
  })

  $('.header-nav--footer .header-nav__menu > li').mouseover(function(){
    var nav_top = $(".header-nav--footer").offset().top;
    $('.header-nav--footer .header-nav__overlay').css('height', nav_top);
  })

  $('.header--mobile .header-nav__menu > li:nth-child(2) > a').click(function(e){
    e.preventDefault();
    $('.header--mobile .header-nav__menu-2-lvl').stop().slideToggle(300);
  })

  $('.header--mobile .header-nav__menu-2-lvl > li').each(function(){
    if($(this).find('ul').length > 0) {
      $(this).addClass('have-menu');
    }});

  $('.header--mobile .header-nav__menu-2-lvl > li.have-menu > a').click(function(e){
    e.preventDefault();
    $(this).parent('li').find('.header-nav__menu-3-lvl').stop().slideToggle(300);
  })
  
  $('.header__menu-button').click(function(e){
    e.preventDefault();
    $(this).toggleClass('active');
    $('.header-menu').stop().slideToggle(300);
    $('.mobile-menu-overflow').stop().fadeToggle(300);
  })

  $('.mobile-menu-overflow').click(function(e) {
    e.preventDefault();
    $('.header-menu').stop().slideToggle(300);
    $('.mobile-menu-overflow').stop().fadeToggle(300);
    $('.header__menu-button').toggleClass('active');
  })

  $('.mobile-menu-overflow').css('height', $('body').height() - $('.header--mobile').height() - 35);
  
  $('.catalog-page__items-wrap').masonry({
    itemSelector: '.catalog-page__item',
    isFitWidth: true
  })

  $('.jobs__items').masonry({
    itemSelector: '.jobs__item'
  })

  $('.catalog-page-offer__close').click(function(e){
    e.preventDefault();
    $(this).parent().detach();
  })
  

  $('.goods--category').addClass('card');
  if ($('.goods--category').hasClass('table')) {
    $('.goods--category__sort-button--table').addClass('active down');
  }

  if ($('.goods--category').hasClass('card')) {
    $('.goods--category__sort-button--cards').addClass('active down');
  }

  $('.goods--category__sort-button--cards').click(function(e){
    e.preventDefault();
    $(this).addClass('active down');
    $('.goods--category__sort-button--table').removeClass('active down');
    $('.goods--category').addClass('card');
    $('.goods--category').removeClass('table');
  })
  
  $('.goods--category__sort-button--table').click(function(e){
    e.preventDefault();
    $(this).addClass('active down');
    $('.goods--category__sort-button--cards').removeClass('active down');
    $('.goods--category').addClass('table');
    $('.goods--category').removeClass('card');
  })
  
  $('.sidebar-menu__box > .sidebar-menu__menu > li ').hover(function(){
    $(this).closest('li').find('.sidebar-menu__menu-2-lvl').stop().slideToggle(300).show();
  })

//  $.ionTabs("#tabs_1");
//
//  $.ionTabs("#tabs_1", {
//    type: "none"                 
//  });

  $(".cart__delivery-block .card__delivery-input-block:nth-child(1) .cart__delivery-input-label").each(function(){
    $(this).addClass('active');
  })

  $(".cart__delivery-input-label input[type='text']").click(function(){
    $(this).attr('id', 'input-name');
    $(this).closest('label').find('input[type="radio"]').attr('checked','checked');
  })

  $('.cart__delivery-input-label').click(function(){
    $(this).closest('.cart__delivery-block').find('.cart__delivery-input-label').each(function(){
      $(this).removeClass('active');
    })
    $(this).addClass('active');

    if($(this).find('input[type="text"]').length > 0) {
      $(this).find('input[type="text"]').attr('id', 'input-name');
    }

    else {
      $(this).closest('.cart__delivery-block').find('input').each(function(){
        $(this).removeAttr('id');
        $(this).removeClass('error not_error');
        $(this).val("");
        $(this).closest('.card__delivery-input-sub-block').removeClass('apply denied');
      })
    }
    $(this).find('input[type="text"]').addClass('active');
  })

  $('.input-block--required.cart__information-input-block').click(function(){
    $(this).find('.cart__information-input-desc').addClass('active');
  })

  $('.cart__information .input-block--required.cart__information-input-block').focusout(function(){
    if ($(this).find('input[type="text"]').val().length > 0) {
      $(this).closest('.input-block--required.cart__information-input-block').find('.cart__information-input-desc').addClass('active');
    }

    else {
      $(this).closest('.input-block--required.cart__information-input-block').find('.cart__information-input-desc').removeClass('active');
    }
  })

  $('.cart__apply-stage').click(function(e){
    e.preventDefault();
    $(this).closest('.cart__tab-content').find('input').trigger( "blur" );
    var kol_er = 0;
    $(this).closest('.cart__tab-content').find('input').each(function(){

      if ($(this).hasClass('error')) {
        kol_er = kol_er + 1;
        var atr;
        er_ofset = $(this).closest('.cart__tab-content').find('input.error').offset().top;
        $('html, body').animate({ scrollTop: er_ofset - 100 }, 100);

        atr = $(this).closest('.ionTabs__item').attr('data-name');
        $(this).closest('.cart__stages').find('.cart__tabs').find('li').each(function(){
          if ($(this).attr('data-target') == atr && $(this).find('span').length == 0) {
            $(this).append('<span>не заполнены поля</span>');
          }
        })
      }
    })

    if (kol_er == 0) {
      next = $(".cart__tabs li.ionTabs__tab_state_active").next();
      $(".cart__tabs li.ionTabs__tab_state_active").removeClass('ionTabs__tab_state_active');
      next.trigger('click');
      $(this).closest('.cart__stages').find('.cart__tabs').find('li').each(function(){
        if ($(this).attr('data-target') == atr && $(this).find('span').length > 0) {
          $(this).find('span').detach();
        }
      })
      next.find('.denied').detach();
      $('html, body').animate({ scrollTop: next.offset().top - 100 }, 100);
    }
  })
  
  $('.cart__tabs li').each(function(){
    if (! $(this).hasClass('ionTabs__tab_state_active')) {
      $(this).append('<div class="denied"></div>');
    }
  })

  $('.denied').on('click', function(e){
    e.stopPropagation();
    $(this).closest('.cart__stages').find('form').find('input').trigger( "blur" );

    var kol_er = 0;
    $(this).closest('.cart__stages').find('form').find('input').each(function(){
      if ($(this).hasClass('error')) {
        kol_er = kol_er + 1;
        er_ofset = $(this).closest('.cart__tab-content').find('input.error').offset().top;
        $('html, body').animate({ scrollTop: er_ofset - 100 }, 100);

        atr = $(this).closest('.ionTabs__item').attr('data-name');
        $(this).closest('.cart__stages').find('.cart__tabs').find('li').each(function(){
          if ($(this).attr('data-target') == atr && $(this).find('span').length == 0) {
            $(this).append('<span>не заполнены поля</span>');
          }
        })
      }
    })
    if (kol_er == 0) {
      $(this).closest('li').trigger('click');
      $(this).closest('.cart__stages').find('.cart__tabs').find('li').each(function(){
        if ($(this).attr('data-target') == atr && $(this).find('span').length > 0) {
          $(this).find('span').detach();
        }
      })
      $(this).detach();
    }
  })

  $('.ionTabs__item input').on('keyup change blur',function(){
    var kol_er = 0;
    atr = $(this).closest('.ionTabs__item').attr('data-name');
    $(this).closest('.ionTabs__item').find('input').each(function(){
      if ($(this).hasClass('error')) {
        kol_er = kol_er + 1;

        atr = $(this).closest('.ionTabs__item').attr('data-name');
        $(this).closest('.cart__stages').find('.cart__tabs').find('li').each(function(){
          if ($(this).attr('data-target') == atr && $(this).find('span').length == 0) {
            $(this).append('<span>не заполнены поля</span>');
          }
        })
      }
    })
    if (kol_er == 0) {
      $(this).closest('.cart__stages').find('.cart__tabs').find('li').each(function(){
        if ($(this).attr('data-target') == atr && $(this).find('span').length > 0) {
          $(this).find('span').detach();
        }
      })
    }
  })

  $('.cart-result__input-submit input').click(function(){
    var kol_er = 0;
    $(this).closest('form').find('input').each(function(){
     if ($(this).hasClass('error')) {
      kol_er = kol_er + 1;
    }
  })
    if (kol_er > 0) {
      tabs_ofs = $('.cart__tabs').offset().top;
      $('html, body').animate({ scrollTop: tabs_ofs - 100 }, 100);
    }
    if (kol_er == 0) {
      $(this).closest('form').submit();
    }
  })
  
  $('.cart-result__shipping-title-block .cart-result__edit-button').click(function(e){
    e.preventDefault();
    $(".cart__tabs li.ionTabs__tab_state_active").removeClass('ionTabs__tab_state_active');
    $(".cart__tabs li:first-child").trigger('click');
  })
})
$(document).ready(function () {

    window.BXReady.Market.Menu = {

	flexButtonWidth: 50,
	fixedTop: 0,
	fixedHeight: 0,

	init: function () {
	    window.BXReady.Market.Menu.resize();
	    if ($('ul.bxr-flex-menu').is('.menu-level2'))
		window.BXReady.Market.Menu.resizeLevel2();
	    window.BXReady.Market.Menu.resizeWidth();
	    window.BXReady.Market.Menu.searchForm();
	    window.BXReady.Market.Menu.fixed();
	    window.BXReady.Market.Menu.createMobileMenu();

	    $(window).resize(function () {
		window.BXReady.Market.Menu.resize();
		if ($('ul.bxr-flex-menu').is('.menu-level2'))
		    window.BXReady.Market.Menu.resizeLevel2();
		window.BXReady.Market.Menu.resizeWidth();
		//window.BXReady.Market.Menu.fixed();
	    });

	},

	showMenu: function () {
	    var menu = $('.bxr-top-menu');
	    menu.css("visibility", "visible");
	    menu.data("visibility", "1");
	},

	resizeWidth: function () {
	    fullWidth = $('ul.bxr-flex-menu').width();
	    fullLiWidth = 0;
	    p1 = 0;
	    i = 0;
	    j = 0;

	    $('ul.bxr-flex-menu > li:visible').each(function () {
		if ($(this).is(".other") || $(this).is(".li-visible"))
		    ++j;
		else {
		    ++i;
		    fullLiWidth += $(this).width();
		}
	    });

	    p1 = fullWidth / 100;
	    lastElement = 0;

	    if ($('.bxr-top-menu > li.other').is(":visible"))
		lastElement += 55;

	    if ($('.bxr-top-menu > li.li-visible').length > 0)
		lastElement += 50;

	    width = (fullWidth - fullLiWidth - lastElement) / i;

	    $('ul.bxr-flex-menu > li:visible').each(function () {
		w = 0;
		if (!$(this).is(".other") && !$(this).is(".li-visible")) {
		    w = Math.floor(($(this).width() + width) / p1);
		    w = Math.floor(($(this).width() + width));
		    fullLiWidth += $(this).width(w + "px");
		}
	    });

	    window.BXReady.Market.Menu.showMenu();

	},

	fixed: function () {

	    fixedElement = $('ul.bxr-flex-menu').parents(".bxr-v-line_menu");

	    if (fixedElement.data("fixed") != "Y")
		return;

	    fixedElement = fixedElement.parents(".bxr-menuline");

	    fixedTop = fixedElement.offset().top;

	    fixedElement.on('affix.bs.affix', function () {
		$(this).css({"box-shadow": "0 1px 5px rgba(0, 0, 0, 0.136)"});
	    });

	    fixedElement.on('affix-top.bs.affix', function () {
		$(this).css({"box-shadow": "none"});
	    });

	    var windowHeight = $(window).height();
	    var bodyHeight = $(document).height();

	    if (bodyHeight > (950 + fixedElement.height())) {
		fixedElement.affix({
		    offset: {
			top: function (e) {
			    $(".title-search-result").hide();
			    e.css({"top": "-2px", "z-index": "1015"});
			    return fixedTop;
			}
		    }
		});

		fixedElement.on('affix.bs.affix', function () {

		    var tWirth = $(document).width();
		    if (tWirth == 0)
			tWirth = screen.width;

		    if (tWirth < 992) {
			$(this).css({"box-shadow": "none"});
			$(this).removeClass('affix');
			return false;
		    }
		});
	    }

	},

	resizeLevel2: function () {
	    stock = 100;
	    line = $('ul.bxr-flex-menu > .selected > ul');
	    fullWidth = $('ul.bxr-flex-menu').width() - stock;

	    var tWirth = window.outerWidth;
	    if (tWirth == 0)
		tWirth = screen.width;

	    if (tWirth < 768 && $('ul.bxr-flex-menu').css('display') != 'none') {
		return;
	    }

	    allWidth = 0;
	    displayWidth = 0;
	    flagFull = false;
	    e = 0;

	    line.find('>li').each(function () {
		allWidth += $(this).width();
		if (fullWidth > allWidth) {
		    ++e;
		    displayWidth += $(this).width();
		}
	    });

	    line.find('>li:lt(' + (e) + ')').css("display", "block");

	    if (fullWidth < allWidth)
		flagFull = true;

	    if (displayWidth != 0) {
		$('ul.bxr-flex-menu').height(81);
	    }

	    if (flagFull) {
		line.find(".level2").remove();
		addHTML = '<li class="level2"><a href="#"><span class="glyphicon glyphicon-option-horizontal"></span></a>';
		strAddUL = '<ul>';

		line.find('>li:gt(' + (e - 1) + ')').each(function () {

		    $(this).css("display", "none");
		    strAddUL += '<li class="l-2">' + $(this).children('a').get(0).outerHTML + '</li>';
		});

		strAddUL += '</ul></li>';
		$('ul.bxr-flex-menu > .selected > ul').append(addHTML + strAddUL);
		leve2Width = $('.level2 > ul').width();

		if ((displayWidth + leve2Width) > (fullWidth + stock))
		    $('.level2 > ul').css("left", (fullWidth - displayWidth - leve2Width + stock) + "px");

	    }
	},

	resize: function () {

	    $('ul.bxr-flex-menu').css('width', '100%');
	    fullWidth = $('ul.bxr-flex-menu').width();

	    var tWirth = window.outerWidth;
	    if (tWirth == 0)
		tWirth = screen.width;

	    if (tWirth < 768 && $('ul.flex-menu').css('display') != 'none') {
		return;
	    }

	    $('ul.bxr-flex-menu>li').each(function () {
		$(this).css('display', 'block');
		if (!$(this).is('.other') && !$(this).is('.li-visible'))
		    $(this).css('width', 'auto');
	    });

	    $('#bxr-flex-menu-li').css('display', 'none');


	    maxWidth = $('ul.bxr-flex-menu').width() - 30 - window.BXReady.Market.Menu.flexButtonWidth;

	    allWidth = 0;
	    flagFull = false;
	    lastFull = false;

	    $('ul.bxr-flex-menu > li > ul > li').each(function () {
		if ($(this).children("ul").length > 0) {
		    $(this).children("a").addClass('sub-item');
		}
	    });


	    $('ul.bxr-flex-menu>li>a').each(function () {

		lastFull = $(this);

		$(this).data('visible', 1);
		$(this).parent().data('visible', 1);

		if ($(this).is('#bxr-flex-menu-li')) {
		    $(this).parent().css('width', window.BXReady.Market.Menu.lastItemWidth + 'px');
		}

		if (!$(this).is('#bxr-flex-menu-li') && !flagFull) {
		    if ($(this).parent().css('display') == 'none') {
			$(this).parent().css('display', 'block');
		    }

		    oldWidth = allWidth;
		    paddingAdd = 0;

		    if ($(this).parent().children("ul").length > 0) {
			$(this).addClass('sub-item');
		    }

		    paddingAdd = parseInt($(this).css('padding-left')) + parseInt($(this).css('padding-right'));
		    allWidth += $(this).width() + paddingAdd + 2;

		    if (maxWidth < allWidth) {
			allWidth = oldWidth;
			$(this).parent().css('display', 'none');
			flagFull = true;
			$(this).data('visible', 0);
			$(this).parent().data('visible', 0);
		    }
		} else {
		    $(this).parent().css('display', 'none');
		    $(this).data('visible', 0);
		    $(this).parent().data('visible', 0);
		}

	    });


	    if (!flagFull) {
		delta = 0;
		if ($('ul.bxr-flex-menu').hasClass('compound')) {
		    $('ul.bxr-flex-menu').css({
			'width': (allWidth) + 'px',
			'float': 'right'
		    });
		    lastFull.parent().addClass('last');
		}
		$('ul.bxr-flex-menu').css('overflow', 'visible');
		return;
	    } else {
		enableWidth = maxWidth - window.BXReady.Market.Menu.flexButtonWidth;
	    }

	    if (flagFull) {
		$('#bxr-flex-menu-li').css('width', window.BXReady.Market.Menu.flexButtonWidth + 'px').css('display', 'block');
		$('#bxr-flex-menu-li').html('');
		addHTML = '<a href="#"><span class="fa fa-ellipsis-h"></span></a>';
		strAddUL = '<ul>';

		divMenu = "bxr-top-menu-other";
		if ($("ul.bxr-top-menu").data("style-menu") == "colored_light")
		    divMenu += " menu-arrow-top";

		liHover = "";
		switch ($("ul.bxr-top-menu").data("style-menu-hover")) {
		    case "colored_color":
			liHover = "bxr-color-flat bxr-bg-hover-dark-flat";
			break;
		    case "colored_light":
			liHover = "bxr-bg-hover-flat";
			break;
		}

		var ie = 0;
		$('ul.bxr-flex-menu>li').each(function () {

		    if (
			    !$(this).is('.other')
			    && !$(this).is('.li-visible')
			    && $(this).data('visible') == 0) {
			strAddUL += '<li class="l-2 ' + liHover + '">' + $(this).children('a').get(0).outerHTML + '</li>';
			++ie;
		    }
		});

		$('.li-visible').css('display', 'inline-block');

		strAddUL += '</ul>';
		strAddUL = "<div class='" + divMenu + "'>" + strAddUL + "</div>";

		$('#bxr-flex-menu-li').html(addHTML + strAddUL);
		otherWidth = $('.other').width();
		otherUlWidth = $('.other > ul').width();
		$('.other > ul').css('left', (otherWidth - otherUlWidth));
		if (ie == 0)
		    $('#bxr-flex-menu-li').css('display', 'none');
	    } else {
		$('#bxr-flex-menu-li').css('display', 'none');
		lastFull.parent().addClass("last");
	    }


	    if ($('ul.bxr-flex-menu').hasClass('compound')) {
		$('ul.bxr-flex-menu').css({
		    'width': allWidth + 40 + window.BXReady.Market.Menu.flexButtonWidth + 'px',
		    'float': 'right'
		});
	    }

	    $('ul.bxr-flex-menu').css('overflow', 'visible');

	    if ($('ul.bxr-flex-menu').hasClass('compound')) {
		$('ul.bxr-flex-menu').css({
		    'width': 'auto',
		    'height': 'auto'
		});
	    }
	},

	searchForm: function () {
	    $("ul.bxr-flex-menu  > li .fa-search").parents("a").on('click', function () {
		e = $('#search-line').parents(".dcontainer").find(".dcontainer");
		e = $('#bxr-menu-search-line');

		if (e.is(":visible"))
		    e.fadeOut();
		else
		    e.fadeIn();

		return false;
	    });

	    $("#search-line .big_search").on('click', function () {
		e = $('#search-line').parents(".dcontainer").find(".dcontainer");
		m = $('.dcontainer-search-form').parents(".dcontainer").find("> .container");
		e.css("display", "none");
		m.css("display", "block");
		return false;
	    });
	},

	createMobileMenu: function () {
	    addHTML = '<div id="bxr-mobile-menu-content">';

	    identity = 0;
	    submenyHTML = "";
	    $('ul.bxr-flex-menu>li').each(function () {
		identity++;
		if ($(this).data('nomobile') != 1 && !$(this).is('#bxr-flex-menu-li') && !$(this).is('.li-visible')) {
		    addNode = false;
		    submenyHTML += '<div class="bxr-children-color-hover" data-main="1" data-active="0" data-item="' + identity + '">';
		    submenyHTML += $(this).children("a").get(0).outerHTML;
		    submenyHTML += '</div>';

		    if ($(this).children("div").children("ul").length > 0) {
			addNode = true;
			submenyHTML += '<div class="submenu_item" data-parent="' + identity + '">';
			$(this).children("div").children("ul").children("li").each(function () {
			    textThis = $(this).clone();
			    textThis.find("img").remove();
			    textThis.find("ul").remove();
			    textThis.find("i").remove();
			    submenyHTML += "<div class='bxr-children-color-hover'>" + textThis.html() + "</div>";
			});
			submenyHTML += '</div>';
		    } else if ($(this).children("div.bxr-list-hover-menu").children("div.bxr-element-hover-menu").length > 0) {
			addNode = true;
			submenyHTML += '<div class="submenu_item" data-parent="' + identity + '">';
			$(this).children("div.bxr-list-hover-menu").children("div.bxr-element-hover-menu").each(function () {
			    textThis = $(this).children(".bxr-element-content").clone();
			    textThis.find("img").remove();
			    textThis.find("ul").remove();
			    textThis.find("i").remove();
			    submenyHTML += "<div class='bxr-children-color-hover'>" + textThis.html() + "</div>";
			});
			submenyHTML += '</div>';
		    }
		}
	    });

	    addHTML += submenyHTML + '</div><div class="clearfix"></div>';

	    $('#bxr-mobile-menu-body').html(addHTML);
	    $('#bxr-mobile-menu-body div.submenu_item').each(function () {
		$('#bxr-mobile-menu-body div[data-item=' + $(this).data('parent') + ']').children('a').addClass('sub-item');
	    });
	    this.initMobileMenuEvents();
	    $('#bxr-mobile-menu-body div').each(function () {
		if ($(this).data("parent") != undefined)
		    $(this).find("span").remove();
	    });
	},

	initMobileMenuEvents: function () {
	    $(document).on(
		    'click',
		    '#bxr-menuitem',
		    function () {
			if ($('#bxr-mobile-menu-content').css('display') == 'none') {
			    $('#bxr-mobile-menu-content').slideDown(200);
			} else {
			    $('#bxr-mobile-menu-content').slideUp(200);
			}
		    }
	    );

	    $(document).on(
		    'click',
		    '#bxr-menu-search-form',
		    function () {
			if ($('.bxs-search-mobil-menu').css('display') == 'none') {
			    $('.bxs-search-mobil-menu').slideDown(200);
			} else {
			    $('.bxs-search-mobil-menu').slideUp(200);
			}
		    }
	    );

	    $(document).on(
		    'click',
		    '#bxr-mobile-menu-content > div > a.sub-item',
		    function () {
			if ($(this).parent().is('div.submenu_item'))
			    return;

			nItem = $(this).parent().data('item');

			if ($(this).data('show') == 1) {
			    var element = this;
			    $("div [data-parent=" + nItem + "]").slideUp(200, function () {
				pItem = $("div [data-item=" + nItem + "]").children('a');
				pItem.data('show', 0);
				pItem.removeClass('hover');
				pItem.parent("div").removeClass("bxr-color-flat");
			    });
			} else {
			    $("div [data-parent=" + nItem + "]").slideDown(200, function () {
				pItem = $("div [data-item=" + nItem + "]").children('a');
				pItem.data('show', 1);
				pItem.addClass('hover');
				pItem.parent("div").addClass("bxr-color-flat");
			    });
			}

			return false;
		    }
	    );
	}

    }

    $(document).ready(function () {
	window.BXReady.Market.Menu.init();
    });
});
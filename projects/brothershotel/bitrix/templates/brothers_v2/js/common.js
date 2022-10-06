$(function() {

	$('.sliderHeader').slick({
			dots: true
		});

	$(".toggle_mnu").click(function() {
		$(".sandwich").toggleClass("active");
		$(".menuHeader").toggleClass("activeMenu")
	});

	//E-mail Ajax Send
	//Documentation & Example: https://github.com/agragregra/uniMail
	$("form").submit(function() { //Change
		var th = $(this);
		$.ajax({
			type: "POST",
			url: "mail.php", //Change
			data: th.serialize()
		}).done(function() {
			alert("Thank you!");
			setTimeout(function() {
				// Done Functions
				th.trigger("reset");
			}, 1000);
		});
		return false;
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
	
	$('.ui-accordion-header').click(function() {
		$(this).parent().find('.sliderHeader').slick('setPosition');
	});


});
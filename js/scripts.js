

$(function() {
	$('.main-gallery').flickity({
		cellAlign: 'left',
		contain: true,
		imagesLoaded: true,
		pageDots: false,
		prevNextButtons: false,
		autoPlay: true,
		wrapAround: true
	});

	$(".entry-submenu-button").click(function(e) {
		e.preventDefault();
		$(".entry-submenu").toggle();
	});

	$("#mainMobileNavigation").click(function(e) {
		e.preventDefault();
		$("#mobileMenu").toggle();
		if($("#content").css("opacity") == 0) {
			$("#content").css("opacity", 1);
			$("#colophon").css("opacity", 1);
		} else {
			$("#content").css("opacity", 0);
			$("#colophon").css("opacity", 0);
		}
	});

	$("#desktop-sub-menu .menu-item-has-children").hover(function() {
		$(this).children("ul.sub-menu").toggle();
	}, function() {
		$(this).find("ul.sub-menu").toggle();
	});

	while(parseInt($("#desktop-sub-menu ul").css("width")) > 850) {
		if($("#desktop-sub-menu ul li:last-of-type").hasClass("current_page_item")) {
			$("#desktop-sub-menu ul li:nth-last-of-type(2)").remove();
		} else {
			$("#desktop-sub-menu ul li:last-of-type").remove();
		}
		$(".entry-submenu-holder").css("display", "block");
	}

});


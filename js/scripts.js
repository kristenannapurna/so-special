

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
});


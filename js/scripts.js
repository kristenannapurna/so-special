

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
		if($("#content").css("opacity") === 0 || $("#colophon").css("opacity") === 0) {
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

	var ulMaxWidth = $(".page-heading").width() - ($(".entry-title").width() + realWidth($(".entry-submenu-holder")) + ($("#desktop-sub-menu .menu").outerWidth() - $("#desktop-sub-menu .menu").innerWidth()));
	while(parseInt($("#desktop-sub-menu ul").css("width")) > ulMaxWidth) {
		if($("#desktop-sub-menu ul li:last-of-type").hasClass("current_page_item")) {
			$("#desktop-sub-menu ul li:nth-last-of-type(2)").remove();
		} else {
			$("#desktop-sub-menu ul li:last-of-type").remove();
		}
		$(".entry-submenu-holder").css("display", "block");
	}

	windowResize();
	
	$(window).resize(function() {
		windowResize();
	});

});

function realWidth(obj){
    var clone = obj.clone();
    clone.css("visibility","hidden");
    $('body').append(clone);
    var width = clone.outerWidth();
    clone.remove();
    return width;
}

function windowResize() {
	setCursor();
	setSubMenu();
	setContentPaddingTop();
	setHeight(heightElements);
}

function setContentPaddingTop() {
	$("#content").css("padding-top", $("header").height());
}

function setSubMenu() {
	var ulMaxWidth = $(".page-heading").width() - ($(".entry-title").width() + realWidth($(".entry-submenu-holder")) + ($("#desktop-sub-menu .menu").outerWidth() - $("#desktop-sub-menu .menu").innerWidth()));
	while(parseInt($("#desktop-sub-menu ul").css("width")) > ulMaxWidth) {
		if($("#desktop-sub-menu ul li:last-of-type").hasClass("current_page_item")) {
			$("#desktop-sub-menu ul li:nth-last-of-type(2)").remove();
		} else {
			$("#desktop-sub-menu ul li:last-of-type").remove();
		}
		$(".entry-submenu-holder").css("display", "block");
	}
}

function setCursor() {
	var offset = $("#content-cursor").offset().left - $("#content-cursor").position().left;
	var menuItem = $('#secondary-nav li.' + $('#content-cursor').data('post-parent'));
	if (menuItem.length){
		$("#content-cursor").css("left",(
			menuItem.position().left + ( menuItem.width() / 5) - offset)
		);
	} else {
		return;
	}
}

var heightElements = ['.entry-content', '.faqs', '.left-sidebar', '.right-sidebar'];
// var heightElements = ['.entry-content'];	

function setHeight(element){
		var viewport = $(window).height();
		var headers = $('.main-nav').outerHeight() + $('.secondary-nav').outerHeight();
		var contentPadding = $(".content-area").outerHeight() - $(".content-area").height();
		var heading = $('.page-heading').outerHeight();

		var elementHeight = viewport - headers - contentPadding - heading - 30 + "px";

		console.log("viewport - (main-nav + secondary-nav) - contentPadding - page heading = ");
		console.log(viewport + " - (" + $(".main-nav").outerHeight() + " + " + $('.secondary-nav').outerHeight() + ") - " + contentPadding + " = " + elementHeight);
		$(element).each(function(index, element){
			$(element).css('height', (
				elementHeight)
				);
		});
	}


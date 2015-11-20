

$(function() {

	//toggle contact page

	$('.contact-page li').on('click', function(e){
		e.preventDefault();
		$('.contact-page li').removeClass('current_page_item');
		$(this).addClass('current_page_item');

		var location = $(this).find('a').data('location');
		$('.map-view').css('display', 'none');
		$('#'+location).css('display', 'block');
		if($(".map-view").size() >= 1) {
			map.loadMap();
			map.loadMarkers();
		}
	});



	$(".entry-submenu-button").click(function(e) {
		e.preventDefault();
		$(".entry-submenu").toggle();
	});

	$("#mainMobileNavigation").click(function(e) {
		e.preventDefault();
		$("#mobileMenu").toggle();
		if(parseInt($("#content").css("opacity")) === 0 || parseInt($("#colophon").css("opacity")) === 0) {
			$("#content").css({"opacity": 1, "display":"block"});
			$("#colophon").css({"opacity": 1, "display":"block"});
		} else {
			$("#content").css({"opacity": 0, "display":"none"});
			$("#colophon").css({"opacity": 0, "display":"none"});
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
	setHeight(heightElements);
	setSlideshow();
	
	$(window).resize(function() {
		windowResize();
		setSlideshow();
	});

	//load the maps! 
	if($(".map-view").size() >= 1) {
		map.loadMap();
		map.loadMarkers();
	}
});

//end of doc ready

function realWidth(obj){
	var clone = obj.clone();
	clone.css("visibility","hidden");
	$('body').append(clone);
	var width = clone.outerWidth();
	clone.remove();
	return width;
}

var wait = true;
function windowResize() {

	if($("#content-cursor").size() > 0) {
		setCursor();
	}
	setSubMenu();
	if($(".home").size() > 0) {
		setHeight(heightElements);
	} else {
		wait = false;
	}

	if(wait) {
		setTimeout(function() {
			setContentPaddingTop();
		}, 100);
		wait = false;
	} else {
		setContentPaddingTop();
	}
}

function setContentPaddingTop() {
	$("#content").css("padding-top", $("header").height() - 1);
	$("#mobileMenu").css("top", $("header").height() - 1);
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

var heightElements = ['.entry-content', '.faqs', '.left-sidebar', '.right-sidebar', '.archive-list:only-of-type'];
// var heightElements = ['.entry-content'];	

function setHeight(element){

	if($(".main-nav .mobile-navigation").css("display") == "block") {
		$(element).each(function(index, element){
			$(element).css("height", "");
		});
		return;
	}

	var viewport = $(window).height();
	var headers = $('.main-nav').outerHeight() + $('.secondary-nav').outerHeight();
	var contentPadding = ($(".content-area").outerHeight() - $(".content-area").height());
	var faqPadding = $('.faqs').outerHeight() - $('.faqs').height();
	var heading = $('.page-heading').outerHeight();
	var elementHeight = viewport - headers - contentPadding - heading - 50 + "px";
	var faqHeight = viewport - headers - faqPadding - heading + 'px';

	$(element).each(function(index, element){
		if (element === '.faqs' || element === '.left-sidebar' || element === '.right-sidebar'){
				// console.log('I am setting ' + element + ' to ' + faqHeight);
				$(element).css('height', (
					faqHeight)
				);
			} else{
				// console.log('I am setting ' + element + ' to ' + faqHeight);
				$(element).css('height', (
					elementHeight)
				);
			}
		});
}


function setSlideshow(){
	setTimeout(function () {
		var secondaryNavHeight = ($('.secondary-nav').css('display')=='none') ? -1 : $('.secondary-nav').outerHeight();
		var headersHeight = $('.main-nav').outerHeight() + secondaryNavHeight;
		var viewport = $(window).height();
		var sliderHeight = viewport - headersHeight + 'px';
		$('.cycloneslider-template-default .cycloneslider-slides').animate(
			{height:sliderHeight}, 100);
	}, 100);
}

//build zee map!

var map = {};

map.loadMap = function(){
	var mapOptionsBrampton = {
		center: { 
			lat: 43.6817224,
			lng: -79.7172389
		},
		zoom: 15
	};

	var mapOptionsEtobicoke = {
		center: { 
			lat: 43.6493002,
			lng: -79.5034905
		},
		zoom: 16
	};
	var brampton = $('#bramptonMap')[0];
	var etobicoke = $('#etobicokeMap')[0];

	map.bramptonMap = new google.maps.Map(brampton, mapOptionsBrampton);
	map.etobicokeMap = new google.maps.Map(etobicoke, mapOptionsEtobicoke);
};

map.loadMarkers = function() {

	var templateUrl = $('body').data('templateurl');

	var brampton = new google.maps.Marker({
		position: new google.maps.LatLng(43.6817224, -79.7172389),
		map: map.bramptonMap, 
		icon: templateUrl +'/img/mcclellandmapmarker.png',
		animation: google.maps.Animation.BOUNCE

	});

	var infoWindow = new google.maps.InfoWindow();
  //listen for a click on the previous marker 
  google.maps.event.addListener(brampton, 'click', function(){
  	infoWindow.setContent($('#brampton address')[0]);
  	infoWindow.open(map.bramptonMap, this);
  }); 

  var etobicoke = new google.maps.Marker({
  	position: new google.maps.LatLng(43.6493002, -79.5034905),
  	map: map.etobicokeMap, 
  	icon: templateUrl +'/img/mcclellandmapmarker.png',
  	animation: google.maps.Animation.BOUNCE

  });

  // var infoWindow = new google.maps.InfoWindow();

  //listen for a click on the previous marker 
  google.maps.event.addListener(brampton, 'click', function(){
  	infoWindow.setContent($('#etobicoke address')[0]);
  	infoWindow.open(map.etobicokeMap, this);
  });




};
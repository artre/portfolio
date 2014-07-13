// All small JS functions and scripts.

// Global variables.
var templateName;
var legalMapHeight;
var eventtype;
var neededHeight;
var tickersHeight;
var legalContentHeightCollapsed;
var legalContentHeightExpanded;
var windowWidth 		 = $(window).width();
var windowHeight 		 = $(window).height();
var iconArr				 = [];
var tempArr				 = [];
var mapDiv				 = $("#mapdiv");
var newsContainer		 = $("#news-container");
var videoContainer		 = $("#video-container");
var tweetsContainer		 = $("#tweets-container");
var legalMenuList		 = $("#legal-nav > ul");
var legalContent		 = $("#legal-content");
var footerSlider		 = $("#footer-slider");
var subscribeForm		 = $("#subscribe-form");
var tickers				 = $('#exchange-tickers');
var tickerSection		 = tickers.find("section");
var tickerChildOneTwo	 = tickers.find("#bitstamp-ticker, #btce-ticker");
var tickerChildThreeFour = tickers.find("#btcchina-ticker, #huobi-ticker");
var secondaryNavChildren = $("#secondary-nav").children();
var categories			 = $("#wallet-categories").children();
var connectSideNav		 = $("#item-nav").children("#cssmenu");
var educationSideNav	 = $("#edu-sidenav").children("#cssmenu");
var titleHeight			 = $(".news-title").height();
var wpadminHeight		 = $("#wpadminbar").height();
var headerHeight		 = $("#header-wrap").height();
var legalMenuWrapHeight	 = $("#legal-menu-wrap").height();
var footerToggle		 = $("#footer-toggle");
var footerToggleButton	 = footerToggle.children("i");
var footerHeigght		 = footerToggle.height();
var legalMove			 = $("#legal-move");
var legalMoveIcon		 = legalMove.children("i");
var businesList			 = $("#wallet-list");
var businesListLi		 = businesList.find("ul li");

// Check if this is a mobile or tablet.
function mobilecheck() {
	var check = false;

	(function(a) {
		if (/(android|ipad|playbook|silk|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true
	})(navigator.userAgent || navigator.vendor || window.opera);
	return check;
}
// === END OF mobilecheck() === //
// set heigt of content in Legal section.
function changeContentHeight() {
	if (windowWidth > 1189) {
    	legalMapHeight = Math.round(windowHeight * 0.51);
    }	else if ((windowWidth < 1189) && (windowWidth > 889)) {
    	legalMapHeight = Math.round(windowHeight * 0.45);
    }	else if ((windowWidth < 889) && (windowWidth > 589)) {
    	legalMapHeight = Math.round(windowHeight * 0.60);
    }

	legalContentHeightExpanded = Math.round(windowHeight - (headerHeight + footerHeigght + legalMenuWrapHeight + 100));
	legalContentHeightCollapsed = Math.round(windowHeight * 0.28);

	if (templateName === "legal-countries-page.php") {
		legalMoveIcon.removeClass("map-expand");
		legalContent.height(legalContentHeightCollapsed);
	} else {
		legalMoveIcon.addClass("map-expand");
		legalContent.height(legalContentHeightExpanded);
	}
}
// === END OF changeContentHeight() === //

// Add functionality to secondary navigation menu (#secondary-nav) in header and subscribe button (#footer-subscribe) in footer.
function showHideSecondaryNav() {
	// Show / hide: #language-list. / #log-insert-wrap / #search-insert.
	secondaryNavChildren.on("click", function(e) {
		e.stopPropagation();
		$(this).children().fadeIn(200);
		$(this).siblings().children("div").fadeOut(200);
		subscribeForm.fadeOut(200);
	});

	$("#footer-subscribe").on("click", function(e) {
		e.stopPropagation();
		$(this).children("#subscribe-form").fadeIn(200);
		secondaryNavChildren.children("div").fadeOut(200);
	});

	// Hide #log-insert-wrap, #search-insert and #language-list.
	$('html').on("click", function() {
		secondaryNavChildren.children("div").fadeOut(200);
		subscribeForm.fadeOut(200);
	});

	// Show submenu in #log-insert-wrap.
	$('li.menupop').on('hover', function() {
		$(this).children('div.ab-sub-wrapper').toggle();
	})
}
// === END OF showHideSecondaryNav() === //

// Count height for #news-container / #video-container / #tweets-container
function getDynamicHeight() {
	if (windowWidth > 1189) {
		neededHeight = windowHeight - (headerHeight + tickersHeight + titleHeight + footerHeigght + wpadminHeight + 75);
	}

	if ((windowWidth < 1190) && (windowWidth > 889)) {
		neededHeight = windowHeight - (headerHeight + tickersHeight + titleHeight + footerHeigght + wpadminHeight + 55);
	}

	if ((windowWidth < 890) && (windowWidth > 589)) {
		neededHeight = windowHeight - (headerHeight + tickersHeight + titleHeight + footerHeigght + wpadminHeight + 20);
	}

	if (windowWidth < 590) {
		neededHeight = windowHeight - (headerHeight + footerHeigght + wpadminHeight + 110);
	}

    newsContainer.height(neededHeight);
    videoContainer.height(neededHeight);
    tweetsContainer.height(neededHeight);
}
// === END OF getDynamicHeight() === //

// Set all divs in one "row" the same height.
function setMaxHeight() {
	businesListLi.each(function() {
		$(this).children().each(function(i) {
			$(this).addClass("row-" + i);
		});
	});

	categories.each(function(i) {
		$(this).addClass("row-" + i);

		$(".row-" + i).each(function(j) {
			tempArr[j] = $(this).height();
		});

		$(".row-" + i).height(Math.max.apply(Math, tempArr));
	});
}
// === END OF setMaxHeight() === //

// Move divs in / out tab elements on News page.
function moveNewsOnSmallScreen() {
	if (windowWidth < 590) {
		tickers.prependTo("#exchange-tickers-mobile");
		videoContainer.prependTo("#video-container-mobile");
		tweetsContainer.prependTo("#tweets-container-mobile");
		newsContainer.prependTo("#news-container-mobile");
	} else {
		tickers.prependTo("#tickers-content");
		newsContainer.appendTo("#news-wrap");
		tweetsContainer.appendTo("#tweets-wrap");
		videoContainer.appendTo("#video-wrap");
	}
}
// === END OF moveNewsOnSmallScreen() === //

// Move divs in / out tab elements on Reviews section.
function moveWalletOnSmallScreen() {
	if (windowWidth < 590) {
		$(".wallet-left").prependTo(".mobile-rev-wallet-rate");
		$("#mod-rev-form").prependTo(".mobile-rev-wallet-form");
		$("#mod-rev-list").prependTo(".mobile-rev-wallet-list");
	} else {
		$(".wallet-left").prependTo(".tab-1");
		$("#mod-rev-form").prependTo(".tab-2");
		$("#mod-rev-list").prependTo(".tab-3");
	}
}
// === END OF moveWalletOnSmallScreen() === //

// Slide toggle footer.
function slideFooter(eventtype) {
	footerToggleButton.on(eventtype, function(e) {
		e.preventDefault();

		$(this).toggleClass("is-open");
		footerSlider.slideToggle(400);
	});

	$("#main").on(eventtype, function() {
		if (footerToggleButton.hasClass("is-open")) {
			footerToggleButton.removeClass("is-open");
			footerSlider.slideToggle(400);
		}
	});
}
// === END OF slideFooter() === //

// Make tickers "sticky".
function tickerFixed() {
	tickerSection.removeClass("sticky-position");

	if ((windowWidth < 890) && (windowWidth > 589)) {
		tickers.waypoint(function(direction) {
			if (direction === 'down') {
				tickerChildOneTwo.addClass("sticky-position");
				console.log("add 1");
			}
		}, { offset: '55' }).waypoint(function(direction) {
			if (direction === 'down') {
				tickerChildThreeFour.addClass("sticky-position");
				console.log("add 2");
			}
		}, { offset: '-30' }).waypoint(function(direction) {
			if (direction === 'up') {
				tickerChildOneTwo.removeClass("sticky-position");
				console.log("remove 1");
			}
		}, { offset: '55' }).waypoint(function(direction) {
			if (direction === 'up') {
				tickerChildThreeFour.removeClass("sticky-position");
				console.log("remove 2");
			}
		}, { offset: '-30' });
	}

	if ((windowWidth <= 1189) && (windowWidth > 889)) {
		tickerSection.waypoint(function(direction) {
			if (direction === 'down') {
				tickerSection.addClass("sticky-position");
			}
		}, { offset: '55' }).waypoint(function(direction) {
			if (direction === 'up') {
				tickerSection.removeClass("sticky-position");
			}
		}, { offset: '55' });
	}
}
// === END OF tickerFixed() === //

// Make side menu "sticky".		
function sideNavFixed() {
	connectSideNav.removeClass("sticky-position");
	educationSideNav.removeClass("sticky-position");

	if ((windowWidth <= 1189) && (windowWidth > 889)) {
		connectSideNav.waypoint(function(direction) {
			if (direction === 'down') {
				connectSideNav.addClass("sticky-position");
			}
		}, { offset: '55' }).waypoint(function(direction) {
			if (direction === 'up') {
				connectSideNav.removeClass("sticky-position");
			}
		}, { offset: '55' });

		educationSideNav.waypoint(function(direction) {
			if (direction === 'down') {
				educationSideNav.addClass("sticky-position");
			}
		}, { offset: '55' }).waypoint(function(direction) {
			if (direction === 'up') {
				educationSideNav.removeClass("sticky-position");
			}
		}, { offset: '55' });
	}

	if (windowWidth > 1189) {
		connectSideNav.waypoint(function(direction) {
			if (direction === 'down') {
				connectSideNav.addClass("sticky-position");
			}
		}, { offset: '0' }).waypoint(function(direction) {
			if (direction === 'up') {
				connectSideNav.removeClass("sticky-position");
			}
		}, { offset: '0' });		

		educationSideNav.waypoint(function(direction) {
			if (direction === 'down') {
				educationSideNav.addClass("sticky-position");
			}
		}, { offset: '0' }).waypoint(function(direction) {
			if (direction === 'up') {
				educationSideNav.removeClass("sticky-position");
			}
		}, { offset: '0' });
	}
}
// === END OF sideNavFixed() === //

jQuery(document).ready(function($) {
	windowWidth = $(window).width();
	windowHeight = $(window).height();
	tickersHeight = tickers.height();
	eventtype = mobilecheck() ? 'touchstart' : 'click';

	showHideSecondaryNav();
	getDynamicHeight();
	setMaxHeight();
	moveNewsOnSmallScreen();
	// moveWalletOnSmallScreen();
	slideFooter(eventtype);
	// tickerFixed();
	sideNavFixed();

	// Add mCustomScrollbar() to tweets list.
	$("#tweets-container").mCustomScrollbar({
		autoHideScrollbar: true,
		scrollInertia: 150,
		advanced: {
			updateOnContentResize: true,
		}
	});

	// Add mCustomScrollbar() to tables in Reviews section.
	businesList.mCustomScrollbar({
		scrollInertia: 150,
		horizontalScroll:true,
		advanced: {
			updateOnContentResize: true,
		}
	});

	// Add mCustomScrollbar() to content in Reviews section.
	legalContent.mCustomScrollbar({
		autoHideScrollbar: true,
		scrollInertia: 150,
		advanced:{
			updateOnContentResize: true
		}
	});

	// Change content height in Legal section. 
	changeContentHeight();

	legalMove.on("click", function() {
		if ( legalMoveIcon.hasClass("map-expand") ) {
			legalContent.height(legalContentHeightCollapsed);
			legalMoveIcon.removeClass("map-expand");
		} else {
			legalContent.height(legalContentHeightExpanded);
			legalMoveIcon.addClass("map-expand");
		}
		mapdiv.height(legalMapHeight);

		setTimeout(function() {
			legalContent.mCustomScrollbar("update");
		}, 500);
	});

	// Change 
	$(".panel-title").on("click", function(){
		$(this).find(".legal-faq-expand, .legal-faq-collapse").fadeToggle(200);
	});

	// Add icons to menu on Legal section.
	iconArr = [
		"<i class='fa fa-globe'></i>",
		"<i class='fa fa-flag'></i>",
		"<i class='fa fa-file-text-o'></i>",
		"<i class='fa fa-info-circle'></i>",
		"<i class='fa fa-file-o'></i>"
	];

	legalMenuList.children().each(function(i) {
		$(this).find("a").before(iconArr[i]);
	});

	// Adding Dynamicly pdf files to a modal window 
	$('.white-paper').click(function(){
		var url = $(this).find('#white-open-pdf').attr('data-pdf-url');
		//$('#myPdf').data('file-url', url);
		$('#myPdf').attr('data', url);
	});

	// Add a placeholder to the login inputs
	$('#user_login').attr( 'placeholder', 'Username' );
	$('#user_pass').attr( 'placeholder', 'Password' );

	// Show curent menu item in all menu with #cssmenu.
	$(".current-page-parent, .current-menu-item, .current-menu-ancestor").addClass("open").children("ul").css("display", "block");

	// Add class to elements to show them with little delay.
	$("#legal-container, #wallet-list, #wallet-categories, #news-container, #video-container, #tweets-container").addClass("show-list");
});

jQuery(window).on("resize", function($) {
	windowWidth = $(window).width();
	windowHeight = $(window).height();
	tickersHeight = tickers.height();

	getDynamicHeight();
	moveNewsOnSmallScreen();
	// moveWalletOnSmallScreen();
	// tickerFixed();
	sideNavFixed();
	changeContentHeight();
});
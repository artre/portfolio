// Sticky Tickers
// This is a function that makes tickers stick to the top of the page
/*!
 * enquire.js v2.1.0 - Awesome Media Queries in JavaScript
 * Copyright (c) 2014 Nick Williams - http://wicky.nillia.ms/enquire.js
 * License: MIT (http://www.opensource.org/licenses/mit-license.php)
 */
// var tickers = $('#exchange-tickers'),
// 	tickerSection = tickers.find("section"),
// 	tickerChildOneTwo = tickers.find("#bitstamp-ticker, #btce-ticker"),
// 	tickerChildThreeFour = tickers.find("#btcchina-ticker, #huobi-ticker"),
// 	educationSideNav = $("#edu-sidenav").children("#cssmenu"),
// 	connectSideNav = $("#item-nav").children("#cssmenu");
		
// function tickerFixed() {
// 	// Count window width
// 	var windowWidth = $("body").width();

// 	tickerSection.removeClass("sticky-position");

// 	if ((windowWidth < 890) && (windowWidth > 589)) {
// 		tickers.waypoint(function(direction) {
// 			if (direction === 'down') {
// 				tickerChildOneTwo.addClass("sticky-position");
// 				console.log("add 1");
// 			}
// 		}, {
// 			offset: '55'
// 		}).waypoint(function(direction) {
// 			if (direction === 'down') {
// 				tickerChildThreeFour.addClass("sticky-position");
// 				console.log("add 2");
// 			}
// 		}, {
// 			offset: '-30'
// 		}).waypoint(function(direction) {
// 			if (direction === 'up') {
// 				tickerChildOneTwo.removeClass("sticky-position");
// 				console.log("remove 1");
// 			}
// 		}, {
// 			offset: '55'
// 		}).waypoint(function(direction) {
// 			if (direction === 'up') {
// 				tickerChildThreeFour.removeClass("sticky-position");
// 				console.log("remove 2");
// 			}
// 		}, {
// 			offset: '-30'
// 		});
// 	}

// 	if ((windowWidth <= 1189) && (windowWidth > 889)) {
// 		tickerSection.waypoint(function(direction) {
// 			if (direction === 'down') {
// 				tickerSection.addClass("sticky-position");
// 			}
// 		}, {
// 			offset: '55'
// 		}).waypoint(function(direction) {
// 			if (direction === 'up') {
// 				tickerSection.removeClass("sticky-position");
// 			}
// 		}, {
// 			offset: '55'
// 		});
// 	}
// }

// function sideNavFixed() {
// 	var windowWidth = $("body").width();

// 	connectSideNav.removeClass("sticky-position");
// 	educationSideNav.removeClass("sticky-position");


// 	if ((windowWidth <= 1189) && (windowWidth > 889)) {
// 		connectSideNav.waypoint(function(direction) {
// 			if (direction === 'down') {
// 				connectSideNav.addClass("sticky-position");
// 			}
// 		}, {
// 			offset: '55'
// 		}).waypoint(function(direction) {
// 			if (direction === 'up') {
// 				connectSideNav.removeClass("sticky-position");
// 			}
// 		}, {
// 			offset: '55'
// 		});		


// 		educationSideNav.waypoint(function(direction) {
// 			if (direction === 'down') {
// 				educationSideNav.addClass("sticky-position");
// 			}
// 		}, {
// 			offset: '55'
// 		}).waypoint(function(direction) {
// 			if (direction === 'up') {
// 				educationSideNav.removeClass("sticky-position");
// 			}
// 		}, {
// 			offset: '55'
// 		});
// 	}

// 	if (windowWidth > 1189) {
// 		connectSideNav.waypoint(function(direction) {
// 			if (direction === 'down') {
// 				connectSideNav.addClass("sticky-position");
// 			}
// 		}, {
// 			offset: '0'
// 		}).waypoint(function(direction) {
// 			if (direction === 'up') {
// 				connectSideNav.removeClass("sticky-position");
// 			}
// 		}, {
// 			offset: '0'
// 		});		

// 		educationSideNav.waypoint(function(direction) {
// 			if (direction === 'down') {
// 				educationSideNav.addClass("sticky-position");
// 			}
// 		}, {
// 			offset: '0'
// 		}).waypoint(function(direction) {
// 			if (direction === 'up') {
// 				educationSideNav.removeClass("sticky-position");
// 			}
// 		}, {
// 			offset: '0'
// 		});
// 	}
// }

// jQuery(document).ready(function($) {
// 	// // tickerFixed();
// 	// sideNavFixed();

// 	// iOS check...ugly but necessary
// 	if (navigator.userAgent.match(/iPhone|iPad|iPod/i)) {
// 		$('.modal').on('show.bs.modal', function() {

// 			// Position modal absolute and bump it down to the scrollPosition
// 			$(this).css({
// 				position: 'absolute',
// 				marginTop: $(window).scrollTop() + 'px',
// 				bottom: 'auto'
// 			});

// 			// Position backdrop absolute and make it span the entire page
// 			//
// 			// Also dirty, but we need to tap into the backdrop after Boostrap
// 			// positions it but before transitions finish.
// 			//
// 			setTimeout(function() {
// 				$('.modal-backdrop').css({
// 					position: 'absolute',
// 					top: 0,
// 					left: 0,
// 					width: '100%',
// 					height: Math.max(
// 						document.body.scrollHeight, document.documentElement.scrollHeight,
// 						document.body.offsetHeight, document.documentElement.offsetHeight,
// 						document.body.clientHeight, document.documentElement.clientHeight
// 					) + 'px'
// 				});
// 			}, 0);
// 		});
// 	}
// });

// Make Tickers Stick to the top on screen resizing
// jQuery(window).on("resize", function($) {
// 	// tickerFixed();
// 	sideNavFixed();
// });
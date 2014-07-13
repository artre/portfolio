// // Move divs in / out tab elements
// function moveNewsOnSmallScreen() {
// 	var windowWidth = $("body").width();

// 	if (windowWidth < 590) {
// 		$("#exchange-tickers").prependTo("#exchange-tickers-mobile");
// 		$("#video-container").prependTo("#video-container-mobile");
// 		$("#tweets-container").prependTo("#tweets-container-mobile");
// 		$("#news-container").prependTo("#news-container-mobile");
// 	} else {
// 		$("#exchange-tickers").prependTo("#tickers-content");
// 		$("#news-container").appendTo("#news-wrap");
// 		$("#tweets-container").appendTo("#tweets-wrap");
// 		$("#video-container").appendTo("#video-wrap");
// 	}
// }

// function moveWalletOnSmallScreen() {
// 	var windowWidth = $("body").width();

// 	if (windowWidth < 590) {
// 		$(".wallet-left").prependTo(".mobile-rev-wallet-rate");
// 		$("#mod-rev-form").prependTo(".mobile-rev-wallet-form");
// 		$("#mod-rev-list").prependTo(".mobile-rev-wallet-list");
// 		console.log(1);
// 	} else {
// 		$(".wallet-left").prependTo(".tab-1");
// 		$("#mod-rev-form").prependTo(".tab-2");
// 		$("#mod-rev-list").prependTo(".tab-3");
// 		console.log(2);
// 	}
// }

// // Move #exchange-tickers, #news-container and #video-container into new divs.
// jQuery(document).ready(function($) {
// 	moveNewsOnSmallScreen();
// 	// moveWalletOnSmallScreen();
// });

// jQuery(window).on("resize", function($) {
// 	moveNewsOnSmallScreen();
// 	// moveWalletOnSmallScreen();
// });
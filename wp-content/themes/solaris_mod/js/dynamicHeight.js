// var tickersHeight = $("#exchange-tickers").height(),
//     titleHeight = $(".news-title").height(),
//     footerHeigght = $("#footer-toggle").height();
//     wpadminHeight = $("#wpadminbar").height();

// // Count height for #news-list / #video-list
// function getDynamicHeight() {
//     // Count window width
//     var windowWidth = $(window).width(),
//         windowHeight = $(window).height();

//     if (windowWidth > 1189) {
//         var windowHeight = $(window).height(),
//             headerHeight = $("#header-wrap").height(),
//             neededHeight = windowHeight - (headerHeight + tickersHeight + titleHeight + footerHeigght + wpadminHeight + 75);
//     }

//     if ((windowWidth < 1190) && (windowWidth > 889)) {
//         var windowHeight = $(window).height(),
//             headerHeight = $("#header-wrap").height(),
//             neededHeight = windowHeight - (headerHeight + tickersHeight + titleHeight + footerHeigght + wpadminHeight + 55);
//     }

//     if ((windowWidth < 890) && (windowWidth > 589)) {
//         var windowHeight = $(window).height(),
//             headerHeight = $("#header-wrap").height(),
//             neededHeight = windowHeight - (headerHeight + tickersHeight + titleHeight + footerHeigght + wpadminHeight + 20);
//     }

//     if (windowWidth < 590) {
//         var windowHeight = $(window).height(),
//             headerHeight = $("#header-wrap").height(),
//             neededHeight = windowHeight - (headerHeight + footerHeigght + wpadminHeight + 110);
//     }

//     $("#news-container").height(neededHeight);
//     $("#tweets-container").height(neededHeight);
//     $("#video-container").height(neededHeight);
// }

// // Set dynamic height to #news-container and #video-container.
// jQuery(document).ready(function($) {
//     getDynamicHeight();
// });

// jQuery(window).on("resize", function($) {
//     getDynamicHeight();
// });
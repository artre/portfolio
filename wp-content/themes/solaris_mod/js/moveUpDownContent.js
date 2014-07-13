jQuery(document).ready(function($) {
	
	 var windowWidth = $(window).width(),
        windowHeight = $(window).height();

// Adding ccs height of the #mapdiv and #legal-content dynamicly. 
function mapAndContentOnload() {
    if (windowWidth > 1189) {
    	legalContentHeight = Math.round($(window).height() * 0.28);
    	legalMapHeight = Math.round($(window).height() * 0.51);
    }	else if ((windowWidth < 1189) && (windowWidth > 889)) {
    	legalContentHeight = Math.round($(window).height() * 0.28);
    	legalMapHeight = Math.round($(window).height() * 0.45);
    }	else if (windowWidth < 889) {
    	legalContentHeight = Math.round($(window).height() * 0.28);
    	legalMapHeight = Math.round($(window).height() * 0.60);
    }
	$("#legal-content").css("height", legalContentHeight);
	$("#mapdiv").css("height", legalMapHeight);
}
	mapAndContentOnload();

    var legalContent = $("#legal-content");
    // Counting hight of #legal-content in compare to window hight 
    if (windowWidth > 1189) {	
		legalContentHeightCollapsed = Math.round($(window).height() * 0.27),
		legalContentHeightExpanded = Math.round($(window).height() * 0.73);
    } else if ((windowWidth < 1189) && (windowWidth > 889)) {  	
		legalContentHeightCollapsed =  Math.round($(window).height() * 0.27),
		legalContentHeightExpanded = Math.round($(window).height() * 0.72);
    } else if (windowWidth < 889) {
		legalContentHeightCollapsed =  Math.round($(window).height() * 0.27),
		legalContentHeightExpanded = Math.round($(window).height() * 0.72);
    }
    
    // On Click function to expand and collaps #legal-content
	$("#legal-move").on("click", function() {
		legalContent.toggleClass("map-collapsed");

		$(this).children("i").fadeToggle(1);
		
		if ( legalContent.hasClass("map-collapsed") ) {
			legalContent.height(legalContentHeightExpanded);
		} else {
			legalContent.height(legalContentHeightCollapsed);
		}

		setTimeout(function() {
			legalContent.mCustomScrollbar("update");
		}, 500);
	});
	// Vitalic sejested
//  $(window).resize(function(){
// callthefunction();
// })

	jQuery( window ).on( "orientationchange", function( event ) { 
		
		var windowWidth = $(window).width(),
        windowHeight = $(window).height();

        var legalContent = $("#legal-content");
    if (windowWidth > 1189) {	
		legalContentHeightCollapsed = 230,
		legalContentHeightExpanded = Math.round($(window).height() * 0.72);
    } else if ((windowWidth < 1189) && (windowWidth > 889)) {  	
		legalContentHeightCollapsed = 195,
		legalContentHeightExpanded = Math.round($(window).height() * 0.72);
    } else if (windowWidth < 889) {
		legalContentHeightCollapsed = 275,
		legalContentHeightExpanded = Math.round($(window).height() * 0.72);
    }
    	if ( legalContent.hasClass("map-collapsed") ) {
			legalContent.height(legalContentHeightExpanded);
		} else {
			legalContent.height(legalContentHeightCollapsed);
		}


	// Adding hight to #mapdiv depending on window height 
		if (windowWidth > 1189) {
    	legalMapHeight = Math.round($(window).height() * 0.51);
    }	else if ((windowWidth < 1189) && (windowWidth > 889)) {
    	legalMapHeight = Math.round($(window).height() * 0.45);
    }	else if (windowWidth < 889) {
    	legalMapHeight = Math.round($(window).height() * 0.60);
    }
	$("#mapdiv").css("height", legalMapHeight);

	 });


	legalContent.mCustomScrollbar({
		autoHideScrollbar: true,
		scrollInertia: 150,
		advanced:{
			updateOnContentResize: true
		}
	});

	// Legal FAQ accordion collapse and expand buttons
	$(".panel-title").on("click", function(){
		$(this).find(".legal-faq-expand, .legal-faq-collapse").fadeToggle(200);
	});
});
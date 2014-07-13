(function($) {
	$(function() {
		$('.avatar-banner').blurjs({
			source:'.avatar-banner',
			radius: 4,
			overlay: 'rgba(0,0,0,0.5)',
			offset: { 
				x: 'center', 
				y:'center'
			}, 
			optClass: 'attach-fixed'
		});
	});

	setTimeout(function() {
		$('.avatar-banner').fadeIn();
	}, 800);
})(jQuery)
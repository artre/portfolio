jQuery(document).ready(function($) {
	angular.bootstrap('body', ['NewsPageApp']);	

	jQuery('.fancybox-media')
		.fancybox({
			openEffect  : 'none',
			closeEffect : 'none',
			nextEffect  : 'none',
			prevEffect  : 'none',
			helpers : {
				media: {}
			}
		});

		$('button.sendToProxy').on('click', function(event) {
			event.preventDefault();
			var form = $(this).parent('form');
			var action = form.attr('id');
			var formData = $(form).serialize();

			sendToCurationProxy(action, formData);	
		});	

		function sendToCurationProxy(action, formData)
		{
			$.ajax({
				//url: "http://dev/cct/testing/newsAgg/completed/curateArticle.php",
				url: "http://devground.cointechs.com/newsAgg/completed/curateArticle.php",
				cache: false,
				//contentType: "application/json; charset=utf-8",
				dataType: "html",
				type: "GET",
				data: 'act='+action+'&'+formData,
				success: function (result, success) 
				{
					// console.log('Success');
					// console.log(result);
					alert('Success ' + result);
					// TODO: need to display 'result' value somewhere... it contains a message if the change was successful or not...
				},
				error: function (result, error) 
				{
					// console.log('Error');
					// console.log(result);
					alert('Error ' + result);
					// TODO: need to display 'result' value somewhere... it contains a message if the change was successful or not...
				}
			});
			console.log('act='+action+'&'+formData);
		}	
});

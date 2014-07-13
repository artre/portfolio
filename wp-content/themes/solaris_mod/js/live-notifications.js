(function($) {
	$(document).ready(function() {
		var data = {
			action: 'user_notifications'
		}
		setInterval(function() {
			$.post('/wp-admin/admin-ajax.php', data, function(data) {
				updateNotificationMenu(JSON.parse(data));
			});
		}, 10000);

		function updateNotificationMenu(notifications) {
			var countContainer = jQuery('span.notification-count span').html('');
			var listContainer  = jQuery('div#notifications-list').html('');

			countContainer.html(notifications.count);
			listContainer.html(notifications.list).hide();
		}
	});
})(jQuery);
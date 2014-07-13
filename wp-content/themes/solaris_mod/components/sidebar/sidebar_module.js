var GeltSidebar = angular.module('GeltSidebar', []);

GeltSidebar.directive('getNewsCat', function() {
	return {
		restrict: 'A',
		link: function(scope, element, attrs) {
			element.bind('click', function(evt) {
				evt.preventDefault();
				alert('Fetch this category ' + attrs.newscategory);
				//NewsFeed.getNewsByCategory(attrs.newscategory);
			});
		}
	};
});


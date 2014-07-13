angular.module('NewsPageApp', ['BitstampTicker', 'BTCETicker', 'BTCChinaTicker', 'HuobiTicker'])
	.factory('NewsFeedData', ['$rootScope', '$http', function($rootScope, $http) {
		var newsFeed  = [];
		var lastEntry = 0;
		var newsLimit = 10;
		var category  = 'latest-news';

		/*private function to fetch articles from database*/
	    function fetchNewsFeed() {
			var data = {last: lastEntry, limit: newsLimit, cat: category};

            $http({
                url: '../wp-content/themes/solaris_mod/components/newsfeed/proxy_scripts/news_feed.php',
                method: 'POST',
                data: data
            })
            .success(function(data, status, headers, config) {
            	// append data to news feed array
				if (data instanceof Array) {
		            data.forEach(function(v) {
		                newsFeed.push(v);
		            });
		        }
            });		
	    }

		return {
			getNewsFeed: function() {
				return newsFeed;
			},
			getArticleByIndex: function(i) {
				return newsFeed[i];
			},
			fetchFeedByCategory: function(category) {
				lastEntry = 0;
				category  = category;
				fetchNewsFeed();
			},
			fetchNextSet: function() {
				lastEntry += newsLimit;
				fetchNewsFeed();
			}
		}
	}])
	.factory('VideoFeedData', ['$rootScope', '$http', function($rootScope, $http) {
		var videoFeed  = [];
		var lastEntry  = 0;
		var videoLimit = 10;
		var category   = 'latest-news';

		/*fetch articles from database*/
		function fetchVideoFeed() {
			var data = {
				last  : lastEntry, 
				limit : videoLimit, 
				cat   : category
			};

            $http({
                url: '../wp-content/themes/solaris_mod/components/news-page-app/proxy_scripts/video_feed.php',
                method: 'POST',
                data: data
            })
            .success(function(data, status, headers, config) {
            	// append data to news feed array
				if (data instanceof Array) {
		            data.forEach(function(v) {
		                videoFeed.push(v);
		            });
		        }

		        //jQuery('#video-list .loading-overlay').fadeOut();
            });		
		}

	    /* VideoFeedData Object returned. Use methods to interface with page/news data */
		return {
			getVideoFeed: function() {
				return videoFeed;
			},
			getVideoByIndex: function(i) {
				return videoFeed[i];
			},
			fetchFeedByCategory: function(category) {
				lastEntry = 0;
				category  = category;
				fetchVideoFeed();
			},
			fetchNextSet: function() {
				lastEntry += videoLimit;
				fetchVideoFeed();
			}
		}
	}])
	.factory('NewsSourceConfig', ['$rootScope', function($rootScope) {
		var url     = '';
		var filters = {
			forbes: function(htmlBody) {
				var path = url.pathname.split('/');
				if (path[1] === 'sites') {
					return jQuery(htmlBody).find('div.body');
				}
				if (path[1] === 'video') {
					var videoID = path[2];
					var dataURL = 'http://sadmin.brightcove.com/viewer/us20131010.1525/BrightcoveBootloader.swf?playerID=2540257919001&secureConnections=true&autoStart=true&isUI=1&isVid=1&videoId=' + videoID;
					var objectContainer = document.createElement('div');
					var objectElem = document.createElement('object');
					var videoInfo = jQuery(htmlBody).find('section.video_info');

					objectElem.setAttribute('data', dataURL);
					// Set dimensions dynamically later on
					objectElem.setAttribute('width', '100%');
					objectElem.setAttribute('height', '550px');

					jQuery(objectContainer)
						.append(objectElem)
						.append(videoInfo);

					return objectContainer;
				}
			},
			npr: function(htmlBody) {
				var path = url.pathname.split('/');
				return jQuery(htmlBody).find('div#storytext');
			}
		}

		// Parse href to apply corresposponding filters
		function determineSourceFilter() {
			switch (url.hostname) {
				case 'www.forbes.com': 
					return filters['forbes'];
					break;
				case 'www.npr.org':
					return filters['npr'];
					break;
			}
		}

		return {
			getSourceFilter: function(articleHref) {
				url = document.createElement('a');
				url.href = articleHref;

				return determineSourceFilter();
			}
		}
	}])
	.controller('NewsListCtrl', ['$scope', 'NewsFeedData', function($scope, NewsFeedData) {
		$scope.newsList  = '';

		$scope.$watch(function() {
			return NewsFeedData.getNewsFeed();
		}, function(newData, oldData) {
			$scope.newsList = newData;
		});

		NewsFeedData.fetchFeedByCategory('latest-news');

		/*
		 * It's bad practice to do DOM manipulations in an Angular Controller
		 * If it can't be helped, or if you dgaf, do your DOM manipulations here
		 */

		jQuery('li.news-filter a').on('click', function(evt) {
			evt.preventDefault();
			alert('working');
			var anchor = jQuery(this),
				filter = anchor.attr('title');

			NewsFeedData.fetchFeedByCategory(filter);
		});
	}])
	.controller('VideoListCtrl', ['$scope', 'VideoFeedData', function($scope, VideoFeedData) {
		$scope.videoList = '';

		$scope.$watch(function() {
			return VideoFeedData.getVideoFeed();
		}, function(newData, oldData) {
			$scope.videoList = newData;
		});

		VideoFeedData.fetchFeedByCategory('latest-news');

		$scope.getVideoLink = function(i) {
			var video = $scope.videoList[i];
			return video.videoLink;
		}
	}])
	.controller('ArticleModalCtrl', ['$scope', '$rootScope', '$http', 'NewsFeedData', function($scope, $rootScope, $http, NewsFeedData) {
		$scope.articleTitle   = '';
		$scope.articleHref    = '';
		$scope.articleImgLink = '';
		$scope.articleDesc    = '';

		// listen for event to update modal with individual article
		$scope.$on('UPDATE_MODAL', function(evt, message) {
			var article = NewsFeedData.getArticleByIndex(message);

			$scope.articleTitle   = article.articleTitle;
			$scope.articleHref    = article.articleLink;
			$scope.articleImgLink = article.articleImgURL;
			$scope.articleDesc    = article.articleDesc;

			stealContent();
		});

		function stealContent() {
			var data = {url: $scope.articleHref};
			var contentContainer = jQuery('#content-body-1').html('');

			$http({
				method: 'POST', 
				url: '../wp-content/themes/solaris_mod/components/news-page-app/proxy_scripts/article_getter.php',
				data: data
			})
			.success(function(data, status, headers, config) {
				var htmlBody = jQuery.parseHTML(data);
				var content  = jQuery(htmlBody).find('div.body');

				contentContainer.append(content);
			})
		}
	}])
	.directive('newsInfiniteScroll', ['$rootScope', 'NewsFeedData', function($rootScope, NewsFeedData) {
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {
				/*track mCustomScroll total scroll to load next set*/
				element.mCustomScrollbar({
					autoHideScrollbar: true,
					scrollInertia: 150,
					advanced: {
						updateOnContentResize: true
					},
					callbacks: {
						onTotalScroll: function() {
							NewsFeedData.fetchNextSet();
						}
					}
				});

				/*When mCustomScrollbar is hidden, track window scroll*/
				jQuery(window).scroll(function() {
				   if(jQuery(window).scrollTop() + jQuery(window).height() == jQuery(document).height()) {
				       NewsFeedData.fetchNextSet();
				   }
				});
			}
		}
	}])
	.directive('videoInfiniteScroll', ['$rootScope', 'VideoFeedData', function($rootScope, VideoFeedData) {
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {
				/*track mCustomScroll total scroll to load next set*/
				element.mCustomScrollbar({
					autoHideScrollbar: true,
					scrollInertia: 150,
					advanced: {
						updateOnContentResize: true
					},
					callbacks: {
						onTotalScroll: function() {
							VideoFeedData.fetchNextSet();
							//jQuery('#video-list .loading-overlay').fadeToggle();
						}
					}
				});

				/*When mCustomScrollbar is hidden, track window scroll*/
				jQuery(window).scroll(function() {
				   if(jQuery(window).scrollTop() + jQuery(window).height() == jQuery(document).height()) {
				       VideoFeedData.fetchNextSet();
				   }
				});
			}
		}
	}])
	.directive('triggerModal', ['$rootScope', function($rootScope) {
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {
				element.on('click', function() {
					// Tell modal to update content, pass article newsFeed $index
					$rootScope.$broadcast('UPDATE_MODAL', attrs.articleIndex);
				});
			}
		}
	}])


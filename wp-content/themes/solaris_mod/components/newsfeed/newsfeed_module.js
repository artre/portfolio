var NewsFeed = angular.module('NewsFeedApp', []);

NewsFeed.factory('NewsFeed', function($http) {
    return {
        getLatestNews: function(newsLast, newsLimit) {
            var data = {last: newsLast, limit: newsLimit};

            return $http({
                url: '/GeltHub/wp-content/themes/solaris_mod/components/newsfeed/proxy_scripts/news_feed.php',
                method: 'POST',
                data: data
            });
        },
        getNewsByCategory: function(category) {
            var data = {cat: category};

            alert(data);
        }
    }
});


NewsFeed.controller('NewsFeedCtrl', function($scope, NewsFeed) {
    $scope.newsLast   = 0;
    $scope.newsLimit = 10;
    $scope.newsFeed  = [];
    $scope.scrollPos = '';

    // Initial Load
    getNews($scope.newsLast, $scope.newsLimit);

    $scope.getNextSet = function() {
        $scope.newsLast += 10;
        getNews($scope.newsLast, $scope.newsLimit);
    }

    function getNews(newsLast, newsLimit) {
        NewsFeed.getLatestNews(newsLast, newsLimit)
            .success(function(data, status, headers, config) {

                // Param 1 = target array || Param 2 = array to add
                extendArray($scope.newsFeed, data);
            })
            .error(function(data, status, headers, config) {
                console.log('Error in request');
            })
    }

    function extendArray(targetArray, otherArray) {
        if ((otherArray instanceof Array) && (targetArray instanceof Array)) {
            otherArray.forEach(function(v) {
                targetArray.push(v);
            })
        }
    }

    setTimeout(function() {
        $('#news-list').mCustomScrollbar({
            autoHideScrollbar: true,
            advanced: {
              updateOnContentResize: true
            },
            callbacks: {
                onTotalScroll: function() {
                    $scope.getNextSet();
                }
            }
        });
    }, 1000);

    $scope.echoCategory = function(category) {
        alert(category);
    }


});


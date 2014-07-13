angular
    .module('BitstampTicker', ['ngAnimate'])
    .factory('BitstampSocket', function($rootScope) {
        var socket = io.connect('http://node1.cointechs.com:7777');

        return {
            on: function(eventName, dataHandler) {
                socket.on(eventName, function() {
                    var args = arguments;
                    $rootScope.$apply(function() {
                        dataHandler.apply(socket, args);
                    });
                });
            }
        }
    })
    .controller('BitstampTickerCtrl', ['$scope', 'BitstampSocket',
        function($scope, BitstampSocket) {

            // Declare scope variable defaults
            $scope.exchangeName = 'Bitstamp';
            $scope.highPrice = 0.00;
            $scope.lowPrice = 0.00;
            $scope.lastPrice = 0.00;
            $scope.change = 0.00;
            $scope.bidPrice = 0.00;
            $scope.askPrice = 0.00;
            $scope.volume = 0.00000000;
            $scope.lastPerc = 0.00;
            $scope.cooldown = 0;
            $scope.currSym = '$';
            var countDownInterval = null;


            // Listen for incoming ticker data
            BitstampSocket.on('tickerData', function(data) {
                var dataObj = JSON.parse(data);
                // On new data, refresh cooldown
                resetCooldown();

                // Setup scope variables with newly arrived data
                setupTickerData(dataObj);
            });


            function setupTickerData(data) {
                $scope.highPrice = data.highPrice.toFixed(2);
                $scope.lowPrice = data.lowPrice.toFixed(2);
                $scope.askPrice = data.askPrice.toFixed(2);
                $scope.bidPrice = data.bidPrice.toFixed(2);
                $scope.volume = data.tickerVolume.toFixed(0);
                $scope.lastPrice = data.lastPrice.toFixed(2);

                if (data.diffLastPrice !== 0) {
                    $scope.change = data.diffLastPrice.toFixed(2);
                    $scope.lastPerc = ((data.diffLastPrice / data.lastPrice) * 100).toFixed(4);
                }
            }


            function resetCooldown() {
                var timer = 30;
                clearInterval(countDownInterval);
                countDownInterval = setInterval(countdown, 1000);

                function countdown() {
                    if (timer === 0) {
                        $scope.cooldown = 0;
                        clearInterval(countDownInterval);
                    }
                    $scope.$apply(function() {
                        $scope.cooldown = timer--;
                    });
                }
            }


            $scope.isPos = function(val) {
                return val > 0;
            };

            $scope.isNeg = function(val) {
                return val < 0;
            };

        }
    ])
    .directive('bitstampTickerComponent', function() {
        return {
            restrict: 'A',
            templateUrl: '../wp-content/themes/solaris_mod/components/templates/ticker_tmpl.html'  //Use on dev1
        }
    })
    .directive('animateOnChange', function() {
        return function(scope, elem, attrs) {
            scope.$watch(attrs.animateOnChange, function(newVal, oldVal) {
                if (oldVal != newVal) {
                    elem.addClass('flash-enter');
                    setTimeout(function() {
                        elem.addClass('flash-enter-active');
                    }, 500);
                    setTimeout(function() {
                        elem.removeClass('flash-enter');
                        elem.removeClass('flash-enter-active')
                    }, 1000);
                }
            })
        }
    })
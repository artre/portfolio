<?php 
/**
 * Template Name: News Page
 * Description: This is template for News Page.
 */
	get_header();
?>

<div class="inner-wrap">
	<ul class="nav nav-tabs nav-justified news-mobile">
		<li class="active"><a href="#exchange-tickers-mobile" data-toggle="tab">Tickers</a></li>
		<li><a href="#news-container-mobile" data-toggle="tab">News</a></li>
		<li><a href="#video-container-mobile" data-toggle="tab">Videos</a></li>
	</ul>

	<div class="tab-content news-mobile">
		<div id="exchange-tickers-mobile" class="tab-pane fade in active"></div>
		<div id="news-container-mobile" class="tab-pane fade"></div>
		<div id="video-container-mobile" class="tab-pane fade"></div>
	</div> <!-- END OF .tab-content -->

	<div id="tickers-content">
		<div id="exchange-tickers" class="clearfix">
			<section id="bitstamp-ticker">
				<div ng-controller="BitstampTickerCtrl" bitstamp-ticker-component></div>
			</section>
			<section id="btce-ticker">
				<div ng-controller="BTCETickerCtrl" btce-ticker-component></div>
			</section>
			<section id="btcchina-ticker">
				<div ng-controller="BTCChinaTickerCtrl" btcchina-ticker-component></div>
			</section>
			<section id="huobi-ticker" class="col-last">
				<div ng-controller="HuobiTickerCtrl" huobi-ticker-component></div>
			</section>
		</div>
	</div>

	<div id="news-content" class="clearfix" ng-controller="NewsListCtrl">
		<div id="news-wrap">
			<h1 class="title-1">News</h1>
			<input type="text" ng-model="searchNews" placeholder="filter news list" class="input-text filter">
			<div id="news-container" news-infinite-scroll>
				<div id="featured-news">
					<div class="featured-wrapper" data-toggle="modal" data-target="#modal-news" ng-repeat="featured in featuredList | filter: searchNews" data-article-index="{{$index}}" trigger-modal>
						<img ng-src="{{featured.articleImgURL}}">
						<div class="feat-caption">
							<h3 ng-bind-html="toTrusted(featured.articleTitle)"></h3>
							<div class="feat-p"><p ng-bind-html="toTrusted(featured.articleDesc)"></p></div>
							<div class="news-meta author">{{featured.sourceName}} | {{featured.articleDate}}</div>
						</div>
					</div>
				</div> <!-- END OF #fetured-news -->

				<div id="news-list" class="clearfix">
					<ul>
						<li class="news-wrapper" data-toggle="modal" data-target="#modal-news" ng-repeat="news in newsList | filter: searchNews" data-article-index="{{$index + 2}}" trigger-modal>
							<div class="news-img">
								<img ng-src="{{news.articleImgURL}}">
							</div>
							<div class="news-text">
								<h4><a href="{{news.articleLink}}" ng-bind-html="toTrusted(news.articleTitle)"></a></h4>
								<div><p ng-bind-html="toTrusted(news.articleDesc)"></p></div>
								<div class="news-meta"><p>{{news.sourceName}} | {{news.articleDate}}</p></div>
							</div>
						</li>
					</ul>
				</div> <!-- END OF #news-list -->
			</div> <!-- END OF #news-container -->
		</div> <!-- END OF #news-wrap -->
		
		<div id="video-wrap">
			<h1 class="title-1">Video</h1>
			<input type="text" ng-model="searchVideos" placeholder="filter video list" class="input-text filter">
			<div id="video-container" video-infinite-scroll>
				<div id="video-list" ng-controller="VideoListCtrl">
					<ul>
						<li class="video-wrapper" ng-repeat="video in videoList | filter: searchVideos">
							<div class="video-img">
								<a class="fancybox-media" href="{{video.videoLink}}"><img ng-src="{{video.videoImgURL}}"></a>
								<!--img src="<?php echo get_stylesheet_directory_uri()?>/images/home/a.jpg"-->
							</div>
							<div class="video-text">
								<h4>{{video.shortTitle}}</h4>
								<div class="video-meta"><p>{{video.videoDate}}</p></div>
							</div>
						</li>
						<!--li class="video-wrapper">
							<div class="video-img">
								<img src="<?php echo get_stylesheet_directory_uri()?>/images/home/b.jpg">
							</div>
							<div class="video-text">
								<h4>Bitcoin in New York</h4>
								<div class="video-meta"><p>Usa Today 02-05-2014</p></div>
							</div>
						</li>
						<li class="video-wrapper">
							<div class="video-img">
								<img src="<?php echo get_stylesheet_directory_uri()?>/images/home/a.jpg">
							</div>
							<div class="video-text">
								<h4>Bitcoin in New York</h4>
								<div class="video-meta"><p>Usa Today 02-05-2014</p></div>
							</div>
						</li>
						<li class="video-wrapper">
							<div class="video-img">
								<img src="<?php echo get_stylesheet_directory_uri()?>/images/home/b.jpg">
							</div>
							<div class="video-text">
								<h4>Bitcoin in New York</h4>
								<div class="video-meta"><p>Usa Today 02-05-2014</p></div>
							</div>
						</li-->
					</ul>
				</div> <!-- END OF #video-list -->
			</div> <!-- END OF #video-container -->
		</div> <!-- END OF #video-wrap -->
	</div> <!-- END OF #news-content -->
</div><!-- END OF .inner-wrap -->

<?php get_footer(); ?>
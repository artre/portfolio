<?php 
/*
 * Template Name: Reviews Page
 */
	get_header();
?>

<div class="inner-wrap">
	<div class="title-box underline-dark">
		<h2>Reviews</h2>
	</div>
	<div id="reviews-container" class="clearfix">
		<p>GeltHub provides a comprehensive platform with all the useful data you need to judge a DC company, product, or service. Help our community make informed purchases by leaving your opinion and experience with any digital currency service in the corresponding section bellow. </p>
		<div class="reviews-wrapper">
			<div class="reviews-title">
				<i data-icon="k"></i>
				<h3>Wallets</h3>
			</div>
			<div class="reviews-body">
				<p>Wallets store your digital currency. There are three wallet types: online, desktop, and paper and a variety of businesses that provide you with the necessary software or services to set you up. Tell us what you think about your favorite and least favorite wallet services.</p>
				<div class="reviews-button"><a href="<?php echo get_permalink( 153 ); ?>">Go exploring</a></div>
			</div>
		</div>
		<div class="reviews-wrapper">
			<div class="reviews-title">
				<i data-icon="j"></i>
				<h3>Payment Processors</h3>
			</div>
			<div class="reviews-body">
				<p>Payment processors are third party services that allow merchants to handle Bitcoin transactions. Without payment processors, performing transactions on a consumer scale would be extraordinarily inconvenient. Tell us what you think about payment processors you’ve encountered.</p>
				<div class="reviews-button"><a href="#">Go exploring</a></div>
			</div>
		</div>
		<div class="reviews-wrapper">
			<div class="reviews-title">
				<i data-icon="x"></i>
				<h3>Marketplaces</h3>
			</div>
			<div class="reviews-body">
				<p>A marketplace is any platform that hosts online businesses where you can trade digital currency for goods and services. These platforms are the life’s blood of Bitcoin and all digital currency. Let us know which marketplaces you trust and most enjoy.</p>
				<div class="reviews-button"><a href="#">Go exploring</a></div>
			</div>
		</div>
		<div class="reviews-wrapper">
			<div class="reviews-title">
				<i data-icon="t"></i>
				<h3>Exchange</h3>
			</div>
			<div class="reviews-body">
				<p>An exchange is a business that facilitates the trading of one currency for another. In DC terms, this means you can use an exchange to trade your digital currency for fiat currency, fiat currency for digital currency, or digital currency for a different type of digital currency. Tell us which exchanges you have used and your experiences with them.</p>
				<div class="reviews-button"><a href="#">Go exploring</a></div>
			</div>
		</div>
		<div class="reviews-wrapper">
			<div class="reviews-title">
				<i data-icon="r"></i>
				<h3>Live Trading Platforms</h3>
			</div>
			<div class="reviews-body">
				<p>Live trading platforms are the closest entities to the stock market in the digital currency world. Buy, sell, and trade in an open exchange with fixed prices. You can even make trades on margins, options, and liquidity. If you have tried your hand at live trading, tell us about your experience and the services you’ve used. </p>
				<div class="reviews-button"><a href="#">Go exploring</a></div>
			</div>
		</div>
	</div>
</div><!-- END OF .inner-wrap -->

<?php get_footer(); ?>
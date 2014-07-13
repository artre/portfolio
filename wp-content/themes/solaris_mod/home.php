<?php 
/*
* Template Name: Home Page
* Description: this is template for Home Page.
*/
	get_header();
?>

<div class="inner-wrap">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
				<img src="<?php echo get_stylesheet_directory_uri()?>/img/carousel-1.png" alt="">
				<div class="carousel-caption">
				</div>
			</div>
			<div class="item">
				<img src="<?php echo get_stylesheet_directory_uri()?>/img/carousel-2.png" alt="">
				<div class="carousel-caption"></div>
			</div>
			<div class="item">
				<img src="<?php echo get_stylesheet_directory_uri()?>/img/carousel-3.png" alt="">
				<div class="carousel-caption"></div>
			</div>
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
			<i class="fa fa-angle-right"></i>
		</a>
	</div> <!-- END OF #carousel-example-generic-->

	<div id="home-icons" class="clearfix">
		<div class="home-icon-wrapper">
			<a href="/news">
				<div data-icon="y" class="icon-container"></div>
				<div class="home-icon-text">
					<h3>News</h3>
					<p>Everything you need to know about what's going on with Bitcoin and Digital Currency right now.</p>
				</div>
			</a>
		</div>
		<div class="home-icon-wrapper">
			<a href="/connect">
				<div data-icon="z" class="icon-container"></div>
				<div class="home-icon-text">
					<h3>Connect</h3>
					<p>A social network for digital currency enthusiasts, innovators, developers and more. Join the revolution.</p>
				</div>
			</a>
		</div>
		<div class="home-icon-wrapper">
			<a href="/explore">
				<div data-icon="b" class="icon-container"></div>
				<div class="home-icon-text">
					<h3>Explore</h3>
					<p>Discover and learn the basics and finer points regarding Bitcoin and other digital currencies.</p>
				</div>
			</a>
		</div>
		<div class="home-icon-wrapper">
			<a href="#">
				<div data-icon="C" class="icon-container"></div>
				<div class="home-icon-text">
					<h3>Product</h3>
					<p>Gelt/hub is more than news. It's part of a greater platform, ecosystem, and set of services. Learn more.</p>
				</div>
			</a>
		</div>
	</div> <!-- END OF #home-icons -->
</div> <!-- END OF .inner-wrap -->

<div id="about-container" class="clearfix">
	<div id="about-content" class="clearfix">
		<div id="about-img">
			<img src="" alt="">
		</div>
		<div id="about-text">
			<h1>About us</h1>
			<p>
				Gelt/hub is your number one source for news, information, and analysis relating to Bitcoin and other digital currencies. 
				Our mission is cover the trends, price changes, markets, technology, and organizations and individuals relating to Bitcoin and digital currency throughout the world. 
				Gelt/hub provides simple tutorials, guides and information for anyone new to Bitcoin, while at the same time lending top-tier expert analysis and investigation of the trends, market movements, culture, and newsmakers involved with digital currency at large. 
				The platforms created by Bitcoin and other digital currencies will shape the world’s future in ways that no one can predict, but at Gelt/hub we recognize that digital currency is here to make waves and change world finance, global e-commerce, and allow for autonomous computer systems of an unprecedented kind. 
				Digital currency has created an ecosystem of exchanges, investors, startups, developers, merchants, innovators, and voices that must be given constant scrutiny, coverage, and investigation.
				Our values are objectivity, ethical and fair coverage, and bringing our readers the best information as fast as possible.  
				For these reasons, we are located at the financial hub of the world, the Financial District in New York City. 
				Digital currencies have created a new wave of technological entrepreneurs, open-minded consumers, and innovative developers that will soon change our planet. 
				Gelt/hub’s goal is to be there at every twist and turn of digital currency’s path, right in the center of the action. 
			</p>
		</div>
	</div> <!-- END OF #about-content -->
</div> <!-- END OF #about-countainer -->


<?php get_footer(); ?>
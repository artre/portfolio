<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package  WellThemes
 * @file     footer.php
 * @author   Well Themes Team
 * @link 	 http://wellthemes.com
 */
	if (is_page_template('page-featured.php')&& $paged < 2 ) {

		$show_full_carousel = get_post_meta($post->ID, 'wt_meta_show_full_carousel', true);

		if ( $show_full_carousel == 1 ) {
			get_template_part( 'includes/carousel-full' );
		}

		$show_footermenu = get_post_meta($post->ID, 'wt_meta_show_footermenu', true);

		if ( $show_footermenu == 1 ) {
			$menu_title = get_post_meta($post->ID, 'wt_meta_footermenu_title', true);
		?>

		<div class="footer-menu inner-wrap">
			<?php if ($menu_title) { ?>
				<div class="section-title clearfix">
					<div class="title"><h4><?php echo $menu_title; ?></h4></div>

					<?php wp_nav_menu( array(
						'theme_location' => 'footer-menu',
						'container' 	 => '0',
						'depth' 		 => '1'
					)); ?>

				</div>
			<?php } ?>
		</div>

		<?php
		}
	}
?>

	</div><!-- END OF #main -->

	<footer id="footer">
		<div class="footer-info">
			<div class="inner-wrap">
				<div id="footer-toggle">
					<div class="footer-content">
						<a href="<?php echo get_permalink( 845 ); ?>">Contact Us</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
						<a href="<?php echo get_permalink( 858 ); ?>">What is <?php echo get_bloginfo(); ?></a>
					</div>
					<i class="fa fa-angle-up"></i>
					<div id="footer-socials">
						<div id="footer-subscribe">
							<div class="button-text"><a href="#">Subscribe</a></div>
							<form id="subscribe-form" action="">
								<input class="input-text" placeholder="E-mali" type="text">
								<p>
									<label id="subscribe-blog"><input type="checkbox" name="blog"> Company Blog</label>
									<label id="subscribe-daily"><input type="checkbox" name="news"> Daily News</label>
									<label id="subscribe-weekly"><input type="checkbox" name="news"> Weekly News</label>
								</p>
								<input class="input-submit" type="submit" value="Subscribe Now">
							</form>
						</div>
						<ul id="footer-list">
							<li>
								<a target="_blank" href="http://plus.google.com/u/0/b/113965102301823884369/113965102301823884369/">
									<i class="fa fa-google-plus"></i>
								</a>
							</li>
							<li>
								<a target="_blank" href="http://www.facebook.com/pages/21Crypto/1482260668669953">
									<i class="fa fa-facebook-square"></i>
								</a>
							</li>
							<li>
								<a target="_blank" href="http://twitter.com/21Crypto">
									<i class="fa fa-twitter"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div id="footer-slider" class="clearfix">
					<div id="footer-links-1">
						<a href="#">Privacy Policy</a>
						<a href="<?php echo get_permalink( 847 ); ?>">FAQ</a>
						<a href="#">Terms of Service</a>
					</div>
					<div id="footer-links-2">
						<a href="<?php echo get_permalink( 135 ); ?>">What is Bitcoin?</a>
						<a href="#">Status</a>
						<a href="#">About Us</a>
					</div>
					<div id="footer-links-3">
						<a href="#">Careers</a>
						<a href="<?php echo get_permalink( 845 ); ?>">Contact Us</a>
					</div>
					<div id="footer-copyright">
						&copy; Gelt/hub 2014
					</div>
				</div> <!-- END OF #footer-slider -->
			</div> <!-- END OF .inner-wrap -->
		</div> <!--END OF .footer-info -->
	</footer>
</div> <!-- END OF #container -->

<?php wp_footer(); ?>
	<script>var $ = jQuery;</script>
	
	<!-- Bootstrap -->
	<script src="<?php echo get_stylesheet_directory_uri()?>/js/bootstrap.min.js"></script>

	<!-- Sidebar -->
	<script src="<?php echo get_stylesheet_directory_uri()?>/sidebar/classie.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri()?>/sidebar/sidebarEffects.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri()?>/sidebar/menu_jquery.js"></script> 
	<script src="<?php echo get_stylesheet_directory_uri()?>/sidebar/fadeDiv.js"></script>

	<!-- Scrollbar -->
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.mCustomScrollbar.min.js"></script>

	<!-- Home page -->
	<script src="<?php echo get_stylesheet_directory_uri()?>/js/homeicons.js"></script>

	<!-- Mobile view and sticky tickers at news-page -->
	<script src="<?php echo get_stylesheet_directory_uri()?>/js/waypoints.min.js"></script>

	<!-- Rating -->
	<script src="<?php echo get_stylesheet_directory_uri()?>/js/raty/jquery.raty.min.js"></script>

	<!-- File with all small JS functions -->
	<script src="<?php echo get_stylesheet_directory_uri()?>/js/script.js"></script>

	<script>
		$(document).ready(function() {
			// Add rating functionality to single revie in Review section.
			$(".rating").raty({
				width: "100%",
				starOn: '<?php echo get_stylesheet_directory_uri()?>/js/raty/img/line-on.png ?>',
				starOff: '<?php echo get_stylesheet_directory_uri()?>/js/raty/img/line-off.png ?>',  
				score: function() {
					return $(this).attr('data-score');
				},
				click: function(score, evt) {
					$(this).prev().attr('value', score);
				}
			});

			// iOS check...ugly but necessary
			if (navigator.userAgent.match(/iPhone|iPad|iPod/i)) {
				$('.modal').on('show.bs.modal', function() {

					// Position modal absolute and bump it down to the scrollPosition
					$(this).css({
						position: 'absolute',
						marginTop: $(window).scrollTop() + 'px',
						bottom: 'auto'
					});

					// Position backdrop absolute and make it span the entire page
					//
					// Also dirty, but we need to tap into the backdrop after Boostrap
					// positions it but before transitions finish.
					//
					setTimeout(function() {
						$('.modal-backdrop').css({
							position: 'absolute',
							top: 0,
							left: 0,
							width: '100%',
							height: Math.max(
								document.body.scrollHeight, document.documentElement.scrollHeight,
								document.body.offsetHeight, document.documentElement.offsetHeight,
								document.body.clientHeight, document.documentElement.clientHeight
							) + 'px'
						});
					}, 0);
				});
			}
		});
	</script>

	<script>
		var $head = $( '#ha-header' );

		$( '.ha-waypoint' ).each( function(i) {
			var $el = $(this),
				animClassDown = $el.data( 'animateDown' ),
				animClassUp = $el.data( 'animateUp' );

			$el.waypoint( function(direction) {
				if ( direction === 'down' && animClassDown ) {
					$head.attr('class', 'ha-header ' + animClassDown);
				} else if ( direction === 'up' && animClassUp ) {
					$head.attr('class', 'ha-header ' + animClassUp);
				}
			}, { offset: 90 });
		});
	</script>

	<div id="fade-div"></div>
</body>
</html>
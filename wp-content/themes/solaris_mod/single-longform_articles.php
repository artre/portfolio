<?php 
/**
 * The Template for displaying all single posts.
 *
 * @file     single-longform_articles.php
 */
	get_header();
?>

<div id="mapdiv"></div> 
<div id="legal-grey-back"></div> 

<div class="inner-wrap" class="clearfix">
  <div id="legal-container">

	<div id="legal-menu-wrap">  
	  <nav id="legal-nav">
		<?php wp_nav_menu( array(
		  'theme_location' => 'legal-menu',
		  'container'    => '0'
		) ); ?>
	  </nav>
	  <div id="legal-move">
		<i class="fa fa-chevron-up" id="map-collapse"></i>
		<i class="fa fa-chevron-down" id="map-expand"></i>
	  </div>

	  <div id="legal-nav-title">
	  	<h1><?php echo get_the_title(); ?></h1>
	  </div>
	  <select id="legal-nav-mobile" name="forma" onchange="location = this.options[this.selectedIndex].value;" value="<?php echo get_the_title(); ?>">
	  	<option selected value="">Select page</option>
	  	<option value="<?php echo get_site_url()?>/explore/legal-news/">Legal News</option>
	  	<option value="<?php echo get_site_url()?>/explore/legal-countries/">Countries</option>
	  	<option value="<?php echo get_site_url()?>/explore/legal-longform-articles/">Longform Articles</option>
	  	<option value="<?php echo get_site_url()?>/explore/legal-faq/">FAQ</option>
	  </select>
	  
	</div>

	<div id="legal-content">

				<div id="legal-title">
			
					<h1 class="title-1"><?php the_title();?></h1>
				</div>
				<div class="legal-text">
					<?php echo get_post_meta($post->ID, "legal-countryExcerpt", true); ?>
					<?php echo '<!-- ' . basename( get_page_template() ) . ' -->'; ?>
					<?php echo get_page_template(); ?>
				</div>

			<?php //endwhile; endif; ?>
		</div>
	</div> <!-- END OF .legal-container -->

</div><!-- END OF .inner-wrap -->


<?php get_template_part( 'legal', 'movecontent' ); ?>
<!-- legal and regulation map scripts -->
<?php get_template_part( 'ammap', 'objects' ); ?>
<!-- END legal and regulation map scripts-->

<?php get_footer(); ?>
<?php 
	/* Template Name: Legal Longform Details */

	get_header();
?>

<div id="mapdiv"></div> 
<div id="legal-grey-back"></div> 

<div class="inner-wrap" class="clearfix">
	<div id="legal-container">
		<div id="legal-menu-wrap">
			<nav id="legal-nav">
				<?php wp_nav_menu(array( 'theme_location' => 'legal-menu', 'container' => '0')); ?>
			</nav>

			<div id="legal-move">
				<i class="fa fa-chevron-up"></i>
			</div>

			<div id="legal-nav-title">
				<h1 style="font-size: 16px; margin-top: 2px;"><?php echo get_the_title(); ?></h1>
			</div>

			<select id="legal-nav-mobile" name="forma" onchange="location = this.options[this.selectedIndex].value;" value="<?php echo get_the_title(); ?>">
				<option selected value="">Select page</option>
				<option value="<?php echo get_site_url()?>/explore/legal-news/">Legal News</option>
				<option value="<?php echo get_site_url()?>/explore/legal-countries/">Countries</option>
				<option value="<?php echo get_site_url()?>/explore/legal-longform-articles/">Longform Articles</option>
				<option value="<?php echo get_site_url()?>/explore/legal-faq/">FAQ</option>
				<option value="<?php echo get_site_url()?>/explore/white-papers/">White Papers</option>
			</select>
		</div>

		<div id="legal-content">
			<div id="legal-text">
				<h1><?php get_the_title(); ?></h1>
				<?php get_the_content(); ?>
			</div><!-- END OF #legal-text -->
		</div><!-- /END OF #legal-content -->
	</div> <!-- END OF #legal-container -->
</div> <!-- END OF .inner-wrap -->

<!-- legal and regulation map scripts -->
<?php get_template_part( 'ammap', 'objects' ); ?>
<!-- END legal and regulation map scripts-->

<?php get_footer(); ?>
<?php 
/* Template Name: Legal Countries Index */

	get_header();
?>
<script>
	var templateName = "<?php echo get_page_template_slug($post->ID); ?>"; 
</script>
<div id="mapdiv"></div>
<div id="legal-grey-back"></div> 

<div class="inner-wrap" class="clearfix">
	<div id="legal-container">
		<div id="legal-menu-wrap">
			<nav id="legal-nav">
				<?php wp_nav_menu(array('theme_location' => 'legal-menu', 'container' => '0')); ?>
			</nav>

			<div id="legal-move">
				<i class="fa fa-chevron-up"></i>
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
			<div id="countries-list">
				<ul>

				<?php
					$pageposts = getListOfCountries($wpdb); //getListOfCountries function is located in functions.php

					if($pageposts)
					{
						global $post;
						foreach ($pageposts as $post)
						{
							setup_postdata($post);

							// variables for custom field content
							$v1 = get_post_meta($post->ID, "legal-countryFlagURL", true);
							$v2 = get_the_title($ID);
							$v3 = get_post_meta($post->ID, "legal-countryStatus", true);
							$v4 = get_the_modified_date();
							$v5 = string_limit_words(get_post_meta($post->ID, "legal-countryExcerpt", true), 65);
							$v6 = get_permalink();

							// Adding a color to <p class='country-status'> accordinly to country's status>
							$statusColor = 'status-'.str_replace(' ', '', get_post_meta($post->ID, "legal-countryStatus", true));

$myString = <<<STRING
<li class='clearfix countries-list-item'>
	<a href="$v6">
	<div class='country-title'>
		<div class='country-flag'>
			<img src='$v1' alt=''>
		</div>
		<div class='country-info'>
			<p class='country-name'>$v2</p>
			<p class='country-status $statusColor' >$v3</p>
			<p class='country-last-update'>updated:$v4</p>
		</div>
	</div>
	</a>
	<div class='country-description'>
		<p>$v5</p>
	</div>
</li>
STRING;
							echo $myString;
						}
					}
					else
					{
						echo '<h2 class="center">Not Found</h2><p class="center">Sorry, but you are looking for something that isn\'t here.</p>';
					}
				?>
				</ul>
			</div> <!-- END OF #countries-list -->
		</div> <!-- END OF #legal-content -->
	</div> <!-- END OF #legal-container -->
</div> <!-- END OF .inner-wrap -->

<!-- legal and regulation map scripts -->
<?php get_template_part( 'ammap', 'objects' ); ?>
<!-- END legal and regulation map scripts-->

<?php get_footer(); ?>
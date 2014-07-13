<?php 
	/* Template Name: Legal White Papers */

	get_header();
?>

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
				<div class="legal-description">
					<p>Nederland blog, bitnovosti.com, is reporting that the Bank of Russia has informed them that the February 6, 2014 statement by the Prosecutor General’s office did not amount to a ban on Bitcoin. This information came in a letter, responsive to the site’s inquiry, which is posted with the article. The site claims that the Prosecutor General merely made.</p>
				</div>

				<ul class="white-papers-list">
				<?php 
					$args = array (
							'posts_per_page' => -1,
							'post_type'		 => 'white_papers',
							'order_by'		 => 'date',
							'order'			 => 'ASC'
						);

					query_posts($args);

					if (have_posts())
					{
						while (have_posts())
						{
							the_post();

							$v1 = get_the_title();
							$v2	= get_field("author");
							$v3	= get_field("date");
							$v4	= get_field("industry");
							$v5	= get_field("topic");
							$v6	= get_field("attach_file");
							$v7	= get_field("country");

$myString = <<<STRING
<li class="white-paper">
	<a id="white-open-pdf" data-toggle="modal" data-pdf-url="$v6" data-target="#white-papers-modal">
		<div class="white-view">
			<i class="fa fa-file-text"></i>
			<p>view</p>
		</div>
	</a>
	<div class="white-description">
		<span class="white-country">$v7</span>
		<span class="white-date">$v3</span>
		<a id="white-open-pdf" data-toggle="modal" data-pdf-url="$v6" data-target="#white-papers-modal">
			<h3>$v1</h3>
		</a>
	</div>
</li>
STRING;
							echo $myString;
						}
					}
					else
					{
						echo "<h2>Not Found</h2>";
					}
				?>

				</ul>
			</div> <!-- END OF #legal-text -->
		</div> <!-- END OF #legal-content -->
	</div> <!-- END OF #legal-content -->
</div> <!-- END OF .inner-wrap -->

<!-- legal and regulation map scripts -->
<?php get_template_part( 'ammap', 'objects' ); ?>
<!-- END legal and regulation map scripts-->

<?php get_footer(); ?>
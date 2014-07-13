<?php 
	/* Template Name: Legal FAQ */

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
				<h1><?php echo get_the_title(); ?></h1>
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
				<div class="panel-group" id="accordion">

				<?php
					$args = array(
						'posts_per_page' => -1,
						'orderby'		 => 'date',
						'order'			 => 'ASC',
						'category_name'  => 'FAQ-Legal'
					);

					query_posts($args);
					
					if (have_posts())
					{
						while (have_posts())
						{
							the_post();

							$v1 = get_post_meta($post->ID, "faq_legal_collaps_id", true);
							$v2 = get_the_title();
							$v3 = get_the_content();
							$v4 = str_replace(array('?', ' ', ',', '.', '-', '&', '#', ';',), '', $v2);

$myString = <<<STRING
	<div class='panel panel-default'>
		<div class='panel-heading' data-toggle='collapse' data-parent='#accordion' href='#$v4'>
			<h4 class='panel-title'>
				<a>$v2</a>
				<div class="legal-expand-holder">
					<div class="legal-faq-expand">
						<a data-toggle='collapse' data-parent='#accordion' href='#$v4'>expand</a>
					</div>
					<div class="legal-faq-collapse">
						<a data-toggle='collapse' data-parent='#accordion' href='#$v4'>collapse</a>
					</div>
				</div>
			</h4>
		</div>	

		<div id='$v4' class='panel-collapse collapse'>
			<div class='panel-body'>
				$v3
			</div>
		</div>
	</div>
STRING;
							echo $myString;
						}
					}
					else
					{
						echo '<h2>Not Found</h2>';
					}

					wp_reset_query();
				?>

				</div> <!-- END OF #accordion -->
			</div> <!-- END OF #legal-text -->
		</div> <!-- END OF #legal-content -->
	</div> <!-- END OF #legal-container -->
</div> <!-- END OF .inner-wrap -->

<!-- legal and regulation map scripts -->
<?php get_template_part( 'ammap', 'objects' ); ?>
<!-- END legal and regulation map scripts-->

<?php get_footer(); ?>
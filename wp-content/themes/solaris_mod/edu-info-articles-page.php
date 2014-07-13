<?php
/*
 * Template Name: Edu- Info- Articles
 * Description: this is template for Edu- Info- Articles
 */
	get_header();
?>

<div class="inner-wrap">
	<h1 class="title-1">Education</h1>
	<div id="edu-sidenav">

		<?php wp_nav_menu( array(
			'theme_location' => 'edu-sidenav',
			'container_id'	 => 'cssmenu'
		) ); ?>

	</div> <!-- END OF #edu-sidenav -->
	<div class="edu-container">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<h1 class="sec-title"><?php the_title();?></h1>

			<div class="edu-text">
				<?php the_content(); ?>
			</div>

		<?php endwhile; endif; ?>

	</div> <!-- END OF #edu-glos-cont -->
</div> <!-- END OF .inner-wrap -->

<?php get_footer(); ?>
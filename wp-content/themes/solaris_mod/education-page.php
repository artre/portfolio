<?php 
/*
 * Template Name: Education Page
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
		<div class="edu-wrapper">
			<div class="edu-icon" data-icon="w" class="icon-container"></div>
			<div class="edu-content">
				<h1 class="title-3">Information guide</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, repellendus, quas, nisi rerum culpa neque sed qui rem harum maxime voluptate optio saepe omnis eum dolor ex soluta cumque animi.</p>
			</div>
		</div>
		<div class="edu-wrapper">
			<div class="edu-icon" data-icon="q" class="icon-container"></div>
			<div class="edu-content">
				<h1 class="title-3">Tutorials</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, necessitatibus distinctio quis consequuntur similique eos doloribus ullam laudantium. Odit, nobis, mollitia est a ipsum eum ullam iure unde aut architecto.</p>
			</div>
		</div>
		<div class="edu-wrapper">
			<div class="edu-icon" data-icon="e" class="icon-container"></div>
			<div class="edu-content">
				<h1 class="title-3">Glossary</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, reprehenderit, iste, nobis, eligendi labore inventore ea soluta exercitationem accusantium sit autem neque suscipit sunt cupiditate quidem doloremque animi iusto officia!</p>
			</div>
		</div>
	</div> <!-- END OF #edu-home-cont -->
</div> <!-- END OF .inner-wrap -->

<?php get_footer(); ?>
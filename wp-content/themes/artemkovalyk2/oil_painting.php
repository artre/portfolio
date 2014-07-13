<?php

	/*
		Template Name: Oil Painting
	*/

?>

<?php get_header(); ?>
<?php the_post(); ?>
  
<div class="center">
   <div class="main_message">
   <h1>Hi, nice to meet you</h1>
   <p>Welcome to my portfolio website</p>
   </div>
</div>
<div class="bottomYellow_oil"> 
	<div class="cube_2oil">
		  
		  <div class="rhomb_oil"><img src="<?php bloginfo('template_url'); ?>/images/Cubes/rhomb3.png"></div>
	</div>     
	<div class="light_path_oil">
		 <img class="angle_path" src="<?php bloginfo('template_url'); ?>/images/Cubes/angle_path.png">
		 <img class="angle_path2" src="<?php bloginfo('template_url'); ?>/images/Cubes/angle_path2.png">
	</div>
</div>
<div class="bottomGreyOil">
  <div class="empty"></div>
  <div class="empty"></div>
  <?php $args = array(
		'posts_per_page'  => -1,
		'orderby'     => 'date',
		'order'     => 'ASC',
		'category_name'   => 'oil'
  );
  query_posts($args);?>   
		<?php if (have_posts()) : while (have_posts()) : the_post(); 

		$v1 = get_field("painting_image");
		?>
		
		<!-- put here DOM elements you want to repeat -->
		<?php echo "<section class='paintig_box'>"; ?>
		
		<?php echo "<img class='paintig_pic' src='" . $v1 . " '/ >"; ?>
		
		<h1><?php the_title(); ?></h1>
		<?php echo "<ul>"; ?>
		<?php echo	   "<li>" . get_post_meta($post->ID, "year", true) . "</li>";?>
		<?php echo	   "<li>" . get_post_meta($post->ID, "technique", true) . "</li>";?>
		<?php echo	   "<li>" . get_post_meta($post->ID, "dimentions", true) . "</li>";?>
		<?php echo "</ul>"?>
		
		<?php echo "</section>"; ?>
		 <!-- END DOM elements you want to repeat -->
		 <?php endwhile;?>
		 <?php else : ?>
		 <h2>Not Found</h2>
		 <?php endif; ?> 
		 
		<?php wp_reset_query();?>
  <div class="clear_fix_pic"></div>

<?php get_footer(); ?>
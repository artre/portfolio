<?php
	/*
		Template Name: Oil Painting
	*/
?>
<?php get_header(); ?>
  
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
	 <?php
	// check if the repeater field has rows of data
	if( have_rows('painting') ):
	 	// loop through the rows of data
	    while ( have_rows('painting') ) : the_row();
			// sub field variables
			$painting_image = get_sub_field('painting_image');
			$painting_title = get_sub_field('painting_title');
			$year = get_sub_field('year');
			$technique = get_sub_field('technique');
			$size = get_sub_field('size');
	?>
	
	<section class='painting_box'>
		
		<img class='painting_pic' src="<?php echo $painting_image['url']; ?>" alt="<?php echo $painting_image['alt'] ?>" />
		<h1><?php echo $painting_title; ?></h1>
		<ul>
			<li><?php echo $year; ?></li>
			<li><?php echo $technique; ?></li>
			<li><?php echo $size; ?></li>
		</ul>
	</section><!-- end .painting_box -->
	
		<?php endwhile; ?>
	<?php else : ?>
	    <h2>Not Found</h2>
	<?php endif; ?>  
	<div class='empty'></div>
  <div class="clear_fix_pic"></div>

<?php get_footer(); ?>
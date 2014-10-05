<?php
    /*
        Template Name: Graphic Design
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
        <div class="rhomb_oil"><img src="<?php bloginfo('template_url'); ?>/images/Cubes/rhomb2.png"></div>
    </div>
    <div class="light_path_oil">
        <img class="angle_path" src="<?php bloginfo('template_url'); ?>/images/Cubes/angle_path.png">
        <img class="angle_path2" src="<?php bloginfo('template_url'); ?>/images/Cubes/angle_path2.png">
    </div>
</div>
  
<div class="bottomGrey">    
    <div class="graphic">
		<?php
		// check if the repeater field has rows of data
		if( have_rows('graphic_group') ):
		 	// loop through the rows of data
		    while ( have_rows('graphic_group') ) : the_row();
				// sub field variables
				$title = get_sub_field('title');
				$description = get_sub_field('description');
				//$image_repeater = get_sub_field('image_repeater');
		?>
		<section class="poster" id="post-<?php the_ID(); ?>">
			<h1><?php echo $title; ?></h1>
			<?php if( !empty($description) ): ?> 
			<p><?php echo $description; ?></p>
			<?php endif; ?>
		    <div class="clear_fix_pic"></div>
		    <?php if ( have_rows('image_repeater') ):
		    	while ( have_rows('image_repeater') ) : the_row();
					$image = get_sub_field('image');
			?>
			    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>"/>
			    <?php endwhile; ?><!-- end loop #2 (nested) -->
			    <?php else : ?>
			    	<h2>Image Not Found</h2>
		    <?php endif; ?>
		    <div class="clear_fix_pic"></div>
		</section>
		<?php endwhile; ?><!-- end loop #1 -->
		<?php else : ?>
		    <h2>Not Found</h2>
		<?php endif; ?>
    </div> <!-- end .graphic -->
    <div class="clear_fix_pic"></div>
      
<?php get_footer(); ?>
<?php

    /*
        Template Name: Graphic Design
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
        <div class="rhomb_oil"><img src="<?php bloginfo('template_url'); ?>/images/Cubes/rhomb2.png"></div>
    </div>
    <div class="light_path_oil">
        <img class="angle_path" src="<?php bloginfo('template_url'); ?>/images/Cubes/angle_path.png">
        <img class="angle_path2" src="<?php bloginfo('template_url'); ?>/images/Cubes/angle_path2.png">
    </div>
</div>
  
<div class="bottomGrey">    
    <div class="graphic">

      <?php $args = array(
            'posts_per_page'   => -1, //  show every post
            'category_name'    => 'social', // show posts only in this category
        );
        query_posts( $args ); ?>
    <section class="poster" id="post-<?php the_ID(); ?>">
	<h1>Social Posters</h1>
    <div class="clear_fix_pic"></div>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php echo "<img src='" . get_post_meta($post->ID, "image_large", true) . " '/ >"; ?>
		
	<?php endwhile; ?>
    <div class="clear_fix_pic"></div>
    </section>
	<?php else : ?>
		<h2>Not Found</h2>
	<?php endif; ?> 
     <?php wp_reset_query(); ?>
     
     <!-- another category -->
     
     <?php $args = array(
            'posts_per_page'   => -1, //  show every post
            'category_name'    => 'stud_light', // show posts only in this category
        );
        query_posts( $args ); ?>
    <section class="poster" id="post-<?php the_ID(); ?>">
	<h1>StudLight</h1>
    <p>posters for students exhibition</p>
    <div class="clear_fix_pic"></div>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php echo "<img src='" . get_post_meta($post->ID, "image_large", true) . " '/ >"; ?>
		
	<?php endwhile; ?>
    <div class="clear_fix_pic"></div>
    </section>
	<?php else : ?>
		<h2>Not Found</h2>
	<?php endif; ?> 
     <?php wp_reset_query(); ?>
     
     <!-- another category -->
     
     <?php $args = array(
            'posts_per_page'   => -1, //  show every post
            'category_name'    => 'different', // show posts only in this category
			'section_name'     => 'different_post_order'
        );
        query_posts( $args ); ?>
    <section class="poster" id="post-<?php the_ID(); ?>">
	<h1>Different</h1>
    <div class="clear_fix_pic"></div>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php echo "<img class'". get_post_meta($post->ID, "add_class", true) ."' src='" . get_post_meta($post->ID, "image_large", true) . " '/ >"; ?>
		
	<?php endwhile; ?>
    <div class="clear_fix_pic"></div>
    </section>
	<?php else : ?>
		<h2>Not Found</h2>
	<?php endif; ?> 
     <?php wp_reset_query(); ?>
           
    </div> <!-- END of .graphic -->
    <div class="clear_fix_pic"></div>
      

<?php get_footer(); ?>
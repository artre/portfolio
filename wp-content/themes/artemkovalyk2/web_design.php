<?php

    /*
        Template Name: Web Design
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
        <div class="rhomb_web"><img src="<?php bloginfo('template_url'); ?>/images/Cubes//rhomb1.png"></div>
    </div>   
    <div class="light_path_oil">
        <img class="angle_path" src="<?php bloginfo('template_url'); ?>/images/Cubes/angle_path.png">
        <img class="angle_path2" src="<?php bloginfo('template_url'); ?>/images/Cubes/angle_path2.png">
    </div>
</div>
<div class="bottomGrey">
    <div class="web">
        
        <?php $args = array(
            'posts_per_page'  => -1,
        	'category_name'   => 'web',
        	'meta_key'		=> 'order_number',
        	'orderby'		=> 'meta_value_num',
        	'order'			=> 'ASC'
        );
        query_posts($args);?>      
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php echo "<div class='web_section'>"; ?>
             <h1> <?php the_title()?> </h1>
              <?php the_excerpt()  ?>           
              <?php echo "<img class='web_img' src='" . get_post_meta($post->ID, "image_large", true) . " '/ >"; ?>
              <?php echo "<div class='web_button'>"?>
              <?php echo "<a href='" . get_post_meta($post->ID, "link", true) . "' ";?>
              <?php echo "target='_blank'>"; ?>
              <?php echo "<p>" . get_post_meta($post->ID, "web_button", true) . "</p></a></div>"; ?>
        <?php echo "</div><div class='empty'></div>";?>
        <?php endwhile; ?>
        <?php else : ?>
        <h2>Not Found</h2>
        <?php endif; ?> 
        <?php wp_reset_query(); ?>
    </div><!-- END web -->
    <div class="clear_fix_pic"></div>
  

<?php get_footer(); ?>
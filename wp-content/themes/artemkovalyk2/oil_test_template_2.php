<?php

    /*
        Template Name: Oil Test Template Second
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
          
          <div class="rhomb_oil"><img src="<?php bloginfo('template_url'); ?>/images/Other/Correl/rhomb3.png"></div>
     </div>
     
     <div class="light_path_oil">
         <img class="angle_path" src="<?php bloginfo('template_url'); ?>/images/Other/angle_path.png">
         <img class="angle_path2" src="<?php bloginfo('template_url'); ?>/images/Other/angle_path2.png">
     </div>
  </div>
  
  <div class="bottomGrey">
      <div class="empty"></div>
      <div class="empty"></div>
      <?php $parent = $post->ID; ?>
      <?php
	     /*
		 query_posts
		 psts_per_page=-1  : show all posts/pages.
		 post_type=page    : it is page, not a post.
		 post_parent=$parent   : <?php the_ID(); ?>,  <?php $parent = $post->ID; ?> The pages parent is current page.
		 orderby=menu_order:  order by "order" in pages attributes.  
		 order=ASC :  Display posts in Ascending order.
		 */
	        query_posts("posts_per_page=-1&post_type=page&post_parent=$parent&orderby=menu_order&order=ASC");
			while (have_posts()) : the_post(); ?>
            
            <!-- put here DOM elements you want to repeat -->
            <?php echo "<section class='paintig_box'>"; ?>
            <a href="<?php the_permalink(); ?>"> 
            <?php echo "<img class='paintig_pic' src='" . get_post_meta($post->ID, "image_large", true) . " '/ >"; ?>
            </a>
            <h1><a href='<?php the_permalink(); ?>'> <?php the_title(); ?> </a></h1>
		    <?php echo "<ul>"; ?>
			<?php echo	   "<li>" . get_post_meta($post->ID, "year", true) . "</li>";?>
			<?php echo	   "<li>" . get_post_meta($post->ID, "technique", true) . "</li>";?>
			<?php echo	   "<li>" . get_post_meta($post->ID, "dimentions", true) . "</li>";?>
            <?php echo "</ul>"?>
            
            <?php echo "</section>"; ?>
             <!-- END DOM elements you want to repeat -->
             
             
            <?php endwhile; wp_reset_query();
		
		?>
      <div class="clear_fix_pic"></div>
      <div class="empty"></div>
      <nav class="view">
           <?php wp_nav_menu(array('menu' => 'Bottom Nav')); ?>
      </nav>  <!-- END view --> 
   </div>

<?php get_footer(); ?>
<?php 

/*

  Template Name: Oil Product
  
*/

?>

<?php get_header();  ?>
<?php the_post(); ?>
  
  <div class="bottomGrey_oil">
  
        <div class="painting_box">
      <h1><?php the_title(); ?></h1>
      <img src="<?php echo get_post_meta($post->ID, 'image_large', true);?>">
      <ul>
      <!-- "get_post_meta" is used to get info from custom fields. $post->ID : posts ID,  'price': name of a custom field,  true: to get only first string -->
         <li>price: $<?php echo get_post_meta($post->ID, 'price', true); ?></li>
         <li>dimentions: <?php echo get_post_meta($post->ID, 'dimentions', true); ?>&nbsp;inches</li>
         <li>code: <?php echo get_post_meta($post->ID, 'code', true); ?></li>
         <li>technique: <?php echo get_post_meta($post->ID, 'technique', true); ?></li>
         <li>year: <?php echo get_post_meta($post->ID, 'year', true); ?></li>
         <li><a class="button_a" href="#">add to cart</a></li>
      </ul>
      <p><?php the_excerpt(); ?> </p>
      <div class="dont_float"></div>
    </div>
        
        <nav class="view">
           <?php wp_nav_menu(array('menu' => 'Bottom Nav')); ?>
        </nav>  <!-- END view --> 
       
  <div class="empty"></div>
  </div>

<?php get_footer(); ?>

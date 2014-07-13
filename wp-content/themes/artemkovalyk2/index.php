<?php get_header(); ?>

  
  <div class="center">
  </div>
       <div class="main_message">
       <h1>Hi, nice to meet you</h1>
       <p>Welcome to my portfolio website</p>
       </div>
  </div>

<div class="bottomYellow">
     

      <div class="cube_1">
     
          <div class="cube_top"><img src="<?php bloginfo('template_url'); ?>/images/Other/cube3.png"></div>
          <div class="cube_left"><img src="<?php bloginfo('template_url'); ?>/images/Other/cube2.png"></div>
          <div class="cube_right"><img src="<?php bloginfo('template_url'); ?>/images/Other/cube1.png"></div>
          
          <div class="rhomb"><a href="web_design"><img src="<?php bloginfo('template_url'); ?>/images/Other/Correl/rhomb1.png"></a></div>

     </div>

     <div class="cube_2">
     
          <div class="cube_top_2"><img src="<?php bloginfo('template_url'); ?>/images/Other/graphic3.png"></div>
          <div class="cube_left_2"><img src="<?php bloginfo('template_url'); ?>/images/Other/graphic2.png"></div>
          <div class="cube_right_2"><img src="<?php bloginfo('template_url'); ?>/images/Other/graphic1.png"></div>
          
          <div class="rhomb"><a href="graphic_design"><img src="<?php bloginfo('template_url'); ?>/images/Other/Correl/rhomb2.png"></a></div>
     </div>
     <div class="cube_3">
     
          <div class="cube_top_3"><img src="<?php bloginfo('template_url'); ?>/images/Other/oil3.png"></div>
          <div class="cube_left_3"><img src="<?php bloginfo('template_url'); ?>/images/Other/oil2.png"></div>
          <div class="cube_right_3"><img src="<?php bloginfo('template_url'); ?>/images/Other/oil1.png"></div>
          
          <div class="rhomb"><a href="oil_painting"><img src="<?php bloginfo('template_url'); ?>/images/Other/Correl/rhomb3.png"></a></div>
     </div>
     <div class="light_path_1">
         <img class="angle_path" src="<?php bloginfo('template_url'); ?>/images/Other/angle_path.png">
         <img class="angle_path2" src="<?php bloginfo('template_url'); ?>/images/Other/angle_path2.png">
     </div>
     
     <div class="light_path_2">
         <img class="angle_path" src="<?php bloginfo('template_url'); ?>/images/Other/angle_path.png">
         <img class="angle_path2" src="<?php bloginfo('template_url'); ?>/images/Other/angle_path2.png">
     </div>
     
     <div class="light_path_3">
         <img class="angle_path" src="<?php bloginfo('template_url'); ?>/images/Other/angle_path.png">
         <img class="angle_path2" src="<?php bloginfo('template_url'); ?>/images/Other/angle_path2.png">
     </div>
     
     
  </div>
  
  <div class="bottomGrey">
        
        <article class="about_me">
		<?php $args = array(
            'posts_per_page'   => -1, //  show every post
            'section_name'     => 'about_posts_order', // show a grupe of posts ordered and created by plugin 'my posts order'
            'category_name'              => 'about_me', // show posts only in this category
        );
        query_posts( $args ); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<section <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <div class="shadow"></div>
            <img class="head_img" src="<?php bloginfo('template_url'); ?>/images/Background/head_line.jpg">
            <div class="head_h1"><h1><?php the_title(); ?></h1></div>
			<p><?php the_content(); ?></p>
		</section>

	<?php endwhile; ?>

	<?php else : ?>

		<h2>Not Found</h2>

	<?php endif; ?> 
    
     <?php wp_reset_query(); ?>
          
        </article>
        
        
        <div class="empty"></div>
        <nav class="view_index">
           <ul>
               <li>
                   <a href="web_design"><p>view my - <span class="blue">web design</span></p></a>
               </li>
               
               <li>
                   <a href="graphic_design"><p>view my - <span class="blue">graphic design</span></p></a>
               </li>
               
               <li>
                   <a href="oil_painting"><p>view my - <span class="blue">oil painting</span></p></a>
               </li>
               
               <li class="see_top">
                   <a><p>to the top</p></a>
               </li>  
           </ul>      
       </nav>  <!-- END view --> 
  <div class="empty"></div>
  </div>

<?php get_footer(); ?>
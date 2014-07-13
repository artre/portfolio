<?php get_header(); ?>

  
  <div class="center">
  
  <div class="test_link"><a href="http://localhost:8888/wordpress/test_page/">test page</a></div>
       <div class="main_message">
       <h1>Hi, nice to meet you</h1>
       <br>
       <p>Welcome to my portfolio website</p>

       </div>

</div>

<div class="bottomYellow">
     

      <div class="cube_1">
     
          <div class="cube_top"><img src="<?php bloginfo('template_url'); ?>/images/Other/cube3.png"></div>
          <div class="cube_left"><img src="<?php bloginfo('template_url'); ?>/images/Other/cube2.png"></div>
          <div class="cube_right"><img src="<?php bloginfo('template_url'); ?>/images/Other/cube1.png"></div>
          
          <div class="rhomb"><a href="web.html"><img src="<?php bloginfo('template_url'); ?>/images/Other/Correl/rhomb1.png"></a></div>

     </div>

     <div class="cube_2">
     
          <div class="cube_top_2"><img src="<?php bloginfo('template_url'); ?>/images/Other/graphic3.png"></div>
          <div class="cube_left_2"><img src="<?php bloginfo('template_url'); ?>/images/Other/graphic2.png"></div>
          <div class="cube_right_2"><img src="<?php bloginfo('template_url'); ?>/images/Other/graphic1.png"></div>
          
          <div class="rhomb"><a href="web.html"><img src="<?php bloginfo('template_url'); ?>/images/Other/Correl/rhomb2.png"></a></div>
     </div>
     <div class="cube_3">
     
          <div class="cube_top_3"><img src="<?php bloginfo('template_url'); ?>/images/Other/oil3.png"></div>
          <div class="cube_left_3"><img src="<?php bloginfo('template_url'); ?>/images/Other/oil2.png"></div>
          <div class="cube_right_3"><img src="<?php bloginfo('template_url'); ?>/images/Other/oil1.png"></div>
          
          <div class="rhomb"><a href="oil_painting.html"><img src="<?php bloginfo('template_url'); ?>/images/Other/Correl/rhomb3.png"></a></div>
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
  <?php get_sidebar(); ?>
        <article class="about_me">
          <div class="head_line1">
               <div class="shadow"></div>
               <img class="head_img" src="<?php bloginfo('template_url'); ?>/images/Background/head_line.jpg">
               <div class="head_h1"><h1>a little bit about me...</h1></div>
          </div>
          <p>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;My name is Artem Kovalyk, freelance graphic&web designer and a front-end developer working from Brooklyn, New York. I have bachelors degree in Graphic Design&Advertising.
           I have worked at design agencies and as a freelancer for the past 3 years.
           Design has always been my passion and delivering appropriate branding experiences is the base of every project I worked on.
           I love to use cutting edge technology and the latest web standards. I strive to constantly improve my design skills and knowledge.
           </p>
           
           <div class="head_line2">
               <div class="shadow"></div>
               <img class="head_img" src="<?php bloginfo('template_url'); ?>/images/Background/head_line.jpg">
               <div class="head_h1"><h1> web design</h1></div>
           </div>
          
           <p>
           <span class="colored">HTML5</span>&nbsp;&nbsp;-&nbsp; Semantic, tidy, clean, legacy compatible and future proof.
           </p>
           <p>
           <span class="colored">CSS3</span>&nbsp;&nbsp;-&nbsp; Separation of style and content. Mobile friendly, responsive.
           </p>
           <p>
           <span class="colored">JavaScript</span>&nbsp;&nbsp;-&nbsp; Complex functionality with a minimum of fuss. jQuery skills to boot.
           </p>
           <p>
           <span class="colored">PHP</span>&nbsp;&nbsp;-&nbsp; Having a grasp of server side scripting makes for great AJAX functionality.
           </p>
           <p>
           <span class="colored">MYCQL</span>&nbsp;&nbsp;-&nbsp; Knowing whats going on in the database is very important
           </p>
           
           <div class="head_line3">
               <div class="shadow"></div>
               <img class="head_img" src="<?php bloginfo('template_url'); ?>/images/Background/head_line.jpg">
               <div class="head_h1"><h1>graphic design</h1></div>
           </div>
           
           <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp My background in digital design has given me the opportunity to understand user flow, interaction, and what makes a user experience great. I love solving design problems with simple yet elegant visual solutions.<br>
           <span class="colored">Adobe Creative Suite, CorelDRAW,</span> and a bit of <span class="colored">3ds Max</span>
           
           <div class="head_line4">
               <div class="shadow"></div>
               <img class="head_img" src="<?php bloginfo('template_url'); ?>/images/Background/head_line.jpg">
               <div class="head_h1"><h1>oil painting</h1></div>
           </div>
           <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp <span class="colored">Oil painting is my passion!</span> I turn on some post rock music that triggers my imagination, and put my inner chimerical worl in to the canvas. I picture surrealistic characters and objects witch contrasts with realistic landscape. Such a singular style blurs the boundaries between the real and <a href="MaxImage-master/index.php">parallel world</a>.</a></p>
           
        </article>
        
        <div class="empty"></div>
        <nav class="view">
           <?php wp_nav_menu(array('menu' => 'Bottom Nav')); ?>
        </nav>  <!-- END view --> 
  <div class="empty"></div>
  </div>

<?php get_footer(); ?>
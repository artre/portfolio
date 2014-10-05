<?php
    /*
        Template Name: Web Design
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
        <div class="rhomb_web"><img src="<?php bloginfo('template_url'); ?>/images/Cubes//rhomb1.png"></div>
    </div>   
    <div class="light_path_oil">
        <img class="angle_path" src="<?php bloginfo('template_url'); ?>/images/Cubes/angle_path.png">
        <img class="angle_path2" src="<?php bloginfo('template_url'); ?>/images/Cubes/angle_path2.png">
    </div>
</div>
<div class="bottomGrey">
    <div class="web">    
    <?php
	// check if the repeater field has rows of data
	if( have_rows('web_site') ):
	 	// loop through the rows of data
	    while ( have_rows('web_site') ) : the_row();
			// sub field variables
			$site_name = get_sub_field('site_name');
			$short_description = get_sub_field('short_description');
			$site_screenshot = get_sub_field('site_screenshot');
			$site_link = get_sub_field('site_link');
			$button_text = get_sub_field('button_text');
	?>
	<div class='web_section'>
		<h1><?php echo $site_name; ?></h1>
		<p><?php echo $short_description; ?></p>
		<img class='web_img' src="<?php echo $site_screenshot['url']; ?>" alt="<?php echo $site_screenshot['alt'] ?>" />
		<div class='web_button'>
			<a href="<?php echo $site_link; ?>" target="_blank">
				<p><?php echo $button_text; ?></p>
			</a>
		</div>
	</div><!-- end .web_section -->
	<div class='empty'></div>
		<?php endwhile; ?>
	<?php else : ?>
	    <h2>Not Found</h2>
	<?php endif; ?>
    </div><!-- .web -->
    <div class="clear_fix_pic"></div>
    
<?php get_footer(); ?>
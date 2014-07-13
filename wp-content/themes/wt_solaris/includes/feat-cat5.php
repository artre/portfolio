<?php
/**
 * The template for displaying the featured single categories section on homepage.
 * Gets the category for the posts from the theme options. 
 * If no category is selected, displays the latest posts.
 *
 * @package  WellThemes
 * @file     feat-cat5.php
 * @author   Well Themes Team
 * @link 	 http://wellthemes.com
 * 
 **/
?>
<div class="feat-cat section">
	<?php
		$cat_id = get_post_meta($post->ID, 'wt_meta_feat_cat5', true);
						
		if ($cat_id){ ?>
			<div class="cat-title">
				<h4 class="main-color-bg cat<?php echo $cat_id; ?>-bg">
					<?php						
						$cat_name = get_cat_name($cat_id);	
						$cat_url = get_category_link($cat_id ); ?>				
					<span><a href="<?php echo esc_url( $cat_url ); ?>" ><?php echo $cat_name; ?></a></span>
				</h4>
				<div class="cat-border main-color-bg cat<?php echo $cat_id; ?>-bg"></div>
			</div>
	<?php }
	
		$args = array(
			'cat' => $cat_id,
			'post_status' => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page' => 5
		);
		$query = new WP_Query( $args );
		if ( $query -> have_posts() ) :
			$last_post  = $query -> post_count -1;
			while ( $query -> have_posts() ) : $query -> the_post();
				if ( $query->current_post == 0 ) { ?>	
					<div class="main-post one-half">								
						<?php get_template_part( 'content', 'excerpt' ); ?>									
					</div><!-- /main-post -->
			<?php } 
				if ( $query->current_post == 1 ) {	?>
				<div class="post-list one-half col-last">
			<?php }
				if ( $query->current_post >= 1 ) { ?>	
					<div class="item-post">
						<?php if ( has_post_thumbnail() ) {	?>
							<div class="thumb overlay">
								<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'wt80_60' ); ?></a>
							</div>
						<?php }	?>
						<div class="post-right">
							
							<div class="entry-meta meta-top">
							<?php 
								if ( wt_get_option( 'wt_enable_rating' ) == 1 ){
									ec_stars_rating_archive(); 
								}
							?>	
								<span class="date"><?php echo get_the_date(); ?></span>								
							</div>
							
							<h6><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h6>
														
						</div>
					</div>	
				<?php } 
				if (( $query->post_count  > 1) AND ($query->current_post == $last_post )) { ?>					
				</div><!-- /post-list -->
			<?php }	
			endwhile;
		endif;
	wp_reset_query(); ?>
	
</div><!-- /feat-cat -->
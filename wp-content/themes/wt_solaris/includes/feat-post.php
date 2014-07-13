<?php
/**
 * The template for displaying the featured slider on homepage.
 * Gets the category for the posts from the theme options. 
 * If no category is selected, displays the latest posts.
 *
 * @package  WellThemes
 * @file     feat-post.php
 * @author   Well Themes Team
 * @link 	 http://wellthemes.com
 * 
 **/
?>

<div id="feat-post" class="section">
	<?php
		$cat_id = get_post_meta($post->ID, 'wt_meta_post_feat_post_cat', true);
		$cat_title = get_post_meta($post->ID, 'wt_meta_post_feat_post_title', true);
		
		$args = array(
			'cat' => $cat_id,
			'post_status' => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page' => 3
		);			
	?>		
	
	<?php if (!empty($cat_title)){ ?>
		<div class="section-title">
		
			<div class="title-wrap main-color-bg cat<?php echo $cat_id; ?>-bg">				
				<div class="icon"><i class="icon-folder-close"></i></div>
				<h3>
					<?php 
						if (!empty($cat_title)){
							echo $cat_title;
						}

						if (!empty($cat_id)){
							$cat_name = get_cat_name($cat_id);	
							$cat_url = get_category_link($cat_id ); ?>				
							<span><a href="<?php echo esc_url( $cat_url ); ?>" ><?php echo $cat_name; ?></a></span>
						<?php } ?>
				</h3>
			</div>
		</div>
	<?php } ?>

	<?php 
		$query = new WP_Query( $args );
		if ( $query -> have_posts() ) :
			$last_post  = $query -> post_count -1;
			while ( $query -> have_posts() ) : $query -> the_post();
				if ( $query->current_post == 0 ) { ?>
					<div class="main-post col col-460 last">								
						<?php if ( has_post_thumbnail() ) {	?>
							<div class="thumb">
								<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'wt460_260' ); ?></a>
								<div class="feat-stars">
									<div class="stars"></div>
									<div class="text">
										<?php _e('Featured', 'wellthemes'); ?>
									</div>
								</div>
			
								<?php
									$cat_icon = wt_get_post_cat_icon();
									if ($cat_icon){
										echo $cat_icon;
									} 
								?>												
							</div>
							<?php } ?>
							
							<div class="excerpt-wrap">
	
								<div class="entry-meta">
									<?php 
										$stars = get_overall_score();										
										if ($stars){ ?>
											<span class="score"><?php echo $stars; ?></span>
									<?php }	?>
									<span class="date"><?php echo get_the_date(); ?></span>
									<span class="author"><?php _e('by ', 'wellthemes'); ?><?php the_author_posts_link(); ?></span>
								</div>	
								
								<h2>
									<a href="<?php the_permalink() ?>" rel="bookmark">
										<?php 
											//display only first 60 characters in the title.
											$title = the_title('','',FALSE);
											$short_title = mb_substr($title, 0, 60);
											echo $short_title; 
											if (strlen($title) > 60){ 
												echo '...'; 
											} 
										?>
									</a>
								</h2>
								
								<?php the_excerpt(); ?>
								
								<footer class="entry-footer">
									<div class="read-more main-color-bg">
										<a href="<?php the_permalink(); ?>"><?php _e('Read More', 'wellthemes'); ?></a>
									</div>
									
									<div class="entry-meta">
										<div class="meta-top">
											<span class="category"><span><?php _e('In:', 'wellthemes'); ?></span><?php the_category(', ' ); ?></span>
											<span class="sep">/</span>
											<?php if ( comments_open() ) : ?>
												<span class="comments">
													<?php comments_popup_link( __('Leave comment', 'wellthemes'), __( '1', 'wellthemes'), __('%', 'wellthemes')); ?>
												</span>	
											<?php endif; ?>
										</div>
										<?php the_tags('<div class="tags"><span>' . __( 'Tags:', 'wellthemes' ).'</span>',', ','</div>'); ?>
									</div>
								
								</footer>
								
							</div>
														
					</div><!-- /main-post -->
				<?php } 
				
				if ( $query->current_post == 1 ) {	?>
				<div class="post-list col col-260">
			<?php }
				if ( $query->current_post >= 1 ) { ?>
					
					<div class="item-post">
					
						<?php if ( has_post_thumbnail() ) {	?>
							<div class="thumb">
								<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'wt260_125' ); ?></a>
							</div>
						<?php } ?>
					
						<div class="entry-meta">
							<span class="entry-cats"><?php wt_get_cats_with_icons(); ?></span>
						</div>
						
						<h4>
							<a href="<?php the_permalink() ?>">
								<?php 																
									$title = the_title('','',FALSE);
									$short_title = mb_substr($title, 0, 60);
									echo $short_title; 
									if (strlen($title) > 60){ 
										echo '...'; 
									} 
								?>	
							</a>
						</h4>
						
						<div class="entry-meta meta-bottom">
							<?php if ($stars){ ?>
								<span class="score"><?php echo $stars; ?></span>
								<span class="date"><?php echo get_the_date(); ?></span>
							<?php } else { ?>
								<span class="date"><?php echo get_the_date(); ?></span>
								<span class="author"><?php _e('by ', 'wellthemes'); ?><?php the_author_posts_link(); ?></span>
							<?php }	?>
						</div>
					
					</div><!--/item-post -->
					
					
				<?php } 
				if (( $query->post_count  > 1) AND ($query->current_post == $last_post )) { ?>					
				</div><!-- /post-list -->
			<?php }	
			endwhile;
		endif;
		wp_reset_query(); ?>	
</div>
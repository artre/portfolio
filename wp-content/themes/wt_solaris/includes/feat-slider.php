<?php
/**
 * The template for displaying the featured slider on homepage.
 * Gets the category for the posts from the theme options. 
 * If no category is selected, displays the latest posts.
 *
 * @package  WellThemes
 * @file     feat-slider.php
 * @author   Well Themes Team
 * @link 	 http://wellthemes.com
 * 
 **/
?>
<?php		
	$cat_id = get_post_meta($post->ID, 'wt_meta_slider_cat', true);
	$slider_speed = get_post_meta($post->ID, 'wt_meta_slider_speed', true);	
	
	if (empty($slider_speed)){
		$slider_speed = 5000;
	}
	
	$args = array(
		'cat' => $cat_id,
		'post_status' => 'publish',
		'ignore_sticky_posts' => 1,
		'posts_per_page' => 5
	);
		
?>
<div id="slider-section" class="clearfix">
	<script>
		jQuery(document).ready(function($) {				
			$(".slider").show();
			$('.slider').flexslider({
				slideshow: true,							
				slideshowSpeed: <?php echo $slider_speed; ?>,   
				mousewheel: false,
				keyboard: true,
				controlNav: false,
				directionNav: true,	
				controlsContainer: ".slider .slider-nav",
				animation: "slide",
				itemWidth: 270,
				itemMargin: 10,
				minItems: 2,                   
				maxItems: 4,                   
				move: 0,
			});
		});
	</script>
	<div class="inner-wrap">
		<div class="slider">		
			<ul class="slides">
				<?php $query = new WP_Query( $args ); ?>
					<?php if ( $query -> have_posts() ) : ?>
						<?php while ( $query -> have_posts() ) : $query -> the_post(); ?>
								<?php if ( has_post_thumbnail()) { ?>				
									<li>
										<div class="thumb">
											<a href="<?php the_permalink(); ?>" >
												<?php the_post_thumbnail( 'wt270_320' ); ?>
											</a>
										</div>										
										
										<div class="post-info">
											<div class="inner">
												<div class="post-header">
													<div class="entry-cat">
														<?php $category = get_the_category(); ?>
														<h6><a href="<?php get_category_link( $category[0]-> id ); ?>"><?php echo $category[0]->cat_name; ?></a></h6>
													</div>
													<div class="title">
														<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
													</div>	
												</div>
												<div class="excerpt">
													<?php 
														$excerpt = get_the_excerpt();
														echo mb_substr($excerpt, 0, 150);
														if (strlen($excerpt) > 149){ 
															echo '...'; 
														}
													?>
												</div>										
											</div>											
										</div>										
									</li>							
							<?php } ?>
						<?php endwhile; ?>
					<?php endif;?>
				<?php wp_reset_query();?>				
			</ul>
			<div class="slider-nav"></div>
		</div>
	</div>
	
</div>
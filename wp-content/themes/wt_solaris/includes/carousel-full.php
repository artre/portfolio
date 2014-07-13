<?php
/**
 * The template for displaying the featured carousel on homepage.
 * Gets the category for the posts from the theme options. 
 * If no category is selected, displays the latest posts.
 *
 * @package  WellThemes
 * @file     feat-carousel.php
 * @author   Well Themes Team
 * @link 	 http://wellthemes.com
 * 
 **/
?>

<?php
	$carousel_title = get_post_meta($post->ID, 'wt_meta_full_carousel_title', true);
	$cat_id = get_post_meta($post->ID, 'wt_meta_full_carousel_cat', true);	
	
	$args = array(
		'cat' => $cat_id,
		'post_status' => 'publish',
		'ignore_sticky_posts' => 1,
		'posts_per_page' => 15
	);
		
?>
<div id="carousel-full" class="carousel-section clearfix">
	<script>
		jQuery(document).ready(function($) {				
			$(".carousel-full").show();
			$('.carousel-full').flexslider({
				slideshow: true,							
				slideshowSpeed: 3000,   
				mousewheel: false,
				keyboard: true,
				controlNav: false,
				directionNav: true,	
				controlsContainer: ".full-carousel-nav",
				animation: "slide",
				itemWidth: 173,
				itemMargin: 15,
				minItems: 2,                   
				maxItems: 6,                   
				move: 1,
			});
		});
	</script>
	<div class="inner-wrap">
		<?php if($carousel_title){ ?>
			<div class="section-title clearfix">
				<div class="title"><h4 class="main-color-bg"><?php echo $carousel_title; ?></h4></div>
				<div class="carousel-nav full-carousel-nav"></div>
			</div>
		<?php } ?>
		
		<div class="carousel-full">
			<ul class="slides">
				<?php $query = new WP_Query( $args ); ?>
					<?php if ( $query -> have_posts() ) : ?>
						<?php while ( $query -> have_posts() ) : $query -> the_post(); ?>
								<?php if ( has_post_thumbnail()) { ?>				
									<li>
										<div class="thumb">
											<a href="<?php the_permalink(); ?>" >
												<?php the_post_thumbnail( 'wt175_115' ); ?>
											</a>								
										</div>
										<div class="post-info">									
												
											<div class="title">
												<h6><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h6>
											</div>	
											
											<div class="entry-meta">
												<span class="date"><?php echo get_the_date(); ?></span>
											</div>
																						
										</div>										
									</li>							
							<?php } ?>
						<?php endwhile; ?>
					<?php endif;?>
				<?php wp_reset_query();?>				
			</ul>			
		</div>
	</div>
</div>
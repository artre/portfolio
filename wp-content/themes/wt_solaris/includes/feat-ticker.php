<?php
/**
 * The template for displaying the scrolling posts.
 * Gets the category for the posts from the theme options. 
 * If no category is selected, displays the latest posts.
 *
 * @package  WellThemes
 * @file     ticker.php
 * @author   Well Themes Team
 * @link 	 http://wellthemes.com
 */
?>
<?php
	$cat_id = "";
	$cat_id = wt_get_option('wt_ticker_category');		//get category id
	
	$args = array(
		'cat' => $cat_id,
		'post_status' => 'publish',
		'ignore_sticky_posts' => 1,
		'posts_per_page' => 15
	);
?>
<script>
	jQuery(document).ready(function() {		
		jQuery("#feat-ticker").show();
		jQuery("ul#ticker-posts").liScroll({travelocity: 0.05});		
	});	
</script>
<div class="inner-wrap">
	<div id="feat-ticker" class="section-title clearfix">	
		<?php if (wt_get_option( 'wt_ticker_title' )) { ?>		
			<div class="title"><h4><?php echo wt_get_option( 'wt_ticker_title' ); ?></h4></div>
		<?php } ?>
		<ul id="ticker-posts">
			<?php $query = new WP_Query( $args ); ?>
				<?php if ( $query -> have_posts() ) : ?>
					<?php while ( $query -> have_posts() ) : $query -> the_post(); ?>
						<li>
							<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
							<div class="sep">&bull;</div>
						</li>							
					<?php endwhile; ?>
				<?php endif; ?>
			<?php wp_reset_query();?>
		</ul>
	</div>	
</div><!-- /newsticker -->
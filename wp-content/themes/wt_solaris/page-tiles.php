<?php
/**
 * Template Name: Blog Tiles
 * Description: A Page Template to display blog archives with the sidebar.
 *
 * @package  WellThemes
 * @file     page-blog.php
 * @author   Well Themes Team
 * @link 	 http://wellthemes.com
 */
?>
<?php get_header(); ?>

<div id="content" class="tiles-page full-content">
		
		<header class="page-header">
			<h2><?php the_title(); ?></h2>
		</header><!-- /entry-header -->
		
		<?php
		
			if ( get_query_var('paged') ) {
				$paged = get_query_var('paged');
			} elseif ( get_query_var('page') ) {
				$paged = get_query_var('page');
			} else {
				$paged = 1;
			}
			
			$cat_id = get_post_meta($post->ID, 'wt_meta_tiles_cat', true);	
					
			$args = array(
				'cat' => $cat_id,
				'post_status' => 'publish',
				'ignore_sticky_posts' => 1,
				'posts_per_page' => 12,		
				 'paged' => $paged
			);			
		?>
	
		<?php $wp_query = new WP_Query( $args ); ?>
		<?php if ( $wp_query -> have_posts() ) : ?>
			<div class="tile-items">
				<?php while ( $wp_query -> have_posts() ) : $wp_query -> the_post(); ?>								
					<div class="item-post">
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
					</div>
				<?php endwhile; ?>
			</div>
			<?php wt_pagination(); ?>
			<?php wp_reset_query();?>
			<?php else : ?>

					<article id="post-0" class="post no-results not-found">
						<header class="entry-header">
							<h1 class="entry-title"><?php _e( 'Nothing Found', 'wellthemes' ); ?></h1>
						</header><!-- /entry-header -->

						<div class="entry-content">
							<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'wellthemes' ); ?></p>
							<?php get_search_form(); ?>
						</div><!-- /entry-content -->
					</article><!-- /post-0 -->

				<?php endif; ?>
</div><!-- /content -->
<?php get_footer(); ?>
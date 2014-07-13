<?php
/**
 * The template for displaying content in the archive and search results template
 *
 * @package  WellThemes
 * @file     content-excerpt.php
 * @author   WellThemes Team
 * @link 	 http://wellthemes.com
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	
	<?php if ( has_post_thumbnail() ) {	?>
		<div class="thumb">
			<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'wt270_180' ); ?></a>							
		</div>
	<?php } ?>
	
	<div class="excerpt-wrap">
	
		<div class="entry-meta">
			<?php 
				if ( wt_get_option( 'wt_enable_rating' ) == 1 ){
					ec_stars_rating_archive(); 
				}
			?>
			<span class="date"><?php echo get_the_date(); ?></span>
			
			<?php
				$comment_count = get_comments_number($post->ID);
				if ($comment_count > 0){ ?>
					<span class="sep">-</span>
					<?php comments_popup_link( __('No comments', 'wellthemes'), __( '1 comment', 'wellthemes'), __('% comments', 'wellthemes'));
				}			
			?>
		</div>	
		
		<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>		
		<?php the_excerpt(); ?>
				
	</div>
	
</article><!-- /post-<?php the_ID(); ?> -->
<?php
/**
 * Template Name: Featured Page
 * Description: A Page Template to display featured page content
 *
 * @package  WellThemes
 * @file     page-featured.php
 * @author   Well Themes Team
 * @link 	 http://wellthemes.com
 */
?>
<?php get_header(); ?>

<div id="content" class="featured-page">
	<?php
		
		if ($paged < 2 ){
			
			//Featured category 1
			$feat_cat1 = get_post_meta($post->ID, 'wt_meta_feat_cat1', true);	
			if ($feat_cat1) {
				get_template_part( 'includes/feat-cat1' );				
			}	
			
			//Content Banner 1
			$post_banner1 = get_post_meta($post->ID, 'wt_meta_banner1', true);						
			if (!empty($post_banner1)) { ?>
					
				<div class="entry-ad section">
					<div class="ad-inner-wrap">
						<?php echo $post_banner1; ?>
					</div>			
				</div>
					
			<?php }
			
			//Single categories
			$single_cat1 = get_post_meta($post->ID, 'wt_meta_single_cat1', true);	
			$single_cat2 = get_post_meta($post->ID, 'wt_meta_single_cat2', true);	
			
			if (($single_cat1) or ($single_cat2)){
				get_template_part( 'includes/single-cats' );		
			}
			
			//Carousel
			$show_carousel = get_post_meta($post->ID, 'wt_meta_show_carousel', true);		
			if ($show_carousel == 1) {
				get_template_part( 'includes/feat-carousel' );				
			}
			
			//Featured category 2
			$feat_cat2 = get_post_meta($post->ID, 'wt_meta_feat_cat2', true);	
			if ($feat_cat2) {
				get_template_part( 'includes/feat-cat2' );				
			}
			
			//Featured category 3
			$feat_cat3 = get_post_meta($post->ID, 'wt_meta_feat_cat3', true);	
			if ($feat_cat3) {
				get_template_part( 'includes/feat-cat3' );				
			}
			
			//Featured category 4
			$feat_cat4 = get_post_meta($post->ID, 'wt_meta_feat_cat4', true);	
			if ($feat_cat4) {
				get_template_part( 'includes/feat-cat4' );				
			}
			
			//Featured category 5
			$feat_cat5 = get_post_meta($post->ID, 'wt_meta_feat_cat5', true);	
			if ($feat_cat5) {
				get_template_part( 'includes/feat-cat5' );				
			}
			
			//Content Banner 2
			$post_banner2 = get_post_meta($post->ID, 'wt_meta_banner2', true);			
			if (!empty($post_banner2)) { ?>					
				<div class="entry-ad section">
					<div class="ad-inner-wrap">
						<?php echo $post_banner2; ?>
					</div>			
				</div>					
			<?php }						
		}
	?>	
</div>
<?php get_sidebar('left'); ?>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>
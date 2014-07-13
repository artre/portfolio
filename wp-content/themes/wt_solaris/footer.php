<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package  WellThemes
 * @file     footer.php
 * @author   Well Themes Team
 * @link 	 http://wellthemes.com
 */
?>
	</div><!-- /inner-wrap -->
	
	<?php
		if (is_page_template('page-featured.php')&& $paged < 2 ){		
			
			$show_full_carousel = get_post_meta($post->ID, 'wt_meta_show_full_carousel', true);
			
			if ( $show_full_carousel == 1 ){ 
				get_template_part( 'includes/carousel-full' );	
			}
			
			$show_footermenu = get_post_meta($post->ID, 'wt_meta_show_footermenu', true);			
				
			if ( $show_footermenu == 1 ){ 
				$menu_title = get_post_meta($post->ID, 'wt_meta_footermenu_title', true);
			?>
			
			<div class="footer-menu inner-wrap">
				<?php if ($menu_title){ ?>
					<div class="section-title clearfix">
						<div class="title"><h4><?php echo $menu_title; ?></h4></div>
						<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container' => '0', 'depth' => '1' )); ?>
					</div>
				<?php } ?>
			</div>
		
			<?php
			}		
		}
	?>
	
	</section><!-- /main -->

	<footer id="footer">
		
		<div class="footer-widgets">
			<div class="inner-wrap">
			
				<div class="col-265">			
					<?php 
						if ( ! dynamic_sidebar( 'footer-1' ) ) : 			
						endif;
					?>
				</div>
				
				<div class="col-265">	
					<?php 
						if ( ! dynamic_sidebar( 'footer-2' ) ) : 			
						endif;
					?>
				</div>
				
				<div class="col-265">	
					<?php 
						if ( ! dynamic_sidebar( 'footer-3' ) ) : 			
						endif;
					?>
				</div>
				
				<div class="col-265 col-last">
					<?php 
						if ( ! dynamic_sidebar( 'footer-4' ) ) : 			
						endif;					
					?>
				</div>
			
			</div><!-- /inner-wrap -->			
			
		</div><!-- /footer-widgets -->
		
		<div class="footer-info">
			<div class="inner-wrap">
				<?php if (wt_get_option( 'wt_footer_text_left' )){ ?> 
					<div class="footer-left">
						<?php echo wt_get_option( 'wt_footer_text_left' ); ?>			
					</div>
				<?php } ?>
				
				
			</div><!-- /inner-wrap -->			
		</div> <!--/footer-info -->
		
	</footer><!-- /footer -->
</div><!-- /container -->
<?php wp_footer(); ?>

</body>
</html>
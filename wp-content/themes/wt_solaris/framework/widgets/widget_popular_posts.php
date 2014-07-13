<?php
/**
 * Plugin Name: WellThemes: Popular Posts
 * Plugin URI: http://wellthemes.com/
 * Description: This widhet displays the most popular posts in the sidebar.
 * Version: 1.0
 * Author: WellThemes Team
 * Author URI: http://wellthemes.com/
 *
 */

/**
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'wellthemes_popular_posts_widgets' );

function wellthemes_popular_posts_widgets() {
	register_widget( 'wellthemes_popular_posts_widget' );
}

/**
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 */
class wellthemes_popular_posts_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function wellthemes_popular_posts_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget_posts_bg', 'description' => __('Displays the most popular posts in the sidebar.', 'wellthemes') );

		/* Create the widget. */
		$this->WP_Widget( 'wellthemes_popular_posts_widget', __('WellThemes: Popular Posts', 'wellthemes'), $widget_ops);
	}

	/**
	 * display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		
		extract( $args );
	    $title = apply_filters('widget_title', $instance['title'] );
		$display_category = $instance['display_category'];
		$entries_display = $instance['entries_display'];
		
		if(empty($entries_display)){ 
			$entries_display = '5'; 
		}
		
		echo $before_widget;
		
		if ( $title ){ ?>
			<div class="widget-title">
				<h4 class="title"><?php echo $title; ?></h4>
			</div>
		<?php }

        $args = array(
			'cat' => $display_category,
			'post_type' => 'post',
			'ignore_sticky_posts' => 1,
			'posts_per_page' => $entries_display,
			'meta_key' => 'post_views_count',
			'orderby' => 'meta_value_num'
		);
		
		function filter_where( $where = '' ) {
			$where .= " AND post_date > '" . date('Y-m-d', strtotime('-7 days')) . "'";
			return $where;
		}
		add_filter( 'posts_where', 'filter_where' );
		
		$popular_posts = new WP_Query( $args );
		remove_filter( 'posts_where', 'filter_where' );
		
		?>
		<ul class="list post-list">
			<?php while($popular_posts->have_posts()): $popular_posts->the_post();  ?>			
				<li>
					<article class="item-post">
							
						<?php if ( has_post_thumbnail() ) {	?>
							<div class="thumb overlay">
								<a href="<?php the_permalink(); ?>" >
									<?php the_post_thumbnail( 'wt270_180' ); ?>
								</a>
							</div>
						<?php } ?>
												
						<h3>
							<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
						</h3>
						
						<div class="entry-meta">
							<span class="date"><?php echo get_the_date(); ?></span>
							<span class="sep">-</span>
							<span class="read"><?php echo getPostViews(get_the_ID()). ' '; ?><?php _e('Views', 'wellthemes'); ?></span>							
						</div>					
							
					</article>
				</li><!-- /item-post -->
		   <?php endwhile; ?>
		   <?php wp_reset_query();?>	
	   </ul>
	   <?php		
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {
		$defaults = array('title' => 'Popular Posts', 'entries_display' => 5, 'display_category' => '');
		$instance = wp_parse_args((array) $instance, $defaults);
	?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'wellthemes'); ?></label>
        <input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" /></p>
		
		<p><label for="<?php echo $this->get_field_id( 'entries_display' ); ?>"><?php _e('How many entries to display?', 'wellthemes'); ?></label>
		<input type="text" id="<?php echo $this->get_field_id('entries_display'); ?>" name="<?php echo $this->get_field_name('entries_display'); ?>" value="<?php echo $instance['entries_display']; ?>" style="width:100%;" /></p>
 
		<p><label for="<?php echo $this->get_field_id( 'display_category' ); ?>"><?php _e('Display specific categories? Enter category ids separated with a comma (e.g. - 1, 3, 8)', 'wellthemes'); ?></label>
		<input type="text" id="<?php echo $this->get_field_id('display_category'); ?>" name="<?php echo $this->get_field_name('display_category'); ?>" value="<?php echo $instance['display_category']; ?>" style="width:100%;" /></p>
	<?php
	}
}
?>
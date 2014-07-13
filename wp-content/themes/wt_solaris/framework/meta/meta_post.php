<?php
/**
 * Adds post layout meta box to post edit screen
 *
 */
function wellthemes_post_meta_settings() {
	add_meta_box("wt_meta_post_sidebar_settings", "Sidebar Settings", "wt_meta_post_sidebar_settings", "post", "normal", "low");
	add_meta_box("wt_meta_post_ads_settings", "Ads Settings", "wt_meta_post_ads_settings", "post", "normal", "low");

	add_meta_box("wt_meta_post_sidebar_settings", "Sidebar Settings", "wt_meta_post_sidebar_settings", "page", "normal", "low");
	add_meta_box("wt_meta_post_ads_settings", "Ads Settings", "wt_meta_post_ads_settings", "page", "normal", "low");
	
	$post_id = '';	
	if(isset($_GET['post'])){  
		$post_id = $_GET['post'];
    }
	
	if(isset($_POST['post_ID'])){
		$post_id =  $_POST['post_ID'];
    }	
	
	$template_file = get_post_meta($post_id, '_wp_page_template', TRUE);
	if ($template_file == 'page-featured.php') {
		add_meta_box("wt_meta_featured_page_settings", "Featured Page Settings", "wt_meta_featured_page_settings", "page", "normal", "high");
	}
	
	if ($template_file == 'page-tiles.php') {
		add_meta_box("wt_meta_tiles_page_settings", "Tiles Page Settings", "wt_meta_tiles_page_settings", "page", "normal", "high");
	}
	
}
add_action( 'add_meta_boxes', 'wellthemes_post_meta_settings' );

/**
 * Display tiles page settings
 *
 */ 
function wt_meta_tiles_page_settings() {
	global $post;
	global $pagenow;
	wp_nonce_field( 'wellthemes_save_postmeta_nonce', 'wellthemes_postmeta_nonce' ); ?>
	
	<div class="meta-section1">
		<div class="meta-field">
			<label><?php _e( 'Category', 'wellthemes' ); ?></label>
			<select id="wt_meta_tiles_cat" name="wt_meta_tiles_cat" class="styled">
				<?php 
					$categories = get_categories( array( 'hide_empty' => 1, 'hierarchical' => 0 ) );  
					$saved_cat = get_post_meta( $post->ID, 'wt_meta_tiles_cat', true );
				?>
				<option <?php selected( 0 == $saved_cat ); ?> value="0"><?php _e('--none--', 'wellthemes'); ?></option>	
				<?php
					if($categories){
						foreach ($categories as $category){?>
							<option <?php selected( $category->term_id == $saved_cat ); ?> value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name; ?></option>							
							<?php					
						}
					}
				?>			
			</select>
			<div class="desc"><?php _e( 'Select category for tiles page. Select none to display latest posts.', 'wellthemes' ); ?></div>
		</div>		
	</div>
	
	<?php
}

/**
 * Display featured post settings
 *
 */ 
function wt_meta_featured_page_settings() {
	global $post;
	global $pagenow;
	
	wp_nonce_field( 'wellthemes_save_postmeta_nonce', 'wellthemes_postmeta_nonce' ); ?>
	
	<div class="meta-section">
		<h4><?php _e('Slider Section', 'wellthemes'); ?></h4>
		
		<div class="meta-field field-checkbox">			
			<input name="wt_meta_show_slider" id="wt_meta_show_slider" type="checkbox" value="1" <?php checked( get_post_meta( $post->ID, 'wt_meta_show_slider', true ), 1 ); ?> /> 
			<label for="wt_meta_show_slider"><?php _e( 'Enable Featured Slider', 'wellthemes' ); ?></label>
		</div>
	
		<div class="meta-field">
			<label><?php _e( 'Slider Category', 'wellthemes' ); ?></label>
			<select id="wt_meta_slider_cat" name="wt_meta_slider_cat" class="styled">
				<?php 
					$categories = get_categories( array( 'hide_empty' => 1, 'hierarchical' => 0 ) );  
					$saved_cat = get_post_meta( $post->ID, 'wt_meta_slider_cat', true );
				?>
				<option <?php selected( 0 == $saved_cat ); ?> value="0"><?php _e('--none--', 'wellthemes'); ?></option>	
				<?php
					if($categories){
						foreach ($categories as $category){?>
							<option <?php selected( $category->term_id == $saved_cat ); ?> value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name; ?></option>							
							<?php					
						}
					}
				?>			
			</select>
			<div class="desc"><?php _e( 'Select category for slider. Select none to display latest posts.', 'wellthemes' ); ?></div>
		</div>
		
		<div class="meta-field">
			<?php
				$value = get_post_meta( $post->ID, 'wt_meta_slider_speed', true );
				if (empty($value)){
					$value = "5000";
				}
			?>			
			<label for="wt_meta_slider_speed"><?php _e( 'Slider Speed:', 'wellthemes' ); ?></label>
			<input name="wt_meta_slider_speed" class="compact-input" type="text" id="wt_meta_slider_speed" value="<?php echo $value; ?>" />
			<div class="desc"><?php _e( 'Enter the slider speed in milliseconds eg. 4000.', 'wellthemes' ); ?></div>
		</div>		
	</div><!-- /meta-section -->
		
	<div class="meta-section">
		<h4><?php _e('Featured Categories', 'wellthemes'); ?></h4>
		
		<div class="meta-field">
			<label><?php _e( 'Category 1', 'wellthemes' ); ?></label>
			<select id="wt_meta_feat_cat1" name="wt_meta_feat_cat1" class="styled">
				<?php 
					$categories = get_categories( array( 'hide_empty' => 1, 'hierarchical' => 0 ) );  
					$saved_cat = get_post_meta( $post->ID, 'wt_meta_feat_cat1', true );
				?>
				<option <?php selected( 0 == $saved_cat ); ?> value="0"><?php _e('--none--', 'wellthemes'); ?></option>	
				<?php
					if($categories){
						foreach ($categories as $category){?>
							<option <?php selected( $category->term_id == $saved_cat ); ?> value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name; ?></option>							
							<?php					
						}
					}
				?>			
			</select>
			<div class="desc"><?php _e( 'Select category. Select none to disable.', 'wellthemes' ); ?></div>
		</div>
		
		<div class="meta-field">
			<label><?php _e( 'Category 2', 'wellthemes' ); ?></label>
			<select id="wt_meta_feat_cat2" name="wt_meta_feat_cat2" class="styled">
				<?php 
					$categories = get_categories( array( 'hide_empty' => 1, 'hierarchical' => 0 ) );  
					$saved_cat = get_post_meta( $post->ID, 'wt_meta_feat_cat2', true );
				?>
				<option <?php selected( 0 == $saved_cat ); ?> value="0"><?php _e('--none--', 'wellthemes'); ?></option>	
				<?php
					if($categories){
						foreach ($categories as $category){?>
							<option <?php selected( $category->term_id == $saved_cat ); ?> value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name; ?></option>							
							<?php					
						}
					}
				?>			
			</select>
			<div class="desc"><?php _e( 'Select category. Select none to disable.', 'wellthemes' ); ?></div>
		</div>
		
		<div class="meta-field">
			<label><?php _e( 'Category 3', 'wellthemes' ); ?></label>
			<select id="wt_meta_feat_cat3" name="wt_meta_feat_cat3" class="styled">
				<?php 
					$categories = get_categories( array( 'hide_empty' => 1, 'hierarchical' => 0 ) );  
					$saved_cat = get_post_meta( $post->ID, 'wt_meta_feat_cat3', true );
				?>
				<option <?php selected( 0 == $saved_cat ); ?> value="0"><?php _e('--none--', 'wellthemes'); ?></option>	
				<?php
					if($categories){
						foreach ($categories as $category){?>
							<option <?php selected( $category->term_id == $saved_cat ); ?> value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name; ?></option>							
							<?php					
						}
					}
				?>			
			</select>
			<div class="desc"><?php _e( 'Select category. Select none to disable.', 'wellthemes' ); ?></div>
		</div>
		
		<div class="meta-field">
			<label><?php _e( 'Category 4', 'wellthemes' ); ?></label>
			<select id="wt_meta_feat_cat4" name="wt_meta_feat_cat4" class="styled">
				<?php 
					$categories = get_categories( array( 'hide_empty' => 1, 'hierarchical' => 0 ) );  
					$saved_cat = get_post_meta( $post->ID, 'wt_meta_feat_cat4', true );
				?>
				<option <?php selected( 0 == $saved_cat ); ?> value="0"><?php _e('--none--', 'wellthemes'); ?></option>	
				<?php
					if($categories){
						foreach ($categories as $category){?>
							<option <?php selected( $category->term_id == $saved_cat ); ?> value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name; ?></option>							
							<?php					
						}
					}
				?>			
			</select>
			<div class="desc"><?php _e( 'Select category. Select none to disable.', 'wellthemes' ); ?></div>
		</div>
		
		<div class="meta-field">
			<label><?php _e( 'Category 5', 'wellthemes' ); ?></label>
			<select id="wt_meta_feat_cat5" name="wt_meta_feat_cat5" class="styled">
				<?php 
					$categories = get_categories( array( 'hide_empty' => 1, 'hierarchical' => 0 ) );  
					$saved_cat = get_post_meta( $post->ID, 'wt_meta_feat_cat5', true );
				?>
				<option <?php selected( 0 == $saved_cat ); ?> value="0"><?php _e('--none--', 'wellthemes'); ?></option>	
				<?php
					if($categories){
						foreach ($categories as $category){?>
							<option <?php selected( $category->term_id == $saved_cat ); ?> value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name; ?></option>							
							<?php					
						}
					}
				?>			
			</select>
			<div class="desc"><?php _e( 'Select category. Select none to disable.', 'wellthemes' ); ?></div>
		</div>
	</div><!-- /meta-section -->

	<div class="meta-section">
		<h4><?php _e('Single Categories', 'wellthemes'); ?></h4>
		
		<div class="meta-field">
			<label><?php _e( 'Category 1', 'wellthemes' ); ?></label>
			<select id="wt_meta_single_cat1" name="wt_meta_single_cat1" class="styled">
				<?php 
					$categories = get_categories( array( 'hide_empty' => 1, 'hierarchical' => 0 ) );  
					$saved_cat = get_post_meta( $post->ID, 'wt_meta_single_cat1', true );
				?>
				<option <?php selected( 0 == $saved_cat ); ?> value="0"><?php _e('--none--', 'wellthemes'); ?></option>	
				<?php
					if($categories){
						foreach ($categories as $category){?>
							<option <?php selected( $category->term_id == $saved_cat ); ?> value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name; ?></option>							
							<?php					
						}
					}
				?>			
			</select>
			<div class="desc"><?php _e( 'Select category. Select none to disable.', 'wellthemes' ); ?></div>
		</div>
		
		<div class="meta-field">
			<label><?php _e( 'Category 2', 'wellthemes' ); ?></label>
			<select id="wt_meta_single_cat2" name="wt_meta_single_cat2" class="styled">
				<?php 
					$categories = get_categories( array( 'hide_empty' => 1, 'hierarchical' => 0 ) );  
					$saved_cat = get_post_meta( $post->ID, 'wt_meta_single_cat2', true );
				?>
				<option <?php selected( 0 == $saved_cat ); ?> value="0"><?php _e('--none--', 'wellthemes'); ?></option>	
				<?php
					if($categories){
						foreach ($categories as $category){?>
							<option <?php selected( $category->term_id == $saved_cat ); ?> value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name; ?></option>							
							<?php					
						}
					}
				?>			
			</select>
			<div class="desc"><?php _e( 'Select category. Select none to disable.', 'wellthemes' ); ?></div>
		</div>
		
	</div><!-- /meta-section -->
	
	<div class="meta-section">
		<h4><?php _e('Content Carousel', 'wellthemes'); ?></h4>
				
		<div class="meta-field field-checkbox">			
			<input name="wt_meta_show_carousel" type="checkbox" id="wt_meta_show_carousel" value="1" <?php checked( get_post_meta( $post->ID, 'wt_meta_show_carousel', true ), 1 ); ?> /> 
			<label for="wt_meta_show_carousel"><?php _e( 'Enable Carousel', 'wellthemes' ); ?></label>
		</div>
		
		<div class="meta-field">
			<label for="wt_meta_carousel_title"><?php _e( 'Title:', 'wellthemes' ); ?></label>
			<input name="wt_meta_carousel_title" type="text" id="wt_meta_carousel_title" value="<?php echo get_post_meta( $post->ID, 'wt_meta_carousel_title', true ); ?>" /> 
		</div>
		
		<div class="meta-field">
			<label><?php _e( 'Category', 'wellthemes' ); ?></label>
			<select id="wt_meta_carousel_cat" name="wt_meta_carousel_cat" class="styled">
				<?php 
					$categories = get_categories( array( 'hide_empty' => 1, 'hierarchical' => 0 ) );  
					$saved_cat = get_post_meta( $post->ID, 'wt_meta_carousel_cat', true );
				?>
				<option <?php selected( 0 == $saved_cat ); ?> value="0"><?php _e('--none--', 'wellthemes'); ?></option>	
				<?php
					if($categories){
						foreach ($categories as $category){?>
							<option <?php selected( $category->term_id == $saved_cat ); ?> value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name; ?></option>							
							<?php					
						}
					}
				?>			
			</select>
			<div class="desc"><?php _e( 'Select category. Select none to display latest posts.', 'wellthemes' ); ?></div>
		</div>
	</div><!-- /meta-section -->
	
	<div class="meta-section">
		<h4><?php _e('Full Carousel', 'wellthemes'); ?></h4>
				
		<div class="meta-field field-checkbox">			
			<input name="wt_meta_show_full_carousel" type="checkbox" id="wt_meta_show_full_carousel" value="1" <?php checked( get_post_meta( $post->ID, 'wt_meta_show_full_carousel', true ), 1 ); ?> /> 
			<label for="wt_meta_show_full_carousel"><?php _e( 'Enable Carousel', 'wellthemes' ); ?></label>
		</div>
		
		<div class="meta-field">
			<label for="wt_meta_full_carousel_title"><?php _e( 'Title:', 'wellthemes' ); ?></label>
			<input name="wt_meta_full_carousel_title" type="text" id="wt_meta_full_carousel_title" value="<?php echo get_post_meta( $post->ID, 'wt_meta_full_carousel_title', true ); ?>" /> 
		</div>
		
		<div class="meta-field">
			<label><?php _e( 'Category', 'wellthemes' ); ?></label>
			<select id="wt_meta_full_carousel_cat" name="wt_meta_full_carousel_cat" class="styled">
				<?php 
					$categories = get_categories( array( 'hide_empty' => 1, 'hierarchical' => 0 ) );  
					$saved_cat = get_post_meta( $post->ID, 'wt_meta_full_carousel_cat', true );
				?>
				<option <?php selected( 0 == $saved_cat ); ?> value="0"><?php _e('--none--', 'wellthemes'); ?></option>	
				<?php
					if($categories){
						foreach ($categories as $category){?>
							<option <?php selected( $category->term_id == $saved_cat ); ?> value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name; ?></option>							
							<?php					
						}
					}
				?>			
			</select>
			<div class="desc"><?php _e( 'Select category. Select none to display latest posts.', 'wellthemes' ); ?></div>
		</div>
	</div><!-- /meta-section -->
	
	<div class="meta-section">
		<h4><?php _e('Footer Menu', 'wellthemes'); ?></h4>
				
		<div class="meta-field field-checkbox">			
			<input name="wt_meta_show_footermenu" type="checkbox" id="wt_meta_show_footermenu" value="1" <?php checked( get_post_meta( $post->ID, 'wt_meta_show_footermenu', true ), 1 ); ?> /> 
			<label for="wt_meta_show_footermenu"><?php _e( 'Enable Menu', 'wellthemes' ); ?></label>
		</div>
		
		<div class="meta-field">
			<label for="wt_meta_footermenu_title"><?php _e( 'Title:', 'wellthemes' ); ?></label>
			<input name="wt_meta_footermenu_title" type="text" id="wt_meta_footermenu_title" value="<?php echo get_post_meta( $post->ID, 'wt_meta_footermenu_title', true ); ?>" /> 
		</div>
		
	</div>
		
<?php
	}
/**
 * Display sidebar settings
 *
 */
function wt_meta_post_sidebar_settings() {
	global $post;
	wp_nonce_field( 'wellthemes_save_postmeta_nonce', 'wellthemes_postmeta_nonce' ); ?>
		
	<div class="meta-field">
		<?php 	
			$options = get_option('wt_options');
			$sidebars = "";													
			if (isset($options['wt_custom_sidebars'])){
				$sidebars = $options['wt_custom_sidebars'] ;
			}
				
			$saved_left_sidebar = get_post_meta( $post->ID, 'wt_meta_left_sidebar_name', true );
			$saved_right_sidebar = get_post_meta( $post->ID, 'wt_meta_right_sidebar_name', true ); 
		?>
		<div class="meta-field">
			<label><?php _e( 'Select Left Sidebar:', 'wellthemes' ); ?></label>
			<select id="wt_meta_left_sidebar_name" name="wt_meta_left_sidebar_name" class="styled">
				<option <?php selected( "" == $saved_left_sidebar ); ?> value=""><?php _e('Default', 'wellthemes'); ?></option>	
				<?php
					if($sidebars){
						foreach ($sidebars as $sidebar){?>
							<option <?php selected( $sidebar == $saved_left_sidebar ); ?> value="<?php echo $sidebar; ?>"><?php echo $sidebar ?></option>							
							<?php					
						}
					}
				?>		
			</select>
		</div>
		
		<div class="meta-field">
			<label><?php _e( 'Select Right Sidebar:', 'wellthemes' ); ?></label>
			<select id="wt_meta_right_sidebar_name" name="wt_meta_right_sidebar_name" class="styled">
				<option <?php selected( "" == $saved_right_sidebar ); ?> value=""><?php _e('Default', 'wellthemes'); ?></option>	
				<?php
					if($sidebars){
						foreach ($sidebars as $sidebar){?>
							<option <?php selected( $sidebar == $saved_right_sidebar ); ?> value="<?php echo $sidebar; ?>"><?php echo $sidebar ?></option><?php					
						}
					}
				?>		
			</select>
			<span class="desc"><?php _e( 'You can create custom sidebars in WellThemes\'s theme options page.', 'wellthemes' ); ?></span>
		</div>
				
	</div>
	<?php
}

function wt_meta_post_ads_settings() {
	global $post;
	wp_nonce_field( 'wellthemes_save_postmeta_nonce', 'wellthemes_postmeta_nonce' );	?>
	
	<div class="meta-field textarea-field">
		<label><?php _e( 'Post Top Banner:', 'wellthemes' ); ?></label>
		<textarea name="wt_meta_banner1" id="wt_meta_banner1" type="textarea" cols="100%" rows="3"><?php echo get_post_meta( $post->ID, 'wt_meta_banner1', true ); ?></textarea>
		<div class="desc"><?php _e( 'Paste the banner code for post top banner. Leave blank to disable.', 'wellthemes' ); ?></div>			
	</div>
	
	<div class="meta-field textarea-field">
		<label><?php _e( 'Post Bottom Banner:', 'wellthemes' ); ?></label>
		<textarea name="wt_meta_banner2" id="wt_meta_banner2" type="textarea" cols="100%" rows="3"><?php echo get_post_meta( $post->ID, 'wt_meta_banner2', true ); ?></textarea>
		<div class="desc"><?php _e( 'Paste the banner code for post top banner. Leave blank to disable.', 'wellthemes' ); ?></div>			
	</div>
	
	<?php
	}
	
/**
 * Save post meta box settings
 *
 */
function wt_post_meta_save_settings() {
	global $post;
	
	if( !isset( $_POST['wellthemes_postmeta_nonce'] ) || !wp_verify_nonce( $_POST['wellthemes_postmeta_nonce'], 'wellthemes_save_postmeta_nonce' ) )
		return;

	if( !current_user_can( 'edit_posts' ) )
		return;
	
	if ( isset( $_POST['wt_meta_tiles_cat'] )){
		update_post_meta( $post->ID, 'wt_meta_tiles_cat', $_POST['wt_meta_tiles_cat'] );	
	}
	
	if ( isset( $_POST['wt_meta_show_slider'] ) && $_POST['wt_meta_show_slider'] == 1) {
		update_post_meta( $post->ID, 'wt_meta_show_slider', 1 );	
	} else {
		delete_post_meta( $post->ID, 'wt_meta_show_slider');	
	}
	
	if ( isset( $_POST['wt_meta_slider_cat'] )){
		update_post_meta( $post->ID, 'wt_meta_slider_cat', $_POST['wt_meta_slider_cat'] );	
	}
	
	if(isset($_POST['wt_meta_slider_speed'])){
		update_post_meta($post->ID, 'wt_meta_slider_speed', sanitize_text_field($_POST['wt_meta_slider_speed']));
	}
		
	if ( isset( $_POST['wt_meta_feat_cat1'] )){
		update_post_meta( $post->ID, 'wt_meta_feat_cat1', $_POST['wt_meta_feat_cat1'] );	
	}
	
	if ( isset( $_POST['wt_meta_feat_cat2'] )){
		update_post_meta( $post->ID, 'wt_meta_feat_cat2', $_POST['wt_meta_feat_cat2'] );	
	}
	
	if ( isset( $_POST['wt_meta_feat_cat3'] )){
		update_post_meta( $post->ID, 'wt_meta_feat_cat3', $_POST['wt_meta_feat_cat3'] );	
	}
	
	if ( isset( $_POST['wt_meta_feat_cat4'] )){
		update_post_meta( $post->ID, 'wt_meta_feat_cat4', $_POST['wt_meta_feat_cat4'] );	
	}
	
	if ( isset( $_POST['wt_meta_feat_cat5'] )){
		update_post_meta( $post->ID, 'wt_meta_feat_cat5', $_POST['wt_meta_feat_cat5'] );	
	}	
	
	if ( isset( $_POST['wt_meta_single_cat1'] )){
		update_post_meta( $post->ID, 'wt_meta_single_cat1', $_POST['wt_meta_single_cat1'] );	
	}
	
	if ( isset( $_POST['wt_meta_single_cat2'] )){
		update_post_meta( $post->ID, 'wt_meta_single_cat2', $_POST['wt_meta_single_cat2'] );	
	}
	
	if ( isset( $_POST['wt_meta_show_carousel'] ) && $_POST['wt_meta_show_carousel'] == 1) {
		update_post_meta( $post->ID, 'wt_meta_show_carousel', 1 );	
	} else {
		delete_post_meta( $post->ID, 'wt_meta_show_carousel');	
	}
	
	if(isset($_POST['wt_meta_carousel_title'])){
		update_post_meta($post->ID, 'wt_meta_carousel_title', sanitize_text_field($_POST['wt_meta_carousel_title']));
	}
	
	if ( isset( $_POST['wt_meta_carousel_cat'] )){
		update_post_meta( $post->ID, 'wt_meta_carousel_cat', $_POST['wt_meta_carousel_cat'] );	
	}
	
	if ( isset( $_POST['wt_meta_show_full_carousel'] ) && $_POST['wt_meta_show_full_carousel'] == 1) {
		update_post_meta( $post->ID, 'wt_meta_show_full_carousel', 1 );	
	} else {
		delete_post_meta( $post->ID, 'wt_meta_show_full_carousel');	
	}
	
	if(isset($_POST['wt_meta_full_carousel_title'])){
		update_post_meta($post->ID, 'wt_meta_full_carousel_title', sanitize_text_field($_POST['wt_meta_full_carousel_title']));
	}
	
	if ( isset( $_POST['wt_meta_full_carousel_cat'] )){
		update_post_meta( $post->ID, 'wt_meta_full_carousel_cat', $_POST['wt_meta_full_carousel_cat'] );	
	}
	
	if ( isset( $_POST['wt_meta_show_footermenu'] ) && $_POST['wt_meta_show_footermenu'] == 1) {
		update_post_meta( $post->ID, 'wt_meta_show_footermenu', 1 );	
	} else {
		delete_post_meta( $post->ID, 'wt_meta_show_footermenu');	
	}
	
	if(isset($_POST['wt_meta_footermenu_title'])){
		update_post_meta($post->ID, 'wt_meta_footermenu_title', sanitize_text_field($_POST['wt_meta_footermenu_title']));
	}
	
	if ( isset( $_POST['wt_meta_left_sidebar_name'] )){
		update_post_meta( $post->ID, 'wt_meta_left_sidebar_name', $_POST['wt_meta_left_sidebar_name'] );	
	}
	
	if ( isset( $_POST['wt_meta_right_sidebar_name'] )){
		update_post_meta( $post->ID, 'wt_meta_right_sidebar_name', $_POST['wt_meta_right_sidebar_name'] );	
	}	
		
	if(isset($_POST['wt_meta_banner1'])){
		update_post_meta( $post->ID, 'wt_meta_banner1', $_POST['wt_meta_banner1'] );
	}
	
	if(isset($_POST['wt_meta_banner2'])){
		update_post_meta( $post->ID, 'wt_meta_banner2', $_POST['wt_meta_banner2'] );
	}
	
}
add_action( 'save_post', 'wt_post_meta_save_settings' );
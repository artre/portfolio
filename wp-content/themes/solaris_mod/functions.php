<?php 

	// register custom nav

	register_nav_menus( array(
		'primary-menu' => __( 'Primary Menu', 'solaris_mod' ),
		'sidebar' => __( 'Sidebar Menu', 'solaris_mod' ),
		'edu-sidenav' => __( 'Education Sidenav Menu', 'solaris_mod' ),
		'legal-menu' => __( 'Legal Menu', 'solaris_mod' )
	) );
	/*
	functions for out put menu

	<?php wp_nav_menu( array( 'theme_location' => 'Reviews', 'menu_class' => 'reviews-menu' ) ); ?>
	<?php wp_nav_menu( array( 'theme_location' => 'Education', 'menu_class' => 'education-menu' ) ); ?>
	<?php wp_nav_menu( array( 'theme_location' => 'Startups', 'menu_class' => 'startups-menu' ) ); ?>
	<?php wp_nav_menu( array( 'theme_location' => 'Regulations', 'menu_class' => 'regulations-menu' ) ); ?>

		end functions for out put menu

	*/
	// end of custom nav

	// regiserting custom hamburger widget for nav
	
	/*
	function nav_widget_int(){

 		// setting the values for Hamburger nav widget
		register_sidebar( array(
			'name'          => __( 'Hamburger Nav Widget', 'solaris_mod' ),
			'id'            => 'hamburger_menu',
			'description'   => __( 'Side bar Menu hamburger', 'solaris_mod' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="hamburger_nav">',
			'after_title'   => '</h1>',
		) );
	}
	add_action( 'widgets_init', 'nav_widget_int' );
	*/
	// end of registering custom hamburger widget fo nav


	// redirect logout to home page
	function go_home() {
		wp_redirect( home_url() );
		exit();
	}
	add_action('wp_logout', 'go_home');

	
	// Fuction nesting the custom post types 
	function bitcoin_edu_post() {
		// start array setting up post options 
		$labels = array(
			'name'               => _x( 'Bitcoin Education News', 'post type general name' ),
			'singular_name'      => _x( 'BitcoinEdu', 'post type singular name' ),
			'add_new'            => _x( 'Add New', 'Bitcoin' ),
			'add_new_item'       => __( 'Bitcoin Education Post' ),
			'edit_item'          => __( 'Edit Edu Post' ),
			'new_item'           => __( 'New Edu Post' ),
			'all_items'          => __( 'All Edu Post' ),
			'view_item'          => __( 'View Product' ),
			'search_items'       => __( 'Search Edu Post' ),
			'not_found'          => __( 'No Edu Post found' ),
			'not_found_in_trash' => __( 'No Edu Post found in the Trash' ), 
			'parent_item_colon'  => '',
			'menu_name'          => 'Bit Education'
		// end array setting up post options 
		);
			$args = array(

			// Custom POST type info and settings
			'labels'        => $labels,
			'description'   => 'Holds POST for Bitcoin education section',
			'public'        => true,
			'menu_position' => 2,
			'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
			'has_archive'   => true,
			// end of Custom POST type info and settings
		);
			// Wordpress function to register custom post type
			register_post_type( 'bit_edu', $args );	
	}
	// Putting the whole custom pos type together
	add_action( 'init', 'bitcoin_edu_post' );

	// for education and explore section 
	function my_taxonomies_bitcoin_edu() {
		$labels = array(
			'name'              => _x( 'Bitcoin Education Categories', 'taxonomy general name' ),
			'singular_name'     => _x( 'Bitcoin Category', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Bitcoin Categories' ),
			'all_items'         => __( 'All Bitcoin Categories' ),
			'parent_item'       => __( 'Parent Bitcoin Category' ),
			'parent_item_colon' => __( 'Parent Bitcoin Category:' ),
			'edit_item'         => __( 'Edit Bitcoin Category' ), 
			'update_item'       => __( 'Update Bitcoin Category' ),
			'add_new_item'      => __( 'Add New Bitcoin Category' ),
			'new_item_name'     => __( 'New Bitcoin Category' ),
			'menu_name'         => __( 'Bit Edu Categories' ),
		);

		$args = array(
			'labels' => $labels,
			'hierarchical' => true,
		);
		register_taxonomy( 'bitcoin_edu_category', 'bit_edu', $args );
	}
	add_action( 'init', 'my_taxonomies_bitcoin_edu', 0 );
	//end of custom post type
	
/* ADD THIS
======================================================================================
====================================================================================== */
	// Fuction nesting the custom post types 
	function glossary_post() {
		// start array setting up post options 
		$labels = array(
			'name'               => _x( 'Glossary Posts', 'post type general name' ),
			'singular_name'      => _x( 'Glossary', 'post type singular name' ),
			'add_new'            => _x( 'Add New', 'Bitcoin' ),
			'add_new_item'       => __( 'Glossary Posts' ),
			'edit_item'          => __( 'Edit Glossary Post' ),
			'new_item'           => __( 'New Glossary Post' ),
			'all_items'          => __( 'All Posts' ),
			'view_item'          => __( 'View Product' ),
			'search_items'       => __( 'Search Glossary Post' ),
			'not_found'          => __( 'No Glossary Post found' ),
			'not_found_in_trash' => __( 'No Glossary Post found in the Trash' ), 
			'parent_item_colon'  => '',
			'menu_name'          => 'Glossary'
		);
		// end array setting up post options 
		// Custom POST type info and settings
		$args = array(
			'labels'        => $labels,
			'description'   => 'Holds POST for Glossary section',
			'public'        => true,
			'menu_position' => 2,
			'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
			'has_archive'   => true,
		);
		// end of Custom POST type info and settings
		// Wordpress function to register custom post type
		register_post_type( 'glossary', $args );	
	}
	// Putting the whole custom pos type together
	add_action( 'init', 'glossary_post' );

/* White Papers Custom Posts
====================================================================================== */
	// Fuction nesting the custom post types 
	function create_white_papers() {
		// start array setting up post options 
		$labels = array(
			'name'               => _x( 'White Papers', 'post type general name' ),
			'singular_name'      => _x( 'White Paper', 'post type singular name' ),
			'add_new'            => _x( 'Add New', 'White Paper' ),
			'add_new_item'       => __( 'Add New White Paper' ),
			'edit_item'          => __( 'Edit White Paper' ),
			'new_item'           => __( 'New White Paper' ),
			'all_items'          => __( 'All Posts' ),
			'view_item'          => __( 'View White Paper' ),
			'search_items'       => __( 'Search White Papers' ),
			'not_found'          => __( 'No White Papers found' ),
			'not_found_in_trash' => __( 'No White Papers found in Trash' ), 
			'parent_item_colon'  => '',
			'menu_name'          => 'White Papers'
		);
		// end array setting up post options 
		// Custom POST type info and settings
		$args = array(
			'labels'        => $labels,
			'description'   => 'Holds POST for White Papers',
			'public'        => true,
			'menu_position' => 4,
			'supports'      => array( 'title', 'comments', 'thumbnail', 'custom-fields' ),
			'has_archive'   => true,
			'menu_icon' 	=> 'dashicons-editor-paste-word',
		);
		// end of Custom POST type info and settings
		// Wordpress function to register custom post type
		register_post_type( 'white_papers', $args );	
	}
	// Putting the whole custom pos type together
	add_action( 'init', 'create_white_papers' );

/* Longform Article Custom Posts
====================================================================================== */
	// Fuction nesting the custom post types 
	function create_longform_articles() {
		// start array setting up post options 
		$labels = array(
			'name'               => _x( 'Longform Articles', 'post type general name' ),
			'singular_name'      => _x( 'Longform Article', 'post type singular name' ),
			'add_new'            => _x( 'Add New', 'Longform Article' ),
			'add_new_item'       => __( 'Add New Longform Article' ),
			'edit_item'          => __( 'Edit Longform Article' ),
			'new_item'           => __( 'New Longform Article' ),
			'all_items'          => __( 'All Posts' ),
			'view_item'          => __( 'View Longform Article' ),
			'search_items'       => __( 'Search Longform Articles' ),
			'not_found'          => __( 'No Longform Articles found' ),
			'not_found_in_trash' => __( 'No Longform Articles found in Trash' ), 
			'parent_item_colon'  => '',
			'menu_name'          => 'Longform Articles'
		);
		// end array setting up post options 
		// Custom POST type info and settings
		$args = array(
			'labels'        => $labels,
			'description'   => 'Holds POST for Longform Articles',
			'taxonomies' 	=> array('category'), 
			'public'        => true,
			'menu_position' => 4,
			'supports'      => array( 'title', 'comments', 'thumbnail', 'custom-fields' ),
			'has_archive'   => true,
			'menu_icon' 	=> 'dashicons-editor-kitchensink',
		);
		// end of Custom POST type info and settings
		// Wordpress function to register custom post type
		register_post_type( 'longform_articles', $args );	
	}
	// Putting the whole custom pos type together
	add_action( 'init', 'create_longform_articles' );	
/* ====================================================================================== */



	// // for education and explore section 
	// function my_taxonomies_bitcoin_edu() {
	// 	$labels = array(
	// 		'name'              => _x( 'Bitcoin Education Categories', 'taxonomy general name' ),
	// 		'singular_name'     => _x( 'Bitcoin Category', 'taxonomy singular name' ),
	// 		'search_items'      => __( 'Search Bitcoin Categories' ),
	// 		'all_items'         => __( 'All Bitcoin Categories' ),
	// 		'parent_item'       => __( 'Parent Bitcoin Category' ),
	// 		'parent_item_colon' => __( 'Parent Bitcoin Category:' ),
	// 		'edit_item'         => __( 'Edit Bitcoin Category' ), 
	// 		'update_item'       => __( 'Update Bitcoin Category' ),
	// 		'add_new_item'      => __( 'Add New Bitcoin Category' ),
	// 		'new_item_name'     => __( 'New Bitcoin Category' ),
	// 		'menu_name'         => __( 'Bit Edu Categories' ),
	// 	);

	// 	$args = array(
	// 		'labels' => $labels,
	// 		'hierarchical' => true,
	// 	);
	// 	register_taxonomy( 'bitcoin_edu_category', 'bit_edu', $args );
	// }
	// add_action( 'init', 'my_taxonomies_bitcoin_edu', 0 );
	//end of custom post type
/* END OF ADD THIS
======================================================================================
====================================================================================== */

	// Fuction nesting the custom post types  news_filter_post_type
	function news_filter_post_type() {
		$labels = array(
			'name'               => _x( 'News Filter', 'post type general name' ),
			'singular_name'      => _x( 'News Filter', 'post type singular name' ),
			'add_new'            => _x( 'Add New', 'angular' ),
			'add_new_item'       => __( 'News Filter' ),
			'edit_item'          => __( 'Edit News Filter' ),
			'new_item'           => __( 'New News Filter' ),
			'all_items'          => __( 'News Filter' ),
			'view_item'          => __( 'View News Filter' ),
			'search_items'       => __( 'Search News Filter' ),
			'not_found'          => __( 'No News Filter Post found' ),
			'not_found_in_trash' => __( 'No News Filter' ),
			'parent_item_colon'  => '',
			'menu_name'          => 'News Categories'
		);
		$args = array(
			// Custom POST type info and settings news_filter_post_type
			'labels'        => $labels,
			'description'   => 'news filters type for sidebar nav',
			'public'        => true,
			'menu_position' => 5,
			'supports'      => array( 'title', 'editor', 'custom-fields', 'excerpt'),
			'has_archive'   => true,
			// end of Custom POST type info and settings news_filter_post_type
		);
		// Wordpress function to register custom post type news_filter_post_type
		register_post_type( 'news', $args );
	}
	add_action( 'init', 'news_filter_post_type' );

	/* Javascript Imports
	====================================================================== */
	function my_javascript_imports() {
		wp_enqueue_script('AngularJs', 'http://ajax.googleapis.com/ajax/libs/angularjs/1.2.14/angular.js');
		wp_enqueue_script('AngularJsAnimate', 'http://ajax.googleapis.com/ajax/libs/angularjs/1.2.14/angular-animate.min.js');
		wp_enqueue_script('AngularJsSanitize', 'http://ajax.googleapis.com/ajax/libs/angularjs/1.2.14/angular-sanitize.min.js');

		// Fancybox Pack
		wp_enqueue_script('fancybox-pack', get_stylesheet_directory_uri() . '/js/fancybox/jquery.fancybox.pack.js');
		// Fancybox Buttons
		wp_enqueue_script('fancybox-buttons', get_stylesheet_directory_uri() . '/js/fancybox/helpers/jquery.fancybox-buttons.js');
		// Fancybox Media
		wp_enqueue_script('fancybox-media', get_stylesheet_directory_uri() . '/js/fancybox/helpers/jquery.fancybox-media.js');
		// Fancybox Thumbs
		wp_enqueue_script('fancybox-thumbs', get_stylesheet_directory_uri() . '/js/fancybox/helpers/jquery.fancybox-thumbs.js');

		// Scripts restricted to logged in users
		if (is_user_logged_in()) {
			// Live Notifications
			wp_enqueue_script('live-notifications', get_stylesheet_directory_uri() . '/js/live-notifications.js');
		}

		// If on profile page
		if (bp_is_member()) {
			// BlurJS 
			wp_enqueue_script('blur-js', get_stylesheet_directory_uri() . '/js/blur.js');
			// Blur Apoply
			wp_enqueue_script('banner-blur', get_stylesheet_directory_uri() . '/js/banner-blur.js');
		}

		// Scripts Speciic to News Page
		if (is_page('news-page')) {
			/*News Page Main Module*/
			wp_enqueue_script('newsPageApp', get_stylesheet_directory_uri() . '/components/news-page-app/news_module.js');
			/*Bitstamp Component*/
			wp_enqueue_script('bitstampSocket', 'http://node1.cointechs.com:7777/socket.io/socket.io.js');
			wp_enqueue_script('bitstampTicker', get_stylesheet_directory_uri() . '/components/bitstamp/ticker_module.js');
			/*btce Component*/
			wp_enqueue_script('btceSocket', 'http://node1.cointechs.com:7333/socket.io/socket.io.js');
			wp_enqueue_script('btceTicker', get_stylesheet_directory_uri() . '/components/btce/ticker_module.js');
			/*btcchina Component*/
			wp_enqueue_script('btcchinaSocket', 'http://node1.cointechs.com:7555/socket.io/socket.io.js');
			wp_enqueue_script('btcchinaTicker', get_stylesheet_directory_uri() . '/components/btcchina/ticker_module.js');
			/*huobi Component*/
			wp_enqueue_script('huobiSocket', 'http://node1.cointechs.com:7111/socket.io/socket.io.js');
			wp_enqueue_script('huobiTicker', get_stylesheet_directory_uri() . '/components/huobi/ticker_module.js');
			/*Twitter Compoonent*/
			wp_enqueue_script('twitterSocket', 'http://node1.cointechs.com:3434/socket.io/socket.io.js');
			wp_enqueue_script('twitterApp', get_stylesheet_directory_uri() . '/components/twitter/twitter_module.js');
			/*Bootstrap All Components*/
			wp_enqueue_script('newPageInit', get_stylesheet_directory_uri() . '/js/news-page-init.js');
		}
	}
	add_action('wp_enqueue_scripts', 'my_javascript_imports');

	/* Stylesheet Imports
	====================================================================== */
	// Global Stylesheets
	function load_sitewide_stylesheets() {
		// Main fancybox css
		wp_enqueue_style('fancybox-style', get_stylesheet_directory_uri() . '/js/fancybox/jquery.fancybox.css');
		// Fancybox buttons css
		wp_enqueue_style('fancybox-buttons', get_stylesheet_directory_uri() . '/js/fancybox/helpers/jquery.fancybox-buttons.css');
		// Fancybox thumbs css
		wp_enqueue_style('fancybox-thumbs', get_stylesheet_directory_uri() . '/js/fancybox/helpers/jquery.fancybox-thumbs.css');
	}
	add_action('wp_enqueue_scripts', 'load_sitewide_stylesheets');

	// Stylsheet for login page
	function my_login_stylesheet() {
		wp_enqueue_style('my-login-style', get_stylesheet_directory_uri() . '/css/style-login.css');
	}
	add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );


	/* Custom Templates
	====================================================================== */
	// Custom nav pane for member profile page
	function bp_get_displayed_user_nav_geltstyle() {
	    global $bp;

	    foreach ( (array) $bp->bp_nav as $user_nav_item ) {
	        if ( empty( $user_nav_item['show_for_displayed_user'] ) && !bp_is_my_profile() )
	            continue;

	        $selected = '';
	        if ( bp_is_current_component( $user_nav_item['slug'] ) ) {
	            $selected = ' class="menu-item-has-children open"';
	        } else {
	            $selected = ' class="menu-item-has-children"';
	        }

	        if ( bp_loggedin_user_domain() ) {
	            $link = str_replace( bp_loggedin_user_domain(), bp_displayed_user_domain(), $user_nav_item['link'] );
	        } else {
	            $link = trailingslashit( bp_displayed_user_domain() . $user_nav_item['link'] );
	        }

	        // Match object-nav to their subnav using it's css_id
	        // The key name of subnavs matches the css_id
	        echo '<li id="' . $user_nav_item['css_id'] . '-personal-li" ' . $selected . '>';                               
	        echo '<a id="user-' . $user_nav_item['css_id'] . '" href="#">' . $user_nav_item['name'] . '</a>';    

	        if (bp_is_current_component( $user_nav_item['slug'] )) 
	            echo '<ul class="default-open">';
	        else 
	            echo '<ul>';

	        foreach ($bp->bp_options_nav[$user_nav_item['slug']] as $subnavItem) {
	            if ( !$subnavItem['user_has_access'] )
	                continue;

	            // If the current action or an action variable matches the nav item id, then add a highlight CSS class.
	            if ( $subnavItem['slug'] == bp_current_action() ) 
	                $selected = ' class="current selected"';
	            else 
	                $selected = '';

	            // List type depends on our current component
	            $list_type = bp_is_group() ? 'groups' : 'personal';

	            echo '<li id="' . $subnavItem['css_id'] . '-' . $list_type . '-li" ' . $selected . '>';
	            echo '<a id="' . $subnavItem['css_id'] . '" href="' . $subnavItem['link'] . '">' . $subnavItem['name'] . '</a></li>';
	        }
	        echo '</ul>';
	        echo '</li>';   
	    }
	}

	function bp_get_profile_bar_geltstyle() {
	    global $bp;
	    // Open profile nav container
	    echo '<div id="gelt-buddypress-bar" class="ab-sub-wrapper">';

	    // Open User Box
		echo '<div class="ab-submenu clearfix" id="wp-admin-bar">';

		// User Avatar
		echo '<div id="wp-admin-bar-user-avatar"><a href="' . bp_get_loggedin_user_link() . '">' . get_avatar( bp_loggedin_user_id(), 64);
		echo ' </a></div>';

		// User Profile
		echo '<div id="wp-admin-bar-user-name"><a href="' . bp_get_loggedin_user_link() . 'profile/edit">' . current_user_display_name() . '</a></div>';

		// Log Out
		echo '<div id="wp-admin-bar-log-out"><a href="' . wp_logout_url( get_home_url() ) . '">Log out</a></div>';

		// Close User Profile and User Box
		echo '</div>';

	    // Open User Actions Box
	    echo '<ul class="ab-sub-secondary ab-submenu" id="my-account-buddpress" style="clear:both;">';
	    // Topnav loop
	    foreach ( (array) $bp->bp_nav as $user_nav_item ) {
	        // if ( empty( $user_nav_item['show_for_displayed_user'] ) && !bp_is_my_profile() )
	        //     continue;

	        //if ( bp_loggedin_user_domain() )
	            //$link = str_replace( bp_loggedin_user_domain(), bp_displayed_user_domain(), $user_nav_item['link'] );
	        //else
	            //$link = trailingslashit( bp_displayed_user_domain() . $user_nav_item['link'] );
	    	$link = $user_nav_item['link'] ;

	        $classAttr = 'class="menupop"';
	        echo '<li id="my-account-' . $user_nav_item['css_id'] . '" ' . $classAttr . '>'; // li attributes
	        echo '<a class="ab-item" id="user-' . $user_nav_item['css_id'] . '" href="' . $link . '"><i class="fa fa-chevron-left"></i>' . ucfirst($user_nav_item['name']) . '</a>';     // a  attributes

	        // Subnav loop
			echo '<div class="ab-sub-wrapper">';  // open subnav container
			echo '<ul class="ab-submenu" id="my-account-' . $user_nav_item['css_id'] . '-default">'; // open subnav list
	        foreach ($bp->bp_options_nav[$user_nav_item['slug']] as $subnavItem) {
	            // if ( !$subnavItem['user_has_access'] )
	            //     continue;

	        	$subnavLink = $link . $subnavItem['slug'];

	            echo '<li id="my-account-'. $user_nav_item['css_id'] . '-' . $subnavItem['css_id'] . '">';
	            echo '<a href="' . $subnavLink . '">' . $subnavItem['name'] . '</a></li>';
	        }
	        echo '</ul>';   // close subnav list
	        echo '</li>';   // close close top level list element
	    }
	    echo '</ul>';	// Close User Actions Box 
	    echo '</div>';	// Close Profile nav container
	}

	function bp_get_profile_bar_geltstyle_beta() {
	    global $bp;
	    // Open profile nav container
	    echo '<div id="gelt-buddypress-bar" class="ab-sub-wrapper">';

	    // Open User Box
		echo '<div class="ab-submenu clearfix" id="wp-admin-bar">';

		// User Avatar
		echo '<div id="wp-admin-bar-user-avatar">' . get_avatar( bp_loggedin_user_id(), 64) . '</div>';

		// User Profile

		echo '<div id="wp-admin-bar-user-name">' . current_user_display_name() . '</div>';

		// Log Out
		echo '<div id="wp-admin-bar-log-out"><a href="' . wp_logout_url( get_home_url() ) . '">Log out</a></div>';

		// Close User Profile and User Box
		echo '</div></div>';
	}

	// When you enter wrong password this function redirects you to custom template page-login.php
	// add_action( 'wp_login_failed', 'my_front_end_login_fail' );  // hook failed login

	// function my_front_end_login_fail( $username ) {
	//    $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
	//    // if there's a valid referrer, and it's not the default log-in screen
	//    if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
	//       wp_redirect(site_url('/login-page/', 'login'));  // let's append some information (login=failed) to the URL for the theme to use
	//       exit;
	//    }
	// }
	// END When you enter wrong password this function redirects you to custom template page-login.php

	
	/* Change excerpt limit functions
	====================================================================== */
	// Change excerpt limit sitewide
	function custom_excerpt_length( $length ) {
		return 999;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	/* ********************
	* Limit post excerpts. Within theme files used as
	* print string_limit_words(get_the_excerpt(), 20);
	******************************************************************** */
	function string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
	}
	// get list of countries with custom field : key = legal-flg, value =1
	function getListOfCountries($wpdb)
	{
		$sql = "SELECT $wpdb->posts.*
		FROM $wpdb->posts, $wpdb->postmeta
		WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id
		AND $wpdb->postmeta.meta_key = 'legal-flg'
		AND $wpdb->postmeta.meta_value = '1'
		AND $wpdb->posts.post_status = 'publish'
		AND $wpdb->posts.post_type = 'page'
		ORDER BY $wpdb->posts.post_date ASC";

		return $pageposts = $wpdb->get_results($sql, OBJECT);
	}




	/* Helper Functions
	====================================================================== */
	// get notification count
	function current_user_notification_count() {
		$notifications = bp_core_get_notifications_for_user(bp_loggedin_user_id(), 'object');
		$count = !empty($notifications) ? count($notifications) : 0;
		return $count;
	}

	// get notification list
	function current_user_notification_list() {
		$notifications = bp_core_get_notifications_for_user(bp_loggedin_user_id(), 'object');
		echo '<ul>';
		if ($notifications) {
			foreach ($notifications as $notification) {
				echo '<li><a href="' . $notification->href . '">' . $notification->content . '</a></li>'; 
			}
		}
		else {
			echo '<li><a href="' . bp_loggedin_user_domain() . 'notifications">No new notifications</a></li>';
		}
		echo '</ul>';
	}	

	// get user avatar for login bar
	function current_user_avatar() {
		return get_avatar( bp_loggedin_user_id(), 20 );
	}

	// get current user display name
	function current_user_display_name() {
		global $current_user;

		get_currentuserinfo();
		return $current_user->user_login;
	}

	// Check User Roles
	function check_user_roles($roleList, $user_id = NULL) {
		if ($user_id)
			$user = get_userdata($user_id);
		else
			$user = wp_get_current_user();

		if (empty($user))
			return false;

		// Logged in user roles
		$userRoles = $user->roles;

		// Check if roleList matches user's actual roles
		if (is_array($roleList)) {
			foreach ($roleList as $thisRole) {
				if (in_array($thisRole, $userRoles))
					return true;
			}
			return false;
		}
		else {
			if (in_array($roleList, $userRoles)) 
				return true;
			else
				return false;
		}

	}

	/* AJAX Functions
	====================================================================== */
	// Used to long poll and update bp user notifications live
	function bp_user_notifications() {
		$notifications = bp_core_get_notifications_for_user(bp_loggedin_user_id(), 'object');
		$count         = !empty($notifications) ? count($notifications) : 0;
		$result        = array();
		$htmlString    = '<ul>';

		if ($notifications) {
			foreach ($notifications as $notification) {
				$htmlString .= '<li><a href="' . $notification->href . '">' . $notification->content . '</a></li>'; 
			}
		}
		else {
			$htmlString .= '<li><a href="' . bp_loggedin_user_domain() . 'notifications">No new notifications</a></li>';
		}
		$htmlString .= '</ul>';

		// Append properties to returned notificaitons object
		$result['count'] = $count;
		$result['list']  = $htmlString;
		echo json_encode($result);
		die();
	}
	add_action('wp_ajax_user_notifications', 'bp_user_notifications');
?>
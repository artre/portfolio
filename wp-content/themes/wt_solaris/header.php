<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package  WellThemes
 * @file     header.php
 * @author   WellThemes Team
 * @link 	 http://wellthemes.com
 */
?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'wellthemes' ), max( $paged, $page ) );

	?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>
<body <?php body_class(); ?>>
	
	<div id="container" class="hfeed">
	
	<header id="header">
		<?php if ( wt_get_option( 'wt_show_top_header' ) == 1 ) { ?>
			<div class="top">
				<div class="inner-wrap">
					<div class="top-menu">
						<?php wp_nav_menu( array( 'theme_location' => 'top-menu', 'container' => '0', 'depth' => '1') ); ?>
					</div>
				
					<div class="social">
						<ul class="list">
						<?php if (wt_get_option( 'wt_twitter_url' )) { ?>
							<li><a class="twitter" href="<?php echo wt_get_option( 'wt_twitter_url' ); ?>"><i class="fa fa-twitter"></i></a></li>
						<?php } ?>
						
						<?php if (wt_get_option( 'wt_fb_url' )) { ?>
							<li><a class="fb" href="<?php echo wt_get_option( 'wt_fb_url' ); ?>"><i class="fa fa-facebook"></i></a></li>
						<?php } ?>
						
						<?php if (wt_get_option( 'wt_gplus_url' )) { ?>
							<li><a class="gplus" href="<?php echo wt_get_option( 'wt_gplus_url' ); ?>"><i class="fa fa-google-plus"></i></a></li>
						<?php } ?>
						
						<?php if (wt_get_option( 'wt_instagram_url' )) { ?>
							<li><a class="instagram" href="<?php echo wt_get_option( 'wt_instagram_url' ); ?>"><i class="fa fa-instagram"></i></a></li>
						<?php } ?>
						
						<?php if (wt_get_option( 'wt_youtube_url' )) { ?>
							<li><a class="youtube" href="<?php echo wt_get_option( 'wt_youtube_url' ); ?>"><i class="fa fa-youtube-play"></i></a></li>
						<?php } ?>
						
						<?php if (wt_get_option( 'wt_rss_url' )) { ?>
							<li><a class="rss" href="<?php echo wt_get_option( 'wt_rss_url' ); ?>"><i class="fa fa-rss"></i></a></li>
						<?php } ?>
						
						</ul>
					</div>
				</div>
			</div>
		<?php } ?>
		
		<div class="logo-wrap clearfix">
			<div class="inner-wrap">
				<div class="logo">			
					<?php if (wt_get_option( 'wt_logo_url' )) { ?>
						<h1>
							<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
								<img src="<?php echo wt_get_option( 'wt_logo_url' ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
							</a>
						</h1>	
					<?php } else {?>
						<h1 class="site-title">
							<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
								<?php bloginfo('name'); ?>
							</a>
						</h1>					
					<?php } ?>	
				</div>
				
				<div class="menu-section clearfix">
					<nav id="main-menu">
						<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '0', 'fallback_cb' => 'wellthemes_main_menu_fallback',) ); ?>
					</nav>
				</div>
			</div>				
		</div>		
		
	</header>
	
		<?php
			if ( get_query_var('paged') ) {
				$paged = get_query_var('paged');
			} elseif ( get_query_var('page') ) {
				$paged = get_query_var('page');
			} else {
				$paged = 1;
			}
			
			if ( wt_get_option( 'wt_show_ticker' ) == 1 ) { 
				get_template_part( 'includes/feat-ticker' );
			}
			
			if (is_page_template('page-featured.php')&& $paged < 2 ){
				
				
				$wt_show_slider = get_post_meta($post->ID, 'wt_meta_show_slider', true);
				if ( $wt_show_slider == 1 ){
					get_template_part( 'includes/feat-slider' );
				}
			}
		?>
	<section id="main">
		<div class="inner-wrap">
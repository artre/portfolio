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
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri()?>/css/bootstrap.min.css"> <!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri()?>/css/jquery.mCustomScrollbar.css"> <!-- Scrollbar -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri()?>/css/font-awesome.min.css"> <!-- icons -->

	<!-- Sidebar -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri()?>/sidebar/normalize.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri()?>/sidebar/component.css">

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
	<div id="container">

<!-- MODALS -->
	<!-- MODAL-NEWS -->
		<?php get_template_part( 'modal-news-page', 'Modal News' ); ?>	
	<!-- END OF MODAL-NEWS -->

	<!-- MODAL-WALLETS -->
		<?php //get_template_part( 'modal-wallet-page', 'Modal Wallet' ); ?>	
	<!-- END OF MODAL-WALLETS -->
<!-- END OF MODAL -->

<!-- white papers modal -->
<div id="white-papers-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <object id="myPdf" type="application/pdf" width="100%" data="">

      </object>       
    </div>
  </div>
</div>
<!-- END white papers modal -->

<!-- SIDEBAR -->
		<div id="st-container" class="st-container">
			<nav class="st-menu st-effect-1" id="menu-1">
				<div id="sidebar-title">
					<h2>Menu</h2>
				</div>

				<?php wp_nav_menu( array(
					'theme_location' => 'sidebar',
					'container_id'	 => 'cssmenu'
				) ); ?>

			</nav>
		</div>
<!-- END OF SIDEBAR -->

<!-- HEADER -->
		<div id="header-wrap">

		<?php if(strtolower($pagename) === "reviewsnah") { ?>
			<div id="header-toggle"><img src="<?php echo get_stylesheet_directory_uri()?>/img/menu-button.png" alt="Show / hide header"></div>
				<header id="header" class="inner-wrap header-top clearfix">
					<div id="header-slider">
		<?php } else {
			echo '<header id="header" class="inner-wrap clearfix">';
		} ?>

	<!-- HAMBURGER BUTTON -->
				<div data-effect="st-effect-1" id="navMenuTrigger">
					<i class="fa fa-bars"></i>
				</div>
	<!-- END OF HAMBURGER BUTTON -->

				<div id="logo-h">
					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo get_stylesheet_directory_uri()?>/img/logo.png" alt="">
					</a>
				</div>

				<nav id="main-menu">
					<?php wp_nav_menu( array(
						'theme_location' => 'primary-menu',
						'container' 	 => '0',
						'fallback_cb' 	 => 'wellthemes_main_menu_fallback'
					) ); ?>
				</nav>

				<div id="secondary-nav">
					<div class="search-wrapper">
						<i class="fa fa-search"></i>
						<div id="search-insert" class="clearfix">
							<form name="input">
								<input class="input-text" type="text" placeholder="Search" name="search" class="input">
								<div class="button-text"><a href="#">Advanced search</a></div>
								<input class="input-submit" type="submit" value="Go!">
							</form>
						</div>
					</div>
					<div class="login-wrapper clearfix">

					<?php if (is_user_logged_in()): ?>
						<?php if (check_user_roles('subscriber')) : ?>
							<span class="user-name"><?php echo current_user_display_name(); ?></span>
							<span class="user-avatar"><?php echo current_user_avatar(); ?></span>
							<?php echo bp_get_profile_bar_geltstyle_beta(); ?>
						<?php else: ?>
							<span class="notification-count">
								<?php echo current_user_notification_count(); ?>
								<div id="notifications-list">
									<?php current_user_notification_list(); ?>
								</div>
							</span>
							<span class="user-name"><?php echo current_user_display_name(); ?></span>
							<span class="user-avatar"><?php echo current_user_avatar(); ?></span>
							<?php echo bp_get_profile_bar_geltstyle(); ?>
						<?php endif; ?>
					<?php else: ?>
					<a href="#">Log In</a>
						<div id="login-insert-wrap" class="clearfix">

							<?php wp_login_form( array(
								'echo'           => true,
								'form_id'        => 'login-insert',
								'label_username' => false,
								'label_password' => false,
								'label_remember' => __( 'Remember Me' ),
								'label_log_in'   => __( 'Log In' ),
								'id_username'    => 'user_login',
								'id_password'    => 'user_pass',
								'id_remember'    => 'rememberme',
								'id_submit'      => 'wp-submit',
								'remember'       => true,
								'value_username' => NULL,
								'value_remember' => false
							) ); ?>

							<div id="login-forgot">
								<a id="forgot-password" href="<?php echo wp_lostpassword_url(); ?>" title="Lost Password">Forgot Password?</a>
							</div>
							<div id="login-register" class="button-text">
								<span>Don't have an account?</span>
								<a href="<?php echo get_permalink( 206 ); ?>">Register</a>
							</div>
						</div>
					<?php endif; ?>

					</div>
					<div class="language-wrapper">
						<span>EN<i class="fa fa-caret-down"></i></span>
						<div id="language-list">
							<div id="language-title">Languages</div>
							<ul>
								<li><a href="#"><i class="fa fa-circle"></i>English</a></li>
								<li><a href="#"><i class="fa fa-circle"></i>Spanish</a></li>
								<li><a href="#"><i class="fa fa-circle"></i>German</a></li>
								<li><a href="#"><i class="fa fa-circle"></i>French</a></li>
								<li><a href="#"><i class="fa fa-circle"></i>Hebrew</a></li>
								<li><a href="#"><i class="fa fa-circle"></i>Chinese</a></li>
							</ul>
						</div>
					</div> 
					
				</div> <!-- END OF #secondary-nav-->

		<?php if(strtolower($pagename) === "reviewsnah") {
			echo '</div>';
		} ?>

		</header>
	</div> <!-- END OF #header_wrap -->
<!-- END OF HEADER -->

	<div id="main">
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
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" /> 
<meta name="keywords" content="web design, web designer, graphic, oil painting, portfolio" />	
<meta name="description" content="Hi! I am the web and graphic designer. This is my portfolio website. Come in, be my guest" />
<meta name="viewport" content="width=device-width" />
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
	echo ' | ' . sprintf( __( 'Page %s', 'shape' ), max( $paged, $page ) );
	?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<!-- links to a sylesheet only if the page tamplate is in this example "oil_product_test2.php" -->
<?php if (is_page_template('oil_test_template_2.php')) { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/oil_painting.css">
<?php } ?>
<?php if (is_page_template('oil_product.php')) { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/oil_product.css">
<?php } ?>

	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>
	      
<div id="container">
<header id="header">
	<div id="header-line"></div>
	<div id="main-menu">
		<div id="home-link">
		   <a href="<?php echo get_site_url(); ?>">home</a>
		</div>
		<div id="my-name">
			<h1>ARTEM KOVALYK</h1>
		</div>
	</div>
</header>
<!-- <div id="what-media">
	<h4>Media Screen</h4>
</div> -->
    <!-- header end -->
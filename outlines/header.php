<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package outlines
 * @since outlines 1.0
 */
?><!DOCTYPE html>
<?php $templateDir = get_template_directory_uri(); ?>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/reset.css" media="screen" />
<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Oswald:400,700|Roboto+Slab:300,400|Source+Sans+Pro:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico" type="image/x-icon">

<!-- slick cdn -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.8/slick.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.8/slick-theme.css"/>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- svg icons -->
<svg style="position: absolute; width: 0; height: 0;" width="0" height="0" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
	<defs>
		<symbol id="icon-calendar" viewBox="0 0 1024 1024">
			<title>calendar</title>
			<path class="path1" d="M320 384h128v128h-128zM512 384h128v128h-128zM704 384h128v128h-128zM128 768h128v128h-128zM320 768h128v128h-128zM512 768h128v128h-128zM320 576h128v128h-128zM512 576h128v128h-128zM704 576h128v128h-128zM128 576h128v128h-128zM832 0v64h-128v-64h-448v64h-128v-64h-128v1024h960v-1024h-128zM896 960h-832v-704h832v704z"></path>
		</symbol>
		<symbol id="icon-facebook" viewBox="0 0 1024 1024">
			<title>facebook2</title>
			<path class="path1" d="M853.35 0h-682.702c-94.25 0-170.648 76.42-170.648 170.686v682.63c0 94.266 76.398 170.684 170.648 170.684h341.352v-448h-128v-128h128v-96c0-88.366 71.634-160 160-160h160v128h-160c-17.674 0-32 14.328-32 32v96h176l-32 128h-144v448h213.35c94.25 0 170.65-76.418 170.65-170.684v-682.63c0-94.266-76.4-170.686-170.65-170.686z"></path>
		</symbol>
		<symbol id="icon-menu" viewBox="0 0 1024 1024">
			<title>menu</title>
			<path class="path1" d="M64 192h896v192h-896zM64 448h896v192h-896zM64 704h896v192h-896z"></path>
		</symbol>
	</defs>
</svg>

<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="branding">
			<a href="<?php echo site_url(); ?>"><img src="<?=$templateDir?>/img/tndg-header-logo.png" alt="Tennessee Distillers Guild"></a>
		</div>
		<nav role="navigation" class="site-navigation main-navigation">
			<h1 class="assistive-text"><?php _e( 'Menu', 'outlines' ); ?> <svg class="icon icon-menu"><use xlink:href="#icon-menu"></use></svg></h1>
			<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'outlines' ); ?>"><?php _e( 'Skip to content', 'outlines' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- .site-navigation .main-navigation -->
		<div class="social-links">
			<a class="facebook-link" href="https://www.facebook.com/TNDistillersGuild" target="_blank"><svg class="icon icon-facebook"><use xlink:href="#icon-facebook"></use></svg></a>
		</div>

	</header><!-- #masthead .site-header -->

	<div id="main" class="site-main">

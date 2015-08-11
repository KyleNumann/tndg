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

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="branding">
			<a href="<?php echo site_url(); ?>"><img src="<?=$templateDir?>/img/tndg-header-logo.png" alt="Tennessee Distillers Guild"></a>
		</div>
		<nav role="navigation" class="site-navigation main-navigation">
			<h1 class="assistive-text"><?php _e( 'Menu', 'outlines' ); ?></h1>
			<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'outlines' ); ?>"><?php _e( 'Skip to content', 'outlines' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- .site-navigation .main-navigation -->
		

	</header><!-- #masthead .site-header -->

	<div id="main" class="site-main">

<?php
/**
 * outlines functions and definitions
 *
 * @package outlines
 * @since outlines 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since outlines 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'outlines_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since outlines 1.0
 */
function outlines_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on outlines, use a find and replace
	 * to change 'outlines' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'outlines', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'outlines' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	// add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // outlines_setup
add_action( 'after_setup_theme', 'outlines_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since outlines 1.0
 */
function outlines_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'outlines' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'outlines_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function outlines_scripts() {
	
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'outlines_scripts' );

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );

/* Custom Post Types */
add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'distilleries',
    array(
      'labels' => array(
        'name' => __( 'Distilleries' ),
        'singular_name' => __( 'Distillery' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
	register_post_type( 'associates',
		array(
			'labels' => array(
				'name' => __( 'Associates' ),
				'singular_name' => __( 'Associate' )
			),
			'public' => true,
			'has_archive' => true,
		)
	);
}

// Custom Image Sizes
add_image_size( 'associates-logo', 300, 150 );

add_image_size( 'distilleries-photo', 600, 400, true );

function new_excerpt_more( $more ) {
	return '... <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( 'More &raquo;', 'your-text-domain' ) . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

// verify urls
function addhttp($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}

// posts per page based on CPT
function iti_custom_posts_per_page($query)
{
    switch ( $query->query_vars['post_type'] )
    {
        case 'distilleries':
            $query->query_vars['posts_per_page'] = 999;
            break;

        /*case 'iti_cpt_2':  // Post Type named 'iti_cpt_2'
            $query->query_vars['posts_per_page'] = 4;
            break;

        case 'iti_cpt_3':  // Post Type named 'iti_cpt_3'
            $query->query_vars['posts_per_page'] = 5;
            break;*/

        default:
            break;
    }
    return $query;
}

if( !is_admin() )
{
    add_filter( 'pre_get_posts', 'iti_custom_posts_per_page' );
}
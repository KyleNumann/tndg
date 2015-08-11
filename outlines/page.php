<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package outlines
 * @since outlines 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<header class="content-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
	<div id="content" class="site-content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="entry-content">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'outlines' ), 'after' => '</div>' ) ); ?>
					<?php edit_post_link( __( 'Edit', 'outlines' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-<?php the_ID(); ?> -->

		<?php endwhile; // end of the loop. ?>

	</div><!-- #content .site-content -->
</div><!-- #primary .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
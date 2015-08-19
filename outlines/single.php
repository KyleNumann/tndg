<?php
/**
 * The Template for displaying all single posts.
 *
 * @package outlines
 * @since outlines 1.0
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<header class="content-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php/*<div class="entry-meta">
					<?php outlines_posted_on(); ?>
				</div><!-- .entry-meta -->*/?>
			</header><!-- .entry-header -->
			<div id="content" class="site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php/* outlines_content_nav( 'nav-above' ); */?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php outlines_content_nav( 'nav-below' ); ?>


			<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php /* get_sidebar(); */?>
<?php get_footer(); ?>
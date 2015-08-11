<?php

get_header(); ?>

		<section id="primary" class="content-area">
			<header class="content-header">
					<h1 class="entry-title">Distilleries</h1>
				</header><!-- .entry-header -->
			<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

				<?php outlines_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php outlines_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>

			</div><!-- #content .site-content -->
		</section><!-- #primary .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
<?php
/**
 * @package outlines
 * @since outlines 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="entry-content">
		<?php the_content(); ?>
		<?php// wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'outlines' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	
</article><!-- #post-<?php the_ID(); ?> -->

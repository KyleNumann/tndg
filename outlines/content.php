<?php
/**
 * @package outlines
 * @since outlines 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'outlines' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php/* if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php outlines_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; */?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php //the_excerpt(); ?>
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'outlines' ) ); ?>
		<?php //wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'outlines' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'outlines' ) );
				if ( $tags_list ) :
			?>
			<span class="sep"> | </span>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'outlines' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->

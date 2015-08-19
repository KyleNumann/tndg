<?php

get_header(); ?>

		<section id="primary" class="content-area">
			<header class="content-header">
					<h1 class="entry-title">Associates</h1>
				</header><!-- .entry-header -->
			<div id="content" class="site-content" role="main">
				<div class="associates level-one">
					<h2 class="level-title">Level One</h2>
				<?php 
					if ( have_posts() ) : 
					while ( have_posts() ) : the_post(); 
						
						$level = CFS()->get('associate_level');
						if(key($level)=='level-one'):
							$imgId = CFS()->get('logo');
							$imgURL = wp_get_attachment_image_src( $imgId, 'medium' );
							if($imgURL):
					?>
							<div class="associate">
								<img src="<?php echo $imgURL[0]; ?>">
							</div>
						<?php endif;  endif; ?>

					<?php endwhile; ?>
				<?php endif; ?>
				</div>
				<div class="associates level-two">
					<h2 class="level-title">Level Two</h2>
				<?php 
					if ( have_posts() ) : 
					while ( have_posts() ) : the_post(); 
						
						$level = CFS()->get('associate_level');
						if(key($level)=='level-two'):
							$imgId = CFS()->get('logo');
							$imgURL = wp_get_attachment_image_src( $imgId, 'medium' );
							if($imgURL):
					?>
							<div class="associate">
								<img src="<?php echo $imgURL[0]; ?>">
							</div>
						<?php endif;  endif; ?>

					<?php endwhile; ?>
				<?php endif; ?>
				</div>

			</div><!-- #content .site-content -->
		</section><!-- #primary .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
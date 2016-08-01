<?php

get_header(); ?>

		<section id="primary" class="content-area">
			<header class="content-header">
					<h1 class="entry-title">Associates</h1>
				</header><!-- .entry-header -->
			<div id="content" class="site-content" role="main">

				<?php 
					$args = array(  'page_id' => 108 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
						$contentVar = get_the_content();
						if(!empty($contentVar)):?>
							<div class="page-intro">
								<?php the_content(); ?>
							</div>
				<?php endif; endwhile; wp_reset_postdata(); ?>


				<div class="associates level-one">
					<h2 class="level-title">Level One</h2>
				<?php 
					if ( have_posts() ) : 
					while ( have_posts() ) : the_post(); 
						
						$level = CFS()->get('associate_level');
						if(key($level)=='level-one'):
							$imgId = CFS()->get('logo');
							$assURL = '';
							if(CFS()->get('website_url')){
								$assURL = CFS()->get('website_url');
							}
							$imgURL = wp_get_attachment_image_src( $imgId, 'medium' );
							if($imgURL):
					?>
							<div class="associate">
								<?php if($assURL): ?>
									<a href="<?php echo $assURL; ?>" target="_blank" title="Visit Website">
										<img src="<?php echo $imgURL[0]; ?>">
									</a>
								<?php else: ?>
									<img src="<?php echo $imgURL[0]; ?>">
								<?php endif; ?>
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
							$assURL = '';
							if(CFS()->get('website_url')){
								$assURL = CFS()->get('website_url');
							}
							$imgURL = wp_get_attachment_image_src( $imgId, 'medium' );
							if($imgURL):
					?>
							<div class="associate">
								<?php if($assURL): ?>
									<a href="<?php echo $assURL; ?>" target="_blank" title="Visit Website">
										<img src="<?php echo $imgURL[0]; ?>">
									</a>
								<?php else: ?>
									<img src="<?php echo $imgURL[0]; ?>">
								<?php endif; ?>
							</div>
						<?php endif;  endif; ?>

					<?php endwhile; ?>
				<?php endif; ?>
				</div>

			</div><!-- #content .site-content -->
		</section><!-- #primary .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
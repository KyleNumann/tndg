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
				<?php while ( have_posts() ) : the_post(); 
					$imgId = CFS()->get('photo');
					$imgURL = wp_get_attachment_image_src( $imgId, 'distilleries-photo' );
				?>

					<div class="distillery">
						<?php if($imgURL): ?>
							<div class="entry-photo">
								<img src="<?php echo $imgURL[0]; ?>">
							</div>
						<?php endif; ?>
						<h3 class="entry-title"><?php the_title(); ?></h3>
						<?php if(CFS()->get('description')): ?>
							<div class="entry-content">
								

								<a class="cta a_show" href="#">Read Description</a>
									<div class="hidden-info">
										<p><?php echo CFS()->get('description'); ?></p>
										<a href="#" class="cta a_hide">Hide</a>
									</div>
							</div>


						<?php endif; ?>
						<div class="entry-meta">
							<?php if(CFS()->get('address_line_01')): ?>
								<p class="address">
									<?php echo CFS()->get('address_line_01'); ?>
									<?php echo CFS()->get('address_line_02') ? '<br>'. CFS()->get('address_line_02') : '' ?>
								</p>
							<?php endif; ?>
							<?php if(CFS()->get('website')): ?>
								<a class="website" href="<?php echo addhttp(CFS()->get('website')); ?>" target="_blank"><?php echo CFS()->get('website'); ?></a>
							<?php endif; ?>
							<?php if(CFS()->get('email')): ?>
								<a class="website" href="mailto:<?php echo CFS()->get('email'); ?>"><?php echo CFS()->get('email'); ?></a>
							<?php endif; ?>
						</div>

					</div>

				<?php endwhile; ?>

				<?php outlines_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>

			</div><!-- #content .site-content -->
		</section><!-- #primary .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
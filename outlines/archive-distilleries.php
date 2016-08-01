<?php

get_header(); ?>

		<section id="primary" class="content-area">
			<header class="content-header">
					<h1 class="entry-title">Distilleries</h1>
				</header><!-- .entry-header -->
			<div id="content" class="site-content" role="main">

					<div class="region-select">
						<span>Filter By Region:</span>
						<?php $currentURL = strtok("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", '?'); ?>
						<a href="<?=$currentURL?>">Show All</a>
						<a href="<?=$currentURL?>?region=west">West TN</a>
						<a href="<?=$currentURL?>?region=middle">Middle TN</a>
						<a href="<?=$currentURL?>?region=east">East TN</a>
					</div>
					<?php if(isset($_GET['region'])) {
							$regionSelect = $_GET['region'];
							if($regionSelect == 'west'){
								echo '<h2 class="region-title">West Tennessee</h2>';
							} elseif($regionSelect == 'middle'){
								echo '<h2 class="region-title">Middle Tennessee</h2>';
							} elseif($regionSelect == 'east'){
								echo '<h2 class="region-title">East Tennessee</h2>';
							}
						}
					?>
					
				<div class="distilleries">
					<?php 
						$args = array(  
							'post_type' => 'distilleries',
							'orderby' => 'title',
							'order' => 'ASC'
						);
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
							
							$region = CFS()->get('state_region');

							if($regionSelect == 'west' && key($region) !='west_tennessee'){
								continue;	
							} elseif($regionSelect == 'middle' && key($region) !='middle_tennessee'){
								continue;	
							} elseif($regionSelect == 'east' && key($region) !='east_tennessee'){
								continue;	
							}


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
					
						<div class="entry-meta">
							<div class="location">
								<div class="region">
									<?php if(key($region) =='west_tennessee'){
										echo '<p><span>West</span> TN</p>';
									} elseif(key($region) =='middle_tennessee'){
										echo '<p><span>Middle</span> TN</p>';
									} elseif(key($region) =='east_tennessee'){
										echo '<p><span>East</span> TN</p>';
									} ?>
								</div>
								<div class="address">
									<?php if(CFS()->get('address_line_01')): ?>
										<p>
											<?php echo CFS()->get('address_line_01'); ?>
											<?php echo CFS()->get('address_line_02') ? '<br>'. CFS()->get('address_line_02') : '' ?>
										</p>
									<?php endif; ?>
								</div>
							</div>
							<?php if(CFS()->get('website')): ?>
								<a class="website" href="<?php echo addhttp(CFS()->get('website')); ?>" target="_blank"><?php echo CFS()->get('website'); ?> <span>&raquo;</span></a>
							<?php endif; ?>
							<?php if(CFS()->get('email')): ?>
								<a class="website" href="mailto:<?php echo CFS()->get('email'); ?>"><?php echo CFS()->get('email'); ?></a>
							<?php endif; ?>
						</div>

						<?php if(CFS()->get('description')): ?>
							<div class="entry-content">
								

								<a class="cta a_show" href="#">Read Description</a>
									<div class="hidden-info">
										<p><?php echo CFS()->get('description'); ?></p>
										<a href="#" class="cta a_hide">Hide</a>
									</div>
							</div>


						<?php endif; ?>

					</div>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>

				<?php /* Start the Loop * ?>
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

				<?php endwhile;*/ ?>



			</div><!-- #content .site-content -->
		</section><!-- #primary .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
<?php
/* Template Name: Homepage */

get_header(); ?>

<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

				<div class="home-slider section">
					<div class="slides">
						<?php 

						$fields = CFS()->get('featured_slides');
						foreach ($fields as $field) : 
							$imgId = $field['slide_image'];
							$imgURL = wp_get_attachment_image_src( $imgId, 'large' );
						?>
						<div class="slide" style="background:url('<?php echo $imgURL[0]; ?>') no-repeat center center; background-size:cover;">
						<?/*<div class="slide">*/?>
							<?/*<img src="<?php echo $imgURL[0]; ?>">*/?>
						   <div class="slide-content">
						   		<h3 class="slide-title"><?=$field['slide_title'];?></h3>
						   		<?=$field['slide_copy'];?>
						   </div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="home-statement section">
					<div class="container">
						<div class="section-content">
						<?php 
							$args = array(  'page_id' => 18 );
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post(); 
						?>

							<h2 class="mission-statement"><?php echo CFS()->get('mission_statement'); ?></h2>
						<?php
							endwhile; wp_reset_postdata();
						?>
						</div>
						<div class="cta-wrap">
							<a class="cta alt-color" href="<?php echo site_url(); ?>/about-us">Learn More</a>
						</div>
					</div>
				</div>
				<div class="home-associates section">
					<div class="container">
						<div class="section-header">
							<h2 class="section-title">Associates</h2>
						</div>
						<div class="associates-slider">
							<?php 
								$args = array(  'post_type' => 'associates' );
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post(); 

									$imgId = CFS()->get('logo_colored');
									$imgURL = wp_get_attachment_image_src( $imgId, 'associates-logo' );
							?>

								<div class="associates-logo" style="background:url('<?php echo $imgURL[0]; ?>') no-repeat center center; background-size:contain;"></div>
							<?php
								endwhile; wp_reset_postdata();
							?>
						</div>
						<div class="cta-wrap">
							<a class="cta" href="<?php echo site_url(); ?>/associates">Learn More</a>
						</div>
					</div>
				</div>
				<div class="home-bottom section">
					<div class="container">
						<div class="row gutters">
							<div class="article-excerpts col span_15">
								<h2 class="section-title">Articles</h2>

								<?php 
									$args = array(  
										'posts_per_page' => 3,
	        							'orderby' => 'most_recent'
									);
									$loop = new WP_Query( $args );
									while ( $loop->have_posts() ) : $loop->the_post(); 
								?>
									<article id="post-<?php the_ID(); ?>" class="article-excerpt">
										<header class="entry-header">
											<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'outlines' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
										</header><!-- .entry-header -->

										
										<div class="entry-summary">
											<?php the_excerpt(); ?>
										</div><!-- .entry-summary -->
										
									</article><!-- #post-<?php the_ID(); ?> -->
								<?php
									endwhile; wp_reset_postdata();
								?>

							</div>
							<div class="home-sidebar col span_9">
								<h2 class="section-title">Upcoming Events</h2>

								<div class="events">
									<?php 

									$args = array(  'page_id' => 25 );
									$loop = new WP_Query( $args );
									while ( $loop->have_posts() ) : $loop->the_post();

									$fields = CFS()->get('events');
									$i=0;
									foreach ($fields as $field) :
										$i++;
										if($i <= 3):
										$eventSlug = strtolower(str_replace(' ', '-', $field['title']));
									?>
									<div class="event">
									   <div class="row">
									   		<div class="col span_8 event-date">
									   			<span><?php echo $field['date']; ?></span>
									   		</div>
									   		<div class="col span_16 event-info">
									   			<h3 class="event-title"><?php echo $field['title']; ?></h3>
									   			<div class="event-description"><?php echo strip_tags(substr($field['description'], 0, 60)); ?>... <a href="<?php echo site_url(); ?>/calendar#<?php echo $eventSlug; ?>">More &raquo;</a></div>
									   		</div>
									   </div>
									</div>
									<?php endif; endforeach; endwhile; wp_reset_postdata(); ?>
								</div>

							</div>
						</div>
					</div>
				</div>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
<?php
/* Template Name: Homepage */

get_header(); ?>

<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

				<div class="home-slider">
					<?php 

					$fields = CFS()->get('featured_slides');
					foreach ($fields as $field) : 
						$imgId = $field['slide_image'];
						$imgURL = wp_get_attachment_image_src( $imgId, 'large' );
					?>
					<div class="slide" style="background:url('<?php echo $imgURL[0]; ?>') no-repeat center center; background-size:cover;">
					   <div class="slide-content">
					   		<h3 class="slide-title"><?=$field['slide_title'];?></h3>
					   		<?=$field['slide_copy'];?>
					   </div>
					</div>
					<?php endforeach; ?>
				</div>
				<div class="home-statement">

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

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
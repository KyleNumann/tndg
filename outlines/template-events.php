<?php
/* Template Name: Events */

get_header(); ?>

<div id="primary" class="content-area">
	<header class="content-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
	<div id="content" class="site-content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="entry-content">
					<?php 
						$contentVar = get_the_content();
						if(!empty($contentVar)):?>
						<div class="page-intro">
							<?php the_content(); ?>
						</div>
					<?php endif; ?>
					
					<div class="events">
						<?php 
							$fields = CFS()->get('events');
							$i=0;
							foreach ($fields as $field) :
								$eventSlug = strtolower(str_replace(' ', '-', $field['title']));
							?>
							<div class="event" id="<?php echo $eventSlug; ?>">
							   <div class="row">
							   		<div class="col span_4 event-date">
							   			<span><?php echo $field['date']; ?></span>
							   		</div>
							   		<div class="col span_20 event-info">
							   			<h3 class="event-title"><?php echo $field['title']; ?></h3>
							   			<div class="event-description"><?php echo $field['description']; ?></div>
							   		</div>
							   </div>
							</div>
						<?php endforeach; ?>
					</div>

				</div><!-- .entry-content -->
			</article><!-- #post-<?php the_ID(); ?> -->

		<?php endwhile; // end of the loop. ?>

	</div><!-- #content .site-content -->
</div><!-- #primary .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>